import 'dart:convert';

import 'package:intl/intl.dart';
import 'package:timezone/data/latest.dart' as zones;
import 'package:timezone/timezone.dart' as tz;

import '../models/demo_record.dart';

bool _zonesReady = false;
List<String> globalList(dynamic value) => value is List
    ? value.map((v) => '$v').toList()
    : '$value'
          .replaceAll('null', '')
          .split(',')
          .map((v) => v.trim())
          .where((v) => v.isNotEmpty)
          .toList();
String globalCountry(dynamic value, Record global) =>
    (global['countries'] as List)
        .cast<Record>()
        .where((c) => c['code'] == value || c['name'] == value)
        .firstOrNull?['code'] ??
    ({
          'Saudi Arabia': 'SA',
          'United States': 'US',
          'United Kingdom': 'GB',
        }[value] ??
        '$value');
String zonedDate(String zone, [DateTime? now]) {
  if (!_zonesReady) {
    zones.initializeTimeZones();
    _zonesReady = true;
  }
  try {
    final d = zone == 'UTC'
        ? (now ?? DateTime.now()).toUtc()
        : tz.TZDateTime.from(now ?? DateTime.now(), tz.getLocation(zone));
    return '${d.year}-${d.month.toString().padLeft(2, '0')}-${d.day.toString().padLeft(2, '0')}';
  } catch (_) {
    throw StateError('Enter a valid IANA time zone.');
  }
}

void normalizeGlobalState(Record state, Record seed) {
  if (state['draft'] is! Map) state['draft'] = <String, dynamic>{};
  state['settings'] = {
    ...seed['global']['defaults'] as Map,
    ...state['settings'] as Map,
  };
  if ((state['globalRevision'] ?? 0) < 3) {
    for (final p in (seed['properties'] as List).cast<Record>().where(
      (p) => p['id'].toString().startsWith('p-global-'),
    )) {
      if (!(state['properties'] as List).any((v) => v['id'] == p['id'])) {
        (state['properties'] as List).add(jsonDecode(jsonEncode(p)));
        (state['units'] as List).addAll(
          jsonDecode(
            jsonEncode(
              (seed['units'] as List)
                  .where((u) => u['propertyId'] == p['id'])
                  .toList(),
            ),
          ) as List,
        );
      }
    }
  }
  for (final p in (state['properties'] as List).cast<Record>()) {
    p['country'] = globalCountry(p['country'] ?? 'SA', seed['global']);
    p['currency'] ??= 'SAR';
    p['timeZone'] ??= 'Asia/Riyadh';
    p['publication'] ??= p['published'] == true ? 'published' : 'draft';
    p['availability'] ??= 'available';
    p['listingType'] ??= 'rent';
    p['ratePeriod'] ??= ['Chalet', 'Farm', 'Rest house'].contains(p['category'])
        ? 'night'
        : 'month';
    p['minNights'] ??= 1;
    p['amenities'] = globalList(p['amenities']);
    p['region'] ??= '';
    p['postalCode'] ??= '';
  }
  for (final kind in [
    'units',
    'bookings',
    'payments',
    'contracts',
    'expenses',
    'maintenance',
  ]) {
    for (final r in (state[kind] as List).cast<Record>()) {
      final p = (state['properties'] as List)
          .cast<Record>()
          .where((p) => p['id'] == r['propertyId'])
          .firstOrNull;
      r['currency'] ??= p?['currency'] ?? 'SAR';
      if (['bookings', 'contracts'].contains(kind)) {
        r['timeZone'] ??= p?['timeZone'] ?? 'UTC';
        r['country'] ??= p?['country'] ?? 'SA';
        r['ratePeriod'] ??= p?['ratePeriod'] ?? 'month';
      }
      if (kind == 'units') {
        r['ratePeriod'] ??= p?['ratePeriod'] ?? 'month';
        r['amenities'] = globalList(r['amenities']);
      }
    }
  }
  for (final a in (state['accounts'] as List).cast<Record>()) {
    a['country'] ??= a['preferences']?['country'] ?? 'SA';
    a['phoneCode'] ??= a['preferences']?['phoneCode'] ?? '+966';
  }
  state['globalRevision'] = 3;
}

