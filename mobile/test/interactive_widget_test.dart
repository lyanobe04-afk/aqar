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
    final font = FontLoader('Inter')
      ..addFont(rootBundle.load('assets/fonts/Inter-Regular.ttf'));
    final ar = FontLoader('IBM Plex Sans Arabic')
      ..addFont(rootBundle.load('assets/fonts/Arabic-Regular.ttf'));
    await font.load();
    await ar.load();
  });
  Future<DemoStore> store([String? role]) async {
    final s = DemoStore(seed, translations, (_) async {});
    if (role != null) await s.login('$role@aqar.demo', 'Demo123!');
    return s;
  }

  Widget app(DemoStore s, String path) =>
      InteractiveAqarApp(store: s, initialRoute: path, monitorSession: false);
  Future<void> size(WidgetTester tester, double width) async {
    tester.view.physicalSize = Size(width, 900);
    tester.view.devicePixelRatio = 1;
    addTearDown(tester.view.resetPhysicalSize);
    addTearDown(tester.view.resetDevicePixelRatio);
  }

  Future<void> reveal(WidgetTester tester, Finder target) async {
    await tester.scrollUntilVisible(
      target,
      300,
      scrollable: find
          .descendant(
            of: find.byKey(const Key('login-scroll')).evaluate().isNotEmpty
                ? find.byKey(const Key('login-scroll'))
                : find.byType(ListView).last,
            matching: find.byType(Scrollable),
          )
          .first,
      maxScrolls: 50,
    );
    await tester.pumpAndSettle();
  }

  final paths = {
    'manager': [
      '/',
      '/properties',
      '/properties/demo',
      '/properties/edit',
      '/units',
      '/units/demo',
      '/owners',
      '/tenants',
      '/bookings',
      '/contracts',
      '/payments',
      '/receivables',
      '/maintenance',
      '/furniture',
      '/documents',
      '/reports',
      '/reports/operations',
      '/settings',
      '/notifications',
      '/profile',
      '/profile/edit',
      '/profile/password',
      '/designs',
      '/more',
      ...List.generate(6, (i) => '/properties/add/step-${i + 1}'),
    ],
    'owner': [
      '/owner',
      '/owner/properties',
      '/owner/property',
      '/owner/occupancy',
      '/owner/income',
      '/owner/expenses',
      '/owner/profit',
      '/owner/reports',
      '/owner/maintenance',
      '/owner/furniture',
      '/owner/documents',
      '/owner/notifications',
      '/owner/settings',
    ],
    'tenant': [
      '/tenant',
      '/tenant/browse',
      '/tenant/property',
      '/tenant/calendar',
      '/tenant/booking',
      '/tenant/bookings',
      '/tenant/contracts',
      '/tenant/payments',
      '/tenant/maintenance',
      '/tenant/inspection',
      '/tenant/documents',
      '/tenant/notifications',
      '/tenant/settings',
    ],
  };
  for (final entry in paths.entries) {
    for (final path in entry.value) {
      testWidgets('${entry.key} $path renders and scrolls at phone size', (
        tester,
      ) async {
        await size(tester, 390);
        final s = await store(entry.key);
        await tester.pumpWidget(app(s, path));
        await tester.pumpAndSettle();
        expect(find.textContaining('Interactive demo'), findsNothing);
        expect(find.text('Screen unavailable'), findsNothing);
        expect(tester.takeException(), isNull);
        for (var i = 0; i < 3; i++) {
          await tester.drag(find.byType(ListView).last, const Offset(0, -800));
          await tester.pumpAndSettle();
          expect(tester.takeException(), isNull);
        }
      });
    }
  }
  for (final path in [
    '/welcome',
    '/onboarding',
    '/login',
    '/register',
    '/account-type',
    '/forgot-password',
    '/reset-password',
    '/session-expired',
  ]) {
    testWidgets('public $path renders', (tester) async {
      await size(tester, 390);
      await tester.pumpWidget(app(await store(), path));
      await tester.pumpAndSettle();
      expect(tester.takeException(), isNull);
      expect(find.textContaining('Interactive demo'), findsNothing);
    });
  }
  for (final width in [320.0, 1024.0]) {
    for (final scenario in [
      ('manager', '/'),
      ('manager', '/properties'),
      ('manager', '/properties/add/step-4'),
      ('manager', '/settings'),
      ('owner', '/owner'),
      ('tenant', '/tenant'),
      ('tenant', '/tenant/booking'),
    ]) {
      testWidgets('${scenario.$1} ${scenario.$2} fits ${width.toInt()}px', (
        tester,
      ) async {
        await size(tester, width);
        await tester.pumpWidget(app(await store(scenario.$1), scenario.$2));
        await tester.pumpAndSettle();
        expect(tester.takeException(), isNull);
        for (var i = 0; i < 2; i++) {
          await tester.drag(find.byType(ListView).last, const Offset(0, -900));
          await tester.pumpAndSettle();
          expect(tester.takeException(), isNull);
        }
      });
    }
  }
  for (final scenario in [
    ('manager', '/'),
    ('owner', '/owner/properties'),
    ('tenant', '/tenant/booking'),
    ('tenant', '/tenant/inspection'),
  ]) {
    testWidgets('Arabic RTL ${scenario.$2} is usable', (tester) async {
      await size(tester, 390);
      final s = await store(scenario.$1);
      await s.settings(language: 'ar');
      await tester.pumpWidget(app(s, scenario.$2));
      await tester.pumpAndSettle();
      expect(
        Directionality.of(tester.element(find.byType(Scaffold).first)),
        TextDirection.rtl,
      );
      expect(tester.takeException(), isNull);
      await tester.drag(find.byType(ListView).last, const Offset(0, -700));
      await tester.pumpAndSettle();
      expect(tester.takeException(), isNull);
    });
  }
  for (final dimensions in [
    const Size(320, 900),
    const Size(1366, 768),
    const Size(1920, 1080),
    const Size(390, 844),
    const Size(430, 932),
    const Size(1024, 600),
  ]) {
    final width = dimensions.width;
    for (final language in ['en', 'ar']) {
      testWidgets(
        'branded login fits $dimensions in $language with preview access collapsed',
        (tester) async {
          await size(tester, width);
          tester.view.physicalSize = dimensions;
          final s = await store();
          await s.settings(language: language);
          await tester.pumpWidget(app(s, '/login'));
          await tester.pumpAndSettle();
          expect(find.text(s.t('Welcome back')), findsOneWidget);
          expect(find.textContaining('Demo authentication'), findsNothing);
          expect(find.byKey(const ValueKey('preview-manager')), findsNothing);
          expect(tester.takeException(), isNull);
          if (width <= 800) {
            expect(
              tester.getTopLeft(find.byKey(const Key('login-image'))).dy,
              0,
            );
          }
          if (width >= 1366) {
            final scroll = tester.state<ScrollableState>(
              find
                  .descendant(
                    of: find.byKey(const Key('login-scroll')),
                    matching: find.byType(Scrollable),
                  )
                  .first,
            );
            expect(scroll.position.maxScrollExtent, lessThanOrEqualTo(1));
            expect(
              tester.getSize(find.byKey(const Key('login-image'))).width,
              closeTo(width * .55, 1),
            );
          }
          await reveal(tester, find.text(s.t('Preview access')));
          await tester.tap(find.text(s.t('Preview access')));
          await tester.pumpAndSettle();
          expect(find.byKey(const ValueKey('preview-manager')), findsOneWidget);
          expect(tester.takeException(), isNull);
        },
      );
    }
  }
  testWidgets('protected navigation sends signed-out visitor to login', (
    tester,
  ) async {
    await tester.pumpWidget(app(await store(), '/payments'));
    await tester.pumpAndSettle();
    expect(find.text('Welcome back'), findsOneWidget);
    expect(find.text('Payments management'), findsNothing);
  });
  testWidgets('role guard prevents tenant opening the owner portfolio', (
    tester,
  ) async {
    await tester.pumpWidget(app(await store('tenant'), '/owner/properties'));
    await tester.pumpAndSettle();
    expect(find.text('Tenant dashboard'), findsAtLeastNWidgets(1));
    expect(find.text('My properties'), findsNothing);
  });
  testWidgets(
    'login validates entries and supports public demo account shortcut',
    (tester) async {
      await size(tester, 390);
      final s = await store();
      await tester.pumpWidget(app(s, '/login'));
      await tester.pumpAndSettle();
      await tester.tap(find.byKey(const Key('auth-submit')));
      await tester.pumpAndSettle();
      expect(
        find.text('Please complete the required fields correctly.'),
        findsAtLeastNWidgets(1),
      );
      await reveal(tester, find.text('Preview access'));
      await tester.tap(find.text('Preview access'));
      await tester.pumpAndSettle();
      await reveal(tester, find.byKey(const ValueKey('preview-manager')));
      await tester.tap(find.byKey(const ValueKey('preview-manager')));
      await tester.pumpAndSettle();
      await reveal(tester, find.byKey(const Key('auth-submit')));
      await tester.tap(find.byKey(const Key('auth-submit')));
      await tester.pumpAndSettle();
      expect(s.role, 'manager');
      expect(find.text('Property operations & collections'), findsOneWidget);
    },
  );
  testWidgets(
    'six-step property flow validates required fields, saves and lists generated units',
    (tester) async {
      await size(tester, 390);
      final s = await store('manager');
      await tester.pumpWidget(app(s, '/properties/add/step-1'));
      await tester.pumpAndSettle();
      await reveal(tester, find.byKey(const Key('interactive-wizard-next')));
      await tester.tap(find.byKey(const Key('interactive-wizard-next')));
      await tester.pumpAndSettle();
      expect(s.properties().length, (seed['properties'] as List).length);
      await reveal(tester, find.byKey(const ValueKey('input-name')));
      await tester.enterText(
        find.byKey(const ValueKey('input-name')),
        'Widget demo villa',
      );
      for (var step = 1; step < 6; step++) {
        if (step == 2) {
          await reveal(tester, find.byKey(const ValueKey('input-city')));
          await tester.enterText(
            find.byKey(const ValueKey('input-city')),
            'Riyadh',
          );
          await reveal(tester, find.byKey(const ValueKey('input-district')));
          await tester.enterText(
            find.byKey(const ValueKey('input-district')),
            'Sample district',
          );
          await tester.enterText(
            find.byKey(const ValueKey('input-address')),
            'Fictional Lane 10',
          );
        }
        await reveal(tester, find.byKey(const Key('interactive-wizard-next')));
        await tester.tap(find.byKey(const Key('interactive-wizard-next')));
        await tester.pumpAndSettle();
        expect(find.textContaining('Step ${step + 1} / 6'), findsOneWidget);
      }
      await reveal(tester, find.byKey(const Key('interactive-wizard-next')));
      await tester.tap(find.byKey(const Key('interactive-wizard-next')));
      await tester.pumpAndSettle();
      expect(s.properties().length, (seed['properties'] as List).length + 1);
      expect(s.properties().first['name'], 'Widget demo villa');
      expect(find.text('Widget demo villa'), findsOneWidget);
      expect(
        s
            .all('units')
            .any((u) => u['propertyId'] == s.properties().first['id']),
        isTrue,
      );
      expect(tester.takeException(), isNull);
    },
  );
  testWidgets(
    'tenant submits an instant booking and sees its confirmed state',
    (tester) async {
      await size(tester, 390);
      final s = await store('tenant');
      await tester.pumpWidget(
        InteractiveAqarApp(
          store: s,
          initialRoute: '/tenant/booking',
          monitorSession: false,
        ),
      );
      await tester.pumpAndSettle();
      final dropdown = find.byType(DropdownButtonFormField<String>).first;
      await tester.tap(dropdown);
      await tester.pumpAndSettle();
      await tester.tap(find.text('Al-Nakheel Private Chalet').last);
      await tester.pumpAndSettle();
      await tester.enterText(
        find.byKey(const ValueKey('input-start')),
        '2035-01-10',
      );
      await tester.enterText(
        find.byKey(const ValueKey('input-end')),
        '2035-01-13',
      );
      await reveal(tester, find.byKey(const Key('submit-demo-booking')));
      await tester.tap(find.byKey(const Key('submit-demo-booking')));
      await tester.pumpAndSettle();
      expect(s.records('bookings').first['status'], 'confirmed');
      expect(s.records('bookings').first['amount'], 2550);
      expect(find.text('My bookings'), findsAtLeastNWidgets(1));
    },
  );
  testWidgets(
    'owner approval updates the assigned request after confirmation',
    (tester) async {
      await size(tester, 390);
      final s = await store('owner');
      await tester.pumpWidget(app(s, '/owner/maintenance'));
      await tester.pumpAndSettle();
      await reveal(tester, find.text('Approve').first);
      await tester.tap(find.text('Approve').first);
      await tester.pumpAndSettle();
      await tester.tap(find.text('Confirm'));
      await tester.pumpAndSettle();
      expect(s.records('maintenance').first['status'], 'approved');
      expect(s.records('maintenance').any((m) => m['id'] == 'm3'), isFalse);
    },
  );
  testWidgets(
    'global settings accept country currency timezone dates units and phone prefix through controls',
    (tester) async {
      await size(tester, 390);
      final s = await store('manager');
      await tester.pumpWidget(app(s, '/settings'));
      await tester.pumpAndSettle();
      Future<void> choose(String key, String option, double delta) async {
        await reveal(tester, find.byKey(ValueKey(key)));
        await tester.tap(find.byKey(ValueKey(key)));
        await tester.pumpAndSettle();
        await tester.scrollUntilVisible(
          find.text(option),
          delta,
          scrollable: find.byType(Scrollable).last,
          maxScrolls: 50,
        );
        await tester.pumpAndSettle();
        await tester.tap(find.text(option).last);
        await tester.pumpAndSettle();
      }

      await choose('choice-country-SA', 'US · United States', 500);
      await choose('choice-currency-SAR', 'USD · US Dollar', -500);
      await reveal(tester, find.byKey(const ValueKey('input-timeZone')));
      await tester.enterText(
        find.byKey(const ValueKey('input-timeZone')),
        'America/New_York',
      );
      await choose('choice-dateFormat-yyyy-MM-dd', 'dd/MM/yyyy', 300);
      await choose('choice-measurement-sqm', 'Square feet', 300);
      await reveal(tester, find.byKey(const ValueKey('input-phoneCode')));
      await tester.enterText(
        find.byKey(const ValueKey('input-phoneCode')),
        '+1',
      );
      await reveal(tester, find.byKey(const Key('save-global-preferences')));
      await tester.tap(find.byKey(const Key('save-global-preferences')));
      await tester.pumpAndSettle();
      expect(s.preferences['country'], 'US');
      expect(s.preferences['currency'], 'USD');
      expect(s.preferences['timeZone'], 'America/New_York');
      expect(s.preferences['measurement'], 'sqft');
      expect(s.preferences['phoneCode'], '+1');
      expect(s.date('2035-03-10'), '10/03/2035');
      expect(s.property('p-global-london')!['currency'], 'GBP');
      expect(tester.takeException(), isNull);
    },
  );
  testWidgets(
    'editing a property preserves edits across every wizard step and updates related views',
    (tester) async {
      await size(tester, 390);
      final s = await store('manager');
      await tester.pumpWidget(app(s, '/properties'));
      await tester.pumpAndSettle();
      await reveal(tester, find.text('Edit').first);
      await tester.tap(find.text('Edit').first);
      await tester.pumpAndSettle();
      await reveal(tester, find.byKey(const ValueKey('input-name')));
      await tester.enterText(
        find.byKey(const ValueKey('input-name')),
        'Cancelled edit',
      );
      await reveal(tester, find.byKey(const Key('interactive-wizard-back')));
      await tester.tap(find.byKey(const Key('interactive-wizard-back')));
      await tester.pumpAndSettle();
      expect(s.property('p1')!['name'], 'Al-Yasmin Compound II');
      await reveal(tester, find.text('Edit').first);
      await tester.tap(find.text('Edit').first);
      await tester.pumpAndSettle();
      await reveal(tester, find.byKey(const ValueKey('input-name')));
      await tester.enterText(
        find.byKey(const ValueKey('input-name')),
        'Edited portfolio residence',
      );
      for (var i = 1; i <= 6; i++) {
        await reveal(tester, find.byKey(const Key('interactive-wizard-next')));
        await tester.tap(find.byKey(const Key('interactive-wizard-next')));
        await tester.pumpAndSettle();
        expect(tester.takeException(), isNull);
      }
      expect(s.property('p1')!['name'], 'Edited portfolio residence');
      expect(find.text('Edited portfolio residence'), findsAtLeastNWidgets(1));
      expect(s.property('p1')!['currency'], 'SAR');
    },
  );
  testWidgets('eligible unit delete has cancel and confirm behavior', (
    tester,
  ) async {
    await size(tester, 390);
    final s = await store('manager');
    final p = await s.saveProperty({
      'name': 'Unit workflow',
      'city': 'London',
      'address': '15 Fictional Lane',
      'ownerId': 'owner1',
      'unitCount': 1,
      'price': 180,
      'country': 'GB',
      'currency': 'GBP',
      'timeZone': 'Europe/London',
      'ratePeriod': 'night',
      'published': true,
    });
    final id = s.all('units').last['id'];
    await tester.pumpWidget(app(s, '/units'));
    await tester.pumpAndSettle();
    await tester.enterText(find.byType(TextFormField).first, 'U-001');
    await tester.pumpAndSettle();
    await reveal(tester, find.text('Delete').first);
    await tester.tap(find.text('Delete').first);
    await tester.pumpAndSettle();
    await tester.tap(find.text('Cancel').last);
    await tester.pumpAndSettle();
    expect(s.all('units').any((u) => u['id'] == id), true);
    await tester.tap(find.text('Delete').first);
    await tester.pumpAndSettle();
    await tester.tap(find.text('Confirm'));
    await tester.pumpAndSettle();
    expect(s.all('units').any((u) => u['id'] == id), false);
    expect(s.property(p['id'])!['unitCount'], 0);
    expect(tester.takeException(), isNull);
  });
  testWidgets('reset restores the seed and logout returns to demo login', (
    tester,
  ) async {
    await size(tester, 390);
    final s = await store('manager');
    await s.bookingStatus('b2', 'approved');
    await tester.pumpWidget(app(s, '/settings'));
    await tester.pumpAndSettle();
    await reveal(tester, find.text('Reset preview data'));
    await tester.tap(find.text('Reset preview data'));
    await tester.pumpAndSettle();
    await tester.tap(find.text('Confirm'));
    await tester.pumpAndSettle();
    expect(
      s.all('bookings').firstWhere((b) => b['id'] == 'b2')['status'],
      'pending',
    );
    await tester.pumpWidget(const SizedBox.shrink());
    await tester.pumpWidget(app(s, '/profile'));
    await tester.pumpAndSettle();
    await reveal(tester, find.text('Logout'));
    await tester.tap(find.text('Logout'));
    await tester.pumpAndSettle();
    expect(s.user, isNull);
    expect(find.text('Welcome back'), findsOneWidget);
  });
}
