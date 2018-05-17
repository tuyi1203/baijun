<?php /* Smarty version Smarty-3.1.6, created on 2017-12-08 21:55:07
         compiled from "D:\xampp\htdocs\baijun\app\modes\admin\website\announce\default\index.html" */ ?>
<?php /*%%SmartyHeaderCode:125155a2a99bb843299-24085732%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4be124c3d6462c1854f04b1702a76cfce990bda0' => 
    array (
      0 => 'D:\\xampp\\htdocs\\baijun\\app\\modes\\admin\\website\\announce\\default\\index.html',
      1 => 1423670400,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '125155a2a99bb843299-24085732',
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
    'pagelink' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5a2a99bb98704',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a2a99bb98704')) {function content_5a2a99bb98704($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<body>
    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/top_menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


	<div class="clearfix">
    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/left_menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<div class='col-md-10'>
			<div class='panel'>
				<div class='panel-heading'>
					<strong><i class='icon-list-ul'></i>&nbsp;<?php echo $_smarty_tpl->tpl_vars['la']->value['announce']['common'];?>
</strong>
					<div class='panel-actions'><a href='{:U('website/announce/add/default.html')}' class="btn btn-primary"><i class="icon-plus"></i> <?php echo $_smarty_tpl->tpl_vars['la']->value['announce']['create'];?>
</a>
				    </div>
				</div>
				<?php if (!empty($_smarty_tpl->tpl_vars['list']->value)){?>
				<!-- <form id='sortForm'
					action='/chanzhieps/www/admin.php?m=slide&f=sort' method='post'>-->
				  <table class='table table-hover table-striped tablesorter'>
				    <thead>
				      <tr>
		                <th class='text-center w-60px'><div class='<?php if ($_smarty_tpl->tpl_vars['orderby']->value=="id"&&$_smarty_tpl->tpl_vars['sort']->value=="desc"){?>headerSortDown<?php }elseif($_smarty_tpl->tpl_vars['orderby']->value=="id"&&$_smarty_tpl->tpl_vars['sort']->value=="asc"){?>headerSortUp<?php }else{ ?>header<?php }?>'><a href='{:U('website/announce/default/sort/currpage/<?php echo $_smarty_tpl->tpl_vars['currpage']->value;?>
/orderby/id/sort/<?php if ($_smarty_tpl->tpl_vars['orderby']->value=="id"){?><?php echo $_smarty_tpl->tpl_vars['activesorting']->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['sorting']->value;?>
<?php }?>.html')}' ><?php echo $_smarty_tpl->tpl_vars['la']->value['article']['id'];?>
</a>
				</div></th>
				        <th class='text-center'><div class='<?php if ($_smarty_tpl->tpl_vars['orderby']->value=="title"&&$_smarty_tpl->tpl_vars['sort']->value=="desc"){?>headerSortDown<?php }elseif($_smarty_tpl->tpl_vars['orderby']->value=="title"&&$_smarty_tpl->tpl_vars['sort']->value=="asc"){?>headerSortUp<?php }else{ ?>header<?php }?>'><a href='{:U('website/announce/default/sort/currpage/<?php echo $_smarty_tpl->tpl_vars['currpage']->value;?>
/orderby/title/sort/<?php if ($_smarty_tpl->tpl_vars['orderby']->value=="title"){?><?php echo $_smarty_tpl->tpl_vars['activesorting']->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['sorting']->value;?>
<?php }?>.html')}' ><?php echo $_smarty_tpl->tpl_vars['la']->value['article']['title'];?>
</a>
				</div></th>
				        <th class='text-center w-160px'><div class='<?php if ($_smarty_tpl->tpl_vars['orderby']->value=="createby"&&$_smarty_tpl->tpl_vars['sort']->value=="desc"){?>headerSortDown<?php }elseif($_smarty_tpl->tpl_vars['orderby']->value=="createby"&&$_smarty_tpl->tpl_vars['sort']->value=="asc"){?>headerSortUp<?php }else{ ?>header<?php }?>'><a href='{:U('website/announce/default/sort/currpage/<?php echo $_smarty_tpl->tpl_vars['currpage']->value;?>
/orderby/createby/sort/<?php if ($_smarty_tpl->tpl_vars['orderby']->value=="createby"){?><?php echo $_smarty_tpl->tpl_vars['activesorting']->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['sorting']->value;?>
<?php }?>.html')}' ><?php echo $_smarty_tpl->tpl_vars['la']->value['article']['author'];?>
</a>
                </div></th>
				        <th class='text-center w-160px'><div class='<?php if ($_smarty_tpl->tpl_vars['orderby']->value=="createtime"&&$_smarty_tpl->tpl_vars['sort']->value=="desc"){?>headerSortDown<?php }elseif($_smarty_tpl->tpl_vars['orderby']->value=="createtime"&&$_smarty_tpl->tpl_vars['sort']->value=="asc"){?>headerSortUp<?php }else{ ?>header<?php }?>'><a href='{:U('website/announce/default/sort/currpage/<?php echo $_smarty_tpl->tpl_vars['currpage']->value;?>
/orderby/createtime/sort/<?php if ($_smarty_tpl->tpl_vars['orderby']->value=="createtime"){?><?php echo $_smarty_tpl->tpl_vars['activesorting']->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['sorting']->value;?>
<?php }?>.html')}' ><?php echo $_smarty_tpl->tpl_vars['la']->value['article']['addedDate'];?>
</a>
				</div></th>
				        <th class='text-center w-160px'><div class='<?php if ($_smarty_tpl->tpl_vars['orderby']->value=="status"&&$_smarty_tpl->tpl_vars['sort']->value=="desc"){?>headerSortDown<?php }elseif($_smarty_tpl->tpl_vars['orderby']->value=="status"&&$_smarty_tpl->tpl_vars['sort']->value=="asc"){?>headerSortUp<?php }else{ ?>header<?php }?>'><a href='{:U('website/announce/default/sort/currpage/<?php echo $_smarty_tpl->tpl_vars['currpage']->value;?>
/orderby/status/sort/<?php if ($_smarty_tpl->tpl_vars['orderby']->value=="status"){?><?php echo $_smarty_tpl->tpl_vars['activesorting']->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['sorting']->value;?>
<?php }?>.html')}' ><?php echo $_smarty_tpl->tpl_vars['la']->value['article']['status'];?>
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
                        <td><?php echo $_smarty_tpl->tpl_vars['kv']->value['title'];?>
</td>
                        <td class='text-center'><?php echo $_smarty_tpl->tpl_vars['kv']->value['createname'];?>
</td>
                        <td class='text-center'><?php echo $_smarty_tpl->tpl_vars['kv']->value['createtime'];?>
</td>
                        <td class='text-center <?php if ($_smarty_tpl->tpl_vars['kv']->value['status']=="1"){?>is-visible<?php }?>'><?php if ($_smarty_tpl->tpl_vars['kv']->value['status']=="1"){?><?php echo $_smarty_tpl->tpl_vars['la']->value['announce']['stick'];?>
<?php }?></td>
                        <td class='text-center'>
                        <?php if ($_smarty_tpl->tpl_vars['kv']->value['status']!="1"){?>
                          <a href="{:U('website/announce/default/stick/<?php echo $_smarty_tpl->tpl_vars['kv']->value['id'];?>
.json')}" class="publisher"><?php echo $_smarty_tpl->tpl_vars['la']->value['announce']['stick'];?>
</a>
                        <?php }?>
                          <a href="{:U('website/announce/edit/default/<?php echo $_smarty_tpl->tpl_vars['kv']->value['id'];?>
.html')}" ><?php echo $_smarty_tpl->tpl_vars['la']->value['article']['editor'];?>
</a>
			                <!-- <a href='system_file-default-default-objecttype-announce-objectid-<?php echo $_smarty_tpl->tpl_vars['kv']->value['id'];?>
.modal' data-toggle='modal'><?php echo $_smarty_tpl->tpl_vars['la']->value['article']['files'];?>
</a> -->
			                <a href="{:U('website/announce/default/delete/<?php echo $_smarty_tpl->tpl_vars['kv']->value['id'];?>
.json')}" class="deleter"><?php echo $_smarty_tpl->tpl_vars['la']->value['delete'];?>
</a>
                        </td>
                        </tr>
				    <?php } ?>
				          </tbody>
				    <tfoot><tr><td colspan='6'>
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