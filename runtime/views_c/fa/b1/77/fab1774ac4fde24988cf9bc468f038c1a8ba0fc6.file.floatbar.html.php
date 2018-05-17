<?php /* Smarty version Smarty-3.1.6, created on 2018-04-05 14:59:47
         compiled from "E:\wamp\www\baijun\app\views\site\floatbar.html" */ ?>
<?php /*%%SmartyHeaderCode:266335ac639e3747627-48489754%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fab1774ac4fde24988cf9bc468f038c1a8ba0fc6' => 
    array (
      0 => 'E:\\wamp\\www\\baijun\\app\\views\\site\\floatbar.html',
      1 => 1503244503,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '266335ac639e3747627-48489754',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ishome' => 0,
    'branches' => 0,
    'ls' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5ac639e37b8ac',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ac639e37b8ac')) {function content_5ac639e37b8ac($_smarty_tpl) {?><figure class="floatcontact" id="_floatcontact">
	<div class="contactbox" id="_contactBox">
		<a href="javascript:void(0);" class="boxarr _noLoading <?php if (!($_smarty_tpl->tpl_vars['ishome']->value)){?>boxarr_close<?php }?>" id="_contactContrl"></a>
		<div class="contact_branch"><?php  $_smarty_tpl->tpl_vars["ls"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["ls"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['branches']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["ls"]->key => $_smarty_tpl->tpl_vars["ls"]->value){
$_smarty_tpl->tpl_vars["ls"]->_loop = true;
?><a href="{:U('jigou/default/default/default',array('id'=><?php echo $_smarty_tpl->tpl_vars['ls']->value['id'];?>
))}"><?php echo $_smarty_tpl->tpl_vars['ls']->value['name'];?>
</a><?php } ?>
		</div>
		<div class="partion">
			<dl><dt>咨询电话/Tel</dt><dd>86 23-6762 1818</dd></dl>
			<dl>
				<dt>语言/Language</dt>
				<dd>
					<a href="#" id="_languageLnk" class="language_link _noLoading">中文/Chinese</a>
					<div class="hidelst" id="_hidelst"><a href="http://www.exceedon.net">中文/Chinese</a><a href="http://en.exceedon.net">英文/English</a><!-- <a href="#">德文/German</a> --></div>
				</dd>
			</dl>
		</div>
	</div>
</figure><?php }} ?>