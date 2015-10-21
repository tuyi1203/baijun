<?php
defined('_EKU') or die;
/**
 */
$lang = getLang();
$lang->level = new stdClass();


$lang->level->common   = '设计级别设置';
$lang->level->edit     = '设计级别编辑';
$lang->level->picture  = '图片';
$lang->level->name     = '名称';
$lang->level->title    = '头衔';
$lang->level->type     = '专家类别';
$lang->level->status   = '首页显示';
$lang->level->desc     = '描述';
$lang->level->createby = '创建人';
$lang->level->content  = '详细描述';
$lang->level->content2 = '擅长疾病';
$lang->level->content3 = '其他描述';
// $lang->slide->image    = '图片';
// $lang->slide->url      = '链接';
// $lang->slide->summary  = '摘要';
// $lang->slide->label    = '按钮文字';

$lang->level->sort         = '排序';
$lang->level->savesort     = '保存排序';
$lang->level->create       = '添加设计级别';
$lang->level->modulechoose = '选择一级模块';
$lang->level->modechoose   = '选择模式';

$lang->level->successsort     = '排序成功保存';
$lang->level->failsort        = '排序保存失败';
$lang->level->successupdate   = '更新设计级别成功';
$lang->level->failupdate      = '更新设计级别失败';
$lang->level->successinsert   = '新增设计级别成功';
$lang->level->failinsert      = '新增设计级别失败';
$lang->level->successdelete   = '删除设计级别成功';
$lang->level->faildelete      = '删除设计级别失败';
// $lang->slide->noImageSelected = '没有选择图片';
// $lang->slide->suitableSize    = '同一设计级别中的所有图片尺寸应该保持一致，最佳图片尺寸：1140px X 270px(宽 X 高)';

/* Items for javascript. */
$lang->level->js = new stdclass();
$lang->level->js->confirmDelete = '您确定要执行删除操作吗？';
$lang->level->js->deleteing     = '删除中...';
$lang->level->js->doing         = '处理中';
$lang->level->js->timeout       = '网络超时,请重试';
