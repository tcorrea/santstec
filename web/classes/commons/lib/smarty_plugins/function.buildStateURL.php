<?php
/**
 * @author <a href = mailto:stefan@synthasite.com>Stefan Lourens</a>
 *
 * Builds up the state params
 */
function smarty_function_buildStateURL($params, & $smarty) {
    $pageContext = $smarty->get_template_vars("pageContext");
    $stateValues = $pageContext->getStateValues();
    $exclutionList = $pageContext->getExclutionList();

    $baseURL = '';
    $builtURL = '';
    $assignToVar = false;
    $varName = '';

    //Check is there is a base url to be built upon.
    if (array_key_exists('baseURL', $params)) {
        $baseURL = $params['baseURL'];
        //$baseURL = $smarty->_eval($baseURL);
        $builtURL = $baseURL;
    }

    //Should the resulting url be saved as a variable
    if (!empty ($params['var'])) {
        $assignToVar = true;
        $varName = $params['var'];
    }

    foreach (array_keys($stateValues) as $targetId) {
        foreach ($stateValues[$targetId] as $name => $value) {
            $exclude = false;

            if (array_key_exists($targetId, $exclutionList) && array_key_exists($name, $exclutionList[$targetId])) {
                $currentExclutionList = $exclutionList[$targetId][$name];

                foreach ($currentExclutionList as $exclutionVar) {
                    if (strstr($baseURL, $exclutionVar) || strstr($baseURL, 'I' . $targetId . '_' . $exclutionVar)) {
                        $exclude = true;
                        break;
                    }
                }
            }

            if (!$exclude) {
                if (!strstr($builtURL, '?')) {
                    $builtURL .= '?';
                } else {
                    $builtURL .= '&';
                }

                if (is_null($targetId)) {
                    $builtURL .= 'I' . $targetId . '_';
                }

                $builtURL .= $name . '=' . urlencode($value);
            }
        }
    }

    if ($assignToVar) {
        $smarty->assign($varName, $builtURL);
    } else {
        return $builtURL;
    }
}
?>
