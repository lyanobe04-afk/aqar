import 'dart:convert';

import 'package:flutter/material.dart';
import 'package:file_selector/file_selector.dart';
import 'package:flutter/foundation.dart';

import '../demo_store.dart';
import '../../core/theme.dart';
import '../demo_forms.dart';
import '../services/inspection_pdf.dart';

class HandoverWorkspace extends StatefulWidget {
  final DemoStore store;
  const HandoverWorkspace({super.key, required this.store});
  @override
  State<HandoverWorkspace> createState() => _HandoverWorkspaceState();
}

class _HandoverWorkspaceState extends State<HandoverWorkspace> {
  DemoStore get s => widget.store;
  String unitId = '', handoverId = '';
  bool busy = false;
  int activeStep = 0;
  final scroll = ScrollController();
  @override
  void dispose() {
    scroll.dispose();
    super.dispose();
  }

  void move(int step) {
    setState(() => activeStep = step.clamp(0, 7));
    if (scroll.hasClients) scroll.jumpTo(0);
  }

  String t(String key) => s.t(key);
  Record? get current =>
      s.handoverList().where((h) => h['id'] == handoverId).firstOrNull;
  String person(dynamic id) =>
      s.all('accounts').where((a) => a['id'] == id).firstOrNull?['name'] ??
      s.all('owners').where((a) => a['id'] == id).firstOrNull?['name'] ??
      '$id';
  Widget button(String label, VoidCallback action, {bool enabled = true}) {
    final primary = [
      'Add unit item',
      'Start paired inspection',
      'Confirm inspection (simulated)',
      'Begin check-out',
      'Propose settlement',
      'Review proposal',
      'Finalize fictional settlement',
      'Download sample inspection PDF',
      'Continue',
    ].contains(label);
    final child = primary
        ? FilledButton(
            onPressed: busy || !enabled ? null : action,
            child: Text(t(label)),
          )
        : OutlinedButton(
            onPressed: busy || !enabled ? null : action,
            style: label == 'Delete item'
                ? OutlinedButton.styleFrom(foregroundColor: AqarColors.error)
                : null,
            child: Text(t(label)),
          );
    return Align(alignment: AlignmentDirectional.centerStart, child: child);
  }

  Widget card(String title, List<Widget> body) => Container(
    margin: const EdgeInsets.only(bottom: 16),
    padding: const EdgeInsets.all(20),
    decoration: BoxDecoration(
      color: Colors.white,
      borderRadius: BorderRadius.circular(14),
      border: Border.all(color: AqarColors.line),
    ),
    child: Column(
      crossAxisAlignment: CrossAxisAlignment.stretch,
      children: [
        if (title.isNotEmpty) ...[
          Text(t(title), style: Theme.of(context).textTheme.titleMedium),
          const SizedBox(height: 16),
        ],
        ...body,
      ],
    ),
  );
  Widget field(
    Record v,
    String key,
    String label, {
    List<(String, String)>? choices,
    String? type,
  }) => DemoField(
    store: s,
    values: v,
    name: key,
    label: label,
    choices: choices,
    type: type,
  );
  Widget photos(dynamic values) => Wrap(
    spacing: 8,
    runSpacing: 8,
    children: ((values as List?) ?? [])
        .map(
          (p) => Image.memory(
            base64Decode((p as String).split(',')[1]),
            width: 100,
            height: 80,
            fit: BoxFit.cover,
            semanticLabel: t('Inspection evidence'),
          ),
        )
        .toList(),
  );
  Future<void> perform(Future<void> Function() task) async {
    if (busy) return;
    setState(() => busy = true);
    try {
      await task();
    } catch (e) {
      if (mounted) {
        ScaffoldMessenger.of(context).showSnackBar(
          SnackBar(
            content: Text(t(e is StateError ? e.message.toString() : '$e')),
          ),
        );
      }
    } finally {
      if (mounted) setState(() => busy = false);
    }
  }

  Future<void> edit(
    String title,
    Record v,
    List<Widget> Function() fields,
    Future<void> Function() save,
  ) async {
    final key = GlobalKey<FormState>();
    String? error;
    bool saving = false;
    await showDialog<void>(
      context: context,
      builder: (c) => StatefulBuilder(
        builder: (c, redraw) => AlertDialog(
          title: Text(t(title)),
          content: SizedBox(
            width: 680,
            child: SingleChildScrollView(
              child: Form(
                key: key,
                child: Column(
                  mainAxisSize: MainAxisSize.min,
                  crossAxisAlignment: CrossAxisAlignment.stretch,
                  children: [
                    if (error != null)
                      Text(error!, style: const TextStyle(color: Colors.red)),
                    DemoFormGrid(children: fields()),
                  ],
                ),
              ),
            ),
          ),
          actions: [
            TextButton(
              onPressed: saving ? null : () => Navigator.pop(c),
              child: Text(t('Cancel')),
            ),
            FilledButton(
              onPressed: saving
                  ? null
                  : () async {
                      if (!key.currentState!.validate()) return;
                      redraw(() => saving = true);
                      try {
                        await save();
                        if (c.mounted) Navigator.pop(c);
                        if (mounted) setState(() {});
                      } catch (e) {
                        redraw(
                          () => error = t(
                            e is StateError ? e.message.toString() : '$e',
                          ),
                        );
                      } finally {
                        if (c.mounted) redraw(() => saving = false);
                      }
                    },
              child: Text(t('Save')),
            ),
          ],
        ),
      ),
    );
  }

