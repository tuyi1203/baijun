<?php
defined('_EKU') or die;
/**
 */
$lang = getLang();
$lang->chatfile = new stdClass();

$lang->chatfile->common     = '附件';
$lang->chatfile->upload     = '上传附件';
$lang->chatfile->browse     = '文件';
$lang->chatfile->download   = '下载附件';
$lang->chatfile->edit       = '编辑';
$lang->chatfile->primary    = '封面';
$lang->chatfile->setprimary = '设为封面';
$lang->chatfile->deny       = '禁止';
$lang->chatfile->allow      = '允许';
$lang->chatfile->toggle     = '切换';
$lang->chatfile->label      = '标题：';
$lang->chatfile->list       = '文件列表';
$lang->chatfile->new        = '新图片';
$lang->chatfile->lblInfo    = '<i>(类型：%s, 大小：%s, 添加于：%s，下载%s次)</i>';
$lang->chatfile->limit      = "(<span class='text-danger'>2M以内</span>)";
$lang->chatfile->addImage   = '添加新图片';
$lang->chatfile->certain    = '确定';

$lang->chatfile->uploadimageinfo  = '大小不超过1M，格式：JPG';

$lang->chatfile->id        = '编号';
$lang->chatfile->title     = '标题';
$lang->chatfile->pathname  = '存储路径';
$lang->chatfile->extension = '类型';
$lang->chatfile->size      = '大小';
$lang->chatfile->addedBy   = '上传者';
$lang->chatfile->addedDate = '上传日期';
$lang->chatfile->public    = '匿名下载';
$lang->chatfile->downloads = '下载次数';

$lang->chatfile->publics[0] = '需要登录';
$lang->chatfile->publics[1] = '允许';

$lang->chatfile->edit       = '编辑';
$lang->chatfile->unsafe     = '安装性验证失败';
$lang->chatfile->editchatfile   = '更改附件';

$lang->chatfile->errorunwritable = '上传目录不可写，无法上传附件。';


/* Items for javascript. */
$lang->chatfile->js = new stdclass();
$lang->chatfile->js->confirmDelete = '您确定要执行删除操作吗？';
$lang->chatfile->js->deleteing     = '删除中...';
$lang->chatfile->js->doing         = '处理中';
$lang->chatfile->js->timeout       = '网络超时,请重试';

