import 'package:flutter/material.dart';
import 'package:flutter_test/flutter_test.dart';
import 'package:aqar_mobile/demo/widgets/shared_header.dart';

void main() {
  Widget app(int count, {bool reduced = false}) => MaterialApp(
    home: MediaQuery(
      data: MediaQueryData(disableAnimations: reduced),
      child: Scaffold(body: AqarUnreadBell(unread: count)),
    ),
  );
  testWidgets('ring and halo repeat while unread and stop at zero', (
    tester,
  ) async {
    await tester.pumpWidget(app(2));
    await tester.pump(const Duration(milliseconds: 120));
    final first = tester
        .widget<Transform>(find.byKey(const Key('unread-bell-ring')))
        .transform
        .storage[1];
    expect(first.abs(), greaterThan(.01));
    expect(find.byKey(const Key('unread-bell-halo')), findsOneWidget);
    await tester.pump(const Duration(milliseconds: 2800));
    expect(
      tester
          .widget<Transform>(find.byKey(const Key('unread-bell-ring')))
          .transform
          .storage[1],
      closeTo(first, .001),
    );
    await tester.pumpWidget(app(0));
    await tester.pumpAndSettle();
    expect(find.byKey(const Key('unread-bell-halo')), findsNothing);
    expect(
      tester
          .widget<Transform>(find.byKey(const Key('unread-bell-ring')))
          .transform
          .storage[1],
      0,
    );
  });
  testWidgets('reduced motion keeps bell stationary while the halo fades', (
    tester,
  ) async {
    await tester.pumpWidget(app(3, reduced: true));
    final initial =
        (tester
                    .widget<DecoratedBox>(
                      find.byKey(const Key('unread-bell-halo')),
                    )
                    .decoration
                as BoxDecoration)
            .color;
    await tester.pump(const Duration(milliseconds: 900));
    expect(
      (tester
                  .widget<DecoratedBox>(
                    find.byKey(const Key('unread-bell-halo')),
                  )
                  .decoration
              as BoxDecoration)
          .color,
      isNot(initial),
    );
    expect(find.byKey(const Key('unread-bell-halo')), findsOneWidget);
    expect(
      tester
          .widget<Transform>(find.byKey(const Key('unread-bell-ring')))
          .transform
          .storage[1],
      0,
    );
    await tester.pumpWidget(app(0));
    await tester.pumpAndSettle();
  });
}
