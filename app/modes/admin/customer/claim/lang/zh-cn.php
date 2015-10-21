<?php
defined('_EKU') or die;
/**
 */
$lang = getLang();
$lang->claim = new stdClass();


$lang->claim->common  = '意见投诉列表';
$lang->claim->edit    = '回复';
$lang->claim->tel     = "联系电话";
$lang->claim->content = "投诉内容";
$lang->claim->confirm = '留言确认';


$lang->claim->public    = "审核";
$lang->claim->name      = '客户姓名';
$lang->claim->createby  = '创建人';

$lang->claim->id         = '编号';
$lang->claim->title      = '标题';
$lang->claim->alias      = '别名';
$lang->claim->original   = '来源';
$lang->claim->copySite   = '来源网站';
$lang->claim->copyURL    = '来源URL';
$lang->claim->keyword    = '关键字';
$lang->claim->summary    = '摘要';
$lang->claim->author     = '作者';
$lang->claim->editor     = '回复';
$lang->claim->publishtime= '发布时间';
$lang->claim->editedDate = '回复时间';
$lang->claim->status     = '状态';
$lang->claim->type       = '类型';
$lang->claim->views      = '阅读';
$lang->claim->publish    = '审核状态';
$lang->claim->replyman   = '回复人';
$lang->claim->comments   = '评论';
$lang->claim->stick      = '置顶级别';
$lang->claim->order      = '排序';
$lang->claim->published  = '审核';
$lang->claim->unpublished= '未审核';
$lang->claim->createtime = "留言时间";
$lang->claim->cardno     = '用户号';
$lang->claim->email      = '邮件地址';
$lang->claim->addr       = '联系地址';
// $lang->slide->image    = '图片';
// $lang->slide->url      = '链接';
// $lang->slide->summary  = '摘要';
// $lang->slide->label    = '按钮文字';

$lang->claim->replycontent = "回复内容";
$lang->claim->publicstatus = "审核状态";
$lang->claim->modechoose   = '选择模式';
// $lang->slide->admin    = '幻灯片设置';
$lang->claim->edit         = '回复意见投诉';
$lang->claim->create       = '添加意见投诉';
// $lang->slide->edit     = '回复幻灯片';

$lang->claim->successinsert   = '添加意见投诉成功';
$lang->claim->successupdate   = '回复意见投诉成功';
$lang->claim->failupdate      = '回复意见投诉失败';
// $lang->claim->successdelete   = '删除意见投诉成功';
$lang->claim->faildelete      = '删除意见投诉失败';
$lang->claim->failpublish     = '审核失败';
// $lang->slide->noImageSelected = '没有选择图片';
// $lang->slide->suitableSize    = '同一幻灯片中的所有图片尺寸应该保持一致，最佳图片尺寸：1140px X 270px(宽 X 高)';

/* Items for javascript. */
$lang->claim->js = new stdclass();
$lang->claim->js->confirmDelete = '你确定要删除该意见投诉吗？';
$lang->claim->js->confirmPublic = '你确定修改此意见投诉的审核状态吗？';
$lang->claim->js->deleteing     = '删除中';
$lang->claim->js->publishing    = '发布中...';
$lang->claim->js->doing         = '处理中';
$lang->claim->js->timeout       = '网络超时,请重试';


