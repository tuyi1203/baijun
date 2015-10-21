<?php
defined('_EKU') or die;
/**
 */
$lang = getLang();
$lang->topimage = new stdClass();

$lang->topimage->common     = '附件';
$lang->topimage->upload     = '上传附件';
$lang->topimage->browse     = '附件列表';
$lang->topimage->download   = '下载附件';
$lang->topimage->edit       = '编辑首页图片';
$lang->topimage->primary    = '封面';
$lang->topimage->setprimary = '设为封面';
$lang->topimage->picture    = '图片';
$lang->topimage->deny       = '禁止';
$lang->topimage->allow      = '允许';
$lang->topimage->toggle     = '切换';
$lang->topimage->label      = '标题：';
$lang->topimage->lblInfo    = '<i>(类型：%s, 大小：%s, 添加于：%s，下载%s次)</i>';
$lang->topimage->limit      = "(<span class='text-danger'>2M以内</span>)";

$lang->topimage->id        = '编号';
$lang->topimage->title     = '标题';
$lang->topimage->pathname  = '存储路径';
$lang->topimage->extension = '类型';
$lang->topimage->size      = '大小';
$lang->topimage->addedBy   = '上传者';
$lang->topimage->addedDate = '上传日期';
$lang->topimage->public    = '匿名下载';
$lang->topimage->downloads = '下载次数';

$lang->topimage->publics[0] = '需要登录';
$lang->topimage->publics[1] = '允许';

$lang->topimage->edittopimage   = '更改附件';

$lang->topimage->errorunwritable = '上传目录不可写，无法上传附件。';


/* Items for javascript. */
$lang->topimage->js = new stdclass();
$lang->topimage->js->confirmDelete = '您确定要执行删除操作吗？';
$lang->topimage->js->deleteing     = '删除中...';
$lang->topimage->js->doing         = '处理中';
$lang->topimage->js->timeout       = '网络超时,请重试';

