<?php


/**
 * @author <a href = mailto:sean@synthasite.com>Sean Nieuwoudt</a>
 */

function smarty_function_enum($params, & $smarty) {

    if (!isset($params['v'])) {
        $smarty->_trigger_fatal_error("[function_enum] param 'v' cannot be empty");
        return;
    }
    $val = $params['v'];

    switch($val){
        case '0':
            return 'text';
            break;

        case '1':
            return 'video';
            break;

        case '2':
            return 'image';
            break;

        default:
            return $val;
    }
}
?>
