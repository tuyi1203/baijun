<?php
defined('_EKU') or die;
/**
 */
$lang = getLang();
$lang->coreteam = new stdClass();


$lang->coreteam->common   = '专业团队设置';
$lang->coreteam->edit     = '专业团队顶部Banner编辑';
$lang->coreteam->picture  = '图片';
$lang->coreteam->link     = '链接分类名称';
$lang->coreteam->filesize = '1440 X 416';

$lang->coreteam->buttom   = '底部信息';
$lang->coreteam->watermark= '水印添加';
$lang->coreteam->content  = '内容图片';

$lang->coreteam->successsort     = '排序成功保存';
$lang->coreteam->failsort        = '排序保存失败';
$lang->coreteam->successupdate   = '更新专业团队顶部Banner成功';
$lang->coreteam->failupdate      = '更新专业团队顶部Banner失败';
// $lang->slide->noImageSelected = '没有选择图片';
// $lang->slide->suitableSize    = '同一站点中的所有图片尺寸应该保持一致，最佳图片尺寸：1140px X 270px(宽 X 高)';

/* Items for javascript. */
$lang->coreteam->js = new stdclass();
$lang->coreteam->js->confirmDelete = '您确定要执行删除操作吗？';
$lang->coreteam->js->deleteing     = '删除中...';
$lang->coreteam->js->doing         = '处理中';
$lang->coreteam->js->timeout       = '网络超时,请重试';
