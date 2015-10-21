<?php
class Mw_Set extends clsModel{

    CONST GET = "select * from mw_set where `key`=? and `subkey` in (?) ";

    CONST UPDATE  = "update mw_set set `value`=? where `key`=? and `subkey`= ?";


    public function get($input) {
        $i = 1;
// pr($input);
        $this->_oMdb->fncPreparedStatement(self::GET)
                    ->subSetString($i++, $input->key);

        if (is_array($input->subkey)) {
            $this->_oMdb->subSetNQSQL($i++, "'".implode("','",$input->subkey) ."'");
        } else {
            $this->_oMdb->subSetString($i++ , $input->subkey);
        }

        $this->_oMdb->fncExcuteQuery();

        $output = array();
        while ($row = $this->_oMdb->fncGetRecordSet()) {
            $output[] =  $row;
        }
        return $output;
    }

    public function update($input) {
        $i = 1;

        $this->_oMdb->fncPreparedStatement(self::UPDATE)
                    ->subSetString($i++, $input->value)
                    ->subSetString($i++, $input->key)
                    ->subSetString($i++, $input->subkey)
                    ->fncExecuteUpdate();

        return !$this->_oMdb->isError();
    }

}