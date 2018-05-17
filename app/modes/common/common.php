<?php
function updateSystem() {
    //更新权限列表
    saveActionAuthList();

    //更新菜单
    saveAdminMenu();

    //TODO是否更新前台菜单

}

//TODO 将此函数制作成钩子
function cutText($text , $length , $encode = "UTF-8") {
    return mb_strimwidth($a_strText , 0 , $a_iLen , '...', $encode);
}
/********************全局函数**********************************************/
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


function pageDeny()
{
    //TODO 更好的解决方案
    $app = getAppIns();
    pr("pageDeny");
    // 	$app->();
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

function getForm() {
    $app = getAppIns();
    return $app->getForm();
}

function getAuthIns()
{
    // pr(5);
    if (!class_exists('auth')) {
        require APATH_SYS_PATH . DS . 'auth' . DS . 'auth.php';
    }

    return new auth(getMDB() , getSessIns());

}
