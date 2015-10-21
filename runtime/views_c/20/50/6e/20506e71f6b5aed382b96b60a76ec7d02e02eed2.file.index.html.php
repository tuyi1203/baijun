<?php /* Smarty version Smarty-3.1.6, created on 2015-10-10 14:22:21
         compiled from "D:\xampp\htdocs\baijun\app\modes\admin\module\second\edit\index.html" */ ?>
<?php /*%%SmartyHeaderCode:82025618adc1a42d26-39941382%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '20506e71f6b5aed382b96b60a76ec7d02e02eed2' => 
    array (
      0 => 'D:\\xampp\\htdocs\\baijun\\app\\modes\\admin\\module\\second\\edit\\index.html',
      1 => 1444458137,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '82025618adc1a42d26-39941382',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5618adc1b25de',
  'variables' => 
  array (
    'la' => 0,
    'mode' => 0,
    'mode_options' => 0,
    'mode_choose' => 0,
    'id' => 0,
    'pid' => 0,
    'pname' => 0,
    'pdes' => 0,
    'name' => 0,
    'pdes_en' => 0,
    'status_options' => 0,
    'status_choose' => 0,
    'ctrflg_options' => 0,
    'ctrflg_choose' => 0,
    'menuflg_options' => 0,
    'menuflg_choose' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5618adc1b25de')) {function content_5618adc1b25de($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include 'D:\\xampp\\htdocs\\baijun\\eku\\plugins\\smarty\\plugins\\function.html_options.php';
?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<body>
    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/top_menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


	<div class="clearfix">
    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/left_menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<div class='col-md-10'>
			<div class='panel'>
				<div class='panel-heading'>
					<strong><i class='icon-picture'></i><?php echo $_smarty_tpl->tpl_vars['la']->value['second']['edit'];?>
</strong>
				</div>
				<div class='panel-body'>
				<!-- <form id='sortForm'
					action='/chanzhieps/www/admin.php?m=slide&f=sort' method='post'>-->
				<form id='ajaxForm'
                    action='{:U('module/second/edit/update.json')}' method='post'>
					<table class='table table-form'>
					   <tr>
                          <th class='w-100px'><?php echo $_smarty_tpl->tpl_vars['la']->value['second']['mode'];?>
</th>
                          <td class='w-p40'><?php echo $_smarty_tpl->tpl_vars['mode']->value;?>
<!--
                          <select name='data[mode]' id='mode' class='form-control chosen'>
							<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['mode_options']->value,'selected'=>$_smarty_tpl->tpl_vars['mode_choose']->value),$_smarty_tpl);?>

						  </select> -->
                            </td><td>
                            <input type="hidden" name="data[mode]" value="<?php echo $_smarty_tpl->tpl_vars['mode']->value;?>
">
                            <input type="hidden" name="data[id]" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
">
                            <input type="hidden" name="data[parentid]" value="<?php echo $_smarty_tpl->tpl_vars['pid']->value;?>
">
                            <input type="hidden" name="data[parentname]" value="<?php echo $_smarty_tpl->tpl_vars['pname']->value;?>
">
                            </td>
                       </tr>
                        <tr>
                          <th class='w-100px'><?php echo $_smarty_tpl->tpl_vars['la']->value['second']['pmodule'];?>
</th>
                          <td class='w-p40'><?php echo $_smarty_tpl->tpl_vars['pdes']->value;?>
(<?php echo $_smarty_tpl->tpl_vars['pname']->value;?>
)
                            </td><td></td>
                       </tr>
					   <tr>
				          <th><?php echo $_smarty_tpl->tpl_vars['la']->value['second']['name'];?>
</th>
				          <td colspan='2'>
				          <div class="required required-wrapper"></div>
				          <input type='text' name='data[name]' id='name' value='<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
' class="form-control" />
				          </td>
				       </tr>
				       <tr>
                          <th><?php echo $_smarty_tpl->tpl_vars['la']->value['second']['des'];?>
</th>
                          <td colspan='2'>
                          <div class="required required-wrapper"></div>
                          <input type='text' name='data[des]' id='des' value='<?php echo $_smarty_tpl->tpl_vars['pdes']->value;?>
' class="form-control" />
                          </td>
                       </tr>
                       <tr>
                          <th><?php echo $_smarty_tpl->tpl_vars['la']->value['second']['des_en'];?>
</th>
                          <td colspan='2'>
                          <div class="required required-wrapper"></div>
                          <input type='text' name='data[des_en]' id='des_en' value='<?php echo $_smarty_tpl->tpl_vars['pdes_en']->value;?>
' class="form-control" />
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