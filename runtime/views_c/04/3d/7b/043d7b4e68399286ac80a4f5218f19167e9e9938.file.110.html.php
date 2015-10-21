<?php /* Smarty version Smarty-3.1.6, created on 2015-10-10 12:02:25
         compiled from "D:\xampp\htdocs\baijun\app\views\site\110.html" */ ?>
<?php /*%%SmartyHeaderCode:2137256188dd1a68b13-30286739%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '043d7b4e68399286ac80a4f5218f19167e9e9938' => 
    array (
      0 => 'D:\\xampp\\htdocs\\baijun\\app\\views\\site\\110.html',
      1 => 1425291653,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2137256188dd1a68b13-30286739',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_56188dd1aec73',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56188dd1aec73')) {function content_56188dd1aec73($_smarty_tpl) {?>﻿<!doctype html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
<link rel="stylesheet" type="text/css" href="{:T('css/base.css')}" />
<link rel="stylesheet" type="text/css" href="{:T('css/error.css')}" />
</head>
<body>
<div class="errCode">
	<div class="codeCon">
        <div class="l">
            <h6>500</h6>
            <div class="tit"><p>抱歉，页面打不开了</p></div>
            <div class="txt"><p><span id="time">5</span>秒后返回本站<a href="{:U('home/default')}" id="addr">首页</a></p><p>或直接联系技术支持方<a href="http://www.mingwon.com">铭望科技</a>，尽快修复此问题</p></div>
        </div>
        <div class="r">
        	<div class="grear gL"><img src="{:T('img/gear.png')}" /></div>
            <div class="grear gR"><img src="{:T('img/gear.png')}" /></div>
            <div class="grear gT"><img src="{:T('img/gear.png')}" /></div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<script type="text/javascript">
var el = document.getElementById("time");
//alert(request)

setInterval(function(){
    var val = Number(el.innerHTML);
    if(val <= 1){
        location.href = document.getElementById("addr").href;
    }else{
        el.innerHTML = val - 1;
    }
},1000)
</script>
</body>
</html><?php }} ?>