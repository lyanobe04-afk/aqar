import 'dart:math' as math;

import 'package:flutter/material.dart';

import '../../core/theme.dart';
import '../demo_store.dart';

/// Compact role-independent controls. Material menus supply focus traversal,
/// Escape dismissal, outside-tap dismissal and viewport-constrained placement.
class AqarHeaderActions extends StatefulWidget {
  final DemoStore store;
  final bool signedIn;
  final VoidCallback onProfile, onNotifications;
  final Future<void> Function() onLogout;
  final Future<void> Function(String) onRead;
  const AqarHeaderActions({
    super.key,
    required this.store,
    required this.signedIn,
    required this.onProfile,
    required this.onNotifications,
    required this.onLogout,
    required this.onRead,
  });
  @override
  State<AqarHeaderActions> createState() => _AqarHeaderActionsState();
}

class _AqarHeaderActionsState extends State<AqarHeaderActions> {
  final controllers = List.generate(3, (_) => MenuController());
  final focusNodes = List.generate(3, (_) => FocusNode());
  @override
  void dispose() {
    for (final node in focusNodes) {
      node.dispose();
    }
    super.dispose();
  }

  void opening(int index) {
    for (var i = 0; i < controllers.length; i++) {
      if (i != index) controllers[i].close();
    }
  }

  @override
  Widget build(BuildContext context) {
    final s = widget.store, t = s.t;
    final notifications = widget.signedIn
        ? s.records('notifications')
        : <Record>[];
    final unread = s.preferences['notifications'] == true
        ? notifications.where((n) => n['read'] != true).length
        : 0;
    Widget menu(int index, String tooltip, Widget icon, List<Widget> items) =>
        MenuAnchor(
          controller: controllers[index],
          childFocusNode: focusNodes[index],
          onOpen: () => opening(index),
          style: MenuStyle(
            backgroundColor: const WidgetStatePropertyAll(Colors.white),
            surfaceTintColor: const WidgetStatePropertyAll(Colors.transparent),
            elevation: const WidgetStatePropertyAll(8),
            padding: const WidgetStatePropertyAll(EdgeInsets.all(6)),
            shape: WidgetStatePropertyAll(
              RoundedRectangleBorder(
                borderRadius: BorderRadius.circular(14),
                side: const BorderSide(color: AqarColors.line),
              ),
            ),
          ),
          menuChildren: items,
          builder: (context, controller, child) => IconButton(
            focusNode: focusNodes[index],

            key: Key(
              [
                'header-language',
                'header-notifications',
                'header-profile',
              ][index],
            ),
            tooltip: tooltip,
            style: IconButton.styleFrom(
              minimumSize: const Size(44, 44),
              padding: const EdgeInsets.all(8),
              foregroundColor: AqarColors.navy,
              shape: RoundedRectangleBorder(
                borderRadius: BorderRadius.circular(10),
              ),
            ),
            onPressed: () {
              focusNodes[index].requestFocus();
              controller.isOpen ? controller.close() : controller.open();
            },
            icon: icon,
          ),
        );
    Widget chevron(IconData icon) => Row(
      mainAxisSize: MainAxisSize.min,
      children: [Icon(icon, size: 22), const Icon(Icons.expand_more, size: 14)],
    );
    final width = (MediaQuery.sizeOf(context).width - 44).clamp(200.0, 320.0);
    return Row(
      mainAxisSize: MainAxisSize.min,
      children: [
        menu(0, t('Language'), chevron(Icons.language), [
          for (final entry in (s.global['languages'] as Map).entries)
            MenuItemButton(
              key: Key('header-locale-${entry.key}'),
              trailingIcon: s.locale == entry.key
                  ? const Icon(Icons.check, size: 18)
                  : const SizedBox(width: 18),
              onPressed: () async {
                controllers[0].close();
                await s.settings(language: entry.key.toString());
              },
              child: SizedBox(
                width: 150,
                child: Semantics(
                  selected: s.locale == entry.key,
                  child: Text(
                    entry.value.toString(),
                    textDirection: entry.key == 'ar'
                        ? TextDirection.rtl
                        : TextDirection.ltr,
                  ),
                ),
              ),
            ),
        ]),
        if (widget.signedIn) ...[
          const SizedBox(width: 4),
          menu(
            1,
            '${t('Notifications')}${unread > 0 ? ' · $unread ${t('Unread')}' : ''}',
            Badge(
              isLabelVisible: unread > 0,
              label: Text(unread > 99 ? '99+' : '$unread'),
              backgroundColor: AqarColors.error,
              child: AqarUnreadBell(unread: unread),
            ),
            [
              SizedBox(
                width: width,
                child: Padding(
                  padding: const EdgeInsets.all(12),
                  child: Row(
                    children: [
                      Expanded(
                        child: Text(
                          t('Notifications'),
                          style: const TextStyle(fontWeight: FontWeight.w600),
                        ),
                      ),
                      Text(
                        '$unread ${t('Unread')}',
                        style: const TextStyle(
                          fontSize: 11,
                          color: AqarColors.muted,
                        ),
                      ),
                    ],
                  ),
                ),
              ),
              const Divider(height: 1),
              if (notifications.isEmpty)
                Padding(
                  padding: const EdgeInsets.all(16),
                  child: Text(t('No notifications yet')),
                ),
              for (final n in notifications.take(4))
                MenuItemButton(
                  key: Key('header-notification-${n['id']}'),
                  closeOnActivate: false,
                  onPressed: n['read'] == true
                      ? null
                      : () => widget.onRead(n['id']),
                  leadingIcon: Icon(
                    n['read'] == true ? Icons.done : Icons.circle,
                    size: n['read'] == true ? 16 : 8,
                    color: n['read'] == true
                        ? AqarColors.muted
                        : AqarColors.emerald,
                  ),
                  child: SizedBox(
                    width: width - 54,
                    child: Padding(
                      padding: const EdgeInsets.symmetric(vertical: 7),
                      child: Column(
                        crossAxisAlignment: CrossAxisAlignment.start,
                        children: [
                          Text(
                            t(n['title']),
                            maxLines: 2,
                            overflow: TextOverflow.ellipsis,
                            style: const TextStyle(
                              fontSize: 13,
                              color: AqarColors.darkNavy,
                            ),
                          ),
                          const SizedBox(height: 4),
                          Text(
                            t(n['read'] == true ? 'Read' : 'Mark as read'),
                            style: const TextStyle(
                              fontSize: 11,
                              color: AqarColors.navy,
                            ),
                          ),
                        ],
                      ),
                    ),
                  ),
                ),
              const Divider(height: 1),
              MenuItemButton(
                key: const Key('header-view-notifications'),
                onPressed: widget.onNotifications,
                trailingIcon: const Icon(Icons.arrow_forward, size: 18),
                child: Text(t('View all notifications')),
              ),
            ],
          ),
          const SizedBox(width: 4),
          menu(2, t('Account menu'), chevron(Icons.account_circle_outlined), [
            SizedBox(
              width: 220,
              child: Padding(
                padding: const EdgeInsets.all(12),
                child: Column(
                  crossAxisAlignment: CrossAxisAlignment.start,
                  children: [
                    Text(
                      s.label(s.user),
                      style: const TextStyle(fontWeight: FontWeight.w600),
                    ),
                    const SizedBox(height: 5),
                    Text(
                      t(
                        {
                          'manager': 'Property manager / broker',
                          'owner': 'Property owner',
                          'tenant': 'Tenant',
                        }[s.role]!,
                      ),
                      style: const TextStyle(
                        fontSize: 11,
                        color: AqarColors.muted,
                      ),
                    ),
                  ],
                ),
              ),
            ),
            const Divider(height: 1),
            MenuItemButton(
              key: const Key('header-view-profile'),
              leadingIcon: const Icon(Icons.person_outline, size: 20),
              onPressed: widget.onProfile,
              child: Text(t('View profile')),
            ),
            MenuItemButton(
              key: const Key('header-logout'),
              leadingIcon: const Icon(
                Icons.logout,
                size: 20,
                color: AqarColors.error,
              ),
              onPressed: widget.onLogout,
              child: Text(
                t('Log out'),
                style: const TextStyle(color: AqarColors.error),
              ),
            ),
          ]),
        ],
        const SizedBox(width: 12),
      ],
    );
  }
}

