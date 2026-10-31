import 'package:flutter/material.dart';

import '../core/theme.dart';

void showDemoNotice(BuildContext context, String action) => showDialog<void>(
  context: context,
  builder: (context) => AlertDialog(
    icon: const Icon(Icons.info_outline, color: AqarColors.navy),
    title: const Text('Frontend demonstration'),
    content: Text(
      '$action is a preview control.\n\nNo data has been saved, uploaded, sent or changed. This feature belongs to the future backend phase.',
    ),
    actions: [
      FilledButton(
        onPressed: () => Navigator.pop(context),
        child: const Text('Close'),
      ),
    ],
  ),
);

class DemoPage extends StatelessWidget {
  final String title, subtitle;
  final List<Widget> children;
  const DemoPage({
    super.key,
    required this.title,
    required this.subtitle,
    required this.children,
  });
  @override
  Widget build(BuildContext context) => ListView(
    key: ValueKey(title),
    padding: const EdgeInsets.all(20),
    children: [
      const DemoBanner(),
      const SizedBox(height: 24),
      Text(title, style: Theme.of(context).textTheme.headlineMedium),
      const SizedBox(height: 8),
      Text(subtitle),
      const SizedBox(height: 24),
      ...children,
      const SizedBox(height: 24),
    ],
  );
}

class DemoBanner extends StatelessWidget {
  const DemoBanner({super.key});
  @override
  Widget build(BuildContext context) => Container(
    padding: const EdgeInsets.all(12),
    decoration: BoxDecoration(
      color: AqarColors.tint,
      borderRadius: BorderRadius.circular(10),
    ),
    child: const Row(
      crossAxisAlignment: CrossAxisAlignment.start,
      children: [
        Icon(Icons.info_outline, size: 17, color: AqarColors.navy),
        SizedBox(width: 8),
        Expanded(
          child: Text(
            'UI DEMO · Static sample data\nChanges are not saved',
            style: TextStyle(fontSize: 11, color: AqarColors.muted),
          ),
        ),
      ],
    ),
  );
}

class SurfaceCard extends StatelessWidget {
  final Widget child;
  final EdgeInsetsGeometry padding;
  const SurfaceCard({
    super.key,
    required this.child,
    this.padding = const EdgeInsets.all(18),
  });
  @override
  Widget build(BuildContext context) => Padding(
    padding: const EdgeInsets.only(bottom: 16),
    child: Material(
      color: Colors.white,
      clipBehavior: Clip.antiAlias,
      shape: RoundedRectangleBorder(
        borderRadius: BorderRadius.circular(16),
        side: BorderSide(color: AqarColors.line.withValues(alpha: .5)),
      ),
      child: Padding(padding: padding, child: child),
    ),
  );
}

class SectionHeading extends StatelessWidget {
  final String title;
  final String? action;
  final VoidCallback? onTap;
  const SectionHeading(this.title, {super.key, this.action, this.onTap});
  @override
  Widget build(BuildContext context) => Padding(
    padding: const EdgeInsets.only(bottom: 14),
    child: Row(
      children: [
        Expanded(
          child: Text(title, style: Theme.of(context).textTheme.titleMedium),
        ),
        if (action != null)
          TextButton(
            onPressed: onTap,
            child: Text(action!, style: const TextStyle(fontSize: 11)),
          ),
      ],
    ),
  );
}

class StatusTag extends StatelessWidget {
  final String text;
  const StatusTag(this.text, {super.key});
  @override
  Widget build(BuildContext context) {
    final lower = text.toLowerCase();
    final color = lower.contains('overdue') || lower.contains('urgent')
        ? AqarColors.error
        : lower.contains('pending') ||
              lower.contains('maintenance') ||
              lower.contains('partial')
        ? AqarColors.warning
        : lower.contains('active') ||
              lower.contains('occupied') ||
              lower.contains('verified') ||
              lower.contains('available') ||
              lower.contains('approved')
        ? AqarColors.emerald
        : AqarColors.navy;
    return Container(
      padding: const EdgeInsets.symmetric(horizontal: 9, vertical: 5),
      decoration: BoxDecoration(
        color: color.withValues(alpha: .09),
        borderRadius: BorderRadius.circular(7),
      ),
      child: Text(
        text,
        style: TextStyle(
          fontSize: 10,
          fontWeight: FontWeight.w600,
          color: color,
        ),
      ),
    );
  }
}

