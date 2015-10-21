<?php /* Smarty version Smarty-3.1.6, created on 2015-10-10 12:02:31
         compiled from "D:\xampp\htdocs\baijun\app\views\site\rolling.html" */ ?>
<?php /*%%SmartyHeaderCode:1111256188dd7433cc2-07167647%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f19e98fe3c61baca8a89c07bf5d934b69ca7f866' => 
    array (
      0 => 'D:\\xampp\\htdocs\\baijun\\app\\views\\site\\rolling.html',
      1 => 1424831547,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1111256188dd7433cc2-07167647',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'rollinglist' => 0,
    'ls' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_56188dd744ce7',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56188dd744ce7')) {function content_56188dd744ce7($_smarty_tpl) {?><div class="rolling">
        <b><i class="mwIcon">&#xf0a1;</i>滚动公告：</b>
        <div class="rollingLst">
            <ul id="rolling_list">
            <?php  $_smarty_tpl->tpl_vars["ls"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["ls"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['rollinglist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["ls"]->key => $_smarty_tpl->tpl_vars["ls"]->value){
$_smarty_tpl->tpl_vars["ls"]->_loop = true;
?>
                <li><a href="<?php if ($_smarty_tpl->tpl_vars['ls']->value['objecttype']=="notice"){?>{:U('information/notice/detail/default/<?php echo $_smarty_tpl->tpl_vars['ls']->value['id'];?>
.html')}<?php }else{ ?>{:U('information/waterstop/detail/default/<?php echo $_smarty_tpl->tpl_vars['ls']->value['id'];?>
.html')}<?php }?>"><?php echo $_smarty_tpl->tpl_vars['ls']->value['title'];?>
</a></li>
            <?php } ?>
            </ul>
        </div>
    </div><?php }} ?>