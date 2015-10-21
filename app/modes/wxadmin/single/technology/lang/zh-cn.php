<?php
defined('_EKU') or die;
/**
 */
$lang = getLang();
$lang->technology = new stdClass();


$lang->technology->common   = '施工工艺设置';
$lang->technology->title    = '标题';
$lang->technology->keyword  = '关键字';
$lang->technology->summary  = '摘要';
$lang->technology->content  = '内容';
$lang->technology->content2 = '联系电话';
$lang->technology->edit     = '施工工艺编辑';
$lang->technology->picture  = '图片';
$lang->technology->link     = '链接';
$lang->technology->label    = '按钮文字';
$lang->technology->desc     = '描述';
$lang->technology->createby = '创建人';
$lang->technology->copyurl  = '拷贝前端URL';
// $lang->slide->image    = '图片';
// $lang->slide->url      = '链接';
// $lang->slide->summary  = '摘要';
// $lang->slide->label    = '按钮文字';

$lang->technology->sort         = '排序';
$lang->technology->savesort     = '保存排序';
$lang->technology->create       = '添加施工工艺';
$lang->technology->modulechoose = '选择一级模块';
$lang->technology->modechoose   = '选择模式';

$lang->technology->successsort     = '排序成功保存';
$lang->technology->failsort        = '排序保存失败';
$lang->technology->successupdate   = '更新施工工艺成功';
$lang->technology->failupdate      = '更新施工工艺失败';
$lang->technology->successinsert   = '新增施工工艺成功';
$lang->technology->failinsert      = '新增施工工艺失败';
$lang->technology->successdelete   = '删除施工工艺成功';
$lang->technology->faildelete      = '删除施工工艺失败';
// $lang->slide->noImageSelected = '没有选择图片';
// $lang->slide->suitableSize    = '同一施工工艺中的所有图片尺寸应该保持一致，最佳图片尺寸：1140px X 270px(宽 X 高)';

/* Items for javascript. */
$lang->technology->js = new stdclass();
$lang->technology->js->confirmDelete = '您确定要执行删除操作吗？';
$lang->technology->js->deleteing     = '删除中...';
$lang->technology->js->doing         = '处理中';
$lang->technology->js->timeout       = '网络超时,请重试';
