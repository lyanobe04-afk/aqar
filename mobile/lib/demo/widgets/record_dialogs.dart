part of '../interactive_page.dart';

extension _RecordDialogs on _InteractivePageState {
  Future<void> formDialog(
    String title,
    Record v,
    List<Widget> Function() fields,
    Future<void> Function() submit, {
    String label = 'Save demo changes',
  }) async {
    final key = GlobalKey<FormState>();
    String? failure;
    bool saving = false;
    await showDialog<void>(
      context: context,
      builder: (c) => StatefulBuilder(
        builder: (c, setDialog) => AlertDialog(
          title: Text(t(title)),
          content: SizedBox(
            width: 680,
            child: SingleChildScrollView(
              child: Form(
                key: key,
                child: Column(
                  mainAxisSize: MainAxisSize.min,
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: [
                    if (failure != null) errorBox(failure!),
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
                      setDialog(() => saving = true);
                      try {
                        await submit();
                        if (c.mounted) Navigator.pop(c);
                        if (mounted) {
                          ScaffoldMessenger.of(context).showSnackBar(
                            SnackBar(
                              content: Text(
                                t('Sample records updated locally.'),
                              ),
                            ),
                          );
                        }
                      } catch (e) {
                        if (c.mounted) {
                          setDialog(() {
                            failure = errorText(e);
                            saving = false;
                          });
                        }
                      }
                    },
              child: Text(t(label)),
            ),
          ],
        ),
      ),
    );
  }

  Future<void> bookingDialog() async {
    final v = bookingDefaults();
    await formDialog('Create booking', v, () => bookingFields(v), () async {
      await s.book(v);
    }, label: 'Submit demo booking');
  }

  Future<void> unitDialog([Record? unit]) async {
    final v = <String, dynamic>{
      'propertyId': s.properties().firstOrNull?['id'],
      'name': '',
      'price': '7500',
      'beds': '2',
      'baths': '2',
      'status': 'vacant',
      'ratePeriod': 'month',
      'minNights': 1,
      ...?unit,
      'areaUnit': s.preferences['measurement'],
      'area':
          (num.parse('${unit?['area'] ?? 115}') *
                  (s.preferences['measurement'] == 'sqft' ? 10.7639104 : 1))
              .toStringAsFixed(2),
      'amenities': (unit?['amenities'] as List?)?.join(', ') ?? '',
    };
    await formDialog(
      unit == null ? 'Add unit' : 'Edit unit',
      v,
      () => [
        field(
          v,
          'propertyId',
          'Property',
          choices: s
              .properties()
              .map((p) => ('${p['id']}', s.label(p)))
              .toList(),
        ),
        field(v, 'name', 'Unit name'),
        field(v, 'price', 'Price in property currency', type: 'number'),
        field(
          v,
          'ratePeriod',
          'Rental duration',
          choices: [
            'night',
            'week',
            'month',
            'year',
          ].map((v) => (v, t(v))).toList(),
        ),
        field(v, 'minNights', 'Minimum stay (nights)', type: 'number'),
        field(
          v,
          'furnishing',
          'Furnishing',
          choices: [
            'not specified',
            'furnished',
            'unfurnished',
          ].map((x) => (x, t(x))).toList(),
        ),
        field(
          v,
          'equipment',
          'Equipment / finishing (demo description)',
          required: false,
        ),
        field(v, 'amenities', 'Amenities (comma separated)', required: false),
        PhotoField(store: s, values: v),
        field(v, 'beds', 'Bedrooms', type: 'number'),
        field(v, 'baths', 'Bathrooms', type: 'number'),
        field(
          v,
          'area',
          s.preferences['measurement'] == 'sqft'
              ? 'Area (sq ft)'
              : 'Area (sq m)',
          type: 'number',
        ),
        if (unit != null)
          field(
            v,
            'status',
            'Status',
            choices: [
              'vacant',
              'occupied',
              'maintenance',
              'unavailable',
            ].map((a) => (a, t(a))).toList(),
          ),
      ],
      () => s.saveUnit(v, editId: unit?['id']),
      label: 'Save sample unit',
    );
  }

  Future<void> paymentDialog() async {
    final books = s
        .records('bookings')
        .where((b) => ['approved', 'confirmed'].contains(b['status']))
        .toList();
    final v = <String, dynamic>{
      'bookingId': books.firstOrNull?['id'],
      'status': 'pending',
      'amount': '',
      'note': 'SIMULATED receipt only',
    };
    await formDialog(
      'Record simulated payment',
      v,
      () => [
        banner('SIMULATED · No money moved'),
        field(
          v,
          'bookingId',
          'Booking',
          choices: books
              .map(
                (b) => (
                  '${b['id']}',
                  '${propName(b['propertyId'])} · ${t('Outstanding')}: ${money((b['amount'] as num) - s.paid(b['id']), b)}',
                ),
              )
              .toList(),
        ),
        field(
          v,
          'amount',
          'Simulated amount in booking currency',
          type: 'number',
        ),
        if (s.role == 'manager')
          field(
            v,
            'status',
            'Status',
            choices: ['pending', 'verified'].map((v) => (v, t(v))).toList(),
          ),
        field(v, 'note', 'Demo note', required: false, lines: 2),
      ],
      () async {
        await s.payment(v);
      },
      label: 'Record simulated payment',
    );
  }

  Future<void> contractDialog() async {
    final books = s
        .records('bookings')
        .where((b) => ['approved', 'confirmed'].contains(b['status']));
    final v = <String, dynamic>{'title': 'Sample rental agreement'};
    await formDialog(
      'Create sample contract',
      v,
      () => [
        banner('SAMPLE DOCUMENT · Not a legally executed agreement'),
        field(
          v,
          'bookingId',
          'Approved booking',
          choices: books
              .map(
                (b) =>
                    ('${b['id']}', '${propName(b['propertyId'])} · ${b['id']}'),
              )
              .toList(),
        ),
        field(v, 'title', 'Contract title'),
      ],
      () => s.contract(v),
      label: 'Create sample contract',
    );
  }

  Future<void> maintenanceDialog() async {
    final v = <String, dynamic>{'cost': '0', 'priority': 'medium'};
    await formDialog(
      'Submit maintenance request',
      v,
      () => [
        field(
          v,
          'propertyId',
          'Property',
          choices: s
              .properties()
              .map((p) => ('${p['id']}', s.label(p)))
              .toList(),
        ),
        field(v, 'title', 'Request title'),
        field(v, 'description', 'Description', lines: 3),
        field(
          v,
          'priority',
          'Priority',
          choices: ['low', 'medium', 'high'].map((a) => (a, t(a))).toList(),
        ),
        field(v, 'cost', 'Estimated cost in property currency', type: 'number'),
        PhotoField(store: s, values: v),
      ],
      () => s.maintenance(v),
      label: 'Submit sample request',
    );
  }

  Future<void> statusAction(String kind, Record record, String status) async {
    if (!await confirm('Update the selected sample record?')) return;
    await run(() async {
      if (kind == 'bookings') await s.bookingStatus(record['id'], status);
      if (kind == 'payments') await s.verify(record['id']);
      if (kind == 'maintenance') {
        await s.maintenanceStatus(record['id'], status);
      }
    });
  }

  Future<void> statusDialog(String kind, Record r) async {
    final v = <String, dynamic>{'status': r['status']};
    await formDialog(
      'Change demonstration status',
      v,
      () => [
        field(
          v,
          'status',
          'Status',
          choices:
              (kind == 'contracts'
                      ? ['draft', 'active', 'expired', 'terminated']
                      : [
                          'pending approval',
                          'approved',
                          'rejected',
                          'in progress',
                          'completed',
                        ])
                  .map((v) => (v, t(v)))
                  .toList(),
        ),
      ],
      () => kind == 'contracts'
          ? s.contractStatus(r['id'], v['status'])
          : s.maintenanceStatus(r['id'], v['status']),
      label: 'Update demo status',
    );
  }

  Future<void> personDialog(String kind) async {
    final v = <String, dynamic>{};
    await formDialog(
      kind == 'owners' ? 'Add owner' : 'Add tenant',
      v,
      () => [
        field(v, 'name', 'Name'),
        field(v, 'email', 'Demo email', type: 'email'),
      ],
      () => s.commit(() {
        s.require(['manager']);
        s.all(kind).add({
          'id': s.id(kind),
          'name': v['name'],
          'email': v['email'],
        });
      }),
      label: 'Add sample person',
    );
  }

  Future<void> documentDialog() async {
    final v = <String, dynamic>{};
    await formDialog(
      'Add sample document',
      v,
      () => [
        banner('Only a sample reference is stored. No file is uploaded.'),
        field(v, 'title', 'Document title'),
        field(
          v,
          'propertyId',
          'Property',
          choices: s
              .properties()
              .map((p) => ('${p['id']}', s.label(p)))
              .toList(),
        ),
      ],
      () => s.commit(() {
        s.require(['manager']);
        s.all('documents').add({
          ...v,
          'id': s.id('d'),
          'type': 'Sample attachment',
        });
      }),
      label: 'Add sample reference',
    );
  }

  Future<void> furnitureDialog() async {
    final v = <String, dynamic>{'quantity': '1'};
    await formDialog(
      'Add inventory item',
      v,
      () => [
        field(v, 'name', 'Item name'),
        field(v, 'room', 'Room'),
        field(v, 'quantity', 'Quantity', type: 'number'),
        field(
          v,
          'propertyId',
          'Property',
          choices: s
              .properties()
              .map((p) => ('${p['id']}', s.label(p)))
              .toList(),
        ),
      ],
      () => s.commit(() {
        s.require(['manager']);
        final q = int.tryParse(v['quantity']);
        if (q == null || q < 1) {
          throw StateError('Please complete the required fields correctly.');
        }
        s.all('furniture').add({
          ...v,
          'id': s.id('f'),
          'quantity': q,
          'condition': 'not assessed',
        });
      }),
      label: 'Add sample item',
    );
  }

  Future<void> conditionDialog(Record r) async {
    final v = <String, dynamic>{'condition': r['condition']};
    await formDialog(
      'Update condition',
      v,
      () => [
        field(
          v,
          'condition',
          'Condition',
          choices: [
            'good',
            'damaged',
            'not assessed',
          ].map((a) => (a, t(a))).toList(),
        ),
      ],
      () => s.commit(() {
        s.require(['manager']);
        r['condition'] = v['condition'];
      }),
      label: 'Save sample condition',
    );
  }

  Future<void> recordDetails(String kind, Record r) async {
    if (kind == 'documents') {
      await downloadRecord(kind, r);
      return;
    }
    final title = kind == 'contracts'
        ? 'Sample contract'
        : kind == 'maintenance'
        ? 'Maintenance request'
        : kind == 'bookings'
        ? 'Booking details'
        : kind == 'payments'
        ? 'Simulated payment details'
        : 'Furniture inventory';
    await showModalBottomSheet<void>(
      context: context,
      isScrollControlled: true,
      showDragHandle: true,
      builder: (c) => SafeArea(
        child: ConstrainedBox(
          constraints: BoxConstraints(
            maxHeight: MediaQuery.sizeOf(c).height * .84,
          ),
          child: SingleChildScrollView(
            padding: const EdgeInsets.all(22),
            child: Column(
              crossAxisAlignment: CrossAxisAlignment.start,
              mainAxisSize: MainAxisSize.min,
              children: [
                Text(t(title), style: Theme.of(c).textTheme.titleLarge),
                const SizedBox(height: 16),
                banner(
                  kind == 'contracts'
                      ? 'SAMPLE DOCUMENT · Not a legally executed agreement'
                      : 'Interactive demo · Fictional records · Changes are saved locally only · No real transactions',
                ),
                pair('Property', propName(r['propertyId'])),
                if (r['title'] != null) pair('Title', r['title']),
                if (r['amount'] != null) pair('Amount', money(r['amount'], r)),
                if (kind == 'bookings') ...[
                  pair('Country', s.countryName(r['country'])),
                  pair('Property time zone', r['timeZone']),
                  pair('Rental duration', t(r['ratePeriod'])),
                ],
                if (r['start'] != null) ...[
                  pair('Check-in', s.date(r['start'])),
                  pair('Check-out', s.date(r['end'])),
                ],
                if (r['status'] != null) badge(r['status']),
                if (r['description'] != null)
                  Padding(
                    padding: const EdgeInsets.symmetric(vertical: 14),
                    child: Text(r['description']),
                  ),
                if (r['note'] != null) Text(r['note']),
                photoList(r),
                if (kind == 'maintenance') ...[
                  const SizedBox(height: 14),
                  Text(
                    t('Comments'),
                    style: const TextStyle(fontWeight: FontWeight.w600),
                  ),
                  ...((r['comments'] as List?) ?? []).map(
                    (note) => Padding(
                      padding: const EdgeInsets.symmetric(vertical: 8),
                      child: Text(
                        '${note['name']} · ${note['date']}\n${note['text']}',
                      ),
                    ),
                  ),
                  actions([
                    action('Add comment', () {
                      Navigator.pop(c);
                      final v = <String, dynamic>{};
                      formDialog(
                        'Add comment',
                        v,
                        () => [field(v, 'text', 'Comment', lines: 3)],
                        () => s.comment(r['id'], v['text']),
                        label: 'Add comment',
                      );
                    }),
                  ]),
                ],
                actions([
                  if (kind == 'contracts')
                    action('Download sample', () => downloadRecord(kind, r)),
                  action('Close', () => Navigator.pop(c)),
                ]),
              ],
            ),
          ),
        ),
      ),
    );
  }

  Future<void> downloadRecord(String kind, Record r) async => run(
    () => saveDemoText(
      'AQAR-SAMPLE-${r['id']}.txt',
      'SAMPLE DOCUMENT — NOT LEGALLY EXECUTED\n${r['title'] ?? r['name'] ?? r['id']}\n${propName(r['propertyId'])}\n${r['start'] ?? ''} ${r['end'] ?? ''}\n${s.currency(r)} ${r['amount'] ?? 0}\nStatus: ${r['status'] ?? 'sample'} (DEMO)\nFictional record only. No money moved; no signature or legal execution.',
    ),
    message: '',
  );
  Future<void> export(String kind) async {
    final rows = kind == 'properties'
        ? s.properties(browse: s.role == 'tenant')
        : s.records(kind);
    final keys =
        rows.firstOrNull?.keys
            .where(
              (k) =>
                  !['photos', 'cover', 'comments', 'passwordHash'].contains(k),
            )
            .toList() ??
        ['message'];
    String csvValue(dynamic v) =>
        '"${v.toString().replaceAll('"', '""').replaceAll(RegExp(r'^[=+@-]'), "'")}"';
    final text = [
      ['DEMONSTRATION DATA — NOT REAL FINANCIAL RECORDS'],
      keys,
      ...rows.map((r) => keys.map((k) => r[k] ?? '').toList()),
    ].map((row) => row.map(csvValue).join(',')).join('\r\n');
    await run(
      () => saveDemoText('AQAR-SAMPLE-$kind.csv', '\uFEFF$text'),
      message: '',
    );
  }
}
