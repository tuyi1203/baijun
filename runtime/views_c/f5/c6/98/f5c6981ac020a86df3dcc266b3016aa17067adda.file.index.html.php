<?php /* Smarty version Smarty-3.1.6, created on 2015-10-10 12:02:31
         compiled from "D:\xampp\htdocs\baijun\app\modes\site\home\default\default\index.html" */ ?>
<?php /*%%SmartyHeaderCode:102956188dd712afe3-59458626%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f5c6981ac020a86df3dcc266b3016aa17067adda' => 
    array (
      0 => 'D:\\xampp\\htdocs\\baijun\\app\\modes\\site\\home\\default\\default\\index.html',
      1 => 1439870816,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '102956188dd712afe3-59458626',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'nofilter' => 0,
    'slideslist' => 0,
    'ls' => 0,
    'smallslideslist' => 0,
    'noticelist' => 0,
    'waterstoplist' => 0,
    'companytoplist' => 0,
    'companylist' => 0,
    'brotherhoodtoplist' => 0,
    'brotherhoodlist' => 0,
    'today' => 0,
    'place1' => 0,
    'arg11' => 0,
    'arg12' => 0,
    'place2' => 0,
    'arg21' => 0,
    'arg22' => 0,
    'place3' => 0,
    'arg31' => 0,
    'arg32' => 0,
    'countrylist' => 0,
    'locallist' => 0,
    'questionname1' => 0,
    'questionname2' => 0,
    'questionlist1' => 0,
    'category1' => 0,
    'questionlist2' => 0,
    'category2' => 0,
    'dangtuanlist' => 0,
    'shuisilist' => 0,
    'drinklist' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_56188dd73cb33',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56188dd73cb33')) {function content_56188dd73cb33($_smarty_tpl) {?>﻿<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/header.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<body>
<?php if (isset($_smarty_tpl->tpl_vars['nofilter']->value['dialog'])){?>
    <script src="{:T('js/dialog.js')}"></script><!--弹出层-->
    <script>
	$(function(){
	    $.showModal("#dialogNotice", { contentType: 'selector', showMask: true, dw: "800" });
	});
	</script>
<?php }?>
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/menu.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <div class="banner">
		<div class="carousel">
			<a class="prev mwIcon">&#xf053;</a>
			<ul>
			<?php  $_smarty_tpl->tpl_vars["ls"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["ls"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['slideslist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["ls"]->key => $_smarty_tpl->tpl_vars["ls"]->value){
$_smarty_tpl->tpl_vars["ls"]->_loop = true;
?>
				<li><a href="<?php echo $_smarty_tpl->tpl_vars['ls']->value['link'];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['ls']->value['url'];?>
"></a></li>
             <?php } ?>
			</ul>
			<a class="next mwIcon">&#xf054;</a>
		</div>
    </div>
    <?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/rolling.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

    <div class="wrap">
    	<div class="wT">
        	<div class="wtL">
            	<div class="sBn">
                    <div id="sBn">
                        <?php  $_smarty_tpl->tpl_vars["ls"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["ls"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['smallslideslist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["ls"]->key => $_smarty_tpl->tpl_vars["ls"]->value){
$_smarty_tpl->tpl_vars["ls"]->_loop = true;
?>
                            <a href="<?php echo $_smarty_tpl->tpl_vars['ls']->value['link'];?>
" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['ls']->value['url'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['ls']->value['label'];?>
" /><span><?php echo $_smarty_tpl->tpl_vars['ls']->value['title'];?>
</span></a>
                        <?php } ?>
                    </div>
                </div>
                <div class="part tab notice">
                	<div class="hd">
                    	<div class="tabT" id="noticeTabT"><ul><li class="cu">公司公告</li><li class="last">停水公告</li></ul></div>
                    </div>
                    <div class="bd">
                    	<div class="tabC" id="noticeTabC">
                        	<div class="tabCon con1">
                            	<div class="scroll" id="notice1">
                            	<ul>
                            	<?php  $_smarty_tpl->tpl_vars["ls"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["ls"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['noticelist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["ls"]->key => $_smarty_tpl->tpl_vars["ls"]->value){
$_smarty_tpl->tpl_vars["ls"]->_loop = true;
?>
                                    <li><a href="{:U('information/notice/detail/default/<?php echo $_smarty_tpl->tpl_vars['ls']->value['id'];?>
.html')}"><p class="tit"><?php echo $_smarty_tpl->tpl_vars['ls']->value['title'];?>
</p><p class="txt"><?php echo $_smarty_tpl->tpl_vars['ls']->value['summary'];?>
<i class="gray">[{:substr('<?php echo $_smarty_tpl->tpl_vars['ls']->value['createtime'];?>
',0,10)}]</i></p></a></li>
                                <?php } ?>
                                </ul>
                                </div>
                            </div>
                            <div class="tabCon con2">
                            	<div class="scroll" id="notice2">
                            	<ul>
                            	<?php  $_smarty_tpl->tpl_vars["ls"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["ls"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['waterstoplist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["ls"]->key => $_smarty_tpl->tpl_vars["ls"]->value){
$_smarty_tpl->tpl_vars["ls"]->_loop = true;
?>
                                    <li><a href="{:U('information/waterstop/detail/default/<?php echo $_smarty_tpl->tpl_vars['ls']->value['id'];?>
.html')}"><p class="tit"><?php echo $_smarty_tpl->tpl_vars['ls']->value['title'];?>
</p><p class="txt"><?php echo $_smarty_tpl->tpl_vars['ls']->value['summary'];?>
<i class="gray">[{:substr('<?php echo $_smarty_tpl->tpl_vars['ls']->value['createtime'];?>
',0,10)}]</i></p></a></li>
                                <?php } ?>
                                </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wtC">
            	<div class="part tab news">
                	<div class="hd">
                    	<div class="tabT" id="newsTabT"><ul><li class="cu">公司动态</li><li class="last">行业动态</li></ul></div>
                    </div>
                    <div class="bd">
                    	<div class="tabC" id="newsTabC">
                        	<div class="tabCon con1">
                                <div class="headlines" id="n1">
                                    <a class="mwIcon aleft" href="#left">&#xf104;</a>
                                    <div class="list">
                                        <ul>
                                        <?php  $_smarty_tpl->tpl_vars["ls"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["ls"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['companytoplist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["ls"]->key => $_smarty_tpl->tpl_vars["ls"]->value){
$_smarty_tpl->tpl_vars["ls"]->_loop = true;
?>
                                            <li <?php if (empty($_smarty_tpl->tpl_vars['ls']->value['url'])){?>class="noPic"<?php }?>>
                                                <dl>
                                                <?php if (!empty($_smarty_tpl->tpl_vars['ls']->value['url'])){?>
                                                <dt><a href="{:U('news/company/detail/default/<?php echo $_smarty_tpl->tpl_vars['ls']->value['id'];?>
.html')}"><img src="<?php echo $_smarty_tpl->tpl_vars['ls']->value['url'];?>
" /></a></dt>
                                                <?php }?>
                                                <dd><p class="tit"><a href="{:U('news/company/detail/default/<?php echo $_smarty_tpl->tpl_vars['ls']->value['id'];?>
.html')}"><?php echo $_smarty_tpl->tpl_vars['ls']->value['title'];?>
</a></p><p class="txt"><?php echo $_smarty_tpl->tpl_vars['ls']->value['summary'];?>
</p></dd>
                                                </dl>
                                            </li>
                                        <?php } ?>
                                        </ul><!--imglist end-->
                                    </div>
                                    <a class="mwIcon aright" href="#right">&#xf105;</a>
                                </div>
                                <div class="newsLst">
                                	<ul>
                                	<?php  $_smarty_tpl->tpl_vars["ls"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["ls"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['companylist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["ls"]->key => $_smarty_tpl->tpl_vars["ls"]->value){
$_smarty_tpl->tpl_vars["ls"]->_loop = true;
?>
                                	   <li><a href="{:U('news/company/detail/default/<?php echo $_smarty_tpl->tpl_vars['ls']->value['id'];?>
.html')}"><?php if (($_smarty_tpl->tpl_vars['ls']->value['imageflg']=="1")){?><em class="red">[图]</em><?php }?><?php echo $_smarty_tpl->tpl_vars['ls']->value['title'];?>
</a><i>({:substr('<?php echo $_smarty_tpl->tpl_vars['ls']->value['createtime'];?>
',5 , 5)})</i></li>
                                	<?php } ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="tabCon con2" style="display:none;">
                                <div class="headlines" id="n2">
                                    <a class="mwIcon aleft" href="#left">&#xf104;</a>
                                    <div class="list">
                                        <ul>
                                        <?php  $_smarty_tpl->tpl_vars["ls"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["ls"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['brotherhoodtoplist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["ls"]->key => $_smarty_tpl->tpl_vars["ls"]->value){
$_smarty_tpl->tpl_vars["ls"]->_loop = true;
?>
                                            <li <?php if (empty($_smarty_tpl->tpl_vars['ls']->value['url'])){?>class="noPic"<?php }?>>
                                                <dl>
                                                <?php if (!empty($_smarty_tpl->tpl_vars['ls']->value['url'])){?>
                                                <dt><a href="{:U('news/brotherhood/detail/default/<?php echo $_smarty_tpl->tpl_vars['ls']->value['id'];?>
.html')}"><img src="<?php echo $_smarty_tpl->tpl_vars['ls']->value['url'];?>
" /></a></dt>
                                                <?php }?>
                                                <dd><p class="tit"><a href="{:U('news/brotherhood/detail/default/<?php echo $_smarty_tpl->tpl_vars['ls']->value['id'];?>
.html')}"><?php echo $_smarty_tpl->tpl_vars['ls']->value['title'];?>
</a></p><p class="txt"><?php echo $_smarty_tpl->tpl_vars['ls']->value['summary'];?>
</p></dd>
                                                </dl>
                                            </li>
                                        <?php } ?>
                                        </ul><!--imglist end-->
                                    </div>
                                    <a class="mwIcon aright" href="#right">&#xf105;</a>
                                </div>
                                <div class="newsLst">
                                	<ul>
                                	<?php  $_smarty_tpl->tpl_vars["ls"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["ls"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['brotherhoodlist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["ls"]->key => $_smarty_tpl->tpl_vars["ls"]->value){
$_smarty_tpl->tpl_vars["ls"]->_loop = true;
?>
                                       <li><a href="{:U('news/brotherhood/detail/default/<?php echo $_smarty_tpl->tpl_vars['ls']->value['id'];?>
.html')}"><?php if (($_smarty_tpl->tpl_vars['ls']->value['imageflg']=="1")){?><em class="red">[图]</em><?php }?><?php echo $_smarty_tpl->tpl_vars['ls']->value['title'];?>
</a><i>({:substr('<?php echo $_smarty_tpl->tpl_vars['ls']->value['createtime'];?>
',5 , 5)})</i></li>
                                    <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="wtR">
            	<div class="part report">
                	<div class="hd"><h3>今日水质</h3></div>
                    <div class="bd">
                    	<div class="upTime"><i class="mwIcon">&#xf012;</i>更新时间<em><?php echo $_smarty_tpl->tpl_vars['today']->value;?>
</em></div>
                        <div class="data">

                        	<table cellpadding="0" cellspacing="0" width="100%" border="0">
                            	<thead><tr><td width="75" align="center">供水点</td><td width="70" align="center">浊度<br />/NTU</td><td width="76" align="center">余氯<br />/mg/L</td></tr></thead>
                                <tbody>
                                	<tr><td align="center"><?php echo $_smarty_tpl->tpl_vars['place1']->value;?>
&nbsp;</td><td align="center"><?php echo $_smarty_tpl->tpl_vars['arg11']->value;?>
</td><td align="center"><?php echo $_smarty_tpl->tpl_vars['arg12']->value;?>
</td></tr>
                                    <?php if (isset($_smarty_tpl->tpl_vars['place2']->value)){?>
                                    <tr><td align="center"><?php echo $_smarty_tpl->tpl_vars['place2']->value;?>
&nbsp;</td><td align="center"><?php echo $_smarty_tpl->tpl_vars['arg21']->value;?>
</td><td align="center"><?php echo $_smarty_tpl->tpl_vars['arg22']->value;?>
</td></tr>
                                    <?php }?>
                                    <?php if (isset($_smarty_tpl->tpl_vars['place3']->value)){?>
                                    <tr><td align="center"><?php echo $_smarty_tpl->tpl_vars['place3']->value;?>
&nbsp;</td><td align="center"><?php echo $_smarty_tpl->tpl_vars['arg31']->value;?>
</td><td align="center"><?php echo $_smarty_tpl->tpl_vars['arg32']->value;?>
</td></tr>
                                    <?php }?>
                                    <tr><td align="center">国家标准(GB5749<br />-2006)</td><td align="center">≤1</td><td align="center">余氯:&gt;0.3<br />且&lt;4，二氧化氯:&gt;0.1<br />且&lt;0.8</td></tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="part tab law">
                	<div class="hd">
                    	<div class="tabT" id="lawTabT"><ul><li class="cu">国家法律法规</li><li class="last">地方法律法规</li></ul></div>
                    </div>
                    <div class="bd">
                    	<div class="tabC" id="lawTabC">
                        	<div class="tabCon con1">
                            	<div class="lst">
                                	<ul>
                                	<?php  $_smarty_tpl->tpl_vars["ls"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["ls"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['countrylist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["ls"]->key => $_smarty_tpl->tpl_vars["ls"]->value){
$_smarty_tpl->tpl_vars["ls"]->_loop = true;
?>
                                	   <li><a href="{:U('system/file/default/download/id/<?php echo $_smarty_tpl->tpl_vars['ls']->value['id'];?>
.html')}"><?php echo $_smarty_tpl->tpl_vars['ls']->value['title'];?>
</a></li>
                                	<?php } ?>
                                	   <li class="more"><a href="{:U('low/country/list/default.html')}">更多</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="tabCon con2" style="display:none;">
                            	<div class="lst">
                                	<ul>
                                	<?php  $_smarty_tpl->tpl_vars["ls"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["ls"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['locallist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["ls"]->key => $_smarty_tpl->tpl_vars["ls"]->value){
$_smarty_tpl->tpl_vars["ls"]->_loop = true;
?>
                                       <li><a href="{:U('system/file/default/download/id/<?php echo $_smarty_tpl->tpl_vars['ls']->value['id'];?>
.html')}"><?php echo $_smarty_tpl->tpl_vars['ls']->value['title'];?>
</a></li>
                                    <?php } ?>
                                        <li class="more"><a href="{:U('low/local/list/default.html')}">更多</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="wM">
        	<div class="svc">
            	<div class="hd">服<br />务<br />导<br />航</div>
                <div class="bd">
                	<div class="lst">
                        <ul>
                        <li class="lst1"><a href="{:U('service/usernotice/detail/default.html')}">用户须知</a></li>
                        <li class="lst2"><a href="{:U('service/waterprice/detail/default.html')}">现行水价</a></li>
                        <li class="lst3"><a href="{:U('service/contact/detail/default.html')}">联系我们</a></li>
                        <li class="lst4"><a href="{:U('service/payment/detail/default.html')}">缴费指南</a></li>
                        <li class="lst5"><a href="{:U('service/online/detail/default.html')}">网上缴费</a></li>
                        <li class="lst6"><a href="{:U('service/questionnaire/list/default.html')}">网上调查</a></li>
                        <li class="lst7"><a href="{:U('service/repair/add/default.html')}">网上报修</a></li>
                        <li class="lst8"><a href="{:U('service/promise/detail/default.html')}">服务承诺</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="wB">
        	<div class="wBL">
                <div class="part tab other">
                	<div class="hd">
                    	<div class="tabT" id="otherTabT"><ul><li class="cu"><?php echo $_smarty_tpl->tpl_vars['questionname1']->value;?>
</li><li class="last"><?php echo $_smarty_tpl->tpl_vars['questionname2']->value;?>
</li></ul></div>
                    </div>
                    <div class="bd">
                    	<div class="tabC" id="otherTabC">
                        	<div class="tabCon con1">
                            	<div class="lst">
                                	<ul>
                                	<?php  $_smarty_tpl->tpl_vars["ls"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["ls"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['questionlist1']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["ls"]->key => $_smarty_tpl->tpl_vars["ls"]->value){
$_smarty_tpl->tpl_vars["ls"]->_loop = true;
?>
                                	   <li><a href="{:U('knowledge/question/list/list/category/<?php echo $_smarty_tpl->tpl_vars['category1']->value;?>
.html')}"><?php echo $_smarty_tpl->tpl_vars['ls']->value['title'];?>
</a></li>
                                	<?php } ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="tabCon con2" style="display:none;">
                            	<div class="lst">
                                	<ul>
                                    <?php  $_smarty_tpl->tpl_vars["ls"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["ls"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['questionlist2']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["ls"]->key => $_smarty_tpl->tpl_vars["ls"]->value){
$_smarty_tpl->tpl_vars["ls"]->_loop = true;
?>
                                       <li><a href="{:U('knowledge/question/list/list/category/<?php echo $_smarty_tpl->tpl_vars['category2']->value;?>
.html')}"><?php echo $_smarty_tpl->tpl_vars['ls']->value['title'];?>
</a></li>
                                    <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        	<div class="wBC">
            	<div class="part tab culture">
                	<div class="hd">
                    	<div class="tabT" id="cultureTabT"><ul><li class="cu">团队风采</li><li>水司文化</li><li class="last">水务之星</li></ul></div>
                    </div>
                    <div class="bd">
                    	<div class="tabC" id="cultureTabC">
                        	<div class="tabCon con1">
                            	<div class="lst">
                                	<ul>
                                	<?php  $_smarty_tpl->tpl_vars["ls"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["ls"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['dangtuanlist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["ls"]->key => $_smarty_tpl->tpl_vars["ls"]->value){
$_smarty_tpl->tpl_vars["ls"]->_loop = true;
?>
                                	   <li><a href="{:U('culture/party/detail/default/<?php echo $_smarty_tpl->tpl_vars['ls']->value['id'];?>
.html')}"><?php echo $_smarty_tpl->tpl_vars['ls']->value['title'];?>
</a></li>
                                	<?php } ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="tabCon con2" style="display:none;">
                            	<div class="lst">
                                	<ul>
                                	<?php  $_smarty_tpl->tpl_vars["ls"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["ls"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['shuisilist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["ls"]->key => $_smarty_tpl->tpl_vars["ls"]->value){
$_smarty_tpl->tpl_vars["ls"]->_loop = true;
?>
                                       <li><a href="{:U('culture/metropolitan/detail/default/<?php echo $_smarty_tpl->tpl_vars['ls']->value['id'];?>
.html')}"><?php echo $_smarty_tpl->tpl_vars['ls']->value['title'];?>
</a></li>
                                    <?php } ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="tabCon con2" style="display:none;">
                            	<div class="lst">
                                	<ul>
                                    <?php  $_smarty_tpl->tpl_vars["ls"] = new Smarty_Variable; $_smarty_tpl->tpl_vars["ls"]->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['drinklist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars["ls"]->key => $_smarty_tpl->tpl_vars["ls"]->value){
$_smarty_tpl->tpl_vars["ls"]->_loop = true;
?>
                                       <li><a href="{:U('culture/drink/detail/default/<?php echo $_smarty_tpl->tpl_vars['ls']->value['id'];?>
.html')}"><?php echo $_smarty_tpl->tpl_vars['ls']->value['title'];?>
</a></li>
                                    <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        	<div class="wBR">
            	<div class="part int">
                	<div class="hd"><h3>客户互动</h3></div>
                    <div class="bd">
                    	<div class="btns">
                        	<a href="{:U('customer/message/add/default.html')}" class="btn3 btnsFb">咨询留言</a>
                            <a href="{:U('customer/claim/add/default.html')}" class="btn3 btnsFb">意见投诉</a>
                            <a href="{:U('customer/accusation/add/default.html')}" class="btn3 btnsFb">网上举报</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div><?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/footer.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
</div>
<?php echo $_smarty_tpl->getSubTemplate (($_smarty_tpl->tpl_vars['WWW_PATH']->value)."/floatdiv.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


<script>
$(document).ready(function(e) {
	//大banner调用
	$('.carousel ul').anoSlide({
		items: 1,
		speed: 500,
		prev: 'a.prev',
		next: 'a.next',
		auto: 3000,
		onConstruct: function(instance){
			var paging = $('<div/>').addClass('paging fix').css({
				position: 'absolute',
				bottom: 20,
				right:10,
				width: instance.slides.length * 22
			});

			for (i = 0, l = instance.slides.length; i < l; i++){
				var a = $('<a/>').data('index', i).appendTo(paging).on({
					click: function(){
						instance.stop().go($(this).data('index'));
					}
				});
				if (i == instance.current){
					a.addClass('current');
				}
			}

			instance.element.parent().append(paging);
		},
		onStart: function(ui){
			var paging = $('.paging');
			paging.find('a').eq(ui.instance.current).addClass('current').siblings().removeClass('current');
		}
	});

	//小banner调用
	$('#sBn').coinslider({
		width: 242,
        height: 157,
        spw: 7,
        sph: 5,
        delay: 3000,
        sDelay: 30,
        opacity: 0.7,
        titleSpeed: 500,
        effect: 'random',
        navigation: true,
        links: true,
        hoverPause: true
	});

	//公告滚动调用
    if ($('#notice1 li').length > 4) {
    	$('#notice1').jCarouselLite({
    		visible:4,
    		auto: 2000,
    		vertical: true
    	});
    }
    if ($('#notice2 li').length > 4) {
    	$('#notice2').jCarouselLite({
    		visible:4,
    		auto: 2000,
    		vertical: true
    	});
    }
	//新闻头条调用
	$("#n1").xslider({
		unitdisplayed:1,
		movelength:1,
		autoscroll:3000
	});
	$("#n2").xslider({
		unitdisplayed:1,
		movelength:1,
		autoscroll:3000
	});

	//选项卡调用合集
	$.tab('#noticeTabT','#noticeTabC');
	$.tab('#newsTabT','#newsTabC');
	$.tab('#lawTabT','#lawTabC');
	$.tab('#otherTabT','#otherTabC');
	$.tab('#cultureTabT','#cultureTabC');

	//浮动二维码调用
	$.hov('#weixin');

	//回到顶部
	$('#backTop').bind('click',function(){
		$('body,html').animate({scrollTop:0},500);
	});
});
</script>
<?php if (isset($_smarty_tpl->tpl_vars['nofilter']->value['dialog'])){?>
<div class="dialogNotice" id="dialogNotice" style="display:none;">
    <?php echo $_smarty_tpl->tpl_vars['nofilter']->value['dialog'];?>

</div>
<?php }?>
</body>
</html><?php }} ?>