<?php
defined('_EKU') or die;
/**
 */
$lang = getLang();
$lang->room = new stdClass();


$lang->room->common   = '居室类型设置';
$lang->room->edit     = '居室类型编辑';
$lang->room->picture  = '图片';
$lang->room->name     = '名称';
$lang->room->title    = '头衔';
$lang->room->type     = '专家类别';
$lang->room->status   = '首页显示';
$lang->room->desc     = '描述';
$lang->room->createby = '创建人';
$lang->room->content  = '详细描述';
$lang->room->content2 = '擅长疾病';
$lang->room->content3 = '其他描述';
// $lang->slide->image    = '图片';
// $lang->slide->url      = '链接';
// $lang->slide->summary  = '摘要';
// $lang->slide->label    = '按钮文字';

$lang->room->sort         = '排序';
$lang->room->savesort     = '保存排序';
$lang->room->create       = '添加居室类型';
$lang->room->modulechoose = '选择一级模块';
$lang->room->modechoose   = '选择模式';

$lang->room->successsort     = '排序成功保存';
$lang->room->failsort        = '排序保存失败';
$lang->room->successupdate   = '更新居室类型成功';
$lang->room->failupdate      = '更新居室类型失败';
$lang->room->successinsert   = '新增居室类型成功';
$lang->room->failinsert      = '新增居室类型失败';
$lang->room->successdelete   = '删除居室类型成功';
$lang->room->faildelete      = '删除居室类型失败';
// $lang->slide->noImageSelected = '没有选择图片';
// $lang->slide->suitableSize    = '同一居室类型中的所有图片尺寸应该保持一致，最佳图片尺寸：1140px X 270px(宽 X 高)';

/* Items for javascript. */
$lang->room->js = new stdclass();
$lang->room->js->confirmDelete = '您确定要执行删除操作吗？';
$lang->room->js->deleteing     = '删除中...';
$lang->room->js->doing         = '处理中';
$lang->room->js->timeout       = '网络超时,请重试';
