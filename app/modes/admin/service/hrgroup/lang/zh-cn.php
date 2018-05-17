<?php
defined('_EKU') or die;
/**
 */
$lang = getLang();
$lang->hrgroup = new stdClass();


$lang->hrgroup->common   = '招贤纳士分组设置';
$lang->hrgroup->edit     = '招贤纳士分组编辑';
$lang->hrgroup->picture  = '图片';
$lang->hrgroup->link     = '链接';
$lang->hrgroup->title    = '名称';
$lang->hrgroup->label    = '描述';
$lang->hrgroup->desc     = '招贤纳士分组详细描述';
$lang->hrgroup->createby = '创建人';
// $lang->slide->image    = '图片';
// $lang->slide->url      = '链接';
// $lang->slide->summary  = '摘要';
// $lang->slide->label    = '按钮文字';

$lang->hrgroup->sort         = '排序';
$lang->hrgroup->savesort     = '保存排序';
$lang->hrgroup->create       = '添加招贤纳士分组';
$lang->hrgroup->modulechoose = '选择一级模块';
$lang->hrgroup->modechoose   = '选择模式';

$lang->hrgroup->successsort     = '排序成功保存';
$lang->hrgroup->failsort        = '排序保存失败';
$lang->hrgroup->successupdate   = '更新招贤纳士分组成功';
$lang->hrgroup->failupdate      = '更新招贤纳士分组失败';
$lang->hrgroup->successinsert   = '新增招贤纳士分组成功';
$lang->hrgroup->failinsert      = '新增招贤纳士分组失败';
$lang->hrgroup->successdelete   = '删除招贤纳士分组成功';
$lang->hrgroup->faildelete      = '删除招贤纳士分组失败';
// $lang->slide->noImageSelected = '没有选择图片';
// $lang->slide->suitableSize    = '同一招贤纳士分组中的所有图片尺寸应该保持一致，最佳图片尺寸：1140px X 270px(宽 X 高)';

/* Items for javascript. */
$lang->hrgroup->js = new stdclass();
$lang->hrgroup->js->confirmDelete = '您确定要执行删除操作吗？';
$lang->hrgroup->js->deleteing     = '删除中...';
$lang->hrgroup->js->doing         = '处理中';
$lang->hrgroup->js->timeout       = '网络超时,请重试';
