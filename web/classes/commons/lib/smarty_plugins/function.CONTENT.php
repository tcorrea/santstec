<?php

/**
 * @author <a href = mailto:stefan@synthasite.com>Stefan Lourens</a>
 *
 * Renders the regions of the selected Layout for this page.
 *
 */
function smarty_function_CONTENT($params, & $smarty) {
    $systemProperties = $smarty->get_template_vars("system");

    $smarty->display(_ENV_PROJECT_BASE . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR . 'commons'
    . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR . $systemProperties['page']['layout'] . '.html');

}
?>
