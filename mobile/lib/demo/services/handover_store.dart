import 'package:intl/intl.dart';

import 'dart:convert';

import '../models/demo_record.dart';
import 'demo_store.dart';
import 'global_support.dart';

dynamic _copy(dynamic v) => jsonDecode(jsonEncode(v));
Never _fail(String message) => throw StateError(message);
String _text(dynamic v) => '${v ?? ''}'.trim();
num _number(dynamic v) {
  final n = num.tryParse('$v');
  if (n == null || !n.isFinite || n < 0) {
    _fail('Enter a non-negative demo amount or quantity.');
  }
  return n;
}

void normalizeHandover(Record state) {
  state['unitInventory'] ??= <dynamic>[];
  state['handovers'] ??= <dynamic>[];
  state['handoverPolicy'] ??= <String, dynamic>{
    'label': 'Configurable demo assumptions — client approval required',
    'ownerEditing': false,
    'valuation': 'Manual proposed charges; no automatic depreciation or liability policy.',
    'settlement': 'Deduction capped at the fictional deposit; excess shown separately. No money moved.',
  };
  for (final h in state['handovers']) {
    for (final stage in ['checkin', 'checkout']) {
      if (h[stage] != null) {
        for (final row in h[stage]['rows']) {
          row['reviewed'] ??= (h[stage]['signatures'] as Map).isNotEmpty;
        }
      }
    }
  }
  for (final p in state['properties']) {
    p['brokerIds'] ??= ['manager1'];
  }
}

extension HandoverStore on DemoStore {
  String money(dynamic value, [dynamic record]) => NumberFormat.currency(
    locale: locale,
    name: currency(record),
    symbol: currency(record),
  ).format(value);

  bool get isDemoAdmin => user?['id'] == 'manager1';
  bool managesUnit(String unitId) {
    final u = all('units').where((u) => u['id'] == unitId).firstOrNull;
    final p = u == null ? null : property(u['propertyId']);
    return role == 'manager' &&
        p != null &&
        (isDemoAdmin || (p['brokerIds'] as List).contains(user!['id']));
  }

  Future<void> assignDemoRelationships(
    String propertyId,
    String ownerId,
    List<String> brokerIds,
  ) async {
    require(['manager']);
    final p = property(propertyId);
    if (!isDemoAdmin) {
      _fail('Only the primary demo manager can change assignments.');
    }
    if (p == null ||
        !all('owners').any((o) => o['id'] == ownerId) ||
        brokerIds.isEmpty ||
        brokerIds.any(
          (id) =>
              !all('accounts')
                  .any((a) => a['id'] == id && a['role'] == 'manager'),
        )) {
      _fail('Choose an existing owner and at least one broker account.');
    }
    await commit(() {
      p['ownerId'] = ownerId;
      p['brokerIds'] = brokerIds.toSet().toList();
    });
  }

  List<Record> inventory(String unitId) {
    final u = all('units').where((u) => u['id'] == unitId).firstOrNull;
    if (u == null || !canSeeProperty(u['propertyId'])) return [];
    if (role == 'tenant' &&
        !all('bookings').any(
          (b) =>
              b['unitId'] == unitId &&
              b['tenantId'] == user!['id'] &&
              ['approved', 'confirmed'].contains(b['status']),
        )) {
      return [];
    }
    return all('unitInventory').where((i) => i['unitId'] == unitId).toList();
  }

