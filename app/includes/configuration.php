<?php
/**
 * Eku framework
 * @copyright   Copyright(C) 2012-2014 重庆铭望科技有限公司 （(www.mingwon.com)
 * @license     GNU
 * @author      tuyi
 * @package     eku
 * @link        http://www.mingwon.com
 * @version     v2.0
 */

return array (
     //站点设置
     'OFFLINE'                    => '0',
     'OFFLINE_MESSAGE'            => '本站正在维护中，暂不能访问。<BR /> 请稍后再访问本站。',
     'DISPLAY_OFFLINE_MESSAGE'    => '1',
     'OFFLINE_IMAGE'              => '',
     'SITENAME'                   => '重庆百君律师事务所',
//      'PUBLICROOT'                    => 'mingwon',//网站根域名
     'RECPERPAGE'                 => '20',//每页显示的记录条数
     'LINK_RANGE'                 => '5',//分页链接显示的页码个数
     'DF_NUM'                     => '4',
     'ACCESS'                     => '1',
     'SYSNAME'                    => 'baijun-zh',
     'EN-DOMAIN'                  => "http://enbaijun.ty.com/index.php/admin/",
      //调试状态
     'DEBUG'                      => true,


     //应用相关设置
     'LANG'                       => "ZH-CN",//客户端语言
     //'LANGS'                      => array("ZH-CN" =>'简体',"JP"=>'日本語' ,"EN"=>'ENGLISH' , "ZH-TW"=>"繁体"),//备选语言一览
     'LANGS'                      => array("ZH-CN" =>'中文站',"EN"=>'英文站'),//备选语言一览

      //域名相关设置
     'APP_SUB_DOMAIN_DEPLOY'      => false,// 是否开启子域名部署
     'APP_SUB_DOMAIN_RULES'       => array('admin.domain.com'  => 'admin','wxsite.domain.com'   => 'wxsite'), // 子域名部署规则
     'APP_DOMAIN_SUFFIX'          =>  '', // 域名后缀 如果是com.cn net.cn 之类的后缀必须设置
     'URL_HTML_SUFFIX'            => array('.html','.modal','.json'),
     'URL_DEFAULT_SUFFIX'         => '.html',
     'ENTRANCEURI'                => 'home/default/default/default.html',
     'ERR404URI'                  => "system/error/default/error/404.html",
     'ERR110URI'                  => "system/error/default/error/110.html",
     'DEFAULT_SCRIPT'             => "default",//默认脚本名称
     'DEFAULT_ACTION'             => "default",//默认动作名称
     'URL_PATHINFO_DEPR'          => "/",
     //'SITE_ROOT'                  => "baijun"  ,//网站根目录
	 'SITE_ROOT'                  => ""  ,//网站根目录
     'SITE_ENTRANCE_FILE'         => "index.php",//网站入口文件名
     'SITE_PUBLIC'                => "public"   ,//网站公开路径名
     'SITE_UPLOAD'                => "upload"   ,//网站上传文件夹

    //数据库设置项
     'PDO'                        => true,
     'DRIVER'                     => 'mysql',
     'HOST'                       => '211.149.151.120',
     'USERNAME'                   => 'remote',
//      'PROTOCOL'                   => "tcp",
     'PASSWORD'                   => 'dd111!!!',
     'DATABASE'                   => 'cqbaijun',
     'PORT'                       => '3306',
     'CHARSET'                    => 'UTF8',
//      'SOCKET'                     => false,
//      'DBSYNTAX'                   => false,
     'NEW_LINK'                   => false,
     'PERSISTANT'                 => true,//持续性连接

    /* 验证码 */
     'CAPTCHA_REGISTER'           => 1, //注册时使用验证码
     'CAPTCHA_LOGIN'              => 2, //登录时使用验证码
     'CAPTCHA_COMMENT'            => 4, //评论时使用验证码
     'CAPTCHA_ADMIN'              => 8, //后台登录时使用验证码
     'CAPTCHA_LOGIN_FAIL'         => 16, //登录失败后显示验证码
     'CAPTCHA_MESSAGE'            => 32, //留言时使用验证码
     'CAPTCHA_SET'                => 16, //验证码设置值

     'LOGIN_FAILTIMES'            => 3, //登陆限制错误次数,超过该次数显示验证码
     'FAILURE_TIME'               => 600,//登陆失败重置时间设定为10分钟

     'COOKIELIFE'                 => 3600 ,//cookie生命时间设置为一个小时
     'PATH'                       => '/',//COOKIE 的作用有效路径
     'DOMAIN'                     => 'ty.com',//COOKIE 的作用域
     'SITE_DOMAIN'                => '',
    // 	 DBPREFIX '=> 'V8FW5_',
    // 	 LIVE_SITE '=> '',
    //加密用密码salt
     'PASSSALT'                   => '$1$pear$',
     'MD5SALT'                    => 'UNIQUE_SALT',
    // 	 'GZIP'=> '0',
     'ERROR_REPORTING'=> 'default',
	 // 'ERROR_REPORTING'            => 'maximum',
     'SLIDE_IMAGES'               => 5 ,//设置大图幻灯片的张数
     'LIFE_TIME'                  => 0,   //SESSION时间设置为1个小时,设置成0则意味着关闭浏览器时过期
     'UPLOADFILEMAXSIZE'          => 200 ,//上传文件大小限制设定为200KB
     'UPLOADABLE'                 => true,
     'SYSTEMLANGUAGE'             => 'GB2312',
     'PERIOD'                     => '7',//判断是否为信息的标准是7天

     //SESSION处理方式
//      'SESSION_HANDLER'            => 'database',
     'SESSION_HANDLER'            => 'file',

    //允许上传的图片格式
     'IMAGEEXTENSIONS'=> array('bmp','jpg','jpeg','tiff','png','gif'),

    // 	 HELPURL '=> 'HTTP://HELP.JOOMLA.ORG/PROXY/INDEX.PHP?OPTION'=>COM_HELP&AMP,KEYREF'=>HELP{MAJOR}{MINOR}:{KEYREF}',
    // 	 FTP_HOST '=> '',
    // 	 FTP_PORT '=> '',
    // 	 FTP_USER '=> '',
    // 	 FTP_PASS '=> '',
    // 	 FTP_ROOT '=> '',
    // 	 FTP_ENABLE '=> '',
    // 	 OFFSET '=> 'UTC',
    // 	 MAILONLINE '=> '1',
    // 	 MAILER '=> 'MAIL',
    // 	 MAILFROM '=> 'TUYI1204@126.COM',
    // 	 FROMNAME '=> '测试网站',
    // 	 SENDMAIL '=> '/USR/SBIN/SENDMAIL',
    // 	 SMTPAUTH '=> '0',
    // 	 SMTPUSER '=> '',
    // 	 SMTPPASS '=> '',
    // 	 SMTPHOST '=> 'LOCALHOST',
    // 	 SMTPSECURE '=> 'NONE',
    // 	 SMTPPORT '=> '25',
    // 	 CACHING '=> '0',
    // 	 CACHE_HANDLER '=> 'FILE',
    // 	 CACHETIME '=> '15',
    // 	 METADESC '=> '这里是META的描述',
    // 	 METAKEYS '=> '',
    // 	 METATITLE '=> '1',
    // 	 METAAUTHOR '=> '1',
    // 	 METAVERSION '=> '0',
    // 	 ROBOTS '=> '',
    // 	 SEF '=> '1',
    // 	 SEF_REWRITE '=> '0',
    // 	 SEF_SUFFIX '=> '0',
    // 	 UNICODESLUGS '=> '0',
    // 	 FEED_LIMIT '=> '10',
    //	 LOG_PATH '=> 'D:\\XAMPP\\HTDOCS\\COMBASE\\LOGS',
    //	 TMP_PATH '=> 'D:\\XAMPP\\HTDOCS\\COMBASE\\TMP',




    );


