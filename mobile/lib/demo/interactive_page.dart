import 'screens/handover_workspace.dart';

import 'dart:convert';

import 'package:flutter/material.dart';
import 'package:intl/intl.dart';

import '../app.dart' show AqarApp;
import '../core/theme.dart';
import '../data/demo_data.dart' show moduleLinks;
import '../widgets/demo_widgets.dart'
    show SurfaceCard, ImagePreview, InfoPair, AdaptiveTiles, MetricTile;
import 'demo_store.dart';
import 'demo_forms.dart';
import 'widgets/login_layout.dart';
import 'widgets/shared_header.dart';
import 'widgets/dashboard_layout.dart';
import 'widgets/welcome_layout.dart';

part 'screens/account_screens.dart';
part 'screens/property_screens.dart';
part 'screens/record_screens.dart';
part 'widgets/record_dialogs.dart';
part 'widgets/booking_property_fields.dart';

class InteractivePage extends StatefulWidget {
  final DemoStore store;
  final String path;
  final Record args;
  const InteractivePage({
    super.key,
    required this.store,
    required this.path,
    this.args = const {},
  });
  @override
  State<InteractivePage> createState() => _InteractivePageState();
}

class _InteractivePageState extends State<InteractivePage> {
  DemoStore get s => widget.store;
  String get path => widget.path;
  Record get args => widget.args;
  final formKey = GlobalKey<FormState>();
  Record values = {};
  String search = '',
      filter = 'all',
      city = 'all',
      category = 'all',
      country = 'all';
  int page = 1;
  bool busy = false, remember = false;
  final searchController = TextEditingController();
  @override
  void dispose() {
    searchController.dispose();
    super.dispose();
  }

  String? error;
  int get step => int.tryParse(path.split('step-').last) ?? 1;
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
  bool get isPublic => publicPaths.contains(path);
  bool get customAuth => [
    '/login',
    '/register',
    '/welcome',
    '/onboarding',
    '/account-type',
  ].contains(path);
  String get home => s.role == 'owner'
      ? '/owner'
      : s.role == 'tenant'
      ? '/tenant'
      : '/';
  String scoped(String item) =>
      s.role == 'manager' ? '/$item' : '/${s.role}/$item';
  String t(String key) => s.t(key);
  String money(dynamic amount, [dynamic record]) {
    final number = amount is num ? amount : num.tryParse('$amount') ?? 0;
    return NumberFormat.currency(
      locale: s.locale == 'ar' ? 'ar' : 'en',
      name: s.currency(record),
      symbol: s.currency(record),
    ).format(number);
  }

  List<(String, String)> get countryChoices => s.countries
      .map((c) => ('${c['code']}', '${c['code']} · ${t(c['name'])}'))
      .toList();
  List<(String, String)> get currencyChoices => (s.global['currencies'] as Map)
      .entries
      .map((e) => ('${e.key}', '${e.key} · ${t(e.value)}'))
      .toList();
  String area(dynamic value) {
    final n = num.tryParse('$value') ?? 0;
    return '${NumberFormat.decimalPattern(s.locale).format(num.parse((n * (s.preferences['measurement'] == 'sqft' ? 10.7639104 : 1)).toStringAsFixed(1)))} ${s.preferences['measurement'] == 'sqft' ? 'ft²' : 'm²'}';
  }

  Widget currencyNote() => banner(
    'Amounts remain in their original currency. Exchange-rate conversion is unavailable.',
  );
  String propName(dynamic id) => s.label(s.property('$id'));
  String errorText(Object e) =>
      t(e is StateError ? e.message.toString() : e.toString());
  void go(
    String target, {
    Record arguments = const {},
    bool replace = false,
    bool reset = false,
  }) {
    if (reset) {
      Navigator.pushNamedAndRemoveUntil(
        context,
        target,
        (_) => false,
        arguments: arguments,
      );
    } else if (replace) {
      Navigator.pushReplacementNamed(context, target, arguments: arguments);
    } else {
      Navigator.pushNamed(context, target, arguments: arguments);
    }
  }