  Future<Record> saveInventory(Record input, {String? editId}) async {
    require(['manager']);
    final old = all('unitInventory')
        .where((i) => i['id'] == editId)
        .firstOrNull;
    if (editId != null && old == null) _fail('Record not found.');
    final unitId = old?['unitId'] ?? input['unitId'];
    if (unitId == null || !managesUnit(unitId)) {
      _fail('This unit is not assigned to your broker account.');
    }
    final u = all('units').firstWhere((u) => u['id'] == unitId),
        q = _number(input['quantity']),
        v = _number(input['value']);
    final photos = input['photos'] ?? old?['photos'] ?? [];
    if (_text(input['name']).isEmpty ||
        _text(input['room']).isEmpty ||
        q < 1 ||
        q != q.round() ||
        !['good', 'worn', 'damaged'].contains(input['condition'])) {
      _fail('Enter room, item, positive whole quantity and condition.');
    }
    globalPhotos(photos);
    final i =
        old ??
        <String, dynamic>{
          'id': id('item'),
          'unitId': unitId,
          'propertyId': u['propertyId'],
        };
    await commit(() {
      i.addAll({
        'name': _text(input['name']),
        'room': _text(input['room']),
        'quantity': q,
        'value': v,
        'condition': input['condition'],
        'photos': _copy(photos),
        'currency': property(u['propertyId'])!['currency'],
      });
      if (old == null) all('unitInventory').add(i);
    });
    return i;
  }

  Future<void> deleteInventory(String itemId) async {
    final i = all('unitInventory').where((i) => i['id'] == itemId).firstOrNull;
    if (i == null || !managesUnit(i['unitId'])) {
      _fail('Record not found or not assigned.');
    }
    if (all('handovers')
        .any((h) => (h['items'] as List).any((v) => v['id'] == itemId))) {
      _fail(
        'A handover snapshot protects this item. Keep the archived baseline.',
      );
    }
    await commit(
      () => all('unitInventory').removeWhere((v) => v['id'] == itemId),
    );
  }

  List<Record> handoverList() => user == null
      ? []
      : all('handovers')
            .where(
              (h) => role == 'tenant'
                  ? h['tenantId'] == user!['id']
                  : role == 'owner'
                  ? h['ownerId'] == user!['id']
                  : isDemoAdmin || h['brokerId'] == user!['id'],
            )
            .toList();
  Record handover(String handoverId) =>
      handoverList().where((h) => h['id'] == handoverId).firstOrNull ??
      _fail('Handover not found or not assigned.');
  Future<Record> createHandover(Record input) async {
    require(['manager']);
    final b = all('bookings')
        .where((b) => b['id'] == input['bookingId'])
        .firstOrNull;
    if (b == null ||
        !['approved', 'confirmed'].contains(b['status']) ||
        !managesUnit(b['unitId'])) {
      _fail('Choose an assigned approved booking.');
    }
    if (all('handovers').any((h) => h['bookingId'] == b['id'])) {
      _fail('A paired handover already exists for this booking.');
    }
    final p = property(b['propertyId'])!,
        brokerId = input['brokerId'] ?? p['brokerIds'][0],
        items = inventory(b['unitId']);
    if (!(p['brokerIds'] as List).contains(brokerId)) {
      _fail('Choose an assigned broker.');
    }
    if (items.isEmpty) _fail('Prepare this unit inventory before check-in.');
    if (items.any((i) => i['currency'] != b['currency'])) {
      _fail(
        'Reprice inventory explicitly in the booking currency before handover.',
      );
    }
    if (![
      p['ownerId'],
      b['tenantId'],
    ].every((id) => all('accounts').any((a) => a['id'] == id))) {
      _fail('Choose owner and tenant accounts available for confirmation.');
    }
    final deposit = _number(input['deposit']),
        assumptions = _text(input['assumptions']);
    if (assumptions.isEmpty) {
      _fail('Describe the configurable demo assumptions.');
    }
    final participants = <String, dynamic>{};
    for (final person in [p['ownerId'], brokerId, b['tenantId']]) {
      participants[person] =
          all('accounts')
              .where((a) => a['id'] == person)
              .firstOrNull?['name'] ??
          all('owners').where((a) => a['id'] == person).firstOrNull?['name'] ??
          all('tenants').where((a) => a['id'] == person).firstOrNull?['name'] ??
          person;
    }
    final h = <String, dynamic>{
      'id': id('handover'),
      'bookingId': b['id'],
      'contractId':
          all('contracts')
              .where((c) => c['bookingId'] == b['id'])
              .firstOrNull?['id'] ??
          '',
      'unitId': b['unitId'],
      'propertyId': b['propertyId'],
      'propertyName': p['name'],
      'unitName': all('units')
          .firstWhere((u) => u['id'] == b['unitId'])['name'],
      'ownerId': p['ownerId'],
      'brokerId': brokerId,
      'tenantId': b['tenantId'],
      'participants': participants,
      'currency': b['currency'],
      'timeZone': b['timeZone'],
      'deposit': deposit,
      'assumptions': assumptions,
      'policy': _copy(state['handoverPolicy']),
      'items': _copy(items),
      'checkin': {
        'rows': items
            .map(
              (i) => <String, dynamic>{
                'itemId': i['id'],
                'quantity': i['quantity'],
                'condition': i['condition'],
                'notes': '',
                'photos': <dynamic>[],
                'reviewed': false,
              },
            )
            .toList(),
        'signatures': <String, dynamic>{},
      },
      'checkout': null,
      'proposal': null,
      'createdAt': DateTime.now().toUtc().toIso8601String(),
    };
    await commit(() => all('handovers').insert(0, h));
    return h;
  }

