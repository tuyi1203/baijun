<?php
defined('_EKU') or die;
/**
 */
$lang = getLang();
$lang->duty = new stdClass();


$lang->duty->common   = '社会责任设置';
$lang->duty->title    = '标题';
$lang->duty->keyword  = '关键字';
$lang->duty->summary  = '摘要';
$lang->duty->content  = '内容';
$lang->duty->edit     = '社会责任编辑';
$lang->duty->picture  = '图片';
$lang->duty->link     = '链接';
$lang->duty->buttom   = '底部信息';
$lang->duty->desc     = '描述';
// $lang->slide->image    = '图片';
// $lang->slide->url      = '链接';
// $lang->slide->summary  = '摘要';
// $lang->slide->label    = '按钮文字';

$lang->duty->sort         = '排序';
$lang->duty->savesort     = '保存排序';
$lang->duty->create       = '添加社会责任';
$lang->duty->modulechoose = '选择一级模块';
$lang->duty->modechoose   = '选择模式';

$lang->duty->successsort     = '排序成功保存';
$lang->duty->failsort        = '排序保存失败';
$lang->duty->successupdate   = '更新社会责任成功';
$lang->duty->failupdate      = '更新社会责任失败';
// $lang->slide->noImageSelected = '没有选择图片';
// $lang->slide->suitableSize    = '同一社会责任中的所有图片尺寸应该保持一致，最佳图片尺寸：1140px X 270px(宽 X 高)';

/* Items for javascript. */
$lang->duty->js = new stdclass();
$lang->duty->js->confirmDelete = '您确定要执行删除操作吗？';
$lang->duty->js->deleteing     = '删除中...';
$lang->duty->js->doing         = '处理中';
$lang->duty->js->timeout       = '网络超时,请重试';
