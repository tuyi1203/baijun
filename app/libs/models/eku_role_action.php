<?php
class Eku_Role_Action extends clsModel{

    //     CONST INSERT = "INSERT INTO FILE (ID , MODULENAME , SCRIPTNAME , FILENAME , FILEMD5NAME , FILEPATH , EXT , MIMETYPE , SIZE , CREATEBY , CREATETIME) VALUES (?,?,?,?,?,?,?,?,?,?,?)";

    CONST GET_ACTION_LIST  = "select      a.id pid,     b.id cid,     c.id sid,     d.id aid, 	a.mode mode,     a.name pname,     b.name cname,     c.name sname,     d.name aname,     concat(a.name,             '/',             b.name,             '/',             c.name,             '/',             d.name) url,     e.roleid,     e.operauth from     (select          id,mode, name, des, parentid     from         eku_module     where         parentid is null             and status = '1') a         inner join     (select          id, name, des, parentid     from         eku_module     where         parentid is not null             and status = '1') b on a.id = b.parentid         inner join     (select          id, moduleid, name     from         eku_script) c on b.id = c.moduleid         inner join     (select          id, scriptid, name     from         eku_action) d on c.id = d.scriptid         inner join     (select          actionid, roleid, operauth     from         eku_role_action     where         roleid = ?) e on d.id = e.actionid";

    CONST GET_MENU_LIST    = "select      a.id pid,     b.id cid,     c.id sid,     d.id aid, 	a.mode mode ,     a.name fname,     b.name sname,     a.sort sort1,     b.sort sort2,     a.des des1,  a.des_en des1_en,   b.des des2, b.des_en des2_en ,   concat(a.name,             '/',             b.name,             '/',             c.name,             '/',             d.name) url from     (select          id, name, des, des_en , parentid, sort , mode     from         eku_module     where         parentid is null              and status = '1'             and menuflg = '1') a         inner join     (select          id, name, des, des_en ,  parentid, sort     from         eku_module     where         parentid is not null             and status = '1'             and menuflg = '1') b on a.id = b.parentid         inner join     (select          id, moduleid, name     from         eku_script     where         name = 'default') c on b.id = c.moduleid         inner join     (select          id, scriptid, name     from         eku_action     where         name = 'default') d on c.id = d.scriptid         inner join     (select          actionid, roleid, operauth     from         eku_role_action     where         roleid = ? and operauth = 1) e on d.id = e.actionid order by a.mode, a.sort , b.sort";

    CONST DELETEINAID      = "delete from eku_role_action where actionid in (?)";

    CONST GETINAID      = "select * from eku_role_action where actionid in (?)";

    CONST INSERT          = "insert into eku_role_action (actionid , roleid , operauth) value (?,?,?)";

    CONST REPLACE         = "replace into eku_role_action (actionid , roleid , operauth) value (?,?,?)";

    CONST UPDATE          = "update eku_role_action set operauth = ? where actionid = ? and roleid = ?";

    public function __construct($a_oMdb, $a_stTableName){

        parent::__construct($a_oMdb, $a_stTableName);
    }

    public function fncGetList($a_aInput) {

        $i = 1 ;

        $this->_oMdb->fncPreparedStatement(self::GET_ACTION_LIST)
//                     ->subSetString($i++ , $a_aInput['mode'])
//                     ->subSetString($i++ , $a_aInput['mode'])
                    ->subSetInteger($i++ , $a_aInput['roleid'])
                    ->fncExcuteQuery();

        $l_aOutput = array();
        while ($row = $this->_oMdb->fncGetRecordSet()) {
            $l_aOutput[] = $row;
        }
        return $l_aOutput;
    }

    public function fncGetMenuList($a_aInput) {

        $i = 1 ;

        $this->_oMdb->fncPreparedStatement(self::GET_MENU_LIST)
//                     ->subSetString($i++ , $a_aInput['mode'])
//                     ->subSetString($i++ , $a_aInput['mode'])
                    ->subSetInteger($i++ , $a_aInput['roleid'])
                    ->fncExcuteQuery();

        $l_aOutput = array();
        while ($row = $this->_oMdb->fncGetRecordSet()) {
            $l_aOutput[] = $row;
        }

        return $l_aOutput;
    }

    public function insert($input) {
        $i = 1;

        $this->_oMdb->fncPreparedStatement(self::INSERT)
                    ->subSetInteger($i++, $input->actionid)
                    ->subSetInteger($i++, $input->roleid)
                    ->subSetString($i++, $input->operauth)
                    ->fncExecuteUpdate();
        return !$this->_oMdb->isError();
    }

    public function update($input) {
        $i = 1;

        $this->_oMdb->fncPreparedStatement(self::UPDATE)
                    ->subSetString($i++, $input->operauth)
                    ->subSetInteger($i++, $input->actionid)
                    ->subSetInteger($i++, $input->roleid)
                    ->fncExecuteUpdate();
        return !$this->_oMdb->isError();
    }

    public function replace($input) {
        $i = 1;

        $this->_oMdb->fncPreparedStatement(self::REPLACE)
                    ->subSetInteger($i++, $input->actionid)
                    ->subSetInteger($i++, $input->roleid)
                    ->subSetString($i++, $input->operauth)
                    ->fncExecuteUpdate();
        return !$this->_oMdb->isError();
    }

    //     private function getNextId() {

    //     	$this->_oMdb->fncPreparedStatement(self::GET_NEXT_ID)
    //     	            ->fncExcuteQuery();

    //     	if ($row = $this->_oMdb->fncGetRecordSet()) {
    //     		//                 echo $row['ID'];
    //     		return  $row['ID'];

    //     	}

    //     }

    public function getInSID($input) {
        $this->_oMdb->fncPreparedStatement(self::GETINAID)
                    ->subSetNQSQL(1, implode(',', $input))
                    ->fncExcuteQuery();
        $output = array();
        while ($row = $this->_oMdb->fncGetRecordSet()) {
            $output[] = $row;
        }
        return $output;
    }

    public function deleteInAID($input) {
        $this->_oMdb->fncPreparedStatement(self::DELETEINAID)
                    ->subSetNQSQL(1, implode(',', $input))
                    ->fncExecuteUpdate();
        return !$this->_oMdb->isError();
    }

}