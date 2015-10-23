<?php

if(!class_exists('clsDbException')) require EPATH_LIBS_EXCEPTIONS . DS . 'dbException.inc.php';
/**
 * @name 		clsMDB
 * @describe 	MDB类
 * @author 		tuyi
 * @since 		2011/12/11
 * @version		v1.0
 */
class clsMDB {

    protected $_stStatement;
    public    $_aReplace;
    protected $_oConn;
    protected $_oRes ;
    protected $isError = false;
    protected $errmsg;
    protected $errno;

    /**
     * 構造関数
     * @name   	__construct
     * @param	$a_oConn 数据库连接
     * @author 	tuyi
     * @since 	2011/12/11
     */
    public function __construct($a_oConn)
    {
        $this->_oConn = $a_oConn;
    }
    /**
     * PreparedStatement生成
     * @name   	fncPreparedStatement
     * @param	$a_stStatement SQL文
     * @author 	tuyi
     * @since 	2011/12/11
     */
    public function fncPreparedStatement($a_stStatement)
    {
        $this->_stStatement = $a_stStatement ;
        return $this;
    }

    /**
     * 設定文字列到SQL
     * @name   	subSetString
     * @param	$a_iIndex 	遊標
     * @param	$a_stData	数据
     * @author 	tuyi
     * @since 	2011/12/11
     */
    public function subSetString($a_iIndex , $a_stData)
    {
        $this->subCheckIndex($a_iIndex);
        $l_stData = (string)$a_stData;
        $this->_aReplace[$a_iIndex] = array('%s' , $l_stData) ;
        return $this;
    }

    /**
     * 設定整数到SQL
     * @name   	subSetInteger
     * @param	$a_iIndex 	遊標
     * @param	$a_iData	数据
     * @author 	tuyi
     * @since 	2011/12/11
     */
    public function subSetInteger($a_iIndex , $a_iData)
    {
        $this->subCheckIndex($a_iIndex);
        $l_iData = (int)$a_iData ;
        $this->_aReplace[$a_iIndex] = array('%d' , $l_iData) ;
        return $this;
    }

    /**
     * 設定NULL到SQL
     * @name   	subSetNull
     * @param	$a_iIndex 	遊標
     * @author 	tuyi
     * @since 	2012/3/29
     */
    public function subSetNull($a_iIndex) {
        $this->subCheckIndex($a_iIndex);
        $this->_aReplace[$a_iIndex] = array('%ns' , 'NULL') ;
        return $this ;
    }

    /**
     * 設定不含问号的SQL子语句到主SQL语句
     * @name   	subSetNQSQL
     * @param	$a_iIndex 	遊標
     * @author 	tuyi
     * @since 	2012/6/5
     */
    public function subSetNQSQL($a_iIndex , $a_stSql) {
        $this->subCheckIndex($a_iIndex);
        $this->_aReplace[$a_iIndex] = array('%sql' , $a_stSql) ;
        return $this ;
    }

    /**
     * 设定不需要转义的字符串
     * @param int $a_iIndex
     * @param string $a_stData
     * @return clsMDB
     * @author 	tuyi
     * @since 	2012/5/15
     */
    public function subSetNoNeedEscapeString($a_iIndex , $a_stData) {
        $this->subCheckIndex($a_iIndex);
        $this->_aReplace[$a_iIndex] = array('%nds' , $a_stData);
        return $this;
    }

    /**
     * 設定浮点数到SQL
     * @name   	subSetDouble
     * @param	$a_iIndex 	遊標
     * @param	$a_fData	数据
     * @author 	tuyi
     * @since 	2011/12/11
     * @modify	2012/3/28	长浮点数对应	 tuyi
     * @modify   2012/7/3    避免科学计数法   tuyi
     */
    public function subSetDouble($a_iIndex , $a_fData)
    {
        $this->subCheckIndex($a_iIndex);
        if(is_float($a_fData) || preg_match('/^[\+\-]*[0-9]+\.[0-9]+$/', $a_fData) || strpos($a_fData , 'E') !== false) {
            if (strpos($a_fData , 'E') !== false) {//如果科学计数法表示的数字
                //进行转换
                if(explode('E' , $a_fData)[1] > 0) {
                    $l_decimal = strlen(explode('E',explode('.' , $a_fData)[1])[0]) - explode('E' , $a_fData)[1];
                    if ($l_decimal < 0) {
                        $l_decimal = 0;
                    }
                } else {
                    $l_decimal = strlen(explode('E',explode('.' , $a_fData)[1])[0]) + abs(explode('E' , $a_fData)[1]);
                    if (abs($a_fData) < 1) {
                        $l_decimal -= 1;
                    }
                }
            } else {
                $l_decimal = strlen(explode('.' , $a_fData)[1]);
            }
        } else {
            $l_decimal = 0;
        }
        $this->_aReplace[$a_iIndex] = array("%.{$l_decimal}f" , $a_fData) ;
        return $this;

        //         if (strpos($a_fData, '.') !== false) {

        //         }
        //         clsLogger::subWriteLog(null,'debug.txt','原型='.$a_fData);
        //         $l_fData = $this->fncGetDouble(sprintf("%.10f",  $a_fData));
        //         clsLogger::subWriteLog(null,'debug.txt','变更前='.sprintf("%.20f",  $a_fData));
        // 		$l_len = strlen($a_fData);
        // 		$l_decimal  = $l_len - (strpos($l_fData , '.')) - 1 ;

        //         $this->_aReplace[$a_iIndex] = array("%{$l_len}.{$l_decimal}f" , $l_fData) ;
        //         clsLogger::subWriteLog(null,'debug.txt','变更后='.$l_fData);
        //         clsLogger::subWriteLog(null,'debug.txt','插入时='.$this->_aReplace[$a_iIndex][1]);
        //         return $this;
    }

