<?php /* Smarty version Smarty-3.1.6, created on 2018-05-15 22:23:08
         compiled from "E:\wamp\www\baijun\app\views\site\aboutus.html" */ ?>
<?php /*%%SmartyHeaderCode:194625afaed4c598645-15019579%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'da4ef8334001bbf19753ab204aa119fb83bbb5f0' => 
    array (
      0 => 'E:\\wamp\\www\\baijun\\app\\views\\site\\aboutus.html',
      1 => 1472737020,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '194625afaed4c598645-15019579',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'MODULE_S' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5afaed4c657cf',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5afaed4c657cf')) {function content_5afaed4c657cf($_smarty_tpl) {?><div class="subnav">
	<a href="{:U('aboutus/intro')}" <?php if ($_smarty_tpl->tpl_vars['MODULE_S']->value=="intro"){?>class="cu"<?php }?>>事务所介绍</a><a href="{:U('aboutus/vision')}" <?php if ($_smarty_tpl->tpl_vars['MODULE_S']->value=="vision"){?>class="cu"<?php }?>>愿景及理念</a><a href="{:U('aboutus/duty')}" <?php if ($_smarty_tpl->tpl_vars['MODULE_S']->value=="duty"){?>class="cu"<?php }?>>社会责任</a><a href="{:U('aboutus/honor')}" <?php if ($_smarty_tpl->tpl_vars['MODULE_S']->value=="honor"){?>class="cu"<?php }?>>百君荣誉</a><a href="{:U('aboutus/album')}" <?php if ($_smarty_tpl->tpl_vars['MODULE_S']->value=="album"){?>class="cu"<?php }?>>百君文化</a><a href="{:U('aboutus/event')}" <?php if ($_smarty_tpl->tpl_vars['MODULE_S']->value=="event"){?>class="cu"<?php }?>>百君纪事</a>
</div><?php }} ?>