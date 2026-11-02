part of '../interactive_page.dart';

class BookingPropertyFields extends StatefulWidget {
  final DemoStore store;
  final Record values;
  const BookingPropertyFields({
    super.key,
    required this.store,
    required this.values,
  });
  @override
  State<BookingPropertyFields> createState() => _BookingPropertyFieldsState();
}

class _BookingPropertyFieldsState extends State<BookingPropertyFields> {
  @override
  Widget build(BuildContext context) {
    final s = widget.store,
        v = widget.values,
        properties = s
            .properties(browse: true)
            .where(
              (p) =>
                  p['availability'] == 'available' &&
                  p['listingType'] != 'sale',
            )
            .toList();
    final pid = properties.any((p) => p['id'] == v['propertyId'])
        ? v['propertyId']
        : properties.firstOrNull?['id'];
    v['propertyId'] = pid;
    final units = s
        .all('units')
        .where(
          (u) =>
              u['propertyId'] == pid &&
              !['maintenance', 'unavailable'].contains(u['status']),
        )
        .toList();
    if (!units.any((u) => u['id'] == v['unitId'])) {
      v['unitId'] = units.firstOrNull?['id'];
    }
    return Column(
      children: [
        Text(
          '${s.t('Property time zone')}: ${s.property(pid)?['timeZone'] ?? ''}',
          style: const TextStyle(fontSize: 11),
        ),
        const SizedBox(height: 12),
        Padding(
          padding: const EdgeInsets.only(bottom: 16),
          child: DropdownButtonFormField<String>(
            initialValue: pid,
            decoration: InputDecoration(labelText: s.t('Property')),
            isExpanded: true,
            items: properties
                .map(
                  (p) => DropdownMenuItem<String>(
                    value: p['id'],
                    child: Text(
                      s.label(p),
                      overflow: TextOverflow.ellipsis,
                      style: const TextStyle(fontSize: 13),
                    ),
                  ),
                )
                .toList(),
            onChanged: (id) => setState(() {
              v['propertyId'] = id;
              v['unitId'] = null;
            }),
            validator: (value) => value == null
                ? s.t('Choose a published property and an available unit.')
                : null,
          ),
        ),
        DemoField(
          key: ValueKey('unit-$pid'),
          store: s,
          values: v,
          name: 'unitId',
          label: 'Unit',
          choices: units
              .map(
                (u) => (
                  '${u['id']}',
                  '${u['name']} · ${NumberFormat.currency(locale: s.locale, name: s.currency(u), symbol: s.currency(u)).format(u['price'])} / ${s.t(u['ratePeriod'])}',
                ),
              )
              .toList(),
        ),
      ],
    );
  }
}
