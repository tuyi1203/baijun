<?php
defined('_EKU') or die;
/**
 */
$lang = getLang();
$lang->honor = new stdClass();


$lang->honor->common   = '百君荣誉设置';
$lang->honor->edit     = '百君荣誉编辑';
$lang->honor->updatedesc = '修改百君荣誉描述';
$lang->honor->picture  = '图片';
$lang->honor->link     = '链接';
$lang->honor->title    = '标题';
$lang->honor->label    = '按钮文字';
$lang->honor->desc     = '单页内容';
$lang->honor->createby = '创建人';
$lang->honor->content  = '内容';
// $lang->slide->image    = '图片';
// $lang->slide->url      = '链接';
// $lang->slide->summary  = '摘要';
// $lang->slide->label    = '按钮文字';

$lang->honor->sort         = '排序';
$lang->honor->savesort     = '保存排序';
$lang->honor->create       = '添加百君荣誉';
$lang->honor->modulechoose = '选择一级模块';
$lang->honor->modechoose   = '选择模式';

$lang->honor->successsort     = '排序成功保存';
$lang->honor->failsort        = '排序保存失败';
$lang->honor->successupdate   = '更新百君荣誉成功';
$lang->honor->successdescupdate   = '更新百君荣誉描述成功';
$lang->honor->failupdate      = '更新百君荣誉失败';
$lang->honor->faildescupdate      = '更新百君荣誉描述失败';
$lang->honor->successinsert   = '新增百君荣誉成功';
$lang->honor->failinsert      = '新增百君荣誉失败';
$lang->honor->successdelete   = '删除百君荣誉成功';
$lang->honor->faildelete      = '删除百君荣誉失败';
// $lang->slide->noImageSelected = '没有选择图片';
// $lang->slide->suitableSize    = '同一百君荣誉中的所有图片尺寸应该保持一致，最佳图片尺寸：1140px X 270px(宽 X 高)';

/* Items for javascript. */
$lang->honor->js = new stdclass();
$lang->honor->js->confirmDelete = '您确定要执行删除操作吗？';
$lang->honor->js->deleteing     = '删除中...';
$lang->honor->js->doing         = '处理中';
$lang->honor->js->timeout       = '网络超时,请重试';
