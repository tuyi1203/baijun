<?php
defined('_EKU') or die;
/**
 */
$lang = getLang();
$lang->team = new stdClass();


$lang->team->common   = '团队设置';
$lang->team->edit     = '团队编辑';
$lang->team->picture  = '图片';
$lang->team->name     = '名称';
$lang->team->title    = '头衔';
$lang->team->type     = '专家类别';
$lang->team->status   = '首页显示';
$lang->team->desc     = '描述';
$lang->team->createby = '创建人';
$lang->team->content  = '详细描述';
$lang->team->content2 = '擅长疾病';
$lang->team->content3 = '其他描述';
// $lang->slide->image    = '图片';
// $lang->slide->url      = '链接';
// $lang->slide->summary  = '摘要';
// $lang->slide->label    = '按钮文字';

$lang->team->sort         = '排序';
$lang->team->savesort     = '保存排序';
$lang->team->create       = '添加团队';
$lang->team->modulechoose = '选择一级模块';
$lang->team->modechoose   = '选择模式';

$lang->team->successsort     = '排序成功保存';
$lang->team->failsort        = '排序保存失败';
$lang->team->successupdate   = '更新团队成功';
$lang->team->failupdate      = '更新团队失败';
$lang->team->successinsert   = '新增团队成功';
$lang->team->failinsert      = '新增团队失败';
$lang->team->successdelete   = '删除团队成功';
$lang->team->faildelete      = '删除团队失败';
// $lang->slide->noImageSelected = '没有选择图片';
// $lang->slide->suitableSize    = '同一团队中的所有图片尺寸应该保持一致，最佳图片尺寸：1140px X 270px(宽 X 高)';

/* Items for javascript. */
$lang->team->js = new stdclass();
$lang->team->js->confirmDelete = '您确定要执行删除操作吗？';
$lang->team->js->deleteing     = '删除中...';
$lang->team->js->doing         = '处理中';
$lang->team->js->timeout       = '网络超时,请重试';
