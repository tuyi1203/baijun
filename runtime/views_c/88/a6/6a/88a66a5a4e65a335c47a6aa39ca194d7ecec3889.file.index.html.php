<?php /* Smarty version Smarty-3.1.6, created on 2018-05-15 22:23:08
         compiled from "E:\wamp\www\baijun\app\modes\site\aboutus\intro\default\index.html" */ ?>
<?php /*%%SmartyHeaderCode:99535afaed4c35e0b2-36937999%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '88a66a5a4e65a335c47a6aa39ca194d7ecec3889' => 
    array (
      0 => 'E:\\wamp\\www\\baijun\\app\\modes\\site\\aboutus\\intro\\default\\index.html',
      1 => 1494342241,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '99535afaed4c35e0b2-36937999',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'UPLOADURL' => 0,
    'bannerurl' => 0,
    'intro' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5afaed4c52332',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5afaed4c52332')) {function content_5afaed4c52332($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<body>
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/leftbar.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="wrap aboutus" id="wrap">
	<section class="banner" style="background-image:url(<?php echo $_smarty_tpl->tpl_vars['UPLOADURL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['bannerurl']->value;?>
)"></section>
	<div class="container">
		<section class="crumbs">当前位置：<a href="{:U('home/default')}">首页</a><i>&gt;</i><span>关于我们</span><i>&gt;</i><span>事务所介绍</span></section>
		<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/aboutus.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

		<article class="content">
			<h6>
				<i>A</i>
				<span>
					<p>事务所介绍</p>
					<p class="en">bout Us</p>
				</span>
			</h6>
			<section class="single">
				<?php echo htmlspecialchars_decode($_smarty_tpl->tpl_vars['intro']->value['content']);?>

			</section>
		</article>
		<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	</div>
</div>

<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/floatbar.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<script>
requirejs( ["jquery","app"],function($){
	//$('#wrap').pageinit({debuge:true});//页面初始化
	//$('#_floatcontact').contact({debuge:true});//联系我们
});
</script>
</body>
</html>
<?php }} ?>