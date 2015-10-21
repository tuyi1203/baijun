<?php
defined('_EKU') or die;
/**
 */
$lang = getLang();
$lang->album = new stdClass();

$lang->album->photoes = "相片管理";
$lang->album->common  = '相册设置';
$lang->album->sort    = '排序';

$lang->album->edit    = '相册编辑';
$lang->album->add     = '添加相册';
$lang->album->title   = '相册名';
$lang->album->desc    = '描述';
$lang->album->createby= '创建人';
$lang->album->id      = '编号';
$lang->album->homepage= '首页显示';
// $lang->slide->image    = '图片';
// $lang->slide->url      = '链接';
// $lang->slide->summary  = '摘要';
// $lang->slide->label    = '按钮文字';

$lang->album->create     = '添加相册';
$lang->album->albumtype  = '相册类别';
// $lang->slide->edit     = '编辑幻灯片';

$lang->album->successupdate   = '更新相册成功';
$lang->album->failupdate      = '更新相册失败';
$lang->album->successinsert   = '新增相册成功';
$lang->album->failinsert      = '新增相册失败';
$lang->album->successdelete   = '删除相册成功';
$lang->album->faildelete      = '删除相册失败';
// $lang->slide->noImageSelected = '没有选择图片';
// $lang->slide->suitableSize    = '同一幻灯片中的所有图片尺寸应该保持一致，最佳图片尺寸：1140px X 270px(宽 X 高)';

/* Items for javascript. */
$lang->album->js = new stdclass();
$lang->album->js->confirmDelete = '您确定要执行删除操作吗？';
$lang->album->js->deleteing     = '删除中';
$lang->album->js->doing         = '处理中';
$lang->album->js->timeout       = '网络超时,请重试';
