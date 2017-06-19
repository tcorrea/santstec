<?php /* Smarty version 2.6.25-dev, created on 2017-03-30 18:18:36
         compiled from file:/var/www/html/santstec.com.br/web/classes/components/Form/layouts/Default/recaptcha.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'anticache', 'file:/var/www/html/santstec.com.br/web/classes/components/Form/layouts/Default/recaptcha.tpl', 10, false),)), $this); ?>
<div class="recaptcha-wrap">
    <span class="recaptcha-spin"></span>
    <div class="g-recaptcha" data-sitekey="<?php echo $this->_tpl_vars['siteKey']; ?>
" id="recaptcha-<?php echo $this->_tpl_vars['widgetId']; ?>
"></div>
</div>

<script>
    window.formWidgetRecaptchaQueue = window.formWidgetRecaptchaQueue || [];
    window.formWidgetRecaptchaQueue.push('recaptcha-<?php echo $this->_tpl_vars['widgetId']; ?>
');
</script>
<script src="<?php echo ((is_array($_tmp='classes/components/Form/layouts/Default/recaptcha.js')) ? $this->_run_mod_handler('anticache', true, $_tmp) : smarty_modifier_anticache($_tmp)); ?>
"></script>
<script src="https://www.google.com/recaptcha/api.js?onload=recaptchacb&render=explicit&hl=<?php echo $this->_tpl_vars['locale']; ?>
" async defer></script>