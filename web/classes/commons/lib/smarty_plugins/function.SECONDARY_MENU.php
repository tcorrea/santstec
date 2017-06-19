<?php

/**
 * Construct Method For General Navigation - ALIAS to function.MENU.php
 *
 * @author Sean Nieuwoudt <a href="mailto:sean@yola.com">sean@yola.com</a>
 * @param $params Object
 * @param $smarty Object
 */
function smarty_function_SECONDARY_MENU($params, & $smarty) {

    $system     = $smarty->get_template_vars("system");
    $systemMode = $system["mode"];

    //@TODO Set var when adding isCurrent vars.
    $topLevelNavEntry;

    foreach ($system['site']['navigation'] as &$navEntry) {
        if ($navEntry['isCurrent'] === true) {
            $topLevelNavEntry = $navEntry;
        }
    }

    if (isset($topLevelNavEntry) && array_key_exists('children', $topLevelNavEntry)) {

        $navString = '<ul>';

        foreach($topLevelNavEntry['children'] as $k => $v) {
            $href = '';

            if($v['href'] == 'index.php') {
                $href = './';
            } else {
                $href = $v['href'];
            }

            $class = "";

            if($v['isCurrent']) {
                $class = "selected";
            }

            if(count($topLevelNavEntry['children']) == 1){
                $class.=' single';
            }else if($k == 0){
                $class.=' first';
            }else if($k == count($topLevelNavEntry['children']) -1){
                $class.=' last';
            }

            $class = trim($class);

            if($class != "") {
                $navString .= '<li class="'.$class.'"><a href="'.$href.'" title="'.$v['title'].'">'.$v['name'].'</a></li>';
            } else {
                $navString .= '<li><a href="'.$href.'" title="'.$v['title'].'">'.$v['name'].'</a></li>';
            }

        }

        $navString .= '</ul>';

        return $navString;

    }else{

        return false;

    }

}

?>
