part of '../interactive_page.dart';

extension _PropertyScreens on _InteractivePageState {
  Widget properties() {
    final rows = s
        .properties(browse: s.role == 'tenant')
        .where(
          (p) =>
              (jsonEncode(p).toLowerCase().contains(search.toLowerCase())) &&
              (filter == 'all' ||
                  p['publication'] == filter ||
                  p['availability'] == filter) &&
              (country == 'all' || p['country'] == country) &&
              (city == 'all' || p['city'] == city) &&
              (category == 'all' || p['category'] == category),
        )
        .toList();
    return pageView(
      s.role == 'owner'
          ? 'My properties'
          : s.role == 'tenant'
          ? 'Browse properties'
          : 'Properties management',
      [
        if (s.role == 'manager')
          actions([
            action(
              'Add property',
              () => go('/properties/add/step-1'),
              primary: true,
            ),
            action('Export sample CSV', () => export('properties')),
          ]),
        filters(
          property: true,
          statuses: const [
            'published',
            'draft',
            'unpublished',
            'available',
            'unavailable',
            'maintenance',
          ],
        ),
        if (rows.isEmpty) empty(),
        DemoResponsiveGrid(
          children: paged(rows)
              .map(
                (p) => SurfaceCard(
                  padding: EdgeInsets.zero,
                  child: Column(
                    crossAxisAlignment: CrossAxisAlignment.start,
                    children: [
                      InkWell(
                        onTap: () => go(
                          s.role == 'manager'
                              ? '/properties/demo'
                              : scoped('property'),
                          arguments: {'id': p['id']},
                        ),
                        child: propertyImage(p),
                      ),
                      Padding(
                        padding: const EdgeInsets.all(18),
                        child: Column(
                          crossAxisAlignment: CrossAxisAlignment.start,
                          children: [
                            Wrap(
                              spacing: 8,
                              runSpacing: 8,
                              children: [
                                badge(p['category']),
                                badge(p['publication']),
                                badge(p['availability']),
                                badge(p['listingType']),
                                badge(
                                  p['policy'] == 'instant'
                                      ? 'Instant booking'
                                      : 'Request to book',
                                ),
                              ],
                            ),
                            const SizedBox(height: 12),
                            Text(
                              s.label(p),
                              style: Theme.of(context).textTheme.titleMedium,
                            ),
                            const SizedBox(height: 8),
                            Text(
                              '${s.countryName(p['country'])} · ${t(p['city'])} · ${p['district']}',
                            ),
                            const SizedBox(height: 10),
                            Text(
                              '${money(p['price'], p)} / ${t(p['listingType'] == 'sale' ? 'Sale price' : 'per ${p['ratePeriod']}')}',
                              style: const TextStyle(
                                color: AqarColors.emerald,
                                fontWeight: FontWeight.w600,
                              ),
                            ),
                            pair('Planned units', p['unitCount']),
                            actions([
                              action(
                                'View details',
                                () => go(
                                  s.role == 'manager'
                                      ? '/properties/demo'
                                      : scoped('property'),
                                  arguments: {'id': p['id']},
                                ),
                                primary: true,
                              ),
                              if (s.role == 'manager') ...[
                                action(
                                  'Edit',
                                  () => go(
                                    '/properties/add/step-1',
                                    arguments: {'id': p['id']},
                                  ),
                                ),
                                action(
                                  'Delete',
                                  () => deleteProperty(p['id']),
                                  danger: true,
                                ),
                              ],
                            ]),
                          ],
                        ),
                      ),
                    ],
                  ),
                ),
              )
              .toList(),
        ),
        pagination(rows.length),
      ],
    );
  }

  Future<void> deleteProperty(String id) async {
    if (await confirm('Delete this fictional property?')) {
      await run(() async {
        await s.deleteProperty(id);
        if (path.endsWith('/demo') && mounted) go('/properties', reset: true);
      }, message: 'Sample property deleted.');
    }
  }

