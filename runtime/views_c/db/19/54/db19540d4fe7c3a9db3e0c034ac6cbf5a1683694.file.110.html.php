<?php /* Smarty version Smarty-3.1.6, created on 2015-10-10 15:32:39
         compiled from "D:\xampp\htdocs\baijun\app\views\admin\110.html" */ ?>
<?php /*%%SmartyHeaderCode:222315618bf1789d8f9-56597624%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'db19540d4fe7c3a9db3e0c034ac6cbf5a1683694' => 
    array (
      0 => 'D:\\xampp\\htdocs\\baijun\\app\\views\\admin\\110.html',
      1 => 1425262417,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '222315618bf1789d8f9-56597624',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5618bf179198a',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5618bf179198a')) {function content_5618bf179198a($_smarty_tpl) {?><!doctype html public "-//w3c//dtd html 4.0 transitional//en">
<html>
<head>
<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
<meta http-equiv=content-type content="text/html; charset=utf8">
<style type=text/css>
td {
	font-size: 9pt;
	font-family: "arial", "helvetica, " sans-serif "
}

body {
	font-size: 9pt;
	font-family: "arial", "helvetica", "sans-serif"
}

.tbl1 {
	border-right: #3f5294 1px solid;
	border-top: #3f5294 1px solid;
	font-size: 9pt;
	border-left: #3f5294 1px solid;
	border-bottom: #3f5294 1px solid
}

.td1 {
	border-right: #ffffff 0px solid;
	border-top: #ffffff 1px solid;
	border-left: #ffffff 1px solid;
	border-bottom: #ffffff 0px solid
}
</style>

<style type=text/css>
a {
	color: #000000;
	text-decoration: none
}

a:hover {
	color: #ff0000;
	text-decoration: none
}
</style>

<style type=text/css>
.style6 {
	font-family: "courier new", courier, mono
}
</style>

<meta content="mshtml 6.00.2900.2180" name=generator>
</head>
<body bgcolor=#ffffff>
	<p>&nbsp;</p>
	<table height=382 cellspacing=0 cellpadding=0 width=470 align=center
		border=0>
		<tbody>
			<tr>
				<td valign=top background="{:T('images/110.gif')}"><br>
					<table cellspacing=0 cellpadding=0 width="100%" border=0>
						<tbody>
							<tr>
								<td width="14%">&nbsp;</td>
								<td width="86%">
									<table style="filter: glow(color = #ffffff, strength = 5)"
										width="100%" align=center>
										<tbody>
											<tr>
												<td align=middle height=14><span class=style6><font
														color=#ff0000 size=6>sorry!</font></span></td>
											</tr>
										</tbody>
									</table>
						</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td>
								<div align=center>
									<table cellspacing=2 cellpadding=0 width="100%" align=center
										border=0>
										<tbody>
											<tr>
												<td>由于系统繁忙或故障，您执行的操作失败。</td>
											</tr>
											<tr>
												<td>
													<li><span id="time">5</span>秒后返回主页
													<a id="addr" href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
">
																	<font color=#990000></font>
															</a></li>
												</td>
											</tr>
										</tbody>
									</table>
						<br>
						</div>
						</td>
						</tr>
						</tbody>
					</table>
					<table cellspacing=0 cellpadding=0 width="98%" border=0>
						<tbody>
							<tr>
								<td width="38%">&nbsp;</td>
								<td width="17%">
									<div align=right>
										<a href="<?php echo $_smarty_tpl->tpl_vars['link']->value;?>
"><img height=38
											src="{:T('images/jt.gif')}" width=56 border=0></a>
									</div>
								</td>
								<td width="45%">
									<div align=center>
										<a href="{:U('home/default')}"><font color=#ff0000>[由此返回主页]</font></a>
									</div>
								</td>
							</tr>
						</tbody>
					</table></td>
			</tr>
		</tbody>
	</table>
	<p>&nbsp;</p>
	<center></center>
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
},1000);
</script>
</body>
</html>
<?php }} ?>