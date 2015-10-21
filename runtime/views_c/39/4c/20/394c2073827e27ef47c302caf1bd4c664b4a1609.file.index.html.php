<?php /* Smarty version Smarty-3.1.6, created on 2015-10-10 12:02:47
         compiled from "D:\xampp\htdocs\baijun\app\modes\admin\system\login\default\index.html" */ ?>
<?php /*%%SmartyHeaderCode:2264156188de7c25ca2-29847863%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '394c2073827e27ef47c302caf1bd4c664b4a1609' => 
    array (
      0 => 'D:\\xampp\\htdocs\\baijun\\app\\modes\\admin\\system\\login\\default\\index.html',
      1 => 1425189735,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2264156188de7c25ca2-29847863',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'ERRMSG' => 0,
    'NOTICE' => 0,
    'USER_NAME_VALUE' => 0,
    'PASS_WORD_VALUE' => 0,
    'captcha_enable' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.6',
  'unifunc' => 'content_56188de7ca3c7',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_56188de7ca3c7')) {function content_56188de7ca3c7($_smarty_tpl) {?><!DOCTYPE html>
<!--[if IE 8]>
    <html xmlns="http://www.w3.org/1999/xhtml" class="ie8" lang="zh-CN">
<![endif]-->
<!--[if !(IE 8) ]><!-->
    <html xmlns="http://www.w3.org/1999/xhtml" lang="zh-CN">
<!--<![endif]-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>{:C('SITENAME')} &rsaquo; 登录</title>
<link rel='stylesheet' id='buttons-css'  href="{:T('css/buttons.min.css')}?ver=2.0" type='text/css' media='all' />
<link rel='stylesheet' id='login-css'  href="{:T('css/login.min.css')}?ver=4.0.1" type='text/css' media='all' />
<meta name='robots' content='noindex,follow' />
<?php if (isset($_smarty_tpl->tpl_vars['ERRMSG']->value['GLOBAL'])){?>
<script type="text/javascript">
addLoadEvent = function(func){if(typeof jQuery!="undefined")jQuery(document).ready(func);else if(typeof wpOnload!='function'){wpOnload=func;}else{var oldonload=wpOnload;wpOnload=function(){oldonload();func();}}};
function s(id,pos){g(id).left=pos+'px';}
function g(id){return document.getElementById(id).style;}
function shake(id,a,d){c=a.shift();s(id,c);if(a.length>0){setTimeout(function(){shake(id,a,d);},d);}else{try{g(id).position='static';wp_attempt_focus();}catch(e){}}}
addLoadEvent(function(){ var p=new Array(15,30,15,0,-15,-30,-15,0);p=p.concat(p.concat(p));var i=document.forms[0].id;g(i).position='relative';shake(i,p,20);});
</script>
<?php }?>
    </head>
    <body class="login login-action-login wp-core-ui  locale-zh-cn">
    <div id="login">
        <h1><a target="_blank" href="http://www.mingwon.com" title="本系统由【铭望科技™】强力驱动" tabindex="-1">{:C('SITENAME')}</a></h1>
        <?php if (isset($_smarty_tpl->tpl_vars['ERRMSG']->value['GLOBAL'])){?>
        <div id="login_error">  <strong>错误</strong>：<?php echo $_smarty_tpl->tpl_vars['NOTICE']->value['GLOBAL'];?>
<?php echo $_smarty_tpl->tpl_vars['ERRMSG']->value['GLOBAL'];?>
。<br /></div>
        <?php }?>
        <?php if (isset($_smarty_tpl->tpl_vars['NOTICE']->value['GLOBAL'])){?>
            <p class="message"> <?php echo $_smarty_tpl->tpl_vars['NOTICE']->value['GLOBAL'];?>
。<br></p>
        <?php }?>

    <form name="loginform" id="loginform" action="{:U('system/login/default/login.html')}" method="post">
    <p>
        <label for="user_login">用户名<br />
        <input type="text" name="data[user_name]" id="user_login" class="input" value="<?php echo $_smarty_tpl->tpl_vars['USER_NAME_VALUE']->value;?>
" size="20" /></label>
    </p>
    <p>
        <label for="user_pass">密码<br />
        <input type="password" name="data[pass_word]" id="user_pass" class="input" value="<?php echo $_smarty_tpl->tpl_vars['PASS_WORD_VALUE']->value;?>
" size="20" /></label>
    </p>
    <?php if ($_smarty_tpl->tpl_vars['captcha_enable']->value=="1"){?>
    <p>
        <label for="captcha">验证码<br />
        <input type="text" class="input" name="data[captcha_word]"  value="" size="10"/>
        <img style="width:100%" src="{:U('system/captcha/default/create.html')}" alt="CAPTCHA" border="1" onclick="getCaptcha(this);" style="cursor: pointer;" title="看不清？点击更换另一个验证码。" />
    </p>
    <script type="text/javascript">
    function getCaptcha(imgobj) {
        imgobj.src="{:U('system/captcha/default/create/t/','',false)}" + parseInt(100000*Math.random()) + ".html";
    }
    </script>
    <?php }?>
        <!-- <p class="forgetmenot"><label for="rememberme"><input name="rememberme" type="checkbox" id="rememberme" value="forever"  /> 记住我的登录信息</label></p> -->
    <p class="submit">
        <input type="submit" name="wp-submit" id="wp-submit" class="button button-primary button-large" value="登录" />
    </p>
</form>
<!--
<p id="nav">
    <a href="http://www.mingwon.com/wordpress/wp-login.php?action=lostpassword" title="找回密码">忘记密码？</a>
</p>
 -->
<script type="text/javascript">
function wp_attempt_focus(){
setTimeout( function(){ try{
d = document.getElementById('user_login');
if( d.value != '' )
d.value = '';
d.focus();
d.select();
} catch(e){}
}, 200);
}

wp_attempt_focus();
if(typeof wpOnload=='function')wpOnload();

</script>

    <p id="backtoblog"><a href="{:U('site/home/default/default/default.html')}" title="不知道自己在哪？">&larr; 回到站点</a></p>

    </div>


        <div class="clear"></div>
    </body>
    </html>
<?php }} ?>