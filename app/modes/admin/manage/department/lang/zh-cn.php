<?php
defined('_EKU') or die;
/**
 */
$lang = getLang();
$lang->department = new stdClass();


$lang->department->common  = '部门设置';
$lang->department->edit    = '部门编辑';
$lang->department->add     = '添加部门';
$lang->department->name    = '名称';
$lang->department->desc    = '描述';
$lang->department->createby= '创建人';
$lang->department->id      = '编号';
$lang->department->sort    = '排序';
$lang->department->link    = "链接";
// $lang->slide->image    = '图片';
// $lang->slide->url      = '链接';
// $lang->slide->summary  = '摘要';
// $lang->slide->label    = '按钮文字';

$lang->department->create     = '添加部门';
$lang->department->savesort   = '保存排序';
// $lang->slide->edit     = '编辑幻灯片';

$lang->department->successupdate   = '更新部门成功';
$lang->department->failupdate      = '更新部门失败';
$lang->department->successinsert   = '新增部门成功';
$lang->department->failinsert      = '新增部门失败';
$lang->department->successdelete   = '删除部门成功';
$lang->department->faildelete      = '删除部门失败';
$lang->department->successsort     = '保存排序成功';
$lang->department->failsort        = '保存排序失败';
// $lang->slide->noImageSelected = '没有选择图片';
// $lang->slide->suitableSize    = '同一幻灯片中的所有图片尺寸应该保持一致，最佳图片尺寸：1140px X 270px(宽 X 高)';

/* Items for javascript. */
$lang->department->js = new stdclass();
$lang->department->js->confirmDelete = '删除部门会导致该部门关联的信息（例如律师信息中的部门划分和该部门的员工权限等）同时被删除，您确定要执行删除操作吗？';
$lang->department->js->deleteing     = '删除中';
$lang->department->js->doing         = '处理中';
$lang->department->js->timeout       = '网络超时,请重试';
