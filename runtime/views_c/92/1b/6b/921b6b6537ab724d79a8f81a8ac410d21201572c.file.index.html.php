<?php /* Smarty version Smarty-3.1.6, created on 2017-12-08 21:28:21
         compiled from "D:\xampp\htdocs\baijun\app\modes\admin\home\default\default\index.html" */ ?>
<?php /*%%SmartyHeaderCode:168635a2a9375b7b888-70753692%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '921b6b6537ab724d79a8f81a8ac410d21201572c' => 
    array (
      0 => 'D:\\xampp\\htdocs\\baijun\\app\\modes\\admin\\home\\default\\default\\index.html',
      1 => 1447171200,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '168635a2a9375b7b888-70753692',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'models' => 0,
    'kv' => 0,
    'la' => 0,
    'nofilter' => 0,
    'list' => 0,
    'orderby' => 0,
    'sort' => 0,
    'currpage' => 0,
    'activesorting' => 0,
    'sorting' => 0,
    'pagelink' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5a2a9375ca162',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a2a9375ca162')) {function content_5a2a9375ca162($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<body>
    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/top_menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


	<div class="clearfix">
    <?php if (!empty($_smarty_tpl->tpl_vars['models']->value)){?>
<!--     	<div class='col-md-12'>
	    	<div class='panel'>
					<div class='panel-heading'>
						<strong><i class='icon-list-ul'></i>&nbsp;待审核事项</strong>
					</div>
					<table class='table table-hover table-striped tablesorter'>
					    <thead>
					      <tr>
					        <th class='text-center'>待办事项</th>
					        <th class='text-center w-160px'>未审核数量</th>
					      </tr>
					    </thead>
					    <tbody>
					    	<?php  $_smarty_tpl->tpl_vars["kv"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["kv"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['models']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["kv"]->key => $_smarty_tpl->tpl_vars["kv"]->value){
$_smarty_tpl->tpl_vars["kv"]->_loop = true;
?>
		                    <tr>
		                    <td class='text-center'><?php echo $_smarty_tpl->tpl_vars['kv']->value['title'];?>
</td>
		                    <td class='text-center'><a href="<?php echo $_smarty_tpl->tpl_vars['kv']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['kv']->value['count'];?>
</a></td>
		                    </tr>
		                    <?php } ?>
					    </tbody>
					</table>
			</div>
    	</div> -->
    	<?php }?>
		<div class='col-md-12'>
			<div class='panel'>
				<div class='panel-heading'>
					<strong><i class='icon-list-ul'></i>&nbsp;<?php echo $_smarty_tpl->tpl_vars['la']->value['announce']['common'];?>
</strong>
				</div>
				<center>
				<h1><?php echo $_smarty_tpl->tpl_vars['nofilter']->value['sticktitle'];?>
</h1>
				</center>
				<div style="padding:15px;"><?php echo $_smarty_tpl->tpl_vars['nofilter']->value['stickcontent'];?>
</div>
				<br>
				<span style="float:right;margin-right:15px;" ><?php echo $_smarty_tpl->tpl_vars['nofilter']->value['stickfooter'];?>
</span>
				<br>
				<br>
				<?php if (!empty($_smarty_tpl->tpl_vars['list']->value)){?>
				<!-- <form id='sortForm'
					action='/chanzhieps/www/admin.php?m=slide&f=sort' method='post'>-->
				  <table class='table table-hover table-striped tablesorter'>
				  <!--
				    <thead>
				      <tr>
				        <th class='text-center'><div class='<?php if ($_smarty_tpl->tpl_vars['orderby']->value=="title"&&$_smarty_tpl->tpl_vars['sort']->value=="desc"){?>headerSortDown<?php }elseif($_smarty_tpl->tpl_vars['orderby']->value=="title"&&$_smarty_tpl->tpl_vars['sort']->value=="asc"){?>headerSortUp<?php }else{ ?>header<?php }?>'><a href='site_announce-default-sort-currpage-<?php echo $_smarty_tpl->tpl_vars['currpage']->value;?>
-orderby-title-sort-<?php if ($_smarty_tpl->tpl_vars['orderby']->value=="title"){?><?php echo $_smarty_tpl->tpl_vars['activesorting']->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['sorting']->value;?>
<?php }?>.html' ><?php echo $_smarty_tpl->tpl_vars['la']->value['article']['title'];?>
</a>
				</div></th>
				        <th class='text-center w-160px'><div class='<?php if ($_smarty_tpl->tpl_vars['orderby']->value=="createby"&&$_smarty_tpl->tpl_vars['sort']->value=="desc"){?>headerSortDown<?php }elseif($_smarty_tpl->tpl_vars['orderby']->value=="createby"&&$_smarty_tpl->tpl_vars['sort']->value=="asc"){?>headerSortUp<?php }else{ ?>header<?php }?>'><a href='site_announce-default-sort-currpage-<?php echo $_smarty_tpl->tpl_vars['currpage']->value;?>
-orderby-createby-sort-<?php if ($_smarty_tpl->tpl_vars['orderby']->value=="createby"){?><?php echo $_smarty_tpl->tpl_vars['activesorting']->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['sorting']->value;?>
<?php }?>.html' ><?php echo $_smarty_tpl->tpl_vars['la']->value['article']['author'];?>
</a>
                </div></th>
				        <th class='text-center w-160px'><div class='<?php if ($_smarty_tpl->tpl_vars['orderby']->value=="createtime"&&$_smarty_tpl->tpl_vars['sort']->value=="desc"){?>headerSortDown<?php }elseif($_smarty_tpl->tpl_vars['orderby']->value=="createtime"&&$_smarty_tpl->tpl_vars['sort']->value=="asc"){?>headerSortUp<?php }else{ ?>header<?php }?>'><a href='site_announce-default-sort-currpage-<?php echo $_smarty_tpl->tpl_vars['currpage']->value;?>
-orderby-createtime-sort-<?php if ($_smarty_tpl->tpl_vars['orderby']->value=="createtime"){?><?php echo $_smarty_tpl->tpl_vars['activesorting']->value;?>
<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['sorting']->value;?>
<?php }?>.html' ><?php echo $_smarty_tpl->tpl_vars['la']->value['article']['addedDate'];?>
</a>
				</div></th>
				      </tr>
				    </thead>
				  -->
				    <tbody>
				    <?php  $_smarty_tpl->tpl_vars["kv"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["kv"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["kv"]->key => $_smarty_tpl->tpl_vars["kv"]->value){
$_smarty_tpl->tpl_vars["kv"]->_loop = true;
?>
                        <tr>
                        <!-- <td class='text-center'><?php echo $_smarty_tpl->tpl_vars['kv']->value['id'];?>
</td>  -->
                        <td><a href="{:U('home/default/confirm/default/<?php echo $_smarty_tpl->tpl_vars['kv']->value['id'];?>
.modal')}" data-toggle='modal'><?php echo $_smarty_tpl->tpl_vars['kv']->value['title'];?>
</a></td>
                        <td class='text-center'><?php echo $_smarty_tpl->tpl_vars['kv']->value['createname'];?>
</td>
                        <td class='text-center'><?php echo $_smarty_tpl->tpl_vars['kv']->value['createtime'];?>
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