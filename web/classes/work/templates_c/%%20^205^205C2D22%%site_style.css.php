<?php /* Smarty version 2.6.25-dev, created on 2017-03-30 18:14:32
         compiled from classes/commons/resources/designsettings/site_style.css */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'IFPROPERTY', 'classes/commons/resources/designsettings/site_style.css', 9, false),array('function', 'BACKGROUND_COLOR', 'classes/commons/resources/designsettings/site_style.css', 237, false),)), $this); ?>
/* ======================
*
*  Site Style Settings
*
=========================*/
/* Paragraph text (p) */

.content p, #content p, .HTML_Default p, .Text_Default p, .sys_txt p, .sys_txt a, .sys_layout p, .sys_txt, .sys_layout  {
    <?php echo smarty_function_IFPROPERTY(array('format' => 'font-family: %s;','name' => 'p.font-family'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'font-weight: %s;','name' => 'p.font-weight'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'font-size: %s;','name' => 'p.font-size'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'color: %s;','name' => 'p.color'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'line-height: %s;','name' => 'p.line-height'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'letter-spacing: %s;','name' => 'p.letter-spacing'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'text-transform: %s;','name' => 'p.text-transform'), $this);?>

}

/* Navigation */
.sys_navigation a, .ys_menu_2, div#menu ul, div#menu ul li a, ul.sys_navigation li a, div.sys_navigation ul li.selected a, div.sys_navigation ul li a, #navigation li a, div.ys_menu ul a:link, div.ys_menu ul a:visited, div.ys_nav ul li a, #sys_banner ul li a {
    <?php echo smarty_function_IFPROPERTY(array('format' => 'font-family: %s;','name' => 'nav.font-family'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'font-weight: %s;','name' => 'nav.font-weight'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'font-size: %s;','name' => 'nav.font-size'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'color: %s;','name' => 'nav.color'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'text-decoration: %s;','name' => 'nav.text-decoration'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'letter-spacing: %s;','name' => 'nav.letter-spacing'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'line-height: %s;','name' => 'nav.line-height'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'text-transform: %s;','name' => 'nav.text-transform'), $this);?>

}


/* Navigation:selected */
div.sys_navigation ul li.selected a, div#menu ul li.selected a, #navigation li.selected a, div.ys_menu ul li.selected a:link, div.ys_menu ul li.selected a:visited, div.ys_nav ul li.selected a, #sys_banner ul li.selected a {
    <?php echo smarty_function_IFPROPERTY(array('format' => 'color: %s;','name' => 'nav:selected.color'), $this);?>

}

/* Navigation:hover */
div.sys_navigation ul li a:hover, div#menu ul li a:hover, #navigation li a:hover, div.ys_menu ul a:hover, div.ys_nav ul li a:hover, div.ys_menu ul li a:hover, #sys_banner ul li a:hover {
    <?php echo smarty_function_IFPROPERTY(array('format' => 'color: %s;','name' => 'nav:hover.color'), $this);?>

}

/* Site Title */
#sys_heading, a#sys_heading, #sys_banner h1 a, #header h1 a, div#heading h1 a {
    <?php echo smarty_function_IFPROPERTY(array('format' => 'font-family: %s;','name' => 'h1.font-family'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'font-weight: %s;','name' => 'h1.font-weight'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'font-size: %s;','name' => 'h1.font-size'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'color: %s;','name' => 'h1.color'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'text-decoration: %s;','name' => 'h1.text-decoration'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'letter-spacing: %s;','name' => 'h1.letter-spacing'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'line-height: %s;','name' => 'h1.line-height'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'text-transform: %s;','name' => 'h1.text-transform'), $this);?>

}

/* Hyperlinks (a, a:hover, a:visited) */
<?php echo smarty_function_IFPROPERTY(array('format' => 'a, .sys_txt a:link, .sys_layout a:link {color: %s;}','name' => 'a:link.color'), $this);?>

<?php echo smarty_function_IFPROPERTY(array('format' => 'a, .sys_txt a:link, .sys_layout a:link {text-decoration: %s;}','name' => 'a:link.text-decoration'), $this);?>

<?php echo smarty_function_IFPROPERTY(array('format' => 'a:visited, .sys_txt a:visited, .sys_layout a:visited {color: %s;}','name' => 'a:visited.color'), $this);?>

