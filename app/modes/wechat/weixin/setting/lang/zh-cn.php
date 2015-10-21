<?php
defined('_EKU') or die;
/**
 */
$lang = getLang();
$lang->setting = new stdClass();


$lang->setting->common     = '微信设置';
$lang->setting->name       = '微信公众号名称';
$lang->setting->oid        = '微信公众号原始ID';
$lang->setting->appid      = 'AppId(应用ID)';
$lang->setting->appsecret  = 'AppSecret(应用密钥)';
$lang->setting->token      = 'Token(令牌)';
$lang->setting->url        = 'URL(响应服务器地址)';
$lang->setting->picture    = '公众号头像';


$lang->setting->copy       = '复制';
$lang->setting->create     = '添加微信设置';

$lang->setting->successinsert   = '添加微信设置成功';
$lang->setting->successupdate   = '更新微信设置成功';
$lang->setting->failupdate      = '更新微信设置失败';
$lang->setting->failpullmember  = '拉取用户信息失败';
// $lang->setting->successdelete   = '删除微信设置成功';
$lang->setting->faildelete      = '删除微信设置失败';
$lang->setting->failuploadimage = '头像上传失败';
$lang->setting->failstick       = '置顶失败';

/* Items for javascript. */
$lang->setting->js = new stdclass();
$lang->setting->js->confirmDelete = '你确定要删除该微信设置吗？';
$lang->setting->js->confirmPublic = '你确定要置顶该微信设置吗？';
$lang->setting->js->deleteing     = '删除中';
$lang->setting->js->publishing    = '置顶中...';
$lang->setting->js->doing         = '处理中';
$lang->setting->js->timeout       = '网络超时,请重试';


