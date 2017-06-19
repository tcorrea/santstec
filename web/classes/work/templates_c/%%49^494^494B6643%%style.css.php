<?php /* Smarty version 2.6.25-dev, created on 2017-03-30 18:14:32
         compiled from templates/Skyline_v2/style.css */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'BACKGROUND_COLOR', 'templates/Skyline_v2/style.css', 5, false),array('function', 'IFPROPERTY', 'templates/Skyline_v2/style.css', 6, false),array('function', 'PROPERTY', 'templates/Skyline_v2/style.css', 174, false),)), $this); ?>
/*
    Some Style Themes enhanced with background textures provided by http://subtlepatterns.com/
*/
body {
    <?php echo smarty_function_BACKGROUND_COLOR(array('property' => 'body.background-color'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'background-image: url(%s);','name' => 'body.background-image','anticache' => 'true','urlencode' => 'true'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'background-repeat: %s;','name' => 'body.background-repeat'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'background-attachment: %s;','name' => 'body.background-attachment'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'background-position: %s;','name' => 'body.background-position'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'background-size: %s;','name' => 'body.background-size'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => '-webkit-background-size: %s;','name' => 'body.background-size'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => '-moz-background-size: %s;','name' => 'body.background-size'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => '-o-background-size: %s;','name' => 'body.background-size'), $this);?>

}

.Text_2_Default,
.yola_heading_container {
  word-wrap: break-word;
}

