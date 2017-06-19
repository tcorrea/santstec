<?php
/**
 * Class LocaleHelper
 * Contains common functions used in widgets
 */
class LocaleHelper
{
    /**
     * Returns $langToLocMap array
     * @return array
     */
    public static $langToLocMap = array(
        "cs" => "cs_CZ",
        "de" => "de_DE",
        "en" => "en_US",
        "es" => "es_ES",
        "fr" => "fr_FR",
        "hu" => "hu_HU",
        "id" => "id_ID",
        "it" => "it_IT",
        "ja" => "ja_JP",
        "nb" => "nb_NO",
        "nl" => "nl_NL",
        "pl" => "pl_PL",
        "pt-br" => "pt_BR",
        "ru" => "ru_RU",
        "sk" => "sk_SK",
        "sv" => "sv_SE",
        "zh-cn" => "zh_CN",
    );

    /**
     * Returns language, defaults to self::$langToLocMap['en']
     * @return string
     */
    public static function getUnixLocale()
    {
        return self::convertUnixLocale(self::getLocale());
    }

    /**
     * Returns the systemProps locale if it's canonical else 'en'
     * @method  getCanonicalLocale
     * @return  string          canonical locale
     */
    public static function getLocale()
    {
        $locale = $GLOBALS['systemProperties']['system']['locale'];
        if ($locale) {
            return $locale;
        }
        return 'en';
    }

    /**
     * Convert a language code to a unix locale
     * @method convertUnixLocale
     * @param string $language language code
     * @return string unix locale string
     */
    public static function convertUnixLocale($language) {
        return self::$langToLocMap[$language];
    }

    public static function dirname($lang)
    {
        $parts = explode('-', strtoupper($lang));
        $parts[0] = strtolower($parts[0]);
        return implode('_', $parts);
    }
}
