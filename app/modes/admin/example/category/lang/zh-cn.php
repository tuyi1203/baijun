<?php
defined('_EKU') or die;
/**
 */
$lang = getLang();
$lang->category = new stdClass();


$lang->category->common  = '团队部门设置';
$lang->category->edit    = '团队部门编辑';
$lang->category->add     = '添加团队部门';
$lang->category->name    = '名称';
$lang->category->desc    = '描述';
$lang->category->createby= '创建人';
$lang->category->id      = '编号';
// $lang->slide->image    = '图片';
// $lang->slide->url      = '链接';
// $lang->slide->summary  = '摘要';
// $lang->slide->label    = '按钮文字';

$lang->category->create     = '添加团队部门';
// $lang->slide->edit     = '编辑幻灯片';

$lang->category->successupdate   = '更新团队部门成功';
$lang->category->failupdate      = '更新团队部门失败';
$lang->category->successinsert   = '新增团队部门成功';
$lang->category->failinsert      = '新增团队部门失败';
$lang->category->successdelete   = '删除团队部门成功';
$lang->category->faildelete      = '删除团队部门失败';
// $lang->slide->noImageSelected = '没有选择图片';
// $lang->slide->suitableSize    = '同一幻灯片中的所有图片尺寸应该保持一致，最佳图片尺寸：1140px X 270px(宽 X 高)';

/* Items for javascript. */
$lang->category->js = new stdclass();
$lang->category->js->confirmDelete = '您确定要执行删除操作吗？';
$lang->category->js->deleteing     = '删除中';
$lang->category->js->doing         = '处理中';
$lang->category->js->timeout       = '网络超时,请重试';
