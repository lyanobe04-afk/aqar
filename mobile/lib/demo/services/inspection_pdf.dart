import 'dart:convert';

import 'package:flutter/services.dart';
import 'package:pdf/pdf.dart';
import 'package:pdf/widgets.dart' as pw;

import '../demo_store.dart';

Future<Uint8List> inspectionPdfBytes(DemoStore store, Record h) async {
  final latin = pw.Font.ttf(
    await rootBundle.load('assets/fonts/Inter-Regular.ttf'),
  );
  final arabic = pw.Font.ttf(
    await rootBundle.load('assets/fonts/Arabic-Regular.ttf'),
  );
  final doc = pw.Document();
  String t(String v) => store.t(v);
  final body = <pw.Widget>[];
  void text(String value, {bool heading = false}) {
    final block = pw.Padding(
      padding: const pw.EdgeInsets.only(bottom: 8),
      child: pw.Text(
        value.replaceAll(RegExp(r'[\u200e\u200f\u061c]'), ''),
        style: pw.TextStyle(
          fontSize: heading ? 15 : 10,
          color: heading ? PdfColor.fromHex('#1F4E78') : PdfColors.black,
        ),
      ),
    );
    body.add(
      pw.Directionality(
        textDirection:
            store.locale == 'ar' && RegExp(r'[\u0600-\u06ff]').hasMatch(value)
            ? pw.TextDirection.rtl
            : pw.TextDirection.ltr,
        child: block,
      ),
    );
  }

  void photos(dynamic values) {
    if (values is! List || values.isEmpty) return;
    body.add(
      pw.Wrap(
        spacing: 8,
        runSpacing: 8,
        children: values
            .map(
              (v) => pw.SizedBox(
                width: 110,
                height: 85,
                child: pw.Image(
                  pw.MemoryImage(base64Decode((v as String).split(',')[1])),
                  fit: pw.BoxFit.contain,
                ),
              ),
            )
            .toList(),
      ),
    );
  }

  text('Aqar | ${t('SAMPLE INSPECTION REPORT')}', heading: true);
  text(
    t(
      'SIMULATION ONLY — no legal signature, liability decision or money movement.',
    ),
  );
  text(
    '${h['id']}\n${h['propertyName']} · ${h['unitName']}\n${t('Booking')}: ${h['bookingId']} · ${t('Contract')}: ${h['contractId'].toString().isEmpty ? t('Booking reference only; no legal lease') : h['contractId']}\n${h['currency']} · ${h['timeZone']} · ${h['createdAt']}',
  );
  for (final key in ['owner', 'broker', 'tenant']) {
    text('${t(key)}: ${h['participants'][h['${key}Id']]}');
  }
  text(
    '${t('Configurable demo assumptions')}: ${h['assumptions']}\n${t(h['policy']['valuation'])}\n${t(h['policy']['settlement'])}',
  );
  for (final stage in ['checkin', 'checkout']) {
    text(
      t(stage == 'checkin' ? 'Check-in inspection' : 'Check-out inspection'),
      heading: true,
    );
    final st = h[stage];
    if (st == null) {
      text(t('Not started'));
      continue;
    }
    for (final i in h['items']) {
      final r = (st['rows'] as List).firstWhere((r) => r['itemId'] == i['id']);
      text('${i['room']} · ${i['name']}', heading: true);
      text(
        '${t('Baseline')}: ${i['quantity']} · ${t(i['condition'])} · ${store.money(i['value'], i['currency'])} ${t('per item')}\n${t('Observed')}: ${r['quantity']} · ${t(r['condition'])}\n${r['notes']}',
      );
      photos(i['photos']);
      photos(r['photos']);
    }
    for (final entry in (st['signatures'] as Map).entries) {
      text(
        '${t('SIMULATED SIGNATURE')} · ${t(entry.key)} · ${entry.value['name']} · ${entry.value['at']}',
      );
    }
    if ((st['signatures'] as Map).length < 2) {
      text(t('Awaiting both confirmations'));
    }
  }
  text(t('Before / after comparison'), heading: true);
  for (final i in store.comparison(h['id'])) {
    text('${i['room']} · ${i['name']}', heading: true);
    text(
      '${t('Before')}: ${i['before']['quantity']} · ${t(i['before']['condition'])}',
    );
    text(
      '${t('After')}: ${i['after'] == null ? t('Not started') : '${i['after']['quantity']} · ${t(i['after']['condition'])}'}',
    );
    text('${t('Missing quantity')}: ${i['missing']}');
    text('${t('Proposed charge')}: ${store.money(i['charge'], h['currency'])}');
  }
  final q = h['proposal'];
  if (q != null) {
    text(t('Fictional deposit settlement'), heading: true);
    text('${t('Revision')}: ${q['revision']}\n${q['notes']}');
    for (final entry in {
      'Fictional deposit': h['deposit'],
      'Proposed charges': q['total'],
      'Deposit deduction': q['deduction'],
      'Refund': q['refund'],
      'Excess (informational only)': q['excess'],
    }.entries) {
      text('${t(entry.key)}: ${store.money(entry.value, h['currency'])}');
    }
    for (final entry in (q['reviews'] as Map).entries) {
      text(
        '${t(entry.key)} · ${t(entry.value['decision'])} · ${entry.value['notes']}',
      );
      text(entry.value['at']);
    }
    text(
      h['settledAt'] == null
          ? t('Draft proposal — not finalized')
          : t('Simulated settlement'),
    );
  }
  if (h['settledAt'] != null) text(h['settledAt']);
  doc.addPage(
    pw.MultiPage(
      maxPages: 100,
      pageFormat: PdfPageFormat.a4,
      theme: pw.ThemeData.withFont(
        base: store.locale == 'ar' ? arabic : latin,
        fontFallback: [arabic, latin],
      ),
      textDirection: store.locale == 'ar'
          ? pw.TextDirection.rtl
          : pw.TextDirection.ltr,
      footer: (c) => pw.Text(
        'AQAR · SAMPLE / DEMO · ${c.pageNumber} / ${c.pagesCount}',
        style: const pw.TextStyle(fontSize: 9),
      ),
      build: (_) => body,
    ),
  );
  return doc.save();
}
