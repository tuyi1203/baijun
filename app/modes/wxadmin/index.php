<?php
/**
 * Eku framework
 * @copyright   Copyright(C) 2012-2014 重庆铭望科技有限公司 （(www.mingwon.com)
 * @license     GNU
 * @author      tuyi
 * @package     eku
 * @link        http://www.mingwon.com
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

// die(dirname(__DIR__));

if (file_exists(dirname(__DIR__) . '/includes/defines.php'))
{
    include dirname(__DIR__) . '/includes/defines.php';
}

require EKU_BASE . DS . 'includes'. DS . 'framework.php';

// Instantiate the application.
$app = clsFactory::getApplication('wxadmin');
// clsLogger::subWriteSysError(__FILE__);
// Execute the application.
$app->execute();
