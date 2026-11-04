import 'dart:convert';

import 'package:flutter/material.dart';
import 'package:flutter/services.dart';
import 'package:flutter_test/flutter_test.dart';
import 'package:aqar_mobile/demo/demo_store.dart';
import 'package:aqar_mobile/demo/interactive_app.dart';
import 'package:aqar_mobile/demo/interactive_page.dart';
import 'package:aqar_mobile/demo/widgets/dashboard_layout.dart';

import 'helpers/pump_ui.dart';

void main() {
  TestWidgetsFlutterBinding.ensureInitialized();
  late Record seed, translations;
  setUpAll(() async {
    seed = jsonDecode(
      await rootBundle.loadString('assets/data/demo-seed.json'),
    );
    translations = jsonDecode(
      await rootBundle.loadString('assets/data/demo-i18n.json'),
    );
  });
  const sizes = [
    Size(1440, 1000),
    Size(1280, 900),
    Size(1024, 900),
    Size(768, 1024),
    Size(390, 844),
  ];
  for (final role in ['manager', 'owner', 'tenant']) {
    for (final lang in ['en', 'ar']) {
      for (final size in sizes) {
        testWidgets(
          '$role dashboard ${size.width} $lang retains dynamic totals without layout exceptions',
          (tester) async {
            tester.view.physicalSize = size;
            tester.view.devicePixelRatio = 1;
            addTearDown(tester.view.resetPhysicalSize);
            addTearDown(tester.view.resetDevicePixelRatio);
            final s = DemoStore(seed, translations, (_) async {});
            await s.login('$role@aqar.demo', 'Demo123!');
            await s.settings(language: lang);
            final before = jsonEncode(s.state);
            await tester.pumpWidget(
              InteractiveAqarApp(
                store: s,
                initialRoute: role == 'manager' ? '/' : '/$role',
                monitorSession: false,
              ),
            );
            await pumpUi(tester);
            expect(find.byType(AqarDashboard), findsOneWidget);
            expect(find.byType(AqarDashboardMoney), findsWidgets);
            expect(tester.takeException(), isNull);
            final tiles = find.byWidgetPredicate(
              (w) =>
                  w.key is ValueKey<String> &&
                  (w.key as ValueKey<String>).value.startsWith(
                    'dashboard-kpi-',
                  ),
            );
            expect(tiles, findsNWidgets(role == 'tenant' ? 4 : 5));
            await tester.drag(
              find.byKey(const Key('dashboard-scroll')),
              const Offset(0, -800),
            );
            await pumpUi(tester);
            expect(find.text(s.t('Portfolio overview')), findsOneWidget);
            expect(tester.takeException(), isNull);
            expect(jsonEncode(s.state), before);
          },
        );
      }
    }
  }
  for (final lang in ['en', 'ar']) {
    for (final size in sizes) {
      testWidgets(
        'account selection ${size.width} $lang has balanced role cards',
        (tester) async {
          tester.view.physicalSize = size;
          tester.view.devicePixelRatio = 1;
          addTearDown(tester.view.resetPhysicalSize);
          addTearDown(tester.view.resetDevicePixelRatio);
          final s = DemoStore(seed, translations, (_) async {});
          await s.settings(language: lang);
          await tester.pumpWidget(
            InteractiveAqarApp(
              store: s,
              initialRoute: '/account-type',
              monitorSession: false,
            ),
          );
          await pumpUi(tester);
          for (final role in ['manager', 'owner', 'tenant']) {
            expect(find.byKey(ValueKey('account-role-$role')), findsOneWidget);
          }
          expect(find.byKey(const Key('header-language')), findsOneWidget);
          expect(tester.takeException(), isNull);
        },
      );
    }
  }
  for (final role in ['manager', 'owner', 'tenant']) {
    testWidgets('account card $role keeps selected role on registration', (
      tester,
    ) async {
      tester.view.physicalSize = const Size(1280, 900);
      tester.view.devicePixelRatio = 1;
      addTearDown(tester.view.resetPhysicalSize);
      addTearDown(tester.view.resetDevicePixelRatio);
      final s = DemoStore(seed, translations, (_) async {});
      await tester.pumpWidget(
        InteractiveAqarApp(
          store: s,
          initialRoute: '/account-type',
          monitorSession: false,
        ),
      );
      await pumpUi(tester);
      await tester.tap(find.byKey(ValueKey('account-role-$role')));
      await pumpUi(tester);
      final page = tester.widget<InteractivePage>(
        find.byType(InteractivePage).last,
      );
      expect(page.path, '/register');
      expect(page.args['role'], role);
      expect(tester.takeException(), isNull);
    });
  }
  testWidgets('long financial values remain a single fitted text run', (
    tester,
  ) async {
    await tester.pumpWidget(
      const MaterialApp(
        home: Scaffold(
          body: SizedBox(
            width: 140,
            child: AqarDashboardMoney('USD 1,234,567,890.12'),
          ),
        ),
      ),
    );
    await pumpUi(tester);
    expect(find.text('USD 1,234,567,890.12'), findsOneWidget);
    expect(tester.takeException(), isNull);
  });
}
