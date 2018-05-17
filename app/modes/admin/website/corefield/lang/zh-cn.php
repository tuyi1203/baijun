<?php
defined('_EKU') or die;
/**
 */
$lang = getLang();
$lang->corefield = new stdClass();


$lang->corefield->common   = '专业领域设置';
$lang->corefield->edit     = '专业领域顶部Banner编辑';
$lang->corefield->picture  = '图片';
$lang->corefield->link     = '链接分类名称';
$lang->corefield->filesize = '1440 X 416';

$lang->corefield->buttom   = '底部信息';
$lang->corefield->watermark= '水印添加';
$lang->corefield->content  = '内容图片';

$lang->corefield->successsort     = '排序成功保存';
$lang->corefield->failsort        = '排序保存失败';
$lang->corefield->successupdate   = '更新专业领域顶部Banner成功';
$lang->corefield->failupdate      = '更新专业领域顶部Banner失败';
// $lang->slide->noImageSelected = '没有选择图片';
// $lang->slide->suitableSize    = '同一站点中的所有图片尺寸应该保持一致，最佳图片尺寸：1140px X 270px(宽 X 高)';

/* Items for javascript. */
$lang->corefield->js = new stdclass();
$lang->corefield->js->confirmDelete = '您确定要执行删除操作吗？';
$lang->corefield->js->deleteing     = '删除中...';
$lang->corefield->js->doing         = '处理中';
$lang->corefield->js->timeout       = '网络超时,请重试';