  Widget propertyDetail() {
    final p = s.property(
      args['id'] ??
          s.properties(browse: s.role == 'tenant').firstOrNull?['id'] ??
          '',
    );
    if (p == null || !s.canSeeProperty(p['id'], browse: s.role == 'tenant')) {
      return pageView('Property details', [
        empty('This property is not assigned to your demo account.'),
      ]);
    }
    final units = s
        .all('units')
        .where((u) => u['propertyId'] == p['id'])
        .toList();
    return pageView(s.label(p), [
      propertyImage(p, height: 220),
      const SizedBox(height: 18),
      actions(
        s.role == 'tenant'
            ? [
                action(
                  'Availability calendar',
                  () => go('/tenant/calendar', arguments: {'id': p['id']}),
                ),
                if (p['availability'] == 'available' &&
                    p['listingType'] != 'sale')
                  action(
                    p['policy'] == 'instant'
                        ? 'Book instantly (demo)'
                        : 'Request to book',
                    () => go('/tenant/booking', arguments: {'id': p['id']}),
                    primary: true,
                  ),
              ]
            : s.role == 'manager'
            ? [
                action(
                  'Edit property',
                  () =>
                      go('/properties/add/step-1', arguments: {'id': p['id']}),
                ),
                action(
                  'Manage units',
                  () => go('/units', arguments: {'propertyId': p['id']}),
                ),
                action('Delete', () => deleteProperty(p['id']), danger: true),
              ]
            : [action('Maintenance approvals', () => go('/owner/maintenance'))],
      ),
      currencyNote(),
      if ((p['photos'] as List?)?.isNotEmpty == true) photoList(p),
      card('Property overview', [
        pair('Country', s.countryName(p['country'])),
        pair('Region', p['region']),
        pair('Postal code', p['postalCode']),
        pair('Property time zone', p['timeZone']),
        pair('Availability', t(p['availability'])),
        pair('Amenities', (p['amenities'] as List).join(', ')),
        pair('Furnishing', t(p['furnishing'] ?? 'not specified')),
        pair('Equipment / finishing (demo description)', p['equipment'] ?? ''),
        Text(p['description'] ?? ''),
        pair('City', t(p['city'])),
        pair('Address', s.address(p)),
        pair('Rental rate', money(p['price'], p)),
        pair(
          'Booking policy',
          t(p['policy'] == 'instant' ? 'Instant booking' : 'Request to book'),
        ),
        pair('Publishing', t(p['publication'])),
      ]),
      card(
        'Units',
        units
            .map(
              (u) => ListTile(
                contentPadding: EdgeInsets.zero,
                title: Text(u['name']),
                subtitle: Text(
                  '${money(u['price'], u)} · ${u['beds']} ${t('Beds')}',
                ),
                trailing: badge(u['status']),
                onTap: s.role == 'manager'
                    ? () => go('/units/demo', arguments: {'id': u['id']})
                    : null,
              ),
            )
            .toList(),
      ),
      actions([
        action('Documents', () => go(scoped('documents'))),
        action(
          s.role == 'tenant' ? 'Condition inspection' : 'Furniture inventory',
          () => go(scoped(s.role == 'tenant' ? 'inspection' : 'furniture')),
        ),
      ]),
    ]);
  }

  Future<void> deleteUnit(String id) async {
    if (await confirm('Delete this unit?')) {
      await run(() async {
        await s.deleteUnit(id);
        if (mounted && path == '/units/demo') go('/units', reset: true);
      });
    }
  }

  Widget unitList() {
    final rows = visible(
      s
          .records('units')
          .where(
            (u) =>
                args['propertyId'] == null ||
                u['propertyId'] == args['propertyId'],
          )
          .toList(),
    );
    return pageView('Units management', [
      actions([action('Add unit', () => unitDialog(), primary: true)]),
      filters(statuses: const ['vacant', 'occupied', 'maintenance']),
      if (rows.isEmpty) empty(),
      ...paged(rows).map(
        (u) => card(u['name'], [
          Text(propName(u['propertyId'])),
          pair('Rent', money(u['price'], u)),
          pair('Rental duration', t(u['ratePeriod'])),
          pair('Amenities', (u['amenities'] as List?)?.join(', ') ?? ''),
          pair('Furnishing', t(u['furnishing'] ?? 'not specified')),
          pair(
            'Equipment / finishing (demo description)',
            u['equipment'] ?? '',
          ),
          badge(u['status']),
          actions([
            action(
              'View details',
              () => go('/units/demo', arguments: {'id': u['id']}),
            ),
            action('Edit', () => unitDialog(u)),
            action('Delete', () => deleteUnit(u['id']), danger: true),
          ]),
        ]),
      ),
      pagination(rows.length),
    ]);
  }

