<?php

/**
 * Construct Method For General Navigation - ALIAS to function.MENU.php
 *
 * @author Sean Nieuwoudt <a href="mailto:sean@yola.com">sean@yola.com</a>
 * @param $params Object
 * @param $smarty Object
 */
function smarty_function_NESTED_MENU($params, & $smarty) {

    $system     = $smarty->get_template_vars("system");
    $systemMode = $system["mode"];

    $navString = '<ul>';

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

        if($class != ""){
            $navString .= '<li class="'.$class.'"><a href="'.$href.'" title="'.$v['title'].'">'.$v['name'].'</a></li>';
        }else{
            $navString .= '<li><a href="'.$href.'" title="'.$v['title'].'">'.$v['name'].'</a></li>';
        }

        if($v['isCurrent']) {

            // check if the item has a child selected
            if(array_key_exists('children', $v)){

                $navString .= '<li class="submenu"><ul>';

                foreach($v['children'] as $index => $item) {

                    $sub_class = "";

                    if($item['isCurrent']) {
                        $sub_class = "selected";
                    }

                    if(count($v['children']) == 1){
                        $sub_class.=' single';
                    }else if($index == 0){
                        $sub_class.=' first';
                    }else if($index == count($v['children']) -1){
                        $sub_class.=' last';
                    }

                    if($sub_class != ""){
                        $navString .= '<li class="'.$sub_class.'"><a href="'.$item['href'].'" title="'.$item['title'].'">'.$item['name'].'</a></li>';
                    }else{
                        $navString .= '<li><a href="'.$item['href'].'" title="'.$item['title'].'">'.$item['name'].'</a></li>';
                    }

                }

                $navString .= '</ul></li>';
            }

        }

    }

    $navString .= '</ul>';

    return $navString;

}

?>
