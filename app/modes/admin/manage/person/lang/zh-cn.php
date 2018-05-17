<?php
defined('_EKU') or die;
/**
 */
$lang = getLang();
$lang->person = new stdClass();


$lang->person->common   = '人员设置';
$lang->person->role     = '部门';
$lang->person->edit     = '人员编辑';
$lang->person->picture  = '头像';
$lang->person->account  = '用户名';
$lang->person->password = '密码';
$lang->person->name     = '姓名';
$lang->person->title    = '头衔';
$lang->person->status   = '首页显示';
$lang->person->desc     = '描述';
$lang->person->type     = '专家类别';
$lang->person->createby = '创建人';
$lang->person->content  = '详细描述';
$lang->person->content2 = '擅长疾病';
$lang->person->content3 = '其他描述';
$lang->person->action   = '功能选择';
$lang->person->booking  = '预约';
$lang->person->team     = '团队';
$lang->person->lock     = '锁定';


// $lang->slide->image    = '图片';
// $lang->slide->url      = '链接';
// $lang->slide->summary  = '摘要';
// $lang->slide->label    = '按钮文字';

$lang->person->createtime = '创建时间';
$lang->person->department = '科室';

$lang->person->roleinfo     = '';

$lang->person->sort         = '排序';
$lang->person->savesort     = '保存排序';
$lang->person->create       = '添加人员';

$lang->person->search       = '查找';
$lang->person->searching    = '查找中...';

$lang->person->successsort     = '排序成功保存';
$lang->person->failsort        = '排序保存失败';
$lang->person->successupdate   = '更新人员成功';
$lang->person->failupdate      = '更新人员失败';
$lang->person->successinsert   = '新增人员成功';
$lang->person->failinsert      = '新增人员失败';
$lang->person->successdelete   = '删除人员成功';
$lang->person->faildelete      = '删除人员失败';


/* Items for javascript. */
$lang->person->js = new stdclass();
$lang->person->js->confirmDelete = '您确定要执行删除操作吗？';
$lang->person->js->deleteing     = '删除中...';
$lang->person->js->doing         = '处理中';
$lang->person->js->timeout       = '网络超时,请重试';
