<?php
require_once(_ENV_COMMONS_CLASSPATH . 'lib' . DIRECTORY_SEPARATOR . 'smarty_plugins' . DIRECTORY_SEPARATOR . 'modifier.anticache.php');

/**
 * Generic Property Accessor Method
 *
 * @author Steffen Yount <a href="mailto:steffen.yount@yola.com">steffen.yount@yola.com</a>
 * @param $params Object
 * @param $smarty Object
 */
function smarty_function_IFPROPERTY($params, & $smarty) {

    $system        = $smarty->get_template_vars("system");
    $uniproperties = $smarty->get_template_vars("uniproperties");
    $systemMode    = $system["mode"];
    $templatemode  = $smarty->get_template_vars("templatemode");

    if(is_array($uniproperties) && count($uniproperties) > 0)  {

        if(empty($params['name'])) {
            $smarty->trigger_error('Missing: "name" parameter - $smarty::PROPERTY()');
        }

        $property = getProp($params['name'], $uniproperties);
        if (empty($property)) {
            $default = $params['default'];
            if(!empty($default)) {
                $property = $default;
            }
        }
        if (empty($property) && $templatemode != 'DESIGN') {
            return '';
        }

        if (empty($params['format'])) {
            $format = '%s';

        } else {
            $format = $params['format'];
        }

        if (isSet($params['urlencode']) && $params['urlencode'] == 'true') {
            $property = str_replace('+', '%20', str_replace('%2F', '/', urlencode($property)));
        }

        if (isSet($params['anticache']) && $params['anticache'] == 'true') {
            $property = smarty_modifier_anticache($property);

        }

        if ($templatemode == 'DESIGN') {
            $property = "{{" . str_replace(":", "_", str_replace(".", "_", $params['name'])) . "}}";
        }

        return sprintf($format, $property);

    } else {

        /* New Framework Not In Place */
        $smarty->trigger_error('$systemProperties["properties"] does not exist - $smarty::PROPERTY()');
    }
}

?>
