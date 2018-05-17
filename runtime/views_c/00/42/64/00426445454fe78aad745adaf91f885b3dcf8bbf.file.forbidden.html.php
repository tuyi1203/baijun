<?php /* Smarty version Smarty-3.1.6, created on 2017-12-08 21:55:08
         compiled from "D:\xampp\htdocs\baijun\app\views\admin\forbidden.html" */ ?>
<?php /*%%SmartyHeaderCode:109765a2a99bcde34e4-95851188%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '00426445454fe78aad745adaf91f885b3dcf8bbf' => 
    array (
      0 => 'D:\\xampp\\htdocs\\baijun\\app\\views\\admin\\forbidden.html',
      1 => 1419782400,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '109765a2a99bcde34e4-95851188',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'la' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5a2a99bce62f5',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a2a99bce62f5')) {function content_5a2a99bce62f5($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head profile="http://www.w3.org/2005/10/profile">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
<!--[if lt IE 9]>
<![endif]-->
<!--[if lt IE 10]>
<![endif]-->
<link rel='stylesheet' href="{:T('css/all.css')}" type='text/css'   media='screen' />
<script src="{:T('js/jquery-1.8.3.min.js')}" type='text/javascript'></script>
</head>
<body>

	<div class="clearfix">
		<div class='form-group'>
			<div class='col-xs-6 col-md-6 col-md-offset-3 alert alert-info'>
				<i class='icon-info-sign'></i>
				<div class='content'>
					<h4><?php echo $_smarty_tpl->tpl_vars['la']->value['forbidden']['message'];?>
</h4>
					<p><?php echo $_smarty_tpl->tpl_vars['la']->value['forbidden']['locate'];?>
</p>
					<a href='<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
' class='btn btn-primary' id='countDownBtn'>立即转向</a>
				</div>
			</div>
		</div>

	</div>


	<script language='Javascript'>
	$(function()
	{
	    setInterval(function()
	    {
	        var countDown = $('#countDown');
	        var count = parseInt(countDown.text());
	        if(count > 1)
	        {
	            countDown.text(count-1);
	        }
	        else
	        {
	            window.location.href = $('#countDownBtn').attr('href');
	        }
	    }, 1000);
	})

</script>
</body>
</html>
<?php }} ?>