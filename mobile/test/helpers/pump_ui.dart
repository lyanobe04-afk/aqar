import 'package:flutter_test/flutter_test.dart';

/// Allow route/menu transitions and async UI work to complete while persistent
/// unread decoration continues running.
Future<void> pumpUi(WidgetTester tester) async {
  await tester.pump();
  await tester.pump(const Duration(milliseconds: 500));
  await tester.pump(const Duration(milliseconds: 500));
}
