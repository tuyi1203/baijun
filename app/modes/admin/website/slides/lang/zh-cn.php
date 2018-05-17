<?php
defined('_EKU') or die;
/**
 */
$lang = getLang();
$lang->slides = new stdClass();


$lang->slides->common   = '幻灯片设置';
$lang->slides->edit     = '幻灯片编辑';
$lang->slides->picture  = '图片';
$lang->slides->link     = '链接';
$lang->slides->title    = '标题';
$lang->slides->label    = '按钮文字';
$lang->slides->summary  = '简要描述';
$lang->slides->desc     = '单页内容';
$lang->slides->createby = '创建人';
// $lang->slide->image    = '图片';
// $lang->slide->url      = '链接';
// $lang->slide->summary  = '摘要';
// $lang->slide->label    = '按钮文字';

$lang->slides->sort         = '排序';
$lang->slides->savesort     = '保存排序';
$lang->slides->create       = '添加幻灯片';
$lang->slides->modulechoose = '选择一级模块';
$lang->slides->modechoose   = '选择模式';

$lang->slides->successsort     = '排序成功保存';
$lang->slides->failsort        = '排序保存失败';
$lang->slides->successupdate   = '更新幻灯片成功';
$lang->slides->failupdate      = '更新幻灯片失败';
$lang->slides->successinsert   = '新增幻灯片成功';
$lang->slides->failinsert      = '新增幻灯片失败';
$lang->slides->successdelete   = '删除幻灯片成功';
$lang->slides->faildelete      = '删除幻灯片失败';
// $lang->slide->noImageSelected = '没有选择图片';
$lang->slides->slideinfo      = '同一幻灯片中的所有图片尺寸应该保持一致，最佳图片尺寸：1920px X 1005px(宽 X 高)';

/* Items for javascript. */
$lang->slides->js = new stdclass();
$lang->slides->js->confirmDelete = '您确定要执行删除操作吗？';
$lang->slides->js->deleteing     = '删除中...';
$lang->slides->js->doing         = '处理中';
$lang->slides->js->timeout       = '网络超时,请重试';
