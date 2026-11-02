import 'package:flutter/material.dart';

import '../../core/theme.dart';
import '../demo_store.dart';

/// Login-specific presentation; account behavior stays in the account screen.
class AqarLoginLayout extends StatelessWidget {
  final DemoStore store;
  final String title;
  final List<Widget> children;
  final Widget? error;
  const AqarLoginLayout({
    super.key,
    required this.store,
    required this.title,
    required this.children,
    this.error,
  });

  String t(String text) => store.t(text);

  Widget header() => Row(
    mainAxisAlignment: MainAxisAlignment.spaceBetween,
    children: [
      Semantics(
        label: 'Aqar',
        excludeSemantics: true,
        child: Row(
          crossAxisAlignment: CrossAxisAlignment.baseline,
          textBaseline: TextBaseline.alphabetic,
          children: [
            const Text(
              'Aqar',
              style: TextStyle(
                fontSize: 28,
                fontWeight: FontWeight.w700,
                color: AqarColors.darkNavy,
                letterSpacing: -1,
              ),
            ),
            const SizedBox(width: 12),
            const Text(
              'عقار',
              style: TextStyle(
                fontFamily: 'IBM Plex Sans Arabic',
                fontSize: 21,
                color: AqarColors.emerald,
              ),
            ),
          ],
        ),
      ),
      OutlinedButton(
        key: const Key('switch-language'),
        onPressed: () =>
            store.settings(language: store.locale == 'en' ? 'ar' : 'en'),
        style: OutlinedButton.styleFrom(
          minimumSize: const Size(0, 36),
          padding: const EdgeInsets.symmetric(horizontal: 12),
          foregroundColor: AqarColors.muted,
          textStyle: const TextStyle(fontSize: 11),
        ),
        child: Text(store.locale == 'en' ? 'العربية' : 'English'),
      ),
    ],
  );

  Widget photograph(bool compact) => Stack(
    key: const Key('login-image'),
    fit: StackFit.expand,
    children: [
      Positioned.fill(
        child: Image.asset(
          'assets/images/dbb2a71ef1c083e218bb.jpg',
          fit: BoxFit.cover,
          alignment: const Alignment(0, .12),
          semanticLabel: t('Residential architecture in Riyadh'),
        ),
      ),
      const Positioned.fill(
        child: DecoratedBox(
          decoration: BoxDecoration(
            gradient: LinearGradient(
              begin: Alignment.topCenter,
              end: Alignment.bottomCenter,
              colors: [
                Colors.transparent,
                Color(0x000F2942),
                Color(0xC70F2942),
              ],
              stops: [0, .35, 1],
            ),
          ),
        ),
      ),
      PositionedDirectional(
        start: compact ? 26 : 52,
        end: compact ? 26 : 40,
        bottom: compact ? 24 : 52,
        child: Column(
          crossAxisAlignment: CrossAxisAlignment.start,
          children: [
            Text(
              t('PROPERTY WITHOUT BORDERS'),
              style: TextStyle(
                fontSize: compact ? 8 : 10,
                letterSpacing: 1.8,
                color: Colors.white,
                fontWeight: FontWeight.w600,
              ),
            ),
            SizedBox(height: compact ? 10 : 20),
            Text(
              '${t('Remarkable places.')}\n${t('Thoughtfully managed.')}',
              style: TextStyle(
                fontSize: compact ? 28 : 44,
                height: 1.15,
                letterSpacing: store.locale == 'ar' ? 0 : -1,
                color: Colors.white,
                fontWeight: FontWeight.w500,
              ),
            ),
            if (!compact) ...[
              const SizedBox(height: 20),
              Text(
                t('A closer connection to the properties that matter.'),
                style: const TextStyle(
                  fontSize: 14,
                  height: 1.7,
                  color: Color(0xFFEEF2F5),
                ),
              ),
              const SizedBox(height: 28),
              Container(
                padding: const EdgeInsets.symmetric(
                  horizontal: 14,
                  vertical: 9,
                ),
                decoration: BoxDecoration(
                  border: Border.all(color: const Color(0x66FFFFFF)),
                  borderRadius: BorderRadius.circular(30),
                ),
                child: Text(
                  t('Al Yasmin · Riyadh'),
                  style: const TextStyle(fontSize: 11, color: Colors.white),
                ),
              ),
            ],
          ],
        ),
      ),
    ],
  );

