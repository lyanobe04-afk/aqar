import 'handover_store.dart' show normalizeHandover;

import 'dart:convert';

import 'package:crypto/crypto.dart';
import 'package:flutter/foundation.dart';
import 'package:flutter/services.dart';
import 'package:shared_preferences/shared_preferences.dart';

import '../models/demo_record.dart';
import 'global_support.dart';

typedef PersistDemo = Future<void> Function(String value);

// Presentation-only local simulation. This is not a security boundary or CMS.
class DemoStore extends ChangeNotifier {
  static const storageKey = 'aqar.mobile.interactive.v2';
  final Record seed;
  final Map<String, dynamic> translations;
  final PersistDemo persist;
  Record state;
  Record? session;
  bool remember = false;
  int _sequence = 0;
  String? recoveryMessage;

  DemoStore(Record input, this.translations, this.persist, {String? saved})
    : seed = _clone(input),
      state = _clone(input) {
    if (saved != null) {
      try {
        final data = jsonDecode(saved) as Record;
        if (data['state']?['version'] == seed['version'] &&
            seed.entries
                .where((entry) => entry.value is List)
                .every((entry) => data['state'][entry.key] is List)) {
          state = Map<String, dynamic>.from(data['state']);
          session = data['session'] == null
              ? null
              : Map<String, dynamic>.from(data['session']);
          remember = session != null;
        }
      } catch (_) {
        recoveryMessage = 'Invalid saved demo data was reset.';
      }
    }
    normalizeGlobalState(state, seed);
    normalizeHandover(state);
  }
  static Record _clone(Record value) => jsonDecode(jsonEncode(value)) as Record;
  static Future<DemoStore> load() async {
    final seed = jsonDecode(
      await rootBundle.loadString('assets/data/demo-seed.json'),
    ) as Record;
    final translations = jsonDecode(
      await rootBundle.loadString('assets/data/demo-i18n.json'),
    ) as Record;
    final prefs = await SharedPreferences.getInstance();
    return DemoStore(seed, translations, (value) async {
      if (!await prefs.setString(storageKey, value)) {
        throw StateError('Local demo data could not be saved.');
      }
    }, saved: prefs.getString(storageKey));
  }

  List<Record> all(String key) => (state[key] as List).cast<Record>();
  String id(String prefix) =>
      '$prefix-${DateTime.now().microsecondsSinceEpoch}-${_sequence++}';
  Record get preferences => {
    ...seed['global']['defaults'] as Map,
    ...state['settings'] as Map,
    ...?user?['preferences'] as Map?,
  };
  Record get global => seed['global'] as Record;
  String get locale => preferences['locale'] as String;
  List<Record> get countries => (global['countries'] as List).cast<Record>();
  String countryName(dynamic code) => t(
    countries.where((c) => c['code'] == code).firstOrNull?['name'] ?? '$code',
  );
  String address(Record p) {
    final street = '${p['address'] ?? ''}',
        city = '${p['city'] ?? ''}',
        region = '${p['region'] ?? ''}',
        postal = '${p['postalCode'] ?? ''}';
    return (p['country'] == 'US'
            ? [street, '$city, $region $postal', countryName(p['country'])]
            : [
                street,
                p['district'] ?? '',
                city,
                region,
                postal,
                countryName(p['country']),
              ])
        .where((v) => v.toString().trim().isNotEmpty)
        .join(', ');
  }

  Record? property(dynamic id) =>
      all('properties').where((p) => p['id'] == id).firstOrNull;
  String currency([dynamic record]) {
    if (record is String) {
      if ((global['currencies'] as Map).containsKey(record)) return record;
      return property(record)?['currency'] ?? preferences['currency'];
    }
    if (record is Map) {
      return record['currency'] ??
          property(record['propertyId'])?['currency'] ??
          preferences['currency'];
    }
    return preferences['currency'];
  }

  String date(dynamic value) {
    if (value == null) return '';
    final parts = '$value'.substring(0, 10).split('-');
    return preferences['dateFormat'] == 'dd/MM/yyyy'
        ? '${parts[2]}/${parts[1]}/${parts[0]}'
        : preferences['dateFormat'] == 'MM/dd/yyyy'
        ? '${parts[1]}/${parts[2]}/${parts[0]}'
        : parts.join('-');
  }

