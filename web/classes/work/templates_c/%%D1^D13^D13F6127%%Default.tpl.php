<?php /* Smarty version 2.6.25-dev, created on 2017-03-30 18:14:32
         compiled from /var/www/html/santstec.com.br/web/classes/components/Layout1/layouts/Default/Default.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'region', '/var/www/html/santstec.com.br/web/classes/components/Layout1/layouts/Default/Default.tpl', 59, false),)), $this); ?>
<?php echo ''; ?><?php if ($this->_tpl_vars['_SYSTEM_MODE'] == 'DESIGN'): ?><?php echo '<div class="sys_wrap_splt" id="'; ?><?php echo $this->_tpl_vars['properties']['id']; ?><?php echo '_splt" style="left:'; ?><?php echo $this->_tpl_vars['properties']['lw']; ?><?php echo '; ">&nbsp;</div><div class="sys_wrap_spacer_splt">'; ?><?php endif; ?><?php echo '<style>.column_'; ?><?php echo $this->_tpl_vars['widgetId']; ?><?php echo ' {width: 100%;-moz-box-sizing:border-box;-webkit-box-sizing: border-box;box-sizing:border-box;}.column_'; ?><?php echo $this->_tpl_vars['widgetId']; ?><?php echo ':after {content: "";display: table;clear: both;}.column_'; ?><?php echo $this->_tpl_vars['widgetId']; ?><?php echo ' .left {text-align: left;vertical-align: top;width: '; ?><?php echo $this->_tpl_vars['properties']['lw']; ?><?php echo ';padding: '; ?><?php echo $this->_tpl_vars['properties']['left_column']['padding']; ?><?php echo ';float: left;-moz-box-sizing: border-box;-webkit-box-sizing: border-box;box-sizing:border-box;}.column_'; ?><?php echo $this->_tpl_vars['widgetId']; ?><?php echo ' .right {vertical-align: top;width: '; ?><?php echo $this->_tpl_vars['properties']['rw']; ?><?php echo ';padding: '; ?><?php echo $this->_tpl_vars['properties']['right_column']['padding']; ?><?php echo ';float: left;-moz-box-sizing: border-box;-webkit-box-sizing: border-box;box-sizing: border-box;}'; ?><?php if (_MOBILE): ?><?php echo '@media only screen and (max-width: 950px) {#Left_'; ?><?php echo $this->_tpl_vars['widgetId']; ?><?php echo ',  #Right_'; ?><?php echo $this->_tpl_vars['widgetId']; ?><?php echo ' {display: block;width: 100%;float: left;margin: 0;-moz-box-sizing: border-box;-webkit-box-sizing: border-box;box-sizing: border-box;}}'; ?><?php endif; ?><?php echo '</style><div class="column_'; ?><?php echo $this->_tpl_vars['widgetId']; ?><?php echo ' column_divider" >'; ?><?php echo smarty_function_region(array('tagName' => 'div','name' => 'Left','description' => "",'defaultHeight' => '150px','class' => 'left'), $this);?><?php echo ''; ?><?php echo smarty_function_region(array('tagName' => 'div','name' => 'Right','description' => "",'defaultHeight' => '150px','class' => 'right'), $this);?><?php echo '</div>'; ?><?php if ($this->_tpl_vars['_SYSTEM_MODE'] == 'DESIGN'): ?><?php echo '</div>'; ?><?php endif; ?><?php echo ''; ?>