/// Repeating unread ring and halo, with no layout movement or flashing.
class AqarUnreadBell extends StatefulWidget {
  final int unread;
  const AqarUnreadBell({super.key, required this.unread});
  @override
  State<AqarUnreadBell> createState() => _AqarUnreadBellState();
}

class _AqarUnreadBellState extends State<AqarUnreadBell>
    with SingleTickerProviderStateMixin {
  late final AnimationController motion = AnimationController(
    vsync: this,
    duration: const Duration(milliseconds: 2800),
  );
  void syncMotion() {
    final animate = widget.unread > 0 && TickerMode.valuesOf(context).enabled;
    if (animate) {
      if (!motion.isAnimating) motion.repeat();
    } else {
      motion.stop();
      motion.value = 0;
    }
  }

  @override
  void didChangeDependencies() {
    super.didChangeDependencies();
    syncMotion();
  }

  @override
  void didUpdateWidget(covariant AqarUnreadBell oldWidget) {
    super.didUpdateWidget(oldWidget);
    syncMotion();
  }

  @override
  void dispose() {
    motion.dispose();
    super.dispose();
  }

  @override
  Widget build(BuildContext context) => AnimatedBuilder(
    animation: motion,
    child: const Icon(Icons.notifications_outlined, size: 22),
    builder: (context, icon) {
      final progress = motion.value;
      final reduced = MediaQuery.disableAnimationsOf(context);
      final pulse = (1 - math.cos(progress * math.pi * 2)) / 2;
      final angle = !reduced && progress < .35
          ? math.sin(progress / .35 * math.pi * 6) * .32 * (1 - progress / .35)
          : 0.0;
      return SizedBox(
        width: 22,
        height: 22,
        child: Stack(
          clipBehavior: Clip.none,
          alignment: Alignment.center,
          children: [
            if (widget.unread > 0)
              Positioned(
                left: -7,
                top: -7,
                width: 36,
                height: 36,
                child: Transform.scale(
                  scale: reduced ? 1 : .85 + .35 * pulse,
                  child: DecoratedBox(
                    key: const Key('unread-bell-halo'),
                    decoration: BoxDecoration(
                      shape: BoxShape.circle,
                      color: AqarColors.navy.withValues(
                        alpha: .06 + .04 * pulse,
                      ),
                      boxShadow: [
                        BoxShadow(
                          color: AqarColors.navy.withValues(
                            alpha: .12 + .08 * pulse,
                          ),
                          blurRadius: reduced ? 12 : 6 + 8 * pulse,
                          spreadRadius: reduced ? 2 : 1 + 3 * pulse,
                        ),
                      ],
                    ),
                  ),
                ),
              ),
            Transform.translate(
              offset: Offset(
                0,
                !reduced && progress < .35
                    ? -math.sin(progress / .35 * math.pi) * 2
                    : 0,
              ),
              child: Transform.rotate(
                key: const Key('unread-bell-ring'),
                angle: angle,
                alignment: const Alignment(0, -.7),
                child: icon,
              ),
            ),
          ],
        ),
      );
    },
  );
}
