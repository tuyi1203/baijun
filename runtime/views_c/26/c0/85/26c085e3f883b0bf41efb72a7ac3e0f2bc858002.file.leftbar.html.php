<?php /* Smarty version Smarty-3.1.6, created on 2018-04-05 14:59:47
         compiled from "E:\wamp\www\baijun\app\views\site\leftbar.html" */ ?>
<?php /*%%SmartyHeaderCode:299685ac639e353fd32-18768267%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '26c085e3f883b0bf41efb72a7ac3e0f2bc858002' => 
    array (
      0 => 'E:\\wamp\\www\\baijun\\app\\views\\site\\leftbar.html',
      1 => 1504252460,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '299685ac639e353fd32-18768267',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'leftbarlist' => 0,
    'ls' => 0,
    'UPLOADURL' => 0,
    'qcode' => 0,
    'MODULE_F' => 0,
    'ishome' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_5ac639e3737c2',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ac639e3737c2')) {function content_5ac639e3737c2($_smarty_tpl) {?><aside class="leftbar">
	<div class="leftbar_box" id="leftBar">
		<div class="logo vertical" id="logo">
			<a href="{:U('home/default')}">
				<b class="logo_front"></b>
				<b class="logo_back"></b>
			</a>
		</div>
		<nav>
			<ul>
				<li><a href="{:U('home/default')}">首页</a></li>
				<li><a href="{:U('aboutus/intro')}">关于我们</a></li>
				<li><a href="{:U('news/officenews')}">资讯中心</a></li>
				<!-- <li><a href="javascript:void(0);" class="_noLoading">合作伙伴</a></li> -->
				<li><a href="{:U('humanity/default')}" >智识与人文</a></li>
				<li><a href="{:U('service/contact/detail/default')}">沟通与服务</a></li>
				<li><a href="{:U('service/online/detail/default')}">在线咨询</a></li>
			</ul>
			<div class="navbtn">
				<ul>
					<li><a href="javascript:void(0);" class="_noLoading" id="_lsliplnk">专业领域</a></li>
					<li><a href="{:U('core/person/default/default')}">专业团队</a></li>
				</ul>
			</div>
		</nav>
		<section class="left_bot">
			<div class="botlink"><a href="#" class="code _noLoading" id="_codelnk"></a><a href="http://weibo.com/exceedon" class="weibo" target="_blank"></a></div>
			<div class="botmail"><a href="http://mail.exceedon.net/" target="_blank" class="_noLoading">邮箱登录</a></div>
			<div class="slidlink"><a href="javascript:void(0);" class="_noLoading" id="leftBarContrl"></a></div>
		</section>
	</div>
</aside>

<figure class="lslip" id="_lslip">
	<div class="lslip_box">
		<a href="javascript:void(0);" class="_noLoading close" id="_lslipclose">
			<span>
				<b></b>
				<b></b>
			</span>
		</a>
		<figcaption class="hd" id="_scrolltxt"></figcaption>
		<div class="bd" id="_scroll">
			<ul>
			<?php  $_smarty_tpl->tpl_vars["ls"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["ls"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['leftbarlist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["ls"]->key => $_smarty_tpl->tpl_vars["ls"]->value){
$_smarty_tpl->tpl_vars["ls"]->_loop = true;
?>
				<li>
					<a href="{:U('core/field/detail/default',array('id'=><?php echo $_smarty_tpl->tpl_vars['ls']->value['id'];?>
))}">
						<div class="pic"><img src="<?php echo $_smarty_tpl->tpl_vars['UPLOADURL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['ls']->value['url'];?>
" /></div>
						<dl>
							<dt><?php echo $_smarty_tpl->tpl_vars['ls']->value['title'];?>
</dt>
							<dd class="en"><?php echo $_smarty_tpl->tpl_vars['ls']->value['entitle'];?>
</dd>
							<dd class="txt"><?php echo $_smarty_tpl->tpl_vars['ls']->value['label'];?>
</dd>
						</dl>
					</a>
				</li>
			<?php } ?>
				<!-- <li>
					<a href="#">
						<div class="pic"><img src="{:T('img/slip_2.png')}" /></div>
						<dl>
							<dt>诉讼、仲裁法律服务</dt>
							<dd class="en">Litigation and arbitration</dd>
							<dd class="txt">诉讼、仲裁法律服务团队，用丰富的专业知识，代理客户进行的诉讼或仲裁案件涉及各类争议代理客户进行的诉讼或仲裁案件涉及各类争议代理客户进行的诉讼或仲裁案件涉及各类争议。</dd>
						</dl>
					</a>
				</li>
				<li>
					<a href="#">
						<div class="pic"><img src="{:T('img/slip_3.png')}" /></div>
						<dl>
							<dt>诉讼、仲裁法律服务</dt>
							<dd class="en">Litigation and arbitration</dd>
							<dd class="txt">诉讼、仲裁法律服务团队，用丰富的专业知识，代理客户进行的诉讼或仲裁案件涉及各类争议代理客户进行的诉讼或仲裁案件涉及各类争议代理客户进行的诉讼或仲裁案件涉及各类争议。</dd>
						</dl>
					</a>
				</li>
				<li>
					<a href="#">
						<div class="pic"><img src="{:T('img/slip_2.png')}" /></div>
						<dl>
							<dt>诉讼、仲裁法律服务</dt>
							<dd class="en">Litigation and arbitration</dd>
							<dd class="txt">诉讼、仲裁法律服务团队，用丰富的专业知识，代理客户进行的诉讼或仲裁案件涉及各类争议代理客户进行的诉讼或仲裁案件涉及各类争议代理客户进行的诉讼或仲裁案件涉及各类争议。</dd>
						</dl>
					</a>
				</li>
				<li>
					<a href="#">
						<div class="pic"><img src="{:T('img/slip_3.png')}" /></div>
						<dl>
							<dt>诉讼、仲裁法律服务</dt>
							<dd class="en">Litigation and arbitration</dd>
							<dd class="txt">诉讼、仲裁法律服务团队，用丰富的专业知识，代理客户进行的诉讼或仲裁案件涉及各类争议代理客户进行的诉讼或仲裁案件涉及各类争议代理客户进行的诉讼或仲裁案件涉及各类争议。</dd>
						</dl>
					</a>
				</li>
				<li>
					<a href="#">
						<div class="pic"><img src="{:T('img/slip_1.png')}" /></div>
						<dl>
							<dt>诉讼、仲裁法律服务</dt>
							<dd class="en">Litigation and arbitration</dd>
							<dd class="txt">诉讼、仲裁法律服务团队，用丰富的专业知识，代理客户进行的诉讼或仲裁案件涉及各类争议代理客户进行的诉讼或仲裁案件涉及各类争议代理客户进行的诉讼或仲裁案件涉及各类争议。</dd>
						</dl>
					</a>
				</li>
				<li>
					<a href="#">
						<div class="pic"><img src="{:T('img/slip_3.png')}" /></div>
						<dl>
							<dt>诉讼、仲裁法律服务</dt>
							<dd class="en">Litigation and arbitration</dd>
							<dd class="txt">诉讼、仲裁法律服务团队，用丰富的专业知识，代理客户进行的诉讼或仲裁案件涉及各类争议代理客户进行的诉讼或仲裁案件涉及各类争议代理客户进行的诉讼或仲裁案件涉及各类争议。</dd>
						</dl>
					</a>
				</li>
				<li>
					<a href="#">
						<div class="pic"><img src="{:T('img/slip_3.png')}" /></div>
						<dl>
							<dt>诉讼、仲裁法律服务</dt>
							<dd class="en">Litigation and arbitration</dd>
							<dd class="txt">诉讼、仲裁法律服务团队，用丰富的专业知识，代理客户进行的诉讼或仲裁案件涉及各类争议代理客户进行的诉讼或仲裁案件涉及各类争议代理客户进行的诉讼或仲裁案件涉及各类争议。</dd>
						</dl>
					</a>
				</li> -->
			</ul>
		</div>
	</div>
</figure>
<div class="pagemask" id="_pagemask"></div>
<figure class="ecode" id="_ecode">
	<a href="javascript:void(0);" class="_noLoading close" id="_closeecode">
		<span>
			<b></b>
			<b></b>
		</span>
	</a>
	<img src="<?php echo $_smarty_tpl->tpl_vars['UPLOADURL']->value;?>
<?php echo $_smarty_tpl->tpl_vars['qcode']->value['url'];?>
" />
	<p>更多法务资讯，扫码关注百君微信公众号</p>
</figure>

<script>
requirejs( ["jquery","app"],function($){
	<?php if ($_smarty_tpl->tpl_vars['MODULE_F']->value=="home"){?>
	$('#wrap').pageinit({whether:true});//页面初始化
	<?php }else{ ?>
	$('#wrap').pageinit({whether:true,debuge:false});//页面初始化
	<?php }?>
	$('#_floatcontact').contact({debuge:true , isHome:<?php if (isset($_smarty_tpl->tpl_vars['ishome']->value)){?>true<?php }else{ ?>false<?php }?>});//联系我们
});
</script><?php }} ?>