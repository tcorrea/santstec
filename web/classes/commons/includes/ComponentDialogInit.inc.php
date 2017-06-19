<?php
  $locale = $_SERVER['HTTP_YOLA_LOCALE'];
  $category = LC_ALL;

  require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . "LocaleHelper.php");

  $locale = LocaleHelper::convertUnixLocale($locale) . ".UTF-8";

  putenv("LC_ALL=${locale}");
  setlocale($category, $locale);
  bindtextdomain("messages", "../locale");
  textdomain("messages");

  # Set content-type and charset headers based on file type
  header("Content-type: text/html; charset=utf-8");
  # Set the locale in a header (for debugging purposes).
  header("Yola-Locale: ${locale}");
?>
