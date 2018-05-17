<?php
defined('_EKU') or die;
/**
 */
$lang = getLang();
$lang->service = new stdClass();


$lang->service->common   = '沟通与服务设置';
$lang->service->edit     = '沟通与服务顶部Banner编辑';
$lang->service->picture  = '图片';
$lang->service->link     = '链接分类名称';
$lang->service->filesize = '1440 X 416';

$lang->service->buttom   = '底部信息';
$lang->service->watermark= '水印添加';
$lang->service->content  = '内容图片';

$lang->service->successsort     = '排序成功保存';
$lang->service->failsort        = '排序保存失败';
$lang->service->successupdate   = '更新沟通与服务顶部Banner成功';
$lang->service->failupdate      = '更新沟通与服务顶部Banner失败';
// $lang->slide->noImageSelected = '没有选择图片';
// $lang->slide->suitableSize    = '同一站点中的所有图片尺寸应该保持一致，最佳图片尺寸：1140px X 270px(宽 X 高)';

/* Items for javascript. */
$lang->service->js = new stdclass();
$lang->service->js->confirmDelete = '您确定要执行删除操作吗？';
$lang->service->js->deleteing     = '删除中...';
$lang->service->js->doing         = '处理中';
$lang->service->js->timeout       = '网络超时,请重试';
