<?php
//     if (!class_exists('clsException')) {
//         require_once 'exception.inc.php';
//     }

/**
 * @name 		clsDbException
 * @describe 	数据库异常类
 * @author 		tuyi
 * @since 		2011/12/01
 * @version		v1.0
 */
class clsDbException extends clsException
{
    /**
     * 構造関数
     * @param  String $a_stSysMsg	系統消息
     * @param  String $a_stSqlErr	SQL錯誤
     * @param  String $a_stSql		引発錯誤的SQL語句
     * @author tuyi
     * @since  2011/12/01
     */
    public function __construct($a_stSysMsg , $a_stSqlErr=null , $a_stSql=null)
    {
        $this->__stErrMsg 	= $a_stSysMsg . PHP_EOL . "\t" . $a_stSqlErr . PHP_EOL . "\t" .  $a_stSql ;
        clsLogger::subWriteDbError($this->__stErrMsg) ;
    }
}
?>