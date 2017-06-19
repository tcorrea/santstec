<?php

require_once(_ENV_COMMONS_CLASSPATH.'lib'.DIRECTORY_SEPARATOR.'smarty_plugins'.DIRECTORY_SEPARATOR.'modifier.anticache.php');

/**
 * Construct Method For Yola Credit Footer Generation
 *
 * @author Mike Schwartz <a href="mailto:mike.schwartz@yola.com">mike.schwartz@yola.com</a>
 * @param $params Object
 * @param $smarty Object
 */
function smarty_function_YOLACREDIT($params, & $smarty) {
    $config = $smarty->get_template_vars("config");
    $system        = $smarty->get_template_vars("system");
    $uniproperties = $smarty->get_template_vars("uniproperties");
    $systemMode    = $system["mode"];
    $partnerFooterUrl = $system["partnerFooterUrl"];
    $isWhiteLabel = $system["isWhiteLabel"];
    $siteAnalyticsJsUrl = $config->sitecomponents->site_analytics_js_url;
    $siteId        = @$system['site']['id'];
    $footerString  = '';

    $locale        = @$system['locale'];
    $locale        = is_null($locale) ? "en" : $locale;
    $language      = substr($locale, 0, 2);
    $language      = is_null($language) || $language == "" ? "en" : strtolower($language);
    //this is a hack.. we should not be using the locale variable to get the country, we should have a country site property to use
    $country       = substr($locale, 3, 5);
    $host          = is_null($country)  || $country == "" ? "www" : strtolower($country);
    $country       = is_null($country)  || $country == "" ? "ZZ" : strtoupper($country);
    $partnerId     = @$system['partnerId'];
    $partnerId     = is_null($partnerId) ? "YOLA" : strtoupper($partnerId);

    $footerBought  = $system['purchased']['yola_footer_removal']['enabled'];

    $userFooter    = getProp('footer.text', $uniproperties);

    $signupDate    = 0;

    bindtextdomain("messages", _ENV_COMMONS_CLASSPATH.'lib'.DIRECTORY_SEPARATOR.'smarty_plugins'.DIRECTORY_SEPARATOR."locale");

    if($partnerId == "HP") {
        $footerLink = "https://${host}.yola.com/hp/${locale}?hardware=promotion&promo=footer_viral&reqloc=${language}_${country}";
    } else {//YOLA
        if ($language == "pt") {
            /* This is here because going to yola.com/pt will go to an HP page. */
            $footerLink = "https://www.yola.com/pt_BR";
        } elseif ($language != "en") {
            $footerLink = "https://www.yola.com/$language";
        }  else {
            $footerLink = "https://www.yola.com/";
        }
    }

    if($systemMode != "RUN") {
        $footerLink = "javascript:void(0);";
    }

    if (array_key_exists('user', $system) && array_key_exists('signupDate', $system['user'])) {
        $signupDate = $system['user']['signupDate'];
    }

    # Do not change footers for users who signed up before Thursday July 1st 2010.
    if(!$footerBought){

        if($isWhiteLabel === true){

            if($partnerFooterUrl != null && $partnerFooterUrl != ""){
?>
                <div id="sys_yolacredit" style="margin:1em auto;text-align:center;width:220px;display:block;visibility:visible;height:35px">
                    <iframe src='<?=$partnerFooterUrl?>' style='width:220px;height:35px;border:none;overflow:hidden;' frameborder='0'></iframe>
                </div>
<?php

            }

        }else{

            if($signupDate <= 1277244000000){
                $yolaTagPNG = smarty_modifier_anticache('classes/commons/yola_footer/png/yolaTag.png');

?>

                <style type="text/css">
                    #sys_yolacredit {
                        margin: 1em auto;
                        text-align: center;
                        width: 150px;
                        display: block;
                        height: 35px;
                    }
                    #sys_yolacredit_left {
                        background: url(<?=$yolaTagPNG?>) top left no-repeat;
                        width: 6px;
                        height: 32px;
                        float: left;
                        margin: 0;
                        padding: 0;
                    }
                    #sys_yolacredit_center {
                        background: url(<?=$yolaTagPNG?>) -10px top no-repeat;
                        height: 35px;
                        float: left;
                        padding-left: 3px;
                        margin: 0;
                        background-repeat: repeat-x;
                        display: block;
                        font-family: Arial;
                        font-size: 9px;
                        line-height: 33px;
                        color: #000;
                    }
                    #sys_yolacredit_right {
                        background: url(<?=$yolaTagPNG?>) top right no-repeat;
                        width: 8px;
                        height: 32px;
                        float: left;
                        margin: 0;
                        padding: 0;
                    }
                    a#sys_yolacredit_a1 {
                        color: #000;
                        text-decoration: none;
                    }
                    a#sys_yolacredit_a1:hover {
                        text-decoration: underline;
                    }
                    span#sys_yolacredit_a2 {
                        color: #E7004F;
                    }
                    span#sys_yolacredit_a2:hover {
                        text-decoration: underline;
                        cursor: pointer;
                    }
                </style>
                <!--[if lte IE 6]>
                        <style type="text/css">
                            #sys_yolacredit_right {background:url(<?=smarty_modifier_anticache('classes/commons/yola_footer/gif/yolaTag_03.gif'); ?>) top right}
                            #sys_yolacredit_left {background-image:url(<?=smarty_modifier_anticache('classes/commons/yola_footer/gif/yolaTag_01.gif'); ?>)}
                            #sys_yolacredit_center {background-image:url(<?=smarty_modifier_anticache('classes/commons/yola_footer/gif/yolaTag_02.gif'); ?>)}
                        </style>
                <![endif]-->
                <div id="sys_yolacredit" title="<?= _("Visit Yola.com to create your own free website"); ?>" style="visibility: visible;">
                    <div id="sys_yolacredit_left"></div>
                    <div id="sys_yolacredit_center" style="visibility: visible;">
                        <?php $anchorAttribute = 'id="sys_yolacredit_a1" href="'.$footerLink.'" target="_blank"'; ?>
                        <?php $spanAttribute = 'id="sys_yolacredit_a2"" target="_blank"'; ?>
                        <?= sprintf(_('Make a <a %1$s >Free Website</a> with <span %2$s >Yola.</span>'), $anchorAttribute, $spanAttribute ); ?>
                    </div>
                    <div id="sys_yolacredit_right"></div><div style="clear:both"></div>
                </div>