.yola_bg_overlay {
    display:table;
    position:absolute;
    min-height: 100%;
    min-width: 100%;
    width:100%;
    height:100%;
}
.yola_outer_content_wrapper {
    <?php echo smarty_function_IFPROPERTY(array('format' => 'padding-top: %s;','name' => 'body.padding-top'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'padding-right: %s;','name' => 'body.padding-right'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'padding-bottom: %s;','name' => 'body.padding-bottom'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'padding-left: %s;','name' => 'body.padding-left'), $this);?>

}
.yola_inner_bg_overlay {
    width:100%;
    height:100%;
    display: table-cell;
    <?php echo smarty_function_BACKGROUND_COLOR(array('property' => 'body.foreground-color'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'vertical-align: %s;','name' => 'page.vertical-align'), $this);?>

}
.yola_outer_heading_wrap {
    width:100%;
    text-align: center;
}
.yola_heading_container {
    margin: 0 auto;
    <?php echo smarty_function_IFPROPERTY(array('format' => 'max-width: %s;','name' => 'header.max-width'), $this);?>

    <?php echo smarty_function_BACKGROUND_COLOR(array('property' => 'header.background-color'), $this);?>

}
.yola_inner_heading_wrap {
    margin: 0 auto;
    <?php echo smarty_function_IFPROPERTY(array('format' => 'max-width: %s;','name' => 'header.content.max-width'), $this);?>

}
.yola_innermost_heading_wrap {
    padding-left:0;
    padding-right:0;
    margin: 0 auto;
    <?php echo smarty_function_IFPROPERTY(array('format' => 'padding-top: %s;','name' => 'header.padding-top'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'padding-bottom: %s;','name' => 'header.padding-bottom'), $this);?>

}
.yola_inner_heading_wrap.top nav,
.yola_inner_heading_wrap.top div#yola_heading_block,
.yola_inner_heading_wrap.bottom nav,
.yola_inner_heading_wrap.bottom div#yola_heading_block {
    <?php echo smarty_function_IFPROPERTY(array('format' => 'padding-left: %s;','name' => 'header.padding-left'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'padding-right: %s;','name' => 'header.padding-right'), $this);?>

}
.yola_inner_heading_wrap.left .yola_innermost_heading_wrap,
.yola_inner_heading_wrap.right .yola_innermost_heading_wrap {
    <?php echo smarty_function_IFPROPERTY(array('format' => 'padding-left: %s;','name' => 'header.padding-left'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'padding-right: %s;','name' => 'header.padding-right'), $this);?>

}
.yola_inner_heading_wrap h1 {
    margin: 0;
}
#yola_nav_block {
    height: 100%;
}
#yola_nav_block nav {
    <?php echo smarty_function_IFPROPERTY(array('format' => 'text-align: %s;','name' => 'nav.text-align'), $this);?>

    <?php echo smarty_function_BACKGROUND_COLOR(array('property' => 'nav.background-color'), $this);?>

}
#yola_nav_block nav ul{
    display:inline;
}
.yola_inner_heading_wrap.left #yola_heading_block {
    float:left;
}
.yola_inner_heading_wrap.right #yola_heading_block {
    float:right;
}
.yola_inner_heading_wrap.top #yola_nav_block {
    <?php echo smarty_function_IFPROPERTY(array('format' => 'padding:%s 0 0 0;','name' => 'nav.padding'), $this);?>

}
.yola_inner_heading_wrap.right #yola_nav_block {
    float:left;
    <?php echo smarty_function_IFPROPERTY(array('format' => 'padding:%s 0 0 0;','name' => 'nav.padding'), $this);?>

}
.yola_inner_heading_wrap.bottom #yola_nav_block {
    <?php echo smarty_function_IFPROPERTY(array('format' => 'padding:0 0 %s 0;','name' => 'nav.padding'), $this);?>

}
.yola_inner_heading_wrap.left #yola_nav_block {
    float:right;
    <?php echo smarty_function_IFPROPERTY(array('format' => 'padding:%s 0 0 0;','name' => 'nav.padding'), $this);?>

}
.yola_banner_wrap {
    background-attachment: scroll;
    text-align: center;
    margin: 0 auto;
    <?php echo smarty_function_IFPROPERTY(array('format' => 'max-width: %s;','name' => 'banner.max-width'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'display: %s;','name' => 'banner.display'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'background-position: %s;','name' => 'banner.background-position'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'background-size: %s;','name' => 'banner.background-size'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'background-repeat: %s;','name' => 'banner.background-repeat'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'background-image: url(%s);','name' => 'banner.src','anticache' => 'true','urlencode' => 'true'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'background-color: %s;','name' => 'banner.background-color'), $this);?>

}
.yola_inner_banner_wrap {
    padding-left:0;
    padding-right:0;
    <?php echo smarty_function_IFPROPERTY(array('format' => 'padding-top: %s;','name' => 'banner.padding-top'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'padding-bottom: %s;','name' => 'banner.padding-bottom'), $this);?>

    <?php echo smarty_function_BACKGROUND_COLOR(array('property' => 'banner.foreground-color'), $this);?>

}
.yola_innermost_banner_wrap {
    margin: 0 auto;
    <?php echo smarty_function_IFPROPERTY(array('format' => 'max-width: %s;','name' => 'banner.content.max-width'), $this);?>

}
.yola_inner_nav_wrap {
    margin: 0 auto;
    <?php echo smarty_function_IFPROPERTY(array('format' => 'max-width: %s;','name' => 'content.max-width'), $this);?>

}
.yola_banner_wrap nav ul.sys_navigation {
    <?php echo smarty_function_IFPROPERTY(array('format' => 'text-align: %s;','name' => 'nav.text-align'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'padding-top:%s;','name' => 'nav.padding'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'padding-bottom:%s;','name' => 'nav.padding'), $this);?>

}
.yola_banner_wrap h1 {
    margin:0;
    <?php echo smarty_function_IFPROPERTY(array('format' => 'text-align: %s;','name' => 'h1.text-align'), $this);?>

}
.yola_site_tagline {
    padding-top:0;
    padding-bottom:0;
    <?php echo smarty_function_IFPROPERTY(array('format' => 'font-family: %s;','name' => 'site.tagline.font-family'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'font-size: %s;','name' => 'site.tagline.font-size'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'color: %s;','name' => 'site.tagline.color'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'text-decoration: %s;','name' => 'site.tagline.text-decoration'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'letter-spacing: %s;','name' => 'site.tagline.letter-spacing'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'line-height: %s;','name' => 'site.tagline.line-height'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'text-transform: %s;','name' => 'site.tagline.text-transform'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'text-align: %s;','name' => 'site.tagline.text-align'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'padding-right: %s;','name' => 'banner.padding-right'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'padding-left: %s;','name' => 'banner.padding-left'), $this);?>


}
.yola_site_tagline span {
    display: inline-block;
    <?php echo smarty_function_IFPROPERTY(array('format' => 'padding-top: %s;','name' => 'site.tagline.padding-top'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'padding-right: %s;','name' => 'site.tagline.padding-right'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'padding-bottom: %s;','name' => 'site.tagline.padding-bottom'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'padding-left: %s;','name' => 'site.tagline.padding-left'), $this);?>

    <?php echo smarty_function_BACKGROUND_COLOR(array('property' => 'site.tagline.background-color'), $this);?>

}
ul.sys_navigation {
    margin: 0;
    padding: 0;
    text-align: center;
}
ul.sys_navigation li {
    display: inline;
    list-style: none;
    margin:0 <?php echo smarty_function_PROPERTY(array('name' => 'nav.spacing'), $this);?>
 0 0;
}
.yola_inner_heading_wrap ul.sys_navigation li:last-child {
    margin:0;
}
ul.sys_navigation li a{
    text-decoration: none;
}
.yola_content_wrap {
    margin:0 auto;
    <?php echo smarty_function_IFPROPERTY(array('format' => 'max-width: %s;','name' => 'content.max-width'), $this);?>

    <?php echo smarty_function_BACKGROUND_COLOR(array('property' => 'content.background-color'), $this);?>

}
.yola_content_column {
    margin:0 auto;
    <?php echo smarty_function_IFPROPERTY(array('format' => 'max-width: %s;','name' => 'content.content.max-width'), $this);?>

}

