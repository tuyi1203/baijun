<?php
defined('_EKU') or die;
/**
 */
$lang = getLang();
$lang->subfield = new stdClass();


$lang->subfield->common   = '专业领域二级设置';
$lang->subfield->edit     = '专业领域二级编辑';
$lang->subfield->picture  = '图标';
$lang->subfield->link     = '链接';
$lang->subfield->title    = '名称';
$lang->subfield->entitle  = '英文名称';
$lang->subfield->label    = '描述';
$lang->subfield->desc     = '专业领域二级详细描述';
$lang->subfield->createby = '创建人';
$lang->subfield->pidchoose = '一级领域选择';
// $lang->slide->image    = '图片';
// $lang->slide->url      = '链接';
// $lang->slide->summary  = '摘要';
// $lang->slide->label    = '按钮文字';

$lang->subfield->sort         = '排序';
$lang->subfield->savesort     = '保存排序';
$lang->subfield->create       = '添加专业领域二级';
$lang->subfield->modulechoose = '选择一级模块';
$lang->subfield->modechoose   = '选择模式';

$lang->subfield->successsort     = '排序成功保存';
$lang->subfield->failsort        = '排序保存失败';
$lang->subfield->successupdate   = '更新专业领域二级成功';
$lang->subfield->failupdate      = '更新专业领域二级失败';
$lang->subfield->successinsert   = '新增专业领域二级成功';
$lang->subfield->failinsert      = '新增专业领域二级失败';
$lang->subfield->successdelete   = '删除专业领域二级成功';
$lang->subfield->faildelete      = '删除专业领域二级失败';
// $lang->slide->noImageSelected = '没有选择图片';
// $lang->slide->suitableSize    = '同一专业领域二级中的所有图片尺寸应该保持一致，最佳图片尺寸：1140px X 270px(宽 X 高)';

/* Items for javascript. */
$lang->subfield->js = new stdclass();
$lang->subfield->js->confirmDelete = '您确定要执行删除操作吗？';
$lang->subfield->js->deleteing     = '删除中...';
$lang->subfield->js->doing         = '处理中';
$lang->subfield->js->timeout       = '网络超时,请重试';
