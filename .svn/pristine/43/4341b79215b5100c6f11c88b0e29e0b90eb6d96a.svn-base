<?php
/**
 * @name 		clsConnect
 * @describe 	数据库连接類
 * @author 		tuyi
 * @since 		2011/12/08
 * @version		v1.0
 */
class clsConnect{

    private static $__oConn;//数据库连接资源

    /**
     * @name 		__construct
     * @describe 	数据库连接類構造関数
     * @param		Array $a_aDSN	数据库连接DSN
     * @author 		tuyi
     * @since 		2011/12/08
     */
    private function __construct(){
    }

    /**
     * @name 		fncConnect
     * @describe 	数据库连接類関数
     * @param		Array $a_aDSN	数据库连接DSN
     * @return		連接資源
     * @author 		tuyi
     * @since 		2011/12/08
     */
    private static function fncConnect($a_aDSN)
    {
        //新建连接
        $l_oConn = null;

        if ($a_aDSN['DRIVER'] == 'mysql') {

            $l_oConn = @mysql_connect($a_aDSN['HOST'] . ':' . $a_aDSN['PORT'] , $a_aDSN['USERNAME'] , $a_aDSN['PASSWORD'] , $a_aDSN['NEW_LINK']);
        }
        if (!$l_oConn) {

            throw new clsDbException('連接数据库失敗！請検査連接設置！') ;

        }
        if (array_key_exists('CHARSET', $a_aDSN)) {

            if (!self::fncSetCharset($a_aDSN , $l_oConn)) {

                throw new clsDbException('設定客戸端文字編碼(' . $a_aDSN['CHARSET'] . ')失敗！');

            }
        }
        if (array_key_exists('DATABASE', $a_aDSN)) {

            if (!self::fncSelectDb($a_aDSN, $l_oConn)) {

                throw new clsDbException('選択数据库'. $a_aDSN['DATABASE'] .'失敗');

            }
        }
        return $l_oConn;
    }

    /**
     * @name 		fncFactory
     * @describe 	取得数据库连接資源
     * @param		Array $a_aDSN	数据库连接DSN
     * @return		連接資源
     * @author 		tuyi
     * @since 		2011/12/08
     */
    public static function fncFactory($a_aDSN)
    {
        if (!self::$__oConn) {

            self::$__oConn = self::fncConnect($a_aDSN);

        }
        return self::$__oConn;
    }

    /**
     * @name 		fncSetCharset
     * @describe 	設定客戸端文字編碼
     * @param		Array 		$a_aDSN		数据库连接DSN
     * @param		Resource	$a_oConn	数据库连接資源
     * @return		Boolean		設定成功時,返回TRUE否則返回FALSE
     * @author 		tuyi
     * @since 		2011/12/08
     */
    public static function fncSetCharset($a_aDSN , $a_oConn)
    {
        if ($a_aDSN['DRIVER'] == 'mysql') {
            return mysql_set_charset($a_aDSN['CHARSET'] , $a_oConn) ;
        }
    }

    /**
     * @name 		fncSelectDb
     * @describe 	設定数据库
     * @param		Array 		$a_aDSN		数据库连接DSN
     * @param		Resource	$a_oConn	数据库连接資源
     * @return		Boolean		設定成功時,返回TRUE否則返回FALSE
     * @author 		tuyi
     * @since 		2011/12/08
     */
    public static function fncSelectDb($a_aDSN , $a_oConn)
    {
        if ($a_aDSN['DRIVER'] == 'mysql') {

            return mysql_select_db($a_aDSN['DATABASE'] , $a_oConn);

        }
    }


    /**
     * @name 		subCloseConnect
     * @describe 	关闭数据库连接
     * @return		无
     * @author 		tuyi
     * @since 		2014/3/21
     */
    public static function subCloseConnect($a_aDSN) {

        if ($a_aDSN['DRIVER'] == 'mysql') {

            if (self::$__oConn) {

                @mysql_close(self::$__oConn);

            }

        }

    }
}
?>
