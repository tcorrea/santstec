<?php
require_once(_ENV_PROJECT_BASE . '/classes/commons/definitions/Definitions.php');
require_once(_ENV_PROJECT_BASE . '/classes/commons/config/Configuration.php');
require_once(_ENV_PROJECT_BASE . '/classes/commons/component/PageContext.class.php');
require_once(_ENV_PROJECT_BASE . '/classes/commons/includes/LocaleHelper.php');
require_once(_ENV_PROJECT_BASE . '/classes/commons/errorpage/ErrorPage.php');

if (!defined('_DEBUG')) {
    define('_DEBUG', false);
}

//Force error logging to exclude warnings, as we don't have control over all env's published to
if (_DEBUG) {
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
} else {
    error_reporting(E_ERROR);
}

global $systemProperties;

global $smarty;

if (!defined('_ENV_PROJECT_BASE')) {
    define('_ENV_PROJECT_BASE', dirName($_SERVER['SCRIPT_FILENAME']));
}
if (!defined('_ENV_COMPONENT_CLASSPATH')) {
    define('_ENV_COMPONENT_CLASSPATH', _ENV_PROJECT_BASE . '/classes/components/');
}
if (!defined('_ENV_COMMONS_CLASSPATH')) {
    define('_ENV_COMMONS_CLASSPATH', _ENV_PROJECT_BASE . '/classes/commons/');
}

require_once(_ENV_COMMONS_CLASSPATH . 'includes/Common.functions.php');

$requestParts = explode('/', $_SERVER['REQUEST_URI'], 5);

if (count($requestParts) > 3) {
    $modeString = $requestParts[2];
} else {
    $modeString = '';
}

//design time
if ($modeString === "site_design") {
    define('_SYSTEM_MODE', 'DESIGN');
    define('_MOBILE', false);
    define('_FACEBOOK', false);

    if (array_key_exists('dropping', $_GET) && $_GET['dropping'] == 'true') {
        define('_SYSTEM_ACTION', 'DROP');
    } else if (array_key_exists('refresh', $_GET) && $_GET['refresh'] == 'true') {
        define('_SYSTEM_ACTION', 'REFRESH');
    } else {
        define('_SYSTEM_ACTION', 'OPEN');
    }

//check if we are in source preview mode:
} else if ($modeString === "source_preview") {
    define('_SYSTEM_MODE', 'SOURCE_PREVIEW');
    define('_MOBILE', false);
    define('_FACEBOOK', false);

//check if we are in site preview mode:
} else if ($modeString === "site_preview") {
    define('_SYSTEM_MODE', 'PREVIEW');

    if (array_key_exists('mobile_mode', $_GET) && $_GET['mobile_mode'] == 'true') {
        define('_MOBILE', true);
    } else if (array_key_exists('facebook_mode', $_GET) && $_GET['facebook_mode'] == 'true') {
        define('_MOBILE', false);
        define('_FACEBOOK', true);
    } else {
        define('_MOBILE', false);
        define('_FACEBOOK', false);
    }

} else {
    define('_SYSTEM_MODE', 'RUN');
}

//check if this site has domain info, if so, canonize their url
if ((_SYSTEM_MODE == 'RUN')) {
    canonize(_ENV_PROJECT_BASE . DIRECTORY_SEPARATOR . 'domain.info');
}

/* * **********************************************
 * Define Class Includes
 * ********************************************** */
define('_COMP_COMPONENT_BASE', 'component' . DIRECTORY_SEPARATOR . 'ComponentBase.class.php');
define('_COMP_SUBSCRIBER', 'component' . DIRECTORY_SEPARATOR . 'Subscriber.class.php');
define('_COMP_PUBLISHER', 'component' . DIRECTORY_SEPARATOR . 'Publisher.class.php');

/* * **********************************************
 * Define Page Includes
 * ********************************************** */
define('_PAGE_SMARTYINIT', _ENV_COMMONS_CLASSPATH . 'includes' . DIRECTORY_SEPARATOR . 'SmartyInit.inc.php');

/* * **********************************************
 * Define Utils Includes
 * ********************************************** */
define('_UTILS_HTTP', 'commons' . DIRECTORY_SEPARATOR . 'lib' . DIRECTORY_SEPARATOR . 'HttpUtils.inc.php');

/* * **********************************************
 * Define Smarty Constants
 * ********************************************** */
define('_ENV_SMARTY_CACHE_PATH', _ENV_PROJECT_BASE . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . 'work' . DIRECTORY_SEPARATOR . 'templates_c');

