<?php /* Smarty version Smarty-3.1.6, created on 2015-10-10 12:02:57
         compiled from "D:\xampp\htdocs\baijun\app\views\admin\header.html" */ ?>
<?php /*%%SmartyHeaderCode:565256188df11efe80-26813374%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '15f76f3f73431937bf27f7e3e8488935aae8f588' => 
    array (
      0 => 'D:\\xampp\\htdocs\\baijun\\app\\views\\admin\\header.html',
      1 => 1427198096,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '565256188df11efe80-26813374',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_56188df122a04',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56188df122a04')) {function content_56188df122a04($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{:C('SITENAME')}-管理后台</title>
<meta name='description' content=''>
<!--
<script language='Javascript'>var config={"webRoot":"\/chanzhieps\/www\/","cookieLife":30,"requestType":"GET","requestFix":"-","moduleVar":"m","methodVar":"f","viewVar":"t","defaultView":"html","themeRoot":"\/chanzhieps\/www\/theme\/","currentModule":"slide","currentMethod":"admin","clientLang":"zh-cn","requiredFields":"","save":"\u4fdd\u5b58","router":"\/chanzhieps\/www\/admin.php","runMode":"admin"}
</script>
 -->
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['ex'][0][0]->export(array('class'=>"js",'fn'=>"exportConfig"),$_smarty_tpl);?>

<link rel='stylesheet' href="{:T('css/all.css')}" type='text/css'   media='screen' />
<script src="{:T('js/all.js')}" type='text/javascript'></script>
<link rel='stylesheet' href="{:T('css/admin.css')}" type='text/css' media='screen' />
<script src="{:T('js/my.admin.js')}" type='text/javascript'></script>
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['ex'][0][0]->export(array('fn'=>"exportCss"),$_smarty_tpl);?>

<link rel='icon' href="{:T('images/favicon.ico')}" type='image/x-icon' />
<link rel='shortcut icon' href="{:T('images/favicon.ico')}" type='image/x-icon' />
<!--[if lt IE 9]>
<script src='/chanzhieps/www/js/html5shiv/min.js?v=2.1' type='text/javascript'></script>
<script src='/chanzhieps/www/js/respond/min.js?v=2.1' type='text/javascript'></script>
<![endif]-->
<!--[if lt IE 10]>
<script src='/chanzhieps/www/js/jquery/placeholder/min.js?v=2.1' type='text/javascript'></script>
<![endif]-->
<?php echo $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['ex'][0][0]->export(array('fn'=>"exportJsSet"),$_smarty_tpl);?>

<!-- <script language='Javascript'>var v = {};v.lang = {"confirmDelete":"\u60a8\u786e\u5b9a\u8981\u6267\u884c\u5220\u9664\u64cd\u4f5c\u5417\uff1f","deleteing":"\u5220\u9664\u4e2d","doing":"\u5904\u7406\u4e2d","timeout":"\u7f51\u7edc\u8d85\u65f6,\u8bf7\u91cd\u8bd5"};</script>  -->
</head><?php }} ?>