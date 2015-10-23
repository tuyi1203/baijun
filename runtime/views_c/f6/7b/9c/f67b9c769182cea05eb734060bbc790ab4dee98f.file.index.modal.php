<?php /* Smarty version Smarty-3.1.6, created on 2015-10-22 11:04:21
         compiled from "D:\xampp\htdocs\baijun\app\modes\admin\module\action\add\index.modal" */ ?>
<?php /*%%SmartyHeaderCode:6169562852352ad0f5-94002688%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f67b9c769182cea05eb734060bbc790ab4dee98f' => 
    array (
      0 => 'D:\\xampp\\htdocs\\baijun\\app\\modes\\admin\\module\\action\\add\\index.modal',
      1 => 1418392949,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6169562852352ad0f5-94002688',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'la' => 0,
    'name' => 0,
    'des' => 0,
    'scriptid' => 0,
    'id' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5628523531e8b',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5628523531e8b')) {function content_5628523531e8b($_smarty_tpl) {?><div class='modal-dialog w-600px'>
  <div class='modal-content'>
    <div class='modal-header'>
    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['ex'][0][0]->export(array('class'=>"html",'fn'=>"closeButton"),$_smarty_tpl);?>

      <h4 class='modal-title'><i class='icon-plus'></i>  <?php echo $_smarty_tpl->tpl_vars['la']->value['action']['add'];?>
</h4>
    </div>
    <div class='modal-body'>
      <form method='post' enctype='multipart/form-data' id='myForm' action='{:U('module/action/add/insert.json')}'>
        <table class='table table-form'>
          <tr>
            <th class='w-80px'><?php echo $_smarty_tpl->tpl_vars['la']->value['action']['name'];?>
</th>
            <td>
                <input type="text" name="data[name]" id="name" value="<?php echo $_smarty_tpl->tpl_vars['name']->value;?>
" class="form-control">
            </td>
          </tr>
           <tr>
            <th class='w-80px'><?php echo $_smarty_tpl->tpl_vars['la']->value['action']['des'];?>
</th>
            <td>
                <input type="text" name="data[des]" id="des" value="<?php echo $_smarty_tpl->tpl_vars['des']->value;?>
" class="form-control">
                <input type="hidden" name="data[scriptid]" value="<?php echo $_smarty_tpl->tpl_vars['scriptid']->value;?>
">
            </td>
          </tr>
            <th></th>
            <td><input type="submit" data-loading="<?php echo $_smarty_tpl->tpl_vars['la']->value['loading'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['la']->value['save'];?>
" class="btn btn-primary" id="submit"/>
            <input type="button" class="btn btn-default goback" value="<?php echo $_smarty_tpl->tpl_vars['la']->value['close'];?>
">
            </td>
          </tr>
        </table>
        <input type="hidden" name="data[id]" value="<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
" >
      </form>
    </div>
  </div>
</div>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['ex'][0][0]->export(array('fn'=>'exportJs'),$_smarty_tpl);?>
<?php }} ?>