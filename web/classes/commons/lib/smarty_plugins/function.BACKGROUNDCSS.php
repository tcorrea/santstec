<?php

/**
 * Generic Property Accessor Method
 *
 * @author Sean Nieuwoudt <a href="mailto:sean@yola.com">sean@yola.com</a>
 * @param $params Object
 * @param $smarty Object
 */
function smarty_function_BACKGROUNDCSS($params, & $smarty) {

    $system        = $smarty->get_template_vars("system");
    $uniproperties = $smarty->get_template_vars("uniproperties");
    $systemMode    = $system["mode"];

    if(is_array($uniproperties) && count($uniproperties) > 0)  {

        $background['color']        = getProp('body.background-color'       , $uniproperties);
        $background['image']        = getProp('body.background-image'       , $uniproperties);
        $background['repeat']       = getProp('body.background-repeat'      , $uniproperties);
        $background['position']     = getProp('body.background-position'    , $uniproperties);
        $background['attachment']   = getProp('body.background-attachment'  , $uniproperties);

        if (is_null($background['color']) && is_null($background['image']) && is_null($background['repeat']) && is_null($background['position']) && is_null($background['attachment'])) {
            return;
        }
        $tagString = '';

        if(!is_null($background['color'])) {
            $tagString .= 'background-color:'.$background['color'].';';
        }

        if(!is_null($background['image'])) {
            $tagString .= "background-image:url('" . str_replace('+', '%20', str_replace('%2F', '/', urlencode($background['image']))) . "');";
        } else if ($background['image'] == "") {
            $tagString .= "background-image: none;";
        }

        if(!is_null($background['repeat'])) {
            $tagString .= 'background-repeat:'.$background['repeat'].';';
        }
        if(!is_null($background['position'])) {
            $tagString .= 'background-position:'.$background['position'].';';
        }

        if(!is_null($background['attachment'])) {
            $tagString .= 'background-attachment:'.$background['attachment'].';';
        }

        return $tagString;

    } else {

        /* New Framework Not In Place */
        $smarty->trigger_error('$systemProperties["uniproperties"] does not exist - $smarty::BACKGROUND()');

    }
}

?>