  @override
  void initState() {
    super.initState();
    values = {
      'email': args['email'] ?? '',
      'password': '',
      'role': args['role'] ?? 'tenant',
      'locale': s.locale,
      'country': s.preferences['country'],
      'phoneCode': s.preferences['phoneCode'],
    };
    if (path.startsWith('/properties/add/') || path == '/properties/edit') {
      final old = args['id'] == null ? null : s.property(args['id']);
      final saved = Map<String, dynamic>.from(s.state['draft'] as Map);
      values = {
        'name': '',
        'category': 'Apartment',
        'city': '',
        'country': s.preferences['country'],
        'currency': s.preferences['currency'],
        'timeZone': s.preferences['timeZone'],
        'region': '',
        'postalCode': '',
        'listingType': 'rent',
        'publication': 'published',
        'availability': 'available',
        'ratePeriod': 'month',
        'minNights': 1,
        'amenities': <String>[],
        'address': '',
        'district': '',
        'ownerId': 'owner1',
        'unitCount': '1',
        'price': '7500',
        'policy': 'request',
        'published': 'true',
        'manager': 'Sultan Al-Najdi',
        'fee': '8.5',
        ...?old,
        if ((old == null && saved['editId'] == null) ||
            (old != null && saved['editId'] == old['id']))
          ...saved,
      };
      if (old != null) values['editId'] = old['id'];
    }
    if (path.endsWith('/settings')) values = {...s.preferences};
    if (path == '/profile/edit') {
      values = {
        'name': s.user?['name'] ?? '',
        'phone': s.user?['phone'] ?? '',
        'country': s.user?['country'] ?? s.preferences['country'],
        'phoneCode': s.user?['phoneCode'] ?? s.preferences['phoneCode'],
      };
    }
    if (path == '/tenant/booking' || path == '/tenant/calendar') {
      values = bookingDefaults();
    }
  }

  List<(String, String, IconData)> get navigation {
    if (s.role == 'owner') {
      return [
        ('/owner', 'Owner dashboard', Icons.dashboard_outlined),
        ('/owner/properties', 'My properties', Icons.apartment_outlined),
        ('/owner/occupancy', 'Occupancy overview', Icons.key_outlined),
        ('/owner/income', 'Rental income', Icons.payments_outlined),
        ('/owner/expenses', 'Expenses', Icons.receipt_long_outlined),
        ('/owner/profit', 'Net profit', Icons.trending_up),
        ('/owner/reports', 'Financial reports', Icons.bar_chart),
        ('/owner/maintenance', 'Maintenance approvals', Icons.build_outlined),
        (
          '/owner/handover',
          'Unit inventory & handover',
          Icons.fact_check_outlined,
        ),
        ('/owner/furniture', 'Furniture inventory', Icons.chair_outlined),
        ('/owner/documents', 'Documents', Icons.folder_outlined),
        ('/owner/notifications', 'Notifications', Icons.notifications_outlined),
        ('/profile', 'Profile', Icons.person_outline),
        ('/owner/settings', 'Settings', Icons.settings_outlined),
      ];
    }
    if (s.role == 'tenant') {
      return [
        ('/tenant', 'Tenant dashboard', Icons.dashboard_outlined),
        ('/tenant/browse', 'Browse properties', Icons.apartment_outlined),
        ('/tenant/bookings', 'My bookings', Icons.event_outlined),
        ('/tenant/contracts', 'My contracts', Icons.description_outlined),
        ('/tenant/payments', 'My payments', Icons.payments_outlined),
        ('/tenant/maintenance', 'Maintenance requests', Icons.build_outlined),
        (
          '/tenant/handover',
          'Unit inventory & handover',
          Icons.fact_check_outlined,
        ),
        (
          '/tenant/inspection',
          'Condition inspection',
          Icons.fact_check_outlined,
        ),
        ('/tenant/documents', 'Documents', Icons.folder_outlined),
        (
          '/tenant/notifications',
          'Notifications',
          Icons.notifications_outlined,
        ),
        ('/profile', 'Profile', Icons.person_outline),
        ('/tenant/settings', 'Settings', Icons.settings_outlined),
      ];
    }
    return [
      ('/', 'Dashboard', Icons.dashboard_outlined),
      ('/properties', 'Properties', Icons.apartment_outlined),
      ('/units', 'Units', Icons.meeting_room_outlined),
      ('/owners', 'Owners', Icons.business_outlined),
      ('/tenants', 'Tenants', Icons.people_outline),
      ('/bookings', 'Bookings', Icons.event_outlined),
      ('/contracts', 'Contracts', Icons.description_outlined),
      ('/payments', 'Payments', Icons.payments_outlined),
      (
        '/receivables',
        'Rent collection',
        Icons.account_balance_wallet_outlined,
      ),
      ('/maintenance', 'Maintenance', Icons.build_outlined),
      ('/handover', 'Unit inventory & handover', Icons.fact_check_outlined),
      ('/furniture', 'Furniture inventory', Icons.chair_outlined),
      ('/documents', 'Documents', Icons.folder_outlined),
      ('/reports', 'Reports & analytics', Icons.bar_chart),
      ('/reports/operations', 'Operational reports', Icons.analytics_outlined),
      ('/notifications', 'Notifications', Icons.notifications_outlined),
      ('/profile', 'Profile', Icons.person_outline),
      ('/settings', 'Settings', Icons.settings_outlined),
    ];
  }

