<?php
defined('_EKU') or die;
/**
 */
$lang = getLang();
$lang->promise = new stdClass();


$lang->promise->common   = '服务承诺设置';
$lang->promise->title    = '标题';
$lang->promise->keyword  = '关键字';
$lang->promise->summary  = '摘要';
$lang->promise->content  = '内容';
$lang->promise->edit     = '服务承诺编辑';
$lang->promise->picture  = '图片';
$lang->promise->link     = '链接';
$lang->promise->buttom   = '底部信息';
$lang->promise->desc     = '描述';
// $lang->slide->image    = '图片';
// $lang->slide->url      = '链接';
// $lang->slide->summary  = '摘要';
// $lang->slide->label    = '按钮文字';

$lang->promise->sort         = '排序';
$lang->promise->savesort     = '保存排序';
$lang->promise->create       = '添加服务承诺';
$lang->promise->modulechoose = '选择一级模块';
$lang->promise->modechoose   = '选择模式';

$lang->promise->successsort     = '排序成功保存';
$lang->promise->failsort        = '排序保存失败';
$lang->promise->successupdate   = '更新服务承诺成功';
$lang->promise->failupdate      = '更新服务承诺失败';
// $lang->slide->noImageSelected = '没有选择图片';
// $lang->slide->suitableSize    = '同一服务承诺中的所有图片尺寸应该保持一致，最佳图片尺寸：1140px X 270px(宽 X 高)';

/* Items for javascript. */
$lang->promise->js = new stdclass();
$lang->promise->js->confirmDelete = '您确定要执行删除操作吗？';
$lang->promise->js->deleteing     = '删除中...';
$lang->promise->js->doing         = '处理中';
$lang->promise->js->timeout       = '网络超时,请重试';
