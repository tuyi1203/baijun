<?php
//TODO 将此函数制作成钩子
function cutText($text , $length , $encode = "UTF-8") {
    return mb_strimwidth($a_strText , 0 , $a_iLen , '...', $encode);
}

function getSessIns()
{

    $app = getAppIns();
    return $app->getSess();

}

function getLang()
{
    $app = getAppIns();
    return $app->getLang();
}

function setSessVal($key,$val)
{

    $session = getSessIns();
    $session->subSetValue($key , $val);
}

function getSessVal($key)
{

    $session = getSessIns();
    return $session->fncGetValue($key);
    // pr($_SESSION);
}

function getUri()
{
    $app = getAppIns();
    return $app->getUri();
}

function getPreUri()
{
    $app = getAppIns();
    return $app->getPreUri();
}

function getEntranceUri()
{
    $app = getAppIns();
    return $app->getEntranceUri();
}

function page404()
{
    //TODO 更好的解决方案
    $ctr = getCtr();
    $ctr->page404();
//     $app->router->page404();
}


function pageDeny()
{
    //TODO 更好的解决方案
    $app = getAppIns();
    pr("pageDeny");
    // 	$app->();
}

function getAppIns()
{
    return clsFactory::getApplication();
}

function getSmarty()
{
    $app = getAppIns();
    return $app->getSmarty();
}

function getCtr()
{

    $app = getAppIns();
    return $app->getCtr();
}

function redirect($url)
{
    $ctrl = getCtr();
    $ctrl->redirect($url);
}

function getPost()
{
    $app = getAppIns();
    return $app->getPost();
}

function getGet()
{
    $app = getAppIns();
    return $app->getGet();
}

function getUid()
{
    $session = getSessIns();
    return $session->getUid();
}

function getRid()
{
    $session = getSessIns();
    return $session->getRid();
}

function getUserName()
{
    $session = getSessIns();
    return $session->getUserName();
}

function getMDB()
{
    $app = getAppIns();
    return $app->getMDB();
}

function getMode()
{

    $app = getAppIns();
    return $app->getMode();
}

function getAppType()
{
    $app = getAppIns();
    return $app->getAppType();
}

function getForm() {
    $app = getAppIns();
    return $app->getForm();
}

function getAuthIns()
{

    if (!class_exists('auth')) {
        require APATH_SYS_PATH . DS . 'auth' . DS . 'auth.php';
    }

    return new auth(getMDB() , getSessIns());

}

function getModule()
{

    $app = getAppIns();
    return $app->getModule();

}

function getModuleF()
{

    $app = getAppIns();
    return $app->getModuleF();

}

function getModuleS()
{

    $app = getAppIns();
    return $app->getModuleS();

}

function getScript() {

    $app = getAppIns();
    return $app->getScript();
}

function getAction()
{
    $app = getAppIns();
    return $app->getAction();
}

function pr($a)
{
    if (config::$debug) {
        echo "<pre>";
        print_r($a);
        echo "</pre>";
    }
}

function getCookie() {
    $app = getAppIns();
    return $app->getCookie();
}


function getInput() {
    $app = getAppIns();
    return $app->getInput();
}
/**
 * 翻译器
 *
 * @param string $str 待翻译的字符串
 * @return string 翻译后的字符串
 */
// function translate($str) {

// 	$lang = getLang();
// 	if(($key = array_search($str, obj2array($lang->translate))) !== false) return $lang->translate->$key;
// 	return $str;
// }

/**
 * 将对象转换为数组(stdClass类适用)
 * @param object $obj
 * @return ArrayObject
 */
function obj2array($obj)
{
    return json_decode(json_encode($obj) , true);
}

function mixed2obj($mixed) {
//TODO OR NOT
}