void globalPhotos(dynamic value) {
  if (value is! List ||
      value.length > 4 ||
      value.any(
        (p) =>
            !RegExp(r'^data:image/(jpeg|png|webp);base64,').hasMatch('$p') ||
            '$p'.length > 700000,
      )) {
    throw StateError('Use up to four small PNG or JPEG photos.');
  }
}

Record prepareGlobalProperty(Record input, Record? old, Record seed) {
  final p = <String, dynamic>{...?old, ...input};
  p['country'] = globalCountry(p['country'] ?? 'SA', seed['global']);
  p['currency'] ??= 'SAR';
  p['timeZone'] ??= 'Asia/Riyadh';
  zonedDate(p['timeZone']);
  if (!(seed['global']['countries'] as List).any(
    (c) => c['code'] == p['country'],
  )) {
    throw StateError('Select a supported country.');
  }
  if (!(seed['global']['currencies'] as Map).containsKey(p['currency'])) {
    throw StateError('Select an ISO currency.');
  }
  if (input.containsKey('publication')) {
    p['publication'] = input['publication'];
  } else if (input.containsKey('published')) {
    p['publication'] =
        input['published'] == true || input['published'] == 'true'
        ? 'published'
        : 'draft';
  }
  p['publication'] ??= 'published';
  p['published'] = p['publication'] == 'published';
  p['availability'] ??= 'available';
  p['listingType'] ??= 'rent';
  p['ratePeriod'] ??= ['Chalet', 'Farm', 'Rest house'].contains(p['category'])
      ? 'night'
      : 'month';
  if (!['draft', 'published', 'unpublished'].contains(p['publication']) ||
      ![
        'available',
        'unavailable',
        'maintenance',
      ].contains(p['availability']) ||
      !['rent', 'sale'].contains(p['listingType']) ||
      !['night', 'week', 'month', 'year'].contains(p['ratePeriod'])) {
    throw StateError('Choose valid property statuses and rental duration.');
  }
  p['minNights'] = int.tryParse('${p['minNights'] ?? 1}');
  if (p['minNights'] == null || p['minNights'] < 1) {
    throw StateError('Minimum stay must be positive.');
  }
  for (final entry in {'latitude': 90, 'longitude': 180}.entries) {
    if (p[entry.key] != null && p[entry.key] != '') {
      final n = num.tryParse('${p[entry.key]}');
      if (n == null || !n.isFinite || n.abs() > entry.value) {
        throw StateError('Enter valid coordinates.');
      }
      p[entry.key] = n;
    }
  }
  p['amenities'] = globalList(p['amenities']);
  p['photos'] ??= [];
  globalPhotos(p['photos']);
  if ((p['photos'] as List).isNotEmpty) p['cover'] = p['photos'][0];
  return p;
}

bool globallyBookable(Record? p, Record? u) =>
    p?['published'] == true &&
    p?['availability'] == 'available' &&
    p?['listingType'] != 'sale' &&
    u != null &&
    !['maintenance', 'unavailable'].contains(u['status']);
num globalBookingAmount(
  Record unit,
  Record property,
  String start,
  String end,
) {
  final days = DateTime.parse('${end}T00:00:00Z')
      .difference(DateTime.parse('${start}T00:00:00Z'))
      .inDays;
  if (days < num.parse('${unit['minNights'] ?? property['minNights'] ?? 1}')) {
    throw StateError('The date range is shorter than the minimum stay.');
  }
  final divisor = {
    'night': 1,
    'week': 7,
    'month': 30,
    'year': 365,
  }[unit['ratePeriod'] ?? property['ratePeriod']]!;
  return num.parse(
    ((unit['price'] as num) * days / divisor).toStringAsFixed(
      NumberFormat.currency(name: property['currency']).decimalDigits ?? 2,
    ),
  );
}
