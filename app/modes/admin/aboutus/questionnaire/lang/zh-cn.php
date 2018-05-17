<?php
defined('_EKU') or die;
/**
 */
$lang = getLang();
$lang->questionnaire = new stdClass();


$lang->questionnaire->common  = '问卷调查列表';
$lang->questionnaire->edit    = '编辑';
$lang->questionnaire->name    = '名称';
$lang->questionnaire->createby= '创建人';
$lang->questionnaire->id         = '编号';
$lang->questionnaire->category   = '类目';
$lang->questionnaire->categories = '类目';
$lang->questionnaire->title      = '标题';
$lang->questionnaire->alias      = '别名';
$lang->questionnaire->content    = '说明';
$lang->questionnaire->original   = '来源';
$lang->questionnaire->copySite   = '来源网站';
$lang->questionnaire->copyURL    = '来源URL';
$lang->questionnaire->keyword    = '关键字';
$lang->questionnaire->summary    = '摘要';
$lang->questionnaire->author     = '作者';
$lang->questionnaire->editor     = '编辑';
$lang->questionnaire->publishtime= '发布时间';
$lang->questionnaire->editedDate = '编辑时间';
$lang->questionnaire->status     = '状态';
$lang->questionnaire->type       = '类型';
$lang->questionnaire->views      = '阅读';
$lang->questionnaire->publish    = '审核状态';
$lang->questionnaire->comments   = '评论';
$lang->questionnaire->stick      = '置顶级别';
$lang->questionnaire->order      = '排序';
$lang->questionnaire->published  = '已审核';
$lang->questionnaire->unpublished= '未审核';
$lang->questionnaire->starttime  = '开始时间';
$lang->questionnaire->endtime    = '结束时间';
$lang->questionnaire->join       = '参与人数';
$lang->questionnaire->notyet     = '未开始';
$lang->questionnaire->starting   = '进行中';
$lang->questionnaire->ended      = '已结束';
$lang->questionnaire->confirm    = '统计数据';
$lang->questionnaire->mutiok     = '允许多选';
$lang->questionnaire->question   = '问题';
$lang->questionnaire->option     = '选项';
$lang->questionnaire->addoption  = '添加一个选项';
$lang->questionnaire->addquestion= '添加一个题目';
$lang->questionnaire->selected   = '选择人数';

// $lang->slide->image    = '图片';
// $lang->slide->url      = '链接';
// $lang->slide->summary  = '摘要';
// $lang->slide->label    = '按钮文字';

$lang->questionnaire->modechoose = '选择模式';
// $lang->slide->admin    = '幻灯片设置';
$lang->questionnaire->edit       = '编辑问卷调查';
$lang->questionnaire->create     = '添加问卷调查';
$lang->questionnaire->questionnotitle = "请输入问题的内容";
$lang->questionnaire->optionnotitle   = "请输入选项的内容";
// $lang->slide->edit     = '编辑幻灯片';

$lang->questionnaire->successinsert   = '添加问卷调查成功';
$lang->questionnaire->successupdate   = '更新问卷调查成功';
$lang->questionnaire->failupdate      = '更新问卷调查失败';
// $lang->questionnaire->successdelete   = '删除问卷调查成功';
$lang->questionnaire->faildelete      = '删除问卷调查失败';
$lang->questionnaire->failpublish     = '审核失败';
// $lang->slide->noImageSelected = '没有选择图片';
// $lang->slide->suitableSize    = '同一幻灯片中的所有图片尺寸应该保持一致，最佳图片尺寸：1140px X 270px(宽 X 高)';

/* Items for javascript. */
$lang->questionnaire->js = new stdclass();
$lang->questionnaire->js->confirmDelete = '你确定要删除该问卷调查吗？';
$lang->questionnaire->js->confirmPublic = '你确定要通过对此问卷调查的审核吗？';
$lang->questionnaire->js->deleteing     = '删除中';
$lang->questionnaire->js->publishing    = '发布中...';
$lang->questionnaire->js->doing         = '处理中';
$lang->questionnaire->js->timeout       = '网络超时,请重试';


