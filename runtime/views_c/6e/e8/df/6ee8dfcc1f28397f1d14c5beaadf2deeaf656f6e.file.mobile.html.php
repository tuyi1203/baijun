<?php /* Smarty version Smarty-3.1.6, created on 2018-05-23 00:12:52
         compiled from "E:\wamp\www\baijun\app\modes\site\home\default\default\mobile.html" */ ?>
<?php /*%%SmartyHeaderCode:304065b042d25db9867-15858448%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6ee8dfcc1f28397f1d14c5beaadf2deeaf656f6e' => 
    array (
      0 => 'E:\\wamp\\www\\baijun\\app\\modes\\site\\home\\default\\default\\mobile.html',
      1 => 1527005545,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '304065b042d25db9867-15858448',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5b042d25eda9a',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5b042d25eda9a')) {function content_5b042d25eda9a($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/mobile/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<body class="ind">
<div class="indexBn displayCenter">
	<div class="indBox">
		<div class="indLogo"><a href="javascript:void(0);"><img src="{:T('mobile/img/ind_logo.png')}" /></a></div>
		<div class="indSearch">
	         <a href="javascript:void(0);" id="_schBtn1"><span>查找律师</span></a>
		</div>
		<div class="indNav">
			<ul>
				<li><a href="javascript:void(0);">事务所介绍</a></li>
				<li><a href="javascript:void(0);">专业领域</a></li>
				<li><a href="javascript:void(0);">专业团队</a></li>
				<li><a href="javascript:void(0);">百君微讯</a></li>
				<li><a href="javascript:void(0);">英文版</a></li>
			</ul>
		</div>
		<div class="indBtn"><a href="{:U('jigou/default')}">百君分所</a></div>

	</div>
	<div class="downPageBtn"><a href="javascript:void(0);" class="icon">&#xe627;</a></div>
</div>
<div id="page" class="indPage">
	<header class="indHeader ">
		<div class="headerBox displayCenter">
			<div class="l"><a href="#menu" class="icon">&#xe613;</a></div>
			<div class="c"><a href="首页.html"><img src="{:T('mobile/img/head-logo.png')}"></a></div>
			<div class="r"><a href="javascript:void(0);" class="icon" id="_schBtn2">&#xe60b;</a></div>
		</div>
	</header>
	<div class="content">
		<section class="indAbout">
			<div class="hd"><h6>关于我们</h6></div>
			<div class="bd">
				<div class="part">
					<div class="bn"><img src="{:T('mobile/img/about-bn.jpg')}" /></div>
					<div class="txt">
						<p>"百树成林，百君成业"，创办于一九八九年的百君，始终如一地践行以专业价值呈现法律的意义，打造具有区域性影响力的综合性律师事务所。</p>
						<div class="readMore"><a href="{:U('aboutus/intro')}">了解更多</a></div>
					</div>
				</div>
			</div>
		</section>
		<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/mobile/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	</div>
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/mobile/menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</div>
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/mobile/lawyersearch.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</body>
</html><?php }} ?>