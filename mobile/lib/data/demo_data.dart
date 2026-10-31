// Display fixtures adapted from the existing Stitch/Blade screens. No persistence.
import 'package:flutter/material.dart';

class ScreenLink {
  final String path, title;
  final IconData icon;
  const ScreenLink(this.path, this.title, this.icon);
}

const moduleLinks = [
  ScreenLink('/', 'Dashboard', Icons.dashboard_outlined),
  ScreenLink('/properties', 'Properties', Icons.apartment_outlined),
  ScreenLink('/units', 'Units', Icons.meeting_room_outlined),
  ScreenLink('/owners', 'Owners', Icons.business_outlined),
  ScreenLink('/tenants', 'Tenants', Icons.people_outline),
  ScreenLink('/bookings', 'Bookings', Icons.event_available_outlined),
  ScreenLink('/contracts', 'Contracts', Icons.description_outlined),
  ScreenLink('/payments', 'Payments', Icons.payments_outlined),
  ScreenLink(
    '/receivables',
    'Rent Collection',
    Icons.account_balance_wallet_outlined,
  ),
  ScreenLink('/maintenance', 'Maintenance', Icons.build_outlined),
  ScreenLink('/furniture', 'Furniture Inventory', Icons.chair_outlined),
  ScreenLink('/documents', 'Documents', Icons.folder_outlined),
  ScreenLink('/reports', 'Reports & Analytics', Icons.bar_chart_outlined),
  ScreenLink(
    '/reports/operations',
    'Operational Reports',
    Icons.analytics_outlined,
  ),
  ScreenLink('/settings', 'Settings', Icons.settings_outlined),
  ScreenLink('/dashboard/ar', 'لوحة المدير', Icons.translate),
];

const wizardLabels = [
  'Basic information',
  'Location',
  'Ownership & management',
  'Units & rental',
  'Photos & documents',
  'Review',
];

class PropertyPreview {
  final String name, location, category, owner, status, image;
  final int units, leased;
  const PropertyPreview(
    this.name,
    this.location,
    this.category,
    this.owner,
    this.status,
    this.image,
    this.units,
    this.leased,
  );
}

const properties = [
  PropertyPreview(
    'Al-Yasmin Residential Compound',
    'Al-Yasmin, Riyadh',
    'Residential',
    'Sheikh Abdulaziz Al-Muqrin',
    '92% occupied',
    'dbb2a71ef1c083e218bb.jpg',
    16,
    14,
  ),
  PropertyPreview(
    'Al-Nakheel Private Chalet',
    'Al-Ammariyah, Riyadh',
    'Vacation',
    'Nouf Fahad Al-Hathloul',
    'Available',
    '81a35314118e109fff15.jpg',
    1,
    0,
  ),
  PropertyPreview(
    'Al-Reef Date Farm & Retreat',
    'Al-Kharj, Riyadh',
    'Leisure',
    'Fahad Nasser Al-Sudairi',
    'Seasonal lease',
    '16f2386755ee37651245.jpg',
    3,
    3,
  ),
  PropertyPreview(
    'Burj Al-Ulya Serviced Tower',
    'Al-Olaya, Riyadh',
    'Commercial',
    'Sheikh Abdulaziz Al-Muqrin',
    '85% occupied',
    'f53bc455d2944f5f5212.jpg',
    28,
    24,
  ),
  PropertyPreview(
    'Al-Hamra Luxury Family Villa',
    'Al-Hamra, Jeddah',
    'Residential',
    'Muneera Abdullah Al-Saleh',
    'Vacant',
    '79c2ffe6ec71bf02c76b.jpg',
    1,
    0,
  ),
  PropertyPreview(
    'Diriyah Heritage Rest House',
    'Historic Diriyah',
    'Leisure',
    'Dr. Khalid Ibrahim Al-Dosari',
    'Maintenance',
    '5b2274142101e7feafab.jpg',
    3,
    0,
  ),
];

class PreviewRecord {
  final String title, subtitle, detail, status;
  final Map<String, String> fields;
  const PreviewRecord(
    this.title,
    this.subtitle,
    this.detail,
    this.status, [
    this.fields = const {},
  ]);
}

class ModulePreview {
  final String title, description, metric, metricLabel, action;
  final IconData icon;
  final List<PreviewRecord> records;
  const ModulePreview(
    this.title,
    this.description,
    this.metric,
    this.metricLabel,
    this.action,
    this.icon,
    this.records,
  );
}