  bool stageEditor(Record h) =>
      user?['id'] == h['tenantId'] ||
      role == 'manager' && (isDemoAdmin || user!['id'] == h['brokerId']);
  Future<void> saveObservation(
    String hid,
    String stage,
    String itemId,
    Record input,
  ) async {
    final h = handover(hid), st = h[stage];
    if (!['checkin', 'checkout'].contains(stage) ||
        st == null ||
        !stageEditor(h) ||
        (st['signatures'] as Map).isNotEmpty ||
        h['settledAt'] != null) {
      _fail('This inspection is locked or not assigned.');
    }
    final baseline = (h['items'] as List)
            .where((i) => i['id'] == itemId)
            .firstOrNull,
        q = _number(input['quantity']);
    if (baseline == null ||
        q != q.round() ||
        q > baseline['quantity'] ||
        !['good', 'worn', 'damaged', 'missing'].contains(input['condition']) ||
        (q == 0) != (input['condition'] == 'missing')) {
      _fail(
        'Use a whole present quantity within the baseline; zero means missing.',
      );
    }
    final photos = input['photos'] ?? [];
    globalPhotos(photos);
    await commit(
      () =>
          ((st['rows'] as List).firstWhere(
            (r) => r['itemId'] == itemId,
          ) as Record).addAll(<String, dynamic>{
            'quantity': q,
            'condition': input['condition'],
            'notes': _text(input['notes']),
            'photos': _copy(photos),
            'reviewed': true,
          }),
    );
  }

  Future<void> signInspection(String hid, String stage, Record input) async {
    final h = handover(hid),
        st = h[stage],
        key = role == 'tenant' ? 'tenant' : 'manager';
    if (!['checkin', 'checkout'].contains(stage) ||
        st == null ||
        !stageEditor(h) ||
        h['settledAt'] != null ||
        st['signatures'][key] != null) {
      _fail('Confirmation is unavailable.');
    }
    if (key == 'manager' && user!['id'] != h['brokerId']) {
      _fail('The designated broker must confirm this inspection.');
    }
    if ((st['rows'] as List).any((r) => r['reviewed'] != true)) {
      _fail('Record every item condition before confirmation.');
    }
    if (input['accepted'] != true || _text(input['name']) != user!['name']) {
      _fail('Type your account name and acknowledge a simulated signature.');
    }
    await commit(
      () => st['signatures'][key] = {
        'accountId': user!['id'],
        'name': user!['name'],
        'at': DateTime.now().toUtc().toIso8601String(),
        'simulated': true,
      },
    );
  }

