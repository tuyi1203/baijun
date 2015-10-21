<?php
class Yjm_Message extends clsModel{

    CONST INSERT     = "insert into yjm_message (name,tel,content,createtime)values (?,?,?,?)";

    CONST GETLIST    = "select * from yjm_message" ;

    CONST GETCOUNT   = "select count(*) cnt from yjm_message";

    CONST GET        = "select * from yjm_message where id=?";

    CONST DELETE     = "delete from yjm_message where id =?";

    public function insert($input) {

        $i = 1 ;

         $this->_oMdb->fncPreparedStatement(self::INSERT)
                    ->subSetString($i++ , $input->name)
                    ->subSetString($i++ , $input->tel)
                    ->subSetString($i++ , $input->content)
                    ->subSetString($i++ , $input->createtime)
                    ->fncExecuteUpdate();

       return !$this->_oMdb->isError();
    }

    public function getList($input) {
        $output = array();

        $orderby = ' order by id desc';
        $this->_oMdb->fncPreparedStatement(self::GETLIST . $orderby)
                    ->subSetLimit($input->start, $input->end)
                    ->fncExcuteQuery();

        while ($row = $this->_oMdb->fncGetRecordSet()) {
            $output[] = $row;
        }

        return $output;
    }

    public function getCount($input) {

//         $i = 1;
        $this->_oMdb->fncPreparedStatement(self::GETCOUNT)
                    ->fncExcuteQuery();

        $row = $this->_oMdb->fncGetRecordSet();

        return $row['cnt'];
    }

    public function get($input) {

        $this->_oMdb->fncPreparedStatement(self::GET)
                    ->subSetInteger(1, $input->id)
                    ->fncExcuteQuery();

        $row = $this->_oMdb->fncGetRecordSet();

        return $row;

    }

    public function delete($input) {
        $this->_oMdb->fncPreparedStatement(self::DELETE)
                    ->subSetInteger(1, $input->id)
                    ->fncExecuteUpdate();

        return !$this->_oMdb->isError();
    }
}