  String propertyToday(Record? p) =>
      zonedDate(p?['timeZone'] ?? preferences['timeZone']);
  String t(String key) {
    key = (translations['_presentation'] as Map?)?[key] as String? ?? key;
    final dict = locale == 'ar'
        ? translations
        : (translations['_locales'] as Map?)?[locale] as Map? ??
              <String, dynamic>{};
    return dict[key] as String? ?? key;
  }

  String label(Record? value) => value == null
      ? ''
      : locale == 'ar' && value['nameAr'] != null
      ? value['nameAr'] as String
      : value['name']?.toString() ?? '';
  static String hash(String value) =>
      sha256.convert(utf8.encode(value)).toString();
  static String today() {
    final now = DateTime.now();
    return '${now.year}-${now.month.toString().padLeft(2, '0')}-${now.day.toString().padLeft(2, '0')}';
  }

  static String plusDays(String start, int days) =>
      DateTime.parse(start)
          .add(Duration(days: days))
          .toIso8601String()
          .substring(0, 10);
  Record? get user {
    if (session == null ||
        (session!['expiresAt'] as num) <=
            DateTime.now().millisecondsSinceEpoch) {
      return null;
    }
    return all('accounts')
        .where((a) => a['id'] == session!['accountId'])
        .firstOrNull;
  }

  String get role => user?['role'] as String? ?? '';
  Record require(List<String> roles) {
    if (user == null) throw StateError('Please sign in to the demo.');
    if (!roles.contains(role)) {
      throw StateError('This action is not available for your demo role.');
    }
    return user!;
  }

  Future<void> save() => persist(
    jsonEncode({'state': state, 'session': remember ? session : null}),
  );
  Future<T> commit<T>(T Function() action) async {
    final old = _clone(state);
    try {
      final value = action();
      await save();
      notifyListeners();
      return value;
    } catch (_) {
      state = old;
      rethrow;
    }
  }

  Future<void> login(
    String email,
    String password, {
    bool rememberMe = false,
  }) async {
    final account = all('accounts')
        .where(
          (a) =>
              a['email'].toString().toLowerCase() ==
                  email.trim().toLowerCase() &&
              a['passwordHash'] == hash(password),
        )
        .firstOrNull;
    if (account == null) throw StateError('Email or password is incorrect.');
    remember = rememberMe;
    session = {
      'accountId': account['id'],
      'expiresAt': DateTime.now()
          .add(Duration(hours: remember ? 168 : 12))
          .millisecondsSinceEpoch,
    };
    await save();
    notifyListeners();
  }

  Future<void> logout() async {
    session = null;
    remember = false;
    await save();
    notifyListeners();
  }

  Future<void> expire() async {
    session?['expiresAt'] = 0;
    await save();
    notifyListeners();
  }

  Future<void> register(Record input) async {
    if ('${input['name'] ?? ''}'.trim().isEmpty ||
        !RegExp(r'^\S+@\S+\.\S+$').hasMatch('${input['email'] ?? ''}')) {
      throw StateError('Enter a name and a valid email.');
    }
    if (!['manager', 'owner', 'tenant'].contains(input['role'])) {
      throw StateError('Choose an account type.');
    }
    _password(input['password'].toString(), input['confirm'].toString());
    if (all('accounts').any(
      (a) =>
          a['email'].toString().toLowerCase() ==
          input['email'].toString().trim().toLowerCase(),
    )) {
      throw StateError('This demo email is already registered.');
    }
    await commit(() {
      final account = <String, dynamic>{
        'id': id(input['role']),
        'name': input['name'].toString().trim(),
        'email': input['email'].toString().trim().toLowerCase(),
        'role': input['role'],
        'passwordHash': hash(input['password']),
        'propertyIds': <String>[],
        'phone': '',
        'country': input['country'] ?? preferences['country'],
        'phoneCode': input['phoneCode'] ?? preferences['phoneCode'],
      };
      all('accounts').add(account);
      if (input['role'] == 'tenant') {
        all('tenants').add({
          'id': account['id'],
          'name': account['name'],
          'email': account['email'],
        });
      }
      if (input['role'] == 'owner') {
        all('owners').add({
          'id': account['id'],
          'name': account['name'],
          'email': account['email'],
        });
      }
    });
  }

  void _password(String password, String confirm) {
    if (password.length < 8) {
      throw StateError('Use at least 8 characters for the demo password.');
    }
    if (password != confirm) throw StateError('Passwords do not match.');
  }

