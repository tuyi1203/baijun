<?php
defined('_EKU') or die;
/**
 */
$lang = getLang();
$lang->first = new stdClass();


$lang->first->common  	 = '一级模块设置';
$lang->first->edit    	 = '一级模块编辑';
$lang->first->add    	 = '一级模块编辑';
$lang->first->mode    	 = '模式';
$lang->first->name   	 = '名称';
$lang->first->des     	 = '描述';
$lang->first->des_en  	 = '英文描述';
$lang->first->status  	 = '状态';
$lang->first->ctrstatus  = '可控状态';
$lang->first->menu		 = '菜单显示';
$lang->first->createby	 = '创建人';
// $lang->slide->image    = '图片';
// $lang->slide->url      = '链接';
// $lang->slide->summary  = '摘要';
// $lang->slide->label    = '按钮文字';

$lang->first->sort       = '排序';
$lang->first->savesort   = '保存排序';
$lang->first->modechoose = '选择模式';
// $lang->slide->admin    = '幻灯片设置';
$lang->first->create     = '添加一级模块';
// $lang->slide->edit     = '编辑幻灯片';

$lang->first->successsort     = '排序成功保存';
$lang->first->failsort        = '排序保存失败';
$lang->first->successupdate   = '更新一级模块成功';
$lang->first->failupdate      = '更新一级模块失败';
$lang->first->successinsert   = '新增一级模块成功';
$lang->first->failinsert      = '新增一级模块失败';
$lang->first->successdelete   = '删除一级模块成功';
$lang->first->faildelete      = '删除一级模块失败';
// $lang->slide->noImageSelected = '没有选择图片';
// $lang->slide->suitableSize    = '同一幻灯片中的所有图片尺寸应该保持一致，最佳图片尺寸：1140px X 270px(宽 X 高)';

/* Items for javascript. */
$lang->first->js = new stdclass();
$lang->first->js->confirmDelete = '警告！！删除一级模块时，将删除一级模块下关联的所有子模块，您确定要执行删除操作吗？';
$lang->first->js->deleteing     = '删除中';
$lang->first->js->doing         = '处理中';
$lang->first->js->timeout       = '网络超时,请重试';
