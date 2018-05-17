<?php
defined('_EKU') or die;
/**
 */
$lang = getLang();
$lang->file = new stdClass();

$lang->file->common     = '附件';
$lang->file->upload     = '上传附件';
$lang->file->browse     = '附件列表';
$lang->file->download   = '下载附件';
$lang->file->edit       = '编辑';
$lang->file->primary    = '封面';
$lang->file->setprimary = '设为封面';
$lang->file->banner     = 'Banner';
$lang->file->setbanner  = '设为Banner';
$lang->file->deny       = '禁止';
$lang->file->allow      = '允许';
$lang->file->toggle     = '切换';
$lang->file->label      = '标题：';
$lang->file->desc       = '描述';
$lang->file->lblInfo    = '<i>(类型：%s, 大小：%s, 添加于：%s，下载%s次)</i>';
$lang->file->limit      = "(<span class='text-danger'>2M以内</span>)";


$lang->file->id        = '编号';
$lang->file->title     = '标题';
$lang->file->pathname  = '存储路径';
$lang->file->extension = '类型';
$lang->file->size      = '大小';
$lang->file->filesize    = '文件尺寸：';
$lang->file->bannersize  = 'Banner尺寸：';
$lang->file->addedBy   = '上传者';
$lang->file->addedDate = '上传日期';
$lang->file->public    = '匿名下载';
$lang->file->downloads = '下载次数';

$lang->file->publics[0] = '需要登录';
$lang->file->publics[1] = '允许';

$lang->file->edit       = '编辑';
$lang->file->editfile   = '更改附件';

$lang->file->errorunwritable = '上传目录不可写，无法上传附件。';



/* Items for javascript. */
$lang->file->js = new stdclass();
$lang->file->js->confirmDelete = '您确定要执行删除操作吗？';
$lang->file->js->deleteing     = '删除中...';
$lang->file->js->doing         = '处理中';
$lang->file->js->timeout       = '网络超时,请重试';

