<?php /* Smarty version 2.6.25-dev, created on 2017-03-30 18:14:32
         compiled from templates/Skyline_v2/style.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'PROPERTY', 'templates/Skyline_v2/style.html', 1, false),array('function', 'HEADER', 'templates/Skyline_v2/style.html', 25, false),array('function', 'IFPROPERTY', 'templates/Skyline_v2/style.html', 35, false),array('function', 'CONTENT', 'templates/Skyline_v2/style.html', 105, false),array('function', 'STYLE_FOOTER', 'templates/Skyline_v2/style.html', 113, false),array('function', 'YOLACREDIT', 'templates/Skyline_v2/style.html', 117, false),array('function', 'TRACKING', 'templates/Skyline_v2/style.html', 118, false),array('modifier', 'anticache', 'templates/Skyline_v2/style.html', 16, false),)), $this); ?>
<?php ob_start(); ?><?php echo smarty_function_PROPERTY(array('name' => "site.logo.src"), $this);?>
<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('site_logo_src', ob_get_contents());ob_end_clean(); ?>
<?php ob_start(); ?><?php echo smarty_function_PROPERTY(array('name' => "site.tagline.text"), $this);?>
<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('site_tagline_text', ob_get_contents());ob_end_clean(); ?>
<?php ob_start(); ?><?php echo smarty_function_PROPERTY(array('name' => "header.alignment"), $this);?>
<?php $this->_smarty_vars['capture']['default'] = ob_get_contents();  $this->assign('header_alignment', ob_get_contents());ob_end_clean(); ?>
<?php ob_start();
$_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'templates/common/primary_menu.tpl', 'smarty_include_vars' => array('submenutype' => 'flyover')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
$this->assign('primary_menu', ob_get_contents()); ob_end_clean();
 ?>
<?php ob_start();
$_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'templates/common/mobile_menu.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
$this->assign('mobile_menu', ob_get_contents()); ob_end_clean();
 ?>
<?php ob_start();
$_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'templates/common/sitelocation_json_ld.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
$this->assign('sitelocation_json_ld', ob_get_contents()); ob_end_clean();
 ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- normalize and html5 boilerplate resets -->
        <link rel="stylesheet" href="<?php echo ((is_array($_tmp='templates/Skyline_v2/resources/css/reset.css')) ? $this->_run_mod_handler('anticache', true, $_tmp) : smarty_modifier_anticache($_tmp)); ?>
">
        <link rel="stylesheet" href="<?php echo ((is_array($_tmp='templates/Skyline_v2/resources/css/less.build.css')) ? $this->_run_mod_handler('anticache', true, $_tmp) : smarty_modifier_anticache($_tmp)); ?>
">

        <!--[if lte IE 9]>
        <script src="<?php echo ((is_array($_tmp='templates/Skyline_v2/resources/js/html5shiv.js')) ? $this->_run_mod_handler('anticache', true, $_tmp) : smarty_modifier_anticache($_tmp)); ?>
"></script>
        <script src="<?php echo ((is_array($_tmp='templates/Skyline_v2/resources/js/html5shiv-printshiv.js')) ? $this->_run_mod_handler('anticache', true, $_tmp) : smarty_modifier_anticache($_tmp)); ?>
"></script>

        <![endif]-->

        <?php echo smarty_function_HEADER(array(), $this);?>

    </head>
    <body lang="<?php echo $this->_tpl_vars['locale']; ?>
">
        <?php echo $this->_tpl_vars['sitelocation_json_ld']; ?>

        <div id="sys_background" class="yola_bg_overlay">
            <div class="yola_inner_bg_overlay">
                <div class="yola_outer_content_wrapper">
                    <header role="header">
                        <div class="yola_outer_heading_wrap">
                            <div class="yola_heading_container">
                                <div class="yola_inner_heading_wrap <?php echo smarty_function_IFPROPERTY(array('format' => '%s','name' => 'header.alignment'), $this);?>
">
                                    <div class="yola_innermost_heading_wrap">
                                        <?php if (! empty ( $this->_tpl_vars['navigation'] )): ?>
                                        <nav class="mob_menu">
                                            <div class="mob_menu_toggle"><!--Mobile Nav Toggle-->
                                                <svg class="mobile_ham" width="40" height="25">
                                                  <line x1="0" y1="3" x2="40" y2="3" stroke-width="2"/>
                                                  <line x1="0" y1="13" x2="40" y2="13" stroke-width="2"/>
                                                  <line x1="0" y1="23" x2="40" y2="23" stroke-width="2"/>
                                                </svg>
                                                <svg class="mobile_quit" width="26" height="50">
                                                    <line x1="0" y1="1" x2="26" y2="25" stroke-width="2"/>
                                                    <line x1="0" y1="25" x2="26" y2="1" stroke-width="2"/>
                                                </svg>
                                            </div>
                                            <div class="mob_menu_overlay"> <!--Mobile Nav Overlay-->
                                                <?php echo $this->_tpl_vars['mobile_menu']; ?>

                                            </div>
                                        </nav>
                                        <?php endif; ?>
                                        <?php if ($this->_tpl_vars['header_alignment'] == 'bottom'): ?>
                                        <div id="yola_nav_block"> <!--Nav-->
                                            <nav role="navigation">
                                                <div class="sys_navigation">
                                                <?php echo $this->_tpl_vars['primary_menu']; ?>

                                                </div>
                                            </nav>
                                        </div>
                                        <div id="yola_heading_block"> <!--Title / Logo-->
                                            <h1>
                                                <a id="sys_heading" class="<?php if ($this->_tpl_vars['site_logo_src'] != ''): ?>yola_show_logo<?php else: ?>yola_hide_logo<?php endif; ?>" href="./">
                                                    <img class="yola_site_logo" src="<?php echo smarty_function_IFPROPERTY(array('format' => '%s','name' => 'site.logo.src','anticache' => 'true','urlencode' => 'true'), $this);?>
" alt="<?php echo smarty_function_IFPROPERTY(array('format' => '%s','name' => 'heading.text'), $this);?>
" >
                                                    <span><?php echo smarty_function_PROPERTY(array('name' => 'heading.text'), $this);?>
</span>
                                                </a>
                                            </h1>
                                        </div>
                                        <?php else: ?>
                                        <div id="yola_heading_block"> <!--Title / Logo-->
                                            <h1>
                                                <a id="sys_heading" class="<?php if ($this->_tpl_vars['site_logo_src'] != ''): ?>yola_show_logo<?php else: ?>yola_hide_logo<?php endif; ?>" href="./">
                                                    <img class="yola_site_logo" src="<?php echo smarty_function_IFPROPERTY(array('format' => '%s','name' => 'site.logo.src','anticache' => 'true','urlencode' => 'true'), $this);?>
" alt="<?php echo smarty_function_IFPROPERTY(array('format' => '%s','name' => 'heading.text'), $this);?>
" >
                                                    <span><?php echo smarty_function_PROPERTY(array('name' => 'heading.text'), $this);?>
</span>
                                                </a>
                                            </h1>
                                        </div>
                                        <div id="yola_nav_block"> <!--Nav-->
                                            <nav role="navigation">
                                                <div class="sys_navigation">
                                                <?php echo $this->_tpl_vars['primary_menu']; ?>

                                                </div>
                                            </nav>
                                        </div>
                                        <?php endif; ?>
                                        <div style="padding:0; height:0; clear:both;">&nbsp;</div>
                                    </div>
                                </div>
                            </div>
                            <div id="sys_banner" class="yola_banner_wrap">
                                <div class="yola_inner_banner_wrap">
                                    <div class="yola_innermost_banner_wrap">
                                        <h2 class="yola_site_tagline" style="display:<?php if ($this->_tpl_vars['site_tagline_text'] != ''): ?>block<?php else: ?>none<?php endif; ?>"><span><?php echo smarty_function_PROPERTY(array('name' => 'site.tagline.text'), $this);?>
</span></h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </header>

                    <main class="yola_content_wrap" role="main">
                        <div class="yola_content_column">
                            <div class="yola_inner_content_column clearFix">
                                <?php echo smarty_function_CONTENT(array(), $this);?>

                            </div>
                        </div>
                    </main>

                    <div class="yola_footer_wrap">
                        <div class="yola_footer_column">
                            <footer id="yola_style_footer">
                                <?php echo smarty_function_STYLE_FOOTER(array(), $this);?>

                            </footer>
                        </div>
                    </div>
                    <?php echo smarty_function_YOLACREDIT(array(), $this);?>

                    <?php echo smarty_function_TRACKING(array(), $this);?>

                </div>
            </div> <!-- .inner_bg_overlay -->
        </div> <!-- #sys_background / .bg_overlay -->
        <?php if (_SYSTEM_MODE == "DESIGN") { ?>
        <script src="<?php echo ((is_array($_tmp='templates/Skyline_v2/resources/js/sitebuilder.js')) ? $this->_run_mod_handler('anticache', true, $_tmp) : smarty_modifier_anticache($_tmp)); ?>
"></script>
        <?php } ?>
        <script src="<?php echo ((is_array($_tmp='templates/Skyline_v2/resources/js/')) ? $this->_run_mod_handler('anticache', true, $_tmp) : smarty_modifier_anticache($_tmp)); ?>
browserify.build.js"></script>
    </body>
</html>