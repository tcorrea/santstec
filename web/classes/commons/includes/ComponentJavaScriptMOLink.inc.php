<?php
require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR . 'LocaleHelper.php');
$langDir = LocaleHelper::dirname($_SERVER['HTTP_YOLA_LOCALE']);
$moFile = "/locale/$langDir/LC_MESSAGES/javascript.mo";

if (file_exists('..' . $moFile)) {
    // remove trailing '/dialog/SomeWidget.php'
    $requestParts = array_slice(explode('/', $_SERVER['REQUEST_URI']), 0, -2);
    $moPath = implode('/', $requestParts) . $moFile;

    printf('<link rel="gettext" href="%s" type="application/x-mo" />', $moPath);
}
