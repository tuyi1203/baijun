<?php
/**
 * @name 		clsDBH
 * @describe 	PDO实例取得用
 * @author 		tuyi
 * @since 		2014/12/05
 * @link        http://www.mingwon.com
 * @version		v1.0
 */
class clsDBH {

    private static $pdo;//PDO实例

    private function __construct($dsn)
    {
        if ($dsn['DRIVER'] == 'mysql') {
            $ds = "mysql:host={$dsn['HOST']}; port={$dsn['PORT']}; dbname={$dsn['DATABASE']}; charset={$dsn['CHARSET']}";
        }
        try
        {
            self::$pdo = new PDO($ds, $dsn['USERNAME'], $dsn['PASSWORD'], array(array(PDO::ATTR_PERSISTENT => $dsn['PERSISTANT'])));
            self::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            if (version_compare(PHP_VERSION, '5.3.6') < 0) {//5.3.6 より前のバージョンでは charset は無視されていました。
                self::$pdo->exec("SET NAMES {$dsn['CHARSET']}");
            }

        } catch (PDOException $e)
        {
            clsLogger::subWriteDbError('生成PDO对象或者设置属性失败:'.$e->getMessage());
        }

    }

    public static function factory ($dsn)
    {
        if (!(self::$pdo instanceof PDO)) {
            new self($dsn);
        }

        return self::$pdo;
    }
}