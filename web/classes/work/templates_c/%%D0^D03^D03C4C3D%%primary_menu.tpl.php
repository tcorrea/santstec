<?php /* Smarty version 2.6.25-dev, created on 2017-03-30 18:14:32
         compiled from templates/common/primary_menu.tpl */ ?>
<ul class="sys_navigation">
    <?php $_from = $this->_tpl_vars['navigation']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['menus'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['menus']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['v']):
        $this->_foreach['menus']['iteration']++;
?>
        <?php if ($this->_tpl_vars['v']['isCurrent']): ?>
        <li id="ys_menu_<?php echo ($this->_foreach['menus']['iteration']-1); ?>
"class="selected">
        <?php else: ?>
        <li id="ys_menu_<?php echo ($this->_foreach['menus']['iteration']-1); ?>
">
        <?php endif; ?>
            <a href="<?php echo $this->_tpl_vars['v']['href']; ?>
" title="<?php echo $this->_tpl_vars['v']['title']; ?>
"><?php echo $this->_tpl_vars['v']['name']; ?>
</a>
        </li>
    <?php endforeach; endif; unset($_from); ?>
</ul>
<?php if ($this->_tpl_vars['submenutype'] == 'flyover' || $this->_tpl_vars['submenutype'] == 'flyover_vertical'): ?>
<script>
/* jshint ignore:start */
$(document).ready(function() {
    flyoutMenu.initFlyoutMenu(
        <?php echo $this->_tpl_vars['navigationJSON']; ?>

    , '<?php echo $this->_tpl_vars['submenutype']; ?>
');
});
/* jshint ignore:end */
</script>
<?php endif; ?>