  @override
  Widget build(BuildContext context) => AnimatedBuilder(
    animation: s,
    builder: (context, _) {
      if (!isPublic && s.user == null) {
        return const Scaffold(body: Center(child: CircularProgressIndicator()));
      }
      final desktop = MediaQuery.sizeOf(context).width >= 1000;
      final menu = SafeArea(
        child: Column(
          children: [
            const ListTile(
              leading: Icon(Icons.apartment, color: AqarColors.navy, size: 34),
              title: Text(
                'Aqar · عقار',
                style: TextStyle(fontWeight: FontWeight.w700),
              ),
              subtitle: Text('PROPERTY PORTAL', style: TextStyle(fontSize: 9)),
            ),
            Expanded(
              child: ListView(
                padding: const EdgeInsets.all(10),
                children: [
                  ...navigation.map(
                    (n) => ListTile(
                      dense: true,
                      shape: RoundedRectangleBorder(
                        borderRadius: BorderRadius.circular(8),
                      ),
                      selected: path == n.$1,
                      selectedTileColor: AqarColors.tint,
                      leading: Icon(n.$3, size: 21),
                      title: Text(
                        t(n.$2),
                        style: const TextStyle(fontSize: 12),
                      ),
                      onTap: () {
                        if (!desktop) Navigator.pop(context);
                        go(n.$1, reset: true);
                      },
                    ),
                  ),
                  if (s.role == 'manager')
                    ListTile(
                      leading: const Icon(Icons.palette_outlined),
                      title: Text(t('Design references')),
                      onTap: () {
                        if (!desktop) Navigator.pop(context);
                        go('/designs');
                      },
                    ),
                  ListTile(
                    leading: const Icon(Icons.logout),
                    title: Text(t('Logout')),
                    onTap: () async {
                      if (!desktop) Navigator.pop(context);
                      await s.logout();
                      if (mounted) go('/login', reset: true);
                    },
                  ),
                ],
              ),
            ),
            Padding(
              padding: const EdgeInsets.all(16),
              child: Text(
                t('Demo only · Not production authentication'),
                style: const TextStyle(fontSize: 10, color: AqarColors.muted),
              ),
            ),
          ],
        ),
      );
      final tabs = s.role == 'owner'
          ? ['/owner', '/owner/properties', '/owner/income', '/more']
          : s.role == 'tenant'
          ? ['/tenant', '/tenant/browse', '/tenant/bookings', '/more']
          : ['/', '/properties', '/bookings', '/more'];
      final selected = path == tabs[0]
          ? 0
          : path.startsWith('/properties') ||
                path == tabs[1] ||
                path.endsWith('/property')
          ? 1
          : path == tabs[2]
          ? 2
          : 3;
      return Scaffold(
        appBar: customAuth
            ? null
            : AppBar(
                title: Text(
                  isPublic
                      ? 'Aqar · عقار'
                      : navigation.where((n) => n.$1 == path).firstOrNull?.$2 ==
                            null
                      ? t('Property portal')
                      : t(navigation.firstWhere((n) => n.$1 == path).$2),
                  style: const TextStyle(
                    fontSize: 17,
                    fontWeight: FontWeight.w700,
                  ),
                ),
                actions: [
                  AqarHeaderActions(
                    store: s,
                    signedIn: !isPublic,
                    onProfile: () => go('/profile'),
                    onNotifications: () => go(scoped('notifications')),
                    onLogout: () async {
                      await s.logout();
                      if (mounted) go('/login', reset: true);
                    },
                    onRead: (id) => run(
                      () => s.commit(
                        () =>
                            s
                                    .records('notifications')
                                    .firstWhere((n) => n['id'] == id)['read'] =
                                true,
                      ),
                    ),
                  ),
                ],
              ),
        drawer: isPublic || desktop ? null : Drawer(child: menu),
        body: SafeArea(
          top: false,
          child: Row(
            children: [
              if (!isPublic && desktop) SizedBox(width: 240, child: menu),
              if (!isPublic && desktop) const VerticalDivider(width: 1),
              Expanded(
                child: Center(
                  child: ConstrainedBox(
                    constraints: BoxConstraints(
                      maxWidth: customAuth
                          ? double.infinity
                          : ['/', '/owner', '/tenant'].contains(path)
                          ? 1280
                          : 1050,
                    ),
                    child: body(),
                  ),
                ),
              ),
            ],
          ),
        ),
        bottomNavigationBar: isPublic || desktop
            ? null
            : NavigationBar(
                selectedIndex: selected,
                onDestinationSelected: (i) => go(tabs[i], reset: true),
                destinations: [
                  NavigationDestination(
                    icon: const Icon(Icons.dashboard_outlined),
                    label: t('Dashboard'),
                  ),
                  NavigationDestination(
                    icon: const Icon(Icons.apartment_outlined),
                    label: t(
                      s.role == 'tenant'
                          ? 'Browse properties'
                          : s.role == 'owner'
                          ? 'My properties'
                          : 'Properties',
                    ),
                  ),
                  NavigationDestination(
                    icon: Icon(
                      s.role == 'owner'
                          ? Icons.payments_outlined
                          : Icons.event_outlined,
                    ),
                    label: t(s.role == 'owner' ? 'Rental income' : 'Bookings'),
                  ),
                  NavigationDestination(
                    icon: const Icon(Icons.apps),
                    label: t('Menu'),
                  ),
                ],
              ),
      );
    },
  );
  Widget banner([String? text]) => Container(
    margin: const EdgeInsets.only(bottom: 20),
    padding: const EdgeInsets.all(12),
    decoration: BoxDecoration(
      color: AqarColors.tint,
      borderRadius: BorderRadius.circular(10),
    ),
    child: Row(
      crossAxisAlignment: CrossAxisAlignment.start,
      children: [
        const Icon(Icons.info_outline, size: 18, color: AqarColors.navy),
        const SizedBox(width: 8),
        Expanded(
          child: Text(
            t(
              text ?? 'Interactive demo · Fictional records · Changes are saved locally only · No real transactions',
            ),
            style: const TextStyle(fontSize: 11, color: AqarColors.muted),
          ),
        ),
      ],
    ),
  );
  Widget pageView(
    String title,
    List<Widget> children, {
    String subtitle = '',
  }) => ListView(
    key: ValueKey(path),
    padding: const EdgeInsets.symmetric(horizontal: 20, vertical: 24),
    children: [
      Center(
        child: ConstrainedBox(
          constraints: const BoxConstraints(maxWidth: 1280),
          child: Column(
            crossAxisAlignment: CrossAxisAlignment.stretch,
            children: [
              Text(t(title), style: Theme.of(context).textTheme.headlineMedium),
              if (subtitle.isNotEmpty) ...[
                const SizedBox(height: 8),
                Text(t(subtitle)),
              ],
              const SizedBox(height: 20),
              if (error != null) errorBox(error!),
              ...children,
              const SizedBox(height: 20),
            ],
          ),
        ),
      ),
    ],
  );
  Widget errorBox(String text) => Container(
    margin: const EdgeInsets.only(bottom: 16),
    padding: const EdgeInsets.all(12),
    decoration: BoxDecoration(
      color: const Color(0xFFFCEBE9),
      borderRadius: BorderRadius.circular(8),
    ),
    child: Text(
      text,
      style: const TextStyle(color: AqarColors.error, fontSize: 12),
    ),
  );
  Widget card(String title, List<Widget> children) => SurfaceCard(
    child: Column(
      crossAxisAlignment: CrossAxisAlignment.start,
      children: [
        if (title.isNotEmpty) ...[
          Text(t(title), style: Theme.of(context).textTheme.titleMedium),
          const SizedBox(height: 14),
        ],
        DemoFormGrid(children: children),
      ],
    ),
  );
  Widget action(
    String label,
    VoidCallback onPressed, {
    bool primary = false,
    Key? key,
    bool danger = false,
    bool enabled = true,
  }) => primary
      ? FilledButton(
          key: key,
          onPressed: busy || !enabled ? null : onPressed,
          child: Text(t(label)),
        )
      : OutlinedButton(
          key: key,
          onPressed: busy || !enabled ? null : onPressed,
          style: danger
              ? OutlinedButton.styleFrom(foregroundColor: AqarColors.error)
              : null,
          child: Text(t(label)),
        );
  Widget actions(List<Widget> children) => Padding(
    padding: const EdgeInsets.only(top: 8, bottom: 16),
    child: Wrap(spacing: 8, runSpacing: 10, children: children),
  );
  Widget badge(String status) {
    final color =
        [
          'approved',
          'confirmed',
          'verified',
          'active',
          'completed',
          'good',
          'paid',
        ].contains(status)
        ? AqarColors.emerald
        : ['cancelled', 'rejected', 'overdue', 'damaged'].contains(status)
        ? AqarColors.error
        : [
            'pending',
            'pending approval',
            'draft',
            'in progress',
            'maintenance',
          ].contains(status)
        ? AqarColors.warning
        : AqarColors.navy;
    return Container(
      padding: const EdgeInsets.symmetric(horizontal: 9, vertical: 5),
      decoration: BoxDecoration(
        color: color.withValues(alpha: .09),
        borderRadius: BorderRadius.circular(6),
      ),
      child: Text(
        t(status),
        style: TextStyle(
          fontSize: 11,
          fontWeight: FontWeight.w600,
          color: color,
        ),
      ),
    );
  }