  Future<void> resetPassword(
    String email,
    String password,
    String confirm,
  ) async {
    _password(password, confirm);
    final account = all('accounts')
        .where(
          (a) => a['email'].toString().toLowerCase() == email.toLowerCase(),
        )
        .firstOrNull;
    if (account == null) throw StateError('Demo account not found.');
    await commit(() => account['passwordHash'] = hash(password));
  }

  Future<void> changePassword(
    String old,
    String password,
    String confirm,
  ) async {
    final u = require(['manager', 'owner', 'tenant']);
    if (u['passwordHash'] != hash(old)) {
      throw StateError('Current password is incorrect.');
    }
    await resetPassword(u['email'], password, confirm);
  }

  Future<void> profile(
    String name,
    String phone, {
    String? phoneCode,
    String? country,
  }) async {
    final u = require(['manager', 'owner', 'tenant']);
    if (name.trim().isEmpty) throw StateError('Name is required.');
    await commit(() {
      u['name'] = name.trim();
      u['phone'] = phone;
      u['phoneCode'] = phoneCode ?? u['phoneCode'] ?? preferences['phoneCode'];
      u['country'] = country ?? u['country'] ?? preferences['country'];
      for (final list in ['owners', 'tenants']) {
        for (final p in all(list).where((p) => p['id'] == u['id'])) {
          p['name'] = name.trim();
        }
      }
    });
  }

  Future<void> settings({
    String? language,
    bool? notifications,
    Record? preferences,
  }) async {
    final p = <String, dynamic>{
      ...this.preferences,
      ...?preferences,
      'locale': ?language,
      'notifications': ?notifications,
    };
    if (!(global['languages'] as Map).containsKey(p['locale']) ||
        !(global['currencies'] as Map).containsKey(p['currency']) ||
        !countries.any((c) => c['code'] == p['country']) ||
        !['sqm', 'sqft'].contains(p['measurement']) ||
        !['yyyy-MM-dd', 'dd/MM/yyyy', 'MM/dd/yyyy'].contains(p['dateFormat']) ||
        !RegExp(r'^\+\d{1,4}$').hasMatch('${p['phoneCode']}')) {
      throw StateError('Choose valid global preferences.');
    }
    zonedDate(p['timeZone']);
    await commit(() {
      if (user != null) {
        user!['preferences'] = p;
      } else {
        state['settings'] = p;
      }
    });
  }

  List<Record> properties({bool browse = false}) {
    if (user == null) return [];
    if (role == 'manager') {
      return user!['id'] == 'manager1'
          ? all('properties')
          : all('properties')
                .where((p) => (p['brokerIds'] as List).contains(user!['id']))
                .toList();
    }
    if (role == 'owner') {
      return all('properties')
          .where((p) => p['ownerId'] == user!['id'])
          .toList();
    }
    if (browse) {
      return all('properties').where((p) => p['published'] == true).toList();
    }
    final ids = <String>{
      ...(user!['propertyIds'] as List).cast<String>(),
      ...all('bookings')
          .where(
            (b) =>
                b['tenantId'] == user!['id'] &&
                !['cancelled', 'rejected'].contains(b['status']),
          )
          .map((b) => b['propertyId'] as String),
    };
    return all('properties').where((p) => ids.contains(p['id'])).toList();
  }

  bool canSeeProperty(String id, {bool browse = false}) =>
      properties(browse: browse).any((p) => p['id'] == id);
  List<Record> records(String key) {
    if (user == null) return [];
    final list = all(key);
    if (key == 'notifications') {
      return list
          .where(
            (n) =>
                n['accountId'] == user!['id'] ||
                (n['accountId'] == null && n['role'] == role),
          )
          .toList();
    }
    if (role == 'manager') {
      return user!['id'] == 'manager1' ||
              ['accounts', 'owners', 'tenants'].contains(key)
          ? list
          : list
                .where(
                  (r) => properties().any((p) => p['id'] == r['propertyId']),
                )
                .toList();
    }
    if (['owners', 'tenants', 'accounts'].contains(key) ||
        role == 'tenant' && key == 'expenses') {
      return [];
    }
    final ids = properties().map((p) => p['id']).toSet();
    return list
        .where(
          (r) =>
              role == 'tenant' &&
                  [
                    'bookings',
                    'payments',
                    'contracts',
                    'maintenance',
                    'inspections',
                  ].contains(key)
              ? r['tenantId'] == user!['id']
              : ids.contains(r['propertyId']),
        )
        .toList();
  }

