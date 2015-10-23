<?php /* Smarty version Smarty-3.1.6, created on 2015-10-22 11:03:46
         compiled from "D:\xampp\htdocs\baijun\app\modes\admin\module\script\default\index.html" */ ?>
<?php /*%%SmartyHeaderCode:49635628521248dc78-11999808%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '580546916f85d3c93aabe71593b7745a33780e69' => 
    array (
      0 => 'D:\\xampp\\htdocs\\baijun\\app\\modes\\admin\\module\\script\\default\\index.html',
      1 => 1418392944,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '49635628521248dc78-11999808',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'la' => 0,
    'mode_options' => 0,
    'mode_choose' => 0,
    'module_options' => 0,
    'module_choose' => 0,
    'second_options' => 0,
    'second_choose' => 0,
    'list' => 0,
    'record' => 0,
    'action' => 0,
    'rolelist' => 0,
    'key' => 0,
    'inner' => 0,
    'outer' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_562852125f2c1',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_562852125f2c1')) {function content_562852125f2c1($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include 'D:\\xampp\\htdocs\\baijun\\eku\\plugins\\smarty\\plugins\\function.html_options.php';
?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<body>
    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/top_menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


    <div class="clearfix">
    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/left_menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

        <div class='col-md-10'>
            <div class='panel'>
                <div class='panel-heading'>
                    <strong><i class='icon-picture'></i> <?php echo $_smarty_tpl->tpl_vars['la']->value['script']['common'];?>
</strong>

                    <div class='panel-actions'>
                        <a href='{:U('module/script/add/default.html')}'
                            class='btn btn-primary'><i class="icon-plus"></i> <?php echo $_smarty_tpl->tpl_vars['la']->value['script']['create'];?>
</a>
                    </div>
                </div>
                <!-- <form id='sortForm'
                    action='/chanzhieps/www/admin.php?m=slide&f=sort' method='post'>-->
                    <form id='changeForm' method='post'>
                    <table class="table">
                        <tr>
                          <td class='w-140px'>&nbsp;<?php echo $_smarty_tpl->tpl_vars['la']->value['script']['modechoose'];?>

                          </td>
                          <td colspan='5'>
                              <select name='data[mode]' id='mode' class='selectMode'>
                                  <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['mode_options']->value,'selected'=>$_smarty_tpl->tpl_vars['mode_choose']->value),$_smarty_tpl);?>

                              </select>
                          </td>
                          </tr>
                          <tr>
                          <td>&nbsp;<?php echo $_smarty_tpl->tpl_vars['la']->value['script']['modulechoose'];?>

                          </td>
                          <td colspan='5'>
                              <select name='data[pid]' id='pid' class='selectModule'>
                                  <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['module_options']->value,'selected'=>$_smarty_tpl->tpl_vars['module_choose']->value),$_smarty_tpl);?>

                              </select>
                          </td>
                          </tr>
                          <tr>
                          <td>&nbsp;<?php echo $_smarty_tpl->tpl_vars['la']->value['script']['secondchoose'];?>

                          </td>
                          <td colspan='5'>
                              <select name='data[sid]' id='sid' class='selectSecond'>
                                  <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['second_options']->value,'selected'=>$_smarty_tpl->tpl_vars['second_choose']->value),$_smarty_tpl);?>

                              </select>
                          </td>
                          </tr>
                    </table>
                    </form>
                    <form id='sortForm'
                    action='{:U('module/script/default/update.json')}' method='post'>
                    <?php if (!empty($_smarty_tpl->tpl_vars['list']->value)){?>
                    <table class='table table-hover table-bordered'>
                        <thead>
                            <tr class='text-center script-th'>
                                <th><?php echo $_smarty_tpl->tpl_vars['la']->value['script']['des'];?>
</th>
                                <th><?php echo $_smarty_tpl->tpl_vars['la']->value['script']['name'];?>
</th>
                                <th><?php echo $_smarty_tpl->tpl_vars['la']->value['script']['createby'];?>
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
                            <tr class='text-middle script-record'>
                                <td class='text-center'><?php echo $_smarty_tpl->tpl_vars['record']->value['des'];?>
</td>
                                <td class='text-center'><?php echo $_smarty_tpl->tpl_vars['record']->value['name'];?>
</td>
                                <td class='text-center'><?php echo $_smarty_tpl->tpl_vars['record']->value['username'];?>
</td>
                                <td class='text-center'><a
                                    href='{:U('module/script/edit/default/id/<?php echo $_smarty_tpl->tpl_vars['record']->value['id'];?>
.html')}'><?php echo $_smarty_tpl->tpl_vars['la']->value['edit'];?>
</a>
                                    <a href='{:U('module/script/default/delete/id/<?php echo $_smarty_tpl->tpl_vars['record']->value['id'];?>
.json')}'
                                    class='deleter'><?php echo $_smarty_tpl->tpl_vars['la']->value['delete'];?>
</a></td>
                            </tr>
                            <tr class='text-middle'>
                                <td class='text-center' colspan="4">
                                <table class='table'>
                                     <thead>
			                            <tr class='text-center'>
			                                <th><?php echo $_smarty_tpl->tpl_vars['la']->value['script']['ades'];?>
</th>
			                                <th><?php echo $_smarty_tpl->tpl_vars['la']->value['script']['aname'];?>
</th>
			                                <th><?php echo $_smarty_tpl->tpl_vars['la']->value['script']['auth'];?>
</th>
			                                <th><a href='{:U('module/action/add/default/scriptid/<?php echo $_smarty_tpl->tpl_vars['record']->value['id'];?>
.modal')}'
                            class='btn btn-primary ' data-toggle='modal'><i class="icon-plus"></i><?php echo $_smarty_tpl->tpl_vars['la']->value['script']['createaction'];?>
</a></th>
			                            </tr>
			                            <?php  $_smarty_tpl->tpl_vars["action"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["action"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['record']->value['action']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["action"]->key => $_smarty_tpl->tpl_vars["action"]->value){
$_smarty_tpl->tpl_vars["action"]->_loop = true;
?>
			                             <tr class='text-middle'>
			                                 <td class='text-center'><?php echo $_smarty_tpl->tpl_vars['action']->value['des'];?>
</td>
			                                 <td class='text-center'><?php echo $_smarty_tpl->tpl_vars['action']->value['name'];?>
</td>
			                                 <td class='text-center'>
			                                 <?php  $_smarty_tpl->tpl_vars["outer"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["outer"]->_loop = false;
 $_smarty_tpl->tpl_vars["key"] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['rolelist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["outer"]->key => $_smarty_tpl->tpl_vars["outer"]->value){
$_smarty_tpl->tpl_vars["outer"]->_loop = true;
 $_smarty_tpl->tpl_vars["key"]->value = $_smarty_tpl->tpl_vars["outer"]->key;
?>
			                                     <input id="role_<?php echo $_smarty_tpl->tpl_vars['action']->value['id'];?>
_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
" type="checkbox" name="data[role][<?php echo $_smarty_tpl->tpl_vars['action']->value['id'];?>
][<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
]" value="1"
			                                     <?php  $_smarty_tpl->tpl_vars["inner"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["inner"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['action']->value['role']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["inner"]->key => $_smarty_tpl->tpl_vars["inner"]->value){
$_smarty_tpl->tpl_vars["inner"]->_loop = true;
?>
			                                         <?php if ($_smarty_tpl->tpl_vars['inner']->value['id']==$_smarty_tpl->tpl_vars['key']->value&&$_smarty_tpl->tpl_vars['inner']->value['operauth']=="1"){?>
			                                             checked = "checked"
			                                         <?php }?>
			                                     <?php } ?>
			                                     >&nbsp;&nbsp;<label for="role_<?php echo $_smarty_tpl->tpl_vars['action']->value['id'];?>
_<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['outer']->value;?>
</label>&nbsp;&nbsp;&nbsp;&nbsp;
			                                 <?php } ?>
			                                 </td>
			                                 <td class='text-center'><a
                                    href='{:U('module/action/edit/default/id/<?php echo $_smarty_tpl->tpl_vars['action']->value['id'];?>
.modal')}' data-toggle='modal'><?php echo $_smarty_tpl->tpl_vars['la']->value['edit'];?>
</a>
                                    <a href='{:U('module/action/default/delete/id/<?php echo $_smarty_tpl->tpl_vars['action']->value['id'];?>
.json')}'
                                    class='deleter'><?php echo $_smarty_tpl->tpl_vars['la']->value['delete'];?>
</a></td>
			                             </tr>
			                            <?php } ?>
			                        </thead>
			                        <tbody>
			                        </tbody>
                                </table>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan='6'>&nbsp;<input type='submit' id='submit'
                                    class='btn btn-primary' value='<?php echo $_smarty_tpl->tpl_vars['la']->value['script']['save'];?>
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