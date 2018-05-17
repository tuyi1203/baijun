<?php
class Eku_User extends clsModel{

    const NOT_EXISTS_USER_CHECK = ' select count(*) cnt from `eku_user` where accout = ? ' ;
    const LOCKED_USER_CHECK = "select count(*) cnt from `eku_user` where accout = ? and lock_status = '1'";
    const LOGIN_SUCCESS_CHECK = "select count(*) cnt from `eku_user` where accout = ? and password = ?";
    const LOCK_USER = "update `eku_user` set lock_status = '1' , lock_time = current_timestamp() where accout = ?";
    const GET_USER = "select a.id , a.roleid , b.name from ( select * from  `eku_user` where delflg <> '1') a left join `eku_user_info` b on a.id = b.uid where a.accout = ? ";
    const UPDATE_PASSWORD = "update `eku_user` set password = ? where id = ?";
    const GET_ACCOUT = "select accout from `eku_user` where id = ?";
    const INSERT    = "insert into eku_user (accout , password , roleid ,createtime) values (?,?,?,?)";
    const DELETE    = "update eku_user set delflg = '1' where id=?";
    const UPDATE    = "update eku_user set ";

    public function __construct(clsMDB $a_oMdb , $a_stTableName)
    {
        parent::__construct($a_oMdb , $a_stTableName);
        //         $this->_stTableName = $a_stTableName;
    }

    public function fncNotExistsUserCheck($a_stUser)
    {
        $this->_oMdb->fncPreparedStatement(self::NOT_EXISTS_USER_CHECK)
			        ->subSetString(1, $a_stUser)
			        ->fncExcuteQuery();

        if (($row = $this->_oMdb->fncGetRecordSet()) && $row['cnt'] > 0) {
            return true ;
        }
        return false;
    }

    public function fncLockedUserCheck($a_stUser)
    {
        $this->_oMdb->fncPreparedStatement(self::LOCKED_USER_CHECK)
        ->subSetString(1, $a_stUser)
        ->fncExcuteQuery();
        if (($row = $this->_oMdb->fncGetRecordSet()) && $row['cnt'] > 0) {
            return true ;
        }
        return false;
    }

    public function fncLoginSuccessCheck($a_stUser , $a_stPassword)
    {
        $this->_oMdb->fncPreparedStatement(self::LOGIN_SUCCESS_CHECK)
        ->subSetString(1, $a_stUser)
        ->subSetString(2, $a_stPassword)
        ->fncExcuteQuery();
        if (($row = $this->_oMdb->fncGetRecordSet()) && $row['cnt'] == 1) {
            return true ;
        }
        return false;
    }

    public function subLockUser($a_stUser)
    {
        $l_iAffectRows = $this->_oMdb->fncPreparedStatement(self::LOCK_USER)
        ->subSetString(1, $a_stUser)
        ->fncExecuteUpdate();
        if ($l_iAffectRows < 1) {
            throw new clsSysException(__FILE__, __FUNCTION__ , clsAppXml::getErrorMsg('1007'));
        }
    }

    public function fncGetUser($a_stUser)
    {
        //echo "hello";
        $this->_oMdb->fncPreparedStatement(self::GET_USER)
                    ->subSetString(1, $a_stUser)
                    ->fncExcuteQuery();

        if ($row = $this->_oMdb->fncGetRecordSet()) {
            return $row;
        }
    }

    public function fncGetLoginId($a_stUser)
    {
        //echo "hello";
        $this->_oMdb->fncPreparedStatement(self::GET_ACCOUT)
        ->subSetString(1, $a_stUser)
        ->fncExcuteQuery();

        if ($row = $this->_oMdb->fncGetRecordSet()) {
            return $row['accout'];
        }
    }

    public function fncUpdatePassword($input) {

        $l_iAffectRows = $this->_oMdb->fncPreparedStatement(self::UPDATE_PASSWORD)
                                    ->subSetString(1, $input->password)
                                    ->subSetString(2, $input->id)
                                    ->fncExecuteUpdate();
        return !$this->_oMdb->isError();

    }

    public function update($input) {

    	$i = 1;
    	$set = array();
    	$where = " where id=?";
    	if (isset ($input->account)) {
    		$set[] = "accout=?";
    	}
    	if (isset ($input->password)) {
    		$set[] = "password=?";
    	}
    	if (isset ($input->roleid)) {
    		$set[] = "roleid=?";
    	}
    	if (isset ($input->lock_status)) {
    		$set[] = "lock_status=?";
    	}
    	if (isset ($input->updatetime)) {
    		$set[] = "updatetime=?";
    	}

    	$this->_oMdb->fncPreparedStatement(self::UPDATE . implode(',', $set) . $where);

    	if (isset ($input->account)) {
    		$this->_oMdb->subSetString($i++, $input->account);
    	}
    	if (isset ($input->password)) {
    		$this->_oMdb->subSetString($i++, $input->password);
    	}
    	if (isset ($input->roleid)) {
    		$this->_oMdb->subSetInteger($i++, $input->roleid);
    	}
    	if (isset ($input->lock_status)) {
    		$this->_oMdb->subSetString($i++, $input->lock_status);
    	}
    	if (isset ($input->updatetime)) {
    		$this->_oMdb->subSetString($i++, $input->updatetime);
    	}
    	$this->_oMdb->subSetInteger($i++, $input->id)
    				->fncExecuteUpdate();
    	return !$this->_oMdb->isError();
    }

    public function insert($input) {

    	$i = 1;
    	$this->_oMdb->fncPreparedStatement(self::INSERT)
    				->subSetString($i++, $input->account)
			    	->subSetString($i++, $input->password)
			    	->subSetInteger($i++, $input->roleid)
			    	->subSetString($i++, $input->createtime)
			    	->fncExecuteUpdate();

    	return !$this->_oMdb->isError();
    }

    public function delete($input) {

    	$i = 1;
    	$this->_oMdb->fncPreparedStatement(self::DELETE)
			    	->subSetString($i++, $input->id)
			    	->fncExecuteUpdate();

    	return !$this->_oMdb->isError();
    }

}