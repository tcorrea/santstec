<?php

/**
 * Smarty Init - Includes new style framework
 *
 * @author Sean Nieuwoudt
 * @version 2.0
 * @copyright Yola.com
 */

require_once(_ENV_PROJECT_BASE . '/classes/commons/config/Configuration.php');
require_once(_ENV_PROJECT_BASE . '/classes/commons/includes/Common.functions.php');
require_once (_ENV_COMMONS_CLASSPATH . 'includes' . DIRECTORY_SEPARATOR . 'LocaleHelper.php');

$smarty = new Smarty();
$smarty->compile_dir = _ENV_SMARTY_CACHE_PATH;

$smarty->left_delimiter = '<%';
$smarty->right_delimiter = '%>';

$smarty->clear_all_cache(); // @TODO: Remove

//Setup smarty paths
$smarty->plugins_dir[] = _ENV_COMMONS_CLASSPATH . 'lib' . DIRECTORY_SEPARATOR . 'smarty_plugins';
$smarty->template_dir = _ENV_PROJECT_BASE;

$currentPageName = getCurrentPageName();
$currentPageName .= '.php';

if (array_key_exists('site', $systemProperties['system'])) {

    foreach ($systemProperties['system']['site']['navigation'] as &$navEntry) {

        $navEntry['isCurrent'] = $navEntry['href'] == $currentPageName;

        if (array_key_exists('children', $navEntry)) {
             foreach ($navEntry['children'] as &$subNavEntry) {
                 if ($subNavEntry['href'] == ($currentPageName)) {
                    $navEntry['isCurrent'] = true;
                    $subNavEntry['isCurrent'] = true;
                 } else {
                    $subNavEntry['isCurrent'] = false;
                 }
             }
             unset($subNavEntry);
        }
    }
    unset($navEntry);

    foreach ($systemProperties['system']['site']['navigation'] as &$navEntry) {
        $oneLevelNavEntry = $navEntry;
        unset($oneLevelNavEntry['children']);

        $systemProperties['system']['site']['primary_navigation'][] = $oneLevelNavEntry;
        $systemProperties['system']['site']['flat_navigation'][] = $oneLevelNavEntry;


        if (array_key_exists('children', $navEntry)) {
             foreach ($navEntry['children'] as &$subNavEntry) {

                 if ($subNavEntry['isCurrent'] === true) {
                    foreach ($systemProperties['system']['site']['flat_navigation'] as &$existingNavEntry) {
                        $existingNavEntry['isCurrent'] = false;
                    }
                    unset($existingNavEntry);
                 }

                 $systemProperties['system']['site']['flat_navigation'][] = $subNavEntry;

                 if ($navEntry['isCurrent'] === true) {
                    $systemProperties['system']['site']['secondary_navigation'][] = $subNavEntry;
                 }
             }
             unset($subNavEntry);
        }
    }
    unset($navEntry);
}

/*-----------------------------------------------------------------------------*
*   Code for templated menus in sitetemplates
*
*   A third loop isn't good, but until we know extent that above is used it's
*   better to avoid interferring with it. At least until we're finished the
*   conversion from in-php markup to smarty templates.
*
*   Template files are located in sitetemplates/templates/common/*
*
*   @todo Integrate below with above when conversion is complete
------------------------------------------------------------------------------*/
$navigation = $systemProperties['system']['site']['navigation'];
$navigationToJSON = array();
$filter = array('isCurrent' => '', 'class' => '');

foreach ($navigation as &$navEntry) {
    $navEntry['href'] = $navEntry['href'] == 'index.php' ? './' : $navEntry['href'];
    $navEntry['name'] = str_replace('"', '&quot;', $navEntry['name']);
    $navEntry['title'] = str_replace('"', '&quot;', $navEntry['title']);

    $navChildrenToJSON = array();

    if(!empty($navEntry['children'])) {
        foreach ($navEntry['children'] as &$navChild) {
            $navChild['name'] = str_replace('"', '&quot;', $navChild['name']);
            $navChild['title'] = str_replace('"', '&quot;', $navChild['title']);

            $navChildrenToJSON[] = array_diff_key($navChild, $filter);
        }
        unset($navChild);
    }

    $tempArray = array_diff_key($navEntry, $filter);
    $tempArray['children'] = $navChildrenToJSON;
    $navigationToJSON[] = $tempArray;

    // Pull out current $navEntry for use in SECONDARY_MENU template
    if($navEntry['isCurrent']) {
        $topLevelNavEntry = $navEntry;
    }
}
unset($navEntry);

