<?php
defined('_EKU') or die;
/**
 */
$lang = getLang();
$lang->sublabel = new stdClass();


$lang->sublabel->common   = '栏目标签二级设置';
$lang->sublabel->edit     = '栏目标签二级编辑';
$lang->sublabel->picture  = '图标';
$lang->sublabel->link     = '链接';
$lang->sublabel->title    = '名称';
$lang->sublabel->entitle  = '英文名称';
$lang->sublabel->label    = '描述';
$lang->sublabel->desc     = '栏目标签二级详细描述';
$lang->sublabel->createby = '创建人';
$lang->sublabel->pidchoose = '栏目一级标签选择';
// $lang->slide->image    = '图片';
// $lang->slide->url      = '链接';
// $lang->slide->summary  = '摘要';
// $lang->slide->label    = '按钮文字';

$lang->sublabel->sort         = '排序';
$lang->sublabel->savesort     = '保存排序';
$lang->sublabel->create       = '添加栏目标签二级';

$lang->sublabel->successsort     = '排序成功保存';
$lang->sublabel->failsort        = '排序保存失败';
$lang->sublabel->successupdate   = '栏目二级标签二级成功';
$lang->sublabel->failupdate      = '栏目二级标签二级失败';
$lang->sublabel->successinsert   = '新增栏目标签二级成功';
$lang->sublabel->failinsert      = '新增栏目标签二级失败';
$lang->sublabel->successdelete   = '删除栏目标签二级成功';
$lang->sublabel->faildelete      = '删除栏目标签二级失败';
// $lang->slide->noImageSelected = '没有选择图片';
// $lang->slide->suitableSize    = '同一栏目标签二级中的所有图片尺寸应该保持一致，最佳图片尺寸：1140px X 270px(宽 X 高)';

/* Items for javascript. */
$lang->sublabel->js = new stdclass();
$lang->sublabel->js->confirmDelete = '您确定要执行删除操作吗？';
$lang->sublabel->js->deleteing     = '删除中...';
$lang->sublabel->js->doing         = '处理中';
$lang->sublabel->js->timeout       = '网络超时,请重试';
