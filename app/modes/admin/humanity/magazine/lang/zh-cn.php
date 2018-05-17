<?php
defined('_EKU') or die;
/**
 */
$lang = getLang();
$lang->magazine = new stdClass();

$lang->magazine->photoes = "相片管理";
$lang->magazine->common  = '百君杂志设置';
$lang->magazine->sort    = '排序';

$lang->magazine->edit    = '百君杂志编辑';
$lang->magazine->add     = '添加百君杂志';
$lang->magazine->title   = '百君杂志名';
$lang->magazine->subtitle   = '百君杂志副标题';
$lang->magazine->desc    = '描述';
$lang->magazine->createby= '创建人';
$lang->magazine->id      = '编号';
$lang->magazine->homepage= '首页显示';
$lang->magazine->publishyear= '发布年份';
// $lang->slide->image    = '图片';
// $lang->slide->url      = '链接';
// $lang->slide->summary  = '摘要';
// $lang->slide->label    = '按钮文字';

$lang->magazine->create     = '添加百君杂志';
$lang->magazine->magazinetype  = '相册类别';
// $lang->slide->edit     = '编辑幻灯片';

$lang->magazine->successupdate   = '更新百君杂志成功';
$lang->magazine->failupdate      = '更新百君杂志失败';
$lang->magazine->successinsert   = '新增百君杂志成功';
$lang->magazine->failinsert      = '新增百君杂志失败';
$lang->magazine->successdelete   = '删除百君杂志成功';
$lang->magazine->faildelete      = '删除百君杂志失败';
// $lang->slide->noImageSelected = '没有选择图片';
// $lang->slide->suitableSize    = '同一幻灯片中的所有图片尺寸应该保持一致，最佳图片尺寸：1140px X 270px(宽 X 高)';

/* Items for javascript. */
$lang->magazine->js = new stdclass();
$lang->magazine->js->confirmDelete = '您确定要执行删除操作吗？';
$lang->magazine->js->deleteing     = '删除中';
$lang->magazine->js->doing         = '处理中';
$lang->magazine->js->timeout       = '网络超时,请重试';
