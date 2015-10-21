<?php
class Eku_Role extends clsModel{

    CONST GET_LIST    = "select * from eku_role where id >= ? order by id ";

    public function getList($input) {

        $i = 1 ;

        $this->_oMdb->fncPreparedStatement(self::GET_LIST);

        if (isset($input->roleid))
            $this->_oMdb->subSetInteger($i++, $input->roleid);
        else
            $this->_oMdb->subSetInteger($i++, 0);

        $this->_oMdb->fncExcuteQuery();

        $output = array();
        while ($row = $this->_oMdb->fncGetRecordSet()) {
            $output[] = $row;
        }
        return $output;
    }

}