import 'package:flutter/material.dart';

import 'core/theme.dart';
import 'data/demo_data.dart';
import 'screens/dashboard_screen.dart';
import 'screens/module_screen.dart';
import 'screens/property_screens.dart';
import 'screens/property_wizard.dart';
import 'screens/report_settings_screens.dart';
import 'widgets/app_shell.dart';
import 'widgets/demo_widgets.dart';

class AqarApp extends StatefulWidget {
  final String initialRoute;
  const AqarApp({super.key, this.initialRoute = '/'});
  @override
  State<AqarApp> createState() => _AqarAppState();
}

class _AqarAppState extends State<AqarApp> {
  final draft = PropertyDraft();
  @override
  Widget build(BuildContext context) => MaterialApp(
    title: 'Aqar Property Portal · Demo',
    debugShowCheckedModeBanner: false,
    theme: aqarTheme(),
    initialRoute: widget.initialRoute,
    onGenerateInitialRoutes: (name) => [screenRoute(RouteSettings(name: name))],
    onGenerateRoute: screenRoute,
  );

  Route<void> screenRoute(RouteSettings settings) {
    final path = settings.name ?? '/';
    final step = RegExp(r'^/properties/add/step-([1-6])$').firstMatch(path);
    Widget page;
    String title;
    if (step != null) {
      page = PropertyWizard(step: int.parse(step.group(1)!), draft: draft);
      title = 'Add property';
    } else if (modules.containsKey(path)) {
      page = ModuleScreen(path: path, module: modules[path]!);
      title = modules[path]!.title;
    } else {
      switch (path) {
        case '/':
          page = const DashboardScreen();
          title = 'Aqar';
        case '/dashboard/ar':
          page = const DashboardScreen(arabic: true);
          title = 'عقار';
        case '/properties':
          page = const PropertiesScreen();
          title = 'Properties';
        case '/properties/demo':
          page = PropertyDetailsScreen(
            property: settings.arguments is PropertyPreview
                ? settings.arguments as PropertyPreview
                : properties.first,
          );
          title = 'Property details';
        case '/units/demo':
          page = UnitDetailsScreen(
            unit: settings.arguments is PreviewRecord
                ? settings.arguments as PreviewRecord
                : modules['/units']!.records.first,
          );
          title = 'Unit details';
        case '/reports':
          page = const ReportsScreen();
          title = 'Reports';
        case '/reports/operations':
          page = const ReportsScreen(operational: true);
          title = 'Operational reports';
        case '/settings':
          page = const SettingsScreen();
          title = 'Settings';
        case '/more':
          page = const MoreScreen();
          title = 'Workspace';
        default:
          page = const DemoPage(
            title: 'Screen unavailable',
            subtitle: 'This route is not part of the frontend demonstration.',
            children: [
              ModuleShortcut(
                title: 'Dashboard',
                subtitle: 'Return to the portfolio overview',
                path: '/',
                icon: Icons.dashboard_outlined,
              ),
            ],
          );
          title = 'Aqar';
      }
    }
    return MaterialPageRoute<void>(
      settings: settings,
      builder: (_) => AppShell(path: path, title: title, child: page),
    );
  }
}
