import 'package:flutter/material.dart';

import '../../core/theme.dart';
import '../demo_store.dart';

/// Financial values remain one text run, shrinking only when space requires it.
class AqarDashboardMoney extends StatelessWidget {
  final String value;
  final double size;
  final Color color;
  const AqarDashboardMoney(
    this.value, {
    super.key,
    this.size = 28,
    this.color = AqarColors.darkNavy,
  });
  @override
  Widget build(BuildContext context) => SizedBox(
    width: double.infinity,
    child: FittedBox(
      fit: BoxFit.scaleDown,
      alignment: AlignmentDirectional.centerStart,
      child: Text(
        value,
        maxLines: 1,
        softWrap: false,
        style: TextStyle(
          fontSize: size,
          fontWeight: FontWeight.w600,
          color: color,
          letterSpacing: -.5,
        ),
      ),
    ),
  );
}

class AqarDashboard extends StatelessWidget {
  final DemoStore store;
  final Widget? feedback;
  final String Function(dynamic, [dynamic]) formatMoney;
  final VoidCallback onAddProperty,
      onCreateBooking,
      onPayment,
      onMaintenance,
      onBrowse,
      onProperties,
      onApprovals,
      onReports;
  final void Function(Record) onBooking;
  const AqarDashboard({
    super.key,
    required this.store,
    this.feedback,
    required this.formatMoney,
    required this.onAddProperty,
    required this.onCreateBooking,
    required this.onPayment,
    required this.onMaintenance,
    required this.onBrowse,
    required this.onProperties,
    required this.onApprovals,
    required this.onReports,
    required this.onBooking,
  });
  String t(String value) => store.t(value);
  Widget button(String label, VoidCallback action, {bool primary = false}) =>
      primary
      ? FilledButton(onPressed: action, child: Text(t(label)))
      : OutlinedButton(onPressed: action, child: Text(t(label)));
  static const line = Color(0xFFDFE7EE);
  BoxDecoration get decoration => BoxDecoration(
    color: Colors.white,
    border: Border.all(color: line),
    borderRadius: BorderRadius.circular(14),
    boxShadow: const [
      BoxShadow(color: Color(0x030F2942), blurRadius: 12, offset: Offset(0, 3)),
    ],
  );
  Widget panelHeader(String title, String caption, {Widget? trailing}) =>
      Padding(
        padding: const EdgeInsets.fromLTRB(22, 22, 22, 18),
        child: Row(
          children: [
            Expanded(
              child: Column(
                crossAxisAlignment: CrossAxisAlignment.start,
                children: [
                  Text(
                    t(title),
                    style: const TextStyle(
                      fontSize: 18,
                      fontWeight: FontWeight.w600,
                      color: AqarColors.darkNavy,
                    ),
                  ),
                  const SizedBox(height: 5),
                  Text(
                    t(caption),
                    style: const TextStyle(
                      fontSize: 12,
                      color: AqarColors.muted,
                    ),
                  ),
                ],
              ),
            ),
            if (trailing != null) ...[const SizedBox(width: 12), trailing],
          ],
        ),
      );
  Widget status(dynamic value) {
    final green = [
      'approved',
      'confirmed',
      'active',
      'completed',
    ].contains(value);
    return Container(
      padding: const EdgeInsets.symmetric(horizontal: 9, vertical: 5),
      decoration: BoxDecoration(
        color: green ? const Color(0xFFEAF4EC) : const Color(0xFFEDF3F8),
        borderRadius: BorderRadius.circular(6),
      ),
      child: Text(
        t('$value'),
        style: TextStyle(
          fontSize: 10,
          fontWeight: FontWeight.w600,
          color: green ? AqarColors.emerald : AqarColors.navy,
        ),
      ),
    );
  }

