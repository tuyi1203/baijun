<?php /* Smarty version Smarty-3.1.6, created on 2015-10-10 12:02:31
         compiled from "D:\xampp\htdocs\baijun\app\views\site\floatdiv.html" */ ?>
<?php /*%%SmartyHeaderCode:2973456188dd748a9a7-76058332%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0b7f1947f5fc2af560472fd9932fe1955b1f406e' => 
    array (
      0 => 'D:\\xampp\\htdocs\\baijun\\app\\views\\site\\floatdiv.html',
      1 => 1431313450,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2973456188dd748a9a7-76058332',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'qcode' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_56188dd74924a',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56188dd74924a')) {function content_56188dd74924a($_smarty_tpl) {?><div class="floatDiv">
    <ul>
    <li class="qq"><a href="javascript:void(0);" onClick="window.open('tencent://message/?uin=407578371');"></a></li>
    <li class="weixin" id="weixin"><a href="javascript:void(0);"></a><div class="box"><img src="<?php echo $_smarty_tpl->tpl_vars['qcode']->value;?>
" /><p>扫一扫,关注官方微信</p></div></li>
    <li class="weibo"><a href="http://weibo.com/5388346201" target="_blank"></a></li>
    <li class="backtop"><a href="javascript:void(0);" id="backTop"></a></li>
    </ul>
</div><?php }} ?>