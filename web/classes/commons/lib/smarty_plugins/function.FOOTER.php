<?php

/**
 * Construct Method For Footer Generation
 *
 * @author Sean Nieuwoudt <a href="mailto:sean@yola.com">sean@yola.com</a>
 * @param $params Object
 * @param $smarty Object
 */
function smarty_function_FOOTER($params, & $smarty) {


    $system        = $smarty->get_template_vars("system");
    $uniproperties = $smarty->get_template_vars("uniproperties");
    $systemMode    = $system["mode"];

    if(is_array($uniproperties) && count($uniproperties) > 0)  {
        /*
        echo '<pre>';
        print_r($system);
        echo '</pre>';
        */
        $footerString = "<div id='sys_footer' class='sys_footer'>" . getProp('footer.text' , $uniproperties). "</div>";

        //"hard coded" designer attrbution
        if (!isset($params["hidedesigner"]) && $params["hidedesigner"] != "true") {
            //$footerString.="<div id='sys_designerfooter' class='sys_footer'>Designed by <a href='".$system["template"]["author"]["link"]."' target='_blank'>".$system["template"]["author"]["name"]."</a>.</div>";
        }
        //return $footerString;
        return "";

    } else {

        /* New Framework Not In Place */
        $smarty->trigger_error('$systemProperties["uniproperties"] does not exist - $smarty::FOOTER()');

    }

}



?>
