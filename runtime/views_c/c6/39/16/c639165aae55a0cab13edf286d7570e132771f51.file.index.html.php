<?php /* Smarty version Smarty-3.1.6, created on 2015-10-10 13:22:08
         compiled from "D:\xampp\htdocs\baijun\app\modes\admin\customer\message\default\index.html" */ ?>
<?php /*%%SmartyHeaderCode:129925618a080524e51-23234873%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c639165aae55a0cab13edf286d7570e132771f51' => 
    array (
      0 => 'D:\\xampp\\htdocs\\baijun\\app\\modes\\admin\\customer\\message\\default\\index.html',
      1 => 1439870816,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '129925618a080524e51-23234873',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'la' => 0,
    'list' => 0,
    'orderby' => 0,
    'sort' => 0,
    'currpage' => 0,
    'activesorting' => 0,
    'sorting' => 0,
    'kv' => 0,
    'publishauth' => 0,
    'pagelink' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5618a08063966',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5618a08063966')) {function content_5618a08063966($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<body>
    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/top_menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


	<div class="clearfix">
    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/left_menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<div class='col-md-10'>
			<div class='panel'>
				<div class='panel-heading'>
					<strong><i class='icon-list-ul'></i>&nbsp;<?php echo $_smarty_tpl->tpl_vars['la']->value['message']['common'];?>
</strong>
				</div>
				<?php if (!empty($_smarty_tpl->tpl_vars['list']->value)){?>
				<!-- <form id='sortForm'
					action='/chanzhieps/www/admin.php?m=slide&f=sort' method='post'>-->
				  <table class='table table-hover table-striped tablesorter'>
				    <thead>
				      <tr>
				        <th class='text-center w-100px'><?php echo $_smarty_tpl->tpl_vars['la']->value['message']['name'];?>

				</div></th>
				        <th class='text-center w-100px'><?php echo $_smarty_tpl->tpl_vars['la']->value['message']['tel'];?>

                </div></th>
				        <th class='text-center w-60px'><div class='<?php if ($_smarty_tpl->tpl_vars['orderby']->value=="createtime"&&$_smarty_tpl->tpl_vars['sort']->value=="desc"){?>headerSortDown<?php }elseif($_smarty_tpl->tpl_vars['orderby']->value=="createtime"&&$_smarty_tpl->tpl_vars['sort']->value=="asc"){?>headerSortUp<?php }else{ ?>header<?php }?>'><a href='{:U('customer/message/default/sort/currpage/<?php echo $_smarty_tpl->tpl_vars['currpage']->value;?>
/orderby/createtime/sort/<?php if ($_smarty_tpl->tpl_vars['orderby']->value=="createtime"){?><?php echo $_smarty_tpl->tpl_vars['activesorting']->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['sorting']->value;?>
<?php }?>.html')}' ><?php echo $_smarty_tpl->tpl_vars['la']->value['message']['createtime'];?>
</a>
                </div></th>
				        <th class='text-center w-60px'><div class='<?php if ($_smarty_tpl->tpl_vars['orderby']->value=="public"&&$_smarty_tpl->tpl_vars['sort']->value=="desc"){?>headerSortDown<?php }elseif($_smarty_tpl->tpl_vars['orderby']->value=="public"&&$_smarty_tpl->tpl_vars['sort']->value=="asc"){?>headerSortUp<?php }else{ ?>header<?php }?>'><a href='{:U('customer/message/default/sort/currpage/<?php echo $_smarty_tpl->tpl_vars['currpage']->value;?>
/orderby/public/sort/<?php if ($_smarty_tpl->tpl_vars['orderby']->value=="public"){?><?php echo $_smarty_tpl->tpl_vars['activesorting']->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['sorting']->value;?>
<?php }?>.html')}' ><?php echo $_smarty_tpl->tpl_vars['la']->value['message']['publicstatus'];?>
</a>
                </div></th>
                        <th class='text-center w-60px'><div class='<?php if ($_smarty_tpl->tpl_vars['orderby']->value=="replyid"&&$_smarty_tpl->tpl_vars['sort']->value=="desc"){?>headerSortDown<?php }elseif($_smarty_tpl->tpl_vars['orderby']->value=="replyid"&&$_smarty_tpl->tpl_vars['sort']->value=="asc"){?>headerSortUp<?php }else{ ?>header<?php }?>'><a href='{:U('customer/message/default/sort/currpage/<?php echo $_smarty_tpl->tpl_vars['currpage']->value;?>
/orderby/replyid/sort/<?php if ($_smarty_tpl->tpl_vars['orderby']->value=="replyid"){?><?php echo $_smarty_tpl->tpl_vars['activesorting']->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['sorting']->value;?>
<?php }?>.html')}' ><?php echo $_smarty_tpl->tpl_vars['la']->value['message']['replyman'];?>
</a>
                </div></th>
				        <th class='text-center w-120px'><?php echo $_smarty_tpl->tpl_vars['la']->value['actions'];?>
</th>
				      </tr>
				    </thead>
				    <tbody>
				    <?php  $_smarty_tpl->tpl_vars["kv"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["kv"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["kv"]->key => $_smarty_tpl->tpl_vars["kv"]->value){
$_smarty_tpl->tpl_vars["kv"]->_loop = true;
?>
                        <tr>
                        <td class='text-center'><a href="{:U('customer/message/confirm/default/<?php echo $_smarty_tpl->tpl_vars['kv']->value['id'];?>
.modal')}" data-toggle='modal'><?php echo $_smarty_tpl->tpl_vars['kv']->value['name'];?>
</a></td>
                        <td class='text-center'><?php echo $_smarty_tpl->tpl_vars['kv']->value['tel'];?>
</td>
                        <td class='text-center'><?php echo $_smarty_tpl->tpl_vars['kv']->value['createtime'];?>
</td>
                        <td class='text-center <?php if ($_smarty_tpl->tpl_vars['kv']->value['public']=="1"){?>is-visible<?php }?>'><?php if ($_smarty_tpl->tpl_vars['kv']->value['public']=="1"){?><?php echo $_smarty_tpl->tpl_vars['la']->value['message']['published'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['la']->value['message']['unpublished'];?>
<?php }?></td>
                        <td class='text-center'><?php echo $_smarty_tpl->tpl_vars['kv']->value['replyman'];?>
</td>
                        <td class='text-center'>
                        <?php if ($_smarty_tpl->tpl_vars['kv']->value['replyid']!=''&&$_smarty_tpl->tpl_vars['publishauth']->value=='1'){?>
                          <a href='{:U('customer/message/default/publish/<?php echo $_smarty_tpl->tpl_vars['kv']->value['id'];?>
.json')}' class="publisher"><?php if ($_smarty_tpl->tpl_vars['kv']->value['public']=="0"){?><?php echo $_smarty_tpl->tpl_vars['la']->value['message']['public'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['la']->value['article']['unpublic'];?>
<?php }?></a>
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['kv']->value['public']=="0"){?>
                          <a href='{:U('customer/message/edit/default/id/<?php echo $_smarty_tpl->tpl_vars['kv']->value['id'];?>
.html')}' ><?php echo $_smarty_tpl->tpl_vars['la']->value['message']['editor'];?>
</a>
                        <?php }?>
			            <?php if ($_smarty_tpl->tpl_vars['kv']->value['public']=="0"){?>     
			                <a href='{:U('customer/message/default/delete/id/<?php echo $_smarty_tpl->tpl_vars['kv']->value['id'];?>
.json')}' class="deleter"><?php echo $_smarty_tpl->tpl_vars['la']->value['delete'];?>
</a>
			            <?php }?>    
                        </td>
                        </tr>
				    <?php } ?>
				          </tbody>
				    <tfoot><tr><td colspan='8'>
				    <div style='float:right; clear:none;' class='page form-inline'>
				    <?php echo $_smarty_tpl->tpl_vars['pagelink']->value;?>

				        </div></td></tr></tfoot>
				  </table>
				  <?php }?>
			</div>
		</div>
	</div>
	<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['ex'][0][0]->export(array('fn'=>'exportJs'),$_smarty_tpl);?>

</body>
</html>

<?php }} ?>