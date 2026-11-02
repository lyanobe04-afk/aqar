import 'dart:convert';

import 'package:flutter/services.dart';
import 'package:flutter_test/flutter_test.dart';
import 'package:aqar_mobile/demo/demo_store.dart';
import 'package:aqar_mobile/demo/services/global_support.dart';

void main() {
  TestWidgetsFlutterBinding.ensureInitialized();
  late Record seed, translations;
  setUpAll(() async {
    seed = jsonDecode(
      await rootBundle.loadString('assets/data/demo-seed.json'),
    ) as Record;
    translations = jsonDecode(
      await rootBundle.loadString('assets/data/demo-i18n.json'),
    ) as Record;
  });
  Future<DemoStore> setup([PersistDemo? persist]) async {
    final s = DemoStore(seed, translations, persist ?? (_) async {});
    await s.login('manager@aqar.demo', 'Demo123!');
    return s;
  }

  final input = <String, dynamic>{
    'name': 'Fictional Brooklyn House',
    'description': 'International presentation',
    'country': 'US',
    'currency': 'USD',
    'timeZone': 'America/New_York',
    'region': 'New York',
    'city': 'New York',
    'district': 'Brooklyn',
    'address': '15 Fictional Lane',
    'postalCode': '11201',
    'latitude': 40.68,
    'longitude': -73.94,
    'category': 'Apartment',
    'ownerId': 'owner1',
    'unitCount': 2,
    'price': 200,
    'ratePeriod': 'night',
    'minNights': 2,
    'publication': 'published',
    'availability': 'available',
    'listingType': 'rent',
    'amenities': 'Wi-Fi, Kitchen',
    'policy': 'instant',
  };
  final dates = {'start': '2035-03-10', 'end': '2035-03-13'};
  test(
    'A international property edits survive reload and reprice inherited units',
    () async {
      String? saved;
      final s = await setup((v) async {
        saved = v;
      });
      final p = await s.saveProperty(input);
      await s.saveProperty({
        ...p,
        'name': 'Edited London house',
        'country': 'GB',
        'currency': 'GBP',
        'timeZone': 'Europe/London',
        'city': 'London',
        'region': 'Greater London',
        'postalCode': 'W1K 0AA',
        'description': 'Edited description',
        'price': 250,
        'repriceUnits': true,
        'availability': 'unavailable',
        'publication': 'unpublished',
        'amenities': 'Garden',
      }, editId: p['id']);
      final restored = DemoStore(
        seed,
        translations,
        (_) async {},
        saved: saved,
      );
      final edited = restored.property(p['id'])!;
      expect(edited['name'], 'Edited London house');
      expect(edited['city'], 'London');
      expect(edited['currency'], 'GBP');
      expect(edited['published'], false);
      expect(edited['amenities'], ['Garden']);
      expect(
        restored
            .all('units')
            .where((u) => u['propertyId'] == p['id'])
            .every((u) => u['price'] == 250 && u['currency'] == 'GBP'),
        true,
      );
    },
  );
  test('B publication availability sale and unit states control booking eligibility', () async {
    final s = await setup();
    final p = await s.saveProperty(input), u = s.all('units').last;
    final booking = {
      ...dates,
      'propertyId': p['id'],
      'unitId': u['id'],
      'tenantId': 'tenant1',
    };
    for (final patch in [
      {'publication': 'draft'},
      {'publication': 'unpublished'},
      {'availability': 'unavailable'},
      {'availability': 'maintenance'},
      {'listingType': 'sale'},
    ]) {
      await s.saveProperty({...p, ...patch}, editId: p['id']);
      await expectLater(s.book(booking), throwsStateError);
      await s.saveProperty({
        ...p,
        'publication': 'published',
        'availability': 'available',
        'listingType': 'rent',
      }, editId: p['id']);
    }
    await s.saveUnit({...u, 'status': 'unavailable'}, editId: u['id']);
    await expectLater(s.book(booking), throwsStateError);
    await s.saveUnit({...u, 'status': 'vacant', 'price': 300}, editId: u['id']);
    expect((await s.book(booking))['amount'], 900);
  });
  test('C international bookings keep original currency, policy, timezone and duration', () async {
    final s = await setup();
    await s.login('tenant@aqar.demo', 'Demo123!');
    final b = await s.book({
      ...dates,
      'propertyId': 'p-global-london',
      'unitId': 'p-global-london-u1',
    });
    expect(b['currency'], 'GBP');
    expect(b['amount'], 540);
    expect(b['timeZone'], 'Europe/London');
    expect(b['status'], 'confirmed');
    final request = await s.book({
      ...dates,
      'propertyId': 'p-global-dubai',
      'unitId': 'p-global-dubai-u1',
    });
    expect(request['status'], 'pending');
    expect(request['currency'], 'AED');
    expect(request['amount'], 1950);
    await expectLater(
      s.book({...dates, 'propertyId': b['propertyId'], 'unitId': b['unitId']}),
      throwsStateError,
    );
  });
  test(
    'D owner assignment and per-currency financial totals stay scoped',
    () async {
      final s = await setup();
      final p = await s.saveProperty(input), u = s.all('units').last;
      final b = await s.book({
        ...dates,
        'propertyId': p['id'],
        'unitId': u['id'],
        'tenantId': 'tenant1',
      });
      await s.payment({
        'bookingId': b['id'],
        'amount': 200,
        'status': 'verified',
      });
      expect(s.totals('USD')['collected'], 200);
      expect(s.totals('SAR')['collected'], 8600);
      await s.login('owner@aqar.demo', 'Demo123!');
      expect(s.properties().any((v) => v['id'] == p['id']), true);
      expect(s.totals('USD')['collected'], 200);
      expect(s.properties().any((v) => v['id'] == 'p-global-newyork'), false);
    },
  );
  test('per-user global preferences persist without converting or relabelling amounts', () async {
    String? saved;
    final s = await setup((v) async {
      saved = v;
    });
    final before = jsonEncode(s.property('p-global-london'));
    await s.settings(
      preferences: {
        'country': 'US',
        'currency': 'USD',
        'locale': 'ar',
        'timeZone': 'America/New_York',
        'dateFormat': 'dd/MM/yyyy',
        'measurement': 'sqft',
        'phoneCode': '+1',
      },
    );
    expect(jsonEncode(s.property('p-global-london')), before);
    expect(s.currency(s.property('p-global-london')), 'GBP');
    expect(s.date('2035-03-10'), '10/03/2035');
    await s.login('manager@aqar.demo', 'Demo123!', rememberMe: true);
    expect(
      DemoStore(
        seed,
        translations,
        (_) async {},
        saved: saved,
      ).preferences['currency'],
      'USD',
    );
    await s.login('owner@aqar.demo', 'Demo123!');
    expect(s.preferences['currency'], 'SAR');
    await expectLater(
      s.settings(preferences: {'timeZone': 'Bad/Zone'}),
      throwsStateError,
    );
    await expectLater(
      s.settings(preferences: {'locale': 'fr'}),
      throwsStateError,
    );
  });
  test('eligible unit deletion persists; history protects currency and delete actions', () async {
    final s = await setup();
    await expectLater(s.deleteProperty('p1'), throwsStateError);
    await expectLater(s.deleteUnit('u2'), throwsStateError);
    await expectLater(
      s.saveProperty({
        ...s.property('p1')!,
        'currency': 'USD',
        'price': 20,
        'repriceUnits': true,
      }, editId: 'p1'),
      throwsStateError,
    );
    final p = await s.saveProperty(input), u = s.all('units').last;
    await s.deleteUnit(u['id']);
    expect(s.all('units').where((u) => u['propertyId'] == p['id']).length, 1);
    expect(s.property(p['id'])!['unitCount'], 1);
    await s.deleteProperty(p['id']);
    expect(s.property(p['id']), null);
  });
  test('timezone date boundaries, minimum stay, coordinates and invalid zones validate', () async {
    expect(
      zonedDate('America/Los_Angeles', DateTime.parse('2026-01-01T00:30:00Z')),
      '2025-12-31',
    );
    expect(
      zonedDate('Asia/Tokyo', DateTime.parse('2026-01-01T00:30:00Z')),
      '2026-01-01',
    );
    expect(
      zonedDate('UTC', DateTime.parse('2026-01-01T00:30:00Z')),
      '2026-01-01',
    );
    final s = await setup();
    final p = await s.saveProperty(input), u = s.all('units').last;
    await expectLater(
      s.book({
        'start': '2035-03-10',
        'end': '2035-03-11',
        'propertyId': p['id'],
        'unitId': u['id'],
        'tenantId': 'tenant1',
      }),
      throwsStateError,
    );
    await expectLater(
      s.saveProperty({...input, 'latitude': 100}),
      throwsStateError,
    );
    await expectLater(
      s.saveProperty({...input, 'timeZone': 'Bad/Zone'}),
      throwsStateError,
    );
  });
  test('legacy migration preserves edits and does not resurrect deleted international fixtures', () async {
    final old = jsonDecode(jsonEncode(seed)) as Record;
    old.remove('globalRevision');
    (old['properties'] as List).removeWhere(
      (p) => p['id'].toString().startsWith('p-global-'),
    );
    (old['units'] as List).removeWhere(
      (u) => u['id'].toString().startsWith('p-global-'),
    );
    old['properties'][0]['name'] = 'Existing local edit';
    String? saved;
    final s = DemoStore(seed, translations, (v) async {
      saved = v;
    }, saved: jsonEncode({'state': old, 'session': null}));
    expect(s.property('p1')!['name'], 'Existing local edit');
    await s.login('manager@aqar.demo', 'Demo123!');
    await s.deleteProperty('p-global-london');
    expect(
      DemoStore(
        seed,
        translations,
        (_) async {},
        saved: saved,
      ).property('p-global-london'),
      null,
    );
  });
}
