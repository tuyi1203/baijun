<?php /* Smarty version Smarty-3.1.6, created on 2015-10-10 12:02:31
         compiled from "D:\xampp\htdocs\baijun\app\views\site\menu.html" */ ?>
<?php /*%%SmartyHeaderCode:1601156188dd73fb5d2-59095234%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7f105d5d58f2aa636a5bf059836e631ee7ddc51c' => 
    array (
      0 => 'D:\\xampp\\htdocs\\baijun\\app\\views\\site\\menu.html',
      1 => 1434419157,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1601156188dd73fb5d2-59095234',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'now' => 0,
    'week' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_56188dd742653',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56188dd742653')) {function content_56188dd742653($_smarty_tpl) {?><div class="mainTop">
    <div class="con">
        <div class="l">您好, 今天是<em><?php echo $_smarty_tpl->tpl_vars['now']->value;?>
</em><?php echo $_smarty_tpl->tpl_vars['week']->value;?>
</div>
        <div class="r"><iframe width="270" scrolling="no" height="25" frameborder="0" allowtransparency="true" src="http://i.tianqi.com/index.php?c=code&id=34&icon=1&num=3"></iframe></div>
    </div>
</div>
<div class="main">
    <form action="{:U('home/default/list/default.html')}" method="post" id="searchForm">
    <header>
        <div class="logo"><a href="{:U('home/default')}"></a></div>
        <div class="sch"><label for="schText">站内搜索，请输入关键词</label><input type="text" class="text" id="schText" name="data[keyword]"/><a href="javascript:;" onclick="submitme('searchForm');" class="mwIcon">&#xf002;</a></div>
        <div class="tel"></div>
    </header>
    </form>
    <nav>
        <ul id="nav">
            <li>
                <a href="{:U('home/default')}" class="lnk">首页</a>
            </li>
            <li class="line"></li>
            <li>
                <a href="{:U('single/intro/detail/default.html')}" class="lnk">公司简介</a>
                <div class="box"><a href="{:U('single/intro/detail/default.html')}">公司简介</a><a href="{:U('single/honour/list/default.html')}">公司荣誉</a><a href="{:U('single/organization/detail/default.html')}">组织机构</a><a href="{:U('single/ceo/detail/default.html')}">领导致辞</a><a href="{:U('single/event/list/default.html')}">公司大事记</a><a href="{:U('single/planning/list/default.html')}">发展规划</a><a href="{:U('single/cfo/list/default.html')}">财务工作</a></div>
            </li>
            <li class="line"></li>
            <li>
                <a href="{:U('news/company/list/default.html')}" class="lnk">新闻动态</a>
                <div class="box"><a href="{:U('news/company/list/default.html')}">公司动态</a><a href="{:U('news/brotherhood/list/default.html')}">行业动态</a></div>
            </li>
            <li class="line"></li>
            <li>
                <a href="{:U('information/waterstop/list/default.html')}" class="lnk">通知公告</a>
                <div class="box"><a href="{:U('information/waterstop/list/default.html')}">停水公告</a><a href="{:U('information/notice/list/default.html')}">公司公告</a><a href="{:U('information/waterquality/list/default.html')}">水质公告</a><a href="{:U('information/waterpressure/list/default.html')}">水压月报</a><a href="{:U('information/bomb/list/default.html')}">爆管公告</a></div>
            </li>
            <li class="line"></li>
            <li>
                <a href="{:U('knowledge/question/list/default.html')}" class="lnk">用水知识</a>
                <div class="box"><a href="{:U('knowledge/question/list/default.html')}">常见问题</a><a href="{:U('knowledge/technology/detail/default.html')}">供排水生产工艺流程</a></div>
            </li>
            <li class="line"></li>
            <li>
                <a href="{:U('service/usernotice/detail/default.html')}" class="lnk">客户服务</a>
                <div class="box"><a href="{:U('service/usernotice/detail/default.html')}">用户须知</a><a href="{:U('service/waterprice/detail/default.html')}">现行水价</a><!-- <a href="#">水费查询</a> --><a href="{:U('service/payment/detail/default.html')}">缴费指南</a><a href="{:U('service/online/detail/default.html')}">网上缴费</a><a href="{:U('service/questionnaire/list/default.html')}">网上调查</a><a href="{:U('service/repair/add/default.html')}">网上报修</a><a href="{:U('service/promise/detail/default.html')}">服务承诺</a><a href="{:U('service/contact/detail/default.html')}">联系我们</a></div>
            </li>
            <li class="line"></li>
            <li>
                <a href="{:U('culture/party/list/default.html')}" class="lnk">文化建设</a>
                <div class="box"><a href="{:U('culture/party/list/default.html')}">党团风采</a><a href="{:U('culture/metropolitan/list/default.html')}">水司文化</a><a href="{:U('culture/drink/list/default.html')}">水务之星</a></div>
            </li>
            <li class="line"></li>
            <li>
                <a href="{:U('hr/employ/detail/default.html')}" class="lnk">人力资源</a>
                <div class="box"><a href="{:U('hr/employ/detail/default.html')}">诚聘英才</a><a href="{:U('hr/strategy/detail/default.html')}">人才战略</a><a href="{:U('hr/removals/list/default.html')}">人事任免</a><a href="{:U('hr/resume/add/default.html')}">提交简历</a></div>
            </li>
            <li class="line"></li>
            <li>
                <a href="{:U('gov/guide/list/default.html')}" class="lnk">政务公开</a>
                <div class="box"><a href="{:U('gov/guide/list/default.html')}">政府信息公开指南</a><a href="http://www.neijiang.gov.cn/zwgk/department.gsp?code=92337907&organname=%E5%86%85%E6%B1%9F%E5%B8%82%E6%B0%B4%E5%8A%A1%E5%85%AC%E5%8F%B8&categoryId=1" target="_blank">政府信息公开目录</a><a href="http://61.139.47.245/00851003X/list?id=%E6%94%BF%E5%BA%9C%E4%BF%A1%E6%81%AF%E5%85%AC%E5%BC%80%E5%88%B6%E5%BA%A6" target="_blank">政府信息公开制度</a><a href="{:U('gov/report/list/default.html')}">政府信息公开年报</a><a href="http://www.neijiang.gov.cn/sqgk.gsp" target="_blank">政府信息公开申请</a></div>
            </li>
        </ul>
    </nav><?php }} ?>