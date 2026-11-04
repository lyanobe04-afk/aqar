import 'helpers/pump_ui.dart';

import 'dart:convert';

import 'package:flutter/material.dart';
import 'package:flutter/services.dart';
import 'package:flutter_test/flutter_test.dart';
import 'package:aqar_mobile/demo/demo_store.dart';
import 'package:aqar_mobile/demo/interactive_app.dart';

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
  const labels = [
    'Select unit',
    'Manage inventory',
    'Assign participants',
    'Check-in inspection',
    'Check-out inspection',
    'Compare condition',
    'Review settlement',
    'Generate PDF',
  ];
  for (final role in ['manager', 'owner', 'tenant']) {
    for (final lang in ['en', 'ar']) {
      for (final size in [
        const Size(1366, 768),
        const Size(768, 1024),
        const Size(390, 844),
        const Size(430, 932),
      ]) {
        testWidgets(
          '$role guided handover: all eight steps at ${size.width}px in $lang without mutations',
          (tester) async {
            tester.view.physicalSize = size;
            tester.view.devicePixelRatio = 1;
            addTearDown(tester.view.resetPhysicalSize);
            addTearDown(tester.view.resetDevicePixelRatio);
            final s = DemoStore(seed, translations, (_) async {});
            await s.login('manager@aqar.demo', 'Demo123!');
            await s.saveInventory({
              'unitId': 'u2',
              'room': 'Living room',
              'name': 'Chair',
              'quantity': 2,
              'value': 100,
              'condition': 'good',
              'photos': [],
            });
            await s.createHandover({
              'bookingId': 'b1',
              'deposit': 150,
              'assumptions': 'Configurable demo assumptions',
            });
            await s.login('$role@aqar.demo', 'Demo123!');
            await s.settings(language: lang);
            final before = jsonEncode(s.state);
            await tester.pumpWidget(
              InteractiveAqarApp(
                store: s,
                initialRoute: role == 'manager'
                    ? '/handover'
                    : '/$role/handover',
                monitorSession: false,
              ),
            );
            await pumpUi(tester);
            for (var i = 1; i < 8; i++) {
              final picker = find.byType(DropdownButtonFormField<int>);
              if (picker.evaluate().isNotEmpty) {
                await tester.ensureVisible(picker);
                await tester.tap(picker);
                await pumpUi(tester);
                final option = find
                    .text('${i + 1} / 8 · ${s.t(labels[i])}')
                    .last;
                await tester.ensureVisible(option);
                await tester.tap(option);
                await pumpUi(tester);
              } else {
                final stepButton = find.widgetWithText(
                  TextButton,
                  s.t(labels[i]),
                );
                await tester.ensureVisible(stepButton);
                await tester.tap(stepButton);
                await pumpUi(tester);
              }
              expect(find.text(s.t(labels[i])), findsAtLeastNWidgets(1));
              expect(tester.takeException(), isNull);
            }
            expect(
              jsonEncode(s.state),
              before,
              reason:
                  'View navigation must not mutate saved records or approvals.',
            );
          },
        );
      }
    }
  }
}
