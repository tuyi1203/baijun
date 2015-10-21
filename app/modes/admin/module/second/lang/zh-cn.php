<?php
defined('_EKU') or die;
/**
 */
$lang = getLang();
$lang->second = new stdClass();


$lang->second->common  = '二级模块设置';
$lang->second->edit    = '二级模块编辑';
$lang->second->plus    = '二级模块添加';
$lang->second->mode    = '模式';
$lang->second->name    = '名称';
$lang->second->des     = '描述';
$lang->second->des_en  = '英文描述';
$lang->second->status  = '状态';
$lang->second->createby= '创建人';
$lang->second->pmodule = '一级模块';
$lang->second->parentid= '一级模块';

$lang->second->ctrstatus  = '可控状态';
$lang->second->menu		 = '菜单显示';
// $lang->slide->image    = '图片';
// $lang->slide->url      = '链接';
// $lang->slide->summary  = '摘要';
// $lang->slide->label    = '按钮文字';

$lang->second->sort         = '排序';
$lang->second->savesort     = '保存排序';
// $lang->slide->admin      = '幻灯片设置';
$lang->second->create       = '添加二级模块';
$lang->second->modulechoose = '选择一级模块';
$lang->second->modechoose   = '选择模式';
// $lang->slide->edit       = '编辑幻灯片';

$lang->second->successsort     = '排序成功保存';
$lang->second->failsort        = '排序保存失败';
$lang->second->successupdate   = '更新二级模块成功';
$lang->second->failupdate      = '更新二级模块失败';
$lang->second->successinsert   = '新增二级模块成功';
$lang->second->failinsert      = '新增二级模块失败';
$lang->second->successdelete   = '删除二级模块成功';
$lang->second->faildelete      = '删除二级模块失败';
// $lang->slide->noImageSelected = '没有选择图片';
// $lang->slide->suitableSize    = '同一幻灯片中的所有图片尺寸应该保持一致，最佳图片尺寸：1140px X 270px(宽 X 高)';

/* Items for javascript. */
$lang->second->js = new stdclass();
$lang->second->js->confirmDelete = '警告！！删除二级模块时，将删除二级模块下关联的所有子模块，您确定要执行删除操作吗？';
$lang->second->js->deleteing     = '删除中';
$lang->second->js->doing         = '处理中';
$lang->second->js->timeout       = '网络超时,请重试';
