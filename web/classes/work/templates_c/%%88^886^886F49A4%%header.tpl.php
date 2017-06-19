<?php /* Smarty version 2.6.25-dev, created on 2017-03-30 18:14:32
         compiled from /var/www/html/santstec.com.br/web/classes/commons/lib/smarty_plugins/snippits/header.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', '/var/www/html/santstec.com.br/web/classes/commons/lib/smarty_plugins/snippits/header.tpl', 2, false),array('modifier', 'anticache', '/var/www/html/santstec.com.br/web/classes/commons/lib/smarty_plugins/snippits/header.tpl', 84, false),)), $this); ?>
<?php if ($this->_tpl_vars['header']['googleWebmaster']['enabled']): ?>
  <meta name="google-site-verification" content="<?php echo ((is_array($_tmp=$this->_tpl_vars['header']['googleWebmaster']['content'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
<?php endif; ?>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />

<?php if ($this->_tpl_vars['header']['base_url']): ?>
  <base href="<?php echo $this->_tpl_vars['header']['base_url']; ?>
" />
<?php endif; ?>

<?php echo $this->_tpl_vars['header']['crawlTrigger']; ?>


<title><?php echo ((is_array($_tmp=$this->_tpl_vars['header']['pageTitle'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</title>

<?php $_from = $this->_tpl_vars['header']['dns_prefetch_urls']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['url']):
?>
  <link rel="dns-prefetch" href="<?php echo $this->_tpl_vars['url']; ?>
">
<?php endforeach; endif; unset($_from); ?>

<?php if ($this->_tpl_vars['header']['rss']['enabled']): ?>
  <link rel="alternate" type="application/rss+xml" title="<?php echo ((is_array($_tmp=$this->_tpl_vars['header']['pageTitle'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
 RSS feed" href="<?php echo $this->_tpl_vars['header']['rss']['url']; ?>
" />
<?php endif; ?>

<meta name="description" content="<?php echo ((is_array($_tmp=$this->_tpl_vars['header']['meta']['description'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />
<meta name="keywords" content="<?php echo ((is_array($_tmp=$this->_tpl_vars['header']['meta']['keywords'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" />

<?php if ($this->_tpl_vars['header']['favicon']): ?>
  <link href="<?php echo ((is_array($_tmp=$this->_tpl_vars['header']['favicon'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" rel="shortcut icon" type="image/x-icon" />
  <link href="<?php echo ((is_array($_tmp=$this->_tpl_vars['header']['favicon'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" rel="icon" type="image/x-icon" />
<?php endif; ?>

<?php if ($this->_tpl_vars['header']['customTracking']['enabled']): ?>
  <!-- Start of user defined header tracking codes -->
  <?php echo $this->_tpl_vars['header']['customTracking']['content']; ?>

  <!-- End of user defined header tracking codes -->
<?php endif; ?>

<?php if ($this->_tpl_vars['header']['defaultCss']['enabled']): ?>
  <style type="text/css" id="styleCSS">
    <?php echo $this->_tpl_vars['header']['defaultCss']['content']; ?>

  </style>
<?php endif; ?>

<?php if ($this->_tpl_vars['header']['cssOverrides']['enabled']): ?>
  <style id="yola-user-css-overrides" type="text/css">
    <?php echo $this->_tpl_vars['header']['cssOverrides']['content']; ?>

  </style>
<?php endif; ?>

<script src="//ajax.googleapis.com/ajax/libs/webfont/1.4.2/webfont.js" type="text/javascript"></script>

<?php if ($this->_tpl_vars['header']['styleDesigner']['enabled']): ?>
  <?php if ($this->_tpl_vars['header']['styleDesigner']['fonts']): ?>
    <style type="text/css">
      @import url("//fonts.googleapis.com/css?family=<?php echo $this->_tpl_vars['header']['styleDesigner']['fonts']; ?>
");
    </style>
  <?php endif; ?>

  <style type="text/css" id="styleOverrides">
    <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['header']['siteStylePath'], 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
  </style>

  <?php if (@_SYSTEM_MODE == 'DESIGN'): ?>
    <script id="styleTemplate" type="text/x-handlebars-template">
      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['header']['templateCssPath'], 'smarty_include_vars' => array('templatemode' => 'DESIGN')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
      <?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => $this->_tpl_vars['header']['siteStylePath'], 'smarty_include_vars' => array('templatemode' => 'DESIGN')));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
    </script>
  <?php endif; ?>
<?php endif; ?>

<?php if ($this->_tpl_vars['header']['legacyFonts']['enabled']): ?>
  <style id="yola-css-fonts-overrides" type="text/css">
    <?php echo $this->_tpl_vars['header']['legacyFonts']['fonts']; ?>

  </style>
<?php endif; ?>


<?php $_from = $this->_tpl_vars['header']['dynamicCssComponents']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['component']):
?>
  /* CSS for <?php echo $this->_tpl_vars['component']['className']; ?>
 component (<?php echo $this->_tpl_vars['component']['propertiesId']; ?>
) */
  <style type="text/css">
    <?php echo $this->_tpl_vars['component']['styleTemplate']; ?>

  </style>
<?php endforeach; endif; unset($_from); ?>

<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script type="text/javascript">window.jQuery || document.write('<script src="<?php echo ((is_array($_tmp='/components/bower_components/jquery/dist/jquery.js')) ? $this->_run_mod_handler('anticache', true, $_tmp) : smarty_modifier_anticache($_tmp)); ?>
"><\/script>')</script>
<link rel="stylesheet" type="text/css" href="<?php echo ((is_array($_tmp='classes/commons/resources/flyoutmenu/flyoutmenu.css')) ? $this->_run_mod_handler('anticache', true, $_tmp) : smarty_modifier_anticache($_tmp)); ?>
" />
<script type="text/javascript" src="<?php echo ((is_array($_tmp='classes/commons/resources/flyoutmenu/flyoutmenu.js')) ? $this->_run_mod_handler('anticache', true, $_tmp) : smarty_modifier_anticache($_tmp)); ?>
"></script>
<link rel="stylesheet" type="text/css" href="<?php echo ((is_array($_tmp='classes/commons/resources/global/global.css')) ? $this->_run_mod_handler('anticache', true, $_tmp) : smarty_modifier_anticache($_tmp)); ?>
" />

<script type="text/javascript">
  var swRegisterManager = {
    goals: [],
    add: function(swGoalRegister) {
      this.goals.push(swGoalRegister);
    },
    registerGoals: function() {
      while(this.goals.length) {
        this.goals.shift().call();
      }
    }
  };

  window.swPostRegister = swRegisterManager.registerGoals.bind(swRegisterManager);
</script>

<?php $_from = $this->_tpl_vars['header']['component_classes']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['component_class']):
?>
  <?php echo $this->_tpl_vars['component_class']['css_include']; ?>

  <?php echo $this->_tpl_vars['component_class']['header_tpl']; ?>

<?php endforeach; endif; unset($_from); ?>