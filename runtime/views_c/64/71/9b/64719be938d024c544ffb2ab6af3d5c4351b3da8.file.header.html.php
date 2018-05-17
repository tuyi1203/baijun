<?php /* Smarty version Smarty-3.1.6, created on 2017-12-08 23:43:38
         compiled from "D:\xampp\htdocs\baijun\app\views\site\header.html" */ ?>
<?php /*%%SmartyHeaderCode:277425a2ab32ab07cd1-88963929%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '64719be938d024c544ffb2ab6af3d5c4351b3da8' => 
    array (
      0 => 'D:\\xampp\\htdocs\\baijun\\app\\views\\site\\header.html',
      1 => 1504622090,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '277425a2ab32ab07cd1-88963929',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'sitetitle' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5a2ab32ab4fa7',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a2ab32ab4fa7')) {function content_5a2ab32ab4fa7($_smarty_tpl) {?><!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title><?php if (!isset($_smarty_tpl->tpl_vars['sitetitle']->value)){?>{:C('SITENAME')}<?php }else{ ?><?php echo $_smarty_tpl->tpl_vars['sitetitle']->value;?>
<?php }?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="baidu-site-verification" content="h8KUQ4zBJc" />
    <meta http-equiv="Cache-Control" content="private" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="baidu-site-verification" content="PdM2LUWMCq" />
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!–[if lt IE9]>
    <script src="{:T('js/html5.js')}"></script>
    <![endif]–>
    <link rel="stylesheet" href="{:T('css/reset.css')}" type="text/css" />
    <link rel="stylesheet" href="{:T('css/contrls.css')}" type="text/css" />
    <link rel="stylesheet" href="{:T('css/style.css')}" type="text/css" />
    <style>
    html,body{height:100%;}
    </style>
	<script>
		var require = {
			urlArgs: "mw=" +  (new Date()).getTime()
		};
	</script>
	<script src="{:T('js/require.js')}"></script>
	<script src="{:T('js/main.js')}"></script>
</head><?php }} ?>