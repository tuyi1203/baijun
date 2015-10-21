<?php /* Smarty version Smarty-3.1.6, created on 2015-10-10 13:02:07
         compiled from "D:\xampp\htdocs\baijun\app\modes\admin\website\config\default\index.html" */ ?>
<?php /*%%SmartyHeaderCode:1855356189bcf724678-82555173%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '077728121cc947f3965a18ef12a4be279b3e4058' => 
    array (
      0 => 'D:\\xampp\\htdocs\\baijun\\app\\modes\\admin\\website\\config\\default\\index.html',
      1 => 1424748193,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1855356189bcf724678-82555173',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'la' => 0,
    'linklist' => 0,
    'link' => 0,
    'keywords' => 0,
    'optimize_options' => 0,
    'optimize_choose' => 0,
    'notice' => 0,
    'noticecontent' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_56189bcf83c5c',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56189bcf83c5c')) {function content_56189bcf83c5c($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_radios')) include 'D:\\xampp\\htdocs\\baijun\\eku\\plugins\\smarty\\plugins\\function.html_radios.php';
?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<body>
    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/kindeditor.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/switcher.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/top_menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<div class="clearfix">
    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/left_menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<div class='col-md-10'>
			<div class='panel'>
				<div class='panel-heading'>
					<strong><i class='icon-building'></i>  <?php echo $_smarty_tpl->tpl_vars['la']->value['config']['edit'];?>
</strong>
				</div>
				<div class='panel-body'>
				<form id='ajaxForm'
                    action='{:U('website/config/default/update.json')}' method='post'>
					<table class='table table-form'>
                     <?php  $_smarty_tpl->tpl_vars["link"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["link"]->_loop = false;
 $_smarty_tpl->tpl_vars["k"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['linklist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars["link"]->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["linklist"]['total'] = $_smarty_tpl->tpl_vars["link"]->total;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["linklist"]['iteration']=0;
foreach ($_from as $_smarty_tpl->tpl_vars["link"]->key => $_smarty_tpl->tpl_vars["link"]->value){
$_smarty_tpl->tpl_vars["link"]->_loop = true;
 $_smarty_tpl->tpl_vars["k"]->value = $_smarty_tpl->tpl_vars["link"]->key;
 $_smarty_tpl->tpl_vars['smarty']->value['foreach']["linklist"]['iteration']++;
?>
                        <tr>
                          <?php if ($_smarty_tpl->getVariable('smarty')->value['foreach']['linklist']['iteration']==1){?>
                          <th class='w-100px'  rowspan="<?php echo $_smarty_tpl->getVariable('smarty')->value['foreach']['linklist']['total'];?>
" ><?php echo $_smarty_tpl->tpl_vars['la']->value['config']['link'];?>
</th>
                          <?php }?>
                          <td>
                          <div class="required required-wrapper"></div>
                          <input type="text" class="form-control" value="<?php echo $_smarty_tpl->tpl_vars['link']->value['name'];?>
" id="friendlink_<?php echo $_smarty_tpl->tpl_vars['link']->value['id'];?>
" name="data[friendlink_<?php echo $_smarty_tpl->tpl_vars['link']->value['id'];?>
]">
                           </td>
                           <td>
                           </td>
                       </tr>
                     <?php } ?>
                        <tr>
                          <th class='w-100px' rowspan="2"><?php echo $_smarty_tpl->tpl_vars['la']->value['config']['filterkeywords'];?>
</th>
                          <td colspan='2'>
                          <textarea name='data[keywords]' id='keywords' rows='6' class='form-control'><?php echo $_smarty_tpl->tpl_vars['keywords']->value;?>
</textarea>
                           </td>
                       </tr>
                       <tr>
                            <td><label class="text-info"><?php echo $_smarty_tpl->tpl_vars['la']->value['config']['filterinfo'];?>
</label></td>
                            <td></td>
                       </tr>
                       <tr><th><?php echo $_smarty_tpl->tpl_vars['la']->value['config']['optimize'];?>
</th>
                       <td><?php echo smarty_function_html_radios(array('options'=>$_smarty_tpl->tpl_vars['optimize_options']->value,'name'=>"data[optimize]",'labels'=>true,'label_ids'=>true,'selected'=>$_smarty_tpl->tpl_vars['optimize_choose']->value),$_smarty_tpl);?>
</td>
                       <td><!-- <label class="text-info"><?php echo $_smarty_tpl->tpl_vars['la']->value['config']['optimizeinfo'];?>
</label> --></td>
                       </tr>
                       <tr><th><?php echo $_smarty_tpl->tpl_vars['la']->value['config']['homepagenotice'];?>
</th>
                       <td><input type="checkbox" name="data[homepagenotice]" data-size="small" data-on-color="success" data-on-text="开启" data-off-text="关闭" <?php if (!empty($_smarty_tpl->tpl_vars['notice']->value)){?>checked="checked"<?php }?>></td>
                       <td><!-- <label class="text-info"><?php echo $_smarty_tpl->tpl_vars['la']->value['config']['optimizeinfo'];?>
</label> --></td>
                       </tr>
                       <tr class="contenttr">
                       <th><?php echo $_smarty_tpl->tpl_vars['la']->value['config']['content'];?>
</th>
                       <td colspan="2"><div class="required required-wrapper"></div>
                          <textarea name='data[content]' id='content' rows='10' class='form-control'><?php echo $_smarty_tpl->tpl_vars['noticecontent']->value;?>
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