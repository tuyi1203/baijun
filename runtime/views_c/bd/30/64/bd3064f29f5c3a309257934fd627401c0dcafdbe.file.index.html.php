<?php /* Smarty version Smarty-3.1.6, created on 2017-12-08 21:52:23
         compiled from "D:\xampp\htdocs\baijun\app\modes\admin\module\first\default\index.html" */ ?>
<?php /*%%SmartyHeaderCode:30425a2a991779f9f5-23124430%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bd3064f29f5c3a309257934fd627401c0dcafdbe' => 
    array (
      0 => 'D:\\xampp\\htdocs\\baijun\\app\\modes\\admin\\module\\first\\default\\index.html',
      1 => 1444406400,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '30425a2a991779f9f5-23124430',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'la' => 0,
    'mode_options' => 0,
    'mode_choose' => 0,
    'list' => 0,
    'record' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5a2a99178c903',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a2a99178c903')) {function content_5a2a99178c903($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include 'D:\\xampp\\htdocs\\baijun\\eku\\plugins\\smarty\\plugins\\function.html_options.php';
?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<body>
    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/top_menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


	<div class="clearfix">
    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/left_menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<div class='col-md-10'>
			<div class='panel'>
				<div class='panel-heading'>
					<strong><i class='icon-picture'></i><?php echo $_smarty_tpl->tpl_vars['la']->value['first']['common'];?>
</strong>

					<div class='panel-actions'>
						<a href="{:U('module/first/add/default.html')}"
							class='btn btn-primary'><i class="icon-plus"></i><?php echo $_smarty_tpl->tpl_vars['la']->value['first']['create'];?>
</a>
					</div>
				</div>
				<!-- <form id='sortForm'
					action='/chanzhieps/www/admin.php?m=slide&f=sort' method='post'>-->
				<form id='sortForm'
                    action="{:U('module/first/default/update.json')}" method='post'>
                    <table class="table">
                          <tfoot>
                              <tr>
                                <td class='w-100px'>&nbsp;<?php echo $_smarty_tpl->tpl_vars['la']->value['first']['modechoose'];?>

                                </td>
                                <td colspan='5'>
                                    <select name='data[mode]' id='mode' class='selectMode'>
                                        <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['mode_options']->value,'selected'=>$_smarty_tpl->tpl_vars['mode_choose']->value),$_smarty_tpl);?>

                                    </select>
                                </td>
                                </tr>
                            </tfoot>
                    </table>
					<?php if (!empty($_smarty_tpl->tpl_vars['list']->value)){?>
					<table class='table table-hover table-bordered'>
						<thead>
							<tr class='text-center'>
								<th><?php echo $_smarty_tpl->tpl_vars['la']->value['first']['sort'];?>
</th>
								<th><?php echo $_smarty_tpl->tpl_vars['la']->value['first']['des'];?>
</th>
								<th><?php echo $_smarty_tpl->tpl_vars['la']->value['first']['des_en'];?>
</th>
								<th><?php echo $_smarty_tpl->tpl_vars['la']->value['first']['name'];?>
</th>
								<th><?php echo $_smarty_tpl->tpl_vars['la']->value['first']['status'];?>
</th>
								<th><?php echo $_smarty_tpl->tpl_vars['la']->value['first']['ctrstatus'];?>
</th>
								<th><?php echo $_smarty_tpl->tpl_vars['la']->value['first']['menu'];?>
</th>
								<th><?php echo $_smarty_tpl->tpl_vars['la']->value['first']['createby'];?>
</th>
								<th><?php echo $_smarty_tpl->tpl_vars['la']->value['actions'];?>
</th>
							</tr>
						</thead>
						<tbody>
							<?php  $_smarty_tpl->tpl_vars["record"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["record"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["record"]->key => $_smarty_tpl->tpl_vars["record"]->value){
$_smarty_tpl->tpl_vars["record"]->_loop = true;
?>
							<tr class='text-middle'>
								<td class='text-center'><i class='icon-arrow-up'></i> <i
									class='icon-arrow-down'></i> <input type='hidden'
									name='data[sort][<?php echo $_smarty_tpl->tpl_vars['record']->value['id'];?>
]' id='data[sort][<?php echo $_smarty_tpl->tpl_vars['record']->value['id'];?>
]'
									value='<?php echo $_smarty_tpl->tpl_vars['record']->value['sort'];?>
' /></td>
    							<td class='text-center'><?php echo $_smarty_tpl->tpl_vars['record']->value['des'];?>
</td>
    							<td class='text-center'><?php echo $_smarty_tpl->tpl_vars['record']->value['des_en'];?>
</td>
								<td class='text-center'><?php echo $_smarty_tpl->tpl_vars['record']->value['name'];?>
</td>
								<td class='text-center <?php if ($_smarty_tpl->tpl_vars['record']->value['status']=="1"){?>is-visible<?php }else{ ?>is-unvisible<?php }?>'><?php if ($_smarty_tpl->tpl_vars['record']->value['status']=="1"){?>启用<?php }else{ ?>停用<?php }?></td>
								<td class='text-center <?php if ($_smarty_tpl->tpl_vars['record']->value['ctrflg']=="1"){?>is-visible<?php }else{ ?>is-unvisible<?php }?>'><?php if ($_smarty_tpl->tpl_vars['record']->value['ctrflg']=="1"){?>可控<?php }else{ ?>不可控<?php }?></td>
								<td class='text-center <?php if ($_smarty_tpl->tpl_vars['record']->value['menuflg']=="1"){?>is-visible<?php }else{ ?>is-unvisible<?php }?>'><?php if ($_smarty_tpl->tpl_vars['record']->value['menuflg']=="1"){?>显示<?php }else{ ?>不显示<?php }?></td>
								<td class='text-center'><?php echo $_smarty_tpl->tpl_vars['record']->value['username'];?>
</td>
								<td class='text-center'><a
									href="{:U('module/first/edit/default.html?id=<?php echo $_smarty_tpl->tpl_vars['record']->value['id'];?>
')}"><?php echo $_smarty_tpl->tpl_vars['la']->value['edit'];?>
</a>
									<a href="{:U('module/first/default/delete/id/<?php echo $_smarty_tpl->tpl_vars['record']->value['id'];?>
.json')}"
									class='deleter'><?php echo $_smarty_tpl->tpl_vars['la']->value['delete'];?>
</a></td>
							</tr>
							<?php } ?>
						</tbody>
						<tfoot>
							<tr>
								<td colspan='6'>&nbsp; <input type='submit' id='submit'
									class='btn btn-primary' value='<?php echo $_smarty_tpl->tpl_vars['la']->value['first']['savesort'];?>
'
									data-loading='<?php echo $_smarty_tpl->tpl_vars['la']->value['loading'];?>
' />
								</td>
							</tr>
						</tfoot>
					</table>
					<?php }?>
				</form>
			</div>
		</div>
	</div>

	<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['ex'][0][0]->export(array('fn'=>'exportJs'),$_smarty_tpl);?>


</body>
</html>
<?php }} ?>