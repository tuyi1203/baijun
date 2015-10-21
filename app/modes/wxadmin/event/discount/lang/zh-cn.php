<?php
defined('_EKU') or die;
/**
 */
$lang = getLang();
$lang->discount = new stdClass();


$lang->discount->common   = '优惠活动设置';
$lang->discount->edit     = '优惠活动编辑';
$lang->discount->picture  = '图片';
$lang->discount->link     = '链接';
$lang->discount->title    = '标题';
$lang->discount->label    = '按钮文字';
$lang->discount->desc     = '单页内容';
$lang->discount->createby = '创建人';
// $lang->slide->image    = '图片';
// $lang->slide->url      = '链接';
// $lang->slide->summary  = '摘要';
// $lang->slide->label    = '按钮文字';

$lang->discount->sort         = '排序';
$lang->discount->savesort     = '保存排序';
$lang->discount->create       = '添加优惠活动';

$lang->discount->successsort     = '排序成功保存';
$lang->discount->failsort        = '排序保存失败';
$lang->discount->successupdate   = '更新优惠活动成功';
$lang->discount->failupdate      = '更新优惠活动失败';
$lang->discount->successinsert   = '新增优惠活动成功';
$lang->discount->failinsert      = '新增优惠活动失败';
$lang->discount->successdelete   = '删除优惠活动成功';
$lang->discount->faildelete      = '删除优惠活动失败';
// $lang->slide->noImageSelected = '没有选择图片';
// $lang->slide->suitableSize    = '同一优惠活动中的所有图片尺寸应该保持一致，最佳图片尺寸：1140px X 270px(宽 X 高)';

/* Items for javascript. */
$lang->discount->js = new stdclass();
$lang->discount->js->confirmDelete = '您确定要执行删除操作吗？';
$lang->discount->js->deleteing     = '删除中...';
$lang->discount->js->doing         = '处理中';
$lang->discount->js->timeout       = '网络超时,请重试';
