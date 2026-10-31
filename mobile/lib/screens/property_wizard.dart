import 'package:flutter/material.dart';

import '../core/theme.dart';
import '../data/demo_data.dart';
import '../widgets/demo_widgets.dart';

// Transient form state only. It is never serialized, persisted or sent anywhere.
class PropertyDraft {
  final values = <String, String>{
    'name': 'Al-Yasmin Compound II',
    'category': 'Residential compound',
    'description': 'Premium residential compound with landscaped courtyards and executive rental units.',
    'country': 'Saudi Arabia',
    'city': 'Riyadh',
    'district': 'Al-Yasmin',
    'address': 'King Abdulaziz Road, Zone B, Plot 449',
    'latitude': '24.825619',
    'longitude': '46.639104',
    'owner': 'Muqrin Real Estate Holdings Ltd.',
    'manager': 'Eng. Sultan Al-Shammari',
    'fee': '8.5',
    'rent': '7,500',
    'units': '12',
  };
  String get(String key) => values[key] ?? '';
}

class PropertyWizard extends StatelessWidget {
  final int step;
  final PropertyDraft draft;
  const PropertyWizard({super.key, required this.step, required this.draft});
  void navigate(BuildContext context, int next) =>
      Navigator.pushReplacementNamed(context, '/properties/add/step-$next');
  Widget field(
    String key,
    String label, {
    int lines = 1,
    TextInputType? keyboard,
  }) => Padding(
    padding: const EdgeInsets.only(bottom: 16),
    child: TextFormField(
      key: ValueKey('draft-$key-$step'),
      initialValue: draft.get(key),
      maxLines: lines,
      keyboardType: keyboard,
      onChanged: (value) => draft.values[key] = value,
      decoration: InputDecoration(labelText: label),
    ),
  );
  @override
  Widget build(BuildContext context) => DemoPage(
    title: 'Add property',
    subtitle: 'Step $step of 6 · ${wizardLabels[step - 1]}',
    children: [
      SingleChildScrollView(
        scrollDirection: Axis.horizontal,
        child: Row(
          children: List.generate(
            6,
            (i) => Padding(
              padding: const EdgeInsetsDirectional.only(end: 8),
              child: ActionChip(
                key: ValueKey('wizard-step-${i + 1}'),
                avatar: CircleAvatar(
                  backgroundColor: step == i + 1
                      ? AqarColors.navy
                      : AqarColors.tint,
                  child: Text(
                    '${i + 1}',
                    style: TextStyle(
                      fontSize: 10,
                      color: step == i + 1 ? Colors.white : AqarColors.navy,
                    ),
                  ),
                ),
                backgroundColor: step == i + 1 ? AqarColors.tint : Colors.white,
                label: Text(
                  wizardLabels[i],
                  style: const TextStyle(fontSize: 11),
                ),
                onPressed: () => navigate(context, i + 1),
              ),
            ),
          ),
        ),
      ),
      const SizedBox(height: 20),
      LinearProgressIndicator(
        value: step / 6,
        minHeight: 4,
        borderRadius: BorderRadius.circular(6),
        backgroundColor: AqarColors.line,
        color: AqarColors.navy,
      ),
      const SizedBox(height: 24),
      ...content(context),
      const SizedBox(height: 12),
      Wrap(
        spacing: 10,
        runSpacing: 10,
        children: [
          OutlinedButton(
            key: const Key('wizard-back'),
            onPressed: () => step > 1
                ? navigate(context, step - 1)
                : Navigator.pushNamedAndRemoveUntil(
                    context,
                    '/properties',
                    (_) => false,
                  ),
            child: Text(step > 1 ? 'Previous step' : 'Cancel'),
          ),
          if (step < 6)
            FilledButton(
              key: const Key('wizard-next'),
              onPressed: () => navigate(context, step + 1),
              child: const Text('Next step →'),
            ),
          if (step == 6)
            FilledButton(
              key: const Key('demo-save-property'),
              onPressed: () => showDemoNotice(context, 'Save property'),
              child: const Text('Save property'),
            ),
        ],
      ),
      const SizedBox(height: 12),
      TextButton(
        onPressed: () => Navigator.pushNamedAndRemoveUntil(
          context,
          '/properties',
          (_) => false,
        ),
        child: const Text('Return to properties'),
      ),
      const SizedBox(height: 8),
      const Text(
        'Form entries are temporary and remain in memory only while the app is open.',
        style: TextStyle(fontSize: 11),
      ),
    ],
  );

