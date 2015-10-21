<?php
defined('_EKU') or die;
/**
 */
$lang = getLang();
$lang->booking = new stdClass();


$lang->booking->common  = '预约列表';
$lang->booking->edit    = '编辑';
$lang->booking->tel     = "联系电话";
$lang->booking->content = "所属小区";
$lang->booking->content2= "预约详情";

$lang->booking->public    = "审核";

$lang->booking->name    = '客户姓名';
$lang->booking->createby= '创建人';
$lang->booking->id         = '编号';
$lang->booking->title      = '标题';
$lang->booking->alias      = '别名';
$lang->booking->original   = '来源';
$lang->booking->copySite   = '来源网站';
$lang->booking->copyURL    = '来源URL';
$lang->booking->keyword    = '关键字';
$lang->booking->summary    = '摘要';
$lang->booking->author     = '作者';
$lang->booking->editor     = '编辑';
$lang->booking->publishtime= '发布时间';
$lang->booking->editedDate = '编辑时间';
$lang->booking->status     = '状态';
$lang->booking->type       = '类型';
$lang->booking->views      = '阅读';
$lang->booking->publish    = '审核状态';
$lang->booking->comments   = '评论';
$lang->booking->stick      = '置顶级别';
$lang->booking->order      = '排序';
$lang->booking->published  = '已审核';
$lang->booking->unpublished= '未审核';
$lang->booking->createtime = "发布时间";
// $lang->slide->image    = '图片';
// $lang->slide->url      = '链接';
// $lang->slide->summary  = '摘要';
// $lang->slide->label    = '按钮文字';


$lang->booking->publicstatus = "审核状态";
$lang->booking->modechoose = '选择模式';
// $lang->slide->admin    = '幻灯片设置';
$lang->booking->edit       = '编辑预约';
$lang->booking->create     = '添加预约';
// $lang->slide->edit     = '编辑幻灯片';

$lang->booking->successinsert   = '添加预约成功';
$lang->booking->successupdate   = '更新预约成功';
$lang->booking->failupdate      = '更新预约失败';
// $lang->booking->successdelete   = '删除预约成功';
$lang->booking->faildelete      = '删除预约失败';
$lang->booking->failpublish     = '审核失败';
// $lang->slide->noImageSelected = '没有选择图片';
// $lang->slide->suitableSize    = '同一幻灯片中的所有图片尺寸应该保持一致，最佳图片尺寸：1140px X 270px(宽 X 高)';

/* Items for javascript. */
$lang->booking->js = new stdclass();
$lang->booking->js->confirmDelete = '你确定要删除该预约吗？';
$lang->booking->js->confirmPublic = '你确定要通过对此预约的审核吗？';
$lang->booking->js->deleteing     = '删除中';
$lang->booking->js->publishing    = '发布中...';
$lang->booking->js->doing         = '处理中';
$lang->booking->js->timeout       = '网络超时,请重试';