  Widget pair(String label, dynamic value) => InfoPair(t(label), '$value');
  Widget empty([String message = 'No matching demo records.']) =>
      card('Nothing here yet', [Text(t(message))]);
  DemoField field(
    Record v,
    String key,
    String label, {
    bool required = true,
    bool secret = false,
    String? type,
    int lines = 1,
    List<(String, String)>? choices,
  }) => DemoField(
    key: ValueKey('$path-$key'),
    store: s,
    values: v,
    name: key,
    label: label,
    required: required,
    secret: secret,
    type: type,
    lines: lines,
    choices: choices,
  );
  Future<void> run(
    Future<void> Function() callback, {
    String message = 'Sample records updated locally.',
  }) async {
    if (busy) return;
    setState(() {
      busy = true;
      error = null;
    });
    try {
      await callback();
      if (mounted && message.isNotEmpty) {
        ScaffoldMessenger.of(context)
            .showSnackBar(SnackBar(content: Text(t(message))));
      }
    } catch (e) {
      if (mounted) setState(() => error = errorText(e));
    } finally {
      if (mounted) setState(() => busy = false);
    }
  }

  Future<bool> confirm(String title) async =>
      await showDialog<bool>(
        context: context,
        builder: (c) => AlertDialog(
          title: Text(t(title)),
          content: Text(t('This changes fictional local records only.')),
          actions: [
            TextButton(
              onPressed: () => Navigator.pop(c, false),
              child: Text(t('Cancel')),
            ),
            FilledButton(
              onPressed: () => Navigator.pop(c, true),
              child: Text(t('Confirm')),
            ),
          ],
        ),
      ) ??
      false;
  Future<void> unavailable() async => showDialog<void>(
    context: context,
    builder: (c) => AlertDialog(
      title: Text(t('Not available in this demo')),
      content: Text(
        t(
          'This optional feature is not available in this demo. No external action was performed.',
        ),
      ),
      actions: [
        TextButton(onPressed: () => Navigator.pop(c), child: Text(t('Close'))),
      ],
    ),
  );
  void redraw(VoidCallback callback) => setState(callback);