  Widget form(BuildContext context, bool wide) => ConstrainedBox(
    constraints: const BoxConstraints(maxWidth: 390),
    child: Theme(
      data: Theme.of(context).copyWith(
        dividerTheme: const DividerThemeData(
          color: AqarColors.line,
          space: 16,
          thickness: 1,
        ),
        inputDecorationTheme: Theme.of(context).inputDecorationTheme.copyWith(
          fillColor: const Color(0xFFFBFCFD),
          contentPadding: const EdgeInsets.symmetric(
            horizontal: 14,
            vertical: 14,
          ),
        ),
        filledButtonTheme: FilledButtonThemeData(
          style: FilledButton.styleFrom(
            minimumSize: const Size(double.infinity, 48),
            shape: RoundedRectangleBorder(
              borderRadius: BorderRadius.circular(8),
            ),
            textStyle: const TextStyle(
              fontSize: 13,
              fontWeight: FontWeight.w600,
            ),
          ),
        ),
      ),
      child: Column(
        crossAxisAlignment: CrossAxisAlignment.stretch,
        mainAxisSize: MainAxisSize.min,
        children: [
          if (wide) ...[
            Text(
              t('YOUR PROPERTY WORKSPACE'),
              style: const TextStyle(
                fontSize: 9,
                letterSpacing: 1.8,
                color: Color(0xFF67816F),
                fontWeight: FontWeight.w600,
              ),
            ),
            const SizedBox(height: 14),
          ],
          Text(
            title,
            style: TextStyle(
              fontSize: wide ? 34 : 29,
              height: 1.2,
              fontWeight: FontWeight.w700,
              color: AqarColors.darkNavy,
              letterSpacing: store.locale == 'ar' ? 0 : -.8,
            ),
          ),
          const SizedBox(height: 10),
          Text(
            t('Sign in to your property workspace.'),
            style: const TextStyle(fontSize: 13, color: Color(0xFF73808F)),
          ),
          const SizedBox(height: 26),
          ?error,
          ...children,
        ],
      ),
    ),
  );

  Widget footer() => Wrap(
    alignment: WrapAlignment.spaceBetween,
    spacing: 16,
    runSpacing: 4,
    children: [
      Text(
        '© ${DateTime.now().year} Aqar',
        style: const TextStyle(fontSize: 9, color: Color(0xFF87939F)),
      ),
      Text(
        t('Real estate, thoughtfully connected.'),
        style: const TextStyle(fontSize: 9, color: Color(0xFF87939F)),
      ),
    ],
  );

  @override
  Widget build(BuildContext context) => LayoutBuilder(
    builder: (context, bounds) {
      final wide = bounds.maxWidth > 800;
      if (!wide) {
        return Material(
          color: Colors.white,
          child: SizedBox(
            height: bounds.maxHeight,
            child: SingleChildScrollView(
              key: const Key('login-scroll'),
              child: Column(
                children: [
                  SizedBox(height: 210, child: photograph(true)),
                  Padding(
                    padding: const EdgeInsets.fromLTRB(26, 23, 26, 22),
                    child: Column(
                      crossAxisAlignment: CrossAxisAlignment.stretch,
                      children: [
                        header(),
                        const SizedBox(height: 28),
                        Center(child: form(context, false)),
                        const SizedBox(height: 24),
                        footer(),
                      ],
                    ),
                  ),
                ],
              ),
            ),
          ),
        );
      }
      return SingleChildScrollView(
        key: const Key('login-scroll'),
        child: Stack(
          children: [
            PositionedDirectional(
              start: 0,
              top: 0,
              bottom: 0,
              width: bounds.maxWidth * .55,
              child: photograph(false),
            ),
            Padding(
              padding: EdgeInsetsDirectional.only(start: bounds.maxWidth * .55),
              child: Material(
                color: Colors.white,
                child: Padding(
                  padding: EdgeInsets.fromLTRB(
                    bounds.maxWidth * .04,
                    28,
                    bounds.maxWidth * .04,
                    24,
                  ),
                  child: ConstrainedBox(
                    constraints: BoxConstraints(
                      minHeight: bounds.maxHeight - 52,
                    ),
                    child: Column(
                      mainAxisAlignment: MainAxisAlignment.spaceBetween,
                      crossAxisAlignment: CrossAxisAlignment.stretch,
                      mainAxisSize: MainAxisSize.min,
                      children: [
                        header(),
                        const SizedBox(height: 28),
                        Center(child: form(context, true)),
                        const SizedBox(height: 24),
                        footer(),
                      ],
                    ),
                  ),
                ),
              ),
            ),
          ],
        ),
      );
    },
  );
}
