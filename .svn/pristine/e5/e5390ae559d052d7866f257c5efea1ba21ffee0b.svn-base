<?php

//TODO 重写
/**
 * @name 		clsServer
 * @describe 	Server変量操作类
 * @author 		tuyi
 * @since 		2011/12/02
 * @version		v1.0
 */
class clsServer{

    /**
     * 取得远程IP地址
     * @name   fncGetRemoteIp
     * @return String 返回远程IP地址
     * @author tuyi
     * @since 2011/12/02
     */
    public static function fncGetRemoteIp(){
        if(!is_null($_SERVER['REMOTE_ADDR'])) {
            return $_SERVER['REMOTE_ADDR'] ;
        }
        return null ;
    }

    /**
     * 取得当前运行的脚本名
     * @name   fncGetScriptName
     * @return String 当前运行的脚本名
     * @author tuyi
     * @since 2011/12/02
     */
    public static function fncGetScriptName(){
        if(!is_null($_SERVER['SCRIPT_NAME'])) {
            return $_SERVER['SCRIPT_NAME'] ;
        }
        return null ;
    }
}
?>