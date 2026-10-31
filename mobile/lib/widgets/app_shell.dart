import 'package:flutter/material.dart';

import '../core/theme.dart';
import '../data/demo_data.dart';
import 'demo_widgets.dart';

class AppShell extends StatelessWidget {
  final String path, title;
  final Widget child;
  const AppShell({
    super.key,
    required this.path,
    required this.title,
    required this.child,
  });
  void go(BuildContext context, String target) {
    if (path == target) return;
    Navigator.pushNamedAndRemoveUntil(context, target, (_) => false);
  }

  @override
  Widget build(BuildContext context) {
    final index = path == '/' || path == '/dashboard/ar'
        ? 0
        : path.startsWith('/properties')
        ? 1
        : path == '/bookings'
        ? 2
        : 3;
    return LayoutBuilder(
      builder: (context, constraints) {
        final wide = constraints.maxWidth >= 1000;
        final menu = SafeArea(
          child: Column(
            children: [
              const ListTile(
                contentPadding: EdgeInsets.all(20),
                leading: Icon(
                  Icons.apartment,
                  color: AqarColors.navy,
                  size: 34,
                ),
                title: Text(
                  'Aqar',
                  style: TextStyle(
                    fontSize: 23,
                    fontWeight: FontWeight.w700,
                    color: AqarColors.navy,
                  ),
                ),
                subtitle: Text(
                  'PROPERTY PORTAL · DEMO',
                  style: TextStyle(fontSize: 9, letterSpacing: 1),
                ),
              ),
              const Divider(height: 1),
              Expanded(
                child: ListView(
                  padding: const EdgeInsets.all(12),
                  children: moduleLinks
                      .map(
                        (link) => ListTile(
                          dense: true,
                          selected: path == link.path,
                          selectedTileColor: AqarColors.tint,
                          shape: RoundedRectangleBorder(
                            borderRadius: BorderRadius.circular(8),
                          ),
                          leading: Icon(link.icon, size: 21),
                          title: Text(
                            link.title,
                            style: const TextStyle(fontSize: 12),
                          ),
                          onTap: () {
                            if (!wide) Navigator.pop(context);
                            go(context, link.path);
                          },
                        ),
                      )
                      .toList(),
                ),
              ),
              const Padding(
                padding: EdgeInsets.all(18),
                child: Text(
                  'Frontend demonstration · Phase 1',
                  style: TextStyle(fontSize: 11),
                ),
              ),
            ],
          ),
        );
        return Scaffold(
          appBar: AppBar(
            title: Column(
              crossAxisAlignment: CrossAxisAlignment.start,
              children: [
                Text(
                  title,
                  style: const TextStyle(
                    fontSize: 17,
                    fontWeight: FontWeight.w700,
                  ),
                ),
                const Text(
                  'AQAR PROPERTY PORTAL',
                  style: TextStyle(fontSize: 8, letterSpacing: 1.2),
                ),
              ],
            ),
            actions: [
              IconButton(
                tooltip: 'Demo notifications',
                onPressed: () => showDemoNotice(context, 'Notifications'),
                icon: const Badge(
                  label: Text('3'),
                  child: Icon(Icons.notifications_outlined),
                ),
              ),
              const SizedBox(width: 8),
            ],
          ),
          drawer: wide ? null : Drawer(child: menu),
          body: SafeArea(
            top: false,
            child: Row(
              children: [
                if (wide) SizedBox(width: 260, child: menu),
                if (wide) const VerticalDivider(width: 1),
                Expanded(
                  child: Center(
                    child: ConstrainedBox(
                      constraints: const BoxConstraints(maxWidth: 1080),
                      child: child,
                    ),
                  ),
                ),
              ],
            ),
          ),
          bottomNavigationBar: wide
              ? null
              : NavigationBar(
                  selectedIndex: index,
                  onDestinationSelected: (i) => go(
                    context,
                    ['/', '/properties', '/bookings', '/more'][i],
                  ),
                  destinations: const [
                    NavigationDestination(
                      icon: Icon(Icons.dashboard_outlined),
                      selectedIcon: Icon(Icons.dashboard),
                      label: 'Overview',
                    ),
                    NavigationDestination(
                      icon: Icon(Icons.apartment_outlined),
                      selectedIcon: Icon(Icons.apartment),
                      label: 'Properties',
                    ),
                    NavigationDestination(
                      icon: Icon(Icons.event_available_outlined),
                      selectedIcon: Icon(Icons.event_available),
                      label: 'Bookings',
                    ),
                    NavigationDestination(
                      icon: Icon(Icons.apps_outlined),
                      selectedIcon: Icon(Icons.apps),
                      label: 'More',
                    ),
                  ],
                ),
        );
      },
    );
  }
}

class MoreScreen extends StatelessWidget {
  const MoreScreen({super.key});
  @override
  Widget build(BuildContext context) => DemoPage(
    title: 'Your workspace',
    subtitle: 'Explore every management screen.',
    children: [
      SurfaceCard(
        child: Column(
          children: moduleLinks
              .map(
                (link) => ModuleShortcut(
                  title: link.title,
                  subtitle: 'Open static demonstration',
                  path: link.path,
                  icon: link.icon,
                ),
              )
              .toList(),
        ),
      ),
    ],
  );
}
