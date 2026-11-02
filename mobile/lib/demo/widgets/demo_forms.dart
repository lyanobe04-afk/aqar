import 'dart:convert';

import 'package:file_selector/file_selector.dart';
import 'package:flutter/foundation.dart';
import 'package:flutter/material.dart';

import '../../core/theme.dart';
import '../demo_store.dart';

/// One form rhythm across settings, property steps and dialogs. Only actual
/// fields split into columns; helper copy, media and actions retain a full row.
class DemoFormGrid extends StatelessWidget {
  final List<Widget> children;
  const DemoFormGrid({super.key, required this.children});
  @override
  Widget build(BuildContext context) => LayoutBuilder(
    builder: (context, box) {
      final wide = box.maxWidth >= 600;
      return Wrap(
        spacing: 20,
        runSpacing: 0,
        children: children
            .map(
              (child) => SizedBox(
                width: wide && child is DemoField
                    ? (box.maxWidth - 20) / 2
                    : box.maxWidth,
                child: child is ButtonStyleButton
                    ? Align(
                        alignment: AlignmentDirectional.centerStart,
                        child: child,
                      )
                    : child,
              ),
            )
            .toList(),
      );
    },
  );
}

class DemoField extends StatefulWidget {
  final DemoStore store;
  final Record values;
  final String name, label;
  final bool required, secret;
  final int lines;
  final String? type;
  final List<(String, String)>? choices;
  const DemoField({
    super.key,
    required this.store,
    required this.values,
    required this.name,
    required this.label,
    this.required = true,
    this.secret = false,
    this.lines = 1,
    this.type,
    this.choices,
  });
  @override
  State<DemoField> createState() => _DemoFieldState();
}

class _DemoFieldState extends State<DemoField> {
  bool hidden = true;
  late TextEditingController controller;
  @override
  void initState() {
    super.initState();
    controller = TextEditingController(
      text: '${widget.values[widget.name] ?? ''}',
    );
  }

  @override
  void didUpdateWidget(covariant DemoField oldWidget) {
    super.didUpdateWidget(oldWidget);
    final value = '${widget.values[widget.name] ?? ''}';
    if (controller.text != value) {
      WidgetsBinding.instance.addPostFrameCallback((_) {
        if (!mounted) return;
        final current = '${widget.values[widget.name] ?? ''}';
        if (controller.text != current) {
          controller.value = TextEditingValue(
            text: current,
            selection: TextSelection.collapsed(offset: current.length),
          );
        }
      });
    }
  }

  @override
  void dispose() {
    controller.dispose();
    super.dispose();
  }

  @override
  Widget build(BuildContext context) {
    final f = widget, s = f.store;
    final choices = f.choices;
    if (choices != null) {
      final existing = '${f.values[f.name] ?? ''}';
      final selected = choices.any((c) => c.$1 == existing)
          ? existing
          : choices.firstOrNull?.$1;
      if (selected != null && existing != selected) f.values[f.name] = selected;
      return Padding(
        padding: const EdgeInsets.only(bottom: 16),
        child: DropdownButtonFormField<String>(
          key: ValueKey('choice-${f.name}-$selected'),
          initialValue: selected,
          isExpanded: true,
          decoration: InputDecoration(labelText: s.t(f.label)),
          items: choices
              .map(
                (v) => DropdownMenuItem(
                  value: v.$1,
                  child: Text(
                    v.$2,
                    overflow: TextOverflow.ellipsis,
                    style: const TextStyle(fontSize: 13),
                  ),
                ),
              )
              .toList(),
          onChanged: (v) {
            if (v != null) f.values[f.name] = v;
          },
          validator: (v) => f.required && (v == null || v.isEmpty)
              ? s.t('Please complete the required fields correctly.')
              : null,
        ),
      );
    }
    return Padding(
      padding: const EdgeInsets.only(bottom: 16),
      child: TextFormField(
        key: ValueKey('input-${f.name}'),
        controller: controller,
        obscureText: f.secret && hidden,
        maxLines: f.secret ? 1 : f.lines,
        keyboardType: f.type == 'number'
            ? const TextInputType.numberWithOptions(decimal: true)
            : f.type == 'email'
            ? TextInputType.emailAddress
            : f.lines > 1
            ? TextInputType.multiline
            : TextInputType.text,
        decoration: InputDecoration(
          labelText: s.t(f.label),
          hintText: f.type == 'date' ? 'YYYY-MM-DD' : null,
          suffixIcon: f.secret
              ? IconButton(
                  tooltip: s.t(hidden ? 'Show password' : 'Hide'),
                  onPressed: () => setState(() => hidden = !hidden),
                  icon: Icon(
                    hidden
                        ? Icons.visibility_outlined
                        : Icons.visibility_off_outlined,
                  ),
                )
              : f.type == 'date'
              ? IconButton(
                  tooltip: s.t('Select a date range'),
                  onPressed: () async {
                    final chosen = await showDatePicker(
                      context: context,
                      initialDate:
                          DateTime.tryParse(controller.text) ??
                          DateTime.now().add(const Duration(days: 1)),
                      firstDate: DateTime(2020),
                      lastDate: DateTime(DateTime.now().year + 12),
                    );
                    if (chosen != null) {
                      controller.text = chosen.toIso8601String().substring(
                        0,
                        10,
                      );
                      f.values[f.name] = controller.text;
                    }
                  },
                  icon: const Icon(Icons.calendar_month_outlined),
                )
              : null,
        ),
        onChanged: (v) => f.values[f.name] = v,
        validator: (v) {
          if (f.required && (v == null || v.trim().isEmpty)) {
            return s.t('Please complete the required fields correctly.');
          }
          if (f.secret && (v ?? '').length < 8) {
            return s.t('Use at least 8 characters for the demo password.');
          }
          if (f.type == 'email' &&
              !RegExp(r'^\S+@\S+\.\S+$').hasMatch(v ?? '')) {
            return s.t('Enter a name and a valid email.');
          }
          if (f.type == 'number' &&
              f.required &&
              num.tryParse(v ?? '') == null) {
            return s.t('Please complete the required fields correctly.');
          }
          return null;
        },
      ),
    );
  }
}