  List<Widget> content(BuildContext context) => switch (step) {
    1 => [
      SurfaceCard(
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            const SectionHeading('Basic property information'),
            field('name', 'Property name'),
            DropdownButtonFormField<String>(
              initialValue: draft.get('category'),
              isExpanded: true,
              decoration: const InputDecoration(labelText: 'Property category'),
              items:
                  [
                        'Residential compound',
                        'Villa',
                        'Chalet',
                        'Commercial building',
                        'Farm / leisure',
                      ]
                      .map(
                        (v) => DropdownMenuItem(
                          value: v,
                          child: Text(v, style: const TextStyle(fontSize: 13)),
                        ),
                      )
                      .toList(),
              onChanged: (value) {
                if (value != null) draft.values['category'] = value;
              },
            ),
            const SizedBox(height: 16),
            field('description', 'Description', lines: 3),
            const Text(
              'Configure location, owners, units and media in the following steps.',
            ),
          ],
        ),
      ),
    ],
    2 => [
      SurfaceCard(
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            const SectionHeading('Location & address'),
            field('country', 'Country'),
            field('city', 'City'),
            field('district', 'District'),
            field('address', 'Street address', lines: 2),
            Container(
              height: 170,
              decoration: BoxDecoration(
                color: AqarColors.tint,
                borderRadius: BorderRadius.circular(12),
              ),
              child: const Center(
                child: Column(
                  mainAxisSize: MainAxisSize.min,
                  children: [
                    Icon(Icons.location_on, size: 40, color: AqarColors.navy),
                    SizedBox(height: 10),
                    Text('Riyadh · Static location preview'),
                    Text(
                      'No map or location service connected',
                      style: TextStyle(fontSize: 10),
                    ),
                  ],
                ),
              ),
            ),
            const SizedBox(height: 16),
            field(
              'latitude',
              'Latitude',
              keyboard: const TextInputType.numberWithOptions(
                decimal: true,
                signed: true,
              ),
            ),
            field(
              'longitude',
              'Longitude',
              keyboard: const TextInputType.numberWithOptions(
                decimal: true,
                signed: true,
              ),
            ),
          ],
        ),
      ),
    ],
    3 => [
      SurfaceCard(
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            const SectionHeading('Ownership & management'),
            field('owner', 'Property owner'),
            field('manager', 'Assigned property manager'),
            field('fee', 'Management fee (%)', keyboard: TextInputType.number),
            const InfoPair('Ownership share', '100% · Sample'),
            const InfoPair('Management model', 'Managed by property manager'),
            const Text(
              'Assignments are illustrative. No users, roles or permissions are created.',
            ),
          ],
        ),
      ),
    ],
    4 => [
      SurfaceCard(
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            const SectionHeading('Units & rental'),
            field(
              'units',
              'Planned number of units',
              keyboard: TextInputType.number,
            ),
            field(
              'rent',
              'Sample monthly rent (SAR)',
              keyboard: TextInputType.number,
            ),
            const InfoPair('Rental policy', 'Request to book · Manual review'),
            const SizedBox(height: 8),
            ...modules['/units']!.records
                .take(4)
                .map(
                  (unit) => ListTile(
                    contentPadding: EdgeInsets.zero,
                    title: Text(unit.title),
                    subtitle: Text(
                      unit.detail,
                      style: const TextStyle(fontSize: 11),
                    ),
                    trailing: StatusTag(unit.status),
                  ),
                ),
            OutlinedButton.icon(
              onPressed: () => showDemoNotice(context, 'Add unit'),
              icon: const Icon(Icons.add),
              label: const Text('Add sample unit'),
            ),
          ],
        ),
      ),
    ],
    5 => [
      SurfaceCard(
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            const SectionHeading('Photos & documents'),
            const ImagePreview(
              'dbb2a71ef1c083e218bb.jpg',
              label: 'Sample property cover',
            ),
            const SizedBox(height: 16),
            const Text(
              'Illustrative staged media. No files have been uploaded.',
            ),
            const SizedBox(height: 16),
            Wrap(
              spacing: 10,
              runSpacing: 10,
              children: [
                OutlinedButton.icon(
                  onPressed: () => showDemoNotice(context, 'Select photos'),
                  icon: const Icon(Icons.add_photo_alternate_outlined),
                  label: const Text('Select photos'),
                ),
                OutlinedButton.icon(
                  onPressed: () => showDemoNotice(context, 'Upload document'),
                  icon: const Icon(Icons.upload_file_outlined),
                  label: const Text('Upload document'),
                ),
              ],
            ),
            const SizedBox(height: 16),
            const InfoPair('Title deed', 'Sample reference'),
            const InfoPair('Management agreement', 'Sample PDF · 4.2 MB'),
            const InfoPair('Building certificate', 'Sample reference'),
          ],
        ),
      ),
    ],
    _ => [
      SurfaceCard(
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            const SectionHeading('Review property preview'),
            InfoPair('Property name', draft.get('name')),
            InfoPair('Category', draft.get('category')),
            InfoPair(
              'Location',
              '${draft.get('district')}, ${draft.get('city')}',
            ),
            InfoPair('Owner', draft.get('owner')),
            InfoPair('Manager', draft.get('manager')),
            InfoPair('Management fee', '${draft.get('fee')}%'),
            InfoPair('Planned units', draft.get('units')),
            InfoPair('Sample rent', 'SAR ${draft.get('rent')} / month'),
            const InfoPair('Media', 'Static examples only'),
            const SizedBox(height: 12),
            const DemoBanner(),
            const SizedBox(height: 16),
            const Text(
              'No property has been saved. The save control opens a demo notice only.',
            ),
          ],
        ),
      ),
    ],
  };
}
