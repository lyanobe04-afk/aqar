import 'package:flutter/material.dart';

import '../core/theme.dart';
import '../widgets/demo_widgets.dart';
import 'dashboard_screen.dart';

class ReportsScreen extends StatelessWidget {
  final bool operational;
  const ReportsScreen({super.key, this.operational = false});
  @override
  Widget build(BuildContext context) => DemoPage(
    title: operational ? 'Operational reports' : 'Reports & analytics',
    subtitle: 'Illustrative portfolio insights · October 2024',
    children: [
      Wrap(
        spacing: 10,
        runSpacing: 10,
        children: [
          FilledButton.icon(
            onPressed: () => showDemoNotice(context, 'Export report'),
            icon: const Icon(Icons.ios_share, size: 18),
            label: const Text('Export report'),
          ),
          OutlinedButton(
            onPressed: () => showDemoNotice(context, 'Configure report'),
            child: const Text('Configure'),
          ),
        ],
      ),
      const SizedBox(height: 24),
      AdaptiveTiles(
        children: operational
            ? const [
                MetricTile(
                  label: 'Occupancy',
                  value: '85%',
                  caption: '68 leased of 80 units',
                  icon: Icons.key_outlined,
                  color: AqarColors.emerald,
                ),
                MetricTile(
                  label: 'Maintenance SLA',
                  value: '96%',
                  caption: 'Monthly sample rate',
                  icon: Icons.build_outlined,
                ),
              ]
            : const [
                MetricTile(
                  label: 'Collected',
                  value: '365.5k',
                  caption: 'SAR · Sample month',
                  icon: Icons.payments_outlined,
                  color: AqarColors.emerald,
                ),
                MetricTile(
                  label: 'Expected',
                  value: '420k',
                  caption: 'SAR · Sample month',
                  icon: Icons.account_balance_outlined,
                ),
              ],
      ),
      const SurfaceCard(child: RevenueChart()),
      SurfaceCard(
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            const SectionHeading('Report library'),
            ModuleShortcut(
              title: operational
                  ? 'Financial performance'
                  : 'Operational performance',
              subtitle: 'Open the other existing report design',
              path: operational ? '/reports' : '/reports/operations',
              icon: Icons.analytics_outlined,
            ),
            const ModuleShortcut(
              title: 'Rent collection',
              subtitle: 'Review sample receivables',
              path: '/receivables',
              icon: Icons.account_balance_wallet_outlined,
            ),
            const ModuleShortcut(
              title: 'Maintenance overview',
              subtitle: 'Field work & sample SLA',
              path: '/maintenance',
              icon: Icons.build_outlined,
            ),
            const ModuleShortcut(
              title: 'Property portfolio',
              subtitle: 'Asset allocations & units',
              path: '/properties',
              icon: Icons.apartment_outlined,
            ),
          ],
        ),
      ),
      const SurfaceCard(
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            SectionHeading('Collection efficiency'),
            InfoPair('Expected rent', 'SAR 420,000'),
            InfoPair('Collected amount', 'SAR 365,500'),
            InfoPair('Collection rate', '87.0%'),
            InfoPair('Source', 'Static design data'),
          ],
        ),
      ),
    ],
  );
}

class SettingsScreen extends StatefulWidget {
  const SettingsScreen({super.key});
  @override
  State<SettingsScreen> createState() => _SettingsScreenState();
}

class _SettingsScreenState extends State<SettingsScreen> {
  bool inApp = true, email = false;
  @override
  Widget build(BuildContext context) => DemoPage(
    title: 'Settings & preferences',
    subtitle: 'Temporary UI controls for the demonstration.',
    children: [
      SurfaceCard(
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            const SectionHeading('Workspace profile'),
            TextFormField(
              initialValue: 'Aqar Property Portal',
              decoration: const InputDecoration(labelText: 'Organization name'),
            ),
            const SizedBox(height: 16),
            const InfoPair('Default currency', 'Saudi Riyal · SAR'),
            const InfoPair('Jurisdiction', 'Saudi Arabia'),
            OutlinedButton(
              onPressed: () =>
                  showDemoNotice(context, 'Upload organization logo'),
              child: const Text('Upload logo'),
            ),
          ],
        ),
      ),
      SurfaceCard(
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            const SectionHeading('Notification preview'),
            SwitchListTile(
              contentPadding: EdgeInsets.zero,
              title: const Text(
                'In-app notices',
                style: TextStyle(fontSize: 14),
              ),
              subtitle: const Text(
                'Local preview only',
                style: TextStyle(fontSize: 11),
              ),
              value: inApp,
              onChanged: (value) => setState(() => inApp = value),
            ),
            SwitchListTile(
              contentPadding: EdgeInsets.zero,
              title: const Text(
                'Email reminders',
                style: TextStyle(fontSize: 14),
              ),
              subtitle: const Text(
                'No email is sent',
                style: TextStyle(fontSize: 11),
              ),
              value: email,
              onChanged: (value) => setState(() => email = value),
            ),
          ],
        ),
      ),
      const SurfaceCard(
        child: ModuleShortcut(
          title: 'Arabic dashboard preview',
          subtitle: 'Existing manager design adapted for mobile',
          path: '/dashboard/ar',
          icon: Icons.translate,
        ),
      ),
      const SurfaceCard(
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            SectionHeading('Presentation phase'),
            InfoPair('Mode', 'Frontend UI only'),
            InfoPair('Records', 'Static demo fixtures'),
            InfoPair('Saving & integrations', 'Not implemented'),
          ],
        ),
      ),
      FilledButton.icon(
        onPressed: () => showDemoNotice(context, 'Save settings'),
        icon: const Icon(Icons.check),
        label: const Text('Save settings'),
      ),
    ],
  );
}
