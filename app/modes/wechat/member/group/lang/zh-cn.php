<?php
defined('_EKU') or die;
/**
 */
$lang = getLang();
$lang->group = new stdClass();

$lang->group->title      = '组名';
$lang->group->common     = '分组管理';
$lang->group->add        = '添加分组';
$lang->group->select     = '选择';
$lang->group->name	     = '组名';
$lang->group->selected   = '选中';
$lang->group->num		 = '人数';

$lang->group->groupeditor      = '修改分组';
$lang->group->remarkeditor     = '修改备注名';
$lang->group->subscribetime    = '关注时间';
$lang->group->unsubscribetime  = '取消时间';

$lang->group->successinsert   = '添加分组成功';
$lang->group->failinsert      = '添加分组失败';
$lang->group->successpublish  = '发布分组成功';
$lang->group->failpublish     = '发布分组失败';
$lang->group->successupdate   = '更新分组成功';
$lang->group->failupdate      = '更新分组失败';
$lang->group->faildelete      = '删除分组失败';

$lang->group->error = new stdClass();
$lang->group->error->parentenough     = '不能添加更多的一级菜单';
$lang->group->error->requirereplytype = '需要设置回复类型';
$lang->group->error->notunique        = '组名不可重复';


/* Items for javascript. */
$lang->group->js = new stdclass();
$lang->group->js->confirmDelete = '如果删除分组则该分组下所有成员都会变成未分类，你确定要删除该分组吗？';
$lang->group->js->deleteing     = '删除中...';
$lang->group->js->publishing    = '置顶中...';
$lang->group->js->doing         = '处理中...';
$lang->group->js->timeout       = '网络超时,请重试';


