<?php /* Smarty version Smarty-3.1.6, created on 2017-12-08 23:43:38
         compiled from "D:\xampp\htdocs\baijun\app\modes\site\home\default\default\index.html" */ ?>
<?php /*%%SmartyHeaderCode:126975a2ab32a95d042-32087129%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f5c6981ac020a86df3dcc266b3016aa17067adda' => 
    array (
      0 => 'D:\\xampp\\htdocs\\baijun\\app\\modes\\site\\home\\default\\default\\index.html',
      1 => 1502431231,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '126975a2ab32a95d042-32087129',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'slides' => 0,
    'UPLOADURL' => 0,
    'ls' => 0,
    'officenews' => 0,
    'yeji' => 0,
    'pinglun' => 0,
    'more' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5a2ab32aaa73d',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a2ab32aaa73d')) {function content_5a2ab32aaa73d($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<body id="index">
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/leftbar.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<div class="wrap" id="wrap">
	<div class="index">
		<section class="swiper-container">
			<div class="swiper-wrapper">
				<?php  $_smarty_tpl->tpl_vars["ls"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["ls"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['slides']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["ls"]->key => $_smarty_tpl->tpl_vars["ls"]->value){
$_smarty_tpl->tpl_vars["ls"]->_loop = true;
?>
				<div class="swiper-slide" style="background-image:url(<?php echo $_smarty_tpl->tpl_vars['UPLOADURL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['ls']->value['url'];?>
);">
					<div class="box">
						<h6><?php echo $_smarty_tpl->tpl_vars['ls']->value['title'];?>
</h6>
						<div class="txt"><?php echo $_smarty_tpl->tpl_vars['ls']->value['summary'];?>
</div>
						<div class="btn"><a href="<?php echo $_smarty_tpl->tpl_vars['ls']->value['link'];?>
">+<?php echo $_smarty_tpl->tpl_vars['ls']->value['label'];?>
</a></div>
					</div>
				</div>
				<?php } ?>
				<!-- <div class="swiper-slide" style="background-image:url(../assets/img/swiper2.jpg);">
					<div class="box">
						<h6>投资德国研讨会</h6>
						<div class="txt">百君律师事务所 德国Helf Pesch律师事务所</div>
						<div class="btn"><a href="#">+浏览详情</a></div>
					</div>
				</div>
				<div class="swiper-slide" style="background-image:url(../assets/img/swiper3.jpg);">
					<div class="box">
						<h6>投资德国研讨会</h6>
						<div class="txt">百君律师事务所 德国Helf Pesch律师事务所</div>
						<div class="btn"><a href="#">+浏览详情</a></div>
					</div>
				</div> -->
			</div>
			<div class="pagination"></div>
		</section>
		<div class="mask_bot"></div>
		<div class="index_bot">
			<div class="botdata clear">
				<figcaption class="ldata_tit"><p><b><a href="{:U('news/officenews/default')}" class="link">事务所新闻</a></b></p><a href="javascript:void(0);" class="_noLoading"><i onclick="refresh();return false;"></i></a></figcaption>
					<figure class="ldata">
					<div class="ldata_lst">
						<ul>
						<?php  $_smarty_tpl->tpl_vars["ls"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["ls"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['officenews']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["ls"]->key => $_smarty_tpl->tpl_vars["ls"]->value){
$_smarty_tpl->tpl_vars["ls"]->_loop = true;
?>
							<li>
								<dl>
									<dt><a href="{:U('news/officenews/detail/default',array('id'=><?php echo $_smarty_tpl->tpl_vars['ls']->value['id'];?>
))}"><h6><?php echo $_smarty_tpl->tpl_vars['ls']->value['title'];?>
</h6><em><?php echo substr($_smarty_tpl->tpl_vars['ls']->value['publishtime'],0,10);?>
</em></a></dt>
									<dd><?php echo $_smarty_tpl->tpl_vars['ls']->value['summary'];?>
</dd>
								</dl>
							</li>
						<?php } ?>
							<!-- <li>
								<dl>
									<dt><a href="#"><h6>彭园景律师:越努力,越幸运</h6><em>2016-08-08</em></a></dt>
									<dd>西南政法大学法学学士、刑法学硕士,2011年加入百君,现为百君刑事辩护中心律师。 彭园景律师具有扎实的法学理论功底,曾在中文期刊(含核心期刊)上发表法学论文多篇</dd>
								</dl>
							</li>
							<li>
								<dl>
									<dt><a href="#"><h6>彭园景律师:越努力,越幸运</h6><em>2016-08-08</em></a></dt>
									<dd>西南政法大学法学学士、刑法学硕士,2011年加入百君,现为百君刑事辩护中心律师。 彭园景律师具有扎实的法学理论功底,曾在中文期刊(含核心期刊)上发表法学论文多篇</dd>
								</dl>
							</li> -->
						</ul>
					</div>
				</figure>
				<figure class="rdata">
					<figcaption class="tit"><p><a href="{:U('news/performance/default')}" class="link">最新业绩</a></p></figcaption>
					<ul>
					<?php  $_smarty_tpl->tpl_vars["ls"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["ls"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['yeji']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["ls"]->key => $_smarty_tpl->tpl_vars["ls"]->value){
$_smarty_tpl->tpl_vars["ls"]->_loop = true;
?>
						<li><a href="{:U('news/performance/detail/default',array('id'=><?php echo $_smarty_tpl->tpl_vars['ls']->value['id'];?>
))}"><?php echo $_smarty_tpl->tpl_vars['ls']->value['title'];?>
</a></li>
					<?php } ?>
						<!-- <li><a href="#">百君律师参与并圆满完成市人大委托规范性文百君律师参与并圆满完</a></li>
						<li><a href="#">百君律师参与并圆满完成市人大委托规范性文百君律师参与并圆满完</a></li> -->
					</ul>
				<figure>
			</div>
			<div class="botmenu">
				<!--<a href="javascript:void(0);" class="_noLoading" id="_underlnk">了解更多</a>-->
				<a href="{:U('humanity/default/default/list',array('id'=>'1'))}" class="_noLoading">百君法律评论</a>
				<a href='{:U('humanity/default/default/detail',array('id'=><?php echo $_smarty_tpl->tpl_vars['pinglun']->value['id'];?>
))}' class="lnk" target="_blank"><?php echo $_smarty_tpl->tpl_vars['pinglun']->value['title'];?>
</a>
				<div class="botsearch">
					<form  target="_blank"><input type="text" class="text" placeholder="站内搜索" id="bdcsMain" /><button type="submit">搜索</button></form>
				</div>
			</div>
		</div>

	</div>
</div>

<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/floatbar.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<figure class="under" id="_under">
	<div class="underbox">
		<div class="underparent">
			<a href="javascript:void(0);" class="_noLoading close" id="_closeunder">
				<span>
					<b></b>
					<b></b>
				</span>
			</a>
			<div class="bd">
				<!--<div class="con">
					<img src="<?php echo $_smarty_tpl->tpl_vars['UPLOADURL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['more']->value['url'];?>
" />
				</div>-->
				<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

			</div>
		</div>
	</div>
</figure>

<script>
requirejs( ["jquery","swiper","app","cookie"],function($){
	var mySwiper = new Swiper('.swiper-container',{
		pagination: '.pagination',
		height:window.innerHeight,
		paginationClickable: true,
		autoplay : 5000,
		autoplayDisableOnInteraction : false,
		height:'100%',
		autoResize:true,
		onlyExternal : true,
		loop : true
	});

	//$('#wrap').pageinit({debuge:true});//页面初始化


	$('#_underlnk').on('click',function(){
		$('#_under').animate({'bottom':'0%'});
	});
	$('#_closeunder').on('click',function(){
		$('#_under').animate({'bottom':'-110%'});
	});

	//something

});

function refresh()
{
	var times = $.cookie("baijun_news_refresh");
	if ( isNaN(times)) {
		times = 2 ;
	} else {
		times++;
	}

	$.get("{:U('home/default/default/news.json')}" , {time:times} , function(data){
		var ul = $('.ldata_lst ul');
		var dataobj = eval('('+ data +');');
		var officenews = dataobj.officenews;
		//alert(dataobj);
		console.log(officenews);
		ul.html('');
		for (x in officenews) {
			var html = "<li><dl>";
			var link = '{:U('news/officenews/detail/default','',false)}' + '/id/' + officenews[x].id + '.html';
			html += '<dt><a href="'+ link +'"><h6>'+officenews[x].title+'</h6><em>'+officenews[x].publishtime.substring(0,10)+'</em></a></dt><dd>'+officenews[x].summary+'</dd>';
			html += "</dl></li>";
			ul.append(html);
		}
		//console.log(data);
	});

	if (times == 5) {
		times = 0;
	}
	$.cookie("baijun_news_refresh", times, { path: "/"});
	//console.log()
}
</script>
<script type="text/javascript">(function(){document.write(unescape('%3Cdiv id="bdcs"%3E%3C/div%3E'));var bdcs = document.createElement('script');bdcs.type = 'text/javascript';bdcs.async = true;bdcs.src = 'http://znsv.baidu.com/customer_search/api/js?sid=8421103596031741422' + '&plate_url=' + encodeURIComponent(window.location.href) + '&t=' + Math.ceil(new Date()/3600000);var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(bdcs, s);})();</script>
</body>
</html>
<?php }} ?>