    /**
     * 将字符串转化成整型返回
     * @param string $a_stString
     * @return number
     * @author 	tuyi
     * @since 	2012/5/17
     */
    public function fncGetInt($a_stString) {
        return (int)$a_stString;
    }

    /**
     * 将浮点数转化成字符串返回(大数字对应)
     * @param String $a_stString
     * @return string
     * @author 	tuyi
     * @since 	2012/5/17
     */
    public function fncGetDouble($a_stString) {
        preg_match( "#^([\+\-]|)([0-9]*)(\.([0-9]*?)|)(0*)$#", trim($a_stString), $o );
        return $o[1].sprintf('%d',$o[2]).($o[3]!='.'?$o[3]:'');
    }

    /**
     * 数据取得行数设定
     * @param int $a_iRowFrom
     * @param int $a_iRowTo
     * @return clsMDB
     */
    public function subSetLimit($a_iRowFrom , $a_iRowTo) {
        $this->_stStatement = $this->_stStatement . ' LIMIT ' . ( $a_iRowFrom - 1 ) . ' , ' . ($a_iRowTo - $a_iRowFrom + 1 );
        return $this;

    }
    /**
     * 実行SQL並返回影響的行数
     * @name   	fncExcuteQuery
     * @return 	実行SQL影響的行数
     * @author 	tuyi
     * @since 	2011/12/11
     */
    public function fncExcuteQuery()
    {
        $l_stSQL = $this->fncFormatStatement() ;

        $this->_oRes = mysql_query($l_stSQL, $this->_oConn) ;
        clsLogger::subWriteSql($l_stSQL);
        if (!$this->_oRes) {
            $this->isError = true;
            $this->errno   = mysql_errno($this->_oConn);
            $this->errmsg  = mysql_error($this->_oConn) ;
            throw new clsDbException('SQL実行失敗' , $this->errno . ": " .$this->errmsg , $l_stSQL);
        }
        return mysql_num_rows($this->_oRes);
    }

    /**
     * 実行SQL並返回影響的行数
     * @name   	fncExecuteUpdate
     * @return 	実行SQL影響的行数
     * @author 	tuyi
     * @since 	2011/12/11
     */
    public function fncExecuteUpdate()
    {
        $l_stSQL = $this->fncFormatStatement() ;
        if (!mysql_query($l_stSQL, $this->_oConn)) {
            $this->isError = true;
            $this->errno   = mysql_errno($this->_oConn);
            $this->errmsg  = mysql_error($this->_oConn);
            throw new clsDbException('SQL実行失敗' , $this->errno . ": " .$this->errmsg , $l_stSQL);
        }
        clsLogger::subWriteSql($l_stSQL);
        return mysql_affected_rows($this->_oConn);
    }

    /**
     * 将SQL文格式化
     * @name   	fncFormatStatement
     * @return 	実行的SQL语句
     * @author 	tuyi
     * @since 	2011/12/11
     * @moidfy	2012/3/29 添加null数据对应	tuyi
     * @modify   2012/5/15添加like语句对应并优化代码    tuyi
     */
    private function fncFormatStatement()
    {
        if (empty($this->_aReplace)) {
            return $this->_stStatement;
        }

        if (substr_count($this->_stStatement , '?') !== count($this->_aReplace)) {
            //             echo $this->_stStatement;echo count($this->_aReplace);
            throw new clsDbException('SQL的？個数和PreparedStatement設定的個数不一致！',$this->_stStatement);
        }

        //対設定的値進行排序
        if (!ksort($this->_aReplace)) {
            throw new clsDbException('格式化Statement時遊標排序失敗');
        }

        //将排序後的数組進行分解、成類型数組和値数組
        while (list($index , $arrayValue) = each($this->_aReplace)) {
            if (strpos($arrayValue[0], 's') !== false) {//设定值为字符串类型时
                if (get_magic_quotes_gpc()) {
                    $arrayValue[1] = stripslashes($arrayValue[1]);
                }
                if ($arrayValue[0] == '%ns' || $arrayValue[0] == '%sql') {
                    $l_aTypes[] = '%s';
                    $l_aValues[] = $arrayValue[1] ;
                } else if ($arrayValue[0] == '%nds') {
                    $l_aTypes[] = '%s';
                    $l_aValues[] = "'" . $arrayValue[1] . "'";
                } else if ($arrayValue[0] == '%s') {
                    $l_aTypes[] = $arrayValue[0];
                    $l_aValues[] = "'" .mysql_real_escape_string($arrayValue[1] , $this->_oConn) . "'";
                }
            } else {
                $l_aTypes[] = $arrayValue[0];
                $l_aValues[] = $arrayValue[1];
            }
        }
        $l_iCounter = 0;
        //転義[%]
        $this->_stStatement = str_replace('%', '%%', $this->_stStatement);
        while(($pos = strpos($this->_stStatement, '?')) !== false) {
            $this->_stStatement = substr_replace($this->_stStatement, $l_aTypes[$l_iCounter] , $pos , 1);
            $l_iCounter ++;
        }

        $this->_aReplace = null;
        $l_aArgs = array();
        array_push($l_aArgs , $this->_stStatement) ;
        foreach ($l_aValues as $value) {
            array_push($l_aArgs , $value);
        }
        return call_user_func_array('sprintf',  $l_aArgs);
    }

