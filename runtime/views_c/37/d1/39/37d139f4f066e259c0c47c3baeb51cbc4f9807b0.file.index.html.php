<?php /* Smarty version Smarty-3.1.6, created on 2015-10-10 13:09:11
         compiled from "D:\xampp\htdocs\baijun\app\modes\admin\hr\removals\default\index.html" */ ?>
<?php /*%%SmartyHeaderCode:2157356189d775ecce6-44934861%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '37d139f4f066e259c0c47c3baeb51cbc4f9807b0' => 
    array (
      0 => 'D:\\xampp\\htdocs\\baijun\\app\\modes\\admin\\hr\\removals\\default\\index.html',
      1 => 1439870817,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2157356189d775ecce6-44934861',
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
    'settopauth' => 0,
    'pagelink' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_56189d777ee0f',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56189d777ee0f')) {function content_56189d777ee0f($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<body>
    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/top_menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


	<div class="clearfix">
    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/left_menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<div class='col-md-10'>
			<div class='panel'>
				<div class='panel-heading'>
					<strong><i class='icon-list-ul'></i>&nbsp;<?php echo $_smarty_tpl->tpl_vars['la']->value['removals']['common'];?>
</strong>
					<div class='panel-actions'><a href='{:U('hr/removals/add/default.html')}' class="btn btn-primary"><i class="icon-plus"></i> <?php echo $_smarty_tpl->tpl_vars['la']->value['removals']['create'];?>
</a>
				    </div>
				</div>
				<?php if (!empty($_smarty_tpl->tpl_vars['list']->value)){?>
				<!-- <form id='sortForm'
					action='/chanzhieps/www/admin.php?m=slide&f=sort' method='post'>-->
				  <table class='table table-hover table-striped tablesorter'>
				    <thead>
				      <tr>
		                <th class='text-center w-60px'><div class='<?php if ($_smarty_tpl->tpl_vars['orderby']->value=="id"&&$_smarty_tpl->tpl_vars['sort']->value=="desc"){?>headerSortDown<?php }elseif($_smarty_tpl->tpl_vars['orderby']->value=="id"&&$_smarty_tpl->tpl_vars['sort']->value=="asc"){?>headerSortUp<?php }else{ ?>header<?php }?>'><a href='{:U('hr/removals/default/sort/currpage/<?php echo $_smarty_tpl->tpl_vars['currpage']->value;?>
/orderby/id/sort/<?php if ($_smarty_tpl->tpl_vars['orderby']->value=="id"){?><?php echo $_smarty_tpl->tpl_vars['activesorting']->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['sorting']->value;?>
<?php }?>.html')}' ><?php echo $_smarty_tpl->tpl_vars['la']->value['article']['id'];?>
</a>
				</div></th>
				        <th class='text-center'><div class='<?php if ($_smarty_tpl->tpl_vars['orderby']->value=="title"&&$_smarty_tpl->tpl_vars['sort']->value=="desc"){?>headerSortDown<?php }elseif($_smarty_tpl->tpl_vars['orderby']->value=="title"&&$_smarty_tpl->tpl_vars['sort']->value=="asc"){?>headerSortUp<?php }else{ ?>header<?php }?>'><a href='{:U('hr/removals/default/sort/currpage/<?php echo $_smarty_tpl->tpl_vars['currpage']->value;?>
/orderby/title/sort/<?php if ($_smarty_tpl->tpl_vars['orderby']->value=="title"){?><?php echo $_smarty_tpl->tpl_vars['activesorting']->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['sorting']->value;?>
<?php }?>.html')}' ><?php echo $_smarty_tpl->tpl_vars['la']->value['article']['title'];?>
</a>
				</div></th>
				        <th class='text-center w-160px'><div class='<?php if ($_smarty_tpl->tpl_vars['orderby']->value=="createby"&&$_smarty_tpl->tpl_vars['sort']->value=="desc"){?>headerSortDown<?php }elseif($_smarty_tpl->tpl_vars['orderby']->value=="createby"&&$_smarty_tpl->tpl_vars['sort']->value=="asc"){?>headerSortUp<?php }else{ ?>header<?php }?>'><a href='{:U('hr/removals/default/sort/currpage/<?php echo $_smarty_tpl->tpl_vars['currpage']->value;?>
/orderby/createby/sort/<?php if ($_smarty_tpl->tpl_vars['orderby']->value=="createby"){?><?php echo $_smarty_tpl->tpl_vars['activesorting']->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['sorting']->value;?>
<?php }?>.html')}' ><?php echo $_smarty_tpl->tpl_vars['la']->value['article']['author'];?>
</a>
                </div></th>
				        <th class='text-center w-160px'><div class='<?php if ($_smarty_tpl->tpl_vars['orderby']->value=="createtime"&&$_smarty_tpl->tpl_vars['sort']->value=="desc"){?>headerSortDown<?php }elseif($_smarty_tpl->tpl_vars['orderby']->value=="createtime"&&$_smarty_tpl->tpl_vars['sort']->value=="asc"){?>headerSortUp<?php }else{ ?>header<?php }?>'><a href='{:U('hr/removals/default/sort/currpage/<?php echo $_smarty_tpl->tpl_vars['currpage']->value;?>
/orderby/createtime/sort/<?php if ($_smarty_tpl->tpl_vars['orderby']->value=="createtime"){?><?php echo $_smarty_tpl->tpl_vars['activesorting']->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['sorting']->value;?>
<?php }?>.html')}' ><?php echo $_smarty_tpl->tpl_vars['la']->value['article']['addedDate'];?>
</a>
				</div></th>
				        <th class='text-center w-60px'><div class='<?php if ($_smarty_tpl->tpl_vars['orderby']->value=="views"&&$_smarty_tpl->tpl_vars['sort']->value=="desc"){?>headerSortDown<?php }elseif($_smarty_tpl->tpl_vars['orderby']->value=="views"&&$_smarty_tpl->tpl_vars['sort']->value=="asc"){?>headerSortUp<?php }else{ ?>header<?php }?>'><a href='{:U('hr/removals/default/sort/currpage/<?php echo $_smarty_tpl->tpl_vars['currpage']->value;?>
/orderby/views/sort/<?php if ($_smarty_tpl->tpl_vars['orderby']->value=="views"){?><?php echo $_smarty_tpl->tpl_vars['activesorting']->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['sorting']->value;?>
<?php }?>.html')}' ><?php echo $_smarty_tpl->tpl_vars['la']->value['article']['views'];?>
</a>
				</div></th>
				        <th class='text-center w-160px'><div class='<?php if ($_smarty_tpl->tpl_vars['orderby']->value=="status"&&$_smarty_tpl->tpl_vars['sort']->value=="desc"){?>headerSortDown<?php }elseif($_smarty_tpl->tpl_vars['orderby']->value=="status"&&$_smarty_tpl->tpl_vars['sort']->value=="asc"){?>headerSortUp<?php }else{ ?>header<?php }?>'><a href='{:U('hr/removals/default/sort/currpage/<?php echo $_smarty_tpl->tpl_vars['currpage']->value;?>
/orderby/status/sort/<?php if ($_smarty_tpl->tpl_vars['orderby']->value=="status"){?><?php echo $_smarty_tpl->tpl_vars['activesorting']->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['sorting']->value;?>
<?php }?>.html')}' ><?php echo $_smarty_tpl->tpl_vars['la']->value['article']['status'];?>
</a>
                </div></th>
				        <th class='text-center w-160px'><div class='<?php if ($_smarty_tpl->tpl_vars['orderby']->value=="public"&&$_smarty_tpl->tpl_vars['sort']->value=="desc"){?>headerSortDown<?php }elseif($_smarty_tpl->tpl_vars['orderby']->value=="public"&&$_smarty_tpl->tpl_vars['sort']->value=="asc"){?>headerSortUp<?php }else{ ?>header<?php }?>'><a href='{:U('hr/removals/default/sort/currpage/<?php echo $_smarty_tpl->tpl_vars['currpage']->value;?>
/orderby/public/sort/<?php if ($_smarty_tpl->tpl_vars['orderby']->value=="public"){?><?php echo $_smarty_tpl->tpl_vars['activesorting']->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['sorting']->value;?>
<?php }?>.html')}' ><?php echo $_smarty_tpl->tpl_vars['la']->value['article']['publicstatus'];?>
</a>
                </div></th>
				        <th class='text-center w-150px'><?php echo $_smarty_tpl->tpl_vars['la']->value['actions'];?>
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
                        <td class='text-center'><?php echo $_smarty_tpl->tpl_vars['kv']->value['id'];?>
</td>
                        <td><?php if ($_smarty_tpl->tpl_vars['kv']->value['top']=='1'){?><small class="label label-success"><?php echo $_smarty_tpl->tpl_vars['la']->value['article']['settop'];?>
</small><?php }?><a href="{:U('site/hr/removals/list/default/<?php echo $_smarty_tpl->tpl_vars['kv']->value['id'];?>
.html')}" target="_blank" style="display:inline;"><?php echo $_smarty_tpl->tpl_vars['kv']->value['title'];?>
</a></td>
                        <td class='text-center'><?php echo $_smarty_tpl->tpl_vars['kv']->value['createname'];?>
</td>
                        <td class='text-center'><?php echo $_smarty_tpl->tpl_vars['kv']->value['createtime'];?>
</td>
                        <td class='text-center'><?php echo $_smarty_tpl->tpl_vars['kv']->value['views'];?>
</td>
                        <td class='text-center <?php if ($_smarty_tpl->tpl_vars['kv']->value['status']=="1"){?>is-visible<?php }?>'><?php if ($_smarty_tpl->tpl_vars['kv']->value['status']=="1"){?><?php echo $_smarty_tpl->tpl_vars['la']->value['article']['normal'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['la']->value['article']['draft'];?>
<?php }?></td>
                        <td class='text-center <?php if ($_smarty_tpl->tpl_vars['kv']->value['public']=="1"){?>is-visible<?php }?>'><?php if ($_smarty_tpl->tpl_vars['kv']->value['public']=="1"){?><?php echo $_smarty_tpl->tpl_vars['la']->value['removals']['published'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['la']->value['removals']['unpublished'];?>
<?php }?></td>
                        <td class='text-center'>
                        <?php if ($_smarty_tpl->tpl_vars['kv']->value['status']=="1"&&$_smarty_tpl->tpl_vars['publishauth']->value=='1'){?>
                          <a href='{:U('hr/removals/default/publish/<?php echo $_smarty_tpl->tpl_vars['kv']->value['id'];?>
.json')}' class="publisher"><?php if ($_smarty_tpl->tpl_vars['kv']->value['public']=="0"){?><?php echo $_smarty_tpl->tpl_vars['la']->value['article']['public'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['la']->value['article']['unpublic'];?>
<?php }?></a>
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['kv']->value['public']=="1"&&$_smarty_tpl->tpl_vars['kv']->value['status']=="1"&&$_smarty_tpl->tpl_vars['settopauth']->value=='1'&&$_smarty_tpl->tpl_vars['kv']->value['top']!='1'){?>
                          <a href='{:U('hr/removals/default/settop/objecttype/removals/id/<?php echo $_smarty_tpl->tpl_vars['kv']->value['id'];?>
.json')}' class="settoper"><?php echo $_smarty_tpl->tpl_vars['la']->value['article']['settop'];?>
</a>
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['kv']->value['public']=="1"&&$_smarty_tpl->tpl_vars['kv']->value['status']=="1"&&$_smarty_tpl->tpl_vars['settopauth']->value=='1'&&$_smarty_tpl->tpl_vars['kv']->value['top']=='1'){?>
                          <a href='{:U('hr/removals/default/settop/objecttype/removals/id/<?php echo $_smarty_tpl->tpl_vars['kv']->value['id'];?>
.json')}' class="settoper"><?php echo $_smarty_tpl->tpl_vars['la']->value['article']['unsettop'];?>
</a>
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['kv']->value['public']=="0"){?>
                          <a href='{:U('hr/removals/edit/default/id/<?php echo $_smarty_tpl->tpl_vars['kv']->value['id'];?>
.html')}' ><?php echo $_smarty_tpl->tpl_vars['la']->value['article']['editor'];?>
</a>
                        <?php }?>  
			                <!-- <a href='{:U('system/topimage/edit/default/objecttype/removals/objectid/<?php echo $_smarty_tpl->tpl_vars['kv']->value['id'];?>
.modal')}' data-toggle='modal'><?php echo $_smarty_tpl->tpl_vars['la']->value['article']['cover'];?>
</a> -->
			            <?php if ($_smarty_tpl->tpl_vars['kv']->value['public']=="0"){?>    
			                <a href='{:U('hr/removals/default/delete/id/<?php echo $_smarty_tpl->tpl_vars['kv']->value['id'];?>
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