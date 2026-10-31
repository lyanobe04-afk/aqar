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
    backgroundColor: AqarColors.background,
    foregroundColor: AqarColors.darkNavy,
    surfaceTintColor: Colors.transparent,
    centerTitle: false,
  ),
  textTheme: const TextTheme(
    headlineMedium: TextStyle(
      fontSize: 27,
      fontWeight: FontWeight.w700,
      color: AqarColors.ink,
      height: 1.2,
    ),
    titleLarge: TextStyle(
      fontSize: 20,
      fontWeight: FontWeight.w700,
      color: AqarColors.ink,
    ),
    titleMedium: TextStyle(
      fontSize: 16,
      fontWeight: FontWeight.w600,
      color: AqarColors.ink,
    ),
    bodyMedium: TextStyle(fontSize: 13, height: 1.5, color: AqarColors.muted),
    bodySmall: TextStyle(fontSize: 11, height: 1.5, color: AqarColors.muted),
  ),
  inputDecorationTheme: InputDecorationTheme(
    filled: true,
    fillColor: Colors.white,
    contentPadding: const EdgeInsets.symmetric(horizontal: 16, vertical: 15),
    border: OutlineInputBorder(
      borderRadius: BorderRadius.circular(12),
      borderSide: const BorderSide(color: AqarColors.line),
    ),
    enabledBorder: OutlineInputBorder(
      borderRadius: BorderRadius.circular(12),
      borderSide: const BorderSide(color: AqarColors.line),
    ),
  ),
  filledButtonTheme: FilledButtonThemeData(
    style: FilledButton.styleFrom(
      padding: const EdgeInsets.symmetric(horizontal: 18, vertical: 14),
      shape: RoundedRectangleBorder(borderRadius: BorderRadius.circular(10)),
    ),
  ),
  outlinedButtonTheme: OutlinedButtonThemeData(
    style: OutlinedButton.styleFrom(
      padding: const EdgeInsets.symmetric(horizontal: 16, vertical: 14),
      side: const BorderSide(color: AqarColors.line),
      shape: RoundedRectangleBorder(borderRadius: BorderRadius.circular(10)),
    ),
  ),
  navigationBarTheme: const NavigationBarThemeData(
    backgroundColor: Colors.white,
    indicatorColor: AqarColors.tint,
    labelTextStyle: WidgetStatePropertyAll(
      TextStyle(fontSize: 11, fontWeight: FontWeight.w600),
    ),
  ),
);
