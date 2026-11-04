import 'helpers/pump_ui.dart';

import 'dart:io';
import 'dart:convert';

import 'package:flutter/material.dart';
import 'package:flutter/services.dart';
import 'package:flutter_test/flutter_test.dart';
import 'package:aqar_mobile/demo/demo_store.dart';
import 'package:aqar_mobile/demo/interactive_app.dart';
import 'package:aqar_mobile/demo/services/inspection_pdf.dart';

void main() {
  TestWidgetsFlutterBinding.ensureInitialized();

  late DemoStore s;
  late Record seed, translations;
  late String saved;
  const item = <String, dynamic>{
    'unitId': 'u2',
    'name': 'Chair',
    'room': 'Living room',
    'quantity': 2,
    'value': 100,
    'condition': 'good',
    'photos': <dynamic>[],
  };
  setUp(() async {
    seed = jsonDecode(
      await rootBundle.loadString('assets/data/demo-seed.json'),
    ) as Record;
    translations = jsonDecode(
      await rootBundle.loadString('assets/data/demo-i18n.json'),
    ) as Record;
    s = DemoStore(seed, translations, (v) async {
      saved = v;
    });
    await s.login('manager@aqar.demo', 'Demo123!', rememberMe: true);
  });
  Record signature() => {'name': s.user!['name'], 'accepted': true};
  test(
    'A1 assignment, unit item validation, isolated access and persistence',
    () async {
      final i = await s.saveInventory(item);
      await s.saveInventory({...item, 'name': 'Oak chair'}, editId: i['id']);
      expect(s.inventory('u2').single['name'], 'Oak chair');
      await expectLater(
        s.saveInventory({...item, 'quantity': 1.5}),
        throwsStateError,
      );
      await expectLater(
        s.saveInventory({...item, 'value': -1}),
        throwsStateError,
      );
      await expectLater(
        s.saveInventory({
          ...item,
          'photos': ['bad'],
        }),
        throwsStateError,
      );
      await s.assignDemoRelationships('p1', 'owner1', ['manager1']);
      expect(
        DemoStore(
          seed,
          translations,
          (_) async {},
          saved: saved,
        ).inventory('u2').single['name'],
        'Oak chair',
      );
      await s.login('tenant@aqar.demo', 'Demo123!');
      expect(s.inventory('u1'), isEmpty);
      expect(s.inventory('u2').length, 1);
      await expectLater(s.saveInventory(item), throwsStateError);
    },
  );
  test('A2 complete cross-role paired inspection, immutable snapshots and reviewed settlement', () async {
    final i = await s.saveInventory(item),
        h = await s.createHandover({
          'bookingId': 'b1',
          'deposit': 150,
          'assumptions': 'Manual estimates; client approval pending.',
        });
    await s.saveInventory({
      ...item,
      'name': 'Changed catalogue',
    }, editId: i['id']);
    expect(h['items'][0]['name'], 'Chair');
    await expectLater(s.beginCheckout(h['id']), throwsStateError);
    await s.saveObservation(h['id'], 'checkin', i['id'], {
      'quantity': 2,
      'condition': 'good',
      'notes': 'Checked',
      'photos': [],
    });
    await s.signInspection(h['id'], 'checkin', signature());
    await expectLater(
      s.saveObservation(h['id'], 'checkin', i['id'], {
        'quantity': 1,
        'condition': 'good',
      }),
      throwsStateError,
    );
    await s.login('tenant@aqar.demo', 'Demo123!');
    await s.signInspection(h['id'], 'checkin', signature());
    await s.login('manager@aqar.demo', 'Demo123!');
    await s.beginCheckout(h['id']);
    await s.saveObservation(h['id'], 'checkout', i['id'], {
      'quantity': 1,
      'condition': 'damaged',
      'notes': 'One missing, one damaged',
      'photos': [],
    });
    await s.signInspection(h['id'], 'checkout', signature());
    await s.login('tenant@aqar.demo', 'Demo123!');
    await s.signInspection(h['id'], 'checkout', signature());
    await s.login('manager@aqar.demo', 'Demo123!');
    await s.proposeSettlement(h['id'], {
      'charges': {i['id']: 200},
      'notes': 'Manual estimate, not automatic liability.',
    });
    expect(s.comparison(h['id']).single['missing'], 1);
    expect(h['proposal']['deduction'], 150);
    expect(h['proposal']['excess'], 50);
    await expectLater(s.settleHandover(h['id']), throwsStateError);
    await s.reviewSettlement(h['id'], {
      'decision': 'approved',
      'notes': 'Broker approves demo',
    });
    await s.login('owner@aqar.demo', 'Demo123!');
    await s.reviewSettlement(h['id'], {
      'decision': 'rejected',
      'notes': 'Revise estimate',
    });
    await s.login('manager@aqar.demo', 'Demo123!');
    await expectLater(s.settleHandover(h['id']), throwsStateError);
    await s.proposeSettlement(h['id'], {
      'charges': {i['id']: 100},
      'notes': 'Revised estimate',
    });
    expect(h['proposal']['reviews'], isEmpty);
    await s.reviewSettlement(h['id'], {
      'decision': 'approved',
      'notes': 'Broker approves revision',
    });
    await s.login('owner@aqar.demo', 'Demo123!');
    await s.reviewSettlement(h['id'], {
      'decision': 'approved',
      'notes': 'Owner approves simulation',
    });
    await s.login('manager@aqar.demo', 'Demo123!');
    final finance = jsonEncode([s.all('payments'), s.all('expenses')]);
    await s.settleHandover(h['id']);
    expect(h['proposal']['refund'], 50);
    expect(jsonEncode([s.all('payments'), s.all('expenses')]), finance);
    await expectLater(s.deleteInventory(i['id']), throwsStateError);
    await expectLater(s.deleteUnit('u2'), throwsStateError);
    final restored = DemoStore(seed, translations, (_) async {}, saved: saved);
    await restored.login('manager@aqar.demo', 'Demo123!');
    expect(restored.handover(h['id'])['settledAt'], isNotNull);
    for (final lang in ['en', 'ar']) {
      await s.settings(language: lang);
      final bytes = await inspectionPdfBytes(s, h);
      expect(ascii.decode(bytes.take(5).toList()), '%PDF-');
      expect(bytes.length, greaterThan(10000));
      if (const bool.fromEnvironment('AQAR_EXPORT_QA')) {
        await File('../docs/qa/handover/flutter-verified-$lang.pdf')
            .writeAsBytes(bytes);
      }
    }
  });
  test(
    'delegated broker is scoped to assigned properties and inventory',
    () async {
      await s.register({
        'name': 'Fictional broker',
        'email': 'broker@example.test',
        'role': 'manager',
        'password': 'Demo123!',
        'confirm': 'Demo123!',
      });
      final broker = s
          .all('accounts')
          .firstWhere((a) => a['email'] == 'broker@example.test');
      await s.assignDemoRelationships('p1', 'owner1', [broker['id']]);
      await s.login('broker@example.test', 'Demo123!');
      expect(s.properties().map((p) => p['id']).toList(), ['p1']);
      await expectLater(
        s.assignDemoRelationships('p1', 'owner1', ['manager1']),
        throwsStateError,
      );
      await expectLater(
        s.saveInventory({...item, 'unitId': 'u9'}),
        throwsStateError,
      );
      await expectLater(
        s.saveProperty({
          ...s.property('p2')!,
          'name': 'Unauthorized',
        }, editId: 'p2'),
        throwsStateError,
      );
      await expectLater(
        s.saveProperty({
          ...s.property('p1')!,
          'ownerId': 'owner2',
        }, editId: 'p1'),
        throwsStateError,
      );
      await s.saveInventory(item);
      expect(s.inventory('u2').length, 1);
    },
  );
  testWidgets(
    'unit inventory UI cancel, save and handover creation at phone width',
    (tester) async {
      tester.view.physicalSize = const Size(430, 932);
      tester.view.devicePixelRatio = 1;
      addTearDown(tester.view.resetPhysicalSize);
      addTearDown(tester.view.resetDevicePixelRatio);
      await tester.pumpWidget(
        InteractiveAqarApp(
          store: s,
          initialRoute: '/handover',
          monitorSession: false,
        ),
      );
      await pumpUi(tester);
      await tester.ensureVisible(find.text('Continue'));
      await tester.tap(find.text('Continue'));
      await pumpUi(tester);
      await tester.tap(find.text('Add unit item'));
      await pumpUi(tester);
      await tester.tap(find.text('Cancel'));
      await pumpUi(tester);
      expect(s.all('unitInventory'), isEmpty);
      await tester.tap(find.text('Add unit item'));
      await pumpUi(tester);
      await tester.enterText(
        find.widgetWithText(TextFormField, 'Room'),
        'Living room',
      );
      await tester.enterText(
        find.widgetWithText(TextFormField, 'Item'),
        'Chair',
      );
      await tester.tap(find.text('Save'));
      await pumpUi(tester);
      expect(s.all('unitInventory').length, 1);
      await tester.ensureVisible(find.text('Continue'));
      await tester.tap(find.text('Continue'));
      await pumpUi(tester);
      await tester.tap(find.text('Start paired inspection'));
      await pumpUi(tester);
      await tester.tap(find.text('Save'));
      await pumpUi(tester);
      expect(s.handoverList().length, 1);
      expect(tester.takeException(), isNull);
    },
  );
}
