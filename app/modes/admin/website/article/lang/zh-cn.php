<?php
defined('_EKU') or die;
/**
 */
$lang = getLang();
$lang->article = new stdClass();


$lang->article->common   = '资讯中心设置';
$lang->article->edit     = '资讯中心顶部Banner编辑';
$lang->article->picture  = '图片';
$lang->article->link     = '链接分类名称';
$lang->article->filesize = '1440 X 416';

$lang->article->buttom   = '底部信息';
$lang->article->watermark= '水印添加';
$lang->article->content  = '内容图片';

$lang->article->successsort     = '排序成功保存';
$lang->article->failsort        = '排序保存失败';
$lang->article->successupdate   = '更新资讯中心顶部Banner成功';
$lang->article->failupdate      = '更新资讯中心顶部Banner失败';
// $lang->slide->noImageSelected = '没有选择图片';
// $lang->slide->suitableSize    = '同一站点中的所有图片尺寸应该保持一致，最佳图片尺寸：1140px X 270px(宽 X 高)';

/* Items for javascript. */
$lang->article->js = new stdclass();
$lang->article->js->confirmDelete = '您确定要执行删除操作吗？';
$lang->article->js->deleteing     = '删除中...';
$lang->article->js->doing         = '处理中';
$lang->article->js->timeout       = '网络超时,请重试';
