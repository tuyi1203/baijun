<?php
defined('_EKU') or die;
/**
 */
$lang = getLang();
$lang->worklanguage = new stdClass();


$lang->worklanguage->common  = '工作语言设置';
$lang->worklanguage->edit    = '工作语言编辑';
$lang->worklanguage->add     = '添加工作语言';
$lang->worklanguage->name    = '名称';
$lang->worklanguage->desc    = '描述';
$lang->worklanguage->createby= '创建人';
$lang->worklanguage->id      = '编号';
$lang->worklanguage->sort    = '排序';
$lang->worklanguage->link    = "链接";
// $lang->slide->image    = '图片';
// $lang->slide->url      = '链接';
// $lang->slide->summary  = '摘要';
// $lang->slide->label    = '按钮文字';

$lang->worklanguage->create     = '添加工作语言';
$lang->worklanguage->savesort   = '保存排序';
// $lang->slide->edit     = '编辑幻灯片';

$lang->worklanguage->successupdate   = '更新工作语言成功';
$lang->worklanguage->failupdate      = '更新工作语言失败';
$lang->worklanguage->successinsert   = '新增工作语言成功';
$lang->worklanguage->failinsert      = '新增工作语言失败';
$lang->worklanguage->successdelete   = '删除工作语言成功';
$lang->worklanguage->faildelete      = '删除工作语言失败';
$lang->worklanguage->successsort     = '保存排序成功';
$lang->worklanguage->failsort        = '保存排序失败';
// $lang->slide->noImageSelected = '没有选择图片';
// $lang->slide->suitableSize    = '同一幻灯片中的所有图片尺寸应该保持一致，最佳图片尺寸：1140px X 270px(宽 X 高)';

/* Items for javascript. */
$lang->worklanguage->js = new stdclass();
$lang->worklanguage->js->confirmDelete = '删除工作语言会导致该工作语言关联的信息（例如律师信息中的工作语言信息等）同时被删除，您确定要执行删除操作吗？';
$lang->worklanguage->js->deleteing     = '删除中';
$lang->worklanguage->js->doing         = '处理中';
$lang->worklanguage->js->timeout       = '网络超时,请重试';
