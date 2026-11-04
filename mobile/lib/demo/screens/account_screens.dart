part of '../interactive_page.dart';

extension _AccountScreens on _InteractivePageState {
  Widget auth() {
    if (['/welcome', '/onboarding', '/account-type'].contains(path)) {
      return AqarWelcomeLayout(
        store: s,
        choosingRole: path == '/account-type',
        navigate: (target, args) => go(target, arguments: args),
      );
    }
    if (path == '/session-expired') {
      return pageView('Session expired', [
        Text(t('Your demo session has ended. No records were removed.')),
        actions([
          action(
            'Sign in again',
            () => go('/login', reset: true),
            primary: true,
          ),
        ]),
      ]);
    }
    final login = path == '/login',
        register = path == '/register',
        forgot = path == '/forgot-password';
    final title = login
        ? 'Welcome back'
        : register
        ? 'Create demo account'
        : forgot
        ? 'Forgot password'
        : 'Reset password';
    final fields = <Widget>[
      if (!login)
        banner(
          login
              ? 'Demo authentication · Not secure production authentication'
              : forgot
              ? 'This demonstration sends no email or SMS.'
              : register
              ? 'Use fictional information and a demo-only password.'
              : 'Demo reset only · No email verification or secure recovery',
        ),
      if (register) ...[
        field(values, 'name', 'Full name'),
        field(values, 'country', 'Country', choices: countryChoices),
        field(values, 'phoneCode', 'Phone country code'),
      ],
      field(values, 'email', 'Email', type: 'email'),
      if (register)
        field(
          values,
          'role',
          'Account type',
          choices: [
            ('manager', t('Property manager / broker')),
            ('owner', t('Property owner')),
            ('tenant', t('Tenant')),
          ],
        ),
      if (!forgot)
        field(
          values,
          'password',
          login ? 'Password' : 'New demo password',
          secret: true,
        ),
      if (!login && !forgot)
        field(values, 'confirm', 'Confirm password', secret: true),
      if (login)
        CheckboxListTile(
          dense: true,
          controlAffinity: ListTileControlAffinity.leading,
          visualDensity: VisualDensity.compact,
          contentPadding: EdgeInsets.zero,
          value: remember,
          onChanged: (v) => redraw(() => remember = v ?? false),
          title: Text(t('Remember me'), style: const TextStyle(fontSize: 12)),
        ),
      action(
        login
            ? 'Sign in to demo'
            : register
            ? 'Register demo account'
            : forgot
            ? 'Continue to demo reset'
            : 'Reset demo password',
        () {
          if (!formKey.currentState!.validate()) return;
          run(() async {
            if (login) {
              await s.login(
                values['email'],
                values['password'],
                rememberMe: remember,
              );
              if (mounted) go(home, reset: true);
            } else if (register) {
              await s.register(values);
              await s.login(values['email'], values['password']);
              if (mounted) go(home, reset: true);
            } else if (forgot) {
              if (!s
                  .all('accounts')
                  .any(
                    (a) =>
                        a['email'].toString().toLowerCase() ==
                        values['email'].toString().toLowerCase(),
                  )) {
                throw StateError('Demo account not found.');
              }
              if (mounted) {
                go('/reset-password', arguments: {'email': values['email']});
              }
            } else {
              await s.resetPassword(
                values['email'],
                values['password'],
                values['confirm'],
              );
              if (mounted) go('/login', reset: true);
            }
          }, message: '');
        },
        primary: true,
        key: const Key('auth-submit'),
      ),
    ];
    final content = <Widget>[
      Form(
        key: formKey,
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.stretch,
          children: fields,
        ),
      ),
      if (login) ...[
        Wrap(
          alignment: WrapAlignment.spaceBetween,
          spacing: 8,
          children: [
            TextButton(
              onPressed: () => go('/forgot-password'),
              child: Text(t('Forgot password?')),
            ),
            TextButton(
              onPressed: () => go('/account-type'),
              child: Text(t('Create an account')),
            ),
          ],
        ),
        const SizedBox(height: 18),
        const Divider(color: Color(0xFFEDF0F4)),
        Theme(
          data: Theme.of(context).copyWith(dividerColor: Colors.transparent),
          child: ExpansionTile(
            key: const Key('preview-access'),
            tilePadding: EdgeInsets.zero,
            title: Text(
              t('Preview access'),
              style: const TextStyle(fontSize: 11, color: AqarColors.muted),
            ),
            children: [
              Text(
                t('Local preview only. Use fictional information.'),
                style: const TextStyle(fontSize: 10, color: AqarColors.muted),
              ),
              const SizedBox(height: 8),
              ...['manager', 'owner', 'tenant'].map(
                (role) => TextButton(
                  key: ValueKey('preview-$role'),
                  onPressed: () => redraw(() {
                    values['email'] = '$role@aqar.demo';
                    values['password'] = 'Demo123!';
                  }),
                  child: Text(
                    t(
                      role == 'manager'
                          ? 'Property manager / broker'
                          : role == 'owner'
                          ? 'Property owner'
                          : 'Tenant',
                    ),
                  ),
                ),
              ),
            ],
          ),
        ),
      ] else
        TextButton(
          onPressed: () => go('/login'),
          child: Text(t('Back to login')),
        ),
    ];
    return (login || register)
        ? AqarLoginLayout(
            store: s,
            title: t(title),
            error: error == null ? null : errorBox(error!),
            children: content,
          )
        : accountFrame(title, content);
  }

  Widget accountHero({required bool compact}) => Container(
    width: double.infinity,
    height: compact ? 190 : 650,
    padding: EdgeInsets.all(compact ? 25 : 36),
    decoration: BoxDecoration(
      color: AqarColors.darkNavy,
      borderRadius: BorderRadius.circular(20),
      image: const DecorationImage(
        image: AssetImage('assets/images/dbb2a71ef1c083e218bb.jpg'),
        fit: BoxFit.cover,
        colorFilter: ColorFilter.mode(Color(0xC90F2942), BlendMode.srcATop),
      ),
    ),
    child: Column(
      crossAxisAlignment: CrossAxisAlignment.start,
      mainAxisAlignment: MainAxisAlignment.center,
      children: [
        if (!compact) ...[
          const Icon(Icons.apartment, size: 40, color: Colors.white),
          const Spacer(),
        ],
        Text(
          t('PROPERTY MANAGEMENT, SIMPLIFIED'),
          style: const TextStyle(
            fontSize: 8,
            letterSpacing: 1.6,
            fontWeight: FontWeight.w700,
            color: Color(0xFFB5DDBD),
          ),
        ),
        const SizedBox(height: 14),
        Text(
          t('Your properties.'),
          style: TextStyle(
            fontSize: compact ? 28 : 37,
            letterSpacing: -1,
            fontWeight: FontWeight.w600,
            color: Colors.white,
            height: 1.15,
          ),
        ),
        Text(
          t('One clear view.'),
          style: TextStyle(
            fontSize: compact ? 28 : 37,
            letterSpacing: -1,
            fontWeight: FontWeight.w600,
            color: const Color(0xFFB5DDBD),
            height: 1.15,
          ),
        ),
        if (!compact) ...[
          const SizedBox(height: 24),
          Text(
            t(
              'A thoughtful workspace for the places you manage, own and call home.',
            ),
            style: const TextStyle(
              fontSize: 14,
              height: 1.8,
              color: Color(0xFFE4EBF1),
            ),
          ),
          const Spacer(),
          const Icon(
            Icons.location_on_outlined,
            color: Color(0xFFB5DDBD),
            size: 20,
          ),
          const SizedBox(height: 10),
          Text(
            t('Built around the way you live.'),
            style: const TextStyle(fontSize: 12, color: Colors.white),
          ),
          const SizedBox(height: 6),
          Text(
            t('Property without borders'),
            style: const TextStyle(fontSize: 10, color: Color(0xFFC5D2DF)),
          ),
        ],
      ],
    ),
  );

  Widget accountFrame(String title, List<Widget> children) => LayoutBuilder(
    builder: (context, constraints) {
      final wide = constraints.maxWidth >= 800;
      final form = Padding(
        padding: EdgeInsets.all(wide ? 34 : 25),
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.stretch,
          children: [
            if (wide)
              Align(
                alignment: AlignmentDirectional.centerStart,
                child: Container(
                  margin: const EdgeInsets.only(bottom: 25),
                  padding: const EdgeInsets.all(13),
                  decoration: BoxDecoration(
                    color: AqarColors.tint,
                    borderRadius: BorderRadius.circular(13),
                  ),
                  child: const Icon(
                    Icons.apartment,
                    color: AqarColors.navy,
                    size: 26,
                  ),
                ),
              ),
            Text(
              t('WELCOME TO AQAR'),
              style: const TextStyle(
                fontSize: 9,
                letterSpacing: 1.8,
                fontWeight: FontWeight.w700,
                color: AqarColors.muted,
              ),
            ),
            const SizedBox(height: 14),
            Text(
              t(title),
              style: const TextStyle(
                fontSize: 29,
                fontWeight: FontWeight.w700,
                color: AqarColors.darkNavy,
                letterSpacing: -.8,
              ),
            ),
            const SizedBox(height: 10),
            Text(
              t(
                path == '/login'
                    ? 'Sign in to your property workspace.'
                    : 'Real estate, thoughtfully connected.',
              ),
              style: const TextStyle(fontSize: 12, color: AqarColors.muted),
            ),
            const SizedBox(height: 28),
            if (error != null) errorBox(error!),
            ...children,
            const SizedBox(height: 27),
            Text(
              '© ${DateTime.now().year} Aqar',
              textAlign: TextAlign.center,
              style: const TextStyle(fontSize: 10, color: AqarColors.muted),
            ),
          ],
        ),
      );
      return ListView(
        key: ValueKey(path),
        padding: EdgeInsets.all(wide ? 28 : 16),
        children: [
          Material(
            color: Colors.white,
            shape: RoundedRectangleBorder(
              borderRadius: BorderRadius.circular(22),
              side: const BorderSide(color: Color(0xFFE3E9EF)),
            ),
            clipBehavior: Clip.antiAlias,
            child: wide
                ? Row(
                    crossAxisAlignment: CrossAxisAlignment.start,
                    children: [
                      Expanded(child: accountHero(compact: false)),
                      Expanded(child: form),
                    ],
                  )
                : Column(children: [accountHero(compact: true), form]),
          ),
        ],
      );
    },
  );

  Widget profile() {
    if (path == '/profile/edit') {
      return pageView('Edit profile', [
        Form(
          key: formKey,
          child: card('Demo profile', [
            field(values, 'name', 'Full name'),
            field(values, 'phone', 'Phone', required: false),
            field(values, 'phoneCode', 'Phone country code'),
            field(values, 'country', 'Country', choices: countryChoices),
            action('Save profile', () {
              if (formKey.currentState!.validate()) {
                run(() async {
                  await s.profile(
                    values['name'],
                    values['phone'] ?? '',
                    phoneCode: values['phoneCode'],
                    country: values['country'],
                  );
                  if (mounted) go('/profile', replace: true);
                });
              }
            }, primary: true),
          ]),
        ),
      ]);
    }
    if (path == '/profile/password') {
      return pageView('Change password', [
        Form(
          key: formKey,
          child: card('Demo password', [
            field(values, 'oldPassword', 'Current password', secret: true),
            field(values, 'password', 'New demo password', secret: true),
            field(values, 'confirm', 'Confirm password', secret: true),
            action('Change demo password', () {
              if (formKey.currentState!.validate()) {
                run(
                  () => s.changePassword(
                    values['oldPassword'],
                    values['password'],
                    values['confirm'],
                  ),
                  message: 'Demo password changed.',
                );
              }
            }, primary: true),
          ]),
        ),
      ]);
    }
    return pageView('Profile', [
      card('Demo account', [
        pair('Name', s.label(s.user)),
        pair('Email', s.user!['email']),
        pair('Account type', t(s.role)),
        pair(
          'Phone',
          '${s.user!['phoneCode'] ?? s.preferences['phoneCode']} ${s.user!['phone'] ?? ''}',
        ),
        pair(
          'Country',
          s.countryName(s.user!['country'] ?? s.preferences['country']),
        ),
        actions([
          action('Edit profile', () => go('/profile/edit')),
          action('Change password', () => go('/profile/password')),
          action(
            'Logout',
            () => run(() async {
              await s.logout();
              if (mounted) go('/login', reset: true);
            }, message: ''),
          ),
        ]),
      ]),
    ]);
  }

  Widget settings() {
    final p = s.preferences;
    return pageView('Settings & preferences', [
      currencyNote(),
      Form(
        key: formKey,
        child: card('Global preferences', [
          field(values, 'country', 'Country', choices: countryChoices),
          field(
            values,
            'currency',
            'Preferred currency',
            choices: currencyChoices,
          ),
          field(
            values,
            'locale',
            'Language',
            choices: [('en', 'English'), ('ar', 'العربية')],
          ),
          field(values, 'timeZone', 'Time zone'),
          field(
            values,
            'dateFormat',
            'Date format',
            choices: [
              'yyyy-MM-dd',
              'dd/MM/yyyy',
              'MM/dd/yyyy',
            ].map((v) => (v, v)).toList(),
          ),
          field(
            values,
            'measurement',
            'Measurement units',
            choices: [('sqm', t('Square meters')), ('sqft', t('Square feet'))],
          ),
          field(values, 'phoneCode', 'Phone country code'),
          SwitchListTile(
            contentPadding: EdgeInsets.zero,
            title: Text(t('Show demo notifications')),
            value: values['notifications'] == true,
            onChanged: (v) => redraw(() => values['notifications'] = v),
          ),
          action(
            'Save settings',
            () {
              if (formKey.currentState!.validate()) {
                run(() => s.settings(preferences: {...values}));
              }
            },
            primary: true,
            key: const Key('save-global-preferences'),
          ),
        ]),
      ),
      card('Formatting preview', [
        pair('Country', s.countryName(p['country'])),
        pair('Date', s.date(s.propertyToday(null))),
        pair('Time zone', p['timeZone']),
        pair('Area', area(100)),
        pair('Phone country code', p['phoneCode']),
        pair(
          'Notification alerts',
          t(p['notifications'] == true ? 'Enabled' : 'Disabled'),
        ),
      ]),
      card('Demo lifecycle', [
        Text(
          t(
            'Reset restores the fictional seed on this device. Website and mobile changes do not synchronize.',
          ),
        ),
        actions([
          action('Reset demo data', () async {
            if (await confirm('Reset all fictional data on this device?')) {
              run(() async {
                await s.reset();
                if (mounted) {
                  if (s.user == null) {
                    go('/login', reset: true);
                  } else {
                    redraw(() => values = {...s.preferences});
                  }
                }
              });
            }
          }, danger: true),
          action(
            'Simulate session expiry',
            () => run(() async {
              await s.expire();
              if (mounted) go('/session-expired', reset: true);
            }, message: ''),
          ),
          action('Switch demo account', () => go('/login')),
        ]),
      ]),
    ]);
  }

  Widget notifications() => pageView('Notifications', [
    actions([
      action(
        'Mark all as read',
        () => run(
          () => s.commit(() {
            for (final n in s.records('notifications')) {
              n['read'] = true;
            }
          }),
        ),
      ),
    ]),
    if (s.records('notifications').isEmpty) empty(),
    ...s
        .records('notifications')
        .map(
          (n) => card(n['read'] == true ? 'Read' : 'Unread', [
            Text(t(n['title'])),
            actions([
              action(
                'Mark as read',
                () => run(() => s.commit(() => n['read'] = true)),
              ),
            ]),
          ]),
        ),
  ]);
}
