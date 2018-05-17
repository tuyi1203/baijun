<?php
defined('_EKU') or die;
/**
 */
$lang = getLang();
$lang->branches = new stdClass();


$lang->branches->common  = '机构设置';
$lang->branches->edit    = '机构编辑';
$lang->branches->add     = '添加机构';
$lang->branches->name    = '名称';
$lang->branches->desc    = '描述';
$lang->branches->createby= '创建人';
$lang->branches->id      = '编号';
$lang->branches->keyword = '关键字';
$lang->branches->summary = '简介';
$lang->branches->picture = '顶部头图';
$lang->branches->sort    = '排序';
$lang->branches->link    = "链接";
$lang->branches->contact = "联系方式";
// $lang->slide->image    = '图片';
// $lang->slide->url      = '链接';
// $lang->slide->summary  = '摘要';
// $lang->slide->label    = '按钮文字';

$lang->branches->create     = '添加机构';
$lang->branches->savesort   = '保存排序';
// $lang->slide->edit     = '编辑幻灯片';

$lang->branches->successupdate   = '更新机构成功';
$lang->branches->failupdate      = '更新机构失败';
$lang->branches->successinsert   = '新增机构成功';
$lang->branches->failinsert      = '新增机构失败';
$lang->branches->successdelete   = '删除机构成功';
$lang->branches->faildelete      = '删除机构失败';
$lang->branches->successsort     = '保存排序成功';
$lang->branches->failsort        = '保存排序失败';
// $lang->slide->noImageSelected = '没有选择图片';
// $lang->slide->suitableSize    = '同一幻灯片中的所有图片尺寸应该保持一致，最佳图片尺寸：1140px X 270px(宽 X 高)';

/* Items for javascript. */
$lang->branches->js = new stdclass();
$lang->branches->js->confirmDelete = '删除机构会导致该机构关联的信息（例如律师信息中的机构信息）同时被删除，您确定要执行删除操作吗？';
$lang->branches->js->deleteing     = '删除中';
$lang->branches->js->doing         = '处理中';
$lang->branches->js->timeout       = '网络超时,请重试';
