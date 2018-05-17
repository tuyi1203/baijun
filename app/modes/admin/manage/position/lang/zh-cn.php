<?php
defined('_EKU') or die;
/**
 */
$lang = getLang();
$lang->position = new stdClass();


$lang->position->common  = '职位设置';
$lang->position->edit    = '职位编辑';
$lang->position->add     = '添加职位';
$lang->position->name    = '名称';
$lang->position->desc    = '描述';
$lang->position->createby= '创建人';
$lang->position->id      = '编号';
$lang->position->sort    = '排序';
$lang->position->link    = "链接";
// $lang->slide->image    = '图片';
// $lang->slide->url      = '链接';
// $lang->slide->summary  = '摘要';
// $lang->slide->label    = '按钮文字';

$lang->position->create     = '添加职位';
$lang->position->savesort   = '保存排序';
// $lang->slide->edit     = '编辑幻灯片';

$lang->position->successupdate   = '更新职位成功';
$lang->position->failupdate      = '更新职位失败';
$lang->position->successinsert   = '新增职位成功';
$lang->position->failinsert      = '新增职位失败';
$lang->position->successdelete   = '删除职位成功';
$lang->position->faildelete      = '删除职位失败';
$lang->position->successsort     = '保存排序成功';
$lang->position->failsort        = '保存排序失败';
// $lang->slide->noImageSelected = '没有选择图片';
// $lang->slide->suitableSize    = '同一幻灯片中的所有图片尺寸应该保持一致，最佳图片尺寸：1140px X 270px(宽 X 高)';

/* Items for javascript. */
$lang->position->js = new stdclass();
$lang->position->js->confirmDelete = '删除职位会导致该职位关联的信息（例如律师信息中的职位信息）同时被删除，您确定要执行删除操作吗？';
$lang->position->js->deleteing     = '删除中';
$lang->position->js->doing         = '处理中';
$lang->position->js->timeout       = '网络超时,请重试';