  Widget metrics(Record v) => LayoutBuilder(
    builder: (context, box) {
      String money(dynamic value) => formatMoney(value);
      final entries = store.role == 'tenant'
          ? [
              (
                'My bookings',
                '${store.records('bookings').length}',
                Icons.event_outlined,
                false,
              ),
              (
                'Outstanding',
                money(v['outstanding']),
                Icons.account_balance_wallet_outlined,
                true,
              ),
              (
                'Verified payments',
                money(v['collected']),
                Icons.payments_outlined,
                true,
              ),
              (
                'Maintenance requests',
                '${store.records('maintenance').length}',
                Icons.build_outlined,
                false,
              ),
            ]
          : store.role == 'owner'
          ? [
              (
                'My properties',
                '${v['properties']}',
                Icons.apartment_outlined,
                false,
              ),
              (
                'Rental income',
                money(v['collected']),
                Icons.payments_outlined,
                true,
              ),
              (
                'Expenses',
                money(v['expense']),
                Icons.receipt_long_outlined,
                true,
              ),
              ('Net profit', money(v['profit']), Icons.trending_up, true),
              (
                'Occupancy',
                "${v['occupancy']}%",
                Icons.pie_chart_outline,
                false,
              ),
            ]
          : [
              (
                'Properties',
                '${v['properties']}',
                Icons.apartment_outlined,
                false,
              ),
              ('Units', '${v['units']}', Icons.meeting_room_outlined, false),
              (
                'Verified payments',
                money(v['collected']),
                Icons.payments_outlined,
                true,
              ),
              (
                'Pending bookings',
                '${v['pending']}',
                Icons.event_outlined,
                false,
              ),
              (
                'Occupancy',
                "${v['occupancy']}%",
                Icons.pie_chart_outline,
                false,
              ),
            ];
      final columns = entries.length == 4
          ? 2
          : box.maxWidth >= 650
          ? 3
          : 2;
      return Wrap(
        spacing: 16,
        runSpacing: 16,
        children: [
          for (var i = 0; i < entries.length; i++)
            Builder(
              builder: (context) {
                final e = entries[i];
                final rowColumns = entries.length == 5 && columns == 3 && i >= 3
                    ? 2
                    : entries.length == 5 && columns == 2 && i == 4
                    ? 1
                    : columns;
                final width =
                    (box.maxWidth - 16 * (rowColumns - 1)) / rowColumns;
                final positive = [
                  'Rental income',
                  'Verified payments',
                  'Net profit',
                ].contains(e.$1);
                return Container(
                  key: ValueKey('dashboard-kpi-${e.$1}'),
                  width: width,
                  padding: const EdgeInsets.all(20),
                  decoration: decoration,
                  child: Column(
                    crossAxisAlignment: CrossAxisAlignment.start,
                    children: [
                      Row(
                        crossAxisAlignment: CrossAxisAlignment.start,
                        children: [
                          Expanded(
                            child: Text(
                              t(e.$1),
                              style: const TextStyle(
                                fontSize: 12,
                                fontWeight: FontWeight.w500,
                                color: AqarColors.muted,
                              ),
                            ),
                          ),
                          const SizedBox(width: 8),
                          Icon(e.$3, size: 20, color: const Color(0xFF69839A)),
                        ],
                      ),
                      const SizedBox(height: 16),
                      if (e.$4)
                        AqarDashboardMoney(
                          e.$2,
                          color: positive
                              ? AqarColors.emerald
                              : AqarColors.darkNavy,
                        )
                      else
                        Text(
                          e.$2,
                          style: const TextStyle(
                            fontSize: 30,
                            fontWeight: FontWeight.w600,
                            color: AqarColors.darkNavy,
                            height: 1.2,
                          ),
                        ),
                    ],
                  ),
                );
              },
            ),
        ],
      );
    },
  );
  Widget bookings(List<Record> rows) => Container(
    key: const Key('dashboard-bookings'),
    decoration: decoration,
    child: Column(
      mainAxisSize: MainAxisSize.min,
      crossAxisAlignment: CrossAxisAlignment.stretch,
      children: [
        panelHeader(
          'Recent bookings',
          'Your latest booking activity',
          trailing: Container(
            padding: const EdgeInsets.symmetric(horizontal: 10, vertical: 5),
            decoration: BoxDecoration(
              color: const Color(0xFFEDF3F8),
              borderRadius: BorderRadius.circular(8),
            ),
            child: Text(
              '${rows.length}',
              style: const TextStyle(
                color: AqarColors.navy,
                fontWeight: FontWeight.w600,
                fontSize: 12,
              ),
            ),
          ),
        ),
        const Divider(height: 1),
        if (rows.isEmpty)
          Padding(
            padding: const EdgeInsets.all(28),
            child: Column(
              children: [
                const Icon(
                  Icons.event_available_outlined,
                  size: 28,
                  color: AqarColors.muted,
                ),
                const SizedBox(height: 12),
                Text(t('No bookings yet')),
                const SizedBox(height: 8),
                Text(
                  t('New bookings will appear here.'),
                  style: const TextStyle(color: AqarColors.muted, fontSize: 12),
                ),
              ],
            ),
          ),
        for (final b in rows.take(3))
          Padding(
            padding: const EdgeInsets.symmetric(horizontal: 22),
            child: Column(
              children: [
                Padding(
                  padding: const EdgeInsets.symmetric(vertical: 20),
                  child: Row(
                    crossAxisAlignment: CrossAxisAlignment.center,
                    children: [
                      Expanded(
                        child: Column(
                          crossAxisAlignment: CrossAxisAlignment.stretch,
                          children: [
                            Tooltip(
                              message: store.label(
                                store.property(b['propertyId']),
                              ),
                              child: Text(
                                store.label(store.property(b['propertyId'])),
                                maxLines: 2,
                                overflow: TextOverflow.ellipsis,
                                style: const TextStyle(
                                  fontSize: 13,
                                  fontWeight: FontWeight.w600,
                                  height: 1.4,
                                  color: AqarColors.darkNavy,
                                ),
                              ),
                            ),
                            const SizedBox(height: 7),
                            Text(
                              '${store.date(b['start'])} → ${store.date(b['end'])}',
                              style: const TextStyle(
                                fontSize: 11,
                                color: AqarColors.muted,
                                height: 1.5,
                              ),
                            ),
                            const SizedBox(height: 7),
                            AqarDashboardMoney(
                              formatMoney(b['amount'], b),
                              size: 13,
                              color: AqarColors.navy,
                            ),
                          ],
                        ),
                      ),
                      const SizedBox(width: 14),
                      Column(
                        crossAxisAlignment: CrossAxisAlignment.end,
                        children: [
                          status(b['status']),
                          const SizedBox(height: 10),
                          OutlinedButton(
                            onPressed: () => onBooking(b),
                            style: OutlinedButton.styleFrom(
                              padding: const EdgeInsets.symmetric(
                                horizontal: 12,
                                vertical: 8,
                              ),
                              textStyle: const TextStyle(fontSize: 11),
                            ),
                            child: Text(t('View details')),
                          ),
                        ],
                      ),
                    ],
                  ),
                ),
                if (b != rows.take(3).last) const Divider(height: 1),
              ],
            ),
          ),
      ],
    ),
  );
  Widget portfolio(Record v, {bool stretch = false}) {
    final content = Padding(
      padding: const EdgeInsets.all(22),
      child: Column(
        crossAxisAlignment: CrossAxisAlignment.stretch,
        mainAxisSize: MainAxisSize.min,
        children: [
          Row(
            children: [
              for (final entry in [
                ('Properties', '${store.properties().length}'),
                ('Current occupancy', "${v['occupancy']}%"),
              ])
                Expanded(
                  child: Padding(
                    padding: const EdgeInsetsDirectional.only(end: 16),
                    child: Column(
                      crossAxisAlignment: CrossAxisAlignment.start,
                      children: [
                        Text(
                          t(entry.$1),
                          style: const TextStyle(
                            fontSize: 12,
                            color: AqarColors.muted,
                          ),
                        ),
                        const SizedBox(height: 9),
                        Text(
                          entry.$2,
                          style: const TextStyle(
                            fontSize: 28,
                            fontWeight: FontWeight.w600,
                            color: AqarColors.darkNavy,
                          ),
                        ),
                      ],
                    ),
                  ),
                ),
            ],
          ),
          const SizedBox(height: 18),
          const Divider(height: 1),
          const SizedBox(height: 18),
          Container(
            padding: const EdgeInsets.all(18),
            decoration: BoxDecoration(
              color: const Color(0xFFF2F8F3),
              border: Border.all(color: const Color(0xFFDBE9DF)),
              borderRadius: BorderRadius.circular(10),
            ),
            child: Column(
              crossAxisAlignment: CrossAxisAlignment.stretch,
              children: [
                Text(
                  t('Collected'),
                  style: const TextStyle(
                    fontSize: 12,
                    color: Color(0xFF426C48),
                  ),
                ),
                const SizedBox(height: 10),
                AqarDashboardMoney(
                  formatMoney(v['collected']),
                  color: AqarColors.emerald,
                ),
                const SizedBox(height: 9),
                Text(
                  '${t('Financial totals in')} ${store.preferences['currency']}',
                  style: const TextStyle(
                    fontSize: 10,
                    color: Color(0xFF5C7960),
                  ),
                ),
              ],
            ),
          ),
          const SizedBox(height: 14),
          Row(
            crossAxisAlignment: CrossAxisAlignment.start,
            children: [
              const Icon(Icons.info_outline, size: 15, color: AqarColors.muted),
              const SizedBox(width: 6),
              Expanded(
                child: Text(
                  t('SIMULATED · No money moved'),
                  style: const TextStyle(
                    fontSize: 10,
                    color: AqarColors.muted,
                    height: 1.6,
                  ),
                ),
              ),
            ],
          ),
        ],
      ),
    );
    return Container(
      key: const Key('dashboard-portfolio'),
      decoration: decoration,
      child: Column(
        mainAxisSize: MainAxisSize.min,
        crossAxisAlignment: CrossAxisAlignment.stretch,
        children: [
          panelHeader(
            'Portfolio overview',
            'Your portfolio at a glance',
            trailing: const Icon(
              Icons.monitor,
              size: 22,
              color: Color(0xFF7B91A5),
            ),
          ),
          const Divider(height: 1),
          if (stretch) Expanded(child: content) else content,
          const Divider(height: 1),
          Padding(
            padding: const EdgeInsets.symmetric(horizontal: 22, vertical: 16),
            child: Align(
              alignment: AlignmentDirectional.centerEnd,
              child: button(
                store.role == 'tenant' ? 'My payments' : 'Financial reports',
                onReports,
              ),
            ),
          ),
        ],
      ),
    );
  }

