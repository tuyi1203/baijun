<?php
defined('_EKU') or die;
/**
 */
$lang = getLang();
$lang->person = new stdClass();


$lang->person->common   = '设计师管理';
$lang->person->edit     = '设计师编辑';
$lang->person->picture  = '头像';
$lang->person->name     = '姓名';
$lang->person->school   = '毕业学校';
$lang->person->style    = '设计风格';
$lang->person->ideal    = '设计理念';
$lang->person->resume   = '个人履历';
$lang->person->level    = '设计级别';
$lang->person->team     = '所属团队';
$lang->person->homepage = '首页显示';
$lang->person->goodat   = '擅长风格';


$lang->person->title    = '头衔';
$lang->person->status   = '首页显示';
$lang->person->desc     = '描述';
$lang->person->type     = '专家类别';

$lang->person->production   = '代表作品';

$lang->person->createtime = '创建时间';


$lang->person->sort         = '排序';
$lang->person->hot          = '人气度';
$lang->person->savesort     = '保存排序';
$lang->person->create       = '添加设计师';

$lang->person->search       = '查找';
$lang->person->searching    = '查找中...';

$lang->person->successsort     = '排序成功保存';
$lang->person->failsort        = '排序保存失败';
$lang->person->successupdate   = '更新设计师成功';
$lang->person->failupdate      = '更新设计师失败';
$lang->person->successinsert   = '新增设计师成功';
$lang->person->failinsert      = '新增设计师失败';
$lang->person->successdelete   = '删除设计师成功';
$lang->person->faildelete      = '删除设计师失败';


/* Items for javascript. */
$lang->person->js = new stdclass();
$lang->person->js->confirmDelete = '您确定要执行删除操作吗？';
$lang->person->js->deleteing     = '删除中...';
$lang->person->js->doing         = '处理中';
$lang->person->js->timeout       = '网络超时,请重试';