  void _notify(String title, String propertyId, [String? tenantId]) {
    all('notifications').insert(0, {
      'id': id('n'),
      'role': 'manager',
      'title': title,
      'read': false,
    });
    final p = property(propertyId);
    if (p != null) {
      all('notifications').insert(0, {
        'id': id('n'),
        'role': 'owner',
        'accountId': p['ownerId'],
        'title': title,
        'read': false,
      });
    }
    if (tenantId != null) {
      all('notifications').insert(0, {
        'id': id('n'),
        'role': 'tenant',
        'accountId': tenantId,
        'title': title,
        'read': false,
      });
    }
  }

  Future<Record> saveProperty(Record input, {String? editId}) async {
    require(['manager']);
    final old = editId == null ? null : property(editId);
    if (editId != null && old == null) throw StateError('Record not found.');
    final value = prepareGlobalProperty(input, old, seed);
    value['brokerIds'] ??= [user!['id']];
    if (old != null &&
        user!['id'] != 'manager1' &&
        (old['ownerId'] != value['ownerId'] ||
            jsonEncode(old['brokerIds']) != jsonEncode(value['brokerIds']))) {
      throw StateError('Only the primary demo manager can change assignments.');
    }
    if (old != null && !canSeeProperty(editId!)) {
      throw StateError('This property is not assigned to your demo account.');
    }
    if ([
      'name',
      'city',
      'address',
    ].any((k) => '${value[k] ?? ''}'.trim().isEmpty)) {
      throw StateError('Property name, city and address are required.');
    }
    final count = int.tryParse('${value['unitCount']}'),
        price = num.tryParse('${value['price']}'.replaceAll(',', ''));
    if (count == null ||
        count < 1 ||
        count > 20 ||
        price == null ||
        !price.isFinite ||
        price <= 0) {
      throw StateError('Enter 1–20 units and a positive rental amount.');
    }
    if (!all('owners').any((o) => o['id'] == value['ownerId'])) {
      throw StateError('Select a sample owner.');
    }
    final units = all('units').where((u) => u['propertyId'] == editId).toList();
    if (old != null && count < units.length) {
      throw StateError(
        'Delete eligible units in unit management before reducing the count.',
      );
    }
    final currencyChanged = old != null && old['currency'] != value['currency'];
    if (currencyChanged) {
      if (hasHistory(editId!)) {
        throw StateError(
          'Currency cannot change while booking or financial history exists.',
        );
      }
      if (units.isNotEmpty &&
          input['repriceUnits'] != true &&
          input['repriceUnits'] != 'true') {
        throw StateError('Confirm repricing all units in the new currency.');
      }
    }
    final oldPrice = old?['price'], oldPeriod = old?['ratePeriod'];
    return commit(() {
      state['draft'] = <String, dynamic>{};
      value.addAll({
        'price': price,
        'unitCount': count,
        'policy': value['policy'] == 'instant' ? 'instant' : 'request',
        'image': value['image'] ?? seed['properties'][0]['image'],
      });
      final p = old ?? <String, dynamic>{'id': id('p')};
      value.remove('id');
      p.addAll(value);
      if (old == null) all('properties').insert(0, p);
      for (final u in units) {
        if (currencyChanged ||
            u['price'] == oldPrice ||
            input['repriceUnits'] == true ||
            input['repriceUnits'] == 'true') {
          u['price'] = price;
        }
        if (currencyChanged) {
          u['currency'] = value['currency'];
        }
        if (u['ratePeriod'] == oldPeriod) {
          u['ratePeriod'] = value['ratePeriod'];
        }
      }
      for (var i = units.length; i < count; i++) {
        all('units').add({
          'id': id('u'),
          'propertyId': p['id'],
          'name': 'U-${(i + 1).toString().padLeft(3, '0')}',
          'beds': 2,
          'baths': 2,
          'area': 115,
          'price': price,
          'currency': value['currency'],
          'ratePeriod': value['ratePeriod'],
          'status': 'vacant',
          'amenities': value['amenities'],
          'photos': [],
        });
      }
      if (old == null && '${input['document'] ?? ''}'.trim().isNotEmpty) {
        all('documents').add({
          'id': id('d'),
          'propertyId': p['id'],
          'title': input['document'],
          'type': 'Sample reference',
        });
      }
      _notify('Property updated.', p['id']);
      return p;
    });
  }

