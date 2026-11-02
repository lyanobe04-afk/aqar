import 'dart:async';

import 'package:flutter/material.dart';
import 'package:flutter_localizations/flutter_localizations.dart';

import '../core/theme.dart';
import 'demo_store.dart';
import 'interactive_page.dart';

class InteractiveAqarApp extends StatefulWidget {
  final DemoStore? store;
  final String initialRoute;
  final bool monitorSession;
  const InteractiveAqarApp({
    super.key,
    this.store,
    this.initialRoute = '/welcome',
    this.monitorSession = true,
  });
  @override
  State<InteractiveAqarApp> createState() => _InteractiveAqarAppState();
}

class _InteractiveAqarAppState extends State<InteractiveAqarApp> {
  late Future<DemoStore> future;
  final navigatorKey = GlobalKey<NavigatorState>();
  Timer? timer;
  static const publicPaths = [
    '/welcome',
    '/onboarding',
    '/login',
    '/register',
    '/account-type',
    '/forgot-password',
    '/reset-password',
    '/session-expired',
  ];
  @override
  void initState() {
    super.initState();
    future = widget.store == null
        ? DemoStore.load()
        : Future.value(widget.store);
  }

  @override
  void dispose() {
    timer?.cancel();
    super.dispose();
  }

  String home(DemoStore s) => s.role == 'owner'
      ? '/owner'
      : s.role == 'tenant'
      ? '/tenant'
      : '/';
  String guard(DemoStore s, String path) {
    if (publicPaths.contains(path)) return path;
    if (s.user == null) {
      return s.session == null ? '/login' : '/session-expired';
    }
    if (path.startsWith('/owner') && s.role != 'owner' ||
        path.startsWith('/tenant') && s.role != 'tenant') {
      return home(s);
    }
    if (s.role != 'manager' &&
        !path.startsWith('/${s.role}') &&
        ![
          '/profile',
          '/profile/edit',
          '/profile/password',
          '/notifications',
          '/more',
        ].contains(path)) {
      return home(s);
    }
    return path;
  }

  @override
  Widget build(BuildContext context) => FutureBuilder<DemoStore>(
    future: future,
    builder: (context, snapshot) {
      if (!snapshot.hasData) {
        return MaterialApp(
          debugShowCheckedModeBanner: false,
          theme: aqarTheme(),
          home: Scaffold(
            body: Center(
              child: Padding(
                padding: const EdgeInsets.all(28),
                child: Column(
                  mainAxisSize: MainAxisSize.min,
                  children: [
                    const Icon(
                      Icons.apartment,
                      size: 64,
                      color: AqarColors.navy,
                    ),
                    const SizedBox(height: 18),
                    const Text(
                      'Aqar · عقار',
                      style: TextStyle(
                        fontSize: 28,
                        fontWeight: FontWeight.w700,
                      ),
                    ),
                    const SizedBox(height: 12),
                    if (snapshot.hasError) ...[
                      const Text('Demo data could not be loaded.'),
                      const SizedBox(height: 10),
                      FilledButton(
                        onPressed: () =>
                            setState(() => future = DemoStore.load()),
                        child: const Text('Retry'),
                      ),
                    ] else ...[
                      const Text('Loading local demonstration…'),
                      const SizedBox(height: 18),
                      const CircularProgressIndicator(),
                    ],
                  ],
                ),
              ),
            ),
          ),
        );
      }
      final store = snapshot.data!;
      if (widget.monitorSession) {
        timer ??= Timer.periodic(const Duration(seconds: 30), (_) async {
          if (store.session != null && store.user == null) {
            await store.logout();
            navigatorKey.currentState?.pushNamedAndRemoveUntil(
              '/session-expired',
              (_) => false,
            );
          }
        });
      }
      return AnimatedBuilder(
        animation: store,
        builder: (context, _) => MaterialApp(
          navigatorKey: navigatorKey,
          title: 'Aqar Property Portal',
          debugShowCheckedModeBanner: false,
          theme: aqarTheme(),
          locale: Locale(store.locale),
          supportedLocales: (store.global['languages'] as Map).keys
              .map((code) => Locale(code.toString()))
              .toList(),
          localizationsDelegates: GlobalMaterialLocalizations.delegates,
          initialRoute: widget.initialRoute,
          onGenerateInitialRoutes: (path) => [
            _route(store, RouteSettings(name: path)),
          ],
          onGenerateRoute: (settings) => _route(store, settings),
        ),
      );
    },
  );
  Route<void> _route(DemoStore store, RouteSettings settings) {
    final path = guard(store, settings.name ?? '/');
    return MaterialPageRoute<void>(
      settings: RouteSettings(name: path, arguments: settings.arguments),
      builder: (_) => InteractivePage(
        store: store,
        path: path,
        args: settings.arguments is Map
            ? Map<String, dynamic>.from(settings.arguments as Map)
            : <String, dynamic>{},
      ),
    );
  }
}
