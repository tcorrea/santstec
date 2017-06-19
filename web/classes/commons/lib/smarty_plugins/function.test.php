<?php

/**
 * @author <a href = mailto:stefan@synthasite.com>Stefan Lourens</a>
 */

function smarty_function_test($params, & $smarty) {
    $properties = $smarty->get_template_vars("properties");

    print_r($properties);

}
?>