  bool hasHistory(String propertyId, {String? unitId}) {
    if (all('handovers').any(
      (h) => unitId == null
          ? h['propertyId'] == propertyId
          : h['unitId'] == unitId,
    )) {
      return true;
    }
    final books = all('bookings')
        .where(
          (b) => unitId == null
              ? b['propertyId'] == propertyId
              : b['unitId'] == unitId,
        )
        .toList();
    return books.isNotEmpty ||
        ['contracts', 'payments', 'expenses'].any(
          (kind) => all(kind).any(
            (r) => unitId == null
                ? r['propertyId'] == propertyId
                : books.any((b) => b['id'] == r['bookingId']),
          ),
        );
  }

  Future<void> deleteProperty(String propertyId) async {
    if (all('unitInventory').any((i) => i['propertyId'] == propertyId)) {
      throw StateError(
        'Remove eligible unit inventory before deleting the property.',
      );
    }
    require(['manager']);
    if (property(propertyId) == null) throw StateError('Record not found.');
    if (hasHistory(propertyId)) {
      throw StateError(
        'Booking or financial history protects this property. Unpublish it instead.',
      );
    }
    await commit(() {
      for (final kind in [
        'properties',
        'units',
        'maintenance',
        'furniture',
        'documents',
        'expenses',
        'inspections',
      ]) {
        all(kind).removeWhere(
          (r) => kind == 'properties'
              ? r['id'] == propertyId
              : r['propertyId'] == propertyId,
        );
      }
    });
  }

  Future<void> saveUnit(Record input, {String? editId}) async {
    require(['manager']);
    final old = all('units').where((u) => u['id'] == editId).firstOrNull;
    final v = <String, dynamic>{...?old, ...input};
    final p = property(v['propertyId']);
    if (p != null && !canSeeProperty(p['id'])) {
      throw StateError('This property is not assigned to your demo account.');
    }
    final price = num.tryParse('${v['price']}'),
        area = num.tryParse('${v['area']}');
    if (editId != null && old == null) throw StateError('Record not found.');
    if (p == null ||
        '${v['name'] ?? ''}'.trim().isEmpty ||
        price == null ||
        !price.isFinite ||
        price <= 0 ||
        area == null ||
        !area.isFinite ||
        area <= 0) {
      throw StateError('Select a property, unit name and positive rent.');
    }
    if (old != null &&
        old['propertyId'] != p['id'] &&
        hasHistory(old['propertyId'], unitId: editId)) {
      throw StateError('Units with history cannot be moved.');
    }
    v['status'] ??= 'vacant';
    v['ratePeriod'] ??= p['ratePeriod'];
    if (![
          'vacant',
          'occupied',
          'maintenance',
          'unavailable',
        ].contains(v['status']) ||
        !['night', 'week', 'month', 'year'].contains(v['ratePeriod'])) {
      throw StateError('Choose valid unit status and duration.');
    }
    final stay = int.tryParse('${v['minNights'] ?? 1}');
    if (stay == null ||
        stay < 1 ||
        num.tryParse('${v['beds'] ?? 0}') == null ||
        num.parse('${v['beds'] ?? 0}') < 0 ||
        num.tryParse('${v['baths'] ?? 0}') == null ||
        num.parse('${v['baths'] ?? 0}') < 0) {
      throw StateError('Choose valid unit status and duration.');
    }
    v['minNights'] = stay;
    globalPhotos(v['photos'] ?? []);
    await commit(() {
      v.addAll({
        'price': price,
        'area': v['areaUnit'] == 'sqft' ? area / 10.7639104 : area,
        'currency': p['currency'],
        'beds': int.tryParse('${v['beds']}') ?? 0,
        'baths': int.tryParse('${v['baths']}') ?? 0,
        'amenities': globalList(v['amenities']),
      });
      v.remove('areaUnit');
      if ((v['photos'] as List?)?.isNotEmpty == true) {
        v['cover'] = v['photos'][0];
      }
      if (old != null) {
        old.addAll(v);
      } else {
        all('units').add({...v, 'id': id('u')});
      }
      for (final prop in all('properties')) {
        prop['unitCount'] = all('units')
            .where((u) => u['propertyId'] == prop['id'])
            .length;
      }
    });
  }

