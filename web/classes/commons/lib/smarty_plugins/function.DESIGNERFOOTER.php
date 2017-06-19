<?php

/**
 * Construct Method For Footer Generation
 *
 * @author Sean Nieuwoudt <a href="mailto:sean@yola.com">sean@yola.com</a>
 * @param $params Object
 * @param $smarty Object
 */
function smarty_function_DESIGNERFOOTER($params, & $smarty) {


    $system        = $smarty->get_template_vars("system");
    $uniproperties = $smarty->get_template_vars("uniproperties");
    $systemMode    = $system["mode"];

    if(is_array($uniproperties) && count($uniproperties) > 0)  {

        if ((!isset($params["hide"]) || $params["hide"] != "true") && !empty($system["template"]["author"]) && !empty($system["template"]["author"]["name"]) && strripos($system["template"]["author"]["name"], "Free CSS Templates") === false) {
            $footerString="<div id='sys_footer' class='sys_footer'>Designed by ";
            if (!empty($system["template"]["author"]["link"])) {
                $footerString.="<a href='".$system["template"]["author"]["link"]."' target='_blank'>".$system["template"]["author"]["name"]."</a>";
            } else {
                $footerString.=$system["template"]["author"]["name"];
            }
            $footerString.="</div>";
        } else {
            $footerString="<div id='sys_footer' class='sys_footer'></div>";
        }
        return $footerString;

    } else {

        /* New Framework Not In Place */
        $smarty->trigger_error('$systemProperties["uniproperties"] does not exist - $smarty::DESIGNERFOOTER()');

    }

}



?>
