<?php /* Smarty version Smarty-3.1.6, created on 2015-10-22 20:36:45
         compiled from "D:\xampp\htdocs\baijun\app\modes\admin\common\lawyer\default\index.modal" */ ?>
<?php /*%%SmartyHeaderCode:4318562852a93862b1-57644385%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '78fffdb7e02e552c6da3c56176e5ba59e0ddbcc7' => 
    array (
      0 => 'D:\\xampp\\htdocs\\baijun\\app\\modes\\admin\\common\\lawyer\\default\\index.modal',
      1 => 1445517381,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4318562852a93862b1-57644385',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_562852a94ac1b',
  'variables' => 
  array (
    'la' => 0,
    'list' => 0,
    'lawyer' => 0,
    'file' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_562852a94ac1b')) {function content_562852a94ac1b($_smarty_tpl) {?><?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['ex'][0][0]->export(array('fn'=>"exportJsSet"),$_smarty_tpl);?>

<div class='modal-dialog w-1000px'>
  <div class='modal-content'>
    <div class='modal-header'>
      <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['ex'][0][0]->export(array('class'=>"html",'fn'=>"closeButton"),$_smarty_tpl);?>

      <h4 class='modal-title' id='ajaxModalTitle'><i class='icon-paper-clip'></i> <?php echo $_smarty_tpl->tpl_vars['la']->value['lawyer']['common'];?>
</h4>
    </div>
    <div class='modal-body'>
      <table class='table table-bordered'>
        <thead>
          <tr>
            <th class='text-center'><?php echo $_smarty_tpl->tpl_vars['la']->value['lawyer']['id'];?>
</th>
            <th class='text-center'><?php echo $_smarty_tpl->tpl_vars['la']->value['lawyer']['name'];?>
</th>
            <th class='text-center'><?php echo $_smarty_tpl->tpl_vars['la']->value['lawyer']['picture'];?>
</th>
            <th class='text-center'><?php echo $_smarty_tpl->tpl_vars['la']->value['lawyer']['department'];?>
</th>
            <th class='text-center'><?php echo $_smarty_tpl->tpl_vars['la']->value['actions'];?>
</th>
          </tr>
        </thead>
        <tbody>
          <?php  $_smarty_tpl->tpl_vars["lawyer"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["lawyer"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['list']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["lawyer"]->key => $_smarty_tpl->tpl_vars["lawyer"]->value){
$_smarty_tpl->tpl_vars["lawyer"]->_loop = true;
?>
          <tr class='text-middle'>
            <td><?php echo $_smarty_tpl->tpl_vars['lawyer']->value['id'];?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['lawyer']->value['first_name'];?>
 <?php echo $_smarty_tpl->tpl_vars['lawyer']->value['last_name'];?>
</td>
            <td><a target="_blank" href="{:U('admin/system/file/default/download/id/<?php echo $_smarty_tpl->tpl_vars['lawyer']->value['id'];?>
.html')}">
                    <img title="<?php echo $_smarty_tpl->tpl_vars['file']->value['title'];?>
" class="image-small" src="<?php echo $_smarty_tpl->tpl_vars['lawyer']->value['url'];?>
">
                </a>
            </td>
            <td><?php echo $_smarty_tpl->tpl_vars['lawyer']->value['bumen'];?>
</td>
            <td>
            <a class="choose" href="javascript:lawyerselect(<?php echo $_smarty_tpl->tpl_vars['lawyer']->value['id'];?>
,'<?php echo $_smarty_tpl->tpl_vars['lawyer']->value['first_name'];?>
 <?php echo $_smarty_tpl->tpl_vars['lawyer']->value['last_name'];?>
');"><?php echo $_smarty_tpl->tpl_vars['la']->value['select'];?>
</a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['ex'][0][0]->export(array('fn'=>'exportJs'),$_smarty_tpl);?>
<?php }} ?>