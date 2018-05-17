<?php /* Smarty version Smarty-3.1.6, created on 2018-05-10 14:52:57
         compiled from "E:\wamp\www\baijun\app\modes\site\home\default\default\mobile.html" */ ?>
<?php /*%%SmartyHeaderCode:97265af45bc999e2b5-62921215%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6ee8dfcc1f28397f1d14c5beaadf2deeaf656f6e' => 
    array (
      0 => 'E:\\wamp\\www\\baijun\\app\\modes\\site\\home\\default\\default\\mobile.html',
      1 => 1525963928,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '97265af45bc999e2b5-62921215',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5af45bc9bad8b',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5af45bc9bad8b')) {function content_5af45bc9bad8b($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/mobile/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<body class="ind">
<div class="indexBn displayCenter">
	<div class="indBox">
		<div class="indLogo"><a href="javascript:void(0);"><img src="{:T('mobile/img/ind_logo.png')}" /></a></div>
		<div class="indSearch">
			<a href="javascript:void(0);"><span>查找律师</span></a>
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
			<div class="r"><a href="javascript:void(0);" class="icon">&#xe60b;</a></div>
		</div>
	</header>
	<div class="content">
		<section class="indAbout">
			<div class="hd"><h6>关于我们</h6></div>
			<div class="bd">
				<div class="part">
					<div class="bn"><img src="{:T('mobile/img/about-bn.jpg')}" /></div>
					<div class="txt">
						<p>重庆百君律师事务所是以曾执教于西南政法大学的孙渝先生和杨泽延先生为主要发起人的合伙制律师事务所，自一九九八年十二月创立以来，已取得骄人的业绩，是中国西部发展最为迅速和最具发展前景的综合性律师事务所之一。</p>
						<div class="readMore"><a href="javascript:void(0);">了解更多</a></div>
					</div>
				</div>
			</div>
		</section>
		<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/mobile/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	</div>
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/mobile/menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</div>

<script>
require(["jquery","script","mmenu"], function($,script,mmenu){
	script.fullPage('.indexBn');

	var touchFlag = 1,
		startx,starty;//获得角度
    function getAngle(angx, angy) {
        return Math.atan2(angy, angx) * 180 / Math.PI;
    };
    //根据起点终点返回方向 1向上 2向下 3向左 4向右 0未滑动
    function getDirection(startx, starty, endx, endy) {
        var angx = endx - startx;
        var angy = endy - starty;
        var result = 0;
        //如果滑动距离太短
        if (Math.abs(angx) < 2 && Math.abs(angy) < 2) {
            return result;
        }
        var angle = getAngle(angx, angy);
        if (angle >= -135 && angle <= -45) {
            result = 1;
        } else if (angle > 45 && angle < 135) {
            result = 2;
        } else if ((angle >= 135 && angle <= 180) || (angle >= -180 && angle < -135)) {
            result = 3;
        } else if (angle >= -45 && angle <= 45) {
            result = 4;
        }
        return result;
    }//手指接触屏幕
    document.addEventListener("touchstart", function(e) {
        startx = e.touches[0].pageX;
        starty = e.touches[0].pageY;
    }, false);
    //手指离开屏幕
    document.addEventListener("touchend", function(e) {
        var endx, endy;
        endx = e.changedTouches[0].pageX;
        endy = e.changedTouches[0].pageY;
        var direction = getDirection(startx, starty, endx, endy);
        if(direction == 1){
        	if(touchFlag == 1){
		    	$('.indexBn').slideUp();
		    	$('.indPage').slideDown();
        	}
        	touchFlag = 0;
        }
    }, false);

    $('.downPageBtn').bind('click',function(){
    	$('.indexBn').slideUp();
    	$('.indPage').slideDown();
    	touchFlag = 0;
    })

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