<?php
class Eku_Action extends clsModel{

    CONST GETINSID         = "select * from eku_action where scriptid in (?)";

    CONST DELETEINSID      = "delete from eku_action where scriptid in (?)";

    CONST GETBYID          = "select * from eku_action where id = ?";

    CONST UPDATE           = "update eku_action set name=? , des=? where id=?";

    CONST CHECKUIQUE       = "select count(*) cnt from eku_action where scriptid = ? and name = ?";

    CONST INSERT           = "insert into eku_action (scriptid , name , des , createtime , createby) values (?,?,?,?,?)";

    CONST DELETE           = "delete from eku_action where id = ?";

    public function getInSID($input) {
        $this->_oMdb->fncPreparedStatement(self::GETINSID)
                    ->subSetNQSQL(1, implode(',', $input))
                    ->fncExcuteQuery();
        $output = array();
        while ($row = $this->_oMdb->fncGetRecordSet()) {
            $output[] = $row;
        }
        return $output;
    }

    public function delete($input) {
        $this->_oMdb->fncPreparedStatement(self::DELETE)
                    ->subSetInteger(1, $input->id)
                    ->fncExecuteUpdate();
        return !$this->_oMdb->isError();
    }

    public function deleteInSID($input) {
        $this->_oMdb->fncPreparedStatement(self::DELETEINSID)
                    ->subSetNQSQL(1, implode(',', $input))
                    ->fncExecuteUpdate();
        return !$this->_oMdb->isError();
    }

    public function update($input) {
        $i = 1;
        $this->_oMdb->fncPreparedStatement(self::UPDATE)
                    ->subSetString($i++, $input->name)
                    ->subSetString($i++, $input->des)
                    ->subSetInteger($i++, $input->id)
                    ->fncExecuteUpdate();
        return !$this->_oMdb->isError();
    }

    public function insert($input) {
        $i = 1;
        $this->_oMdb->fncPreparedStatement(self::INSERT)
                    ->subSetInteger($i++, $input->scriptid)
                    ->subSetString($i++, $input->name)
                    ->subSetString($i++, $input->des)
                    ->subSetString($i++, $input->createtime)
                    ->subSetInteger($i++, $input->createby)
                    ->fncExecuteUpdate();
        return !$this->_oMdb->isError();
    }

    public function getByID($input) {
        $i = 1;

        $this->_oMdb->fncPreparedStatement(self::GETBYID)
                    ->subSetInteger($i++, $input->id)
                    ->fncExcuteQuery();

        if ($row = $this->_oMdb->fncGetRecordSet()) {
            return $row;
        }
    }

    public function checkUnique($input) {
        $i = 1;

        $this->_oMdb->fncPreparedStatement(self::CHECKUIQUE)
                    ->subSetInteger($i++, $input->scriptid)
                    ->subSetString($i++, $input->name)
                    ->fncExcuteQuery();

        if ($row = $this->_oMdb->fncGetRecordSet()) {
            return $row['cnt'] < 1;
        }
    }
}