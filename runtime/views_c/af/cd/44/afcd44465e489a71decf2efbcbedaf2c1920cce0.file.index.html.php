<?php /* Smarty version Smarty-3.1.6, created on 2015-10-10 13:22:11
         compiled from "D:\xampp\htdocs\baijun\app\modes\admin\low\country\default\index.html" */ ?>
<?php /*%%SmartyHeaderCode:194495618a0835fcab0-12697889%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'afcd44465e489a71decf2efbcbedaf2c1920cce0' => 
    array (
      0 => 'D:\\xampp\\htdocs\\baijun\\app\\modes\\admin\\low\\country\\default\\index.html',
      1 => 1423884885,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '194495618a0835fcab0-12697889',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'la' => 0,
    'list' => 0,
    'record' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5618a08369b86',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5618a08369b86')) {function content_5618a08369b86($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<body>
    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/top_menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


    <div class="clearfix">
    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/left_menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <div class='col-md-10'>
            <div class='panel'>
                <div class='panel-heading'>
                    <strong><i class='icon-th'></i>  <?php echo $_smarty_tpl->tpl_vars['la']->value['country']['common'];?>
</strong>

                    <div class='panel-actions'>
                        <a href='{:U('low/country/add/default.modal')}' data-toggle='modal'
                            class='btn btn-primary'><i class="icon-plus"></i>  <?php echo $_smarty_tpl->tpl_vars['la']->value['country']['create'];?>
</a>
                    </div>
                </div>
                    <form id='sortForm'
                    action='{:U('low/country/default/update.json')}' method='post'>
                    <?php if (!empty($_smarty_tpl->tpl_vars['list']->value)){?>
                    <table class='table table-hover table-bordered'>
                        <thead>
                            <tr class='text-center'>
                                <!-- <th><?php echo $_smarty_tpl->tpl_vars['la']->value['country']['sort'];?>
</th> -->
                                <th><?php echo $_smarty_tpl->tpl_vars['la']->value['country']['title'];?>
</th>
                                <th><?php echo $_smarty_tpl->tpl_vars['la']->value['country']['createby'];?>
</th>
                                <th><?php echo $_smarty_tpl->tpl_vars['la']->value['country']['createtime'];?>
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
                                <td class='text-center'><a target="_blank" href="{:U('system/file/default/download/id/<?php echo $_smarty_tpl->tpl_vars['record']->value['id'];?>
.html')}"><?php echo $_smarty_tpl->tpl_vars['record']->value['title'];?>
</a></td>
                                <td class='text-center'><?php echo $_smarty_tpl->tpl_vars['record']->value['name'];?>
</td>
                                <td class='text-center'><?php echo $_smarty_tpl->tpl_vars['record']->value['createtime'];?>
</td>
                                <td class='text-center'><a
                                    href='{:U('low/country/edit/default/id/<?php echo $_smarty_tpl->tpl_vars['record']->value['id'];?>
.modal')}' data-toggle='modal'><?php echo $_smarty_tpl->tpl_vars['la']->value['edit'];?>
</a>
                                    <a href='{:U('low/country/default/delete/id/<?php echo $_smarty_tpl->tpl_vars['record']->value['id'];?>
.json')}'
                                    class='deleter'><?php echo $_smarty_tpl->tpl_vars['la']->value['delete'];?>
</a>
                                    </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan='6'>&nbsp;
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