  Future<void> deleteUnit(String id) async {
    if (all('unitInventory').any((i) => i['unitId'] == id)) {
      throw StateError(
        'Remove eligible unit inventory before deleting the unit.',
      );
    }
    require(['manager']);
    final u = all('units').where((u) => u['id'] == id).firstOrNull;
    if (u == null) throw StateError('Record not found.');
    if (hasHistory(u['propertyId'], unitId: id)) {
      throw StateError(
        'Booking or financial history protects this unit. Mark it unavailable instead.',
      );
    }
    await commit(() {
      all('units').removeWhere((u) => u['id'] == id);
      property(u['propertyId'])!['unitCount'] = all('units')
          .where((v) => v['propertyId'] == u['propertyId'])
          .length;
    });
  }

  void validDates(String start, String end, {String? timeZone}) {
    final s = DateTime.tryParse(start), e = DateTime.tryParse(end);
    if (s == null ||
        e == null ||
        s.toIso8601String().substring(0, 10) != start ||
        e.toIso8601String().substring(0, 10) != end ||
        end.compareTo(start) <= 0 ||
        start.compareTo(timeZone == null ? today() : zonedDate(timeZone)) < 0) {
      throw StateError(
        'Choose valid future dates with check-out after check-in.',
      );
    }
  }

  bool conflicts(String unitId, String start, String end, {String? exclude}) =>
      all('bookings').any(
        (b) =>
            b['id'] != exclude &&
            b['unitId'] == unitId &&
            ['approved', 'confirmed'].contains(b['status']) &&
            start.compareTo(b['end']) < 0 &&
            end.compareTo(b['start']) > 0,
      );
  Future<Record> book(Record input) async {
    final u = require(['manager', 'tenant']);
    final p = property(input['propertyId']),
        unit = all('units')
            .where(
              (unit) =>
                  unit['id'] == input['unitId'] &&
                  unit['propertyId'] == input['propertyId'],
            )
            .firstOrNull;
    validDates(input['start'], input['end'], timeZone: p?['timeZone']);
    if (p == null || unit == null || !globallyBookable(p, unit)) {
      throw StateError('Choose a published property and an available unit.');
    }
    if (unit['status'] == 'occupied' &&
        all('bookings').every((b) => b['unitId'] != unit['id'])) {
      throw StateError('This unit is unavailable.');
    }
    if (conflicts(unit['id'], input['start'], input['end'])) {
      throw StateError('These dates overlap an approved booking.');
    }
    final tenantId = role == 'tenant' ? u['id'] : input['tenantId'];
    if (!all('tenants').any((t) => t['id'] == tenantId)) {
      throw StateError('Select a sample tenant.');
    }
    final amount = globalBookingAmount(unit, p, input['start'], input['end']);
    return commit(() {
      final item = <String, dynamic>{
        'id': id('b'),
        'propertyId': p['id'],
        'unitId': unit['id'],
        'tenantId': tenantId,
        'start': input['start'],
        'end': input['end'],
        'amount': amount,
        'currency': p['currency'],
        'timeZone': p['timeZone'],
        'country': p['country'],
        'ratePeriod': unit['ratePeriod'],
        'policy': p['policy'],
        'status': p['policy'] == 'instant' ? 'confirmed' : 'pending',
      };
      all('bookings').insert(0, item);
      _notify('A demo booking was created.', p['id'], tenantId);
      return item;
    });
  }

  Future<void> bookingStatus(String id, String status) async {
    require(['manager', 'tenant']);
    final b = records('bookings').where((b) => b['id'] == id).firstOrNull;
    if (b == null) throw StateError('Record not found.');
    if (role == 'tenant' && status != 'cancelled') {
      throw StateError('This action is not available for your demo role.');
    }
    if (!['approved', 'rejected', 'cancelled'].contains(status) ||
        (status == 'approved' || status == 'rejected') &&
            b['status'] != 'pending' ||
        status == 'cancelled' &&
            ['cancelled', 'rejected'].contains(b['status'])) {
      throw StateError('This status change is not valid.');
    }
    if (status == 'approved' &&
        !globallyBookable(
          property(b['propertyId']),
          all('units').where((u) => u['id'] == b['unitId']).firstOrNull,
        )) {
      throw StateError('The property or unit is unavailable.');
    }
    if (status == 'approved' &&
        conflicts(b['unitId'], b['start'], b['end'], exclude: id)) {
      throw StateError('These dates overlap an approved booking.');
    }
    await commit(() {
      b['status'] = status;
      _notify('Booking status: $status', b['propertyId'], b['tenantId']);
    });
  }

