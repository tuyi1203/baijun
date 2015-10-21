<?php
defined('_EKU') or die;

$lang = getLang();
$lang->claim = new stdClass();
$lang->claim->name 	    = "姓名";
$lang->claim->cardno 	= "用户号";
$lang->claim->tel  	    = "联系电话";
$lang->claim->email  	= "电子邮箱";
$lang->claim->addr  	= "联系地址";
$lang->claim->captcha	= "验证码";
$lang->claim->content   = "意见描述";
$lang->claim->submit	= "提交留言";


$lang->claim->successinsert = '留言提交成功';
$lang->claim->failinsert    = '留言提交失败';