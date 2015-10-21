<?php /* Smarty version Smarty-3.1.6, created on 2015-10-20 15:50:48
         compiled from "D:\xampp\htdocs\baijun\app\modes\admin\news\officenews\add\index.html" */ ?>
<?php /*%%SmartyHeaderCode:289295625f09bde7648-56386598%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '901f7648db26f8e4becaf6c4009be9b8497897ee' => 
    array (
      0 => 'D:\\xampp\\htdocs\\baijun\\app\\modes\\admin\\news\\officenews\\add\\index.html',
      1 => 1445327447,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '289295625f09bde7648-56386598',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5625f09be8c57',
  'variables' => 
  array (
    'la' => 0,
    'publishtime' => 0,
    'status_options' => 0,
    'status_choose' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5625f09be8c57')) {function content_5625f09be8c57($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_radios')) include 'D:\\xampp\\htdocs\\baijun\\eku\\plugins\\smarty\\plugins\\function.html_radios.php';
?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<body>
    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/datepicker.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/kindeditor.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/top_menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


	<div class="clearfix">
    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/left_menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<div class='col-md-10'>
			<div class='panel'>
				<div class='panel-heading'>
					<strong><i class='icon-plus'></i>&nbsp;<?php echo $_smarty_tpl->tpl_vars['la']->value['officenews']['create'];?>
</strong>
				</div>
				<div class='panel-body'>
				<!-- <form id='sortForm'
					action='/chanzhieps/www/admin.php?m=slide&f=sort' method='post'>-->
				<form id='ajaxForm'
                    action='{:U('news/officenews/add/insert.json')}' method='post'>
					<table class='table table-form'>
					   <tr>
				          <th class='w-100px'><?php echo $_smarty_tpl->tpl_vars['la']->value['officenews']['title'];?>
</th>
				          <td colspan='2'>
				          <div class="required required-wrapper"></div>
				          <input type='text' name='data[title]' id='title' value='' class="form-control" />
				          </td>
				       </tr>
				       <tr>
                          <th><?php echo $_smarty_tpl->tpl_vars['la']->value['officenews']['keyword'];?>
</th>
                          <td colspan='2'>
                          <div class=""></div>
                          <input type='text' name='data[keyword]' id='keyword' value='' class="form-control" />
                          </td>
                       </tr>
                        <tr>
                          <th><?php echo $_smarty_tpl->tpl_vars['la']->value['officenews']['summary'];?>
</th>
                          <td colspan='2'>
                          <textarea name='data[summary]' id='summary' rows='2' class='form-control'></textarea>
                            </td>
                       </tr>
                       <tr>
				          <th><?php echo $_smarty_tpl->tpl_vars['la']->value['officenews']['content'];?>
</th>
				          <td colspan='2'>
				          <div class="required required-wrapper"></div>
				          <textarea name='data[content]' id='content' rows='10' class='form-control'></textarea>
				           </td>
					   </tr>
					   <tr>
				          <th><?php echo $_smarty_tpl->tpl_vars['la']->value['officenews']['publishtime'];?>
</th>
				          <td>
				            <div class="input-append">
				              <input type='text' name='data[publishtime]' id='publishtime' value='<?php echo $_smarty_tpl->tpl_vars['publishtime']->value;?>
' class='form-control date' style="width:200px;"/>
				              <!-- <span class='officenews-on'><button class="btn btn-default" type="button"><i class="icon-calendar"></i></button></span> -->
				            </div>
				          </td>
				          <td><span class="help-inline"><?php echo $_smarty_tpl->tpl_vars['la']->value['article']['note']['addedDate'];?>
</span></td>
				        </tr>
				        <tr>
				          <th><?php echo $_smarty_tpl->tpl_vars['la']->value['officenews']['status'];?>
</th>
				          <td>
				          <?php echo smarty_function_html_radios(array('options'=>$_smarty_tpl->tpl_vars['status_options']->value,'name'=>"data[status]",'labels'=>true,'label_ids'=>true,'selected'=>$_smarty_tpl->tpl_vars['status_choose']->value),$_smarty_tpl);?>

						</td>
				        </tr>
						<tr>
						 <th></th>
                         <td colspan='2'><input type='submit' id='submit' class='btn btn-primary' value='<?php echo $_smarty_tpl->tpl_vars['la']->value['save'];?>
' data-loading='<?php echo $_smarty_tpl->tpl_vars['la']->value['loading'];?>
' />
                         &nbsp;&nbsp;&nbsp;<input type="button" class="btn btn-default goback" value="<?php echo $_smarty_tpl->tpl_vars['la']->value['goback'];?>
" onclick="location.href='{:U('news/officenews')}'">
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