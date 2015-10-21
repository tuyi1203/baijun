<?php
defined('_EKU') or die;
/**
 */
$lang = getLang();
$lang->smallslides = new stdClass();


$lang->smallslides->common   = '左侧幻灯片设置';
$lang->smallslides->edit     = '左侧幻灯片编辑';
$lang->smallslides->picture  = '图片';
$lang->smallslides->link     = '链接';
$lang->smallslides->title    = '标题';
$lang->smallslides->label    = '按钮文字';
$lang->smallslides->desc     = '单页内容';
$lang->smallslides->createby = '创建人';
// $lang->slide->image    = '图片';
// $lang->slide->url      = '链接';
// $lang->slide->summary  = '摘要';
// $lang->slide->label    = '按钮文字';

$lang->smallslides->sort         = '排序';
$lang->smallslides->savesort     = '保存排序';
$lang->smallslides->create       = '添加幻灯片';
$lang->smallslides->modulechoose = '选择一级模块';
$lang->smallslides->modechoose   = '选择模式';

$lang->smallslides->successsort     = '排序成功保存';
$lang->smallslides->failsort        = '排序保存失败';
$lang->smallslides->successupdate   = '更新幻灯片成功';
$lang->smallslides->failupdate      = '更新幻灯片失败';
$lang->smallslides->successinsert   = '新增幻灯片成功';
$lang->smallslides->failinsert      = '新增幻灯片失败';
$lang->smallslides->successdelete   = '删除幻灯片成功';
$lang->smallslides->faildelete      = '删除幻灯片失败';
// $lang->slide->noImageSelected = '没有选择图片';
// $lang->slide->suitableSize    = '同一幻灯片中的所有图片尺寸应该保持一致，最佳图片尺寸：1140px X 270px(宽 X 高)';

/* Items for javascript. */
$lang->smallslides->js = new stdclass();
$lang->smallslides->js->confirmDelete = '您确定要执行删除操作吗？';
$lang->smallslides->js->deleteing     = '删除中...';
$lang->smallslides->js->doing         = '处理中';
$lang->smallslides->js->timeout       = '网络超时,请重试';