  Future<void> confirm(String title, Future<void> Function() action) async {
    await edit(
      title,
      {},
      () => [Text(t('This action changes fictional local records only.'))],
      action,
    );
  }

  Future<void> item([Record? old]) async {
    final v = <String, dynamic>{
      'unitId': unitId,
      'quantity': 1,
      'value': 0,
      'condition': 'good',
      ...?old,
    };
    await edit(
      'Unit inventory item',
      v,
      () => [
        field(v, 'room', 'Room'),
        field(v, 'name', 'Item'),
        field(v, 'quantity', 'Quantity', type: 'number'),
        field(v, 'value', 'Value per item', type: 'number'),
        field(
          v,
          'condition',
          'Condition',
          choices: ['good', 'worn', 'damaged'].map((x) => (x, t(x))).toList(),
        ),
        PhotoField(store: s, values: v),
      ],
      () async {
        await s.saveInventory(v, editId: old?['id']);
      },
    );
  }

  Future<void> create() async {
    final books = s
        .all('bookings')
        .where(
          (b) =>
              b['unitId'] == unitId &&
              ['approved', 'confirmed'].contains(b['status']) &&
              !s.handoverList().any((h) => h['bookingId'] == b['id']) &&
              s.managesUnit(b['unitId']),
        )
        .toList();
    final v = <String, dynamic>{
      'bookingId': books.firstOrNull?['id'],
      'deposit': 0,
      'assumptions': 'Manual estimates; owner and broker review required. Client policy pending.',
    };
    await edit(
      'Start paired inspection',
      v,
      () => [
        field(
          v,
          'bookingId',
          'Approved booking',
          choices: books
              .map(
                (b) => (
                  '${b['id']}',
                  '${s.property(b['propertyId'])!['name']} · ${b['unitId']} · ${person(b['tenantId'])} · ${b['currency']} · ${b['id']}',
                ),
              )
              .toList(),
        ),
        field(v, 'deposit', 'Fictional deposit', type: 'number'),
        field(v, 'assumptions', 'Configurable demo assumptions'),
      ],
      () async {
        final h = await s.createHandover(v);
        handoverId = h['id'];
        activeStep = 3;
      },
    );
  }

  Future<void> assignments(Record p) async {
    final v = <String, dynamic>{'ownerId': p['ownerId']};
    final ids = List<String>.from(p['brokerIds']);
    await edit(
      'Demo relationships',
      v,
      () => [
        Text(
          t(
            'Primary manager assigns the property owner and delegated brokers. Owners review handovers; property editing remains manager-only.',
          ),
        ),
        field(
          v,
          'ownerId',
          'Owner',
          choices: s
              .all('owners')
              .map((o) => ('${o['id']}', '${o['name']}'))
              .toList(),
        ),
        ...s
            .all('accounts')
            .where((a) => a['role'] == 'manager')
            .map(
              (a) => StatefulBuilder(
                builder: (c, set) => CheckboxListTile(
                  title: Text(a['name']),
                  value: ids.contains(a['id']),
                  onChanged: (yes) => set(() {
                    if (yes == true) {
                      ids.add(a['id']);
                    } else {
                      ids.remove(a['id']);
                    }
                  }),
                ),
              ),
            ),
      ],
      () => s.assignDemoRelationships(p['id'], v['ownerId'], ids),
    );
  }

  Future<void> observation(Record h, String stage, Record i, Record r) async {
    final v = Map<String, dynamic>.from(jsonDecode(jsonEncode(r)) as Map);
    await edit(
      'Record item condition',
      v,
      () => [
        Text('${i['room']} · ${i['name']}'),
        field(v, 'quantity', 'Present quantity', type: 'number'),
        field(
          v,
          'condition',
          'Condition',
          choices: [
            'good',
            'worn',
            'damaged',
            'missing',
          ].map((x) => (x, t(x))).toList(),
        ),
        field(v, 'notes', 'Notes'),
        PhotoField(store: s, values: v),
      ],
      () => s.saveObservation(h['id'], stage, i['id'], v),
    );
  }

  Future<void> sign(Record h, String stage) async {
    final v = <String, dynamic>{'accepted': false};
    await edit(
      'Simulated signature',
      v,
      () => [
        Text(
          t(
            'Review all items. Confirmation locks this inspection. No legal signature is created.',
          ),
        ),
        Text(s.user!['name']),
        field(v, 'name', 'Type your account name'),
        StatefulBuilder(
          builder: (c, set) => CheckboxListTile(
            value: v['accepted'],
            title: Text(t('I confirm this is a simulated signature only.')),
            onChanged: (yes) => set(() => v['accepted'] = yes == true),
          ),
        ),
      ],
      () => s.signInspection(h['id'], stage, v),
    );
  }

