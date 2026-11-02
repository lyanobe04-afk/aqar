part of '../interactive_page.dart';

extension _RecordScreens on _InteractivePageState {
  Widget people(String kind) {
    final rows = s
        .all(kind)
        .where(
          (p) => jsonEncode(p).toLowerCase().contains(search.toLowerCase()),
        )
        .toList();
    return pageView(
      kind == 'owners' ? 'Owners management' : 'Tenants management',
      [
        actions([
          action(
            kind == 'owners' ? 'Add owner' : 'Add tenant',
            () => personDialog(kind),
            primary: true,
          ),
        ]),
        filters(),
        ...paged(rows).map(
          (p) => card(p['name'], [
            Text(p['email']),
            actions([
              action(
                kind == 'owners' ? 'Properties' : 'Contracts',
                () => go(kind == 'owners' ? '/properties' : '/contracts'),
              ),
            ]),
          ]),
        ),
        if (rows.isEmpty) empty(),
        pagination(rows.length),
      ],
    );
  }

  Widget records(String kind) {
    final titles = {
      'bookings': s.role == 'tenant' ? 'My bookings' : 'Bookings management',
      'payments': s.role == 'tenant' ? 'My payments' : 'Payments management',
      'contracts': s.role == 'tenant' ? 'My contracts' : 'Contracts management',
      'maintenance': s.role == 'owner'
          ? 'Maintenance approvals'
          : s.role == 'tenant'
          ? 'Maintenance requests'
          : 'Maintenance management',
      'documents': 'Documents',
      'furniture': 'Furniture inventory',
    };
    final rows = visible(s.records(kind));
    return pageView(titles[kind]!, [
      if (kind == 'payments' || kind == 'contracts')
        banner(
          'All financial and contract records are simulated. No money is moved and no legal agreement is executed.',
        ),
      actions([
        if (s.role != 'owner') ...[
          if (kind == 'bookings')
            action('Create booking', () => bookingDialog(), primary: true),
          if (kind == 'payments')
            action(
              'Record simulated payment',
              () => paymentDialog(),
              primary: true,
            ),
          if (kind == 'maintenance')
            action(
              'Submit maintenance request',
              () => maintenanceDialog(),
              primary: true,
            ),
        ],
        if (s.role == 'manager') ...[
          if (kind == 'contracts')
            action(
              'Create sample contract',
              () => contractDialog(),
              primary: true,
            ),
          if (kind == 'documents')
            action(
              'Add sample document',
              () => documentDialog(),
              primary: true,
            ),
          if (kind == 'furniture')
            action(
              'Add inventory item',
              () => furnitureDialog(),
              primary: true,
            ),
        ],
        action('Export sample CSV', () => export(kind)),
      ]),
      filters(
        statuses: s
            .records(kind)
            .map((r) => r['status'])
            .whereType<String>()
            .toSet()
            .toList(),
      ),
      if (rows.isEmpty) empty(),
      ...paged(rows).map(
        (r) => card(
          kind == 'bookings'
              ? propName(r['propertyId'])
              : r['title'] ?? r['name'] ?? r['id'],
          [
            if (kind != 'bookings') Text(propName(r['propertyId'])),
            if (r['start'] != null)
              Text('${s.date(r['start'])} → ${s.date(r['end'])}'),
            if (r['amount'] != null)
              pair(
                kind == 'payments' ? 'Simulated amount' : 'Amount',
                money(r['amount'], r),
              ),
            if (r['status'] != null) badge(r['status']),
            if (kind == 'furniture') ...[
              pair('Room', r['room']),
              pair('Quantity', r['quantity']),
              badge(r['condition']),
            ],
            actions([
              action('View details', () => recordDetails(kind, r)),
              if (kind == 'bookings') ...[
                if (s.role == 'manager' && r['status'] == 'pending') ...[
                  action(
                    'Approve',
                    () => statusAction('bookings', r, 'approved'),
                  ),
                  action(
                    'Reject',
                    () => statusAction('bookings', r, 'rejected'),
                    danger: true,
                  ),
                ],
                if (s.role != 'owner' &&
                    !['cancelled', 'rejected'].contains(r['status']))
                  action(
                    'Cancel booking',
                    () => statusAction('bookings', r, 'cancelled'),
                    danger: true,
                  ),
              ],
              if (kind == 'payments' &&
                  s.role == 'manager' &&
                  r['status'] == 'pending')
                action('Verify', () => statusAction('payments', r, 'verified')),
              if (kind == 'maintenance' &&
                  s.role == 'owner' &&
                  r['status'] == 'pending approval') ...[
                action(
                  'Approve',
                  () => statusAction('maintenance', r, 'approved'),
                ),
                action(
                  'Reject',
                  () => statusAction('maintenance', r, 'rejected'),
                  danger: true,
                ),
              ],
              if (kind == 'contracts' && s.role == 'manager')
                action('Change status', () => statusDialog('contracts', r)),
              if (kind == 'maintenance' && s.role == 'manager')
                action('Change status', () => statusDialog('maintenance', r)),
              if (kind == 'furniture' && s.role == 'manager')
                action('Update condition', () => conditionDialog(r)),
              if (kind == 'documents')
                action('Download sample', () => downloadRecord(kind, r)),
            ]),
          ],
        ),
      ),
      pagination(rows.length),
    ]);
  }

