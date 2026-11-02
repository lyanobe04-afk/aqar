import 'package:flutter/material.dart';

abstract final class AqarColors {
  static const navy = Color(0xFF1F4E78);
  static const darkNavy = Color(0xFF0F2942);
  static const emerald = Color(0xFF2E7D32);
  static const background = Color(0xFFF4F6F9);
  static const warning = Color(0xFFD35400);
  static const error = Color(0xFFC0392B);
  static const success = Color(0xFF27AE60);
  static const ink = Color(0xFF1F2937);
  static const muted = Color(0xFF526172);
  static const line = Color(0xFFD8E0E8);
  static const tint = Color(0xFFEAF0F5);
}

ThemeData aqarTheme() => ThemeData(
  useMaterial3: true,
  fontFamily: 'Inter',
  fontFamilyFallback: const ['IBM Plex Sans Arabic'],
  scaffoldBackgroundColor: AqarColors.background,
  colorScheme: ColorScheme.fromSeed(
    seedColor: AqarColors.navy,
    primary: AqarColors.navy,
    secondary: AqarColors.emerald,
    error: AqarColors.error,
    surface: Colors.white,
  ),
  appBarTheme: const AppBarTheme(
    backgroundColor: Colors.white,
    foregroundColor: AqarColors.darkNavy,
    surfaceTintColor: Colors.transparent,
    centerTitle: false,
    titleTextStyle: TextStyle(
      fontFamily: 'Inter',
      fontFamilyFallback: ['IBM Plex Sans Arabic'],
      fontSize: 17,
      fontWeight: FontWeight.w600,
      color: AqarColors.darkNavy,
    ),
  ),
  textTheme: const TextTheme(
    headlineMedium: TextStyle(
      fontSize: 27,
      fontWeight: FontWeight.w700,
      color: AqarColors.ink,
      height: 1.2,
    ),
    titleLarge: TextStyle(
      fontSize: 19,
      fontWeight: FontWeight.w700,
      color: AqarColors.ink,
    ),
    titleMedium: TextStyle(
      fontSize: 16,
      fontWeight: FontWeight.w600,
      color: AqarColors.ink,
    ),
    bodyMedium: TextStyle(fontSize: 13, height: 1.5, color: AqarColors.muted),
    bodySmall: TextStyle(fontSize: 12, height: 1.5, color: AqarColors.muted),
  ),
  inputDecorationTheme: InputDecorationTheme(
    filled: true,
    fillColor: Colors.white,
    contentPadding: const EdgeInsets.symmetric(horizontal: 14, vertical: 13),
    labelStyle: const TextStyle(fontSize: 13, color: AqarColors.muted),
    floatingLabelStyle: const TextStyle(
      fontSize: 12,
      color: AqarColors.navy,
      fontWeight: FontWeight.w600,
    ),
    errorMaxLines: 3,
    border: OutlineInputBorder(
      borderRadius: BorderRadius.circular(9),
      borderSide: const BorderSide(color: Color(0xFFA2B1BF)),
    ),
    enabledBorder: OutlineInputBorder(
      borderRadius: BorderRadius.circular(9),
      borderSide: const BorderSide(color: Color(0xFFA2B1BF)),
    ),
    focusedBorder: OutlineInputBorder(
      borderRadius: BorderRadius.circular(9),
      borderSide: const BorderSide(color: AqarColors.navy, width: 2),
    ),
  ),
  filledButtonTheme: FilledButtonThemeData(
    style: FilledButton.styleFrom(
      padding: const EdgeInsets.symmetric(horizontal: 18, vertical: 14),
      minimumSize: const Size(44, 44),
      textStyle: const TextStyle(fontSize: 13, fontWeight: FontWeight.w600),
      shape: RoundedRectangleBorder(borderRadius: BorderRadius.circular(9)),
    ),
  ),
  outlinedButtonTheme: OutlinedButtonThemeData(
    style: OutlinedButton.styleFrom(
      padding: const EdgeInsets.symmetric(horizontal: 16, vertical: 14),
      foregroundColor: AqarColors.navy,
      minimumSize: const Size(44, 44),
      textStyle: const TextStyle(fontSize: 13, fontWeight: FontWeight.w600),
      side: const BorderSide(color: AqarColors.line),
      shape: RoundedRectangleBorder(borderRadius: BorderRadius.circular(9)),
    ),
  ),
  textButtonTheme: TextButtonThemeData(
    style: TextButton.styleFrom(
      minimumSize: const Size(44, 44),
      textStyle: const TextStyle(fontSize: 13, fontWeight: FontWeight.w600),
    ),
  ),
  dialogTheme: DialogThemeData(
    backgroundColor: Colors.white,
    surfaceTintColor: Colors.transparent,
    shape: RoundedRectangleBorder(borderRadius: BorderRadius.circular(18)),
    titleTextStyle: const TextStyle(
      fontFamily: 'Inter',
      fontFamilyFallback: ['IBM Plex Sans Arabic'],
      fontSize: 21,
      fontWeight: FontWeight.w600,
      color: AqarColors.darkNavy,
    ),
    actionsPadding: const EdgeInsets.fromLTRB(20, 8, 20, 18),
  ),
  dividerTheme: const DividerThemeData(
    color: AqarColors.line,
    space: 24,
    thickness: 1,
  ),
  navigationBarTheme: const NavigationBarThemeData(
    backgroundColor: Colors.white,
    indicatorColor: AqarColors.tint,
    labelTextStyle: WidgetStatePropertyAll(
      TextStyle(fontSize: 11, fontWeight: FontWeight.w600),
    ),
  ),
);