  Future<void> proposal(Record h) async {
    final rows = s.comparison(h['id']),
        v = <String, dynamic>{'notes': h['proposal']?['notes'] ?? ''};
    for (final i in rows) {
      v[i['id']] = i['charge'];
    }
    await edit(
      'Propose settlement',
      v,
      () => [
        Text(
          t(
            'Manual proposed charges; no automatic depreciation or liability policy.',
          ),
        ),
        ...rows.map(
          (i) => i['changed'] == true
              ? field(
                  v,
                  i['id'],
                  '${i['name']} · ${t('Proposed charge')} (${h['currency']})',
                  type: 'number',
                )
              : Text('${i['name']} · ${t('Unchanged')} · 0'),
        ),
        field(v, 'notes', 'Demo reasoning / assumptions'),
      ],
      () => s.proposeSettlement(h['id'], {'charges': v, 'notes': v['notes']}),
    );
  }

  Future<void> review(Record h) async {
    final v = <String, dynamic>{'decision': 'approved'};
    await edit(
      'Owner / broker review',
      v,
      () => [
        field(
          v,
          'decision',
          'Decision',
          choices: ['approved', 'rejected'].map((x) => (x, t(x))).toList(),
        ),
        field(v, 'notes', 'Review reason'),
      ],
      () => s.reviewSettlement(h['id'], v),
    );
  }

  Future<void> pdf(Record h) async {
    final bytes = await inspectionPdfBytes(s, h),
        name = 'AQAR-SAMPLE-INSPECTION-${h['id']}.pdf';
    final file = XFile.fromData(bytes, name: name, mimeType: 'application/pdf');
    if (kIsWeb) {
      await file.saveTo(name);
    } else {
      final place = await getSaveLocation(suggestedName: name);
      if (place != null) await file.saveTo(place.path);
    }
  }

  Widget stage(Record h, String key) {
    final st = h[key],
        locked = (st['signatures'] as Map).isNotEmpty,
        signatureKey = s.role == 'tenant' ? 'tenant' : 'manager';
    return Column(
      crossAxisAlignment: CrossAxisAlignment.stretch,
      children: [
        Text(
          t(
            locked
                ? 'Confirmation started — inspection is locked.'
                : 'Draft — inspect every item before confirming.',
          ),
        ),
        ...(st['rows'] as List).map((r) {
          final i = (h['items'] as List).firstWhere(
            (i) => i['id'] == r['itemId'],
          ) as Record;
          return Padding(
            padding: const EdgeInsets.symmetric(vertical: 12),
            child: Column(
              crossAxisAlignment: CrossAxisAlignment.stretch,
              children: [
                Text(
                  '${i['room']} · ${i['name']}',
                  style: const TextStyle(fontWeight: FontWeight.bold),
                ),
                Text(
                  '${r['quantity']} / ${i['quantity']} · ${t(r['condition'])}',
                ),
                Text(r['notes']),
                photos(r['photos']),
                if (!locked && s.stageEditor(h))
                  button(
                    'Record item condition',
                    () => observation(h, key, i, Map<String, dynamic>.from(r)),
                  ),
              ],
            ),
          );
        }),
        ...(st['signatures'] as Map).entries.map(
          (e) => Container(
            margin: const EdgeInsets.only(bottom: 10),
            padding: const EdgeInsets.all(14),
            decoration: BoxDecoration(
              color: AqarColors.background,
              borderRadius: BorderRadius.circular(9),
            ),
            child: Column(
              crossAxisAlignment: CrossAxisAlignment.start,
              children: [
                Text(
                  '${t(e.key)} · ${e.value['name']}',
                  style: const TextStyle(fontWeight: FontWeight.w600),
                ),
                const SizedBox(height: 4),
                Text(
                  e.value['at'],
                  textDirection: TextDirection.ltr,
                  style: Theme.of(context).textTheme.bodySmall,
                ),
                Text(
                  t('SIMULATED SIGNATURE'),
                  style: Theme.of(context).textTheme.bodySmall,
                ),
              ],
            ),
          ),
        ),
        if (s.stageEditor(h) &&
            st['signatures'][signatureKey] == null &&
            (s.role == 'tenant' || s.user!['id'] == h['brokerId']))
          button('Confirm inspection (simulated)', () => sign(h, key)),
      ],
    );
  }

