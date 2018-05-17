<?php /* Smarty version Smarty-3.1.6, created on 2018-05-10 14:52:57
         compiled from "E:\wamp\www\baijun\app\views\site\mobile\header.html" */ ?>
<?php /*%%SmartyHeaderCode:167355af45bc9bf3dc9-25675042%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ed0d9c8c6216669277590876e4c70c6d30de3573' => 
    array (
      0 => 'E:\\wamp\\www\\baijun\\app\\views\\site\\mobile\\header.html',
      1 => 1525963969,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '167355af45bc9bf3dc9-25675042',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5af45bc9c5585',
  'variables' => 
  array (
    'sitetitle' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5af45bc9c5585')) {function content_5af45bc9c5585($_smarty_tpl) {?><!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title><?php if (!isset($_smarty_tpl->tpl_vars['sitetitle']->value)){?>{:C('SITENAME')}<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['sitetitle']->value;?>
<?php }?></title>
	<meta name="format-detection" content="telephone=no, address=no">
	<meta name="apple-mobile-web-app-capable" content="yes" /> <!-- apple devices fullscreen -->
	<meta name="apple-touch-fullscreen" content="yes"/>
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
	<meta http-equiv="pragma" content="no-cache"> 
	<meta http-equiv="Cache-Control" content="no-cache, must-revalidate"> 
	<meta http-equiv="expires" content="0">
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<link rel="stylesheet" type="text/css" href="{:T('mobile/css/style.css')}">
	<link rel="stylesheet" type="text/css" href="{:T('mobile/css/mmenu.css')}">
	<script src="{:T('mobile/js/rem.js')}"></script>
	<script src="{:T('mobile/js/require.js')}"></script>
	<script src="{:T('mobile/js/main.js')}"></script>
</head><?php }} ?>