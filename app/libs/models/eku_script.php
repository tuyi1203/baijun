<?php
class Eku_Script extends clsModel{

    CONST GETINMID         = "select * from eku_script where moduleid in (?)";

    CONST DELETEINMID      = "delete from eku_script where moduleid in (?)";

    CONST GETLIST          = "select a.* , b.name username from eku_script a left join eku_user_info b on a.createby = b.uid where a.moduleid = ? order by id";

    CONST GETBYID          = "select a.* , b.id sid, b.mode , b.name sname , b.des ses , c.id pid ,  c.name pname , c.des pes from ( select * from eku_script where id = ?) a left join eku_module b on a.moduleid = b.id left join eku_module c on b.parentid = c.id";

    CONST UPDATE           = "update eku_script set name=? , des=? where id=?";

    CONST INSERT           = "insert into eku_script (moduleid , name , des , createtime , createby) values(?,?,?,?,?)";

    CONST CHECKUIQUE       = "select count(*) cnt from eku_script where moduleid = ? and name = ?";

    CONST DELETE           = "delete from eku_script where id = ?";

    CONST GETSCRIPTACTIONROLELIST = "select       a.id sid,   	a.name sname,  	a.des sdes ,   	b.id aid,  	b.name aname,  	b.des ades,  	c.roleid ,  	c.operauth   , d.name username	  from      (select           *      from          eku_script      where          moduleid = ?) a          left join      (select           *      from          eku_action) b ON b.scriptid = a.id          left join      (select           *      from          eku_role_action) c ON c.actionid = b.id    left join eku_user_info d on a.createby = d.uid order by a.id , b.id ";

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
                    ->subSetInteger($i++, $input->sid)
                    ->subSetString($i++, $input->name)
                    ->fncExcuteQuery();

        if ($row = $this->_oMdb->fncGetRecordSet()) {
            return $row['cnt'] < 1;
        }
    }

    public function insert($input) {
        $i = 1;

        $this->_oMdb->fncPreparedStatement(self::INSERT)
                    ->subSetInteger($i++, $input->sid)
                    ->subSetString($i++, $input->name)
                    ->subSetString($i++, $input->des)
                    ->subSetString($i++, $input->createtime)
                    ->subSetInteger($i++,$input->createby)
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

    public function getList($input) {
        $this->_oMdb->fncPreparedStatement(self::GETINMID)
                    ->subSetInteger(1, $input->secondid)
                    ->fncExcuteQuery();
        $output = array();
        while ($row = $this->_oMdb->fncGetRecordSet()) {
            $output[] = $row;
        }
        return $output;
    }

    public function getScriptActionRoleList($input) {
        $this->_oMdb->fncPreparedStatement(self::GETSCRIPTACTIONROLELIST)
                    ->subSetInteger(1, $input->secondid)
                    ->fncExcuteQuery();
        $output = array();
        while ($row = $this->_oMdb->fncGetRecordSet()) {
            $output[] = $row;
        }
        return $output;
    }

    public function getInMID($input) {
        $this->_oMdb->fncPreparedStatement(self::GETINMID)
                    ->subSetNQSQL(1, implode(',', $input))
                    ->fncExcuteQuery();
        $output = array();
        while ($row = $this->_oMdb->fncGetRecordSet()) {
            $output[] = $row;
        }
        return $output;
    }

    public function deleteInMID($input) {
        $this->_oMdb->fncPreparedStatement(self::DELETEINMID)
                    ->subSetNQSQL(1, implode(',', $input))
                    ->fncExecuteUpdate();
        return !$this->_oMdb->isError();
    }

    public function delete($input) {
        $this->_oMdb->fncPreparedStatement(self::DELETE)
                    ->subSetInteger(1, $input->id)
                    ->fncExecuteUpdate();
        return !$this->_oMdb->isError();
    }

}