  num paid(String bookingId) => all('payments')
      .where((p) => p['bookingId'] == bookingId && p['status'] == 'verified')
      .fold<num>(0, (sum, p) => sum + (p['amount'] as num));
  Future<Record> payment(Record input) async {
    require(['manager', 'tenant']);
    final b = records('bookings')
        .where((b) => b['id'] == input['bookingId'])
        .firstOrNull;
    final amount = num.tryParse('${input['amount']}');
    if (b == null || !['approved', 'confirmed'].contains(b['status'])) {
      throw StateError('Select an approved or confirmed booking.');
    }
    if (amount == null ||
        !amount.isFinite ||
        amount <= 0 ||
        amount > (b['amount'] as num) - paid(b['id'])) {
      throw StateError(
        'Payment must be positive and must not exceed the outstanding balance.',
      );
    }
    return commit(() {
      final item = <String, dynamic>{
        'id': id('pay'),
        'bookingId': b['id'],
        'propertyId': b['propertyId'],
        'tenantId': b['tenantId'],
        'amount': amount,
        'currency': b['currency'],
        'status': role == 'manager' && input['status'] == 'verified'
            ? 'verified'
            : 'pending',
        'date': today(),
        'note': 'SIMULATED — ${input['note'] ?? 'No money moved.'}',
      };
      all('payments').insert(0, item);
      _notify(
        'A simulated payment was recorded.',
        b['propertyId'],
        b['tenantId'],
      );
      return item;
    });
  }

  Future<void> verify(String id) async {
    require(['manager']);
    final p = all('payments').where((p) => p['id'] == id).firstOrNull,
        b = all('bookings')
            .where((b) => b['id'] == p?['bookingId'])
            .firstOrNull;
    if (p == null || b == null || p['status'] != 'pending') {
      throw StateError('Select a pending payment.');
    }
    if ((p['amount'] as num) > (b['amount'] as num) - paid(b['id'])) {
      throw StateError(
        'Payment must be positive and must not exceed the outstanding balance.',
      );
    }
    await commit(() => p['status'] = 'verified');
  }

  Future<void> contract(Record input) async {
    require(['manager']);
    final b = records('bookings')
        .where(
          (b) =>
              b['id'] == input['bookingId'] &&
              ['approved', 'confirmed'].contains(b['status']),
        )
        .firstOrNull;
    if (b == null) throw StateError('Select an approved or confirmed booking.');
    if ('${input['title'] ?? ''}'.trim().isEmpty) {
      throw StateError('Title is required.');
    }
    await commit(
      () => all('contracts').insert(0, {
        'id': id('c'),
        'bookingId': b['id'],
        'propertyId': b['propertyId'],
        'tenantId': b['tenantId'],
        'title': input['title'],
        'status': 'draft',
        'currency': b['currency'],
        'timeZone': b['timeZone'],
        'amount': b['amount'],
        'start': b['start'],
        'end': b['end'],
      }),
    );
  }

  Future<void> contractStatus(String id, String status) async {
    require(['manager']);
    final c = all('contracts').where((c) => c['id'] == id).firstOrNull;
    if (c == null ||
        !['draft', 'active', 'expired', 'terminated'].contains(status)) {
      throw StateError('Record not found.');
    }
    await commit(() => c['status'] = status);
  }

  void _photos(Record input) {
    final photos = (input['photos'] as List?) ?? [];
    if (photos.length > 4 ||
        photos.any(
          (p) =>
              !RegExp(r'^data:image/(png|jpeg|webp);base64,').hasMatch(p) ||
              p.length > 700000,
        )) {
      throw StateError('Use up to four small PNG or JPEG photos.');
    }
  }

