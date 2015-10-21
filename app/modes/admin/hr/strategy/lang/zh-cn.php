<?php
defined('_EKU') or die;
/**
 */
$lang = getLang();
$lang->strategy = new stdClass();


$lang->strategy->common   = '人才战略设置';
$lang->strategy->title    = '标题';
$lang->strategy->keyword  = '关键字';
$lang->strategy->summary  = '摘要';
$lang->strategy->content  = '内容';
$lang->strategy->edit     = '人才战略编辑';
$lang->strategy->picture  = '图片';
$lang->strategy->link     = '链接';
$lang->strategy->buttom   = '底部信息';
$lang->strategy->desc     = '描述';
// $lang->slide->image    = '图片';
// $lang->slide->url      = '链接';
// $lang->slide->summary  = '摘要';
// $lang->slide->label    = '按钮文字';

$lang->strategy->sort         = '排序';
$lang->strategy->savesort     = '保存排序';
$lang->strategy->create       = '添加人才战略';
$lang->strategy->modulechoose = '选择一级模块';
$lang->strategy->modechoose   = '选择模式';

$lang->strategy->successsort     = '排序成功保存';
$lang->strategy->failsort        = '排序保存失败';
$lang->strategy->successupdate   = '更新人才战略成功';
$lang->strategy->failupdate      = '更新人才战略失败';
// $lang->slide->noImageSelected = '没有选择图片';
// $lang->slide->suitableSize    = '同一人才战略中的所有图片尺寸应该保持一致，最佳图片尺寸：1140px X 270px(宽 X 高)';

/* Items for javascript. */
$lang->strategy->js = new stdclass();
$lang->strategy->js->confirmDelete = '您确定要执行删除操作吗？';
$lang->strategy->js->deleteing     = '删除中...';
$lang->strategy->js->doing         = '处理中';
$lang->strategy->js->timeout       = '网络超时,请重试';
