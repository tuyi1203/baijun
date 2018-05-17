<?php
defined('_EKU') or die;
/**
 */
$lang = getLang();
$lang->label = new stdClass();


$lang->label->common   = '栏目一级标签设置';
$lang->label->edit     = '栏目一级标签编辑';
$lang->label->picture  = '图标';
$lang->label->link     = '链接';
$lang->label->title    = '名称';
$lang->label->entitle  = '英文名称';
$lang->label->label    = '描述';
$lang->label->desc     = '栏目一级标签详细描述';
$lang->label->createby = '创建人';
// $lang->slide->image    = '图片';
// $lang->slide->url      = '链接';
// $lang->slide->summary  = '摘要';
// $lang->slide->label    = '按钮文字';

$lang->label->sort         = '排序';
$lang->label->savesort     = '保存排序';
$lang->label->create       = '添加栏目一级标签';

$lang->label->successsort     = '排序成功保存';
$lang->label->failsort        = '排序保存失败';
$lang->label->successupdate   = '更新栏目一级标签成功';
$lang->label->failupdate      = '更新栏目一级标签失败';
$lang->label->successinsert   = '新增栏目一级标签成功';
$lang->label->failinsert      = '新增栏目一级标签失败';
$lang->label->successdelete   = '删除栏目一级标签成功';
$lang->label->faildelete      = '删除栏目一级标签失败';
// $lang->slide->noImageSelected = '没有选择图片';
// $lang->slide->suitableSize    = '同一栏目一级标签中的所有图片尺寸应该保持一致，最佳图片尺寸：1140px X 270px(宽 X 高)';

/* Items for javascript. */
$lang->label->js = new stdclass();
$lang->label->js->confirmDelete = '请谨慎执行删除操作，此操作影响所有与该数据关联的二级栏目数据以及其他的内容数据，您确定要执行删除操作吗？';
$lang->label->js->deleteing     = '删除中...';
$lang->label->js->doing         = '处理中';
$lang->label->js->timeout       = '网络超时,请重试';
