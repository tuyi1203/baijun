<?php /* Smarty version Smarty-3.1.6, created on 2015-10-22 08:58:07
         compiled from "D:\xampp\htdocs\baijun\app\views\site\404.html" */ ?>
<?php /*%%SmartyHeaderCode:64175628349fb73ff2-03630351%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b2e642f09c68b71f826ecd8cf5f69c8656ede908' => 
    array (
      0 => 'D:\\xampp\\htdocs\\baijun\\app\\views\\site\\404.html',
      1 => 1425261938,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '64175628349fb73ff2-03630351',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5628349fca411',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5628349fca411')) {function content_5628349fca411($_smarty_tpl) {?>﻿<!doctype html>
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
            <h6>404</h6>
            <div class="tit"><p>抱歉，您访问的页面不存在</p></div>
            <div class="txt"><p><span id="time">5</span>秒后返回本站<a href="{:U('home/default')}" id="addr">首页</a></p></div>
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