const modules = <String, ModulePreview>{
  '/units': ModulePreview(
    'Units Management',
    'Configurations, occupancy and rental terms.',
    '30',
    'Planned units · 21 configured',
    'Add unit',
    Icons.meeting_room_outlined,
    [
      PreviewRecord(
        'A-101',
        'Al-Yasmin Compound II · 2BR apartment',
        'SAR 7,500 / month',
        'Vacant',
        {
          'Area': '115 m²',
          'Bedrooms': '2',
          'Bathrooms': '2',
          'Setup': 'Configured',
          'Publishing': 'Not published',
        },
      ),
      PreviewRecord(
        'A-102',
        'Al-Yasmin Compound II · 3BR apartment',
        'SAR 9,200 / month',
        'Vacant',
      ),
      PreviewRecord(
        'B-201',
        'Al-Yasmin Compound II · Studio',
        'SAR 5,400 / month',
        'Vacant',
      ),
      PreviewRecord(
        'V-01',
        'Al-Yasmin Compound II · 4BR villa',
        'SAR 180,000 / year',
        'Maintenance',
      ),
      PreviewRecord(
        'MV-101',
        'Marina View Residences · 2BR apartment',
        'USD 2,100 / month',
        'Occupied',
      ),
      PreviewRecord(
        'PG-01',
        'Palm Grove Chalets · Pool view',
        'AED 850 / night',
        'Available',
      ),
    ],
  ),
  '/owners': ModulePreview(
    'Owners Management',
    'Property titleholders and portfolio assignments.',
    '14',
    'Sample portfolio owners',
    'Add owner',
    Icons.business_outlined,
    [
      PreviewRecord(
        'Sheikh Abdulaziz Al-Muqrin',
        'Al-Yasmin Compound · Burj Al-Ulya',
        'Property owner',
        'Active',
      ),
      PreviewRecord(
        'Nouf Fahad Al-Hathloul',
        'Al-Nakheel Private Chalet',
        'Property owner',
        'Active',
      ),
      PreviewRecord(
        'Fahad Nasser Al-Sudairi',
        'Al-Reef Date Farm & Retreat',
        'Property owner',
        'Active',
      ),
      PreviewRecord(
        'Muneera Abdullah Al-Saleh',
        'Al-Hamra Luxury Family Villa',
        'Property owner',
        'Active',
      ),
    ],
  ),
  '/tenants': ModulePreview(
    'Tenants Management',
    'Tenant profiles, tenancy and documents.',
    '24',
    'Sample registered tenants',
    'Add tenant',
    Icons.people_outline,
    [
      PreviewRecord(
        'Bandar Fahad Al-Otaibi',
        'Al-Yasmin Compound · UNT-YAS-101',
        'Annual tenancy',
        'Active',
        {'Contract': 'CTR-2024-991', 'Documents': '4 sample attachments'},
      ),
      PreviewRecord(
        'Tadawul Tech Solutions KSA',
        'Burj Al-Ulya · UNT-OLY-OF04',
        'Commercial tenancy',
        'Active',
      ),
      PreviewRecord(
        'Majid Al-Hokair Group',
        'Al-Reef · Executive Lodge',
        'Seasonal tenancy',
        'Active',
      ),
    ],
  ),
  '/bookings': ModulePreview(
    'Bookings Management',
    'Review requests and sample availability.',
    '18',
    'Requests · 4 pending review',
    'Create booking request',
    Icons.event_available_outlined,
    [
      PreviewRecord(
        'Al-Nakheel Luxury Chalet',
        'Eng. Abdulrahman Al-Otaibi',
        'SAR 6,400 · 4 nights',
        'Pending',
        {
          'Period': '28 Oct – 01 Nov 2024',
          'Booking type': 'Daily rental',
          'Verification': 'Manager review required',
        },
      ),
      PreviewRecord(
        'Al-Reef Farm Retreat',
        'Fahad Bin Nasser Al-Sudairi',
        'SAR 9,800 · 3 nights',
        'Pending',
        {
          'Period': '05 – 08 Nov 2024',
          'Verification': 'ID verification required',
        },
      ),
      PreviewRecord(
        'Al-Yasmin Villa 14',
        'Dr. Khalid Ibrahim Al-Dosari',
        'SAR 145,000 · 1 year',
        'Pending',
      ),
      PreviewRecord(
        'Burj Al-Ulya Suite B-204',
        'Sarah Ahmed Al-Mansoor',
        'SAR 38,000 · 6 months',
        'Approved',
      ),
    ],
  ),
  '/contracts': ModulePreview(
    'Contracts Management',
    'Rental contracts and management agreements.',
    '14',
    'Rental contracts · 10 active',
    'Create contract',
    Icons.description_outlined,
    [
      PreviewRecord(
        'CTR-2024-991',
        'Bandar Fahad Al-Otaibi · Al-Yasmin',
        'Annual rental contract',
        'Active',
      ),
      PreviewRecord(
        'Commercial tenancy agreement',
        'Tadawul Tech Solutions · Burj Al-Ulya',
        'Corporate lease',
        'Active',
      ),
      PreviewRecord(
        'AGR-2026-YAS-003',
        'Al-Yasmin Compound II',
        '8.5% management fee',
        'Draft',
        {
          'Term': '01 Mar 2026 – 28 Feb 2029',
          'Agreement': 'Management agreement',
        },
      ),
    ],
  ),
  '/payments': ModulePreview(
    'Payments Management',
    'Illustrative offline payment verification records.',
    '16',
    'Records · 4 pending verification',
    'Record offline payment',
    Icons.payments_outlined,
    [
      PreviewRecord(
        'Faisal Bin Majid Al-Qahtani',
        'Apt Al-Narjis 12 · 20 Oct 2024',
        'SAR 14,000',
        'Verified',
      ),
      PreviewRecord(
        'Al-Rowad Contracting Co.',
        'Commercial Office 402 · 15 Oct 2024',
        'SAR 32,500',
        'Overdue',
      ),
      PreviewRecord(
        'Muneera Abdullah Al-Saleh',
        'Apt Al-Hamra 05 · 24 Oct 2024',
        'SAR 9,000',
        'Pending',
      ),
      PreviewRecord(
        'Tariq Sulaiman Al-Harbi',
        'Al-Waha Retreat · 22 Oct 2024',
        'SAR 5,500 / 11,000',
        'Partial',
      ),
    ],
  ),
  '/receivables': ModulePreview(
    'Rent Collection',
    'Receivables, obligations and collection evidence.',
    '34,500',
    'SAR · Sample overdue balance',
    'Record rent obligation',
    Icons.account_balance_wallet_outlined,
    [
      PreviewRecord(
        'Al-Rowad Contracting Co.',
        'Commercial Office 402',
        'SAR 32,500 due',
        'Overdue',
      ),
      PreviewRecord(
        'Tariq Sulaiman Al-Harbi',
        'Al-Waha Retreat',
        'SAR 5,500 remaining',
        'Partial',
      ),
      PreviewRecord(
        'Muneera Abdullah Al-Saleh',
        'Apt Al-Hamra 05',
        'SAR 9,000',
        'Pending',
      ),
    ],
  ),
  '/maintenance': ModulePreview(
    'Maintenance Management',
    'Field follow-up and illustrative work orders.',
    '9',
    'Active tickets · 3 urgent',
    'Create maintenance request',
    Icons.build_outlined,
    [
      PreviewRecord(
        'Master AC failure',
        'Villa Al-Hattab 08',
        'Assigned to HVAC technician',
        'Urgent',
      ),
      PreviewRecord(
        'Master bathroom water leak',
        'Yasmin Apt 3B',
        'Certified plumber assigned',
        'In progress',
      ),
      PreviewRecord(
        'Electrical panel inspection',
        'Al-Yasmin · Common area',
        'Preventive inspection',
        'Scheduled',
      ),
    ],
  ),
  '/furniture': ModulePreview(
    'Furniture Inventory',
    'Staged inventory and condition previews.',
    '18',
    'Sample items · Unit A-101',
    'Add inventory item',
    Icons.chair_outlined,
    [
      PreviewRecord(
        'Modular 3-seater sofa',
        'Living room · Unit A-101',
        'Quantity 1',
        'Not assessed',
      ),
      PreviewRecord(
        'Solid oak dining table + 6 chairs',
        'Dining area · Unit A-101',
        'Quantity 1',
        'Not assessed',
      ),
      PreviewRecord(
        'King-size bed frame & mattress',
        'Master bedroom · Unit A-101',
        'Quantity 2',
        'Not assessed',
      ),
      PreviewRecord(
        'Inverter refrigerator (520L)',
        'Kitchen · Unit A-101',
        'Quantity 1',
        'Not assessed',
      ),
    ],
  ),
  '/documents': ModulePreview(
    'Documents Management',
    'Static attachment references. No actual uploads.',
    '48',
    'Illustrative documents',
    'Upload document',
    Icons.folder_outlined,
    [
      PreviewRecord(
        'Title deed',
        'Al-Yasmin Compound II',
        'Property ownership · PDF',
        'Sample',
      ),
      PreviewRecord(
        'Management agreement 2026',
        'AGR-2026-YAS-003',
        '4.2 MB · PDF',
        'Sample',
      ),
      PreviewRecord(
        'Building completion certificate',
        'Al-Yasmin Compound II',
        'Property compliance · PDF',
        'Sample',
      ),
      PreviewRecord(
        'Hazard & civil insurance',
        'Al-Yasmin Compound II',
        'Insurance · PDF',
        'Sample',
      ),
    ],
  ),
};
