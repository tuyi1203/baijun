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

/*check the php version*/
if (version_compare(PHP_VERSION, '5.4.0', '<'))
{
    die('Your host needs to use PHP 5.4.0 or higher to run this version of eku');
}

/**
 * Constant that is checked in included files to prevent direct access.
 * define() is used in the installation folder rather than "const" to not error for PHP 5.2 and lower
 */
!defined('_EKU') && define('_EKU', 1);

/**
 * 微信接入验证
 * 在入口进行验证而不是放到框架里验证，主要是解决验证URL超时的问题
 */
if (! empty ( $_GET ['echostr'] ) && ! empty ( $_GET ["signature"] ) && ! empty ( $_GET ["nonce"] )) {
    $signature = $_GET ["signature"];
    $timestamp = $_GET ["timestamp"];
    $nonce = $_GET ["nonce"];

    $tmpArr = array (
            'mingwon',
            $timestamp,
            $nonce
    );
    sort ( $tmpArr, SORT_STRING );
    $tmpStr = sha1 ( implode ( $tmpArr ) );

    if ($tmpStr == $signature) {
        echo $_GET ["echostr"];
    }
    exit ();
}

defined('MODES') or require dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'eku' . DIRECTORY_SEPARATOR . 'includes'. DIRECTORY_SEPARATOR . 'framework.php';
require APATH_CORE . DS . 'addoncontroller.php';
// Instantiate the application.
$app = clsFactory::getApplication('addon');
// clsLogger::subWriteSysError(__FILE__);
// Execute the application.
$app->execute();