<?php
require_once(_ENV_PROJECT_BASE . '/classes/commons/includes/Router.php');

function getBaseURI() {
    $router = new Router();
    return $router->parent . '/';
}


function endsWith($haystack, $needle) {
    $length = strlen($needle);
    if ($length == 0) {
        return true;
    }

    return (substr($haystack, -$length) === $needle);
}


function getCurrentPageName() {
    $router = new Router();
    return $router->page;
}


/**
 * return the string path to use to include a php definitions file from a url
 * @return string
 * @param $modeString This param should basically map to the requested _SYSTEM_MODE -> $modeString values
 */
function getDefinitionsPath($modeString) {
    $currentPageParts = explode('/', $_SERVER['REQUEST_URI']);

    for ($ii = 0; ($ii + 1) < count($currentPageParts); $ii++) {

         if (preg_match('/^[a-f0-9]{32}$/', $currentPageParts[$ii])) {
             $siteId = $currentPageParts[$ii];

             break;
         }
    }

    $currentPage = getCurrentPageName();

    $include = 'http://' . $_SERVER['HTTP_HOST'] . '/rest/definitions'
            . '/' . $modeString
            . '/' . $siteId
            . '/' . rawurlencode($currentPage);

    return $include;

}

function threeOhOne($redirect) {
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . $redirect);

    exit(0);
}

function threeOhTwo($redirect) {
    header('HTTP/1.1 302 Found');
    header('Location: ' . $redirect);

    exit(0);
}

/**
 *  replacement for the official basename() function that breaks on certain utf8 characters
 */
function getBaseName($path, $suffix=null) {
    $baseNameVal = array_pop(explode('/', $path));

    if ($suffix) {
        if (strpos($baseNameVal, $suffix) !== false) {
            $baseNameVal = str_replace($suffix, '', $baseNameVal);
        }
    }

    return $baseNameVal;
}

function exception_error_handler($errno, $errstr, $errfile, $errline) {
    throw new ErrorException($errstr, 0, $errno, $errfile, $errline);
}

function stripslashes_array(&$arr)
{
    if (!get_magic_quotes_gpc()) {
        return;
    }
    foreach ($arr as $key => &$val) {
        $new_key = stripslashes($key);
        if ($new_key != $key) {
            $arr[$new_key] = &$val;
            unset($arr[$key]);
        }
        if (is_array($val)) {
            stripslashes_array($val);
        } else {
            $arr[$new_key] = stripslashes($val);
        }
    }
}

?>