  Widget body() {
    if (isPublic) return auth();
    if (path == '/' ||
        path == '/dashboard/ar' ||
        path == '/owner' ||
        path == '/tenant') {
      return dashboard();
    }
    if (path == '/properties' ||
        path == '/owner/properties' ||
        path == '/tenant/browse') {
      return properties();
    }
    if ([
      '/properties/demo',
      '/owner/property',
      '/tenant/property',
    ].contains(path)) {
      return propertyDetail();
    }
    if (path.startsWith('/properties/add/') || path == '/properties/edit') {
      return wizard();
    }
    if (path == '/units/demo') return unitDetail();
    if (path == '/units') return unitList();
    if (path == '/owners' || path == '/tenants') {
      return people(path.substring(1));
    }
    if (path == '/tenant/calendar') return calendar();
    if (path == '/tenant/booking') return bookingPage();
    if (path.endsWith('/handover')) return HandoverWorkspace(store: s);
    if (path == '/tenant/inspection') return inspection();
    if (path.startsWith('/profile')) return profile();
    if (path.endsWith('/settings')) return settings();
    if (path.endsWith('/notifications')) return notifications();
    if (path == '/more') {
      return pageView('Menu', [
        card(
          '',
          navigation
              .map(
                (n) => ListTile(
                  contentPadding: EdgeInsets.zero,
                  leading: Icon(n.$3, color: AqarColors.navy),
                  title: Text(t(n.$2)),
                  trailing: const Icon(Icons.chevron_right),
                  onTap: () => go(n.$1),
                ),
              )
              .toList(),
        ),
      ]);
    }
    if (path == '/designs') return designs();
    final kind = path.split('/').last;
    if ([
      'bookings',
      'payments',
      'contracts',
      'maintenance',
      'documents',
      'furniture',
    ].contains(kind)) {
      return records(kind);
    }
    if ([
      'reports',
      'operations',
      'receivables',
      'occupancy',
      'income',
      'expenses',
      'profit',
    ].contains(kind)) {
      return finances();
    }
    return pageView('Screen unavailable', [
      action('Dashboard', () => go(home, reset: true)),
    ]);
  }