  Future<void> maintenance(Record input) async {
    final u = require(['manager', 'tenant']);
    if (!canSeeProperty('${input['propertyId']}') ||
        '${input['title'] ?? ''}'.trim().isEmpty ||
        '${input['description'] ?? ''}'.trim().isEmpty) {
      throw StateError('Choose an assigned property, title and description.');
    }
    _photos(input);
    await commit(() {
      final item = <String, dynamic>{
        ...input,
        'id': id('m'),
        'tenantId': role == 'tenant' ? u['id'] : input['tenantId'] ?? 'tenant1',
        'currency': property(input['propertyId'])!['currency'],
        'cost': num.tryParse('${input['cost']}') ?? 0,
        'status': 'pending approval',
        'comments': <Record>[],
        'photos': input['photos'] ?? <String>[],
      };
      all('maintenance').insert(0, item);
      _notify(
        'A maintenance request awaits approval.',
        item['propertyId'],
        item['tenantId'],
      );
    });
  }

  Future<void> maintenanceStatus(String id, String status) async {
    require(['manager', 'owner']);
    final m = records('maintenance').where((m) => m['id'] == id).firstOrNull;
    if (m == null) throw StateError('Record not found.');
    if (role == 'owner' &&
        (!['approved', 'rejected'].contains(status) ||
            m['status'] != 'pending approval')) {
      throw StateError(
        'Only pending assigned requests can be approved or rejected.',
      );
    }
    if (![
      'pending approval',
      'approved',
      'rejected',
      'in progress',
      'completed',
    ].contains(status)) {
      throw StateError('This status change is not valid.');
    }
    await commit(() {
      m['status'] = status;
      if (status == 'completed' &&
          !all('expenses').any((e) => e['maintenanceId'] == id)) {
        all('expenses').add({
          'id': this.id('e'),
          'maintenanceId': id,
          'propertyId': m['propertyId'],
          'title': m['title'],
          'currency': m['currency'],
          'amount': m['cost'],
          'date': today(),
        });
      }
      _notify('Maintenance status: $status', m['propertyId'], m['tenantId']);
    });
  }

  Future<void> comment(String id, String text) async {
    require(['manager', 'owner', 'tenant']);
    final m = records('maintenance').where((m) => m['id'] == id).firstOrNull;
    if (m == null || text.trim().isEmpty) throw StateError('Enter a comment.');
    await commit(
      () => (m['comments'] as List).add({
        'name': user!['name'],
        'text': text.trim(),
        'date': today(),
      }),
    );
  }

  Future<void> inspect(Record input) async {
    require(['manager', 'tenant']);
    if (!canSeeProperty('${input['propertyId']}') ||
        '${input['notes'] ?? ''}'.trim().isEmpty) {
      throw StateError(
        'Choose an assigned property and enter inspection notes.',
      );
    }
    _photos(input);
    await commit(
      () => all('inspections').insert(0, {
        ...input,
        'id': id('i'),
        'tenantId': user!['id'],
        'date': today(),
        'photos': input['photos'] ?? <String>[],
      }),
    );
  }

  Map<String, num> totals([String? code]) {
    code ??= preferences['currency'];
    final books = records('bookings')
        .where((b) => currency(b) == code)
        .where((b) => !['rejected', 'cancelled'].contains(b['status']));
    final collected = records('payments')
        .where((p) => currency(p) == code)
        .where((p) => p['status'] == 'verified')
        .fold<num>(0, (s, p) => s + (p['amount'] as num));
    final expense = records('expenses')
        .where((e) => currency(e) == code)
        .fold<num>(0, (s, e) => s + (e['amount'] as num));
    final expected = books.fold<num>(0, (s, b) => s + (b['amount'] as num));
    final occupied = records('bookings')
        .where(
          (b) =>
              ['approved', 'confirmed'].contains(b['status']) &&
              b['start'].compareTo(today()) <= 0 &&
              b['end'].compareTo(today()) > 0,
        )
        .map((b) => b['unitId'])
        .toSet()
        .length;
    final units = records('units').length;
    return {
      'collected': collected,
      'expense': expense,
      'profit': collected - expense,
      'expected': expected,
      'outstanding': (expected - collected).clamp(0, double.infinity),
      'properties': properties().length,
      'units': units,
      'occupied': occupied,
      'occupancy': units == 0 ? 0 : (occupied / units * 100).round(),
      'pending': records('bookings')
          .where((b) => b['status'] == 'pending')
          .length,
    };
  }

  Future<void> reset() async {
    final accountId = user?['id'];
    state = _clone(seed);
    normalizeGlobalState(state, seed);
    normalizeHandover(state);
    if (!all('accounts').any((a) => a['id'] == accountId)) {
      session = null;
      remember = false;
    }
    await save();
    notifyListeners();
  }
}
