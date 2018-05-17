<?php
defined('_EKU') or die;
/**
 */
$lang = getLang();
$lang->germany = new stdClass();


$lang->germany->common   = '德国所简介设置';
$lang->germany->title    = '标题';
$lang->germany->keyword  = '关键字';
$lang->germany->summary  = '摘要';
$lang->germany->content  = '简介内容';
$lang->germany->edit     = '德国所简介编辑';
$lang->germany->picture  = '图片';
$lang->germany->link     = '链接';
$lang->germany->buttom   = '底部信息';
$lang->germany->desc     = '描述';
// $lang->slide->image    = '图片';
// $lang->slide->url      = '链接';
// $lang->slide->summary  = '摘要';
// $lang->slide->label    = '按钮文字';

$lang->germany->sort         = '排序';
$lang->germany->savesort     = '保存排序';
$lang->germany->create       = '添加德国所简介';
$lang->germany->modulechoose = '选择一级模块';
$lang->germany->modechoose   = '选择模式';

$lang->germany->successsort     = '排序成功保存';
$lang->germany->failsort        = '排序保存失败';
$lang->germany->successupdate   = '更新德国所简介成功';
$lang->germany->failupdate      = '更新德国所简介失败';
$lang->germany->successdelete   = '删除德国所简介成功';
$lang->germany->faildelete      = '删除德国所简介失败';
// $lang->slide->noImageSelected = '没有选择图片';
// $lang->slide->suitableSize    = '同一德国所简介中的所有图片尺寸应该保持一致，最佳图片尺寸：1140px X 270px(宽 X 高)';

/* Items for javascript. */
$lang->germany->js = new stdclass();
$lang->germany->js->confirmDelete = '您确定要执行删除操作吗？';
$lang->germany->js->deleteing     = '删除中...';
$lang->germany->js->doing         = '处理中';
$lang->germany->js->timeout       = '网络超时,请重试';