  static const steps = [
    ('Select unit', 'Choose a unit or return to a saved handover.'),
    (
      'Manage inventory',
      'Prepare the rooms, items and evidence for this unit.',
    ),
    (
      'Assign participants',
      'Check the owner, broker and tenant before starting the inspection.',
    ),
    (
      'Check-in inspection',
      'Record each incoming item, then confirm with both parties.',
    ),
    (
      'Check-out inspection',
      'Record the outgoing condition against the preserved check-in.',
    ),
    (
      'Compare condition',
      'Review changed conditions, missing quantities and supporting evidence.',
    ),
    (
      'Review settlement',
      'Propose charges, collect reviews and finalize a fictional settlement.',
    ),
    (
      'Generate PDF',
      'Download a clearly labelled sample report with the complete audit trail.',
    ),
  ];
  bool confirmed(dynamic st) =>
      st != null &&
      st['signatures']['manager'] != null &&
      st['signatures']['tenant'] != null;
  Widget tag(String label, {bool green = false}) => Container(
    padding: const EdgeInsets.symmetric(horizontal: 9, vertical: 6),
    decoration: BoxDecoration(
      color: green ? const Color(0xFFEAF4EB) : AqarColors.tint,
      borderRadius: BorderRadius.circular(7),
    ),
    child: Text(
      t(label),
      style: TextStyle(
        fontSize: 11,
        fontWeight: FontWeight.w600,
        color: green ? AqarColors.emerald : AqarColors.navy,
      ),
    ),
  );
  Widget summary(Map<String, dynamic> data) => LayoutBuilder(
    builder: (c, box) {
      final columns = box.maxWidth >= 700 ? 4 : 2;
      final width = (box.maxWidth - (columns - 1) * 12) / columns;
      return Padding(
        padding: const EdgeInsets.symmetric(vertical: 16),
        child: Wrap(
          spacing: 12,
          runSpacing: 12,
          children: data.entries
              .map(
                (e) => Container(
                  width: width,
                  padding: const EdgeInsets.all(14),
                  decoration: BoxDecoration(
                    color: const Color(0xFFFAFCFE),
                    border: Border.all(color: AqarColors.line),
                    borderRadius: BorderRadius.circular(10),
                  ),
                  child: Column(
                    crossAxisAlignment: CrossAxisAlignment.start,
                    children: [
                      Text(
                        t(e.key),
                        style: Theme.of(context).textTheme.bodySmall,
                      ),
                      const SizedBox(height: 8),
                      Text(
                        '${e.value}',
                        style: const TextStyle(
                          fontSize: 15,
                          fontWeight: FontWeight.w600,
                          color: AqarColors.darkNavy,
                        ),
                      ),
                    ],
                  ),
                ),
              )
              .toList(),
        ),
      );
    },
  );
  Widget empty(String title, String description, {int? target}) => Container(
    width: double.infinity,
    padding: const EdgeInsets.all(24),
    decoration: BoxDecoration(
      color: const Color(0xFFFAFCFE),
      borderRadius: BorderRadius.circular(12),
      border: Border.all(color: AqarColors.line),
    ),
    child: Column(
      children: [
        const Icon(Icons.fact_check_outlined, size: 30, color: AqarColors.navy),
        const SizedBox(height: 14),
        Text(
          t(title),
          style: Theme.of(context).textTheme.titleMedium,
          textAlign: TextAlign.center,
        ),
        const SizedBox(height: 8),
        Text(t(description), textAlign: TextAlign.center),
        if (target != null) ...[
          const SizedBox(height: 18),
          FilledButton(
            onPressed: () => move(target),
            child: Text(t(steps[target].$1)),
          ),
        ],
      ],
    ),
  );
  Widget people(Record h) => LayoutBuilder(
    builder: (c, box) => Wrap(
      spacing: 12,
      runSpacing: 12,
      children: ['owner', 'broker', 'tenant']
          .map(
            (role) => Container(
              width: box.maxWidth >= 700
                  ? (box.maxWidth - 24) / 3
                  : box.maxWidth,
              padding: const EdgeInsets.all(16),
              decoration: BoxDecoration(
                border: Border.all(color: AqarColors.line),
                borderRadius: BorderRadius.circular(10),
              ),
              child: Column(
                crossAxisAlignment: CrossAxisAlignment.start,
                children: [
                  Text(t(role), style: Theme.of(context).textTheme.bodySmall),
                  const SizedBox(height: 8),
                  Text(
                    '${h['participants'][h['${role}Id']]}',
                    style: const TextStyle(
                      fontWeight: FontWeight.w600,
                      color: AqarColors.darkNavy,
                    ),
                  ),
                ],
              ),
            ),
          )
          .toList(),
    ),
  );
  Widget inventoryRows(List<Record> items) => Column(
    children: items
        .map(
          (i) => card('', [
            Row(
              crossAxisAlignment: CrossAxisAlignment.start,
              children: [
                Expanded(
                  child: Column(
                    crossAxisAlignment: CrossAxisAlignment.start,
                    children: [
                      Text(
                        i['name'],
                        style: Theme.of(context).textTheme.titleMedium,
                      ),
                      Text(i['room']),
                    ],
                  ),
                ),
                tag(i['condition'], green: i['condition'] == 'good'),
              ],
            ),
            const SizedBox(height: 12),
            Wrap(
              spacing: 20,
              runSpacing: 8,
              children: [
                Text('${t('Quantity')}: ${i['quantity']}'),
                Text('${s.money(i['value'], i['currency'])} ${t('per item')}'),
              ],
            ),
            if ((i['photos'] as List).isNotEmpty) ...[
              const SizedBox(height: 12),
              photos(i['photos']),
            ],
            if (s.managesUnit(unitId))
              Padding(
                padding: const EdgeInsets.only(top: 14),
                child: Wrap(
                  spacing: 8,
                  runSpacing: 8,
                  children: [
                    button('Edit item', () => item(i)),
                    button(
                      'Delete item',
                      () => confirm(
                        'Delete this unit inventory item? Snapshotted items are protected.',
                        () => s.deleteInventory(i['id']),
                      ),
                    ),
                  ],
                ),
              ),
          ]),
        )
        .toList(),
  );
  Widget stepContent(
    List<Record> units,
    Record? p,
    Record? h,
    List<Record> archives,
  ) {
    final items = s.inventory(unitId);
    switch (activeStep) {
      case 0:
        return Column(
          crossAxisAlignment: CrossAxisAlignment.stretch,
          children: [
            DropdownButtonFormField<String>(
              key: ValueKey('unit-$unitId'),
              initialValue: unitId.isEmpty ? null : unitId,
              isExpanded: true,
              decoration: InputDecoration(labelText: t('Unit')),
              items: units
                  .map(
                    (u) => DropdownMenuItem(
                      value: '${u['id']}',
                      child: Text(
                        '${s.property(u['propertyId'])!['name']} · ${u['name']}',
                        overflow: TextOverflow.ellipsis,
                      ),
                    ),
                  )
                  .toList(),
              onChanged: units.isEmpty
                  ? null
                  : (v) => setState(() {
                      unitId = v!;
                      handoverId = '';
                    }),
            ),
            summary({
              'Country': p == null ? '—' : s.countryName(p['country']),
              'Currency': p?['currency'] ?? '—',
              'Items': items.length,
              'Saved handovers': archives.length,
            }),
            if (archives.isNotEmpty)
              DropdownButtonFormField<String>(
                key: ValueKey('archive-$handoverId'),
                initialValue: handoverId,
                isExpanded: true,
                decoration: InputDecoration(labelText: t('Handover archive')),
                items: archives
                    .map(
                      (v) => DropdownMenuItem(
                        value: '${v['id']}',
                        child: Text(
                          '${v['unitName']} · ${v['bookingId']}${v['settledAt'] == null ? '' : ' · ${t('Simulated settlement')}'}',
                          overflow: TextOverflow.ellipsis,
                        ),
                      ),
                    )
                    .toList(),
                onChanged: (v) => setState(() => handoverId = v!),
              )
            else
              Text(t('No paired inspections yet.')),
          ],
        );
      case 1:
        return Column(
          crossAxisAlignment: CrossAxisAlignment.stretch,
          children: [
            if (s.managesUnit(unitId))
              Padding(
                padding: const EdgeInsets.only(bottom: 18),
                child: button('Add unit item', () => item()),
              ),
            if (items.isEmpty)
              empty(
                'Prepare your unit inventory',
                'Add the first room and item to create a clear baseline before check-in.',
              )
            else
              inventoryRows(items),
            Text(
              t('Legacy property inventory remains unchanged.'),
              style: Theme.of(context).textTheme.bodySmall,
            ),
          ],
        );
      case 2:
        return Column(
          crossAxisAlignment: CrossAxisAlignment.stretch,
          children: [
            if (h != null) ...[
              people(h),
              summary({
                'Booking': h['bookingId'],
                'Contract': h['contractId'].toString().isEmpty
                    ? t('Booking reference only; no legal lease')
                    : h['contractId'],
                'Fictional deposit': s.money(h['deposit'], h['currency']),
              }),
              Text(h['assumptions']),
            ] else if (p != null) ...[
              Text('${t('Owner')}: ${person(p['ownerId'])}'),
              const SizedBox(height: 8),
              Text(
                '${t('Broker')}: ${(p['brokerIds'] as List).map(person).join(', ')}',
              ),
            ],
            if (p != null && s.isDemoAdmin)
              Padding(
                padding: const EdgeInsets.symmetric(vertical: 16),
                child: button(
                  'Edit property assignments',
                  () => assignments(p),
                ),
              ),
            if (s.role == 'manager')
              button(
                h == null
                    ? 'Start paired inspection'
                    : 'Start another handover',
                create,
              )
            else if (h == null)
              empty(
                'An approved booking is needed',
                'Choose a unit with an approved booking to connect the tenant and start a paired inspection.',
                target: 0,
              ),
          ],
        );
      case 3:
        return h == null
            ? empty(
                'Start the paired inspection first',
                'Assign participants and create the handover before recording incoming conditions.',
                target: 2,
              )
            : stage(h, 'checkin');
      case 4:
        if (h?['checkout'] != null) return stage(h!, 'checkout');
        return Column(
          children: [
            empty(
              'Check-out is not started',
              confirmed(h?['checkin'])
                  ? 'The incoming inspection is confirmed. Start a new outgoing record without changing its baseline.'
                  : 'Both parties must confirm check-in before check-out can begin.',
              target: 3,
            ),
            if (h != null && s.role == 'manager' && confirmed(h['checkin']))
              Padding(
                padding: const EdgeInsets.only(top: 16),
                child: button(
                  'Begin check-out',
                  () => perform(() => s.beginCheckout(h['id'])),
                ),
              ),
          ],
        );
      case 5:
        if (h?['checkout'] == null) {
          return empty(
            'Record the outgoing condition first',
            'The comparison becomes available when check-out has been started.',
            target: 4,
          );
        }
        return Column(
          children: s
              .comparison(h!['id'])
              .map(
                (i) => card('', [
                  Row(
                    children: [
                      Expanded(
                        child: Text(
                          '${i['room']} · ${i['name']}',
                          style: Theme.of(context).textTheme.titleMedium,
                        ),
                      ),
                      tag(i['changed'] ? 'Changed' : 'Unchanged'),
                    ],
                  ),
                  const SizedBox(height: 14),
                  LayoutBuilder(
                    builder: (c, box) => Wrap(
                      spacing: 12,
                      runSpacing: 12,
                      children: ['before', 'after']
                          .map(
                            (key) => Container(
                              width: (box.maxWidth - 12) / 2,
                              padding: const EdgeInsets.all(12),
                              decoration: BoxDecoration(
                                color: AqarColors.background,
                                borderRadius: BorderRadius.circular(9),
                              ),
                              child: Column(
                                crossAxisAlignment: CrossAxisAlignment.start,
                                children: [
                                  Text(
                                    t(key == 'before' ? 'Before' : 'After'),
                                    style: Theme.of(context)
                                        .textTheme
                                        .bodySmall,
                                  ),
                                  const SizedBox(height: 6),
                                  Text(
                                    '${i[key]['quantity']} · ${t(i[key]['condition'])}',
                                  ),
                                  photos(i[key]['photos']),
                                ],
                              ),
                            ),
                          )
                          .toList(),
                    ),
                  ),
                  const SizedBox(height: 12),
                  Text('${t('Missing quantity')}: ${i['missing']}'),
                  Text(
                    '${t('Proposed charge')}: ${s.money(i['charge'], h['currency'])}',
                  ),
                  if ('${i['after']['notes']}'.isNotEmpty)
                    Text(i['after']['notes']),
                ]),
              )
              .toList(),
        );
      case 6:
        final q = h?['proposal'];
        if (q == null) {
          return Column(
            children: [
              empty(
                'No settlement proposal yet',
                confirmed(h?['checkout'])
                    ? 'Review the comparison and enter manual proposed charges for changed items.'
                    : 'Confirm the outgoing inspection with both parties before proposing charges.',
                target: confirmed(h?['checkout']) ? 5 : 4,
              ),
              if (h != null && confirmed(h['checkout']) && s.role == 'manager')
                Padding(
                  padding: const EdgeInsets.only(top: 16),
                  child: button('Propose settlement', () => proposal(h)),
                ),
            ],
          );
        }
        return Column(
          crossAxisAlignment: CrossAxisAlignment.stretch,
          children: [
            summary({
              'Fictional deposit': s.money(h!['deposit'], h['currency']),
              'Proposed charges': s.money(q['total'], h['currency']),
              'Deposit deduction': s.money(q['deduction'], h['currency']),
              'Refund': s.money(q['refund'], h['currency']),
              'Excess (informational only)': s.money(
                q['excess'],
                h['currency'],
              ),
            }),
            Text('${t('Revision')} ${q['revision']} · ${q['notes']}'),
            const SizedBox(height: 16),
            ...(q['reviews'] as Map).entries.map(
              (e) => card('${t(e.key)} · ${t(e.value['decision'])}', [
                Text(e.value['notes']),
                const SizedBox(height: 6),
                Text(
                  e.value['at'],
                  textDirection: TextDirection.ltr,
                  style: Theme.of(context).textTheme.bodySmall,
                ),
              ]),
            ),
            if (h['settledAt'] != null)
              tag('Simulated settlement', green: true)
            else
              Wrap(
                spacing: 10,
                runSpacing: 10,
                children: [
                  if (s.role == 'manager')
                    button('Propose settlement', () => proposal(h)),
                  if (s.role == 'owner' || s.user!['id'] == h['brokerId'])
                    button('Review proposal', () => review(h)),
                  if (s.role == 'manager')
                    button(
                      'Finalize fictional settlement',
                      () => confirm(
                        'No funds are deducted or refunded. Archive this approved simulation?',
                        () => s.settleHandover(h['id']),
                      ),
                    ),
                ],
              ),
          ],
        );
      default:
        if (h == null) {
          return empty(
            'No report available yet',
            'Create a handover to generate a clearly labelled sample inspection report.',
            target: 2,
          );
        }
        return Column(
          crossAxisAlignment: CrossAxisAlignment.stretch,
          children: [
            const Icon(
              Icons.picture_as_pdf_outlined,
              color: AqarColors.navy,
              size: 40,
            ),
            const SizedBox(height: 16),
            Text(
              t('Your inspection report'),
              textAlign: TextAlign.center,
              style: Theme.of(context).textTheme.titleLarge,
            ),
            const SizedBox(height: 8),
            Text(
              t(
                'Includes the baseline, photos, observations, confirmations, comparison and settlement reviews.',
              ),
              textAlign: TextAlign.center,
            ),
            const SizedBox(height: 20),
            Center(
              child: FilledButton(
                onPressed: busy ? null : () => perform(() => pdf(h)),
                child: Text(t('Download sample inspection PDF')),
              ),
            ),
            const SizedBox(height: 16),
            Center(
              child: tag(
                h['settledAt'] == null
                    ? 'Draft proposal — not finalized'
                    : 'Simulated settlement',
                green: h['settledAt'] != null,
              ),
            ),
            summary({
              'Booking': h['bookingId'],
              'Unit': h['unitName'],
              'Currency': h['currency'],
              'Time zone': h['timeZone'],
            }),
          ],
        );
    }
  }