    /**
     * @name   	fncEscapeSql
     * @return 	将Like语句所使用的通配符进行转义
     * @param Resource $a_oConn
     * @param String $a_stString
     * @param bool $a_bLikeFlg
     * @return string
     * @author 	tuyi
     * @since 	2012/5/14
     */
    public function fncEscapeWildCard($a_stString) {
        //转义特殊字符
        $a_stString = mysql_real_escape_string($a_stString);
        //like语句用通配符转义
        $a_stString = str_replace('_', '\\_', $a_stString) ;
        $a_stString = str_replace('%', '\\%', $a_stString) ;
        //将转义字符进行转义
        $a_stString = str_replace('\\', '\\\\', $a_stString) ;
        return $a_stString ;
    }
    /**
     * 返回SQL実行結果
     * @name   	fncGetRecordSet
     * @return 	SQL実行結果
     * @author 	tuyi
     * @since 	2011/12/11
     */
    public function fncGetRecordSet()
    {
        return mysql_fetch_array($this->_oRes , MYSQL_ASSOC) ;
    }

    /**
     * 取得SQL実行結果的一行数据
     * @name   	fncFetch
     * @return 	SQL実行結果
     * @author 	tuyi
     * @since 	2014/12/5
     */
    public function fncFetch()
    {
        return mysql_fetch_row($this->_oRes);
    }

    /**
     * 釈放SQL実行結果
     * @name   	subFreeRes
     * @author 	tuyi
     * @since 	2011/12/11
     */
    public function subFreeRes()
    {
        if (!mysql_free_result($this->_oRes)) {
            throw new clsDbException('釈放SQL実行結果資源失敗！');
        }
    }

    /**
     * PreparedStatement遊標検査
     * @name   	subCheckIndex
     * @param	$a_iIndex	遊標
     * @author 	tuyi
     * @since 	2011/12/11
     */
    private function subCheckIndex($a_iIndex)
    {
        if (!is_numeric($a_iIndex)) {
            throw new clsDbException('設定PreparedStatement時遊標不是整数！');
        }
    }

    /**
     * 自動COMMIT機能設定
     * @name   	subSetAutoCommit
     * @param	$a_bStatus	自動COMMIT状態
     * @author 	tuyi
     * @since 	2011/12/11
     */
    public function subSetAutoCommit($a_bStatus)
    {
        if ($a_bStatus) {
            $this->fncPreparedStatement('SET AUTOCOMMIT = 1')->fncExecuteUpdate();
        } else {
            $this->fncPreparedStatement('SET AUTOCOMMIT = 0')->fncExecuteUpdate();
        }
    }

    /**
     * 事務開始
     * @name   	subStartTran
     * @author 	tuyi
     * @since 	2011/12/11
     */
    public function subStartTran()
    {
        $this->fncPreparedStatement('START TRANSACTION')->fncExecuteUpdate();
    }

    /**
     * 事務提交
     * @name   	subCommit
     * @author 	tuyi
     * @since 	2011/12/11
     */
    public function subCommit()
    {
        $this->fncPreparedStatement('COMMIT')->fncExecuteUpdate();
    }

    /**
     * 事務回滾
     * @name   	subRollBack
     * @author 	tuyi
     * @since 	2011/12/11
     */
    public function subRollBack()
    {
        $this->fncPreparedStatement('ROLLBACK')->fncExecuteUpdate();
    }

    /**
     * 取得错误标志
     * @author 	tuyi
     * @since 	2014/5/23
     * @return boolean
     */
    public function isError() {
        return $this->isError;
    }


    /**
     * 取得错误消息
     * @author 	tuyi
     * @since 	2014/5/23
     * @return string
     */
    public function getError() {
        return $this->errmsg;
    }

    /**
     * 取得错误编码
     * @author 	tuyi
     * @since 	2014/5/23
     * @return number
     */
    public function getErrNo() {
        return $this->errno;
    }

}