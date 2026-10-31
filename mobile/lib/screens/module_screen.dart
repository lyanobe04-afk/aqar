import 'package:flutter/material.dart';

import '../core/theme.dart';
import '../data/demo_data.dart';
import '../widgets/demo_widgets.dart';

class ModuleScreen extends StatefulWidget {
  final String path;
  final ModulePreview module;
  const ModuleScreen({super.key, required this.path, required this.module});
  @override
  State<ModuleScreen> createState() => _ModuleScreenState();
}

class _ModuleScreenState extends State<ModuleScreen> {
  String query = '', status = 'All';
  void inspect(PreviewRecord record) {
    if (widget.path == '/units') {
      Navigator.pushNamed(context, '/units/demo', arguments: record);
      return;
    }
    showModalBottomSheet<void>(
      context: context,
      isScrollControlled: true,
      showDragHandle: true,
      builder: (sheetContext) => SafeArea(
        child: ConstrainedBox(
          constraints: BoxConstraints(
            maxHeight: MediaQuery.sizeOf(sheetContext).height * .8,
          ),
          child: SingleChildScrollView(
            padding: const EdgeInsets.fromLTRB(24, 4, 24, 24),
            child: Column(
              crossAxisAlignment: CrossAxisAlignment.start,
              mainAxisSize: MainAxisSize.min,
              children: [
                Text(
                  record.title,
                  style: Theme.of(context).textTheme.titleLarge,
                ),
                const SizedBox(height: 8),
                Text(record.subtitle),
                const SizedBox(height: 16),
                StatusTag(record.status),
                const SizedBox(height: 12),
                InfoPair('Sample record', record.detail),
                ...record.fields.entries.map((e) => InfoPair(e.key, e.value)),
                const SizedBox(height: 12),
                const DemoBanner(),
                const SizedBox(height: 20),
                if (widget.path == '/bookings')
                  Wrap(
                    spacing: 10,
                    runSpacing: 8,
                    children: [
                      FilledButton(
                        onPressed: () =>
                            showDemoNotice(sheetContext, 'Approve booking'),
                        child: const Text('Approve request'),
                      ),
                      OutlinedButton(
                        onPressed: () =>
                            showDemoNotice(sheetContext, 'Decline booking'),
                        child: const Text('Decline'),
                      ),
                    ],
                  ),
                if (widget.path == '/payments')
                  FilledButton(
                    onPressed: () =>
                        showDemoNotice(sheetContext, 'Verify payment'),
                    child: const Text('Verify payment'),
                  ),
                if (widget.path == '/documents')
                  OutlinedButton(
                    onPressed: () => showDemoNotice(
                      sheetContext,
                      'Download sample attachment',
                    ),
                    child: const Text('Preview attachment'),
                  ),
                if (widget.path == '/owners')
                  TextButton(
                    onPressed: () {
                      Navigator.pop(sheetContext);
                      Navigator.pushNamed(context, '/properties');
                    },
                    child: const Text('View properties →'),
                  ),
                if (widget.path == '/tenants')
                  TextButton(
                    onPressed: () {
                      Navigator.pop(sheetContext);
                      Navigator.pushNamed(context, '/contracts');
                    },
                    child: const Text('View contracts →'),
                  ),
                if (widget.path == '/furniture' ||
                    widget.path == '/maintenance')
                  OutlinedButton(
                    onPressed: () {
                      Navigator.pop(sheetContext);
                      Navigator.pushNamed(context, '/units/demo');
                    },
                    child: const Text('View sample unit'),
                  ),
                const SizedBox(height: 12),
                TextButton(
                  onPressed: () => Navigator.pop(sheetContext),
                  child: const Text('Close preview'),
                ),
              ],
            ),
          ),
        ),
      ),
    );
  }