class MetricTile extends StatelessWidget {
  final String label, value, caption;
  final IconData icon;
  final Color color;
  const MetricTile({
    super.key,
    required this.label,
    required this.value,
    required this.caption,
    required this.icon,
    this.color = AqarColors.navy,
  });
  @override
  Widget build(BuildContext context) => SurfaceCard(
    child: Column(
      crossAxisAlignment: CrossAxisAlignment.start,
      children: [
        Row(
          children: [
            Expanded(
              child: Text(label, style: Theme.of(context).textTheme.bodySmall),
            ),
            Icon(icon, size: 20, color: color),
          ],
        ),
        const SizedBox(height: 14),
        Text(
          value,
          style: TextStyle(
            fontSize: 28,
            fontWeight: FontWeight.w700,
            color: color,
          ),
        ),
        const SizedBox(height: 6),
        Text(caption, style: Theme.of(context).textTheme.bodySmall),
      ],
    ),
  );
}

class AdaptiveTiles extends StatelessWidget {
  final List<Widget> children;
  const AdaptiveTiles({super.key, required this.children});
  @override
  Widget build(BuildContext context) => LayoutBuilder(
    builder: (context, constraints) {
      final columns = constraints.maxWidth > 720
          ? 3
          : constraints.maxWidth < 300
          ? 1
          : 2;
      final width = (constraints.maxWidth - (columns - 1) * 12) / columns;
      return Wrap(
        spacing: 12,
        children: children
            .map((child) => SizedBox(width: width, child: child))
            .toList(),
      );
    },
  );
}

class InfoPair extends StatelessWidget {
  final String label, value;
  const InfoPair(this.label, this.value, {super.key});
  @override
  Widget build(BuildContext context) => Padding(
    padding: const EdgeInsets.symmetric(vertical: 9),
    child: Row(
      crossAxisAlignment: CrossAxisAlignment.start,
      children: [
        Expanded(child: Text(label)),
        const SizedBox(width: 16),
        Expanded(
          child: Text(
            value,
            textAlign: TextAlign.end,
            style: const TextStyle(
              color: AqarColors.ink,
              fontWeight: FontWeight.w600,
              fontSize: 12,
            ),
          ),
        ),
      ],
    ),
  );
}

class ImagePreview extends StatelessWidget {
  final String image;
  final String label;
  final double height;
  const ImagePreview(
    this.image, {
    super.key,
    required this.label,
    this.height = 180,
  });
  @override
  Widget build(BuildContext context) => ClipRRect(
    borderRadius: BorderRadius.circular(12),
    child: Image.asset(
      'assets/images/$image',
      height: height,
      width: double.infinity,
      fit: BoxFit.cover,
      semanticLabel: label,
      errorBuilder: (_, error, stack) => Container(
        height: height,
        color: AqarColors.tint,
        alignment: Alignment.center,
        child: const Icon(Icons.apartment, size: 48, color: AqarColors.navy),
      ),
    ),
  );
}

class ModuleShortcut extends StatelessWidget {
  final String title, subtitle, path;
  final IconData icon;
  const ModuleShortcut({
    super.key,
    required this.title,
    required this.subtitle,
    required this.path,
    required this.icon,
  });
  @override
  Widget build(BuildContext context) => ListTile(
    contentPadding: EdgeInsets.zero,
    leading: Container(
      padding: const EdgeInsets.all(10),
      decoration: BoxDecoration(
        color: AqarColors.tint,
        borderRadius: BorderRadius.circular(10),
      ),
      child: Icon(icon, color: AqarColors.navy, size: 22),
    ),
    title: Text(
      title,
      style: const TextStyle(fontSize: 13, fontWeight: FontWeight.w600),
    ),
    subtitle: Text(subtitle, style: const TextStyle(fontSize: 11)),
    trailing: const Icon(Icons.chevron_right, color: AqarColors.muted),
    onTap: () => Navigator.pushNamed(context, path),
  );
}
