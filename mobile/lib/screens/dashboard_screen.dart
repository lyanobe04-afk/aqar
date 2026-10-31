import 'package:flutter/material.dart';

import '../core/theme.dart';
import '../widgets/demo_widgets.dart';

class DashboardScreen extends StatelessWidget {
  final bool arabic;
  const DashboardScreen({super.key, this.arabic = false});
  @override
  Widget build(BuildContext context) => Directionality(
    textDirection: arabic ? TextDirection.rtl : TextDirection.ltr,
    child: DemoPage(
      title: arabic
          ? 'إدارة العقارات والتحصيل'
          : 'Your portfolio,\nat a glance.',
      subtitle: arabic
          ? 'نظرة عامة على العقارات والتحصيل · بيانات توضيحية'
          : 'Property operations & collections · KSA',
      children: [
        Container(
          padding: const EdgeInsets.all(22),
          margin: const EdgeInsets.only(bottom: 20),
          decoration: BoxDecoration(
            color: AqarColors.darkNavy,
            borderRadius: BorderRadius.circular(18),
          ),
          child: Column(
            crossAxisAlignment: CrossAxisAlignment.start,
            children: [
              Row(
                children: [
                  const Icon(
                    Icons.account_balance_wallet_outlined,
                    color: Colors.white70,
                    size: 19,
                  ),
                  const SizedBox(width: 9),
                  Expanded(
                    child: Text(
                      arabic ? 'إجمالي التحصيل' : 'ACTUAL COLLECTIONS',
                      style: const TextStyle(
                        fontSize: 10,
                        letterSpacing: 1,
                        color: Colors.white70,
                      ),
                    ),
                  ),
                  const Text(
                    'OCT 2024',
                    style: TextStyle(color: Colors.white60, fontSize: 10),
                  ),
                ],
              ),
              const SizedBox(height: 20),
              const Text(
                'SAR 365,500',
                style: TextStyle(
                  fontSize: 29,
                  fontWeight: FontWeight.w700,
                  color: Colors.white,
                ),
              ),
              const SizedBox(height: 10),
              const Text(
                '87.0% collection efficiency',
                style: TextStyle(color: Color(0xFFB8E2BF), fontSize: 12),
              ),
              const SizedBox(height: 20),
              const LinearProgressIndicator(
                value: .87,
                minHeight: 5,
                borderRadius: BorderRadius.all(Radius.circular(10)),
                backgroundColor: Color(0xFF34506B),
                color: AqarColors.success,
              ),
              const SizedBox(height: 10),
              const Text(
                'SAR 420,000 expected · Illustrative month',
                style: TextStyle(color: Colors.white60, fontSize: 10),
              ),
            ],
          ),
        ),
        Wrap(
          spacing: 10,
          runSpacing: 10,
          children: [
            FilledButton.icon(
              onPressed: () =>
                  Navigator.pushNamed(context, '/properties/add/step-1'),
              icon: const Icon(Icons.add, size: 18),
              label: Text(arabic ? 'إضافة عقار' : 'Add property'),
            ),
            OutlinedButton.icon(
              onPressed: () => Navigator.pushNamed(context, '/bookings'),
              icon: const Icon(Icons.event_available_outlined, size: 18),
              label: Text(arabic ? 'الحجوزات' : 'Review bookings'),
            ),
          ],
        ),
        const SizedBox(height: 24),
        const AdaptiveTiles(
          children: [
            MetricTile(
              label: 'Total properties',
              value: '24',
              caption: '+2 this month',
              icon: Icons.apartment_outlined,
            ),
            MetricTile(
              label: 'Leased units',
              value: '68 / 80',
              caption: '85% occupancy',
              icon: Icons.key_outlined,
              color: AqarColors.emerald,
            ),
            MetricTile(
              label: 'Pending bookings',
              value: '7',
              caption: 'Awaiting review',
              icon: Icons.pending_actions_outlined,
            ),
            MetricTile(
              label: 'Overdue payments',
              value: '5',
              caption: 'SAR 34,500 overdue',
              icon: Icons.warning_amber_outlined,
              color: AqarColors.error,
            ),
          ],
        ),
        const SurfaceCard(child: RevenueChart()),
        SurfaceCard(
          child: Column(
            children: [
              SectionHeading(arabic ? 'مساحة العمل' : 'Portfolio workspace'),
              const ModuleShortcut(
                title: 'Properties',
                subtitle: 'Master estates & unit breakdown',
                path: '/properties',
                icon: Icons.apartment_outlined,
              ),
              const ModuleShortcut(
                title: 'Payments',
                subtitle: 'Offline collection record previews',
                path: '/payments',
                icon: Icons.payments_outlined,
              ),
              const ModuleShortcut(
                title: 'Contracts',
                subtitle: 'Rental & management agreements',
                path: '/contracts',
                icon: Icons.description_outlined,
              ),
              const ModuleShortcut(
                title: 'Maintenance',
                subtitle: '9 active requests · 3 urgent',
                path: '/maintenance',
                icon: Icons.build_outlined,
              ),
            ],
          ),
        ),
        SurfaceCard(
          child: Column(
            crossAxisAlignment: CrossAxisAlignment.start,
            children: [
              SectionHeading(
                'Pending requests',
                action: 'View all',
                onTap: () => Navigator.pushNamed(context, '/bookings'),
              ),
              const Text(
                'Al-Nakheel Luxury Chalet',
                style: TextStyle(
                  fontWeight: FontWeight.w600,
                  color: AqarColors.ink,
                ),
              ),
              const SizedBox(height: 6),
              const Text('4 nights · SAR 6,400'),
              const SizedBox(height: 12),
              const StatusTag('Pending manager review'),
              const SizedBox(height: 16),
              OutlinedButton(
                onPressed: () => Navigator.pushNamed(context, '/bookings'),
                child: const Text('Review request'),
              ),
            ],
          ),
        ),
      ],
    ),
  );
}

