<?php
require_once(_ENV_COMMONS_CLASSPATH . 'lib' . DIRECTORY_SEPARATOR . 'smarty_plugins' . DIRECTORY_SEPARATOR . 'block.TRANSLATE.php');
require_once (_ENV_COMMONS_CLASSPATH . 'includes' . DIRECTORY_SEPARATOR . 'LocaleHelper.php');

function smarty_function_STYLE_FOOTER($params, & $smarty) {
    $system        = $smarty->get_template_vars("system");
    $uniproperties = $smarty->get_template_vars("uniproperties");

    $footer_string = '';
    // Build the social buttons string
    $social_buttons_string = '';
    if (_SYSTEM_MODE != 'DESIGN' && _SYSTEM_MODE != 'PREVIEW') {
        $language = LocaleHelper::getUnixLocale();

        // get the current page url
        $current_page_url = curPageURL();
        $current_page_url = preg_replace('/:[0-9]+/', "$1", $current_page_url); // remove port number
        $current_page_url = explode('?', $current_page_url);
        $current_page_url = $current_page_url[0];

        $url = $current_page_url;
        $facebook_url = $url;
        $facebook_style = 'button_count';
        $facebook_language = $language;
        $twitter_style = 'none';
        $twitter_language = substr($language, 0, 2);
        $twitter_url = ($url != '' ? 'data-url="' . urlencode($url) . '"' : '');
        $tweet_string = 'Tweet';

        $facebook_width = '49';
        $facebook_height = '20';
        // hack to adjust width for facebook in international languages
        if($language == 'de_DE'){
            $facebook_width += "33";
        }else if($language == 'es_ES'){
            $facebook_width += "26";
        }else if($language == 'it_IT'){
            $facebook_width += "22";
        }else if($language == 'fr_FR'){
            $facebook_width += "10";
        }else if($language == 'pt_BR'){
            $facebook_width += "8";
        }

        $social_buttons_string .= '<span class="yola_footer_socialbuttons"><table cellpadding="0" cellspacing="0">' . "\n"
                                . "\t" . '<tr>' . "\n"
                                . "\t\t" . '<td style="vertical-align:bottom;">' . "\n"
                                . "\t\t\t" . '<script type="text/javascript" src="//platform.twitter.com/widgets.js"></script>' . "\n"
                                . "\t\t\t" . '<a href="http://twitter.com/share" class="twitter-share-button" '
                                .                                                                             ' data-lang="' . $twitter_language . '"'
                                .                                                                             ' data-count="' . $twitter_style . '">' . $tweet_string . '</a>' . "\n"
                                . "\t\t" . '</td>' . "\n"
                                . "\t\t" . '<td style="vertical-align:bottom;">' . "\n"
                                . "\t\t\t" . '<div style="padding:0 5px;">' . "\n"
                                . "\t\t\t\t" . '<iframe src="//www.facebook.com/plugins/like.php?'
                                .                                                                     'send=false'
                                .                                                                     '&amp;href=' . urlencode($facebook_url)
                                .                                                                     '&amp;layout=' . $facebook_style
                                .                                                                     '&amp;show_faces=false'
                                .                                                                     '&amp;action=like'
                                .                                                                     '&amp;width=' . $facebook_width
                                .                                                                     '&amp;height=' . $facebook_height
                                .                                                                     '&amp;locale=' . $facebook_language . '"'
                                .                                                                     ' scrolling="no" frameborder="0"'
                                .                                                                     ' style="border:none;overflow:hidden;width:' . $facebook_width . 'px;height:' . $facebook_height . 'px;" allowTransparency="true"></iframe>' . "\n"
                                . "\t\t\t" . '</div>' . "\n"
                                . "\t\t" . '</td>' . "\n"
                                . "\t\t" . '<td style="vertical-align:bottom;">' . "\n"
                                . "\t\t\t" . '<script type="text/javascript" src="//apis.google.com/js/plusone.js">' . "\n"
                                . "\t\t\t\t" . '{lang: "' . $language . '"}' . "\n"
                                . "\t\t\t" . '</script>' . "\n"
                                . "\t\t\t\t" . '<g:plusone size="medium" count="false"></g:plusone>' . "\n"
                                . "\t\t\t" . '<script type="text/javascript">gapi.plusone.go();</script>' . "\n"
                                . "\t\t" . '</td>' . "\n"
                                . "\t" . '</tr>' . "\n"
                                . '</table></span>' . "\n";
    } else {
        $social_buttons_string .= '<span class="yola_footer_socialbuttons" style="background-position:-1px -65px; background-image:url('.smarty_modifier_anticache('classes/commons/resources/style_footer/sprites.png').');"></span>';
    }

    // Build the contact details string
    $contact_details_string = '';
    if(is_array($uniproperties) && count($uniproperties) > 0)  {

        $address_line1 = getProp('address.line1', $uniproperties);
        $address_line2 = getProp('address.line2', $uniproperties);
        $address_city = getProp('address.city', $uniproperties);
        $address_state = getProp('address.state', $uniproperties);
        $address_postal_code = getProp('address.postal_code', $uniproperties);
        $address_country = getProp('address.country', $uniproperties);
        $phone_main = getProp('phone.main', $uniproperties);

        $contact_details_string .= '<p style="float:right; margin:0;">';

        $contact_details_string .= $address_line1;
        if($address_line2 != '') {
            $contact_details_string .= ($contact_details_string != '' ? ', ' . $address_line2 : $address_line2);
        }
        if($address_city != '') {
            $contact_details_string .= ($contact_details_string != '' ? ', ' . $address_city : $address_city);
        }
        if($address_state != '' || $address_postal_code != '') {
            $contact_details_string .= ', ' . trim($address_state . ' ' . $address_postal_code);
        }
        if($address_country != '') {
            $contact_details_string .= ($contact_details_string != '' ? ', ' . $address_country : $address_country);
        }
        if($phone_main != '') {
            $contact_details_string .= ($contact_details_string != '' ? ' | ' . $phone_main : $phone_main);
        }
        $contact_details_string .= '</p>';
    }

    $footer_string .= $social_buttons_string;
    $footer_string .= $contact_details_string;
    $footer_string .= '<div style="clear:both; height:0;"></div>';

    return $footer_string;
}

if(!function_exists('curPageURL')){

    function curPageURL() {

        $pageURL = 'http';

        if($_SERVER["HTTPS"] == "on"){
            $pageURL .= "s";
        }

        $pageURL .= "://";

        if($_SERVER["SERVER_PORT"] != "80"){
            $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
        }else{
            $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
        }

        return $pageURL;

    }

}
