<?php
defined('_EKU') or die;
/**
 */
$lang = getLang();
$lang->book = new stdClass();

$lang->book->photoes = "图片管理";
$lang->book->common  = '百君著述设置';
$lang->book->sort    = '排序';

$lang->book->edit     = '百君著述编辑';
$lang->book->add      = '添加百君著述';
$lang->book->title    = '百君著述名';
$lang->book->subtitle = '百君著述副标题';
$lang->book->desc     = '描述';
$lang->book->summary  = '简介';
$lang->book->author   = '作者';
$lang->book->createby = '创建人';
$lang->book->id       = '编号';
$lang->book->homepage = '首页显示';
$lang->book->publishyear= '发布年份';
$lang->book->content    = '内容';
// $lang->slide->image    = '图片';
// $lang->slide->url      = '链接';
// $lang->slide->summary  = '摘要';
// $lang->slide->label    = '按钮文字';

$lang->book->create     = '添加百君著述';
$lang->book->booktype  = '相册类别';
$lang->book->addauthor  = '添加作者';
$lang->book->noauthor   = '没有作者';
// $lang->slide->edit     = '编辑幻灯片';

$lang->book->successupdate   = '更新百君著述成功';
$lang->book->failupdate      = '更新百君著述失败';
$lang->book->successinsert   = '新增百君著述成功';
$lang->book->failinsert      = '新增百君著述失败';
$lang->book->successdelete   = '删除百君著述成功';
$lang->book->faildelete      = '删除百君著述失败';
// $lang->slide->noImageSelected = '没有选择图片';
// $lang->slide->suitableSize    = '同一幻灯片中的所有图片尺寸应该保持一致，最佳图片尺寸：1140px X 270px(宽 X 高)';

/* Items for javascript. */
$lang->book->js = new stdclass();
$lang->book->js->confirmDelete = '您确定要执行删除操作吗？';
$lang->book->js->deleteing     = '删除中';
$lang->book->js->doing         = '处理中';
$lang->book->js->timeout       = '网络超时,请重试';
