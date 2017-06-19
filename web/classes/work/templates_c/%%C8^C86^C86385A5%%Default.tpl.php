<?php /* Smarty version 2.6.25-dev, created on 2017-03-30 18:14:32
         compiled from /var/www/html/santstec.com.br/web/classes/components/Text_2/layouts/Default/Default.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'TRANSLATE', '/var/www/html/santstec.com.br/web/classes/components/Text_2/layouts/Default/Default.tpl', 27, false),)), $this); ?>
<style type="text/css">
    div.sys_text_widget img.float-left{float:left;margin:10px 15px 10px 0;}
    div.sys_text_widget img.float-right{position:relative;margin:10px 0 10px 15px;}
    div.sys_text_widget img{margin:4px;}
    div.sys_text_widget {
        overflow: hidden;
        margin: 0;
        padding: 0;
        color: <?php echo $this->_tpl_vars['properties']['color']; ?>
;
        font: <?php echo $this->_tpl_vars['properties']['font']; ?>
;
        background-color: <?php echo $this->_tpl_vars['properties']['backgroundColor']; ?>
;
    }
</style>


<?php if ($this->_tpl_vars['safeMode'] == true && $this->_tpl_vars['system']['mode'] == 'DESIGN'): ?>

    <style type="text/css">
        div.yola_safe{position:relative;height:100px;text-align:center;}
        div.yola_safe div.yola_tl{position:absolute;top:10px;left:10px;}
        div.yola_safe div.yola_tr{position:absolute;top:10px;right:10px;}
        div.yola_safe div.yola_bl{position:absolute;bottom:10px;left:10px;}
        div.yola_safe div.yola_br{position:absolute;bottom:10px;right:10px;}
        div.yola_safe span.yola_text{display:inline-block;padding:10px 0 10px 40px;margin:33px 0 0 0;}
    </style>
    <div class="yola_safe">
        <span class="yola_text" style="background:url(/components/system/Text_2/icons/32x32.png) center left no-repeat;"><?php $this->_tag_stack[] = array('TRANSLATE', array()); $_block_repeat=true;smarty_block_TRANSLATE($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Text Widget<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_TRANSLATE($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></span>
        <div class="yola_tl"><?php $this->_tag_stack[] = array('TRANSLATE', array()); $_block_repeat=true;smarty_block_TRANSLATE($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Safe Mode<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_TRANSLATE($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></div>
        <div class="yola_tr"><?php $this->_tag_stack[] = array('TRANSLATE', array()); $_block_repeat=true;smarty_block_TRANSLATE($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Safe Mode<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_TRANSLATE($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></div>
        <div class="yola_bl"><?php $this->_tag_stack[] = array('TRANSLATE', array()); $_block_repeat=true;smarty_block_TRANSLATE($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Safe Mode<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_TRANSLATE($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></div>
        <div class="yola_br"><?php $this->_tag_stack[] = array('TRANSLATE', array()); $_block_repeat=true;smarty_block_TRANSLATE($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>Safe Mode<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo smarty_block_TRANSLATE($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></div>
    </div>

<?php else: ?>

    <?php echo '<div id="'; ?><?php echo $this->_tpl_vars['properties']['id']; ?><?php echo '_sys_txt" systemElement="true" class="sys_txt sys_text_widget new-text-widget">'; ?><?php if ($this->_tpl_vars['system']['mode'] == 'DESIGN'): ?><?php echo '<div id="'; ?><?php echo $this->_tpl_vars['properties']['id']; ?><?php echo '_sys_txt_frm_div">'; ?><?php echo $this->_tpl_vars['text']; ?><?php echo '</div><div style="clear:both"></div>'; ?><?php elseif (! $this->_tpl_vars['isDefault']): ?><?php echo ''; ?><?php echo $this->_tpl_vars['text']; ?><?php echo ''; ?><?php endif; ?><?php echo '</div>'; ?>


<?php endif; ?>