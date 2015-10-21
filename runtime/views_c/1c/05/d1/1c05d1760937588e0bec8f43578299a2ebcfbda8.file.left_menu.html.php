<?php /* Smarty version Smarty-3.1.6, created on 2015-10-10 12:37:02
         compiled from "D:\xampp\htdocs\baijun\app\views\admin\left_menu.html" */ ?>
<?php /*%%SmartyHeaderCode:31161561895eef11dd5-43840817%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1c05d1760937588e0bec8f43578299a2ebcfbda8' => 
    array (
      0 => 'D:\\xampp\\htdocs\\baijun\\app\\views\\admin\\left_menu.html',
      1 => 1418393009,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31161561895eef11dd5-43840817',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MENUINNER' => 0,
    'MODULE_S' => 0,
    'MENU' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_561895eef2b0c',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_561895eef2b0c')) {function content_561895eef2b0c($_smarty_tpl) {?><div class='col-md-2'>
    <ul class='nav nav-primary nav-stacked leftmenu affix'>
        <?php  $_smarty_tpl->tpl_vars["MENU"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["MENU"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['MENUINNER']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["MENU"]->key => $_smarty_tpl->tpl_vars["MENU"]->value){
$_smarty_tpl->tpl_vars["MENU"]->_loop = true;
?>
        <li <?php if ($_smarty_tpl->tpl_vars['MODULE_S']->value==$_smarty_tpl->tpl_vars['MENU']->value['name']){?>class='active'<?php }?>><a
            href='<?php echo $_smarty_tpl->tpl_vars['MENU']->value['url'];?>
'><?php echo $_smarty_tpl->tpl_vars['MENU']->value['des'];?>
<i class="icon-chevron-right"></i></a>
        </li> <?php } ?>
    </ul>
</div><?php }} ?>