<?php
defined('_EKU') or die;
/**
 */
$lang = getLang();
$lang->ceo = new stdClass();


$lang->ceo->common   = '领导致辞设置';
$lang->ceo->title    = '标题';
$lang->ceo->keyword  = '关键字';
$lang->ceo->summary  = '摘要';
$lang->ceo->content  = '内容';
$lang->ceo->edit     = '领导致辞编辑';
$lang->ceo->picture  = '图片';
$lang->ceo->link     = '链接';
$lang->ceo->buttom   = '底部信息';
$lang->ceo->desc     = '描述';
// $lang->slide->image    = '图片';
// $lang->slide->url      = '链接';
// $lang->slide->summary  = '摘要';
// $lang->slide->label    = '按钮文字';

$lang->ceo->sort         = '排序';
$lang->ceo->savesort     = '保存排序';
$lang->ceo->create       = '添加领导致辞';
$lang->ceo->modulechoose = '选择一级模块';
$lang->ceo->modechoose   = '选择模式';

$lang->ceo->successsort     = '排序成功保存';
$lang->ceo->failsort        = '排序保存失败';
$lang->ceo->successupdate   = '更新领导致辞成功';
$lang->ceo->failupdate      = '更新领导致辞失败';
// $lang->slide->noImageSelected = '没有选择图片';
// $lang->slide->suitableSize    = '同一领导致辞中的所有图片尺寸应该保持一致，最佳图片尺寸：1140px X 270px(宽 X 高)';

/* Items for javascript. */
$lang->ceo->js = new stdclass();
$lang->ceo->js->confirmDelete = '您确定要执行删除操作吗？';
$lang->ceo->js->deleteing     = '删除中...';
$lang->ceo->js->doing         = '处理中';
$lang->ceo->js->timeout       = '网络超时,请重试';
