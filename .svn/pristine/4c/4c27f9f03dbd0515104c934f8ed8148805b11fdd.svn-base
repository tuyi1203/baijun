<?php
/**
 * @name 		clsLogger
 * @describe 	日誌类
 * @author 		tuyi
 * @since 		2011/12/01
 * @version		v1.0
 */
class clsLogger {
    /**
     * 将信息写入日誌
     * @name   subWriteLog
     * @param  String $a_stFPath	文件路径
     * @param  String $a_stFName	文件名
     * @param  String $a_stMsg	記録到日誌的消息
     * @author tuyi
     * @since 2011/12/01
     */
    public static function subWriteLog($a_stFPath = null , $a_stFName = null , $a_stMsg=null)
    {
    	if (!C('DEBUG')) return;
        //如果文件路径参数为NULL，則使用定义路径
        $l_stFilePath = empty($a_stFPath) ? APATH_LOGS : $a_stFPath;

        //如果文件名参数为NULL，則使用系统日期作为默认文件名
        $l_stFileName = empty($a_stFName) ? date("Ymd",time()) : $a_stFName ;
        $l_stFileFullPath = $l_stFilePath . DS . date("Ymd",time()) . '_' . $l_stFileName ;

        //如果文件存在，検査文件大小如果超过100M，把文件改名备份
        if (file_exists($l_stFileFullPath)) {
            if (@filesize($l_stFileFullPath) > (100 * 1024 * 1024)) {
                @rename($l_stFileFullPath , $l_stFileFullPath."_old_".date("Ymd",time())) ;
            }
        }
        if ($l_oFileHandle = @fopen($l_stFileFullPath , "ab" , true)) {

            if (self::fncLockFile($l_oFileHandle , 3 )) {

                if (!fwrite($l_oFileHandle,date("Y-m-d H:i:s")."  ".'REMOTE_IP:' . clsServer::fncGetRemoteIp() . "  " . $a_stMsg . PHP_EOL)) {
                    if (!(C('error_reporting') == 'none')) {
                        die("写入日志文件(" . $l_stFileFullPath . ")失敗！");
                    } else {
                        die("発生未知錯誤") ;
                    }
                }
                if (!self::fncUnlockFile($l_oFileHandle)) {
                    if (!(C('error_reporting') == 'none')) {
                        die("解鎖日志文件(". $l_stFileFullPath .")失敗！") ;
                    } else {
                        die("発生未知錯誤") ;
                    }

                }
                if (!fclose($l_oFileHandle)) {
                    if (!(C('error_reporting') == 'none')) {
                        die("関閉日志文件(". $l_stFileFullPath .")失敗！") ;
                    } else {
                        die("発生未知錯誤") ;
                    }
                }
            } else {
                if (!(C('error_reporting') == 'none')) {
                    die("鎖定日志文件(" . $l_stFileFullPath . ")失敗！");
                } else {
                    die("発生未知錯誤") ;
                }

            }
        } else {
            if (!(C('error_reporting') == 'none')) {
                die("打开日志文件(" . $l_stFileFullPath . ")失敗！");
            } else {
                die("発生未知錯誤") ;
            }
        }
    }

    /**
     * 文件锁定関数
     * 鎖定文件失败时，間隔一定时间（2秒）再次尝试锁定
     * @name  fncLockFile
     * @param Resource 	$a_oFileHandle	文件句柄
     * @param int   	  	$a_iTryTime		甞試鎖定次数
     * @return boolean 	鎖定成功时返回TRUE、鎖定失敗时返回FALSE
     * @author tuyi
     * @since 2011/12/01
     */
    public static function fncLockFile($a_oFileHandle , $a_iTryTime)
    {
        if (!flock($a_oFileHandle , LOCK_EX)) {
            if ($a_iTryTime > 0) {
                sleep(2);
                return self::fncLockFile($a_oFileHandle , $a_iTryTime - 1 ) ;
            } else {
                return false ;
            }
        }
        return true ;
    }

    /**
     * 文件解锁関数
     * @name   fncLockFile
     * @param  Resource 	$a_oFileHandle	文件句柄
     * @return boolean 	鎖定成功时返回TRUE、鎖定失敗时返回FALSE
     * @author tuyi
     * @since  2011/12/01
     */
    public static function fncUnlockFile($a_oFileHandle)
    {
        return flock($a_oFileHandle , LOCK_UN) ;
    }

    /**
     * 写DB錯誤日誌
     * @name   subWriteDbError
     * @param  String $a_stMsg 	錯誤信息
     * @author tuyi
     * @since  2011/12/01
     */
    public static function subWriteDbError($a_stMsg){
        self::subWriteLog(APATH_LOGS , DB_ERROR_LOG , $a_stMsg) ;
    }

    /**
     * 写SQL実行日志
     * @name   subWriteSql
     * @param  String $a_stSql 	運行的SQL語句
     * @author tuyi
     * @since  2011/12/01
     */
    public static function subWriteSql($a_stSql){
        self::subWriteLog(APATH_LOGS , SQL_EXEC_LOG , $a_stSql) ;
    }

    /**
     * 写系统错误日志
     * @name   subWriteSysError
     * @param  String $a_stMsg 	錯誤信息
     * @author tuyi
     * @since  2011/12/01
     */
    public Static function subWriteSysError($a_stMsg){

        self::subWriteLog(APATH_LOGS , SYS_ERROR_LOG , $a_stMsg) ;

    }

    /**
     * 写系统运行日志
     * @name   subWriteSysExec
     * @param  String $a_stMsg 	运行信息
     * @author tuyi
     * @since  2011/12/01
     */
    public static function subWriteSysExec($a_stMsg){
        self::subWriteLog(APATH_LOGS , SYS_EXEC_LOG , $a_stMsg) ;
    }

    /**
     * 写系统访问日志
     * @name   subWriteAccess
     * @param  String $a_stMsg 	访问信息
     * @author tuyi
     * @since  2014/5/5
     */
    public static function subWriteAccess($a_stMsg){
        self::subWriteLog(APATH_LOGS , SYS_ACC_LOG , $a_stMsg) ;
    }

    /**
     * 写系统访问错误日志
     * @name   subWriteAccessErr
     * @param  String $a_stMsg 	错误访问信息
     * @author tuyi
     * @since  2014/5/5
     */
    public static function subWriteAccessErr($a_stMsg){
        self::subWriteLog(APATH_LOGS , SYS_ACC_ERR_LOG , $a_stMsg) ;
    }
}
?>