  @override
  Widget build(BuildContext context) {
    final module = widget.module;
    final statuses = ['All', ...module.records.map((r) => r.status).toSet()];
    final visible = module.records
        .where(
          (r) =>
              (status == 'All' || r.status == status) &&
              '${r.title} ${r.subtitle} ${r.detail}'.toLowerCase().contains(
                query.toLowerCase(),
              ),
        )
        .toList();
    return DemoPage(
      title: module.title,
      subtitle: module.description,
      children: [
        SurfaceCard(
          child: Row(
            children: [
              Container(
                padding: const EdgeInsets.all(14),
                decoration: BoxDecoration(
                  color: AqarColors.tint,
                  borderRadius: BorderRadius.circular(12),
                ),
                child: Icon(module.icon, color: AqarColors.navy),
              ),
              const SizedBox(width: 18),
              Expanded(
                child: Column(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: [
                    Text(
                      module.metric,
                      style: Theme.of(context).textTheme.headlineMedium,
                    ),
                    const SizedBox(height: 4),
                    Text(
                      module.metricLabel,
                      style: const TextStyle(fontSize: 11),
                    ),
                  ],
                ),
              ),
            ],
          ),
        ),
        Align(
          alignment: AlignmentDirectional.centerStart,
          child: FilledButton.icon(
            onPressed: () => showDemoNotice(context, module.action),
            icon: const Icon(Icons.add, size: 18),
            label: Text(module.action),
          ),
        ),
        const SizedBox(height: 18),
        TextField(
          decoration: const InputDecoration(
            hintText: 'Search sample records',
            prefixIcon: Icon(Icons.search),
          ),
          onChanged: (value) => setState(() => query = value),
        ),
        const SizedBox(height: 12),
        Wrap(
          spacing: 8,
          runSpacing: 4,
          children: statuses
              .map(
                (label) => ChoiceChip(
                  label: Text(label, style: const TextStyle(fontSize: 11)),
                  selected: status == label,
                  onSelected: (_) => setState(() => status = label),
                ),
              )
              .toList(),
        ),
        const SizedBox(height: 16),
        Text(
          '${visible.length} sample records shown',
          style: Theme.of(context).textTheme.bodySmall,
        ),
        const SizedBox(height: 12),
        if (visible.isEmpty)
          const SurfaceCard(
            child: Text('No sample records match this filter.'),
          ),
        ...visible.map(
          (record) => SurfaceCard(
            padding: EdgeInsets.zero,
            child: InkWell(
              borderRadius: BorderRadius.circular(16),
              onTap: () => inspect(record),
              child: Padding(
                padding: const EdgeInsets.all(18),
                child: Column(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: [
                    Row(
                      crossAxisAlignment: CrossAxisAlignment.start,
                      children: [
                        Expanded(
                          child: Text(
                            record.title,
                            style: Theme.of(context).textTheme.titleMedium,
                          ),
                        ),
                        const SizedBox(width: 10),
                        const Icon(
                          Icons.chevron_right,
                          color: AqarColors.muted,
                          size: 20,
                        ),
                      ],
                    ),
                    const SizedBox(height: 8),
                    Text(record.subtitle, style: const TextStyle(fontSize: 12)),
                    const SizedBox(height: 18),
                    Wrap(
                      spacing: 12,
                      runSpacing: 10,
                      crossAxisAlignment: WrapCrossAlignment.center,
                      children: [
                        Text(
                          record.detail,
                          style: const TextStyle(
                            fontSize: 12,
                            fontWeight: FontWeight.w600,
                            color: AqarColors.navy,
                          ),
                        ),
                        StatusTag(record.status),
                      ],
                    ),
                  ],
                ),
              ),
            ),
          ),
        ),
        if (widget.path == '/contracts')
          const SurfaceCard(
            child: ModuleShortcut(
              title: 'Payments',
              subtitle: 'Review sample financial records',
              path: '/payments',
              icon: Icons.payments_outlined,
            ),
          ),
        if (widget.path == '/payments')
          const SurfaceCard(
            child: ModuleShortcut(
              title: 'Rent collection',
              subtitle: 'Receivables and obligations',
              path: '/receivables',
              icon: Icons.account_balance_wallet_outlined,
            ),
          ),
      ],
    );
  }
}