  Widget unitDetail() {
    final u = s
        .records('units')
        .where(
          (u) =>
              u['id'] == (args['id'] ?? s.records('units').firstOrNull?['id']),
        )
        .firstOrNull;
    if (u == null) return pageView('Unit', [empty()]);
    return pageView('${t('Unit')} ${u['name']}', [
      if ((u['photos'] as List?)?.isNotEmpty == true) photoList(u),
      const ImagePreview(
        'f51d0c2ac2f3ec473efd.jpg',
        label: 'Sample unit photo',
        height: 220,
      ),
      const SizedBox(height: 18),
      card('Unit specifications', [
        pair('Property', propName(u['propertyId'])),
        pair('Bedrooms', u['beds']),
        pair('Bathrooms', u['baths']),
        pair('Area', area(u['area'])),
        pair('Rent', money(u['price'], u)),
        pair('Rental duration', t(u['ratePeriod'])),
        pair('Amenities', (u['amenities'] as List?)?.join(', ') ?? ''),
        pair('Furnishing', t(u['furnishing'] ?? 'not specified')),
        pair('Equipment / finishing (demo description)', u['equipment'] ?? ''),
        badge(u['status']),
        actions([
          action('Edit unit', () => unitDialog(u)),
          action('Delete', () => deleteUnit(u['id']), danger: true),
          action(
            'View property',
            () => go('/properties/demo', arguments: {'id': u['propertyId']}),
          ),
          action('Maintenance', () => go('/maintenance')),
          action('Furniture inventory', () => go('/furniture')),
        ]),
      ]),
    ]);
  }