.yola_inner_content_column {
    margin:0 auto;

    <?php echo smarty_function_IFPROPERTY(array('format' => 'padding-top: %s;','name' => 'content.padding-top'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'padding-right: %s;','name' => 'content.padding-right'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'padding-bottom: %s;','name' => 'content.padding-bottom'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'padding-left: %s;','name' => 'content.padding-left'), $this);?>

}
.yola_inner_footer_wrap {
    padding: 0 20px;
}
div[id*='sys_region_'] {
    padding-left: 0 ! important;
    padding-right: 0 ! important;
}
.yola_site_logo {
    <?php echo smarty_function_IFPROPERTY(array('format' => 'width: %s;','name' => 'site.logo.width'), $this);?>

    max-width:100%;
}
#sys_heading.yola_hide_logo img {
    display:none;
}
#sys_heading.yola_hide_logo span {
    display:inline;
}
a#sys_heading.yola_show_logo {
    font-size:14px;
}
#sys_heading.yola_show_logo img {
    display:inline;
}
#sys_heading.yola_show_logo span {
    display:none;
}
.yola_footer_wrap {
    margin:0 auto;
    <?php echo smarty_function_IFPROPERTY(array('format' => 'max-width: %s;','name' => 'content.max-width'), $this);?>

    <?php echo smarty_function_BACKGROUND_COLOR(array('property' => 'footer.background-color'), $this);?>

}
.yola_footer_column {
    margin:0 auto;
    <?php echo smarty_function_IFPROPERTY(array('format' => 'max-width: %s;','name' => 'content.content.max-width'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'display: %s;','name' => 'footer.display'), $this);?>

}
footer {
    <?php echo smarty_function_IFPROPERTY(array('format' => 'padding-top: %s;','name' => 'footer.padding-top'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'padding-right: %s;','name' => 'footer.padding-right'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'padding-bottom: %s;','name' => 'footer.padding-bottom'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'padding-left: %s;','name' => 'footer.padding-left'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'font-family: %s;','name' => 'footer.font-family'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'font-size: %s;','name' => 'footer.font-size'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'color: %s;','name' => 'footer.color'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'line-height: %s;','name' => 'footer.line-height'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'letter-spacing: %s;','name' => 'footer.letter-spacing'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'text-transform: %s;','name' => 'footer.text-transform'), $this);?>


}
span.yola_footer_socialbuttons {
    display:inline-block;
    line-height:0;
    margin:0;
    padding:0;
    display:inline-block;
    position:static;
    float:left;
    width:146px;
    height:20px;
    <?php echo smarty_function_IFPROPERTY(array('format' => 'display: %s;','name' => 'footer.socialbuttons.display'), $this);?>

}
.sys_yola_form .submit,
.sys_yola_form input.text,
.sys_yola_form input.email,
.sys_yola_form input.tel,
.sys_yola_form input.url,
.sys_yola_form textarea {
    <?php echo smarty_function_IFPROPERTY(array('format' => 'font-family: %s;','name' => 'p.font-family'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'font-size: %s;','name' => 'p.font-size'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'color: %s;','name' => 'p.color'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'line-height: %s;','name' => 'p.line-height'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'letter-spacing: %s;','name' => 'p.letter-spacing'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'text-transform: %s;','name' => 'p.text-transform'), $this);?>

}
div.sys_yola_form {
    padding:0 !important;
}
div.sys_yola_form form {
    margin:0 !important;
    padding:0 !important;
}
.sys_layout h2, .sys_txt h2, .sys_layout h3, .sys_txt h3, .sys_layout h4, .sys_txt h4, .sys_layout h5, .sys_txt h5, .sys_layout h6, .sys_txt h6, .sys_layout p, .sys_txt p {
    margin-top:0;
}
div[id*='sys_region_'] {
    padding:0 !important;
}
.sys_layout blockquote {
    margin-top: 10px;
    margin-bottom: 10px;
    margin-left: 50px;
    padding-left: 15px;
    border-left: 3px solid <?php echo smarty_function_IFPROPERTY(array('format' => '%s;','name' => 'p.color'), $this);?>
;
    <?php echo smarty_function_IFPROPERTY(array('format' => 'font-family: %s;','name' => 'blockquote.font-family'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'font-size: %s;','name' => 'blockquote.font-size'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'color: %s;','name' => 'blockquote.color'), $this);?>

    <?php echo smarty_function_BACKGROUND_COLOR(array('property' => 'blockquote.background-color'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'line-height: %s;','name' => 'blockquote.line-height'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'letter-spacing: %s;','name' => 'blockquote.letter-spacing'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'text-transform: %s;','name' => 'blockquote.text-transform'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'font-style: %s;','name' => 'blockquote.font-style'), $this);?>

}
.sys_layout p,.sys_layout pre {margin:0 0 1.5em 0}
.sys_layout h2,.sys_layout h3,.sys_layout h4,.sys_layout h5,.sys_layout h6 { margin:0 0 0.5em 0 }
.sys_layout dl, .sys_layout menu,.sys_layout ol,.sys_layout ul{margin:0 0 1.5em 0}

