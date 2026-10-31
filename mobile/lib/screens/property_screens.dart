import 'package:flutter/material.dart';

import '../core/theme.dart';
import '../data/demo_data.dart';
import '../widgets/demo_widgets.dart';

class PropertiesScreen extends StatefulWidget {
  const PropertiesScreen({super.key});
  @override
  State<PropertiesScreen> createState() => _PropertiesScreenState();
}

class _PropertiesScreenState extends State<PropertiesScreen> {
  String query = '', category = 'All';
  @override
  Widget build(BuildContext context) {
    final visible = properties
        .where(
          (p) =>
              (category == 'All' || p.category == category) &&
              '${p.name} ${p.location} ${p.owner}'.toLowerCase().contains(
                query.toLowerCase(),
              ),
        )
        .toList();
    return DemoPage(
      title: 'Properties',
      subtitle: 'Your master estate registry · Saudi Arabia',
      children: [
        Row(
          children: [
            const Expanded(
              child: Text(
                '24 properties · 80 units',
                style: TextStyle(fontWeight: FontWeight.w600),
              ),
            ),
            FilledButton.icon(
              onPressed: () =>
                  Navigator.pushNamed(context, '/properties/add/step-1'),
              icon: const Icon(Icons.add, size: 18),
              label: const Text('Add'),
            ),
          ],
        ),
        const SizedBox(height: 18),
        TextField(
          key: const Key('property-search'),
          decoration: const InputDecoration(
            hintText: 'Search properties, city or owner',
            prefixIcon: Icon(Icons.search),
          ),
          onChanged: (value) => setState(() => query = value),
        ),
        const SizedBox(height: 12),
        Wrap(
          spacing: 8,
          runSpacing: 4,
          children: ['All', 'Residential', 'Vacation', 'Commercial', 'Leisure']
              .map(
                (label) => ChoiceChip(
                  label: Text(label, style: const TextStyle(fontSize: 11)),
                  selected: category == label,
                  onSelected: (_) => setState(() => category = label),
                ),
              )
              .toList(),
        ),
        const SizedBox(height: 14),
        Text(
          '${visible.length} sample properties shown',
          style: Theme.of(context).textTheme.bodySmall,
        ),
        const SizedBox(height: 12),
        if (visible.isEmpty)
          const SurfaceCard(
            child: Text('No sample properties match. Try another search.'),
          ),
        ...visible.map(
          (property) => SurfaceCard(
            padding: EdgeInsets.zero,
            child: Column(
              crossAxisAlignment: CrossAxisAlignment.start,
              children: [
                InkWell(
                  onTap: () => Navigator.pushNamed(
                    context,
                    '/properties/demo',
                    arguments: property,
                  ),
                  borderRadius: BorderRadius.circular(16),
                  child: Column(
                    crossAxisAlignment: CrossAxisAlignment.start,
                    children: [
                      ImagePreview(property.image, label: property.name),
                      Padding(
                        padding: const EdgeInsets.fromLTRB(18, 16, 18, 0),
                        child: Column(
                          crossAxisAlignment: CrossAxisAlignment.start,
                          children: [
                            Row(
                              children: [
                                Expanded(
                                  child: Text(
                                    property.category.toUpperCase(),
                                    style: const TextStyle(
                                      fontSize: 9,
                                      letterSpacing: 1,
                                      color: AqarColors.navy,
                                    ),
                                  ),
                                ),
                                StatusTag(property.status),
                              ],
                            ),
                            const SizedBox(height: 10),
                            Text(
                              property.name,
                              style: Theme.of(context).textTheme.titleMedium,
                            ),
                            const SizedBox(height: 7),
                            Text(
                              property.location,
                              style: const TextStyle(fontSize: 12),
                            ),
                            const SizedBox(height: 16),
                            InfoPair(
                              'Contained units',
                              '${property.units} units · ${property.leased} leased',
                            ),
                          ],
                        ),
                      ),
                    ],
                  ),
                ),
                Padding(
                  padding: const EdgeInsets.fromLTRB(18, 0, 18, 16),
                  child: Row(
                    children: [
                      Expanded(
                        child: OutlinedButton(
                          onPressed: () => Navigator.pushNamed(
                            context,
                            '/properties/demo',
                            arguments: property,
                          ),
                          child: const Text('View property'),
                        ),
                      ),
                      const SizedBox(width: 8),
                      IconButton(
                        tooltip: 'Manage units',
                        onPressed: () => Navigator.pushNamed(context, '/units'),
                        icon: const Icon(
                          Icons.meeting_room_outlined,
                          color: AqarColors.navy,
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
  }
}

class PropertyDetailsScreen extends StatelessWidget {
  final PropertyPreview property;
  const PropertyDetailsScreen({super.key, required this.property});
  @override
  Widget build(BuildContext context) => DemoPage(
    title: property.name,
    subtitle: '${property.location} · Sample property detail',
    children: [
      ImagePreview(property.image, label: property.name, height: 220),
      const SizedBox(height: 18),
      Wrap(
        spacing: 10,
        runSpacing: 10,
        children: [
          StatusTag(property.category),
          StatusTag(property.status),
          const StatusTag('Static preview'),
        ],
      ),
      const SizedBox(height: 18),
      SurfaceCard(
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            const SectionHeading('Property overview'),
            InfoPair('Property owner', property.owner),
            InfoPair('Location', property.location),
            InfoPair('Contained units', '${property.units}'),
            InfoPair('Leased units', '${property.leased}'),
            const InfoPair('Assigned manager', 'Eng. Sultan Al-Shammari'),
            const InfoPair('Publishing', 'Sample status only'),
          ],
        ),
      ),
      SurfaceCard(
        child: Column(
          children: [
            const ModuleShortcut(
              title: 'Units',
              subtitle: 'Configurations, rental terms & occupancy',
              path: '/units',
              icon: Icons.meeting_room_outlined,
            ),
            const ModuleShortcut(
              title: 'Ownership & management',
              subtitle: 'Owner profiles and assignments',
              path: '/owners',
              icon: Icons.business_outlined,
            ),
            const ModuleShortcut(
              title: 'Tenants & bookings',
              subtitle: 'Sample requests & tenancy',
              path: '/bookings',
              icon: Icons.people_outline,
            ),
            const ModuleShortcut(
              title: 'Contracts & payments',
              subtitle: 'Agreements & collection records',
              path: '/contracts',
              icon: Icons.description_outlined,
            ),
            const ModuleShortcut(
              title: 'Maintenance',
              subtitle: 'Work order previews',
              path: '/maintenance',
              icon: Icons.build_outlined,
            ),
            const ModuleShortcut(
              title: 'Photos & documents',
              subtitle: 'Illustrative attachment references',
              path: '/documents',
              icon: Icons.folder_outlined,
            ),
            const ModuleShortcut(
              title: 'Furniture inventory',
              subtitle: 'Staged fixtures & furniture',
              path: '/furniture',
              icon: Icons.chair_outlined,
            ),
          ],
        ),
      ),
      OutlinedButton.icon(
        onPressed: () => Navigator.pushNamed(context, '/properties/add/step-1'),
        icon: const Icon(Icons.edit_outlined),
        label: const Text('Explore property form'),
      ),
    ],
  );
}

class UnitDetailsScreen extends StatelessWidget {
  final PreviewRecord unit;
  const UnitDetailsScreen({super.key, required this.unit});
  @override
  Widget build(BuildContext context) => DemoPage(
    title: 'Unit ${unit.title}',
    subtitle: '${unit.subtitle} · Sample unit detail',
    children: [
      const ImagePreview(
        'f51d0c2ac2f3ec473efd.jpg',
        label: 'Illustrative furnished living room',
        height: 210,
      ),
      const SizedBox(height: 18),
      Wrap(
        spacing: 8,
        runSpacing: 8,
        children: [
          StatusTag(unit.status),
          const StatusTag('Configured'),
          const StatusTag('Not published'),
        ],
      ),
      const SizedBox(height: 18),
      SurfaceCard(
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            const SectionHeading('Specifications & rental terms'),
            InfoPair('Unit identifier', unit.title),
            InfoPair('Sample rent', unit.detail),
            ...unit.fields.entries.map((e) => InfoPair(e.key, e.value)),
            const InfoPair('Booking policy', 'Manager review required'),
            TextButton(
              onPressed: () => Navigator.pushNamed(context, '/properties/demo'),
              child: const Text('View parent property →'),
            ),
          ],
        ),
      ),
      SurfaceCard(
        child: Column(
          children: const [
            ModuleShortcut(
              title: 'Bookings & tenancy',
              subtitle: 'Historical request previews',
              path: '/bookings',
              icon: Icons.event_outlined,
            ),
            ModuleShortcut(
              title: 'Pricing & contracts',
              subtitle: 'Illustrative lease terms',
              path: '/contracts',
              icon: Icons.description_outlined,
            ),
            ModuleShortcut(
              title: 'Furniture inventory',
              subtitle: 'Sample staged inventory',
              path: '/furniture',
              icon: Icons.chair_outlined,
            ),
            ModuleShortcut(
              title: 'Maintenance',
              subtitle: 'Field follow-up previews',
              path: '/maintenance',
              icon: Icons.build_outlined,
            ),
            ModuleShortcut(
              title: 'Documents',
              subtitle: 'Photos & attachment references',
              path: '/documents',
              icon: Icons.folder_outlined,
            ),
          ],
        ),
      ),
      OutlinedButton(
        onPressed: () => showDemoNotice(context, 'Condition inspection'),
        child: const Text('Preview condition inspection'),
      ),
    ],
  );
}