<?php echo smarty_function_IFPROPERTY(array('format' => 'a:hover, .sys_txt a:hover, .sys_layout a:hover {color: %s;}','name' => 'a:hover.color'), $this);?>

<?php echo smarty_function_IFPROPERTY(array('format' => 'a:hover, .sys_txt a:hover, .sys_layout a:hover {text-decoration: %s;}','name' => 'a:hover.text-decoration'), $this);?>


/* Headings (h2, h3, h4, h5, h6) */
.sys_layout h2, .sys_txt h2 {
    <?php echo smarty_function_IFPROPERTY(array('format' => 'font-family: %s;','name' => 'h2.font-family'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'font-weight: %s;','name' => 'h2.font-weight'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'font-size: %s;','name' => 'h2.font-size'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'color: %s;','name' => 'h2.color'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'text-decoration: %s;','name' => 'h2.text-decoration'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'letter-spacing: %s;','name' => 'h2.letter-spacing'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'line-height: %s;','name' => 'h2.line-height'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'text-transform: %s;','name' => 'h2.text-transform'), $this);?>

}

.sys_layout h2 a, .sys_layout h2 a:link, .sys_layout h2 a:hover, .sys_layout h2 a:visited {
    <?php echo smarty_function_IFPROPERTY(array('format' => 'font-family: %s;','name' => 'h2.font-family'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'font-weight: %s;','name' => 'h2.font-weight'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'font-size: %s;','name' => 'h2.font-size'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'color: %s;','name' => 'h2.color'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'letter-spacing: %s;','name' => 'h2.letter-spacing'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'line-height: %s;','name' => 'h2.line-height'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'text-transform: %s;','name' => 'h2.text-transform'), $this);?>

}

.sys_layout h3, .sys_txt h3 {
    <?php echo smarty_function_IFPROPERTY(array('format' => 'font-family: %s;','name' => 'h3.font-family'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'font-weight: %s;','name' => 'h3.font-weight'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'font-size: %s;','name' => 'h3.font-size'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'color: %s;','name' => 'h3.color'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'text-decoration: %s;','name' => 'h3.text-decoration'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'letter-spacing: %s;','name' => 'h3.letter-spacing'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'line-height: %s;','name' => 'h3.line-height'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'text-transform: %s;','name' => 'h3.text-transform'), $this);?>

}

.sys_layout h3 a, .sys_layout h3 a:link, .sys_layout h3 a:hover, .sys_layout h3 a:visited {
    <?php echo smarty_function_IFPROPERTY(array('format' => 'font-family: %s;','name' => 'h3.font-family'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'font-weight: %s;','name' => 'h3.font-weight'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'font-size: %s;','name' => 'h3.font-size'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'color: %s;','name' => 'h3.color'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'letter-spacing: %s;','name' => 'h3.letter-spacing'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'line-height: %s;','name' => 'h3.line-height'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'text-transform: %s;','name' => 'h3.text-transform'), $this);?>

}

.sys_layout h4, .sys_txt h4 {
    <?php echo smarty_function_IFPROPERTY(array('format' => 'font-family: %s;','name' => 'h4.font-family'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'font-weight: %s;','name' => 'h4.font-weight'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'font-size: %s;','name' => 'h4.font-size'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'color: %s;','name' => 'h4.color'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'text-decoration: %s;','name' => 'h4.text-decoration'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'letter-spacing: %s;','name' => 'h4.letter-spacing'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'line-height: %s;','name' => 'h4.line-height'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'text-transform: %s;','name' => 'h4.text-transform'), $this);?>

}

.sys_layout h4 a, .sys_layout h4 a:link, .sys_layout h4 a:hover, .sys_layout h4 a:visited {
    <?php echo smarty_function_IFPROPERTY(array('format' => 'font-family: %s;','name' => 'h4.font-family'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'font-weight: %s;','name' => 'h4.font-weight'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'font-size: %s;','name' => 'h4.font-size'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'color: %s;','name' => 'h4.color'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'letter-spacing: %s;','name' => 'h4.letter-spacing'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'line-height: %s;','name' => 'h4.line-height'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'text-transform: %s;','name' => 'h4.text-transform'), $this);?>

}