  Future<void> beginCheckout(String hid) async {
    final h = handover(hid);
    if (role != 'manager' ||
        !stageEditor(h) ||
        h['checkout'] != null ||
        h['checkin']['signatures']['tenant'] == null ||
        h['checkin']['signatures']['manager'] == null) {
      _fail('Both check-in confirmations are required before check-out.');
    }
    await commit(
      () => h['checkout'] = {
        'rows': (h['checkin']['rows'] as List)
            .map(
              (r) => <String, dynamic>{
                ...Map<String, dynamic>.from(r),
                'notes': '',
                'photos': <dynamic>[],
                'reviewed': false,
              },
            )
            .toList(),
        'signatures': <String, dynamic>{},
        'startedAt': DateTime.now().toUtc().toIso8601String(),
      },
    );
  }

  List<Record> comparison(String hid) {
    final h = handover(hid);
    return (h['items'] as List).map((i) {
      final before = (h['checkin']['rows'] as List).firstWhere(
            (r) => r['itemId'] == i['id'],
          ),
          after = (h['checkout']?['rows'] as List?)
              ?.where((r) => r['itemId'] == i['id'])
              .firstOrNull;
      return <String, dynamic>{
        ...i as Map<String, dynamic>,
        'before': before,
        'after': after,
        'missing': after == null
            ? 0
            : ((before['quantity'] as num) - (after['quantity'] as num)).clamp(
                0,
                double.infinity,
              ),
        'changed':
            after != null &&
            (before['quantity'] != after['quantity'] ||
                before['condition'] != after['condition']),
        'charge': h['proposal']?['charges']?[i['id']] ?? 0,
      };
    }).toList();
  }

  Future<void> proposeSettlement(String hid, Record input) async {
    final h = handover(hid);
    if (role != 'manager' ||
        !stageEditor(h) ||
        h['settledAt'] != null ||
        h['checkout']?['signatures']['tenant'] == null ||
        h['checkout']?['signatures']['manager'] == null) {
      _fail(
        'Both check-out confirmations are required before proposing settlement.',
      );
    }
    final charges = <String, dynamic>{};
    num total = 0;
    for (final i in comparison(hid)) {
      final charge = _number(input['charges']?[i['id']] ?? 0);
      if (charge > 0 && i['changed'] != true) {
        _fail('Only changed or missing items may have a proposed charge.');
      }
      charges[i['id']] = charge;
      total += charge;
    }
    if (_text(input['notes']).isEmpty) {
      _fail('Explain proposed charges and demo assumptions.');
    }
    final deposit = h['deposit'] as num;
    await commit(
      () => h['proposal'] = {
        'charges': charges,
        'total': total,
        'deduction': total > deposit ? deposit : total,
        'refund': (deposit - total).clamp(0, double.infinity),
        'excess': (total - deposit).clamp(0, double.infinity),
        'notes': _text(input['notes']),
        'reviews': <String, dynamic>{},
        'at': DateTime.now().toUtc().toIso8601String(),
        'revision': (h['proposal']?['revision'] ?? 0) + 1,
      },
    );
  }

  Future<void> reviewSettlement(String hid, Record input) async {
    final h = handover(hid),
        key = role == 'owner' && user!['id'] == h['ownerId']
            ? 'owner'
            : role == 'manager' && user!['id'] == h['brokerId']
            ? 'broker'
            : null;
    if (key == null ||
        h['proposal'] == null ||
        h['settledAt'] != null ||
        !['approved', 'rejected'].contains(input['decision']) ||
        _text(input['notes']).isEmpty) {
      _fail(
        'Only assigned owner and broker may review a proposal with a reason.',
      );
    }
    await commit(
      () => h['proposal']['reviews'][key] = {
        'accountId': user!['id'],
        'decision': input['decision'],
        'notes': _text(input['notes']),
        'at': DateTime.now().toUtc().toIso8601String(),
      },
    );
  }

  Future<void> settleHandover(String hid) async {
    final h = handover(hid);
    if (role != 'manager' ||
        !stageEditor(h) ||
        h['settledAt'] != null ||
        h['proposal']?['reviews']['owner']?['decision'] != 'approved' ||
        h['proposal']?['reviews']['broker']?['decision'] != 'approved') {
      _fail('Owner and broker approval are required.');
    }
    await commit(
      () => h['settledAt'] = DateTime.now().toUtc().toIso8601String(),
    );
  }
}