  Widget finances() {
    final v = s.totals(), kind = path.split('/').last;
    return pageView(
      {
            'occupancy': 'Occupancy overview',
            'income': 'Rental income',
            'expenses': 'Expenses',
            'profit': 'Net profit',
            'receivables': 'Rent collection & receivables',
          }[kind] ??
          'Financial reports',
      [
        metrics(),
        actions([
          action(
            'Export sample CSV',
            () => export(kind == 'expenses' ? 'expenses' : 'payments'),
          ),
          if (s.role == 'manager')
            action('Record simulated payment', () => paymentDialog()),
        ]),
        banner(
          'Totals are derived from visible sample records. Pending payments are not counted as collected income.',
        ),
        currencyNote(),
        ...{
          ...s.records('bookings').map(s.currency),
          ...s.records('payments').map(s.currency),
          ...s.records('expenses').map(s.currency),
        }.map((code) {
          final v = s.totals(code);
          return card(code, [
            pair('Verified payments', money(v['collected'], code)),
            pair('Expenses', money(v['expense'], code)),
            pair('Net profit', money(v['profit'], code)),
          ]);
        }),
        card('Financial summary', [
          pair('Expected', money(v['expected'])),
          pair('Verified payments', money(v['collected'])),
          pair('Outstanding', money(v['outstanding'])),
          pair('Expenses', money(v['expense'])),
          pair('Net profit', money(v['profit'])),
        ]),
        if (kind == 'occupancy')
          ...s.properties().map(
            (p) => card(s.label(p), [
              pair(
                'Units',
                s.all('units').where((u) => u['propertyId'] == p['id']).length,
              ),
            ]),
          )
        else if (kind == 'expenses')
          ...s
              .records('expenses')
              .map(
                (e) => card(e['title'], [
                  Text(propName(e['propertyId'])),
                  pair('Amount', money(e['amount'], e)),
                  pair('Date', s.date(e['date'])),
                ]),
              )
        else
          ...s
              .records('bookings')
              .where((b) => !['cancelled', 'rejected'].contains(b['status']))
              .map(
                (b) => card(propName(b['propertyId']), [
                  pair('Booking', b['id']),
                  pair('Due', money(b['amount'], b)),
                  pair('Paid', money(s.paid(b['id']), b)),
                  pair(
                    'Outstanding',
                    money(
                      ((b['amount'] as num) - s.paid(b['id'])).clamp(
                        0,
                        double.infinity,
                      ),
                      b,
                    ),
                  ),
                ]),
              ),
      ],
    );
  }

