<?php
defined('_EKU') or die;
/**
 */
$lang = getLang();
$lang->markname = new stdClass();


$lang->markname->common     = '备注名修改';

$lang->markname->groupeditor      = '修改分组';
$lang->markname->remarkeditor     = '修改备注名';
$lang->markname->name             = '备注名';
$lang->markname->certain          = '确定';
$lang->markname->unsubscribetime  = '取消时间';

// $lang->markname->successinsert   = '添加备注名成功';
// $lang->markname->failinsert      = '添加备注名失败';
// $lang->markname->successpublish  = '发布备注名成功';
// $lang->markname->failpublish     = '发布备注名失败';
$lang->markname->successupdate   = '更新备注名成功';
$lang->markname->failupdate      = '更新备注名失败';
// $lang->markname->faildelete      = '删除备注名失败';


/* Items for javascript. */
$lang->markname->js = new stdclass();
$lang->markname->js->confirmDelete = '如果删除一级菜单则关联的二级菜单也会一并被删除，你确定要删除该备注名吗？';
$lang->markname->js->deleteing     = '删除中...';
$lang->markname->js->publishing    = '置顶中...';
$lang->markname->js->doing         = '处理中...';
$lang->markname->js->timeout       = '网络超时,请重试';


