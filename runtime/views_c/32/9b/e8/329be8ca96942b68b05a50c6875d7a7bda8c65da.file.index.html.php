<?php /* Smarty version Smarty-3.1.6, created on 2017-12-08 21:55:05
         compiled from "D:\xampp\htdocs\baijun\app\modes\admin\website\info\default\index.html" */ ?>
<?php /*%%SmartyHeaderCode:10705a2a99b9295842-05551964%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '329be8ca96942b68b05a50c6875d7a7bda8c65da' => 
    array (
      0 => 'D:\\xampp\\htdocs\\baijun\\app\\modes\\admin\\website\\info\\default\\index.html',
      1 => 1456243200,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10705a2a99b9295842-05551964',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'la' => 0,
    'sitetitle' => 0,
    'qcode' => 0,
    'fileid' => 0,
    'buttom' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5a2a99b933c6c',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a2a99b933c6c')) {function content_5a2a99b933c6c($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<body>
    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/top_menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<div class="clearfix">
    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/left_menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/kindeditor.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<div class='col-md-10'>
			<div class='panel'>
				<div class='panel-heading'>
					<strong><i class='icon-building'></i>  <?php echo $_smarty_tpl->tpl_vars['la']->value['info']['edit'];?>
</strong>
				</div>
				<div class='panel-body'>
				<form id='ajaxForm'
                    action='{:U('website/info/default/update.json')}' method='post'>
					<table class='table table-form' width="100%">
					<tr>
                          <th class="w-180px"><?php echo $_smarty_tpl->tpl_vars['la']->value['info']['sitetitle'];?>
</th>
                          <td>
                          <input type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['sitetitle']->value;?>
" id="sitetitle" name="data[sitetitle]">
                           </td>
                           <td>
                           </td>
                       </tr>
                       <?php if (!empty($_smarty_tpl->tpl_vars['qcode']->value)){?>
                       <tr>
                          <th rowspan="2"><?php echo $_smarty_tpl->tpl_vars['la']->value['info']['qcode'];?>
</th>
                          <td><img class="image" src="<?php echo $_smarty_tpl->tpl_vars['qcode']->value;?>
" style="max-width:800px;"></td>
                          <td><input type="hidden" name="data[fileids][]" value="<?php echo $_smarty_tpl->tpl_vars['fileid']->value;?>
"/></td>
                       </tr>
                       <?php }?>
                       <tr>
                          <?php if (empty($_smarty_tpl->tpl_vars['qcode']->value)){?><th ><?php echo $_smarty_tpl->tpl_vars['la']->value['info']['qcode'];?>
</th><?php }?>
                          <td>
                            <input type="file" class="form-control" tabindex="-1" id="files[]" name="files[]">
                          </td>
                          <td>
                            <label class="text-info"><?php echo $_smarty_tpl->tpl_vars['la']->value['file']['info'];?>
</label>
                          </td>
                       </tr>
					   <tr>
				          <th class='w-100px'><?php echo $_smarty_tpl->tpl_vars['la']->value['info']['buttom'];?>
</th>
				          <td colspan='2'>
                          <textarea name='data[buttom]' id='buttom' rows='6' class='form-control'><?php echo $_smarty_tpl->tpl_vars['buttom']->value;?>
</textarea>
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