.mob_menu {
    display: none;
}

.new-text-widget img, .old_text_widget img {
    max-width: 100%;
}

<?php if (_SYSTEM_MODE != "DESIGN") { ?>

@media only screen and (max-width : 736px) {
    html {
        font-size: 80%;
    }

    body .m_inherit_width {
        width: inherit;
    }

    .small_device_hide {
        display: none;
    }

    /* Remove display table so that fixefox can understand max-width */
    .yola_bg_overlay, .yola_inner_bg_overlay {
       display: block;
    }

    /* Zero out padding of the heading wrapper */
    .yola_inner_heading_wrap.top .yola_innermost_heading_wrap,
    .yola_inner_heading_wrap.bottom .yola_innermost_heading_wrap,
    .yola_inner_heading_wrap.left .yola_innermost_heading_wrap,
    .yola_inner_heading_wrap.right .yola_innermost_heading_wrap {
        padding-left: 0;
        padding-right: 0;
    }

    /* Make all image widgets center aligned */
    .Image_Default img {
        display: block;
        margin: 0 auto;
    }

    /* Center button widgets in column dividers */
    .column_divider .sys_button {
        text-align: center;
    }

    /* Make column dividers snap to one over another */
    .yola_inner_heading_wrap.left #yola_heading_block, .yola_inner_heading_wrap.right #yola_heading_block {
        float: none;
    }

    #sys_heading {
        word-wrap: break-word;
        word-break: break-word;
    }

    body .column_divider .left, body .column_divider .right {
        width: 100%;
        padding-left: 0;
        padding-right: 0;
    }

    .mob_menu a:visited {
        color: #fff;
    }

    .mob_menu {
        display: block;
        background-color: #fff;
        <?php echo smarty_function_IFPROPERTY(array('format' => 'background: %s;','name' => 'body.background-color'), $this);?>
;
        <?php echo smarty_function_IFPROPERTY(array('format' => 'background: %s;','name' => 'header.background-color'), $this);?>
;
        <?php echo smarty_function_IFPROPERTY(array('format' => 'background: %s;','name' => 'nav.background-color'), $this);?>
;
    }

    .mob_menu.menu_open {
        position: absolute;
        min-height: 100%;
        padding: 1rem 0 0 0;
        margin: 0;
        top: 0;
        left: 0;
        right: 0;
    }

    .yola_outer_content_wrapper {
        display: block;
        padding-top: 0;
    }

    .mob_menu_overlay {
        display: none;
        <?php echo smarty_function_IFPROPERTY(array('format' => 'text-transform: %s;','name' => 'nav.text-transform'), $this);?>

    }

    .menu_open .mob_menu_overlay  {
        display: block;
    }

    .mob_menu_toggle {
        display: block;
        padding-top: 5%;
        padding-bottom: 6%;
        text-align: center;
        color: #666;
        cursor: pointer;
    }
    .mob_submenu_toggle {
        list-style: none;
        text-align: center;
        padding: 0;
        margin: 0;
    }

    .new-text-widget img, .old_text_widget img {
        height: auto;
    }

    #sys_heading span {
        font-size: 35px;
        font-weight: 500;
    }
    .sys_navigation {
        display: none;
    }

    .mobile_ham {
        <?php echo smarty_function_IFPROPERTY(array('format' => 'stroke: %s;','name' => 'nav.color'), $this);?>

    }

    .mobile_quit {
        display: none;
    }

    .menu_open .mobile_ham {
        display: none;
    }

    .menu_open .mobile_quit {
        display: inline;
        <?php echo smarty_function_IFPROPERTY(array('format' => 'stroke: %s;','name' => 'nav.color'), $this);?>

    }

    .mob_menu_list {
        <?php echo smarty_function_IFPROPERTY(array('format' => 'font-family: %s;','name' => 'nav.font-family'), $this);?>

        font-weight: lighter;
        margin: 0;
        font-size: 2.2em;
        line-height: 2;
        letter-spacing: 0.1em;
        list-style: none;
        text-align: center;
        padding: 0;
        -webkit-animation-duration: .2s;
        -webkit-animation-fill-mode: both;
        -webkit-animation-name: fadeInUp;
        -moz-animation-duration: .2s;
        -moz-animation-fill-mode: both;
        -moz-animation-name: fadeInUp;
        -o-animation-duration: .2s;
        -o-animation-fill-mode: both;
        -o-animation-name: fadeInUp;
        animation-duration: .2s;
        animation-fill-mode: both;
        animation-name: fadeInUp;
    }

    .mob_menu_overlay .mob_menu_list a {
        <?php echo smarty_function_IFPROPERTY(array('format' => 'color: %s;','name' => 'nav.color'), $this);?>

    }

    .mob_more_toggle {
        display: inline-block;
        cursor: pointer;
        background: none;
        border: none;
        outline: none;
        margin-left: 8px;
        <?php echo smarty_function_IFPROPERTY(array('format' => 'stroke: %s;','name' => 'nav.color'), $this);?>

    }

    .up_arrow {
        display: none;
    }

    .sub_menu_open svg .down_arrow {
        display: none;
    }

    .sub_menu_open .up_arrow {
        display: inline;
    }

    .mob_menu_overlay .mob_menu_list .selected a {
        <?php echo smarty_function_IFPROPERTY(array('format' => 'color: %s;','name' => 'nav:selected.color'), $this);?>

    }

    .sub_menu_open a {
        <?php echo smarty_function_IFPROPERTY(array('format' => 'color: %s;','name' => 'nav:selected.color'), $this);?>

    }

    .mob_menu_list .sub_menu_open a {
        <?php echo smarty_function_IFPROPERTY(array('format' => 'color: %s;','name' => 'nav:selected.color'), $this);?>

    }

    .sub_menu_open .mob_more_toggle {
        <?php echo smarty_function_IFPROPERTY(array('format' => 'stroke: %s;','name' => 'nav:selected.color'), $this);?>

    }

    .mob_submenu_list {
        <?php echo smarty_function_IFPROPERTY(array('format' => 'font-family: %s;','name' => 'nav.font-family'), $this);?>

        font-weight: lighter;
        list-style: none;
        text-align: center;
        padding: 0 0 5% 0;
        margin: 0;
        line-height: 1.6;
        display: none;
        -webkit-animation-duration: .2s;
        -webkit-animation-fill-mode: both;
        -webkit-animation-name: fadeInUp;
        -moz-animation-duration: .2s;
        -moz-animation-fill-mode: both;
        -moz-animation-name: fadeInUp;
        -o-animation-duration: .2s;
        -o-animation-fill-mode: both;
        -o-animation-name: fadeInUp;
        animation-duration: .2s;
        animation-fill-mode: both
        animation-name: fadeInUp;
    }

    .sub_menu_open .mob_submenu_list{
        display: block;
    }

    .mob_submenu_items {
        font-size: 0.75em;
    }
    .mob_menu_list .mob_nav_selected {
        <?php echo smarty_function_IFPROPERTY(array('format' => 'color: %s;','name' => 'nav:selected.color'), $this);?>

    }

    .menu_open ~ .yola_outer_content_wrapper {
        display: none;
    }

    @-webkit-keyframes fadeInUp {
      0% {
        opacity: 0;
        -webkit-transform: translate3d(0, 100%, 0);
        transform: translate3d(0, 100%, 0);
      }
      100% {
        opacity: 1;
        -webkit-transform: none;
        transform: none;
      }
    }

    @-moz-keyframes fadeInUp {
      0% {
        opacity: 0;
        -moz-transform: translate3d(0, 100%, 0);
        transform: translate3d(0, 100%, 0);
      }
      100% {
        opacity: 1;
        -moz-transform: none;
        transform: none;
      }
    }

    @-o-keyframes fadeInUp {
      0% {
        opacity: 0;
        -o-transform: translate3d(0, 100%, 0);
        transform: translate3d(0, 100%, 0);
      }
      100% {
        opacity: 1;
        -o-transform: none;
        transform: none;
      }
    }

    @keyframes fadeInUp {
      0% {
        opacity: 0;
        transform: translate3d(0, 100%, 0);
      }
      100% {
        opacity: 1;
        transform: none;
      }
    }
}

<?php } ?>