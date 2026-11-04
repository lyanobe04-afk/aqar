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
    );
    translations = jsonDecode(
      await rootBundle.loadString('assets/data/demo-i18n.json'),
    );
  });
  for (final role in ['manager', 'owner', 'tenant']) {
    for (final locale in ['en', 'ar']) {
      for (final size in [
        const Size(1366, 768),
        const Size(768, 1024),
        const Size(390, 844),
      ]) {
        testWidgets(
          '$role compact header ${size.width} $locale menus, dismiss, read, routes and logout',
          (tester) async {
            tester.view.physicalSize = size;
            tester.view.devicePixelRatio = 1;
            addTearDown(tester.view.resetPhysicalSize);
            addTearDown(tester.view.resetDevicePixelRatio);
            final s = DemoStore(seed, translations, (_) async {});
            await s.login('$role@aqar.demo', 'Demo123!');
            await s.settings(language: locale);
            final path = role == 'manager' ? '/' : '/$role';
            await tester.pumpWidget(
              InteractiveAqarApp(
                store: s,
                initialRoute: path,
                monitorSession: false,
              ),
            );
            await pumpUi(tester);
            expect(find.byKey(const Key('header-logout')), findsNothing);
            await tester.tap(find.byKey(const Key('header-language')));
            await pumpUi(tester);
            expect(find.byKey(Key('header-locale-$locale')), findsOneWidget);
            await tester.sendKeyEvent(LogicalKeyboardKey.escape);
            await pumpUi(tester);
            expect(find.byKey(Key('header-locale-$locale')), findsNothing);
            await tester.tap(find.byKey(const Key('header-language')));
            await pumpUi(tester);
            final other = locale == 'en' ? 'ar' : 'en';
            await tester.tap(find.byKey(Key('header-locale-$other')));
            await pumpUi(tester);
            expect(s.locale, other);
            final unread = s
                .records('notifications')
                .where((n) => n['read'] != true)
                .length;
            await tester.tap(find.byKey(const Key('header-notifications')));
            await pumpUi(tester);
            final records = s.records('notifications');
            if (records.isNotEmpty && records.first['read'] != true) {
              await tester.tap(
                find.byKey(Key('header-notification-${records.first['id']}')),
              );
              await pumpUi(tester);
              expect(records.first['read'], true);
              expect(
                s
                    .records('notifications')
                    .where((n) => n['read'] != true)
                    .length,
                unread - 1,
              );
            }
            await tester.tap(
              find.byKey(const Key('header-view-notifications')),
            );
            await pumpUi(tester);
            expect(find.text(s.t('Mark all as read')), findsOneWidget);
            await tester.tap(find.byKey(const Key('header-profile')));
            await pumpUi(tester);
            expect(find.text(s.label(s.user)), findsWidgets);
            await tester.tapAt(const Offset(2, 2));
            await pumpUi(tester);
            expect(find.byKey(const Key('header-logout')), findsNothing);
            await tester.tap(find.byKey(const Key('header-profile')));
            await pumpUi(tester);
            await tester.tap(find.byKey(const Key('header-view-profile')));
            await pumpUi(tester);
            expect(find.text(s.t('Edit profile')), findsWidgets);
            await tester.tap(find.byKey(const Key('header-profile')));
            await pumpUi(tester);
            await tester.tap(find.byKey(const Key('header-logout')));
            await pumpUi(tester);
            expect(s.user, isNull);
            expect(tester.takeException(), isNull);
          },
        );
      }
    }
  }
}
