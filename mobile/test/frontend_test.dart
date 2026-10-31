import 'package:flutter/material.dart';
import 'package:flutter/services.dart';
import 'package:flutter_test/flutter_test.dart';
import 'package:aqar_mobile/app.dart';
import 'package:aqar_mobile/data/demo_data.dart';

Future<void> reveal(WidgetTester tester, Finder target) async {
  await tester.scrollUntilVisible(
    target,
    300,
    scrollable: find
        .descendant(
          of: find.byType(ListView).last,
          matching: find.byType(Scrollable),
        )
        .first,
    maxScrolls: 40,
  );
  await tester.pumpAndSettle();
}

void main() {
  TestWidgetsFlutterBinding.ensureInitialized();
  setUpAll(() async {
    final inter = FontLoader('Inter')
      ..addFont(rootBundle.load('assets/fonts/Inter-Regular.ttf'));
    final arabic = FontLoader('IBM Plex Sans Arabic')
      ..addFont(rootBundle.load('assets/fonts/Arabic-Regular.ttf'));
    await inter.load();
    await arabic.load();
  });

  final routes = [
    ...moduleLinks.map((link) => link.path),
    '/properties/demo',
    '/units/demo',
    '/more',
    ...List.generate(6, (i) => '/properties/add/step-${i + 1}'),
  ];
  for (final width in [320.0, 390.0, 1024.0]) {
    for (final path in routes) {
      testWidgets(
        '$path renders at ${width.toInt()}px without layout exceptions',
        (tester) async {
          tester.view.physicalSize = Size(width, 900);
          tester.view.devicePixelRatio = 1;
          addTearDown(tester.view.resetPhysicalSize);
          addTearDown(tester.view.resetDevicePixelRatio);
          await tester.pumpWidget(AqarApp(initialRoute: path));
          await tester.pumpAndSettle();
          expect(
            find.textContaining('Changes are not saved'),
            findsAtLeastNWidgets(1),
          );
          expect(find.text('Screen unavailable'), findsNothing);
          expect(tester.takeException(), isNull);
          final lists = find.byType(ListView);
          for (var i = 0; i < 3; i++) {
            await tester.drag(lists.last, const Offset(0, -900));
            await tester.pumpAndSettle();
            expect(tester.takeException(), isNull);
          }
        },
      );
    }
  }

  testWidgets('property search filters bundled sample records', (tester) async {
    await tester.pumpWidget(const AqarApp(initialRoute: '/properties'));
    await tester.pumpAndSettle();
    await tester.enterText(
      find.byKey(const Key('property-search')),
      'no-such-property',
    );
    await tester.pumpAndSettle();
    expect(
      find.text('No sample properties match. Try another search.'),
      findsOneWidget,
    );
    await tester.enterText(find.byKey(const Key('property-search')), 'Nakheel');
    await tester.pumpAndSettle();
    expect(find.text('1 sample properties shown'), findsOneWidget);
    await tester.ensureVisible(find.text('View property').first);
    await tester.pumpAndSettle();
    await tester.tap(find.text('View property').first);
    await tester.pumpAndSettle();
    expect(find.textContaining('Sample property detail'), findsOneWidget);
    expect(find.text('Al-Nakheel Private Chalet'), findsOneWidget);
  });

  testWidgets('all six wizard steps navigate and saving remains demo-only', (
    tester,
  ) async {
    await tester.pumpWidget(
      const AqarApp(initialRoute: '/properties/add/step-1'),
    );
    await tester.pumpAndSettle();
    await tester.enterText(
      find.byKey(const ValueKey('draft-name-1')),
      'Presentation property',
    );
    for (var step = 1; step < 6; step++) {
      await reveal(tester, find.byKey(const Key('wizard-next')));
      await tester.tap(find.byKey(const Key('wizard-next')));
      await tester.pumpAndSettle();
      expect(find.textContaining('Step ${step + 1} of 6'), findsOneWidget);
      expect(tester.takeException(), isNull);
    }
    expect(find.text('Presentation property'), findsOneWidget);
    await reveal(tester, find.byKey(const Key('demo-save-property')));
    await tester.tap(find.byKey(const Key('demo-save-property')));
    await tester.pumpAndSettle();
    expect(find.text('Frontend demonstration'), findsOneWidget);
    expect(find.textContaining('No data has been saved'), findsOneWidget);
    await tester.tap(find.text('Close'));
    await tester.pumpAndSettle();
    await tester.ensureVisible(find.byKey(const Key('wizard-back')));
    await tester.pumpAndSettle();
    await tester.tap(find.byKey(const Key('wizard-back')));
    await tester.pumpAndSettle();
    expect(find.textContaining('Step 5 of 6'), findsOneWidget);
  });

  testWidgets('booking approval never claims a successful operation', (
    tester,
  ) async {
    await tester.pumpWidget(const AqarApp(initialRoute: '/bookings'));
    await tester.pumpAndSettle();
    await reveal(tester, find.text('Al-Nakheel Luxury Chalet'));
    await tester.tap(find.text('Al-Nakheel Luxury Chalet'));
    await tester.pumpAndSettle();
    await tester.ensureVisible(find.text('Approve request'));
    await tester.pumpAndSettle();
    await tester.tap(find.text('Approve request'));
    await tester.pumpAndSettle();
    expect(find.text('Frontend demonstration'), findsOneWidget);
    expect(find.textContaining('No data has been saved'), findsOneWidget);
  });

  testWidgets('bottom navigation and workspace menu connect all modules', (
    tester,
  ) async {
    await tester.pumpWidget(const AqarApp());
    await tester.pumpAndSettle();
    await tester.tap(find.text('Properties').last);
    await tester.pumpAndSettle();
    expect(find.byKey(const Key('property-search')), findsOneWidget);
    await tester.tap(find.text('More').last);
    await tester.pumpAndSettle();
    expect(find.text('Your workspace'), findsOneWidget);
    await tester.ensureVisible(find.text('Documents').last);
    await tester.pumpAndSettle();
    await tester.tap(find.text('Documents').last);
    await tester.pumpAndSettle();
    expect(
      find.text('Static attachment references. No actual uploads.'),
      findsOneWidget,
    );
  });

  testWidgets('large text remains usable on a small display', (tester) async {
    tester.view.physicalSize = const Size(320, 900);
    tester.view.devicePixelRatio = 1;
    addTearDown(tester.view.resetPhysicalSize);
    addTearDown(tester.view.resetDevicePixelRatio);
    await tester.pumpWidget(
      MaterialApp(
        builder: (context, child) => MediaQuery(
          data: MediaQuery.of(context)
              .copyWith(textScaler: const TextScaler.linear(1.4)),
          child: child!,
        ),
        home: const AqarApp(),
      ),
    );
    await tester.pumpAndSettle();
    expect(tester.takeException(), isNull);
  });

  test('bundled property fixtures contain local asset bytes', () async {
    for (final property in properties) {
      expect(
        (await rootBundle.load('assets/images/${property.image}'))
            .lengthInBytes,
        greaterThan(0),
      );
    }
    expect(
      (await rootBundle.load('assets/images/f51d0c2ac2f3ec473efd.jpg'))
          .lengthInBytes,
      greaterThan(0),
    );
  });

  testWidgets('first-step cancel returns to properties from a direct entry', (
    tester,
  ) async {
    await tester.pumpWidget(
      const AqarApp(initialRoute: '/properties/add/step-1'),
    );
    await tester.pumpAndSettle();
    await reveal(tester, find.byKey(const Key('wizard-back')));
    await tester.tap(find.byKey(const Key('wizard-back')));
    await tester.pumpAndSettle();
    expect(find.byKey(const Key('property-search')), findsOneWidget);
  });

  testWidgets('unknown routes provide a safe return to the dashboard', (
    tester,
  ) async {
    await tester.pumpWidget(const AqarApp(initialRoute: '/unavailable'));
    await tester.pumpAndSettle();
    expect(find.text('Screen unavailable'), findsOneWidget);
    await tester.tap(find.text('Dashboard').last);
    await tester.pumpAndSettle();
    expect(find.text('Your portfolio,\nat a glance.'), findsOneWidget);
  });
}
