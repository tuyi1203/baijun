<?php /* Smarty version Smarty-3.1.6, created on 2015-10-22 09:01:09
         compiled from "D:\xampp\htdocs\baijun\app\modes\admin\system\topimage\edit\index.modal" */ ?>
<?php /*%%SmartyHeaderCode:3187156283555cf48f3-09836395%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eb81bd8ad4434bd40451febdc6a8284fb30e6f53' => 
    array (
      0 => 'D:\\xampp\\htdocs\\baijun\\app\\modes\\admin\\system\\topimage\\edit\\index.modal',
      1 => 1423798157,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3187156283555cf48f3-09836395',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'la' => 0,
    'title' => 0,
    'url' => 0,
    'id' => 0,
    'objecttype' => 0,
    'objectid' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_56283555d8189',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56283555d8189')) {function content_56283555d8189($_smarty_tpl) {?><div class='modal-dialog w-800px'>
  <div class='modal-content'>
    <div class='modal-header'>
    <?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['ex'][0][0]->export(array('class'=>"html",'fn'=>"closeButton"),$_smarty_tpl);?>

      <h4 class='modal-title'><i class='icon-edit'></i>  <?php echo $_smarty_tpl->tpl_vars['la']->value['topimage']['edit'];?>
</h4>
    </div>
    <div class='modal-body'>
      <form method='post' enctype='multipart/form-data' id='fileForm' action='{:U('system/topimage/edit/update.json')}'>
        <table class='table table-form'>
          <tr>
            <th class='w-80px'><?php echo $_smarty_tpl->tpl_vars['la']->value['topimage']['title'];?>
</th>
            <td>
                <input type="text" name="data[title]" value="<?php echo $_smarty_tpl->tpl_vars['title']->value;?>
" class="form-control">
            </td>
          </tr>
          <?php if (isset($_smarty_tpl->tpl_vars['url']->value)){?>
          <tr>
            <th rowspan="2"><?php echo $_smarty_tpl->tpl_vars['la']->value['topimage']['picture'];?>
</th>
               <td><img class="image" src="<?php echo $_smarty_tpl->tpl_vars['url']->value;?>
"></td>
           </tr>
          <?php }?>
            <tr>
             <?php if (!isset($_smarty_tpl->tpl_vars['url']->value)){?>
                <th><?php echo $_smarty_tpl->tpl_vars['la']->value['topimage']['picture'];?>
</th>
             <?php }?>
              <td>
                 <input type="file" class="form-control" tabindex="-1" id="upFile" name="upFile">
               </td>
            </tr>
          <tr>
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
        <input type="hidden" name="data[objecttype]" value="<?php echo $_smarty_tpl->tpl_vars['objecttype']->value;?>
" >
        <input type="hidden" name="data[objectid]" value="<?php echo $_smarty_tpl->tpl_vars['objectid']->value;?>
" >
      </form>
    </div>
  </div>
</div>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['ex'][0][0]->export(array('fn'=>'exportJs'),$_smarty_tpl);?>
<?php }} ?>