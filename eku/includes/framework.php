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
defined('_EKU') or die;

require dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'includes' . DIRECTORY_SEPARATOR . 'defines.php';
require EPATH_INCLUDES . DS . 'define.php';
require EPATH_LIBS     . DS . 'loader.inc.php';
require EPATH_INCLUDES . DS . 'function.php';

// require CORE_LIBS . DS . 'classloader.inc.php';
// require CORE_CONFIG . DS . 'configure.inc.php';
// require CORE_LIBS . DS . 'basic.inc.php';

// require APATH_INCLUDES . DS . 'configuration.php';

// System configuration.
// $config = new config;

//载入全局设置
C(include APATH_INCLUDES . DS . 'configuration.php');
// Set the error_reporting
// echo "1".C('ERROR_REPORTING');exit;
switch (C('ERROR_REPORTING'))
{
    case 'default':
    case '-1':
        break;

    case 'none':
    case '0':
        error_reporting(0);

        break;

    case 'simple':
        error_reporting(E_ERROR | E_WARNING | E_PARSE);
        ini_set('display_errors', 1);

        break;

    case 'maximum':
        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        break;

    case 'development':
        error_reporting(-1);
        ini_set('display_errors', 1);

        break;

    default:
        error_reporting(C('ERROR_REPORTING'));
        ini_set('display_errors', 1);

        break;
}


$frameloader = new clsLoader();
$frameloader    ->fncRegisterDir(EPATH_CONFIG)
->fncRegisterDir(EPATH_LIBS)
->fncRegisterDir(EPATH_LIBS_DB)
->fncRegisterDir(EPATH_LIBS_EXCEPTIONS)
->fncRegisterDir(EPATH_LIBS_MODELS)
->fncRegisterDir(EPATH_CORE)

->fncSetPrefix('cls')
->fncSetExtension('.inc.php');



$interfaceloader = new clsLoader();
$interfaceloader->fncRegisterDir(EPATH_INTERFACES . DS . 'actions')

->fncSetPrefix('IAction_')
->fncSetExtension('.inc.php');




$apploader = new clsLoader();
$apploader      ->fncRegisterDir(APATH_LIBS)
->fncRegisterDir(APATH_CORE)

->fncSetPrefix('clsApp')
->fncSetExtension('.php');


$modelloader = new clsLoader();
$modelloader      ->fncRegisterDir(APATH_LIBS_MODELS)
                  ->fncSetExtension('.php');

// $l_aDSN = clsDbInfo::getDSN();
// if ($l_aDSN['driver'] == 'mysql') {
// 	require CORE_DB . DS . 'mysql.inc.php';
if (C('driver')) {
    require EPATH_LIBS_DB . DS . 'mysql.inc.php';
}
if (C('PDO')) {
    require EPATH_LIBS_DAO . DS . 'pdo.inc.php';
    require EPATH_LIBS_DAO . DS . 'dao.inc.php';
}

require EPATH_INCLUDES . DS . 'hooks.php';
// }