  Widget metrics() {
    final v = s.totals();
    final entries = s.role == 'tenant'
        ? [
            ('My bookings', '${s.records('bookings').length}'),
            ('Outstanding', money(v['outstanding'])),
            ('Verified payments', money(v['collected'])),
            ('Maintenance requests', '${s.records('maintenance').length}'),
          ]
        : s.role == 'owner'
        ? [
            ('My properties', '${v['properties']}'),
            ('Rental income', money(v['collected'])),
            ('Expenses', money(v['expense'])),
            ('Net profit', money(v['profit'])),
            ('Occupancy', '${v['occupancy']}%'),
          ]
        : [
            ('Properties', '${v['properties']}'),
            ('Units', '${v['units']}'),
            ('Verified payments', money(v['collected'])),
            ('Pending bookings', '${v['pending']}'),
            ('Occupancy', '${v['occupancy']}%'),
          ];
    return AdaptiveTiles(
      children: entries
          .map(
            (e) => MetricTile(
              label: t(e.$1),
              value: e.$2,
              caption:
                  '${t('Financial totals in')} ${s.preferences['currency']} · ${t('No currency conversion')}',
              icon: Icons.analytics_outlined,
              color: e.$1 == 'Net profit' || e.$1 == 'Verified payments'
                  ? AqarColors.emerald
                  : AqarColors.navy,
            ),
          )
          .toList(),
    );
  }

