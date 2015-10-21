<?php
global $script_run_time;

function e($data) {
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

/**
 * 取得GET传递的参数
 * @param String $key
 * @return unknown|NULL
 */
function fncGetParameter($key) {
    if (array_key_exists($key, $_GET)) {
        return $_GET[$key];
    }
    return null;
}

function subOnStart() {
    if(defined('DEBUG') && DEBUG == '1') {
        global $script_run_time;
        $script_run_time = microtime(true);
        //echo '<pre>程序开始于' . date('H:i:s') . '</pre>' ;
    }
}

function subOnEnd() {
    if(defined('DEBUG') && DEBUG == '1') {
        global $script_run_time;
        echo '<pre>程序执行了于' . number_format(((microtime(true)-$script_run_time)) , 6) . '秒<br>' ;
        echo '使用内存' . (memory_get_peak_usage(true) / 1024 / 1024) . ' MB ' . '</pre>' ;
    }
}

/**
 * 向SESSION中添加错误信息(分项目显示错误信息对应)
 * @param clsAppSession $a_oSession
 * @param string $a_stKey
 * @param string $a_stMsg
 */
function subAddErrMsg(clsAppSession $a_oSession , $a_stKey ,$a_stMsg) {
    $l_aErr = $a_oSession->fncGetErrMsg();
    $l_aErr[$a_stKey] = $a_stMsg ;
    $a_oSession->subSetErrMsg($l_aErr);
}

/**
 * 向SESSION中添加提示消息
 * @param clsAppSession $a_oSession
 * @param string $a_stKey
 * @param unknown_type $a_stNotice
 */
function subAddNotice(clsAppSession $a_oSession , $a_stKey , $a_stNotice) {
    $l_aNotice = $a_oSession->fncGetNotice();
    $l_aNotice[$a_stKey] = $a_stNotice ;
    $a_oSession->subSetNotice($l_aNotice);
}