/* * **********************************************
 * Configure Enviorment
 * ********************************************** */
set_include_path(get_include_path() . PATH_SEPARATOR . _ENV_PROJECT_BASE);

/* * **********************************************
 * Define common includes
 * ********************************************** */
require_once(_ENV_COMMONS_CLASSPATH . "lib/smarty/Smarty.class.php");

//Dont include for single component rendering
if (!defined('_SKIP_DEFINITION_INCLUDES')) {

    if (_SYSTEM_MODE != 'RUN') {
        ob_start();
        if ($_POST && $_SERVER['CONTENT_TYPE'] == 'application/json') {
            stripslashes_array($_POST);
            $defs = Definitions::parse($_POST);
            $config = new Configuration();
            $pageContext = new PageContext();
            $pageProperties = $defs->getWidgets($config, $pageContext);
            $defs->updateSystemProperties();
        } elseif (!(include_once(getDefinitionsPath($modeString)))) {
            ob_end_clean();
            fourOhFour();
        }
        ob_end_clean();
    } else {
        require_once ('definitions/site.inc.php');
        define('_WHITE_LABEL', $systemProperties['system']['isWhiteLabel']);
        //$page_inc_php = _ENV_PROJECT_BASE . '/definitions/' . getCurrentPageName() . '/page.inc.php';
        $page_inc_php = 'definitions/' . getCurrentPageName() . '/page.inc.php';


        //check if the page exists:
        if (!file_exists($page_inc_php)) {
            fourOhFour();
        }
        //require_once (_ENV_PROJECT_BASE . '/definitions/site.inc.php');
        require_once ($page_inc_php);

        if (array_key_exists("disable_mobile", $_GET)) {
            if ($_GET["disable_mobile"] == "true") {
                setMobileDisabled(true);
                define('_MOBILE', false);
            } else {
                setMobileDisabled(false);
                define('_MOBILE', displayMobile());
            }
        } else {
            define('_MOBILE', displayMobile());
        }


        if ($_SERVER['HTTP_X_FACEBOOK'] == "1" || $_GET['FACEBOOK'] == '1') {
             if (atleastSilver()) {
                define('_FACEBOOK', true);
             } else {
                fourOhFour();
             }
        } else {
            define('_FACEBOOK', false);
        }
    }

    // Setup gettext according to the site system properties
    $locale = $systemProperties['system']['locale'];
    $locale = LocaleHelper::convertUnixLocale($locale) . ".UTF-8";
    $category = LC_ALL;

    putenv("LC_ALL=${locale}");
    setlocale($category, $locale);
    textdomain("messages");

    // Call subscriber/publisher init methods
    $masterComponentList = $pageProperties['masterComponentList'];
    foreach ($masterComponentList as & $component) {
        if (is_subclass_of($component, 'Publisher')) {
            $component->publisherInit();
        }
    }

    foreach ($masterComponentList as & $component) {
        if (is_subclass_of($component, 'Subscriber')) {
            $component->subscriberInit();
        }
    }
}


/* * **********************************************
 * Util functions
 * ********************************************** */

/**
 * We need to make sure that each user site has a single canonical address and
 * that all other possible addresses 301 redirect to the canonical address.  We
 * need to establish a single convention and follow it for every site.

 * For subdomains, the canonical version should be http://subdomain.synthasite.com    (as opposed to http://www.subdomain.synthasite.com)
 * For custom domains, the canonical version should be http://www.customdomain.com   (as opposed to http://customdomain.com)
 * For both, the canonical version should be the root directory instead of /index.php   (example:  http://chris.synthasite.com/index.php should 301 redirect to http://chris.synthasite.com)
 *
 * We need to ensure that links created by the sitebuilder point to the canonical version by default.
 *
 * @todo refactor: create canonize and cononizev2 functions
 * @param string $pathToDomainInfo
 * @return void
 */
