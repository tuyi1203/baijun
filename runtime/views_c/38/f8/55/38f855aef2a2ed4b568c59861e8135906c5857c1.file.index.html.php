<?php /* Smarty version Smarty-3.1.6, created on 2017-12-08 21:55:06
         compiled from "D:\xampp\htdocs\baijun\app\modes\admin\website\slides\default\index.html" */ ?>
<?php /*%%SmartyHeaderCode:316955a2a99bad5d1d4-29616623%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '38f855aef2a2ed4b568c59861e8135906c5857c1' => 
    array (
      0 => 'D:\\xampp\\htdocs\\baijun\\app\\modes\\admin\\website\\slides\\default\\index.html',
      1 => 1423843200,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '316955a2a99bad5d1d4-29616623',
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
  'unifunc' => 'content_5a2a99bae3324',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a2a99bae3324')) {function content_5a2a99bae3324($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<body>
    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/top_menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


    <div class="clearfix">
    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/left_menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <div class='col-md-10'>
            <div class='panel'>
                <div class='panel-heading'>
                    <strong><i class='icon-picture'></i>  <?php echo $_smarty_tpl->tpl_vars['la']->value['slides']['common'];?>
</strong>
                    <?php if (count($_smarty_tpl->tpl_vars['list']->value)<5){?>
                    <div class='panel-actions'>
                        <a href='{:U('website/slides/add/default.html')}'
                            class='btn btn-primary'><i class="icon-plus"></i>  <?php echo $_smarty_tpl->tpl_vars['la']->value['slides']['create'];?>
</a>
                    </div>
                    <?php }?>
                </div>
                    <form id='sortForm'
                    action='{:U('website/slides/default/update.json')}' method='post'>
                    <?php if (!empty($_smarty_tpl->tpl_vars['list']->value)){?>
                    <table class='table table-hover table-bordered'>
                        <thead>
                            <tr class='text-center'>
                                <th><?php echo $_smarty_tpl->tpl_vars['la']->value['slides']['sort'];?>
</th>
                                <th><?php echo $_smarty_tpl->tpl_vars['la']->value['slides']['picture'];?>
</th>
                                <th><?php echo $_smarty_tpl->tpl_vars['la']->value['slides']['title'];?>
</th>
                                <th style="display:none;"><?php echo $_smarty_tpl->tpl_vars['la']->value['slides']['desc'];?>
</th>
                                <th><?php echo $_smarty_tpl->tpl_vars['la']->value['slides']['label'];?>
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
                                <td class='text-center'>
                                <a target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['record']->value['url'];?>
"><img class="image-small" src="<?php echo $_smarty_tpl->tpl_vars['record']->value['url'];?>
"></a></td>
                                <td class='text-center'><?php echo $_smarty_tpl->tpl_vars['record']->value['title'];?>
</td>
                                <td class='text-center' style="display:none;"><?php echo $_smarty_tpl->tpl_vars['record']->value['desc'];?>
</td>
                                <td class='text-center'><?php echo $_smarty_tpl->tpl_vars['record']->value['label'];?>
</td>
                                <td class='text-center'><a
                                    href='{:U('website/slides/edit/default/id/<?php echo $_smarty_tpl->tpl_vars['record']->value['id'];?>
.html')}'><?php echo $_smarty_tpl->tpl_vars['la']->value['edit'];?>
</a>
                                    <a href='{:U('website/slides/default/delete/id/<?php echo $_smarty_tpl->tpl_vars['record']->value['id'];?>
.json')}'
                                    class='deleter'><?php echo $_smarty_tpl->tpl_vars['la']->value['delete'];?>
</a></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan='6'>&nbsp; <input type='submit' id='submit'
                                    class='btn btn-primary' value='<?php echo $_smarty_tpl->tpl_vars['la']->value['slides']['savesort'];?>
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