  Widget wizard() {
    const labels = [
      'Basic information',
      'Location',
      'Ownership & management',
      'Units & rental',
      'Photos & documents',
      'Review',
    ];
    final current = path == '/properties/edit' ? 1 : step;
    if (values['amenities'] is List) {
      values['amenities'] = (values['amenities'] as List).join(', ');
    }
    final children = <Widget>[];
    if (current == 1) {
      children.addAll([
        field(values, 'name', 'Property name'),
        field(
          values,
          'category',
          'Category',
          choices: [
            'Apartment',
            'Villa',
            'Floor',
            'Chalet',
            'Farm',
            'Commercial',
            'Rest house',
          ].map((v) => (v, t(v))).toList(),
        ),
        field(values, 'description', 'Description', required: false, lines: 3),
        field(values, 'country', 'Country', choices: countryChoices),
        field(values, 'currency', 'Currency', choices: currencyChoices),
        field(
          values,
          'listingType',
          'Listing type',
          choices: [('rent', t('rent')), ('sale', t('sale'))],
        ),
      ]);
    }
    if (current == 2) {
      children.addAll([
        field(values, 'country', 'Country', choices: countryChoices),
        field(values, 'region', 'State / province / region', required: false),
        field(values, 'city', 'City'),
        field(values, 'district', 'District / neighborhood', required: false),
        field(values, 'address', 'Street address', lines: 2),
        field(values, 'postalCode', 'Postal code', required: false),
        field(values, 'timeZone', 'Property time zone'),
        field(values, 'latitude', 'Latitude', required: false, type: 'number'),
        field(
          values,
          'longitude',
          'Longitude',
          required: false,
          type: 'number',
        ),
        banner('Media stays on this device. No upload service is connected.'),
      ]);
    }
    if (current == 3) {
      children.addAll([
        field(
          values,
          'ownerId',
          'Property owner',
          choices: s
              .all('owners')
              .map((o) => ('${o['id']}', '${o['name']}'))
              .toList(),
        ),
        field(values, 'manager', 'Assigned manager'),
        field(values, 'fee', 'Management fee (%)', type: 'number'),
      ]);
    }
    if (current == 4) {
      children.addAll([
        field(
          values,
          'furnishing',
          'Furnishing',
          choices: [
            'not specified',
            'furnished',
            'unfurnished',
          ].map((x) => (x, t(x))).toList(),
        ),
        field(
          values,
          'equipment',
          'Equipment / finishing (demo description)',
          required: false,
        ),
        field(values, 'unitCount', 'Planned units', type: 'number'),
        field(values, 'price', 'Price in property currency', type: 'number'),
        field(values, 'currency', 'Currency', choices: currencyChoices),
        field(
          values,
          'ratePeriod',
          'Rental duration',
          choices: [
            'night',
            'week',
            'month',
            'year',
          ].map((v) => (v, t(v))).toList(),
        ),
        field(values, 'minNights', 'Minimum stay (nights)', type: 'number'),
        field(
          values,
          'amenities',
          'Amenities (comma separated)',
          required: false,
        ),
        field(
          values,
          'availability',
          'Availability',
          choices: [
            'available',
            'unavailable',
            'maintenance',
          ].map((v) => (v, t(v))).toList(),
        ),
        field(
          values,
          'publication',
          'Publication',
          choices: [
            'draft',
            'published',
            'unpublished',
          ].map((v) => (v, t(v))).toList(),
        ),
        field(
          values,
          'repriceUnits',
          'Reprice all units when currency changes',
          choices: [('false', t('No')), ('true', t('Yes'))],
        ),
        banner(
          'Currency changes require a new price for every unit and are blocked when history exists.',
        ),
        field(
          values,
          'policy',
          'Booking policy',
          choices: [
            ('request', t('Request to book')),
            ('instant', t('Instant booking')),
          ],
        ),
      ]);
    }
    if (current == 5) {
      children.addAll([
        PhotoField(store: s, values: values),
        TextButton(
          onPressed: () => redraw(() {
            values['photos'] = [];
            values['cover'] = '';
          }),
          child: Text(t('Remove photos')),
        ),
        const SizedBox(height: 16),
        field(values, 'document', 'Sample document reference', required: false),
      ]);
    }
    if (current == 6) {
      children.addAll([
        pair('Property name', values['name']),
        pair('Category', t(values['category'])),
        pair('City', t(values['city'])),
        pair('Address', values['address']),
        pair('Planned units', values['unitCount']),
        pair('Price', money(values['price'], values)),
        pair('Country', s.countryName(values['country'])),
        pair('Currency', values['currency']),
        pair('Property time zone', values['timeZone']),
        pair('Publication', values['publication']),
        pair('Availability', values['availability']),
        pair('Rental duration', values['ratePeriod']),
        pair('Amenities', values['amenities']),
        banner(
          'Save creates or updates a fictional property in this browser only.',
        ),
      ]);
    }
    void navigate(int target) {
      run(() async {
        await s.commit(() => s.state['draft'] = {...values});
        if (mounted) {
          go(
            '/properties/add/step-$target',
            arguments: values['editId'] == null ? {} : {'id': values['editId']},
            replace: true,
          );
        }
      }, message: '');
    }

    return pageView(
      values['editId'] == null ? 'Add new property' : 'Edit property',
      [
        Text(
          '${t('Step')} $current / 6 · ${t(labels[current - 1])}',
          key: const Key('wizard-progress'),
        ),
        const SizedBox(height: 14),
        SingleChildScrollView(
          scrollDirection: Axis.horizontal,
          child: Row(
            children: List.generate(
              6,
              (i) => Padding(
                padding: const EdgeInsetsDirectional.only(end: 8),
                child: ChoiceChip(
                  label: Text('${i + 1} · ${t(labels[i])}'),
                  selected: current == i + 1,
                  onSelected: (_) {
                    if (i + 1 < current || current == 6) {
                      navigate(i + 1);
                    } else if (formKey.currentState!.validate()) {
                      navigate(i + 1);
                    }
                  },
                ),
              ),
            ),
          ),
        ),
        const SizedBox(height: 20),
        Form(
          key: formKey,
          child: card(labels[current - 1], [
            ...children,
            actions([
              action(
                current == 1 ? 'Cancel' : 'Previous step',
                () => current == 1
                    ? go('/properties', reset: true)
                    : navigate(current - 1),
                key: const Key('interactive-wizard-back'),
              ),
              action(
                current == 6 ? 'Save sample property' : 'Next step',
                () {
                  if (!formKey.currentState!.validate()) return;
                  if (current < 6) {
                    navigate(current + 1);
                  } else {
                    run(() async {
                      final photos = (values['photos'] as List?) ?? [];
                      if (photos.isNotEmpty) values['cover'] = photos.first;
                      final p = await s.saveProperty(
                        values,
                        editId: values['editId'],
                      );
                      await s.commit(
                        () => s.state['draft'] = <String, dynamic>{},
                      );
                      if (mounted) {
                        go(
                          '/properties/demo',
                          arguments: {'id': p['id']},
                          replace: true,
                        );
                      }
                    });
                  }
                },
                primary: true,
                key: const Key('interactive-wizard-next'),
              ),
              action(
                'Save draft',
                () => run(
                  () => s.commit(() => s.state['draft'] = {...values}),
                  message: 'Draft saved locally.',
                ),
              ),
            ]),
          ]),
        ),
      ],
    );
  }
}
