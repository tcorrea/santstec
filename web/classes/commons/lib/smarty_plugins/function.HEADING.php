<?php

/**
 * Construct HTML Heading Chunk
 *
 * @author Sean Nieuwoudt <a href="mailto:sean@yola.com">sean@yola.com</a>
 * @param $params Object
 * @param $smarty Object
 */
function smarty_function_HEADING($params, & $smarty) {

    $system        = $smarty->get_template_vars("system");
    $uniproperties = $smarty->get_template_vars("uniproperties");
    $systemMode    = $system["mode"];
    $headingString = '';
    $embed_string = '';
    $style_string_a = '';
    $style_string_h1 = '';

    if(is_array($uniproperties) && count($uniproperties) > 0){

        $text = getProp('heading.text' , $uniproperties);

        // initialize style
        $style = json_decode(getProp('heading.style' , $uniproperties), true);

        if(!_MOBILE && !_FACEBOOK){

            // initialize embedded font
            if($style['embed-font'] != ''){
                $embed_string = '<style type="text/css" rel="'.$style['embed-font'].'">@font-face{font-family:yola_heading_font;src:url("'.$style['embed-font'].'");}</style>';
                $style['font-family'] = 'yola_heading_font';
            }

            // initialize style attribute for the link (a)
            if($style['color']){ $style_string_a .= 'color:'.$style['color'].';'; }
            if($style['font-size']){ $style_string_a .= 'font-size:'.$style['font-size'].';'; }
            if($style['font-style']){ $style_string_a .= 'font-style:'.$style['font-style'].';'; }
            if($style['font-weight']){ $style_string_a .= 'font-weight:'.$style['font-weight'].';'; }
            if($style['font-family']){ $style_string_a .= 'font-family:'.$style['font-family'].';'; }
            //if($style['text-shadow']){ $style_string_a .= 'text-shadow:'.$style['text-shadow'].';'; }
            if($style['text-decoration']){ $style_string_a .= 'text-decoration:'.$style['text-decoration'].';'; }
            if($style_string_a != ''){ $style_string_a = ' style="'.$style_string_a.'"'; }

            // initialize style attribute for the heading (h1)
            if($style['text-align']){ $style_string_h1 .= 'text-align:'.$style['text-align'].';'; }
            if($style_string_h1 != ''){ $style_string_h1 = ' style="'.$style_string_h1.'"'; }

        }

        // create the full heading string
        if(!is_null($text)){
            //$headingString .= '<h1'.$style_string_h1.'>'.$embed_string.'<a id="sys_heading" href="./"'.$style_string_a.'>'.$text.'</a><textarea style="width:500px;height:500px;">'.getProp('heading.style' , $uniproperties).'</textarea></h1>';
            $headingString .= '<h1'.$style_string_h1.'>'.$embed_string.'<a id="sys_heading" href="./"'.$style_string_a.'>'.$text.'</a></h1>';
        }else{
            $headingString .= '<h1 class="empty"'.$style_string_h1.'>'.$embed_string.'<a id="sys_heading" href="./"'.$style_string_a.'></a></h1>';
        }

        return $headingString;

    }else{

        /* New Framework Not In Place */
        $smarty->trigger_error('$systemProperties["properties"] does not exist - $smarty::HEADING()');

    }
}

?>
