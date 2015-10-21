<?php
defined('_EKU') or die;
/**
 */
$lang = getLang();
$lang->info = new stdClass();


$lang->info->common   = '站点信息设置';
$lang->info->edit     = '站点信息编辑';
$lang->info->picture  = '图片';
$lang->info->link     = '链接';
$lang->info->buttom   = '底部信息';
$lang->info->contact  = '健康咨询电话';
$lang->info->tel1 	  = '水务热线';
$lang->info->tel2 	  = '服务咨询热线2';
$lang->info->qq1 	  = '服务QQ1';
$lang->info->qq2 	  = '服务QQ2';
$lang->info->label    = '按钮文字';
$lang->info->desc     = '描述';
$lang->info->createby = '创建人';
$lang->info->video    = '首页视频URL';
$lang->info->qcode   = '微信二维码';
$lang->info->applycount = "免费服务业主基数";


$lang->info->sitetitle      = "站点标题";
$lang->info->sitekeywords   = "站点关键词";
$lang->info->sitedesc       = "站点描述";


// $lang->slide->image    = '图片';
// $lang->slide->url      = '链接';
// $lang->slide->summary  = '摘要';
// $lang->slide->label    = '按钮文字';

$lang->info->sort         = '排序';
$lang->info->savesort     = '保存排序';
$lang->info->create       = '添加站点信息';
$lang->info->modulechoose = '选择一级模块';
$lang->info->modechoose   = '选择模式';

$lang->info->successsort     = '排序成功保存';
$lang->info->failsort        = '排序保存失败';
$lang->info->successupdate   = '更新站点信息成功';
$lang->info->failupdate      = '更新站点信息失败';
$lang->info->successinsert   = '新增站点信息成功';
$lang->info->failinsert      = '新增站点信息失败';
$lang->info->successdelete   = '删除站点信息成功';
$lang->info->faildelete      = '删除站点信息失败';
// $lang->slide->noImageSelected = '没有选择图片';
// $lang->slide->suitableSize    = '同一站点信息中的所有图片尺寸应该保持一致，最佳图片尺寸：1140px X 270px(宽 X 高)';

$lang->info->bannercontent = 'banner单页内容';
$lang->info->bannertitle   = 'banner单页标题';
/* Items for javascript. */
$lang->info->js = new stdclass();
$lang->info->js->confirmDelete = '您确定要执行删除操作吗？';
$lang->info->js->deleteing     = '删除中...';
$lang->info->js->doing         = '处理中';
$lang->info->js->timeout       = '网络超时,请重试';
