<?php
class Mw_Relation extends clsModel{

    CONST INSERT  = "insert into mw_relation (objecttype , objectid , category) values (?,?,?)";

    CONST UPDATE  = "update mw_relation set category=? where objecttype=? and objectid=?";

    CONST DELETE  = "delete from mw_relation where objectid=? and objecttype=?";

    CONST GETLISTBYOBJECT = "select * from mw_relation where objecttype=? and objectid=?";

    public function insert($input) {

        $i = 1 ;

         $this->_oMdb->fncPreparedStatement(self::INSERT)
                     ->subSetString($i++ , $input->objecttype)
                     ->subSetInteger($i++ , $input->objectid)
                     ->subSetInteger($i++, $input->category)
                     ->fncExecuteUpdate();

       return !$this->_oMdb->isError();
    }

    public function getListByObject($input) {
        $i = 1;
        $output = array();

        $this->_oMdb->fncPreparedStatement(self::GETLISTBYOBJECT)
                    ->subSetString($i++, $input->objecttype)
                    ->subSetString($i++, $input->objectid)
                    ->fncExcuteQuery();

        while ($row = $this->_oMdb->fncGetRecordSet()) {
            $output[] = $row;
        }

        return $output;
    }

    public function getByID($input) {
        $i = 1;

        $this->_oMdb->fncPreparedStatement(self::GETBYID)
                    ->subSetInteger($i++, $input->id)
                    ->fncExcuteQuery();

        $row = $this->_oMdb->fncGetRecordSet();

        return $row;
    }

    public function update($input) {

        $i = 1;

        $this->_oMdb->fncPreparedStatement(self::UPDATE)
                    ->subSetInteger($i++, $input->category)
                    ->subSetString($i++, $input->objecttype)
                    ->subSetInteger($i++, $input->objectid)
                    ->fncExecuteUpdate();

        return !$this->_oMdb->isError();
    }

    public function delete($input) {
        $i = 1 ;

        $this->_oMdb->fncPreparedStatement(self::DELETE)
                    ->subSetInteger($i++ , $input->objectid)
                    ->subSetString($i++, $input->objecttype)
                    ->fncExecuteUpdate();
        return !$this->_oMdb->isError();
    }


}