  @override
  Widget build(BuildContext context) {
    final v = store.totals(), rows = store.records('bookings');
    return ListView(
      key: const Key('dashboard-scroll'),
      padding: EdgeInsets.symmetric(
        horizontal: MediaQuery.sizeOf(context).width < 600 ? 16 : 28,
        vertical: 28,
      ),
      children: [
        Center(
          child: ConstrainedBox(
            constraints: const BoxConstraints(maxWidth: 1280),
            child: LayoutBuilder(
              builder: (context, box) {
                final headerActions = Wrap(
                  spacing: 8,
                  runSpacing: 8,
                  children: store.role == 'manager'
                      ? [
                          button('Add property', onAddProperty, primary: true),
                          button('Create booking', onCreateBooking),
                          button('Record simulated payment', onPayment),
                        ]
                      : store.role == 'owner'
                      ? [
                          button('My properties', onProperties, primary: true),
                          button('Maintenance approvals', onApprovals),
                        ]
                      : [
                          button('Browse properties', onBrowse, primary: true),
                          button('Submit maintenance request', onMaintenance),
                        ],
                );
                final heading = Column(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: [
                    Text(
                      t('YOUR PROPERTY WORKSPACE'),
                      style: const TextStyle(
                        fontSize: 10,
                        fontWeight: FontWeight.w600,
                        letterSpacing: 1.2,
                        color: AqarColors.emerald,
                      ),
                    ),
                    const SizedBox(height: 10),
                    Text(
                      t(
                        store.role == 'owner'
                            ? 'Owner dashboard'
                            : store.role == 'tenant'
                            ? 'Tenant dashboard'
                            : 'Property operations & collections',
                      ),
                      style: TextStyle(
                        fontSize: box.maxWidth < 600 ? 27 : 30,
                        fontWeight: FontWeight.w700,
                        color: AqarColors.darkNavy,
                        height: 1.25,
                        letterSpacing: -.5,
                      ),
                    ),
                    const SizedBox(height: 10),
                    Text(
                      '${t('Financial totals in')} ${store.preferences['currency']} · ${t('No currency conversion')}',
                      style: const TextStyle(
                        fontSize: 12,
                        color: AqarColors.muted,
                        height: 1.7,
                      ),
                    ),
                  ],
                );
                return Column(
                  crossAxisAlignment: CrossAxisAlignment.stretch,
                  children: [
                    if (box.maxWidth >= 1100)
                      Row(
                        crossAxisAlignment: CrossAxisAlignment.start,
                        children: [
                          Expanded(child: heading),
                          const SizedBox(width: 24),
                          Flexible(child: headerActions),
                        ],
                      )
                    else ...[
                      heading,
                      const SizedBox(height: 18),
                      headerActions,
                    ],
                    const SizedBox(height: 24),
                    if (feedback != null)
                      Padding(
                        padding: const EdgeInsets.only(bottom: 16),
                        child: feedback!,
                      ),
                    metrics(v),
                    const SizedBox(height: 24),
                    if (box.maxWidth >= 940)
                      IntrinsicHeight(
                        child: Row(
                          crossAxisAlignment: CrossAxisAlignment.stretch,
                          children: [
                            Expanded(flex: 145, child: bookings(rows)),
                            const SizedBox(width: 20),
                            Expanded(
                              flex: 100,
                              child: portfolio(v, stretch: true),
                            ),
                          ],
                        ),
                      )
                    else ...[
                      bookings(rows),
                      const SizedBox(height: 20),
                      portfolio(v),
                    ],
                  ],
                );
              },
            ),
          ),
        ),
      ],
    );
  }
}