.sys_layout h5, .sys_txt h5 {
    <?php echo smarty_function_IFPROPERTY(array('format' => 'font-family: %s;','name' => 'h5.font-family'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'font-weight: %s;','name' => 'h5.font-weight'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'font-size: %s;','name' => 'h5.font-size'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'color: %s;','name' => 'h5.color'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'text-decoration: %s;','name' => 'h5.text-decoration'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'letter-spacing: %s;','name' => 'h5.letter-spacing'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'line-height: %s;','name' => 'h5.line-height'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'text-transform: %s;','name' => 'h5.text-transform'), $this);?>

}

.sys_layout h5 a, .sys_layout h5 a:link, .sys_layout h5 a:hover, .sys_layout h5 a:visited {
    <?php echo smarty_function_IFPROPERTY(array('format' => 'font-family: %s;','name' => 'h5.font-family'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'font-weight: %s;','name' => 'h5.font-weight'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'font-size: %s;','name' => 'h5.font-size'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'color: %s;','name' => 'h5.color'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'letter-spacing: %s;','name' => 'h5.letter-spacing'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'line-height: %s;','name' => 'h5.line-height'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'text-transform: %s;','name' => 'h5.text-transform'), $this);?>

}

.sys_layout h6, .sys_txt h6 {
    <?php echo smarty_function_IFPROPERTY(array('format' => 'font-family: %s;','name' => 'h6.font-family'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'font-weight: %s;','name' => 'h6.font-weight'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'font-size: %s;','name' => 'h6.font-size'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'color: %s;','name' => 'h6.color'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'text-decoration: %s;','name' => 'h6.text-decoration'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'letter-spacing: %s;','name' => 'h6.letter-spacing'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'line-height: %s;','name' => 'h6.line-height'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'text-transform: %s;','name' => 'h6.text-transform'), $this);?>

}

.sys_layout h6 a, .sys_layout h6 a:link, .sys_layout h6 a:hover, .sys_layout h6 a:visited {
    <?php echo smarty_function_IFPROPERTY(array('format' => 'font-family: %s;','name' => 'h6.font-family'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'font-weight: %s;','name' => 'h6.font-weight'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'font-size: %s;','name' => 'h6.font-size'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'color: %s;','name' => 'h6.color'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'letter-spacing: %s;','name' => 'h6.letter-spacing'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'line-height: %s;','name' => 'h6.line-height'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'text-transform: %s;','name' => 'h6.text-transform'), $this);?>

}

/*button widget*/
.sys_layout .sys_button a, .sys_layout .sys_button a:link, .sys_layout .sys_button a:visited {
    display:inline-block;
    text-decoration: none;
}
.sys_layout .sys_button a:link, .sys_layout .sys_button a:visited {
    cursor:pointer;
}
.sys_layout .sys_button a {
    cursor:default;
}

.sys_layout .sys_button.square a, .sys_layout .sys_button.square a:link {
    border-radius:0px;
}
.sys_layout .sys_button.rounded a, .sys_layout .sys_button.rounded a:link {
    border-radius:3px;
}
.sys_layout .sys_button.pill a, .sys_layout .sys_button.pill a:link {
    border-radius:90px;
}

