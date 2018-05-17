<?php /* Smarty version Smarty-3.1.6, created on 2017-12-08 21:52:29
         compiled from "D:\xampp\htdocs\baijun\app\modes\admin\manage\person\edit\index.html" */ ?>
<?php /*%%SmartyHeaderCode:271845a2a991d774bc7-62728538%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7e0dc547d27161afa6c86daff6b1d9e88eec1028' => 
    array (
      0 => 'D:\\xampp\\htdocs\\baijun\\app\\modes\\admin\\manage\\person\\edit\\index.html',
      1 => 1423670400,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '271845a2a991d774bc7-62728538',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'la' => 0,
    'accout' => 0,
    'id' => 0,
    'role_options' => 0,
    'role_choose' => 0,
    'name' => 0,
    'lock_options' => 0,
    'lock_choose' => 0,
    'status_options' => 0,
    'status_choose' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5a2a991d86487',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a2a991d86487')) {function content_5a2a991d86487($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_radios')) include 'D:\\xampp\\htdocs\\baijun\\eku\\plugins\\smarty\\plugins\\function.html_radios.php';
if (!is_callable('smarty_function_html_options')) include 'D:\\xampp\\htdocs\\baijun\\eku\\plugins\\smarty\\plugins\\function.html_options.php';
?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<body>
    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/kindeditor.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/top_menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<div class="clearfix">
    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/left_menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<div class='col-md-10'>
			<div class='panel'>
				<div class='panel-heading'>
					<strong><i class='icon-edit'></i>  <?php echo $_smarty_tpl->tpl_vars['la']->value['person']['edit'];?>
</strong>
				</div>
				<div class='panel-body'>
				<form id='ajaxForm'
                    action='{:U('manage/person/edit/update.json')}' method='post'>
					<table class='table table-form'>
					   <tr>
				          <th class='col-md-1 col-xs-2'><?php echo $_smarty_tpl->tpl_vars['la']->value['person']['account'];?>
</th>
				          <td class='w-200px'>
				          <div class="required required-wrapper"></div>
				          <input type='text' name='data[account]' id='account' value='<?php echo $_smarty_tpl->tpl_vars['accout']->value;?>
' class="form-control" />
				          </td>
				          <td class="w-500px">
				          <input type="hidden" name=data[id] value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" />
				          </td>
				       </tr>
                        <tr>
                          <th><?php echo $_smarty_tpl->tpl_vars['la']->value['person']['password'];?>
</th>
                          <td>
                          <div class="required required-wrapper"></div>
                            <input type='password' name='data[password]' id='password' value='' class="form-control" />
                          </td>
                          <td>  </td>
                        </tr>
                        <tr>
                          <th><?php echo $_smarty_tpl->tpl_vars['la']->value['person']['role'];?>
</th>
                          <td>
                            <?php echo smarty_function_html_radios(array('options'=>$_smarty_tpl->tpl_vars['role_options']->value,'name'=>"data[role]",'labels'=>true,'label_ids'=>true,'selected'=>$_smarty_tpl->tpl_vars['role_choose']->value,'separator'=>"<br/>"),$_smarty_tpl);?>

                          </td>
                          <td><label class="text-info"><?php echo $_smarty_tpl->tpl_vars['la']->value['person']['roleinfo'];?>
</label>
                          <input type="hidden" name="data[roleid]" value="<?php echo $_smarty_tpl->tpl_vars['role_choose']->value;?>
" /></td>
                        </tr>
                        <tr>
                          <th><?php echo $_smarty_tpl->tpl_vars['la']->value['person']['name'];?>
</th>
                          <td>
                          <div class="required required-wrapper"></div>
                            <input type='text' name='data[name]' id='name' value='<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
' class="form-control" />
                          </td>
                          <td>  </td>
                        </tr>
                         <tr>
                          <th class='w-100px'><?php echo $_smarty_tpl->tpl_vars['la']->value['person']['lock'];?>
</th>
                          <td class='w-p40'>
                          <?php echo smarty_function_html_radios(array('options'=>$_smarty_tpl->tpl_vars['lock_options']->value,'name'=>"data[lock]",'labels'=>true,'label_ids'=>true,'selected'=>$_smarty_tpl->tpl_vars['lock_choose']->value),$_smarty_tpl);?>

                            </td><td></td>
                       </tr>
                       <!--
                       <tr>
                          <th class='w-100px'><?php echo $_smarty_tpl->tpl_vars['la']->value['person']['status'];?>
</th>
                          <td class='w-p40'>
                          <select name='data[status]' id='status' class='form-control chosen'>
                            <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['status_options']->value,'selected'=>$_smarty_tpl->tpl_vars['status_choose']->value),$_smarty_tpl);?>

                          </select>
                            </td><td></td>
                       </tr>
                        -->
						<tr>
						 <th></th>
                         <td colspan='2'> <input type='submit' id='submit' class='btn btn-primary' value='<?php echo $_smarty_tpl->tpl_vars['la']->value['save'];?>
' data-loading='<?php echo $_smarty_tpl->tpl_vars['la']->value['loading'];?>
' />
                         &nbsp;&nbsp;&nbsp;<input type="button" onclick="location.href='{:U('manage/person')}'" value="返回" class="btn btn-default goback">
                         </td>

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