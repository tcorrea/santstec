<?php


/**
 * @author <a href = mailto:stefan@synthasite.com>Stefan Lourens</a>
 *
 * Renders child components as defined in $pageProperties in the
 * relative page's component definition file.
 */
function smarty_function_region($params, & $smarty) {

    global $systemProperties;

    $pageProperties = $smarty->get_template_vars("properties");
    $components = $pageProperties['regions'][$params['name']];
    $componentProperties = $smarty->get_template_vars('properties');
    $system = $smarty->get_template_vars("system");
    $paletteName = strtolower($system['palette']['name']);

    $tagName = 'div';

    if (array_key_exists('tagName', $params)) {
        $tagName = $params['tagName'];
    }

    if ($componentProperties['id']) {
        $id = str_replace(' ', '', $params['name']) . '_' . $componentProperties['id'];
    } else {
        $id = str_replace(' ', '', $params['name']);
    }

    $paramExcludes = array (
        '',
        'id',
        'name',
        'defaultHeight',
        'description',
        'tagName'
    );

    //Rendering
    if ($components) {

        $tagParams = '';

        foreach ($params as $key => $value) {

            if (!array_search($key, $paramExcludes)) {
                $tagParams .= $key . '="' . $value . '" ';
            }
        }

        echo '<' . $tagName . ' id="' . $id . '" ' . $tagParams . '>';
        foreach ($components as & $component) {

            $css = '';

            if ($component->getComponentProperty('width')) {
                $css = $css . 'width:' . $component->getComponentProperty('width') . ';';
            }

            if ($component->getComponentProperty('height')) {
                $css = $css . 'height:' . $component->getComponentProperty('height') . ';';
            }

            if($component->getComponentProperty('position')) {
                $css = $css . 'text-align:' . $component->getComponentProperty('position') . ';';
            }

            if(_MOBILE || _FACEBOOK){
                if($component instanceof Layout1){
                    $css = $css . 'margin:0;';
                }else{
                    $css = $css . 'margin:10px 0;';
                }
            }else{
                if($component->getComponentProperty('margin')){
                    $css = $css . 'margin:' . $component->getComponentProperty('margin') . ';';
                }
            }

            if($component->getComponentProperty('padding')){
                if(_MOBILE || _FACEBOOK){
                    $css = $css . 'padding:0;';
                }else{
                    $css = $css . 'padding:' . $component->getComponentProperty('padding') . ';';
                }
            }

            echo '<div id="' . $component->getComponentProperty('id') . '" style="display:' . $component->getComponentProperty('sys_displayType') . ';clear: both;' . $css . '" class="' . $component->getComponentProperty('sys_className') . '">';

            // Bind domain to locale directory
                        // print "\n<!-- LOCALE:  " . $system['locale'] . " -->\n";
                        // print "\n<!-- LOCALE DIR:  " . $component->locale_dir . " -->\n";
                        bindtextdomain("messages", $component->locale_dir);

                        // Render!
            $component->render();

            echo '</div>';

        }
        echo '</' . $tagName . '>';

    } else {

        $tagParams = '';
        $addedDefaultHeight = false;

        foreach ($params as $key => $value) {

            if (!array_search($key, $paramExcludes)) {

                if ($key == 'style' && $params['defaultHeight'] && _SYSTEM_MODE == 'DESIGN') {
                    $tagParams .= $key . '="' . $value . ' min-height:' . $params['defaultHeight'] . ';" ';
                    $addedDefaultHeight = true;
                } else {
                    $tagParams .= $key . '="' . $value . '" ';
                }

            }
        }

        if (!$addedDefaultHeight && _SYSTEM_MODE == 'DESIGN') {
            $tagParams .= 'style="min-height:' . $params['defaultHeight'] . ';" ';
        }
        echo '<' . $tagName . ' id="' . $id . '" ' . $tagParams . '>&nbsp;</' . $tagName . '>';

    }

}
?>
