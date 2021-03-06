<?php
defined('_EKU') or die;
/**
 */
$lang = getLang();
$lang->intro = new stdClass();


$lang->intro->common   = '事务所简介设置';
$lang->intro->title    = '标题';
$lang->intro->keyword  = '关键字';
$lang->intro->summary  = '摘要';
$lang->intro->content  = '内容';
$lang->intro->edit     = '事务所简介编辑';
$lang->intro->picture  = '图片';
$lang->intro->link     = '链接';
$lang->intro->buttom   = '底部信息';
$lang->intro->desc     = '描述';
// $lang->slide->image    = '图片';
// $lang->slide->url      = '链接';
// $lang->slide->summary  = '摘要';
// $lang->slide->label    = '按钮文字';

$lang->intro->sort         = '排序';
$lang->intro->savesort     = '保存排序';
$lang->intro->create       = '添加事务所简介';
$lang->intro->modulechoose = '选择一级模块';
$lang->intro->modechoose   = '选择模式';

$lang->intro->successsort     = '排序成功保存';
$lang->intro->failsort        = '排序保存失败';
$lang->intro->successupdate   = '更新事务所简介成功';
$lang->intro->failupdate      = '更新事务所简介失败';
$lang->intro->successdelete   = '删除事务所简介成功';
$lang->intro->faildelete      = '删除事务所简介失败';
// $lang->slide->noImageSelected = '没有选择图片';
// $lang->slide->suitableSize    = '同一事务所简介中的所有图片尺寸应该保持一致，最佳图片尺寸：1140px X 270px(宽 X 高)';

/* Items for javascript. */
$lang->intro->js = new stdclass();
$lang->intro->js->confirmDelete = '您确定要执行删除操作吗？';
$lang->intro->js->deleteing     = '删除中...';
$lang->intro->js->doing         = '处理中';
$lang->intro->js->timeout       = '网络超时,请重试';
