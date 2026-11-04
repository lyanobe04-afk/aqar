import 'package:flutter/material.dart';

import '../../core/theme.dart';
import '../demo_store.dart';
import 'shared_header.dart';

class AqarAccountTypeLayout extends StatelessWidget {
  final DemoStore store;
  final void Function(String path, Record arguments) navigate;
  const AqarAccountTypeLayout({
    super.key,
    required this.store,
    required this.navigate,
  });
  String t(String value) => store.t(value);
  @override
  Widget build(BuildContext context) => Material(
    color: AqarColors.background,
    child: ListView(
      padding: EdgeInsets.symmetric(
        horizontal: MediaQuery.sizeOf(context).width < 600 ? 20 : 32,
        vertical: 26,
      ),
      children: [
        Center(
          child: ConstrainedBox(
            constraints: const BoxConstraints(maxWidth: 1116),
            child: LayoutBuilder(
              builder: (context, box) {
                final compact = box.maxWidth < 820;
                final roles = [
                  (
                    'manager',
                    'Property manager / broker',
                    'Manage your portfolio',
                    'Properties, bookings and handovers',
                    Icons.domain_outlined,
                  ),
                  (
                    'owner',
                    'Property owner',
                    'Follow your investments',
                    'Portfolio, income and approvals',
                    Icons.key_outlined,
                  ),
                  (
                    'tenant',
                    'Tenant',
                    'Find your next place',
                    'Bookings, payments and support',
                    Icons.home_outlined,
                  ),
                ];
                Widget roleCard(
                  (String, String, String, String, IconData) role,
                ) => Material(
                  color: Colors.white,
                  shape: RoundedRectangleBorder(
                    borderRadius: BorderRadius.circular(16),
                    side: const BorderSide(color: AqarColors.line),
                  ),
                  clipBehavior: Clip.antiAlias,
                  child: InkWell(
                    key: ValueKey('account-role-${role.$1}'),
                    onTap: () => navigate('/register', {'role': role.$1}),
                    hoverColor: const Color(0xFFF4F8FC),
                    child: Padding(
                      padding: EdgeInsets.all(compact ? 20 : 26),
                      child: compact
                          ? Row(
                              children: [
                                Container(
                                  width: 48,
                                  height: 48,
                                  decoration: BoxDecoration(
                                    color: const Color(0xFFEAF1F7),
                                    borderRadius: BorderRadius.circular(12),
                                  ),
                                  child: Icon(
                                    role.$5,
                                    size: 28,
                                    color: AqarColors.navy,
                                  ),
                                ),
                                const SizedBox(width: 16),
                                Expanded(
                                  child: Column(
                                    crossAxisAlignment:
                                        CrossAxisAlignment.start,
                                    children: [
                                      Text(
                                        t(role.$2),
                                        style: const TextStyle(
                                          fontSize: 18,
                                          fontWeight: FontWeight.w600,
                                          color: AqarColors.darkNavy,
                                          height: 1.35,
                                        ),
                                      ),
                                      const SizedBox(height: 6),
                                      Text(
                                        t(role.$3),
                                        style: const TextStyle(
                                          fontSize: 13,
                                          color: AqarColors.muted,
                                        ),
                                      ),
                                      const SizedBox(height: 6),
                                      Text(
                                        t(role.$4),
                                        style: const TextStyle(
                                          fontSize: 11,
                                          color: Color(0xFF758596),
                                          height: 1.6,
                                        ),
                                      ),
                                    ],
                                  ),
                                ),
                                const SizedBox(width: 8),
                                const Icon(
                                  Icons.arrow_forward,
                                  size: 18,
                                  color: AqarColors.navy,
                                ),
                              ],
                            )
                          : SizedBox(
                              height: 268,
                              child: Column(
                                crossAxisAlignment: CrossAxisAlignment.start,
                                children: [
                                  Container(
                                    width: 56,
                                    height: 56,
                                    decoration: BoxDecoration(
                                      color: const Color(0xFFEAF1F7),
                                      borderRadius: BorderRadius.circular(14),
                                    ),
                                    child: Icon(
                                      role.$5,
                                      size: 30,
                                      color: AqarColors.navy,
                                    ),
                                  ),
                                  const SizedBox(height: 22),
                                  SizedBox(
                                    height: 60,
                                    child: Text(
                                      t(role.$2),
                                      style: const TextStyle(
                                        fontSize: 21,
                                        fontWeight: FontWeight.w600,
                                        color: AqarColors.darkNavy,
                                        height: 1.35,
                                      ),
                                    ),
                                  ),
                                  const SizedBox(height: 6),
                                  Text(
                                    t(role.$3),
                                    style: const TextStyle(
                                      fontSize: 14,
                                      color: AqarColors.muted,
                                      height: 1.6,
                                    ),
                                  ),
                                  const SizedBox(height: 9),
                                  Text(
                                    t(role.$4),
                                    style: const TextStyle(
                                      fontSize: 11,
                                      color: Color(0xFF758596),
                                      height: 1.6,
                                    ),
                                  ),
                                  const Spacer(),
                                  Row(
                                    mainAxisAlignment:
                                        MainAxisAlignment.spaceBetween,
                                    children: [
                                      Text(
                                        t('Continue'),
                                        style: const TextStyle(
                                          fontSize: 12,
                                          fontWeight: FontWeight.w600,
                                          color: AqarColors.navy,
                                        ),
                                      ),
                                      const Icon(
                                        Icons.arrow_forward,
                                        size: 20,
                                        color: AqarColors.navy,
                                      ),
                                    ],
                                  ),
                                ],
                              ),
                            ),
                    ),
                  ),
                );
                return Column(
                  crossAxisAlignment: CrossAxisAlignment.stretch,
                  children: [
                    Row(
                      mainAxisAlignment: MainAxisAlignment.spaceBetween,
                      children: [
                        Expanded(
                          child: Align(
                            alignment: AlignmentDirectional.centerStart,
                            child: TextButton(
                              onPressed: () => navigate('/welcome', {}),
                              child: const FittedBox(
                                fit: BoxFit.scaleDown,
                                child: Text(
                                  'Aqar · عقار',
                                  style: TextStyle(
                                    fontSize: 25,
                                    fontWeight: FontWeight.w700,
                                    color: AqarColors.navy,
                                  ),
                                ),
                              ),
                            ),
                          ),
                        ),
                        AqarHeaderActions(
                          store: store,
                          signedIn: false,
                          onProfile: () {},
                          onNotifications: () {},
                          onLogout: () async {},
                          onRead: (_) async {},
                        ),
                      ],
                    ),
                    const SizedBox(height: 20),
                    const Divider(height: 1),
                    Padding(
                      padding: EdgeInsets.symmetric(
                        vertical: compact ? 30 : 40,
                      ),
                      child: Column(
                        crossAxisAlignment: compact
                            ? CrossAxisAlignment.start
                            : CrossAxisAlignment.center,
                        children: [
                          Text(
                            t('YOUR PROPERTY WORKSPACE'),
                            style: const TextStyle(
                              fontSize: 10,
                              color: AqarColors.emerald,
                              fontWeight: FontWeight.w600,
                              letterSpacing: 1.2,
                            ),
                          ),
                          const SizedBox(height: 12),
                          Text(
                            t('How will you use Aqar?'),
                            textAlign: compact
                                ? TextAlign.start
                                : TextAlign.center,
                            style: TextStyle(
                              fontSize: compact ? 30 : 40,
                              fontWeight: FontWeight.w600,
                              color: AqarColors.darkNavy,
                              height: 1.2,
                              letterSpacing: -.6,
                            ),
                          ),
                          const SizedBox(height: 14),
                          Text(
                            t('Choose the workspace that fits your role.'),
                            style: const TextStyle(
                              fontSize: 14,
                              color: AqarColors.muted,
                              height: 1.7,
                            ),
                          ),
                        ],
                      ),
                    ),
                    if (compact) ...[
                      for (final role in roles)
                        Padding(
                          padding: const EdgeInsets.only(bottom: 14),
                          child: roleCard(role),
                        ),
                    ] else
                      Row(
                        crossAxisAlignment: CrossAxisAlignment.start,
                        children: [
                          for (var i = 0; i < roles.length; i++) ...[
                            if (i > 0) const SizedBox(width: 20),
                            Expanded(child: roleCard(roles[i])),
                          ],
                        ],
                      ),
                    const SizedBox(height: 24),
                    Wrap(
                      alignment: WrapAlignment.center,
                      crossAxisAlignment: WrapCrossAlignment.center,
                      children: [
                        Text(
                          t('Already a member?'),
                          style: const TextStyle(
                            color: AqarColors.muted,
                            fontSize: 13,
                          ),
                        ),
                        TextButton(
                          onPressed: () => navigate('/login', {}),
                          child: Text(t('Sign in')),
                        ),
                      ],
                    ),
                    const SizedBox(height: 8),
                    Text(
                      t('Local preview. No real transactions.'),
                      textAlign: TextAlign.center,
                      style: const TextStyle(
                        fontSize: 10,
                        color: Color(0xFF7B8B9A),
                      ),
                    ),
                  ],
                );
              },
            ),
          ),
        ),
      ],
    ),
  );
}
