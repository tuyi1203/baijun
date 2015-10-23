<?php /* Smarty version Smarty-3.1.6, created on 2015-10-22 11:03:49
         compiled from "D:\xampp\htdocs\baijun\app\modes\admin\module\script\add\index.html" */ ?>
<?php /*%%SmartyHeaderCode:70085628521585a017-54254915%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3fb4ce0f8d9837555798f824116c79b0a1603dda' => 
    array (
      0 => 'D:\\xampp\\htdocs\\baijun\\app\\modes\\admin\\module\\script\\add\\index.html',
      1 => 1418392944,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '70085628521585a017-54254915',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'la' => 0,
    'mode_options' => 0,
    'mode_choose' => 0,
    'module_options' => 0,
    'module_choose' => 0,
    'second_options' => 0,
    'second_choose' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_562852158fe09',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_562852158fe09')) {function content_562852158fe09($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include 'D:\\xampp\\htdocs\\baijun\\eku\\plugins\\smarty\\plugins\\function.html_options.php';
?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<body>
    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/top_menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


	<div class="clearfix">
    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/left_menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<div class='col-md-10'>
			<div class='panel'>
				<div class='panel-heading'>
					<strong><i class='icon-picture'></i>  <?php echo $_smarty_tpl->tpl_vars['la']->value['script']['edit'];?>
</strong>
				</div>
				<div class='panel-body'>
				<!-- <form id='sortForm'
					action='/chanzhieps/www/admin.php?m=slide&f=sort' method='post'>-->
				<form id='mixForm'
                    action='{:U('module/script/add/insert.json')}' method='post'>
					<table class='table table-form'>
					   <tr>
                          <th class='w-100px'><?php echo $_smarty_tpl->tpl_vars['la']->value['script']['mode'];?>
</th>
                          <td class='w-p40'>
                          <select name='data[mode]' id='mode' class='form-control chosen selectMode'>
							<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['mode_options']->value,'selected'=>$_smarty_tpl->tpl_vars['mode_choose']->value),$_smarty_tpl);?>

						  </select>
                            </td><td></td>
                       </tr>
                        <tr>
                          <th><?php echo $_smarty_tpl->tpl_vars['la']->value['script']['modulechoose'];?>
</th>
                          <td>
                           <select name='data[pid]' id='pid' class='form-control chosen selectModule'>
                               <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['module_options']->value,'selected'=>$_smarty_tpl->tpl_vars['module_choose']->value),$_smarty_tpl);?>

                           </select>
                            </td><td></td>
                       </tr>
                       <tr>
                          <th><?php echo $_smarty_tpl->tpl_vars['la']->value['script']['secondchoose'];?>
</th>
                          <td>
                           <select name='data[sid]' id='sid' class='form-control chosen selectSecond'>
                               <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['second_options']->value,'selected'=>$_smarty_tpl->tpl_vars['second_choose']->value),$_smarty_tpl);?>

                           </select>
                            </td><td></td>
                       </tr>
					   <tr>
				          <th><?php echo $_smarty_tpl->tpl_vars['la']->value['script']['name'];?>
</th>
				          <td colspan='2'>
				          <div class="required required-wrapper"></div>
				          <input type='text' name='data[name]' id='name' value='' class="form-control" />
				          </td>
				       </tr>
				       <tr>
                          <th><?php echo $_smarty_tpl->tpl_vars['la']->value['script']['des'];?>
</th>
                          <td colspan='2'>
                          <div class="required required-wrapper"></div>
                          <input type='text' name='data[des]' id='des' value='' class="form-control" />
                          </td>
                       </tr>
						<tr>
						 <th></th>
                         <td colspan='2'> <input type='submit' id='submit' class='btn btn-primary' value='<?php echo $_smarty_tpl->tpl_vars['la']->value['save'];?>
' data-loading='<?php echo $_smarty_tpl->tpl_vars['la']->value['loading'];?>
' /> </td>
                        </tr>
					</table>
				</form>
				</div>
			</div>
		</div>
	</div>
	<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['ex'][0][0]->export(array('fn'=>'exportJs'),$_smarty_tpl);?>

</body>
</html>
<?php }} ?>