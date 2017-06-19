<?php

/**
 * Construct Method For General Navigation - ALIAS to function.MENU.php
 *
 * @author Sean Nieuwoudt <a href="mailto:sean@yola.com">sean@yola.com</a>
 * @param $params Object
 * @param $smarty Object
 */
function smarty_function_PRIMARY_MENU($params, & $smarty) {

    $system     = $smarty->get_template_vars("system");
    $systemMode = $system["mode"];

    $navString = "<ul class='sys_navigation'>\n";
    $navDataString = '<script>$(document).ready(function() { ';
    $navDataString .= 'flyoutMenu.initFlyoutMenu([';

    $i = 0;
    foreach($system['site']['navigation'] as $k => $v) {

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

        if(count($system['site']['navigation']) == 1){

            $class.=' single';

        }else if($k == 0){

            $class.=' first';

        }else if($k == count($system['site']['navigation']) -1){

            $class.=' last';

        }

        $class = trim($class);

        $v['name'] = str_replace('"', '&quot;', $v['name']);
        $v['title'] = str_replace('"', '&quot;', $v['title']);

        if($class != "") {

            $navString .= "\t\t\t".'<li id="ys_menu_'.$i.'" class="'.$class.'"><a href="'.$href.'" title="'.$v['title'].'">'.$v['name'].'</a>';

        } else {

            $navString .= "\t\t\t".'<li id="ys_menu_'.$i.'"><a href="'.$href.'" title="'.$v['title'].'">'.$v['name'].'</a>';

        }

        $navDataString .= '{';
        $navDataString .= '"href": "'.$v['href'].'",';
        $navDataString .= '"title": "'.$v['title'].'",';
        $navDataString .= '"name": "'.$v['name'].'",';
        $navDataString .= '"children": [';


        if(count($v['children']) > 0) {
            // Build submenu
            $s = 0;
            foreach($v['children'] as $j => $c) {
                ++$s;

                $c['name'] = str_replace('"', '&quot;', $c['name']);
                $c['title'] = str_replace('"', '&quot;', $c['title']);

                $navDataString .= '{';
                $navDataString .= '"href": "'.$c['href'].'",';
                $navDataString .= '"title": "'.$c['title'].'",';
                $navDataString .= '"name": "'.$c['name'].'"';

                if($s == count($v['children'])) {
                    $navDataString .= '}';
                } else {
                    $navDataString .= '},';
                }
            }
        }
        $navDataString .= ']';

        ++$i;
        if($i == count($system['site']['navigation'])) {
            $navDataString .= '}';
        } else {
            $navDataString .= '},';
        }

        $navString .= "</li>\n";

    }
    $navDataString .= '], "'.$params['submenutype'].'");';
    $navDataString .= '});</script>';

    $navString .= "\t\t\t</ul>\n";

    if($params['submenutype'] == 'flyover' || $params['submenutype'] == 'flyover_vertical') {
        $navString = $navString . $navDataString;
    }
    return $navString;
}

?>
