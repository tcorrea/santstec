<?php

/**
 * Construct Method For Logo Generation
 *
 * @author Sean Nieuwoudt <a href="mailto:sean@yola.com">sean@yola.com</a>
 * @param $params Object
 * @param $smarty Object
 */
function smarty_function_LOGO($params, & $smarty) {

    $system        = $smarty->get_template_vars("system");
    $uniproperties = $smarty->get_template_vars("uniproperties");
    $systemMode    = $system["mode"];

    if(is_array($uniproperties) && count($uniproperties) > 0)  {

        $logo['src']          = getProp('logo.src',     $uniproperties);
        $logo['visible']      = getProp('logo.visible', $uniproperties);

        $logo['configurable'] = (!is_null($logo['src']))? true : false;

        $logoString = '<div id="sys_logo" style="';

        if ($logo['visible'] != 'true') {
            $logoString .= 'display: none;';
        }

        if(!is_null($logo['src'])) {

                $logoString .= 'background-image:url('.$logo['src'].'); ';

        }


        $logoString .= '"></div>';



        return $logoString;

    } else {

        /* New Framework Not In Place */
        $smarty->trigger_error('$systemProperties["properties"] does not exist - $smarty::LOGO()');

    }

}

?>