  Widget inspection() => pageView('Property condition inspection', [
    Form(
      key: formKey,
      child: card('Record condition', [
        field(
          values,
          'propertyId',
          'Property',
          choices: s
              .properties()
              .map((p) => ('${p['id']}', s.label(p)))
              .toList(),
        ),
        field(
          values,
          'condition',
          'Condition',
          choices: [
            'good',
            'damaged',
            'not assessed',
          ].map((v) => (v, t(v))).toList(),
        ),
        field(values, 'notes', 'Inspection notes', lines: 3),
        PhotoField(store: s, values: values),
        action('Save sample inspection', () {
          if (formKey.currentState!.validate()) run(() => s.inspect(values));
        }, primary: true),
      ]),
    ),
    card('Inspection history', [
      if (s.records('inspections').isEmpty)
        Text(t('No matching demo records.')),
      ...s
          .records('inspections')
          .map(
            (i) => Column(
              crossAxisAlignment: CrossAxisAlignment.start,
              children: [
                Text(
                  propName(i['propertyId']),
                  style: const TextStyle(fontWeight: FontWeight.w600),
                ),
                Text(i['notes']),
                badge(i['condition']),
                photoList(i),
                const Divider(),
              ],
            ),
          ),
    ]),
  ]);
  Widget calendar() {
    final p = s.property(values['propertyId'] ?? '');
    if (p == null) return pageView('Availability calendar', [empty()]);
    final unitId = values['unitId'] ?? '';
    return pageView('Availability calendar', [
      Text(s.label(p)),
      Form(
        key: formKey,
        child: card('Select a date range', [
          ...bookingFields(values),
          action('Check availability', () {
            if (formKey.currentState!.validate()) {
              run(() async {
                s.validDates(
                  values['start'],
                  values['end'],
                  timeZone: s.property(values['propertyId'])?['timeZone'],
                );
                if (s.conflicts(
                  values['unitId'],
                  values['start'],
                  values['end'],
                )) {
                  throw StateError('These dates overlap an approved booking.');
                }
                redraw(() {});
              }, message: 'Available');
            }
          }, primary: true),
        ]),
      ),
      Wrap(
        spacing: 8,
        runSpacing: 8,
        children: List.generate(14, (i) {
          final day = DemoStore.plusDays(
                '${values['start'] ?? DemoStore.today()}',
                i,
              ),
              busy =
                  p['availability'] != 'available' ||
                  p['listingType'] == 'sale' ||
                  s
                      .all('units')
                      .where((u) => u['id'] == unitId)
                      .any(
                        (u) => [
                          'maintenance',
                          'unavailable',
                        ].contains(u['status']),
                      ) ||
                  s.conflicts(unitId, day, DemoStore.plusDays(day, 1));
          return SizedBox(
            width: 140,
            child: SurfaceCard(
              child: Column(
                children: [
                  Text(s.date(day), style: const TextStyle(fontSize: 11)),
                  const SizedBox(height: 6),
                  badge(busy ? 'Booked' : 'Available'),
                ],
              ),
            ),
          );
        }),
      ),
      action(
        'Continue to booking',
        () => go(
          '/tenant/booking',
          arguments: {
            'id': values['propertyId'],
            'unitId': values['unitId'],
            'start': values['start'],
            'end': values['end'],
          },
        ),
        primary: true,
      ),
    ]);
  }

  Widget bookingPage() {
    final requested = s.property(args['id']);
    if (args['id'] != null &&
        (requested == null ||
            requested['availability'] != 'available' ||
            requested['listingType'] == 'sale' ||
            requested['published'] != true)) {
      return pageView('Booking request', [
        empty('This property is unavailable for booking.'),
      ]);
    }
    return pageView('Booking request', [
      Form(
        key: formKey,
        child: card('Choose property and dates', [
          ...bookingFields(values),
          action(
            'Submit demo booking',
            () {
              if (formKey.currentState!.validate()) {
                run(() async {
                  await s.book(values);
                  if (mounted) go('/tenant/bookings', replace: true);
                });
              }
            },
            primary: true,
            key: const Key('submit-demo-booking'),
          ),
        ]),
      ),
    ]);
  }
}