class RevenueChart extends StatelessWidget {
  const RevenueChart({super.key});
  @override
  Widget build(BuildContext context) => Column(
    crossAxisAlignment: CrossAxisAlignment.start,
    children: [
      const SectionHeading('Revenue & collections'),
      const Text(
        'Expected rent vs. actual collected',
        style: TextStyle(fontSize: 11),
      ),
      const SizedBox(height: 22),
      Semantics(
        label: 'Sample collection chart, May to October. Expected versus collected amounts are illustrative.',
        child: SizedBox(
          height: 150,
          child: Row(
            crossAxisAlignment: CrossAxisAlignment.end,
            children: List.generate(
              6,
              (i) => Expanded(
                child: Padding(
                  padding: const EdgeInsets.symmetric(horizontal: 5),
                  child: Column(
                    mainAxisAlignment: MainAxisAlignment.end,
                    children: [
                      Expanded(
                        child: Row(
                          mainAxisAlignment: MainAxisAlignment.center,
                          crossAxisAlignment: CrossAxisAlignment.end,
                          children: [
                            Flexible(
                              child: Container(
                                width: 15,
                                height: [
                                  83.0,
                                  96.0,
                                  106.0,
                                  99.0,
                                  115.0,
                                  124.0,
                                ][i],
                                decoration: BoxDecoration(
                                  color: AqarColors.line,
                                  borderRadius: BorderRadius.circular(3),
                                ),
                              ),
                            ),
                            const SizedBox(width: 4),
                            Flexible(
                              child: Container(
                                width: 15,
                                height: [
                                  73.0,
                                  85.0,
                                  97.0,
                                  81.0,
                                  108.0,
                                  108.0,
                                ][i],
                                decoration: BoxDecoration(
                                  color: AqarColors.emerald,
                                  borderRadius: BorderRadius.circular(3),
                                ),
                              ),
                            ),
                          ],
                        ),
                      ),
                      const SizedBox(height: 10),
                      Text(
                        ['May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'][i],
                        style: const TextStyle(fontSize: 9),
                      ),
                    ],
                  ),
                ),
              ),
            ),
          ),
        ),
      ),
      const SizedBox(height: 18),
      const Wrap(
        spacing: 16,
        runSpacing: 8,
        children: [
          Text(
            '● Expected',
            style: TextStyle(fontSize: 10, color: AqarColors.muted),
          ),
          Text(
            '● Collected',
            style: TextStyle(fontSize: 10, color: AqarColors.emerald),
          ),
        ],
      ),
    ],
  );
}
