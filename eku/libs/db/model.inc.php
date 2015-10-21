<?php
/**
 * @name 		clsModel
 * @describe 	Model類
 * @author 		tuyi
 * @since 		2012/01/09
 * @version		v1.0
 */
abstract class clsModel {
    protected $_oMdb ;

    protected $_stTableName ;

    public function __construct(clsMDB $a_oMdb , $a_stTableName) {

        $this->_oMdb = $a_oMdb;

        $this->_stTableName = $a_stTableName;
    }

    public function fncFindAll()
    {
        $l_oRes = array();
        $l_stStatement = "SELECT * FROM " . '`' . $this->_stTableName . '`' ;
        $this->_oMdb->fncPreparedStatement($l_stStatement)->fncExcuteQuery();
        while ($row = $this->_oMdb->fncGetRecordSet()) {
            array_push($l_oRes, $row);
        }
        return $l_oRes;
    }

    public function lastInsertID() {
        $l_stStatement = 'select last_insert_id() id ';
        $this->_oMdb->fncPreparedStatement($l_stStatement)->fncExcuteQuery();
        $row = $this->_oMdb->fncGetRecordSet();
        return $row['id'];
    }

    /**
     * 魔术方法
     * @param string $methodname 调用方法名
     * @param string $arguments  传递的参数
     * @return string
     */
    public function __call($methodname, $arguments)
    {
        $rows = array();
        $statement = "SELECT * FROM " . '`' . $this->_stTableName . '`' ;
        if (strpos(strtolower($methodname) , 'getby') === 0) {
            preg_match('/^getby(.+)/i' , strtolower($methodname) , $matches);
            $statement .= " where `".strtolower($matches[1])."`=?";
            $this->_oMdb->fncPreparedStatement($statement);
            if ($arguments) {
               $i = 1;
               foreach ($arguments[0] as $key => $value) {
                   if ($key == "int") {
                       $this->_oMdb->subSetInteger($i++, $value);
                   }
                   if ($key == "string") {
                       $this->_oMdb->subSetString($i++, $value);
                   }
               }
            }
            $this->_oMdb->fncExcuteQuery();
            while ($row = $this->_oMdb->fncGetRecordSet()) {
                array_push($rows, $row);
            }
            return $rows;
        }
    }


}