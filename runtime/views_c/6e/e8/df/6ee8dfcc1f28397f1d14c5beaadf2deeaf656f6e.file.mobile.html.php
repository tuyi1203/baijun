<?php /* Smarty version Smarty-3.1.6, created on 2018-05-22 22:45:57
         compiled from "E:\wamp\www\baijun\app\modes\site\home\default\default\mobile.html" */ ?>
<?php /*%%SmartyHeaderCode:304065b042d25db9867-15858448%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6ee8dfcc1f28397f1d14c5beaadf2deeaf656f6e' => 
    array (
      0 => 'E:\\wamp\\www\\baijun\\app\\modes\\site\\home\\default\\default\\mobile.html',
      1 => 1527000184,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '304065b042d25db9867-15858448',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5b042d25eda9a',
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
		<div class="indBtn"><a href="javascript:void(0);">百君分所</a></div>

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
						<div class="readMore"><a href="javascript:void(0);">了解更多</a></div>
					</div>
				</div>
			</div>
		</section>
		<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/mobile/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	</div>
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/mobile/menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</div>
<div class="schLayout" id="_sch">
    <a href="javascript:void(0);" class="icon closeSch" id="_closeSch">&#xe6b9;</a>
    <div class="layout displayCenter">
        <div class="box">
            <h6>查找律师</h6>

            <div class="form">
                <div class="mod"><input type="text" placeholder="输入律师名字进行查找" class="text" /></div>
                <div class="mod modSel"><span class="tips">办公地址不限</span><select><option>办公地址不限</option><option>重庆总部</option><option>合川分部</option><option>成都分部</option></select></div>
                <div class="mod modSel"><span class="tips">部门不限</span><select><option>部门不限</option><option>刑辨中心</option><option>房地产事业部</option><option>刑辨中心</option></select></div>
                <div class="modLetter mod">
                    <h4>按律师姓名首字母查找</h4>
                    <div class="lst">
                        <a href="javascript:void(0);">A</a><a href="javascript:void(0);">B</a><a href="javascript:void(0);">C</a><a href="javascript:void(0);">D</a><a href="javascript:void(0);">E</a><a href="javascript:void(0);">F</a><a href="javascript:void(0);">G</a><a href="javascript:void(0);">H</a><a href="javascript:void(0);">J</a><a href="javascript:void(0);">K</a><a href="javascript:void(0);">L</a><a href="javascript:void(0);">M</a><a href="javascript:void(0);">N</a><a href="javascript:void(0);">O</a><a href="javascript:void(0);">P</a><a href="javascript:void(0);">Q</a><a href="javascript:void(0);">R</a><a href="javascript:void(0);">S</a><a href="javascript:void(0);">T</a><a href="javascript:void(0);">W</a><a href="javascript:void(0);">X</a><a href="javascript:void(0);">Y</a><a href="javascript:void(0);">Z</a>
                    </div>
                </div>
                <div class="btns"><button class="redBtn">查找律师</button><button class="reset">重置条件</button></div>
            </div>
            
        </div>
    </div>
</div>
<script>
require(["jquery","script","mmenu"], function($,script,mmenu){
	script.fullPage('.indexBn');

    script.indTouch('.indexBn','.indPage','.downPageBtn');
    script.sch('#_schBtn1','#_sch','#_closeSch');
    script.sch('#_schBtn2','#_sch','#_closeSch');
    $('select').bind('change',function(){
        var val = $(this).val();
        $(this).siblings('span.tips').text(val);
    });

    $('nav#menu').mmenu({
        navbar: {
            title: "导航"
        }
    }, {
        //configuration
    });//头部调用
});
</script>
</body>
</html><?php }} ?>