<?php

            # Users who signed up after Thursday July 1st 2010 get the new and improved footer.
            }else{
                $spritesPNG = smarty_modifier_anticache('classes/commons/yola_footer/png/sprites.png');
                $spritesGIF = smarty_modifier_anticache('classes/commons/yola_footer/gif/sprites.gif');

?>

                <style type="text/css">
                    #sys_yolacredit_wrap{text-align:center;}
                    #sys_yolacredit{text-align:center;line-height:1.2em;margin:1em auto;font-family:Arial;position:relative;background:#fff url(<?=$spritesPNG?>) top right no-repeat;border-top:1px solid #e1e1e1;border-bottom:1px solid #e1e1e1;padding:13px 73px 15px 17px;color:#222;font-size:18px;display:inline-block;}
                    #sys_yolacredit p{margin:0;padding:0;line-height:1.2em;}
                    #sys_yolacredit p a{color:#222;text-decoration:none;}
                    #sys_yolacredit p a:hover{text-decoration:underline;}
                    #sys_yolacredit_message{display:none;color:red;padding:20px 20px 20px 110px;background:url(<?=$spritesPNG?>) 20px center no-repeat;position:absolute;top:0;right:0;z-index:1;}
                    #sys_yolacredit_message_wrap{display:none;position:absolute;top:0;right:0;padding-bottom:25px;background:url(<?=$spritesPNG?>) bottom left no-repeat;}
                    #sys_yolacredit_message_wrap_inner{font-size:13px;opacity:.8;filter: alpha(opacity = 80);background:#797979;-moz-border-radius:8px;-khtml-border-radius:8px;-webkit-border-radius:8px;border-radius:8px;}
                    #sys_yolacredit_message p{width:260px;padding:5px 0;margin:0;text-align:left;color:#fff;font-size:13px;background:transparent;position:relative;}
                    #sys_yolacredit a.yola{font-size:0;position:absolute;top:5px;right:0;display:inline-block;width:65px;height:37px;float:right;text-decoration:none;color:"#fff";}
                    #sys_yolacredit a.yola:hover;{text-decoration:none;}
                    #sys_yolacredit a.yola span{display:none;}
                </style>
                <!--[if lte IE 6]>
                    <style type="text/css">
                        #sys_yolacredit{background:#fff url(<?=$spritesGIF?>) top right no-repeat;}
                        #sys_yolacredit_message{background:url(<?=$spritesGIF?>) 20px center no-repeat;}
                        #sys_yolacredit_message_wrap{background:url(<?=$spritesGIF?>) bottom left no-repeat;}
                        #sys_yolacredit_message_wrap_inner{filter: alpha(opacity = 100);}
                    </style>
                <![endif]-->
                <div id="sys_yolacredit_wrap">
                    <?php
                        $no_coding_required = _("No HTML skills required. Build your website in minutes.");
                        $go_sign_up = _("Go to www.yola.com and sign up today!");
                        $footerAttr1 = 'href="'.${footerLink}.'"';
                        $footerAttr2 = 'class="yola" href="'.${footerLink}.'"';

                        if($partnerId != "YOLA") {
                            $sys_yolacredit = _("Visit Yola.com to create your own website");
                            $made_with = _("This website was made using Yola.");
                            $make_with_yola = sprintf(_('Make a <a %1$s>website</a> with <a %2$s><span>Yola</span></a>'), $footerAttr1, $footerAttr2);
                        } else {
                            $sys_yolacredit = _("Visit Yola.com to create your own free website");
                            $made_with = _("This free website was made using Yola.");
                            $make_with_yola = sprintf(_('Make a <a %1$s>free website</a> with <a %2$s><span>Yola</span></a>'), $footerAttr1, $footerAttr2);
                        }
                    ?>
                    <span id="sys_yolacredit" style="" title="<?=$sys_yolacredit?>">
                        <div id="sys_yolacredit_message">
                            <p><?=$made_with?></p>
                            <p><?=$no_coding_required?></p>
                            <p><?=$go_sign_up?></p>
                        </div>
                        <div id="sys_yolacredit_message_wrap">
                            <div id="sys_yolacredit_message_wrap_inner"></div>
                        </div>
                        <p><?=$make_with_yola?></p>
                    </span>
                </div>
                <script type="text/javascript">
                    document.getElementById("sys_yolacredit").onmouseover = function(){
                        var m = document.getElementById("sys_yolacredit_message"),
                        w = document.getElementById("sys_yolacredit_message_wrap"),
                        n = document.getElementById("sys_yolacredit_message_wrap_inner");
                        m.style.display = "block";
                        w.style.display = "block";
                        m.style.top = (m.offsetHeight * -1 - 15) + "px";
                        w.style.top = m.style.top;
                        m.style.right = (m.offsetWidth * -1 + 78) + "px";
                        w.style.right = m.style.right;
                        n.style.width = m.offsetWidth + "px";
                        n.style.height = m.offsetHeight + "px";
                    };
                    document.getElementById("sys_yolacredit").onmouseout = function(){
                        document.getElementById("sys_yolacredit_message").style.display = "none";
                        document.getElementById("sys_yolacredit_message_wrap").style.display = "none";
                    };
                </script>

<?php

            }

        }

    }

}

?>
