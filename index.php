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
define('_EKU', 1);

require __DIR__ . DIRECTORY_SEPARATOR . 'eku' . DIRECTORY_SEPARATOR . 'includes'. DIRECTORY_SEPARATOR . 'framework.php';

$pathinfo = isset($_SERVER['PATH_INFO'])?substr($_SERVER['PATH_INFO'],1):'';

if (!$pathinfo  || !preg_match('/^('.MODES.')/' , $pathinfo)) {
    $mode = 'site';
} else {
    $mode = strstr($pathinfo , C('URL_PATHINFO_DEPR') , true);
}

require MODES_BASE . DS .  $mode . DIRECTORY_SEPARATOR . 'index.php';