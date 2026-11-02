import 'package:flutter/material.dart';

import '../../core/theme.dart';
import '../demo_store.dart';

class AqarWelcomeLayout extends StatelessWidget {
  final DemoStore store;
  final bool choosingRole;
  final void Function(String path, Record arguments) navigate;
  const AqarWelcomeLayout({
    super.key,
    required this.store,
    required this.navigate,
    this.choosingRole = false,
  });
  String t(String key) => store.t(key);
  @override
  Widget build(BuildContext context) => Material(
    color: Colors.white,
    child: ListView(
      padding: const EdgeInsets.fromLTRB(22, 22, 22, 30),
      children: [
        Center(
          child: ConstrainedBox(
            constraints: const BoxConstraints(maxWidth: 1040),
            child: Column(
              crossAxisAlignment: CrossAxisAlignment.stretch,
              children: [
                Row(
                  mainAxisAlignment: MainAxisAlignment.spaceBetween,
                  children: [
                    const Text(
                      'Aqar · عقار',
                      style: TextStyle(
                        fontSize: 24,
                        fontWeight: FontWeight.w700,
                        color: AqarColors.darkNavy,
                      ),
                    ),
                    TextButton(
                      key: const Key('switch-language'),
                      onPressed: () => store.settings(
                        language: store.locale == 'en' ? 'ar' : 'en',
                      ),
                      child: Text(store.locale == 'en' ? 'العربية' : 'English'),
                    ),
                  ],
                ),
                const SizedBox(height: 28),
                if (!choosingRole) ...[
                  ClipRRect(
                    borderRadius: BorderRadius.circular(22),
                    child: SizedBox(
                      height: MediaQuery.sizeOf(context).width < 700
                          ? 290
                          : 360,
                      child: Stack(
                        fit: StackFit.expand,
                        children: [
                          Image.asset(
                            'assets/images/dbb2a71ef1c083e218bb.jpg',
                            fit: BoxFit.cover,
                          ),
                          const DecoratedBox(
                            decoration: BoxDecoration(
                              gradient: LinearGradient(
                                begin: Alignment.topCenter,
                                end: Alignment.bottomCenter,
                                colors: [Colors.transparent, Color(0xC90F2942)],
                              ),
                            ),
                          ),
                          PositionedDirectional(
                            start: 25,
                            end: 25,
                            bottom: 26,
                            child: Column(
                              crossAxisAlignment: CrossAxisAlignment.start,
                              children: [
                                Text(
                                  t('PROPERTY WITHOUT BORDERS'),
                                  style: const TextStyle(
                                    fontSize: 9,
                                    letterSpacing: 1.5,
                                    color: Colors.white,
                                    fontWeight: FontWeight.w600,
                                  ),
                                ),
                                const SizedBox(height: 12),
                                Text(
                                  t('A world of places. One Aqar.'),
                                  style: const TextStyle(
                                    fontSize: 31,
                                    fontWeight: FontWeight.w600,
                                    height: 1.2,
                                    color: Colors.white,
                                  ),
                                ),
                                const SizedBox(height: 20),
                                FilledButton(
                                  onPressed: () =>
                                      navigate('/account-type', {}),
                                  child: Text(t('Get started')),
                                ),
                              ],
                            ),
                          ),
                        ],
                      ),
                    ),
                  ),
                  const SizedBox(height: 28),
                  Text(
                    t('Across cities. Across possibilities.'),
                    style: const TextStyle(
                      fontSize: 22,
                      fontWeight: FontWeight.w700,
                      color: AqarColors.darkNavy,
                    ),
                  ),
                  const SizedBox(height: 10),
                  Text(
                    t(
                      'Manage, own or find your next place — wherever life takes you.',
                    ),
                    style: const TextStyle(height: 1.7),
                  ),
                ] else ...[
                  Text(
                    t('How will you use Aqar?'),
                    style: const TextStyle(
                      fontSize: 29,
                      fontWeight: FontWeight.w700,
                      color: AqarColors.darkNavy,
                    ),
                  ),
                  const SizedBox(height: 10),
                  Text(t('Choose your workspace')),
                ],
                const SizedBox(height: 24),
                ...[
                  (
                    'manager',
                    'Property manager / broker',
                    'Manage your portfolio',
                    Icons.domain_outlined,
                  ),
                  (
                    'owner',
                    'Property owner',
                    'Follow your investments',
                    Icons.key_outlined,
                  ),
                  (
                    'tenant',
                    'Tenant',
                    'Find your next place',
                    Icons.home_outlined,
                  ),
                ].map(
                  (role) => Padding(
                    padding: const EdgeInsets.only(bottom: 12),
                    child: Material(
                      color: const Color(0xFFF8FAFC),
                      shape: RoundedRectangleBorder(
                        borderRadius: BorderRadius.circular(14),
                        side: const BorderSide(color: AqarColors.line),
                      ),
                      child: InkWell(
                        borderRadius: BorderRadius.circular(14),
                        onTap: () => navigate(
                          choosingRole ? '/register' : '/login',
                          {'role': role.$1},
                        ),
                        child: Padding(
                          padding: const EdgeInsets.all(19),
                          child: Row(
                            children: [
                              Container(
                                padding: const EdgeInsets.all(10),
                                decoration: BoxDecoration(
                                  color: AqarColors.tint,
                                  borderRadius: BorderRadius.circular(10),
                                ),
                                child: Icon(
                                  role.$4,
                                  size: 23,
                                  color: AqarColors.navy,
                                ),
                              ),
                              const SizedBox(width: 16),
                              Expanded(
                                child: Column(
                                  crossAxisAlignment: CrossAxisAlignment.start,
                                  children: [
                                    Text(
                                      t(role.$2),
                                      style: const TextStyle(
                                        fontWeight: FontWeight.w600,
                                        fontSize: 14,
                                        color: AqarColors.darkNavy,
                                      ),
                                    ),
                                    const SizedBox(height: 5),
                                    Text(
                                      t(role.$3),
                                      style: const TextStyle(fontSize: 12),
                                    ),
                                  ],
                                ),
                              ),
                              const SizedBox(width: 8),
                              const Icon(
                                Icons.arrow_forward_ios,
                                size: 14,
                                color: AqarColors.navy,
                              ),
                            ],
                          ),
                        ),
                      ),
                    ),
                  ),
                ),
                const SizedBox(height: 12),
                TextButton(
                  onPressed: () => navigate('/login', {}),
                  child: Text('${t('Already a member?')} ${t('Sign in')}'),
                ),
                const SizedBox(height: 18),
                Text(
                  t('Local preview. No real transactions.'),
                  textAlign: TextAlign.center,
                  style: const TextStyle(fontSize: 10, color: AqarColors.muted),
                ),
              ],
            ),
          ),
        ),
      ],
    ),
  );
}
