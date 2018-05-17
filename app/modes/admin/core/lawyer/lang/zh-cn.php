<?php
defined('_EKU') or die;
/**
 */
$lang = getLang();
$lang->lawyer = new stdClass();


$lang->lawyer->common   = '律师设置';
$lang->lawyer->jigou    = '办公机构';
$lang->lawyer->pinyin   = '拼音首字母';
$lang->lawyer->edit     = '律师编辑';
$lang->lawyer->picture  = '相片';
$lang->lawyer->account  = '用户名';
$lang->lawyer->firstname = '姓';
$lang->lawyer->lastname = '名';
$lang->lawyer->fullname = '全名';
$lang->lawyer->password = '密码';
$lang->lawyer->name     = '姓名';
$lang->lawyer->zhiyelinian  = '执业理念';
$lang->lawyer->touxian  = '头衔';
$lang->lawyer->zhuanye  = '专业领域';
$lang->lawyer->subfield  = '二级专业领域';
$lang->lawyer->zhiyelingyu  = '执业领域';
$lang->lawyer->zhuanyezige  = '专业资格';
$lang->lawyer->daibiaoyeji  = '代表业绩';
$lang->lawyer->daibiaokehu  = '代表客户';
$lang->lawyer->xueshuchengguo  = '学术成果';
$lang->lawyer->zhiwei   = '职位';
$lang->lawyer->qita     = '其他';
$lang->lawyer->tel      = '联系电话';
$lang->lawyer->email     = '电子邮箱';
$lang->lawyer->status   = '首页显示';
$lang->lawyer->desc     = '描述';
$lang->lawyer->createby = '创建人';
$lang->lawyer->pinyinfirst     = '拼音首字母（姓）';
$lang->lawyer->pinyinlast     = '拼音首字母（名）';
$lang->lawyer->rusheshijian  = '入社时间';
$lang->lawyer->worklanguage  = '工作语言';
$lang->lawyer->sort          = '显示排序';
$lang->lawyer->yuanshi       = '原始合伙人';
$lang->lawyer->suozhuren     = '所主任';


// $lang->slide->image    = '图片';
// $lang->slide->url      = '链接';
// $lang->slide->summary  = '摘要';
// $lang->slide->label    = '按钮文字';

$lang->lawyer->createtime = '创建时间';
$lang->lawyer->department = '部门';
$lang->lawyer->zhuanyelingyu = '专业领域';

$lang->lawyer->roleinfo     = '企业管理部：公司简介-发展规划<br/>
                                                                                            人力资源部：人力资源<br/>
                                                                                             办公室：公司简介、政务公开、新闻动态、法律法规、文化建设 及所有发布在网站上的内容的后台审核<br/>
                                                                                             管网规划部：通知公告-水压月报<br/>
                                                                                            管网运行部：通知公告-停水公告、爆管公告<br/>
                                                                                            生产技术部：通知公告-水质公告、用水知识、后台管理<br/>
                                                                                            客户服务部：客户服务、客户互动、在线QQ';

$lang->lawyer->zhuanyezigeinfo = '复数个专业资格之间请用"|"隔开';

$lang->lawyer->sort         = '排序';
$lang->lawyer->savesort     = '保存排序';
$lang->lawyer->create       = '添加律师';

$lang->lawyer->search       = '查找';
$lang->lawyer->searching    = '查找中...';

$lang->lawyer->successsort     = '排序成功保存';
$lang->lawyer->failsort        = '排序保存失败';
$lang->lawyer->successupdate   = '更新律师数据成功';
$lang->lawyer->failupdate      = '更新律师数据失败';
$lang->lawyer->successinsert   = '新增律师数据成功';
$lang->lawyer->failinsert      = '新增律师数据失败';
$lang->lawyer->successdelete   = '删除律师数据成功';
$lang->lawyer->faildelete      = '删除律师数据失败';


/* Items for javascript. */
$lang->lawyer->js = new stdclass();
$lang->lawyer->js->confirmDelete = '您确定要删除该律师数据吗？';
$lang->lawyer->js->deleteing     = '删除中...';
$lang->lawyer->js->doing         = '处理中';
$lang->lawyer->js->timeout       = '网络超时,请重试';