  Widget dashboard() => AqarDashboard(
    store: s,
    formatMoney: money,
    feedback: error == null ? null : errorBox(error!),
    onAddProperty: () => go('/properties/add/step-1'),
    onCreateBooking: () => bookingDialog(),
    onPayment: () => paymentDialog(),
    onMaintenance: () => maintenanceDialog(),
    onBrowse: () => go('/tenant/browse'),
    onProperties: () => go('/owner/properties'),
    onApprovals: () => go('/owner/maintenance'),
    onReports: () => go(scoped(s.role == 'tenant' ? 'payments' : 'reports')),
    onBooking: (b) => recordDetails('bookings', b),
  );
  Widget filters({
    List<String> statuses = const [],
    bool property = false,
  }) => Column(
    crossAxisAlignment: CrossAxisAlignment.stretch,
    children: [
      TextFormField(
        controller: searchController,
        key: const Key('demo-search'),
        onChanged: (v) => setState(() {
          search = v;
          page = 1;
        }),
        decoration: InputDecoration(
          labelText: t('Search sample records'),
          prefixIcon: const Icon(Icons.search),
        ),
      ),
      const SizedBox(height: 12),
      Wrap(
        spacing: 8,
        runSpacing: 4,
        children: [
          ChoiceChip(
            label: Text(t('All statuses')),
            selected: filter == 'all',
            onSelected: (_) => setState(() => filter = 'all'),
          ),
          ...statuses.map(
            (status) => ChoiceChip(
              label: Text(t(status)),
              selected: filter == status,
              onSelected: (_) => setState(() {
                filter = status;
                page = 1;
              }),
            ),
          ),
        ],
      ),
      if (property) ...[
        const SizedBox(height: 12),
        DemoResponsiveGrid(
          breakpoint: 600,
          children: [
            DropdownButtonFormField<String>(
              key: ValueKey('country-$country'),
              initialValue: country,
              isExpanded: true,
              decoration: InputDecoration(labelText: t('Country')),
              items: [
                DropdownMenuItem(value: 'all', child: Text(t('All countries'))),
                ...s
                    .properties(browse: true)
                    .map((p) => p['country'].toString())
                    .toSet()
                    .map(
                      (c) => DropdownMenuItem(
                        value: c,
                        child: Text(s.countryName(c)),
                      ),
                    ),
              ],
              onChanged: (v) => setState(() {
                country = v ?? 'all';
                city = 'all';
                page = 1;
              }),
            ),
            DropdownButtonFormField<String>(
              key: ValueKey('city-$city'),
              initialValue: city,
              decoration: InputDecoration(labelText: t('City')),
              items: [
                DropdownMenuItem(value: 'all', child: Text(t('All cities'))),
                ...s
                    .properties(browse: true)
                    .map((p) => p['city'] as String)
                    .toSet()
                    .map((c) => DropdownMenuItem(value: c, child: Text(t(c)))),
              ],
              onChanged: (v) => setState(() {
                city = v!;
                page = 1;
              }),
            ),
          ],
        ),
        const SizedBox(height: 12),
        Wrap(
          spacing: 8,
          runSpacing: 4,
          children:
              [
                    'all',
                    'Apartment',
                    'Villa',
                    'Chalet',
                    'Farm',
                    'Commercial',
                    'Rest house',
                  ]
                  .map(
                    (c) => ChoiceChip(
                      label: Text(t(c == 'all' ? 'All categories' : c)),
                      selected: category == c,
                      onSelected: (_) => setState(() {
                        category = c;
                        page = 1;
                      }),
                    ),
                  )
                  .toList(),
        ),
      ],
      Align(
        alignment: AlignmentDirectional.centerStart,
        child: TextButton(
          onPressed: () => setState(() {
            searchController.clear();
            search = '';
            country = city = category = filter = 'all';
            page = 1;
          }),
          child: Text(t('Clear filters')),
        ),
      ),
      const SizedBox(height: 18),
    ],
  );
  List<Record> visible(List<Record> records) => records
      .where(
        (r) =>
            (jsonEncode(r).toLowerCase().contains(search.toLowerCase()) ||
                propName(r['propertyId'])
                    .toLowerCase()
                    .contains(search.toLowerCase())) &&
            (filter == 'all' || r['status'] == filter),
      )
      .toList();
  List<Record> paged(List<Record> rows) {
    final max = (rows.length / 6).ceil().clamp(1, 10000);
    if (page > max) page = max;
    return rows.skip((page - 1) * 6).take(6).toList();
  }

