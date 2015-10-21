<?php /* Smarty version Smarty-3.1.6, created on 2015-10-10 12:37:03
         compiled from "D:\xampp\htdocs\baijun\app\views\admin\404.html" */ ?>
<?php /*%%SmartyHeaderCode:18006561895efc2e6d7-18642663%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '669b1135fae7f30741b4e4fea6ab6bc4e8f1ece1' => 
    array (
      0 => 'D:\\xampp\\htdocs\\baijun\\app\\views\\admin\\404.html',
      1 => 1425262405,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18006561895efc2e6d7-18642663',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_561895efc6ea2',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_561895efc6ea2')) {function content_561895efc6ea2($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0027)http://www.kugou.com/dfdfdf -->
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<meta http-equiv="X-UA-Compatible" content="IE=7">
<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
<link rel="stylesheet" href="{:T('css/404.css')}" type="text/css">
</head>

<body style="background:url({:T('images/404.png')}) no-repeat center 120px; width:550px; height:430px; margin:0 auto">
<div class="notFound">
	<div><h1>您访问的页面不存在。</h1><span id="time">5</span>秒后将回到<a id="addr" hidfocus="true" href="{:U('home/default')}">首页</a></div>
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

</body></html><?php }} ?>