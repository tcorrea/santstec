<?php /* Smarty version 2.6.25-dev, created on 2017-03-30 18:14:32
         compiled from templates/common/mobile_menu.tpl */ ?>
<ul class="mob_menu_list">
  <?php $_from = $this->_tpl_vars['navigation']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['menus'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['menus']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['v']):
        $this->_foreach['menus']['iteration']++;
?>
    <li class="<?php if ($this->_tpl_vars['v']['isCurrent']): ?>selected<?php endif; ?>">
      <a href="<?php echo $this->_tpl_vars['v']['href']; ?>
" title="<?php echo $this->_tpl_vars['v']['title']; ?>
"><?php echo $this->_tpl_vars['v']['name']; ?>
</a>
      <?php if (! empty ( $this->_tpl_vars['v']['children'] )): ?>
        <svg class="mob_more_toggle" x="0px" y="0px" height="24" width="24" viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve">
          <circle cx="12" cy="12" r="11" stroke-width="1.5" fill="none" />
          <line class="down_arrow" x1="5" y1="10" x2="12" y2="17" stroke-width="2" />
          <line class="down_arrow" x1="12" y1="17" x2="19" y2="10" stroke-width="2" />
          <line class="up_arrow" x1="5" y1="15" x2="12" y2="8" stroke-width="2" />
          <line class="up_arrow" x1="12" y1="8" x2="19" y2="15" stroke-width="2" />
        </svg>
        <ul class="mob_submenu_list">
          <?php $_from = $this->_tpl_vars['v']['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['sub']):
?>
            <li>
              <a class="mob_submenu_items" href="<?php echo $this->_tpl_vars['sub']['href']; ?>
" title="<?php echo $this->_tpl_vars['sub']['title']; ?>
"><?php echo $this->_tpl_vars['sub']['name']; ?>
</a>
            </li>
          <?php endforeach; endif; unset($_from); ?>
        </ul>
        <?php endif; ?>
    </li>
  <?php endforeach; endif; unset($_from); ?>
</ul>