function canonize($pathToDomainInfo) {

// $host represents our most current understanding of the host we should be on.
    $host = $_SERVER['HTTP_HOST'];
    // $path represents our most current understanding of the path we should be on.
    $path = $_SERVER['REQUEST_URI'];

    // If $redirect is a non-false value, it is where we should redirect to.
    $redirect = false; // default action is nothing
    // if the site has a canonical domain specified
    $has_canonical_domain = false;

    $startswith = (substr($host, 0, 4));

    // if they have a v2 domain, we just need to do what it says
    if (file_exists($pathToDomainInfo . ".v2")) {

        $mainDomain = trim(file_get_contents($pathToDomainInfo . ".v2"));

        // Redirect only if the incoming domain is different from the
        // canonical domain
        if (strtolower($host) != strtolower($mainDomain)) {
            $host = $mainDomain;
            $redirect = "http://" . $host . $path;
        }

        //strip out the index.php from the end of the path
        $indexValues = array('/index.php', 'index.php', 'index', '/index');
        if (in_array($path, $indexValues)) {
            $path = ""; //set the path to blank incase another type of redirect is required
            $redirect = "http://" . $host;
        }

        if ($redirect) {
            threeOhOne($redirect);
        }
        // if we are on the same domain as specified by domain.info.v2 -> do nothing and skip old cononize file
    } else { // do the canonize v1 thing:
        $is_subdomain = false;
        $publishedHosts = array("synthasite.com", "synthasite.net", "yolasite.com", "yola.net");
        foreach ($publishedHosts as $publishedHost) {
            $endswith = trim((substr($host, -(strlen($publishedHost)))));
            if ((strtolower($endswith) == $publishedHost)) {
                $is_subdomain = true;
                break;
            }
        }

        // loook for domain.info
        if (file_exists($pathToDomainInfo)) {
            $mainDomain = file_get_contents($pathToDomainInfo);
            // Strip newlines, extra whitespace
            $mainDomain = trim($mainDomain);

            //SYNSYS-33

            if ($mainDomain != '') { // check there actually is a domain name
                $has_canonical_domain = true;

                // add the www. to the front of maindomain, if it isn't there already
                if (!isSubdomain($mainDomain)) {
                    if (stripos($mainDomain, "www.") !== 0) {
                        $mainDomain = "www." . $mainDomain;
                    }
                }

                // Redirect only if the incoming domain is different from the
                // canonical domain
                if (strtolower($host) != strtolower($mainDomain)) {
                    $host = $mainDomain;
                    $redirect = "http://" . $host . $path;
                }
            }
        }

        //strip out the index.php from the end of the path
        $indexValues = array('/index.php', 'index.php', 'index', '/index');
        if (in_array($path, $indexValues)) {
            $path = ""; //set the path to blank incase another type of redirect is required
            $redirect = "http://" . $host;
        }

        // If the incoming host is a subdomain, and the site doesn't have a
        // canonical domain, strip any 'www.' prefix.
        if (!$has_canonical_domain && $is_subdomain) {
            if ($startswith == "www.") {
                $redirect = "http://" . substr($host, 4) . $path;
            }
        }

        if ($redirect) {
            if (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') {
                $redirect = str_replace('http://', 'https://', $redirect);
            }
            threeOhOne($redirect);
        }
    }
}

function fourOhFour() {
    header('HTTP/1.1 404 Not Found');

    $errorpage = new ErrorPage();
    $errorpage->render();
    exit(0);
}

function setNoCacheHeaders() {
    $now = time();
    header('Date: ' . timetogmstr($now));
    header('Cache-Control: no-cache');
    header('Expires: -1');
    header('Pragma: no-cache');
}

function setCacheHeaders() {
    global $systemProperties;

    $now = time();
    header('Date: ' . timetogmstr($now));

    $lastModified = getLastModified();

    if ($lastModified != -1) {
        header('Last-Modified: ' . timetogmstr($lastModified));
    }

    $directives = array();

    $private = $systemProperties['system']['page']['protected'] == 'true';
    if ($private) {
        $directives[] = 'private';
    } else {
        $directives[] = 'public';
    }

    $uses_mobile = $systemProperties['properties']['mobile']['enabled'] == "true" && atleastSilver();
    if (_SYSTEM_MODE != 'RUN') {
        $directives[] = 'no-cache';
    } else if ($uses_mobile) {
        # We have mobile detection in our caching proxies, other proxies (e.g.
        # CloudFlare) don't.
        $directives[] = 'no-cache';
    } else {
        $directives[] = 'max-age=60';
    }

    if (!empty($directives)) {
        header('Cache-Control: ' . implode(', ', $directives));
    }
}

function checkNotModified() {

    if (_DEBUG) {
        return;
    }

    $modifiedSince = getModifiedSince();
    $lastModified = getLastModified();

    if ($modifiedSince && $lastModified <= $modifiedSince) {
        header("HTTP/1.1 304 Not Modified");
        exit(0);
    }
}

