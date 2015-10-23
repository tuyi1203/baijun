<?php /* Smarty version Smarty-3.1.6, created on 2015-10-22 11:02:36
         compiled from "D:\xampp\htdocs\baijun\app\modes\admin\module\second\add\index.html" */ ?>
<?php /*%%SmartyHeaderCode:10013562851ccbad022-74828021%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '58bfb63bdd60846ca33abbe95bd95cdfa000609b' => 
    array (
      0 => 'D:\\xampp\\htdocs\\baijun\\app\\modes\\admin\\module\\second\\add\\index.html',
      1 => 1444457662,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10013562851ccbad022-74828021',
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
    'status_options' => 0,
    'status_choose' => 0,
    'ctrflg_options' => 0,
    'ctrflg_choose' => 0,
    'menuflg_options' => 0,
    'menuflg_choose' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_562851ccc9948',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_562851ccc9948')) {function content_562851ccc9948($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include 'D:\\xampp\\htdocs\\baijun\\eku\\plugins\\smarty\\plugins\\function.html_options.php';
?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<body>
    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/top_menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


	<div class="clearfix">
    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/left_menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<div class='col-md-10'>
			<div class='panel'>
				<div class='panel-heading'>
					<strong><i class='icon-plus'></i> <?php echo $_smarty_tpl->tpl_vars['la']->value['second']['plus'];?>
</strong>
				</div>
				<div class='panel-body'>
				<!-- <form id='sortForm'
					action='/chanzhieps/www/admin.php?m=slide&f=sort' method='post'>-->
				<form id='mixForm'
                    action='{:U('module/second/add/insert.json')}' method='post'>
					<table class='table table-form'>
					   <tr>
                          <th class='w-100px'><?php echo $_smarty_tpl->tpl_vars['la']->value['second']['mode'];?>
</th>
                          <td class='w-p40'>
                          <select name='data[mode]' id='mode' class='form-control chosen selectMode'>
							<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['mode_options']->value,'selected'=>$_smarty_tpl->tpl_vars['mode_choose']->value),$_smarty_tpl);?>

						  </select>
                            </td><td></td>
                       </tr>
                        <tr>
                          <th><?php echo $_smarty_tpl->tpl_vars['la']->value['second']['modulechoose'];?>
</th>
                          <td>
                           <select name='data[parentid]' id='parentid' class='form-control chosen selectModule'>
                               <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['module_options']->value,'selected'=>$_smarty_tpl->tpl_vars['module_choose']->value),$_smarty_tpl);?>

                           </select>
                            </td><td></td>
                       </tr>
					   <tr>
				          <th><?php echo $_smarty_tpl->tpl_vars['la']->value['second']['name'];?>
</th>
				          <td colspan='2'>
				          <div class="required required-wrapper"></div>
				          <input type='text' name='data[name]' id='name' value='' class="form-control" />
				          </td>
				       </tr>
				       <tr>
                          <th><?php echo $_smarty_tpl->tpl_vars['la']->value['second']['des'];?>
</th>
                          <td colspan='2'>
                          <div class="required required-wrapper"></div>
                          <input type='text' name='data[des]' id='des' value='' class="form-control" />
                          </td>
                       </tr>
                       <tr>
                          <th><?php echo $_smarty_tpl->tpl_vars['la']->value['second']['des_en'];?>
</th>
                          <td colspan='2'>
                          <div class="required required-wrapper"></div>
                          <input type='text' name='data[des_en]' id='des_en' value='' class="form-control" />
                          </td>
                       </tr>
                        <tr>
                          <th><?php echo $_smarty_tpl->tpl_vars['la']->value['second']['status'];?>
</th>
                          <td>
                          <select name='data[status]' id='status' class='form-control chosen'>
                            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['status_options']->value,'selected'=>$_smarty_tpl->tpl_vars['status_choose']->value),$_smarty_tpl);?>

                          </select>
                            </td><td></td>
                       </tr>
                       <tr>
                          <th><?php echo $_smarty_tpl->tpl_vars['la']->value['second']['ctrstatus'];?>
</th>
                          <td>
                          <select name='data[ctrflg]' id='ctrflg' class='form-control chosen'>
                            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['ctrflg_options']->value,'selected'=>$_smarty_tpl->tpl_vars['ctrflg_choose']->value),$_smarty_tpl);?>

                          </select>
                            </td><td></td>
                       </tr>
                       <tr>
                          <th><?php echo $_smarty_tpl->tpl_vars['la']->value['second']['menu'];?>
</th>
                          <td>
                          <select name='data[menuflg]' id='menuflg' class='form-control chosen'>
                            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['menuflg_options']->value,'selected'=>$_smarty_tpl->tpl_vars['menuflg_choose']->value),$_smarty_tpl);?>

                          </select>
                            </td><td></td>
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