  Widget pagination(int count) => Column(
    children: [
      Text(
        '${t('Sample records')}: $count · ${t('Page')} $page / ${(count / 6).ceil().clamp(1, 10000)}',
        style: const TextStyle(fontSize: 11),
      ),
      actions([
        action(
          'Previous',
          () => setState(() => page = (page - 1).clamp(1, 10000)),
          enabled: page > 1,
        ),
        action(
          'Next',
          () => setState(() => page = page + 1),
          enabled: page < (count / 6).ceil(),
        ),
      ]),
    ],
  );
  Widget propertyImage(Record p, {double height = 190}) =>
      p['cover'] is String &&
          RegExp(r'^data:image/(png|jpeg|webp);base64,').hasMatch(p['cover'])
      ? ClipRRect(
          borderRadius: BorderRadius.circular(12),
          child: Image.memory(
            base64Decode(p['cover'].split(',').last),
            height: height,
            width: double.infinity,
            fit: BoxFit.cover,
          ),
        )
      : ImagePreview(p['image'], label: s.label(p), height: height);
  Widget designs() => pageView('Design references', [
    banner(
      'Original Stitch screens are retained as read-only references. Their preview notices do not change demo records.',
    ),
    ...[
      ...moduleLinks.map((l) => (l.path, l.title)),
      ('/properties/demo', 'Property details'),
      ('/units/demo', 'Unit details'),
      ...List.generate(
        6,
        (i) => ('/properties/add/step-${i + 1}', 'Step ${i + 1}'),
      ),
    ].map(
      (item) => card(item.$2, [
        action(
          'Open original design',
          () => Navigator.push(
            context,
            MaterialPageRoute<void>(
              builder: (_) => Scaffold(
                appBar: AppBar(title: Text(t('Design references'))),
                body: AqarApp(initialRoute: item.$1),
              ),
            ),
          ),
        ),
      ]),
    ),
  ]);
  Record bookingDefaults() {
    final p =
        s
            .properties(browse: true)
            .where((p) => p['id'] == args['id'])
            .firstOrNull ??
        s.properties(browse: true).firstOrNull;
    final units = s
        .all('units')
        .where(
          (u) => u['propertyId'] == p?['id'] && u['status'] != 'maintenance',
        );
    return {
      'propertyId': p?['id'],
      'unitId': args['unitId'] ?? units.firstOrNull?['id'],
      'tenantId': s.all('tenants').firstOrNull?['id'],
      'start': args['start'] ?? DemoStore.plusDays(s.propertyToday(p), 1),
      'end': args['end'] ?? DemoStore.plusDays(s.propertyToday(p), 3),
    };
  }

  List<Widget> bookingFields(Record v) => [
    banner(
      'Instant-booking properties confirm locally. Request-to-book properties await manager approval. No payment is processed.',
    ),
    BookingPropertyFields(store: s, values: v),
    if (s.role == 'manager')
      field(
        v,
        'tenantId',
        'Tenant',
        choices: s
            .all('tenants')
            .map((a) => ('${a['id']}', '${a['name']}'))
            .toList(),
      ),
    field(v, 'start', 'Check-in', type: 'date'),
    field(v, 'end', 'Check-out', type: 'date'),
  ];
  Widget photoList(Record r) => Wrap(
    spacing: 8,
    runSpacing: 8,
    children: ((r['photos'] as List?) ?? [])
        .map(
          (p) => Image.memory(
            base64Decode(p.toString().split(',').last),
            width: 95,
            height: 80,
            fit: BoxFit.cover,
          ),
        )
        .toList(),
  );
}