/*button sizes*/
.sys_layout .sys_button.small a, .sys_layout .sys_button.small a:link, .sys_layout .sys_button.small a:visited {<?php echo ''; ?><?php echo smarty_function_IFPROPERTY(array('format' => 'font-family: %s;','name' => 'button.small.font-family'), $this);?><?php echo ''; ?><?php echo smarty_function_IFPROPERTY(array('format' => 'font-weight: %s;','name' => 'button.small.font-weight'), $this);?><?php echo ''; ?><?php echo smarty_function_IFPROPERTY(array('format' => 'font-size: %s;','name' => 'button.small.font-size'), $this);?><?php echo ''; ?><?php echo smarty_function_IFPROPERTY(array('format' => 'line-height: %s;','name' => 'button.small.line-height'), $this);?><?php echo ''; ?><?php echo smarty_function_IFPROPERTY(array('format' => 'letter-spacing: %s;','name' => 'button.small.letter-spacing'), $this);?><?php echo ''; ?><?php echo smarty_function_IFPROPERTY(array('format' => 'text-transform: %s;','name' => 'button.small.text-transform'), $this);?><?php echo ''; ?><?php echo smarty_function_IFPROPERTY(array('format' => 'padding-top:%s;','name' => 'button.small.padding-top'), $this);?><?php echo ''; ?><?php echo smarty_function_IFPROPERTY(array('format' => 'padding-bottom:%s;','name' => 'button.small.padding-top'), $this);?><?php echo ''; ?><?php echo smarty_function_IFPROPERTY(array('format' => 'padding-left:%s;','name' => 'button.small.padding-left'), $this);?><?php echo ''; ?><?php echo smarty_function_IFPROPERTY(array('format' => 'padding-right:%s;','name' => 'button.small.padding-left'), $this);?><?php echo ''; ?>
}
.sys_layout .sys_button.medium a, .sys_layout .sys_button.medium a:link, .sys_layout .sys_button.medium a:visited {<?php echo ''; ?><?php echo smarty_function_IFPROPERTY(array('format' => 'font-family: %s;','name' => 'button.medium.font-family'), $this);?><?php echo ''; ?><?php echo smarty_function_IFPROPERTY(array('format' => 'font-weight: %s;','name' => 'button.medium.font-weight'), $this);?><?php echo ''; ?><?php echo smarty_function_IFPROPERTY(array('format' => 'font-size: %s;','name' => 'button.medium.font-size'), $this);?><?php echo ''; ?><?php echo smarty_function_IFPROPERTY(array('format' => 'line-height: %s;','name' => 'button.medium.line-height'), $this);?><?php echo ''; ?><?php echo smarty_function_IFPROPERTY(array('format' => 'letter-spacing: %s;','name' => 'button.medium.letter-spacing'), $this);?><?php echo ''; ?><?php echo smarty_function_IFPROPERTY(array('format' => 'text-transform: %s;','name' => 'button.medium.text-transform'), $this);?><?php echo ''; ?><?php echo smarty_function_IFPROPERTY(array('format' => 'padding-top:%s;','name' => 'button.medium.padding-top'), $this);?><?php echo ''; ?><?php echo smarty_function_IFPROPERTY(array('format' => 'padding-bottom:%s;','name' => 'button.medium.padding-top'), $this);?><?php echo ''; ?><?php echo smarty_function_IFPROPERTY(array('format' => 'padding-left:%s;','name' => 'button.medium.padding-left'), $this);?><?php echo ''; ?><?php echo smarty_function_IFPROPERTY(array('format' => 'padding-right:%s;','name' => 'button.medium.padding-left'), $this);?><?php echo ''; ?>
}
.sys_layout .sys_button.large a, .sys_layout .sys_button.large a:link, .sys_layout .sys_button.large a:visited {<?php echo ''; ?><?php echo smarty_function_IFPROPERTY(array('format' => 'font-family: %s;','name' => 'button.large.font-family'), $this);?><?php echo ''; ?><?php echo smarty_function_IFPROPERTY(array('format' => 'font-weight: %s;','name' => 'button.large.font-weight'), $this);?><?php echo ''; ?><?php echo smarty_function_IFPROPERTY(array('format' => 'font-size: %s;','name' => 'button.large.font-size'), $this);?><?php echo ''; ?><?php echo smarty_function_IFPROPERTY(array('format' => 'line-height: %s;','name' => 'button.large.line-height'), $this);?><?php echo ''; ?><?php echo smarty_function_IFPROPERTY(array('format' => 'letter-spacing: %s;','name' => 'button.large.letter-spacing'), $this);?><?php echo ''; ?><?php echo smarty_function_IFPROPERTY(array('format' => 'text-transform: %s;','name' => 'button.large.text-transform'), $this);?><?php echo ''; ?><?php echo smarty_function_IFPROPERTY(array('format' => 'padding-top:%s;','name' => 'button.large.padding-top'), $this);?><?php echo ''; ?><?php echo smarty_function_IFPROPERTY(array('format' => 'padding-bottom:%s;','name' => 'button.large.padding-top'), $this);?><?php echo ''; ?><?php echo smarty_function_IFPROPERTY(array('format' => 'padding-left:%s;','name' => 'button.large.padding-left'), $this);?><?php echo ''; ?><?php echo smarty_function_IFPROPERTY(array('format' => 'padding-right:%s;','name' => 'button.large.padding-left'), $this);?><?php echo ''; ?>
}

