<?php /* Smarty version Smarty-3.1.6, created on 2017-12-08 21:49:30
         compiled from "D:\xampp\htdocs\baijun\app\modes\admin\aboutus\intro\default\index.html" */ ?>
<?php /*%%SmartyHeaderCode:58285a2a986a717040-24434256%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c521c71506965ff71b197ee02ee7fb762cb9f68f' => 
    array (
      0 => 'D:\\xampp\\htdocs\\baijun\\app\\modes\\admin\\aboutus\\intro\\default\\index.html',
      1 => 1446566400,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '58285a2a986a717040-24434256',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'la' => 0,
    'title' => 0,
    'id' => 0,
    'keyword' => 0,
    'summary' => 0,
    'content' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5a2a986a819a4',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a2a986a819a4')) {function content_5a2a986a819a4($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<body>
	<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/kindeditor.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/top_menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


	<div class="clearfix">
    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/left_menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<div class='col-md-10'>
			<div class='panel'>
				<div class='panel-heading'>
					<strong><i class='icon-edit'></i> <?php echo $_smarty_tpl->tpl_vars['la']->value['intro']['edit'];?>
</strong>
				</div>
				<div class='panel-body'>
				<!-- <form id='sortForm'
					action='/chanzhieps/www/admin.php?m=slide&f=sort' method='post'>-->
				<form id='ajaxForm'
                    action='{:U('aboutus/intro/default/update.json')}' method='post'>
					<table class='table table-form'>
					   <tr>
				          <th class='w-100px'><?php echo $_smarty_tpl->tpl_vars['la']->value['intro']['title'];?>
</th>
				          <td colspan='2'>
				          <input type='text' name='data[title]' id='title' value='<?php echo $_smarty_tpl->tpl_vars['title']->value;?>
' class="form-control" />
				          <input type="hidden" name="data[id]" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" />
				          </td>
				       </tr>
				       <tr>
                          <th><?php echo $_smarty_tpl->tpl_vars['la']->value['intro']['keyword'];?>
</th>
                          <td colspan='2'>
                          <div class=""></div>
                          <input type='text' name='data[keyword]' id='keyword' value='<?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
' class="form-control" />
                          </td>
                       </tr>
                        <tr>
                          <th><?php echo $_smarty_tpl->tpl_vars['la']->value['intro']['summary'];?>
</th>
                          <td colspan='2'>
                          <textarea name='data[summary]' id='summary' rows='2' class='form-control'><?php echo $_smarty_tpl->tpl_vars['summary']->value;?>
</textarea>
                            </td>
                       </tr>
                       <tr>
				          <th><?php echo $_smarty_tpl->tpl_vars['la']->value['intro']['content'];?>
</th>
				          <td colspan='2'>
				          <div class="required required-wrapper"></div>
				          <textarea name='data[content]' id='content' rows='10' class='form-control'><?php echo $_smarty_tpl->tpl_vars['content']->value;?>
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