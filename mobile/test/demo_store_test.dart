import 'dart:convert';

import 'package:flutter/services.dart';
import 'package:flutter_test/flutter_test.dart';
import 'package:aqar_mobile/demo/demo_store.dart';

void main() {
  TestWidgetsFlutterBinding.ensureInitialized();
  late Record seed;
  late Record translations;
  setUpAll(() async {
    seed = jsonDecode(
      await rootBundle.loadString('assets/data/demo-seed.json'),
    ) as Record;
    translations = jsonDecode(
      await rootBundle.loadString('assets/data/demo-i18n.json'),
    ) as Record;
  });
  Future<DemoStore> setup([String role = 'manager']) async {
    final store = DemoStore(seed, translations, (_) async {});
    await store.login('$role@aqar.demo', 'Demo123!');
    return store;
  }

  final property = <String, dynamic>{
    'name': 'Presentation villa',
    'category': 'Villa',
    'city': 'Riyadh',
    'address': 'Fictional Lane 25',
    'ownerId': 'owner1',
    'price': '1500',
    'unitCount': '2',
    'published': 'true',
    'policy': 'instant',
  };
  test('manager scenario persists related property units, approvals, payment and maintenance totals', () async {
    String? saved;
    final s = DemoStore(seed, translations, (value) async {
      saved = value;
    });
    await s.login('manager@aqar.demo', 'Demo123!', rememberMe: true);
    final p = await s.saveProperty(property);
    expect(s.properties().length, (seed['properties'] as List).length + 1);
    expect(s.all('units').where((u) => u['propertyId'] == p['id']).length, 2);
    await s.saveProperty({...property, 'name': 'Edited demo'}, editId: p['id']);
    expect(s.property(p['id'])!['name'], 'Edited demo');
    await s.bookingStatus('b2', 'approved');
    final before = s.totals()['collected']!;
    final pay = await s.payment({
      'bookingId': 'b2',
      'amount': '1000',
      'status': 'pending',
    });
    expect(s.totals()['collected'], before);
    await s.verify(pay['id']);
    expect(s.totals()['collected'], before + 1000);
    await s.maintenanceStatus('m1', 'completed');
    final expenses = s.totals()['expense'];
    await s.maintenanceStatus('m1', 'completed');
    expect(s.totals()['expense'], expenses);
    final reload = DemoStore(seed, translations, (_) async {}, saved: saved);
    expect(reload.user!['id'], 'manager1');
    expect(reload.property(p['id'])!['name'], 'Edited demo');
  });
  test(
    'owner scenario restricts properties, finances and maintenance approvals',
    () async {
      final s = await setup('owner');
      expect(s.properties().map((p) => p['id']), ['p1', 'p2']);
      expect(s.totals()['collected'], 5000);
      expect(s.totals()['profit'], 3950);
      await s.maintenanceStatus('m1', 'approved');
      await expectLater(
        s.maintenanceStatus('m3', 'approved'),
        throwsStateError,
      );
      await expectLater(s.saveProperty(property), throwsStateError);
      expect(
        s.records('notifications').every((n) => n['accountId'] == 'owner1'),
        isTrue,
      );
    },
  );
  test('tenant scenario supports instant booking, request booking and own maintenance/inspection', () async {
    final s = await setup('tenant');
    expect(
      s.properties(browse: true).length,
      (seed['properties'] as List).where((p) => p['published'] == true).length,
    );
    expect(s.canSeeProperty('p4', browse: true), isFalse);
    final instant = await s.book({
      'propertyId': 'p2',
      'unitId': 'u5',
      'start': '2035-01-10',
      'end': '2035-01-13',
    });
    expect(instant['status'], 'confirmed');
    expect(instant['amount'], 2550);
    final request = await s.book({
      'propertyId': 'p3',
      'unitId': 'u6',
      'start': '2035-02-10',
      'end': '2035-02-12',
    });
    expect(request['status'], 'pending');
    await s.maintenance({
      'propertyId': 'p1',
      'title': 'Sample tap',
      'description': 'Fictional leak',
      'cost': '100',
      'priority': 'low',
    });
    await s.comment(s.records('maintenance').first['id'], 'Sample visit note');
    await s.inspect({
      'propertyId': 'p1',
      'notes': 'Sample wall mark',
      'condition': 'damaged',
    });
    expect(s.records('inspections').first['condition'], 'damaged');
    await s.bookingStatus(request['id'], 'cancelled');
    expect(
      s.records('bookings').every((b) => b['tenantId'] == 'tenant1'),
      isTrue,
    );
    expect(s.records('expenses'), isEmpty);
  });
  test(
    'invalid dates, overlaps, payments and cross-role actions are rejected',
    () async {
      final s = await setup('tenant');
      for (final range in [
        ('2035-01-10', '2035-01-09'),
        ('2035-02-30', '2035-03-02'),
        ('2020-01-01', '2020-01-02'),
      ]) {
        await expectLater(
          s.book({
            'propertyId': 'p2',
            'unitId': 'u5',
            'start': range.$1,
            'end': range.$2,
          }),
          throwsStateError,
        );
      }
      await s.book({
        'propertyId': 'p2',
        'unitId': 'u5',
        'start': '2035-01-10',
        'end': '2035-01-13',
      });
      await expectLater(
        s.book({
          'propertyId': 'p2',
          'unitId': 'u5',
          'start': '2035-01-11',
          'end': '2035-01-12',
        }),
        throwsStateError,
      );
      for (final amount in ['0', '-1', '999999', 'NaN']) {
        await expectLater(
          s.payment({'bookingId': 'b1', 'amount': amount}),
          throwsStateError,
        );
      }
      await expectLater(s.bookingStatus('b2', 'approved'), throwsStateError);
      await expectLater(s.bookingStatus('b3', 'cancelled'), throwsStateError);
    },
  );
  test('registration, reset/change password, profile, logout and expiry are local simulations', () async {
    final s = await setup();
    await s.register({
      'name': 'Demo Visitor',
      'email': 'visitor@aqar.demo',
      'password': 'Visitor123!',
      'confirm': 'Visitor123!',
      'role': 'tenant',
    });
    await s.login('visitor@aqar.demo', 'Visitor123!');
    await s.profile('Updated visitor', '0500000000');
    await s.changePassword('Visitor123!', 'Changed123!', 'Changed123!');
    await s.logout();
    expect(s.user, isNull);
    await expectLater(
      s.login('visitor@aqar.demo', 'Visitor123!'),
      throwsStateError,
    );
    await s.resetPassword('visitor@aqar.demo', 'Reset123!', 'Reset123!');
    await s.login('visitor@aqar.demo', 'Reset123!');
    await s.expire();
    expect(s.user, isNull);
    await s.login('visitor@aqar.demo', 'Reset123!');
    await s.reset();
    expect(s.user, isNull);
    expect(s.all('accounts').length, 3);
  });
  test(
    'reset restores seed and locale; seed account remains signed in',
    () async {
      final s = await setup();
      await s.saveProperty(property);
      await s.settings(language: 'ar');
      expect(s.t('Properties'), 'العقارات');
      await s.reset();
      expect(s.locale, 'en');
      expect(s.properties().length, (seed['properties'] as List).length);
      expect(s.user!['id'], 'manager1');
    },
  );
  test('sample contracts require approved bookings; deletion protects related records', () async {
    final s = await setup();
    await expectLater(
      s.contract({'bookingId': 'b2', 'title': 'Sample'}),
      throwsStateError,
    );
    await s.contract({'bookingId': 'b1', 'title': 'Sample agreement'});
    expect(s.records('contracts').first['status'], 'draft');
    await s.contractStatus(s.records('contracts').first['id'], 'active');
    await expectLater(s.deleteProperty('p1'), throwsStateError);
    final p = await s.saveProperty(property);
    await s.deleteProperty(p['id']);
    expect(s.property(p['id']), isNull);
  });
  test('failed persistence rolls back the state mutation', () async {
    bool fail = false;
    final s = DemoStore(seed, translations, (_) async {
      if (fail) throw StateError('quota');
    });
    await s.login('manager@aqar.demo', 'Demo123!');
    fail = true;
    await expectLater(s.saveProperty(property), throwsStateError);
    expect(s.properties().length, (seed['properties'] as List).length);
  });
}
