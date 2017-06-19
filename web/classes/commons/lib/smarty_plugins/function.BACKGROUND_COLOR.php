<?php
require_once(_ENV_COMMONS_CLASSPATH . 'lib' . DIRECTORY_SEPARATOR . 'smarty_plugins' . DIRECTORY_SEPARATOR . 'modifier.anticache.php');

function smarty_function_BACKGROUND_COLOR($params, & $smarty) {

    $uniproperties = $smarty->get_template_vars("uniproperties");
    $templatemode  = $smarty->get_template_vars("templatemode");

    if(is_array($uniproperties) && count($uniproperties) > 0)  {

        if(empty($params['property'])) {
            $smarty->trigger_error('Missing: "property" parameter - $smarty::BACKGROUND_COLOR()');
        }

        $propName = $params['property'];

        $color = getProp($params['property'], $uniproperties);
        if (empty($color)) {
            $default = $params['default'];
            if(!empty($default)) {
                $color = $default;
            }
        }
        if (empty($color) && $templatemode != 'DESIGN') {
            return;
        }

        $matches = array();
        $transparency = false;

        $r_hex = NULL;
        $g_hex = NULL;
        $b_hex = NULL;
        $a_hex = NULL;

        $bg_hex = '';
        $bg_properties = '';

        $regex = '/rgba\(\s*(\d+)\s*,\s*(\d+)\s*,\s*(\d+)\s*,\s*([\d\.]+)\s*\)/';
        preg_match($regex, $color, $matches);

        if(count($matches) == 0) {
            // the color doesn't have an alpha value, try rgb()
            $regex = '/rgb\(\s*(\d+)\s*,\s*(\d+)\s*,\s*(\d+)\s*\)/';
            preg_match($regex, $color, $matches);
        } else {
            $transparency = true;
        }

        if(count($matches) > 0){
            $r_hex = dechex($matches[1]);
            $g_hex = dechex($matches[2]);
            $b_hex = dechex($matches[3]);

            // duplicate single digit hexes for consistency
            // ie. #ABC becomes #AABBCC
            $r_hex = (strlen($r_hex) == 1 ? 0 . $r_hex : $r_hex);
            $g_hex = (strlen($g_hex) == 1 ? 0 . $g_hex : $g_hex);
            $b_hex = (strlen($b_hex) == 1 ? 0 . $b_hex : $b_hex);

            $bg_hex = $r_hex . $g_hex . $b_hex;

            if($transparency){
                $a_hex = $matches[4];

                // if the alpha channel is 1, there's not actually a transparency
                if($a_hex == "1"){
                    $transparency = false;
                } else {
                    $a_hex = dechex(round($a_hex * 255));
                    $a_hex = (strlen($a_hex) == 1 ? 0 . $a_hex : $a_hex);
                    $argb = $a_hex . $bg_hex;
                }
            }
        } else {
            $bg_hex = $color;
        }

        if(substr($bg_hex, 0, 1) != "#"){

            $html_colors = array("aliceblue", "antiquewhite", "aqua", "aquamarine", "azure", "beige", "bisque", "black", "blanchedalmond", "blue", "blueviolet", "brown", "burlywood", "cadetblue", "chartreuse", "chocolate", "coral", "cornflowerblue", "cornsilk", "crimson", "cyan", "darkblue", "darkcyan", "darkgoldenrod", "darkgray", "darkgreen", "darkkhaki", "darkmagenta", "darkolivegreen", "darkorange", "darkorchid", "darkred", "darksalmon", "darkseagreen", "darkslateblue", "darkslategray", "darkturquoise", "darkviolet", "deeppink", "deepskyblue", "dimgray", "dodgerblue", "firebrick", "floralwhite", "forestgreen", "fuchsia", "gainsboro", "ghostwhite", "gold", "goldenrod", "gray", "green", "greenyellow", "honeydew", "hotpink", "indianred", "indigo", "ivory", "khaki", "lavender", "lavenderblush", "lawngreen", "lemonchiffon", "lightblue", "lightcoral", "lightcyan", "lightgoldenrodyellow", "lightgray", "lightgreen", "lightpink", "lightsalmon", "lightseagreen", "lightskyblue", "lightslategray", "lightsteelblue", "lightyellow", "lime", "limegreen", "linen", "magenta", "maroon", "mediumaquamarine", "mediumblue", "mediumorchid", "mediumpurple", "mediumseagreen", "mediumslateblue", "mediumspringgreen", "mediumturquoise", "mediumvioletred", "midnightblue", "mintcream", "mistyrose", "moccasin", "navajowhite", "navy", "oldlace", "olive", "olivedrab", "orange", "orangered", "orchid", "palegoldenrod", "palegreen", "paleturquoise", "palevioletred", "papayawhip", "peachpuff", "peru", "pink", "plum", "powderblue", "purple", "red", "rosybrown", "royalblue", "saddlebrown", "salmon", "sandybrown", "seagreen", "seashell", "sienna", "silver", "skyblue", "slateblue", "slategray", "snow", "springgreen", "steelblue", "tan", "teal", "thistle", "tomato", "turquoise", "violet", "wheat", "white", "whitesmoke", "yellow", "yellowgreen");

            // only add the hash mark if it's not a named color
            if (!in_array(strtolower($bg_hex), $html_colors)) {
                $bg_hex = '#' . $bg_hex;
            }
        }

        if ($templatemode == 'DESIGN') {

            $normalizedPropName = str_replace(":", "_", str_replace(".", "_", $propName));
            $ie_gradient = "progid:DXImageTransform.Microsoft.gradient(";

            // $normalizedPropName_hex is our universal fallback for all browsers
            $bg_properties = "\t/* startbgcolor: '{{{$normalizedPropName}}}' */\n";
            $bg_properties .= "\tbackground-color: {{" . $normalizedPropName . "_hex}};\n";
            $bg_properties .= "\tzoom: 1; /* hasLayout */\n";
            $bg_properties .= "\tbackground: transparent\9;\n";
            $bg_properties .= "\tfilter:  " . $ie_gradient . "startColorstr='{{" . $normalizedPropName . "_argb}}', endColorstr='{{" . $normalizedPropName . "_argb}}'); /* IE 6 & 7 */\n";
            $bg_properties .= "\t-ms-filter: \"" . $ie_gradient . "startColorstr='{{" . $normalizedPropName . "_argb}}', endColorstr='{{" . $normalizedPropName . "_argb}}')\"; /* IE 8+ */\n";
            $bg_properties .= "\tbackground-color: {{{$normalizedPropName}}} ;";
            $bg_properties .= "\t/* endbgcolor */\n";
        } else {
            $bg_properties = "\tbackground-color: $bg_hex;\n";

            if($transparency){
                $bg_properties .= "\tzoom: 1; /* hasLayout */\n";
                $bg_properties .= "\tbackground: transparent\9;\n";
                $bg_properties .= "\tfilter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#$argb', endColorstr='#$argb'); /* IE 6 & 7 */\n";
                $bg_properties .= "\t-ms-filter: \"progid:DXImageTransform.Microsoft.gradient(startColorstr='#$argb', endColorstr='#$argb')\"; /* IE 8+ */\n";
                $bg_properties .= "\tbackground-color: $color;";
            }
        }

        return $bg_properties;
    }
}

?>
