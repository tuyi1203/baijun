<?php /* Smarty version Smarty-3.1.6, created on 2015-10-20 15:51:24
         compiled from "D:\xampp\htdocs\baijun\app\views\admin\datepicker.html" */ ?>
<?php /*%%SmartyHeaderCode:25355625f0c3016d16-77256242%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8c73d52abba805644d5d853a06bdf2b07a61a663' => 
    array (
      0 => 'D:\\xampp\\htdocs\\baijun\\app\\views\\admin\\datepicker.html',
      1 => 1445327482,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25355625f0c3016d16-77256242',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5625f0c308b20',
  'variables' => 
  array (
    'CLIENTLANG' => 0,
    'datepicker' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5625f0c308b20')) {function content_5625f0c308b20($_smarty_tpl) {?><link rel='stylesheet' href="{:T('js/datetimepicker/css/min.css')}" type='text/css'   media='screen' />
<script src="{:T('js/datetimepicker/js/min.js')}" type='text/javascript'></script>
<?php if ($_smarty_tpl->tpl_vars['CLIENTLANG']->value!='en'){?>
    <script src="{:T('js/datetimepicker/js/locales/<?php echo $_smarty_tpl->tpl_vars['CLIENTLANG']->value;?>
.js')}" type='text/javascript'></script>
<?php }?>
<script language='javascript'>
startDate = new Date(2000, 1, 1);
//var option = {
//	format: 'yyyy-mm-dd hh:ii',
//    startDate:startDate,
//	pickerPosition: 'top-left',
//	todayBtn: true,
//	autoclose: true,
//	keyboardNavigation:false,
//	language:'<?php echo $_smarty_tpl->tpl_vars['CLIENTLANG']->value;?>
',
//	minView:2,
//	todayHighlight:true
//};
var option = {};
option.full = {
format: 'yyyy-mm-dd hh:ii',
startDate:startDate,
pickerPosition: 'buttom-left',
todayBtn: true,
autoclose: true,
keyboardNavigation:false,
language:'<?php echo $_smarty_tpl->tpl_vars['CLIENTLANG']->value;?>
',
minView:1,
todayHighlight:true
};

option.simple = {
format: 'yyyy-mm-dd',
startDate:startDate,
pickerPosition: 'buttom-left',
todayBtn: true,
autoclose: true,
keyboardNavigation:false,
language:'<?php echo $_smarty_tpl->tpl_vars['CLIENTLANG']->value;?>
',
minView:2,
todayHighlight:true
};

option.right = {
//format: 'yyyy-mm-dd hh:ii',
format: 'yyyy-mm-dd hh:ii:ss',
startDate:startDate,
pickerPosition: 'top-right',
todayBtn: true,
autoclose: true,
keyboardNavigation:false,
language:'<?php echo $_smarty_tpl->tpl_vars['CLIENTLANG']->value;?>
',
minView:1,
todayHighlight:true
};

$(function()
{
    $(".date").datetimepicker(option.<?php echo $_smarty_tpl->tpl_vars['datepicker']->value['option'];?>
);
});
//$(".date").datetimepicker(option);
//});
</script><?php }} ?>