  @override
  Widget build(BuildContext context) => LayoutBuilder(
    builder: (context, box) {
      final units = s
          .all('units')
          .where(
            (u) =>
                s.canSeeProperty(u['propertyId']) &&
                (s.role != 'tenant' ||
                    s
                        .all('bookings')
                        .any(
                          (b) =>
                              b['unitId'] == u['id'] &&
                              b['tenantId'] == s.user!['id'] &&
                              ['approved', 'confirmed'].contains(b['status']),
                        )),
          )
          .toList();
      final all = s.handoverList();
      if (unitId.isEmpty &&
          all.isNotEmpty &&
          units.any((u) => u['id'] == all.first['unitId'])) {
        unitId = all.first['unitId'];
      }
      if (!units.any((u) => u['id'] == unitId)) {
        unitId =
            units
                .where(
                  (u) => s.all('bookings').any((b) => b['unitId'] == u['id']),
                )
                .firstOrNull?['id'] ??
            units.firstOrNull?['id'] ??
            '';
      }
      final archives = all.where((h) => h['unitId'] == unitId).toList();
      if (!archives.any((h) => h['id'] == handoverId)) {
        handoverId = archives.firstOrNull?['id'] ?? '';
      }
      final h = current,
          p = units.isEmpty
              ? null
              : s.property(
                  units.firstWhere((u) => u['id'] == unitId)['propertyId'],
                ),
          items = s.inventory(unitId);
      final complete = [
        p != null,
        items.isNotEmpty,
        h != null,
        confirmed(h?['checkin']),
        confirmed(h?['checkout']),
        confirmed(h?['checkout']),
        h?['settledAt'] != null,
        false,
      ];
      final wide = box.maxWidth >= 1000;
      final navigation = wide
          ? Container(
              width: 210,
              padding: const EdgeInsets.all(8),
              decoration: BoxDecoration(
                color: Colors.white,
                border: Border.all(color: AqarColors.line),
                borderRadius: BorderRadius.circular(14),
              ),
              child: Column(
                children: List.generate(
                  8,
                  (i) => Padding(
                    padding: const EdgeInsets.only(bottom: 4),
                    child: Semantics(
                      selected: activeStep == i,
                      child: TextButton(
                        style: TextButton.styleFrom(
                          minimumSize: const Size(double.infinity, 54),
                          padding: const EdgeInsets.all(10),
                          backgroundColor: activeStep == i
                              ? AqarColors.tint
                              : Colors.transparent,
                          shape: RoundedRectangleBorder(
                            borderRadius: BorderRadius.circular(9),
                          ),
                        ),
                        onPressed: () => move(i),
                        child: Row(
                          children: [
                            Container(
                              width: 28,
                              height: 28,
                              alignment: Alignment.center,
                              decoration: BoxDecoration(
                                color: activeStep == i
                                    ? AqarColors.navy
                                    : complete[i]
                                    ? const Color(0xFFEAF4EB)
                                    : AqarColors.background,
                                shape: BoxShape.circle,
                              ),
                              child: Text(
                                complete[i] ? '✓' : '${i + 1}',
                                style: TextStyle(
                                  fontSize: 11,
                                  color: activeStep == i
                                      ? Colors.white
                                      : complete[i]
                                      ? AqarColors.emerald
                                      : AqarColors.muted,
                                ),
                              ),
                            ),
                            const SizedBox(width: 10),
                            Expanded(
                              child: Text(
                                t(steps[i].$1),
                                style: TextStyle(
                                  fontSize: 12,
                                  fontWeight: activeStep == i
                                      ? FontWeight.w600
                                      : FontWeight.w400,
                                ),
                              ),
                            ),
                          ],
                        ),
                      ),
                    ),
                  ),
                ),
              ),
            )
          : Padding(
              padding: const EdgeInsets.only(bottom: 16),
              child: Column(
                children: [
                  DropdownButtonFormField<int>(
                    key: ValueKey('handover-step-$activeStep'),
                    initialValue: activeStep,
                    isExpanded: true,
                    decoration: InputDecoration(labelText: t('Handover steps')),
                    items: List.generate(
                      8,
                      (i) => DropdownMenuItem(
                        value: i,
                        child: Text('${i + 1} / 8 · ${t(steps[i].$1)}'),
                      ),
                    ),
                    onChanged: (i) => move(i!),
                  ),
                  const SizedBox(height: 10),
                  ClipRRect(
                    borderRadius: BorderRadius.circular(5),
                    child: LinearProgressIndicator(
                      value: (activeStep + 1) / 8,
                      minHeight: 4,
                      backgroundColor: AqarColors.line,
                    ),
                  ),
                ],
              ),
            );
      final panel = Container(
        decoration: BoxDecoration(
          color: Colors.white,
          border: Border.all(color: AqarColors.line),
          borderRadius: BorderRadius.circular(14),
        ),
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.stretch,
          children: [
            Padding(
              padding: const EdgeInsets.all(20),
              child: Column(
                crossAxisAlignment: CrossAxisAlignment.start,
                children: [
                  Text(
                    '${t('Step')} ${activeStep + 1} / 8',
                    style: const TextStyle(
                      fontSize: 11,
                      color: AqarColors.muted,
                      fontWeight: FontWeight.w600,
                    ),
                  ),
                  const SizedBox(height: 8),
                  Text(
                    t(steps[activeStep].$1),
                    style: Theme.of(context).textTheme.titleLarge,
                  ),
                  const SizedBox(height: 8),
                  Text(t(steps[activeStep].$2)),
                ],
              ),
            ),
            const Divider(height: 1),
            Padding(
              padding: const EdgeInsets.all(20),
              child: stepContent(units, p, h, archives),
            ),
          ],
        ),
      );
      final content = SingleChildScrollView(
        controller: scroll,
        padding: EdgeInsets.all(box.maxWidth < 600 ? 16 : 24),
        child: Center(
          child: ConstrainedBox(
            constraints: const BoxConstraints(maxWidth: 1280),
            child: Column(
              crossAxisAlignment: CrossAxisAlignment.stretch,
              children: [
                Text(
                  t('A clear record. From arrival to departure.'),
                  style: Theme.of(context).textTheme.titleMedium,
                ),
                const SizedBox(height: 16),
                card('', [
                  LayoutBuilder(
                    builder: (c, area) => Wrap(
                      spacing: 16,
                      runSpacing: 12,
                      crossAxisAlignment: WrapCrossAlignment.center,
                      children: [
                        SizedBox(
                          width: area.maxWidth >= 750
                              ? area.maxWidth - 240
                              : area.maxWidth,
                          child: Column(
                            crossAxisAlignment: CrossAxisAlignment.start,
                            children: [
                              Text(
                                p == null
                                    ? t('Select unit')
                                    : '${p['name']} · ${units.firstWhere((u) => u['id'] == unitId)['name']}',
                                style: Theme.of(context).textTheme.titleMedium,
                              ),
                              const SizedBox(height: 4),
                              Text(
                                h == null
                                    ? (p == null
                                          ? ''
                                          : '${s.countryName(p['country'])} · ${p['currency']}')
                                    : '${h['participants'][h['tenantId']]} · ${h['currency']} · ${h['timeZone']}',
                                style: Theme.of(context).textTheme.bodySmall,
                              ),
                            ],
                          ),
                        ),
                        tag(
                          h == null
                              ? 'Not started'
                              : h['settledAt'] != null
                              ? 'Simulated settlement'
                              : confirmed(h['checkout'])
                              ? 'Confirmed'
                              : 'In progress',
                          green: h?['settledAt'] != null,
                        ),
                        if (activeStep != 0)
                          OutlinedButton(
                            onPressed: () => move(0),
                            child: Text(t('Change unit')),
                          ),
                      ],
                    ),
                  ),
                ]),
                if (wide)
                  Row(
                    crossAxisAlignment: CrossAxisAlignment.start,
                    children: [
                      navigation,
                      const SizedBox(width: 24),
                      Expanded(child: panel),
                    ],
                  )
                else ...[
                  navigation,
                  panel,
                ],
                const SizedBox(height: 12),
                ExpansionTile(
                  tilePadding: EdgeInsets.zero,
                  title: Text(
                    t('Demo assumptions & limitations'),
                    style: Theme.of(context).textTheme.bodySmall,
                  ),
                  children: [
                    Text(
                      t(
                        'Local demonstration only. Signatures and settlement are simulated; no legal agreement or payment.',
                      ),
                    ),
                    Text(t(s.state['handoverPolicy']['valuation'])),
                    Text(t(s.state['handoverPolicy']['settlement'])),
                  ],
                ),
              ],
            ),
          ),
        ),
      );
      return Column(
        children: [
          Expanded(child: content),
          Material(
            color: Colors.white,
            child: SafeArea(
              top: false,
              child: Column(
                children: [
                  const Divider(height: 1),
                  Padding(
                    padding: const EdgeInsets.all(16),
                    child: Row(
                      mainAxisAlignment: MainAxisAlignment.spaceBetween,
                      children: [
                        OutlinedButton(
                          onPressed: activeStep == 0
                              ? null
                              : () => move(activeStep - 1),
                          child: Text(t('Previous')),
                        ),
                        const SizedBox(width: 12),
                        Flexible(
                          child: FilledButton(
                            onPressed: () =>
                                move(activeStep == 7 ? 0 : activeStep + 1),
                            child: Text(
                              t(
                                activeStep == 7
                                    ? 'Back to overview'
                                    : 'Continue',
                              ),
                            ),
                          ),
                        ),
                      ],
                    ),
                  ),
                ],
              ),
            ),
          ),
        ],
      );
    },
  );
}