$navigationJSON = json_encode($navigationToJSON);

$config = new Configuration();
$smarty->assign('config', $config);

$smarty->assign('navigation', $navigation);
$smarty->assign('navigationJSON', $navigationJSON);
$smarty->assign('topLevelNavEntry', $topLevelNavEntry);
// -------------------------------------------------->End menu sitetemplate code

//  Add locale
$smarty->assign('locale', LocaleHelper::getLocale());

// Assign whether a user has at least silver
$smarty->assign('atleastSilver', atleastSilver());

function siteLocationEnabled() {
    if (array_key_exists('site_location_feature', $GLOBALS['systemProperties']['properties'])) {
        $siteLocationString = $GLOBALS['systemProperties']['properties']['site_location_feature'];

        return $siteLocationString === 'true';
    }

    return false;
}

$smarty->assign('site_location_feature', siteLocationEnabled());

//Add System mode to properties
$systemProperties['system']['mode'] = _SYSTEM_MODE;

// Old properties
$smarty->assign('properties', $pageProperties);
$smarty->assign('system'    , $systemProperties['system']);

// If the new style Framework is present
if(isset($systemProperties['properties'])) {
    $smarty->assign('uniproperties', $systemProperties['properties']);
}

//Add the pageContext
$smarty->assign('pageContext', $pageContext);

/*
 * --------------------------- Custom Functions ------------------------------*/

/**
 * Fetch Weighted Property Value
 *
 * @param string $name
 * @param array $properties
 * @return mixed
 */
function getProp($name, $properties) {

    if(strpos($name, '.') !== FALSE) {

        // if we need to define more JSON styles, just add them to this array
        $json_properties = array("heading.style");
        $json_propname = NULL;
        foreach ($json_properties as &$prop) {
            $prop_len = strlen($prop);
            if (substr($name, 0, $prop_len) == $prop &&
                strlen($name) > $prop_len) {
                $json_propname = $prop;
                break;
            }
        }
        unset($prop);

        if (!is_null($json_propname)) {
            // we do $prop_len + 1 to also remove the dot from property_name
            $property_name = substr($name, $prop_len + 1);
            $style = json_decode(getProp($json_propname, $properties), true);

            $style_path = explode('.', $property_name);
            $property = $style;
            $property_found = true;
            foreach ($style_path as &$sp) {
                $test_property = $property[$sp];
                if (!empty($test_property)) {
                    $property = $test_property;
                } else {
                    $property_found = false;
                    break;
                }
            }
            unset ($sp);

            if (!$property_found) {
                /* return whatever kind of empty */
                return;
            }
            if (isSet($params['urlencode']) && $params['urlencode'] == 'true') {
                $property = str_replace('+', '%20', str_replace('%2F', '/', urlencode($property)));
            }
            if (isSet($params['anticache']) && $params['anticache'] == 'true') {
                $property = smarty_modifier_anticache($property);
            }
            return $property;
        } else {
            $row      = explode('.', $name);
            $tmp      = '';
            $property = ''; // Can Be mixed return

            foreach($row as $key) {

                $tmp .= '["'.$key.'"]';

            }

            eval('$property = !empty($properties'. $tmp .');');

            if($property === TRUE) {

                $return = '';

                eval('$return = $properties'. $tmp .';');

                return $return;

            }

            return null;
        }

    } else {

        if(array_key_exists($name, $properties)) {

            return $properties[$name];

        } else {

            return null;

        }
    }
}

?>
