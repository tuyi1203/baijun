<?php /* Smarty version Smarty-3.1.6, created on 2015-10-22 10:39:48
         compiled from "D:\xampp\htdocs\baijun\app\modes\admin\information\waterstop\default\index.html" */ ?>
<?php /*%%SmartyHeaderCode:227056284c74ad0ea8-98362799%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6e803a40e4a1073fecc019a902a25d88bdf0c2e1' => 
    array (
      0 => 'D:\\xampp\\htdocs\\baijun\\app\\modes\\admin\\information\\waterstop\\default\\index.html',
      1 => 1439870816,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '227056284c74ad0ea8-98362799',
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
  'unifunc' => 'content_56284c74cd599',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56284c74cd599')) {function content_56284c74cd599($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<body>
    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/top_menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


	<div class="clearfix">
    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/left_menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<div class='col-md-10'>
			<div class='panel'>
				<div class='panel-heading'>
					<strong><i class='icon-list-ul'></i>&nbsp;<?php echo $_smarty_tpl->tpl_vars['la']->value['waterstop']['common'];?>
</strong>
					<div class='panel-actions'><a href='{:U('information/waterstop/add/default.html')}' class="btn btn-primary"><i class="icon-plus"></i> <?php echo $_smarty_tpl->tpl_vars['la']->value['waterstop']['create'];?>
</a>
				    </div>
				</div>
				<?php if (!empty($_smarty_tpl->tpl_vars['list']->value)){?>
				<!-- <form id='sortForm'
					action='/chanzhieps/www/admin.php?m=slide&f=sort' method='post'>-->
				  <table class='table table-hover table-striped tablesorter'>
				    <thead>
				      <tr>
		                <th class='text-center w-60px'><div class='<?php if ($_smarty_tpl->tpl_vars['orderby']->value=="id"&&$_smarty_tpl->tpl_vars['sort']->value=="desc"){?>headerSortDown<?php }elseif($_smarty_tpl->tpl_vars['orderby']->value=="id"&&$_smarty_tpl->tpl_vars['sort']->value=="asc"){?>headerSortUp<?php }else{ ?>header<?php }?>'><a href='{:U('information/waterstop/default/sort/currpage/<?php echo $_smarty_tpl->tpl_vars['currpage']->value;?>
/orderby/id/sort/<?php if ($_smarty_tpl->tpl_vars['orderby']->value=="id"){?><?php echo $_smarty_tpl->tpl_vars['activesorting']->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['sorting']->value;?>
<?php }?>.html')}' ><?php echo $_smarty_tpl->tpl_vars['la']->value['article']['id'];?>
</a>
				</div></th>
				        <th class='text-center'><div class='<?php if ($_smarty_tpl->tpl_vars['orderby']->value=="title"&&$_smarty_tpl->tpl_vars['sort']->value=="desc"){?>headerSortDown<?php }elseif($_smarty_tpl->tpl_vars['orderby']->value=="title"&&$_smarty_tpl->tpl_vars['sort']->value=="asc"){?>headerSortUp<?php }else{ ?>header<?php }?>'><a href='{:U('information/waterstop/default/sort/currpage/<?php echo $_smarty_tpl->tpl_vars['currpage']->value;?>
/orderby/title/sort/<?php if ($_smarty_tpl->tpl_vars['orderby']->value=="title"){?><?php echo $_smarty_tpl->tpl_vars['activesorting']->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['sorting']->value;?>
<?php }?>.html')}' ><?php echo $_smarty_tpl->tpl_vars['la']->value['article']['title'];?>
</a>
				</div></th>
				        <th class='text-center w-160px'><div class='<?php if ($_smarty_tpl->tpl_vars['orderby']->value=="createby"&&$_smarty_tpl->tpl_vars['sort']->value=="desc"){?>headerSortDown<?php }elseif($_smarty_tpl->tpl_vars['orderby']->value=="createby"&&$_smarty_tpl->tpl_vars['sort']->value=="asc"){?>headerSortUp<?php }else{ ?>header<?php }?>'><a href='{:U('information/waterstop/default/sort/currpage/<?php echo $_smarty_tpl->tpl_vars['currpage']->value;?>
/orderby/createby/sort/<?php if ($_smarty_tpl->tpl_vars['orderby']->value=="createby"){?><?php echo $_smarty_tpl->tpl_vars['activesorting']->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['sorting']->value;?>
<?php }?>.html')}' ><?php echo $_smarty_tpl->tpl_vars['la']->value['article']['author'];?>
</a>
                </div></th>
				        <th class='text-center w-160px'><div class='<?php if ($_smarty_tpl->tpl_vars['orderby']->value=="createtime"&&$_smarty_tpl->tpl_vars['sort']->value=="desc"){?>headerSortDown<?php }elseif($_smarty_tpl->tpl_vars['orderby']->value=="createtime"&&$_smarty_tpl->tpl_vars['sort']->value=="asc"){?>headerSortUp<?php }else{ ?>header<?php }?>'><a href='{:U('information/waterstop/default/sort/currpage/<?php echo $_smarty_tpl->tpl_vars['currpage']->value;?>
/orderby/createtime/sort/<?php if ($_smarty_tpl->tpl_vars['orderby']->value=="createtime"){?><?php echo $_smarty_tpl->tpl_vars['activesorting']->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['sorting']->value;?>
<?php }?>.html')}' ><?php echo $_smarty_tpl->tpl_vars['la']->value['article']['addedDate'];?>
</a>
				</div></th>
				        <th class='text-center w-60px'><div class='<?php if ($_smarty_tpl->tpl_vars['orderby']->value=="views"&&$_smarty_tpl->tpl_vars['sort']->value=="desc"){?>headerSortDown<?php }elseif($_smarty_tpl->tpl_vars['orderby']->value=="views"&&$_smarty_tpl->tpl_vars['sort']->value=="asc"){?>headerSortUp<?php }else{ ?>header<?php }?>'><a href='{:U('information/waterstop/default/sort/currpage/<?php echo $_smarty_tpl->tpl_vars['currpage']->value;?>
/orderby/views/sort/<?php if ($_smarty_tpl->tpl_vars['orderby']->value=="views"){?><?php echo $_smarty_tpl->tpl_vars['activesorting']->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['sorting']->value;?>
<?php }?>.html')}' ><?php echo $_smarty_tpl->tpl_vars['la']->value['article']['views'];?>
</a>
				</div></th>
				        <th class='text-center w-160px'><div class='<?php if ($_smarty_tpl->tpl_vars['orderby']->value=="status"&&$_smarty_tpl->tpl_vars['sort']->value=="desc"){?>headerSortDown<?php }elseif($_smarty_tpl->tpl_vars['orderby']->value=="status"&&$_smarty_tpl->tpl_vars['sort']->value=="asc"){?>headerSortUp<?php }else{ ?>header<?php }?>'><a href='{:U('information/waterstop/default/sort/currpage/<?php echo $_smarty_tpl->tpl_vars['currpage']->value;?>
/orderby/status/sort/<?php if ($_smarty_tpl->tpl_vars['orderby']->value=="status"){?><?php echo $_smarty_tpl->tpl_vars['activesorting']->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['sorting']->value;?>
<?php }?>.html')}' ><?php echo $_smarty_tpl->tpl_vars['la']->value['article']['status'];?>
</a>
                </div></th>
                        <th class='text-center w-160px'><div class='<?php if ($_smarty_tpl->tpl_vars['orderby']->value=="rollflg"&&$_smarty_tpl->tpl_vars['sort']->value=="desc"){?>headerSortDown<?php }elseif($_smarty_tpl->tpl_vars['orderby']->value=="rollflg"&&$_smarty_tpl->tpl_vars['sort']->value=="asc"){?>headerSortUp<?php }else{ ?>header<?php }?>'><a href='{:U('information/waterstop/default/sort/currpage/<?php echo $_smarty_tpl->tpl_vars['currpage']->value;?>
/orderby/rollflg/sort/<?php if ($_smarty_tpl->tpl_vars['orderby']->value=="rollflg"){?><?php echo $_smarty_tpl->tpl_vars['activesorting']->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['sorting']->value;?>
<?php }?>.html')}' ><?php echo $_smarty_tpl->tpl_vars['la']->value['article']['roll'];?>
</a>
                </div></th>
				        <th class='text-center w-160px'><div class='<?php if ($_smarty_tpl->tpl_vars['orderby']->value=="public"&&$_smarty_tpl->tpl_vars['sort']->value=="desc"){?>headerSortDown<?php }elseif($_smarty_tpl->tpl_vars['orderby']->value=="public"&&$_smarty_tpl->tpl_vars['sort']->value=="asc"){?>headerSortUp<?php }else{ ?>header<?php }?>'><a href='{:U('information/waterstop/default/sort/currpage/<?php echo $_smarty_tpl->tpl_vars['currpage']->value;?>
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
                        <td><a href="{:U('site/information/waterstop/detail/default/<?php echo $_smarty_tpl->tpl_vars['kv']->value['id'];?>
.html')}" target="_blank"><?php echo $_smarty_tpl->tpl_vars['kv']->value['title'];?>
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
                        <td class='text-center <?php if ($_smarty_tpl->tpl_vars['kv']->value['rollflg']=="1"){?>is-visible<?php }?>'><?php if ($_smarty_tpl->tpl_vars['kv']->value['rollflg']=="1"){?><?php echo $_smarty_tpl->tpl_vars['la']->value['yes'];?>
<?php }?></td>
                        <td class='text-center <?php if ($_smarty_tpl->tpl_vars['kv']->value['public']=="1"){?>is-visible<?php }?>'><?php if ($_smarty_tpl->tpl_vars['kv']->value['public']=="1"){?><?php echo $_smarty_tpl->tpl_vars['la']->value['waterstop']['published'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['la']->value['waterstop']['unpublished'];?>
<?php }?></td>
                        <td class='text-center'>
                        <?php if ($_smarty_tpl->tpl_vars['kv']->value['status']=="1"&&$_smarty_tpl->tpl_vars['publishauth']->value=='1'){?>
                          <a href='{:U('information/waterstop/default/publish/<?php echo $_smarty_tpl->tpl_vars['kv']->value['id'];?>
.json')}' class="publisher"><?php if ($_smarty_tpl->tpl_vars['kv']->value['public']=="0"){?><?php echo $_smarty_tpl->tpl_vars['la']->value['article']['public'];?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['la']->value['article']['unpublic'];?>
<?php }?></a>
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['kv']->value['rollflg']=="0"){?>
                            <a href='{:U('information/waterstop/default/roll/id/<?php echo $_smarty_tpl->tpl_vars['kv']->value['id'];?>
.json')}' class="roller"><?php echo $_smarty_tpl->tpl_vars['la']->value['article']['rolling'];?>
</a>
                        <?php }else{ ?>
                            <a href='{:U('information/waterstop/default/roll/id/<?php echo $_smarty_tpl->tpl_vars['kv']->value['id'];?>
.json')}' class="roller"><?php echo $_smarty_tpl->tpl_vars['la']->value['article']['unrolling'];?>
</a>
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['kv']->value['public']=="0"){?>
                          <a href='{:U('information/waterstop/edit/default/id/<?php echo $_smarty_tpl->tpl_vars['kv']->value['id'];?>
.html')}' ><?php echo $_smarty_tpl->tpl_vars['la']->value['article']['editor'];?>
</a>
                        <?php }?>
			            <?php if ($_smarty_tpl->tpl_vars['kv']->value['public']=="0"){?>    
			                <a href='{:U('information/waterstop/default/delete/id/<?php echo $_smarty_tpl->tpl_vars['kv']->value['id'];?>
.json')}' class="deleter"><?php echo $_smarty_tpl->tpl_vars['la']->value['delete'];?>
</a>
			            <?php }?>
                        </td>
                        </tr>
				    <?php } ?>
				          </tbody>
				    <tfoot><tr><td colspan='9'>
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