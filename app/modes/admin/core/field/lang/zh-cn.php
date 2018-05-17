<?php
defined('_EKU') or die;
/**
 */
$lang = getLang();
$lang->field = new stdClass();


$lang->field->common   = '专业领域设置';
$lang->field->edit     = '专业领域编辑';
$lang->field->picture  = '图标';
$lang->field->link     = '链接';
$lang->field->title    = '名称';
$lang->field->entitle  = '英文名称';
$lang->field->label    = '描述';
$lang->field->desc     = '专业领域详细描述';
$lang->field->createby = '创建人';
// $lang->slide->image    = '图片';
// $lang->slide->url      = '链接';
// $lang->slide->summary  = '摘要';
// $lang->slide->label    = '按钮文字';

$lang->field->sort         = '排序';
$lang->field->savesort     = '保存排序';
$lang->field->create       = '添加专业领域';
$lang->field->modulechoose = '选择一级模块';
$lang->field->modechoose   = '选择模式';

$lang->field->successsort     = '排序成功保存';
$lang->field->failsort        = '排序保存失败';
$lang->field->successupdate   = '更新专业领域成功';
$lang->field->failupdate      = '更新专业领域失败';
$lang->field->successinsert   = '新增专业领域成功';
$lang->field->failinsert      = '新增专业领域失败';
$lang->field->successdelete   = '删除专业领域成功';
$lang->field->faildelete      = '删除专业领域失败';
// $lang->slide->noImageSelected = '没有选择图片';
// $lang->slide->suitableSize    = '同一专业领域中的所有图片尺寸应该保持一致，最佳图片尺寸：1140px X 270px(宽 X 高)';

/* Items for javascript. */
$lang->field->js = new stdclass();
$lang->field->js->confirmDelete = '您确定要执行删除操作吗？';
$lang->field->js->deleteing     = '删除中...';
$lang->field->js->doing         = '处理中';
$lang->field->js->timeout       = '网络超时,请重试';
