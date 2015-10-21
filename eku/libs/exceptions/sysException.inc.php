<?php
//     if (!class_exists('clsException')) {
//         require_once 'exception.inc.php';
//     }

/**
 * @name 		clsSysException
 * @describe 	系統异常类
 * @author 		tuyi
 * @since 		2011/12/01
 * @version		v1.0
 */
class clsSysException extends clsException
{
    /**
     * 構造関数
     * @param  String $a_stFileName	発生錯誤的文件名
     * @param  String $a_stFncName	発生錯誤的函数名
     * @param  String $a_stErrMsg	錯誤信息
     * @author tuyi
     * @since  2011/12/01
     */
    public function __construct($a_stFileName , $a_stFncName, $a_stErrMsg)
    {
        $this->__stErrMsg = "発生錯誤的文件名：(" . $a_stFileName . ") " . "発生錯誤的函数名：(" . $a_stFncName . ") " . $a_stErrMsg ;
        clsLogger::subWriteSysError($this->__stErrMsg ) ;
    }
}
?>