<?php
defined('_EKU') or die;
/**
 */
$lang = getLang();
$lang->contact = new stdClass();


$lang->contact->common   = '联系我们设置';
$lang->contact->title    = '标题';
$lang->contact->keyword  = '关键字';
$lang->contact->summary  = '摘要';
$lang->contact->content  = '内容';
$lang->contact->edit     = '联系我们编辑';
$lang->contact->picture  = '图片';
$lang->contact->link     = '链接';
$lang->contact->buttom   = '底部信息';
$lang->contact->desc     = '描述';
// $lang->slide->image    = '图片';
// $lang->slide->url      = '链接';
// $lang->slide->summary  = '摘要';
// $lang->slide->label    = '按钮文字';

$lang->contact->sort         = '排序';
$lang->contact->savesort     = '保存排序';
$lang->contact->create       = '添加联系我们';
$lang->contact->modulechoose = '选择一级模块';
$lang->contact->modechoose   = '选择模式';

$lang->contact->successsort     = '排序成功保存';
$lang->contact->failsort        = '排序保存失败';
$lang->contact->successupdate   = '更新联系我们成功';
$lang->contact->failupdate      = '更新联系我们失败';
// $lang->slide->noImageSelected = '没有选择图片';
// $lang->slide->suitableSize    = '同一联系我们中的所有图片尺寸应该保持一致，最佳图片尺寸：1140px X 270px(宽 X 高)';

/* Items for javascript. */
$lang->contact->js = new stdclass();
$lang->contact->js->confirmDelete = '您确定要执行删除操作吗？';
$lang->contact->js->deleteing     = '删除中...';
$lang->contact->js->doing         = '处理中';
$lang->contact->js->timeout       = '网络超时,请重试';