Future<List<String>> chooseDemoPhotos() async {
  const group = XTypeGroup(
    label: 'Images',
    extensions: ['png', 'jpg', 'jpeg', 'webp'],
    mimeTypes: ['image/png', 'image/jpeg', 'image/webp'],
    uniformTypeIdentifiers: ['public.image'],
  );
  final files = await openFiles(acceptedTypeGroups: const [group]);
  if (files.length > 4) {
    throw StateError('Use up to four small PNG or JPEG photos.');
  }
  final output = <String>[];
  for (final file in files) {
    final bytes = await file.readAsBytes();
    final name = file.name.toLowerCase();
    if (bytes.length > 500000 || bytes.isEmpty) {
      throw StateError('Use up to four small PNG or JPEG photos.');
    }
    String type;
    if (bytes.length > 3 && bytes[0] == 255 && bytes[1] == 216) {
      type = 'jpeg';
    } else if (bytes.length > 8 && bytes[0] == 137 && bytes[1] == 80) {
      type = 'png';
    } else if (name.endsWith('.webp') &&
        bytes.length > 12 &&
        String.fromCharCodes(bytes.take(4)) == 'RIFF') {
      type = 'webp';
    } else {
      throw StateError('Use up to four small PNG or JPEG photos.');
    }
    output.add('data:image/$type;base64,${base64Encode(bytes)}');
  }
  return output;
}

Future<void> saveDemoText(String filename, String text) async {
  final file = XFile.fromData(
    Uint8List.fromList(utf8.encode(text)),
    mimeType: 'text/plain',
    name: filename,
  );
  if (kIsWeb) {
    await file.saveTo(filename);
    return;
  }
  final location = await getSaveLocation(suggestedName: filename);
  if (location != null) await file.saveTo(location.path);
}

class PhotoField extends StatefulWidget {
  final DemoStore store;
  final Record values;
  const PhotoField({super.key, required this.store, required this.values});
  @override
  State<PhotoField> createState() => _PhotoFieldState();
}

class _PhotoFieldState extends State<PhotoField> {
  String? error;
  @override
  Widget build(BuildContext context) => Column(
    crossAxisAlignment: CrossAxisAlignment.start,
    children: [
      OutlinedButton.icon(
        onPressed: () async {
          try {
            final files = await chooseDemoPhotos();
            if (files.isNotEmpty) widget.values['photos'] = files;
            if (mounted) setState(() => error = null);
          } catch (e) {
            if (mounted) {
              setState(
                () => error = widget.store.t(
                  e is StateError ? e.message.toString() : e.toString(),
                ),
              );
            }
          }
        },
        icon: const Icon(Icons.add_photo_alternate_outlined),
        label: Text(widget.store.t('Attach small photos')),
      ),
      const SizedBox(height: 8),
      Text(
        widget.store.t(
          'Media stays on this device. No upload service is connected.',
        ),
        style: const TextStyle(fontSize: 11),
      ),
      if (error != null)
        Text(error!, style: const TextStyle(color: AqarColors.error)),
      Wrap(
        spacing: 8,
        runSpacing: 8,
        children: ((widget.values['photos'] as List?) ?? [])
            .map(
              (p) => Padding(
                padding: const EdgeInsets.only(top: 10, bottom: 16),
                child: Image.memory(
                  base64Decode(p.toString().split(',').last),
                  width: 90,
                  height: 80,
                  fit: BoxFit.cover,
                  semanticLabel: widget.store.t('Local sample photo'),
                ),
              ),
            )
            .toList(),
      ),
    ],
  );
}

/// Content-sized responsive columns for cards and related filter fields.
class DemoResponsiveGrid extends StatelessWidget {
  final List<Widget> children;
  final double breakpoint;
  const DemoResponsiveGrid({
    super.key,
    required this.children,
    this.breakpoint = 720,
  });
  @override
  Widget build(BuildContext context) => LayoutBuilder(
    builder: (context, box) {
      final columns = box.maxWidth >= breakpoint ? 2 : 1;
      final width = (box.maxWidth - (columns - 1) * 16) / columns;
      return Wrap(
        spacing: 16,
        runSpacing: 16,
        children: [
          for (final child in children) SizedBox(width: width, child: child),
        ],
      );
    },
  );
}