function checkPreviewAuthorization()
{
    global $systemProperties, $config;
    if (_SYSTEM_MODE != 'DESIGN' && _SYSTEM_MODE != 'RUN' && !_DEBUG) {

        $siteUserId = $systemProperties['system']['user']['id'];
        $previewNotAllowedURL = $config->sitecomponents->preview_not_allowed_url;

        if (!isset($_SERVER['REMOTE_USER']) || $siteUserId !== $_SERVER['REMOTE_USER']) {
            threeOhTwo($previewNotAllowedURL);
        }
    }
}

function checkAuthorization() {
    global $systemProperties;
    global $smarty;

    //Simple password protection
    if ((_SYSTEM_MODE == 'RUN' || _SYSTEM_MODE == 'PREVIEW') && $systemProperties['system']['page']['protected'] == 'true') {
        require_once(_ENV_COMMONS_CLASSPATH . 'protection' . DIRECTORY_SEPARATOR . 'PasswordProtection.inc.php');
    }
}

function getModifiedSince() {
    if (isset($_SERVER['HTTP_IF_MODIFIED_SINCE'])) {
        return gmstrtotime($_SERVER['HTTP_IF_MODIFIED_SINCE']);
    } else {
        return false;
    }
}

function getLastModified() {
    global $systemProperties;

    $pageLastModified = $systemProperties['system']['page']['lastModified'];
    $siteLastModified = $systemProperties['system']['site']['lastModified'];

    return max($siteLastModified, $pageLastModified);
}

function gmstrtotime($sgm) {
    $months = array(
        'Jan' => 1,
        'Feb' => 2,
        'Mar' => 3,
        'Apr' => 4,
        'May' => 5,
        'Jun' => 6,
        'Jul' => 7,
        'Aug' => 8,
        'Sep' => 9,
        'Oct' => 10,
        'Nov' => 11,
        'Dec' => 12
    );

    list($D, $d, $M, $Y, $H, $i, $s) = sscanf($sgm, "%3s, %2d %3s %4d %2d:%2d:%2d GMT");

    return gmmktime($H, $i, $s, $months[$M], $d, $Y);
}

function timetogmstr($time) {

    return gmdate("D, d M Y H:i:s", $time) . " GMT";
}

/**
 * count the number of .'s in a provided domain, if it is greater than 2, then it is a subdomain
 * @return
 * @param string $domain
 */
function isSubdomain($domain) {
//SYNSYS-33 - there are now subdomains in the domain.info file. make sure we are not dealing with a subdomain
    $chars = count_chars(strtolower($domain));
    // how many full stops are there?
    $num_periods = $chars['46'];

    if ($num_periods > 1) {
        //its a subdomain
        return true;
    } else {
        return false;
    }
}

function setMobileDisabled($disabled) {
    if ($disabled === true) {
        setcookie("mobile_disabled", "true", time() + 60 * 60 * 24 * 30);
    } else {
        setcookie("mobile_disabled", "false", 0);
    }
}

function isMobileDisabled() {
    if (array_key_exists("disable_mobile", $_GET)) {
        return $_GET["disable_mobile"] != "true";
    } else if (array_key_exists("mobile_disabled", $_COOKIE)) {
        return $_COOKIE["mobile_disabled"] == "true";
    }

    return false;
}

function displayMobile() {
    global $systemProperties;

    if ($systemProperties['properties']['mobile']['enabled'] == "true" && atleastSilver()) {
        if ($systemProperties['system']['isWhiteLabel'] === true) {
            // Include mobile detection lib
            require_once(_ENV_COMMONS_CLASSPATH . 'lib' . DIRECTORY_SEPARATOR
                         . 'mobiledetect' . DIRECTORY_SEPARATOR . 'Mobile_Detect.php');
            $detect = new Mobile_Detect;
            // Exclude tablets
            return $detect->isMobile() && !$detect->isTablet() && !isMobileDisabled();

        } else {
            return $_SERVER['HTTP_X_MOBILE'] == "1"
                && !isMobileDisabled()
                && $systemProperties['properties']['mobile']['enabled'] == "true"
                && atleastSilver();
        }
    }

    return false;
}

/**
 * @TODO: Fugly hack because we have no real concept of silver, it's implied by what features are
 * in it this week. So we are adding some tech debt... sigh
 */
function atleastSilver() {
    global $systemProperties;

    return $systemProperties['system']['purchased']['css_overrides']['enabled'];
}

?>