/*button styles:small*/
.sys_layout .sys_button.small.outline a, .sys_layout .sys_button.small.outline a:link {
    <?php echo smarty_function_IFPROPERTY(array('format' => 'border-color:%s;','name' => 'button.small.background-color'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'color: %s;','name' => 'button.small.background-color'), $this);?>

    border-style: solid;
    border-width: 2px;
}
.sys_layout .sys_button.small.outline a:visited {
    <?php echo smarty_function_IFPROPERTY(array('format' => 'color: %s;','name' => 'button.small.background-color'), $this);?>

}
.sys_layout .sys_button.small.solid a, .sys_layout .sys_button.small.solid a:link {
    <?php echo smarty_function_BACKGROUND_COLOR(array('property' => 'button.small.background-color'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'color: %s;','name' => 'button.small.color'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'border-color:%s;','name' => 'button.small.background-color'), $this);?>

    border-style: solid;
    border-width: 2px;
}
.sys_layout .sys_button.small.solid a:visited {
    <?php echo smarty_function_IFPROPERTY(array('format' => 'color: %s;','name' => 'button.small.color'), $this);?>

}
.sys_layout .sys_button.small.outline a:hover {
    <?php echo smarty_function_IFPROPERTY(array('format' => 'background-color: %s;','name' => 'button.small.background-color'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'color: %s;','name' => 'button.small.color'), $this);?>

    text-decoration: none;
}

/*button styles:medium*/
.sys_layout .sys_button.medium.outline a, .sys_layout .sys_button.medium.outline a:link {
    <?php echo smarty_function_IFPROPERTY(array('format' => 'border-color:%s;','name' => 'button.medium.background-color'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'color: %s;','name' => 'button.medium.background-color'), $this);?>

    border-style: solid;
    border-width: 2px;
}
.sys_layout .sys_button.medium.outline a:visited {
    <?php echo smarty_function_IFPROPERTY(array('format' => 'color: %s;','name' => 'button.medium.background-color'), $this);?>

}
.sys_layout .sys_button.medium.solid a, .sys_layout .sys_button.medium.solid a:link {
    <?php echo smarty_function_BACKGROUND_COLOR(array('property' => 'button.medium.background-color'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'color: %s;','name' => 'button.medium.color'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'border-color:%s;','name' => 'button.medium.background-color'), $this);?>

    border-style: solid;
    border-width: 2px;
}
.sys_layout .sys_button.medium.solid a:visited {
    <?php echo smarty_function_IFPROPERTY(array('format' => 'color: %s;','name' => 'button.medium.color'), $this);?>

}
.sys_layout .sys_button.medium.outline a:hover {
    <?php echo smarty_function_IFPROPERTY(array('format' => 'background-color: %s;','name' => 'button.medium.background-color'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'color: %s;','name' => 'button.medium.color'), $this);?>

    text-decoration: none;
}
/*button styles:large*/
.sys_layout .sys_button.large.outline a, .sys_layout .sys_button.large.outline a:link {
    <?php echo smarty_function_IFPROPERTY(array('format' => 'border-color:%s;','name' => 'button.large.background-color'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'color: %s;','name' => 'button.large.background-color'), $this);?>

    border-style: solid;
    border-width: 2px;
}
.sys_layout .sys_button.large.outline a:visited {
    <?php echo smarty_function_IFPROPERTY(array('format' => 'color: %s;','name' => 'button.large.background-color'), $this);?>

}
.sys_layout .sys_button.large.solid a, .sys_layout .sys_button.large.solid a:link {
    <?php echo smarty_function_BACKGROUND_COLOR(array('property' => 'button.large.background-color'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'color: %s;','name' => 'button.large.color'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'border-color:%s;','name' => 'button.large.background-color'), $this);?>

    border-style: solid;
    border-width: 2px;
}
.sys_layout .sys_button.large.solid a:visited {
    <?php echo smarty_function_IFPROPERTY(array('format' => 'color: %s;','name' => 'button.large.color'), $this);?>

}
.sys_layout .sys_button.large.outline a:hover {
    <?php echo smarty_function_IFPROPERTY(array('format' => 'background-color: %s;','name' => 'button.large.background-color'), $this);?>

    <?php echo smarty_function_IFPROPERTY(array('format' => 'color: %s;','name' => 'button.large.color'), $this);?>

    text-decoration: none;
}

.sys_layout .sys_button.solid a:hover {
    text-decoration: none;
    opacity: .8;
}