<?php
class Eku_Module extends clsModel{

    //     CONST INSERT = "INSERT INTO FILE (ID , MODULENAME , SCRIPTNAME , FILENAME , FILEMD5NAME , FILEPATH , EXT , MIMETYPE , SIZE , CREATEBY , CREATETIME) VALUES (?,?,?,?,?,?,?,?,?,?,?)";

    CONST GET_F_LIST    = "select a.id,a.mode,a.name ,a.des,a.des_en,a.sort , a.status ,a.ctrflg,a.menuflg,a.createtime,b.name username from eku_module a left join eku_user_info b on a.createby = b.uid where mode=? and parentid is null order by sort";

    CONST GET_S_LIST    = "select a.id,a.mode,a.name ,a.des,a.des_en,a.sort , a.status ,a.ctrflg,a.menuflg,a.createtime,b.name username from eku_module a left join eku_user_info b on a.createby = b.uid where parentid=? order by sort";

    CONST UPDATE_SORT   = "update eku_module set sort=? where id = ?";

//     CONST UPDATE_F      = "update eku_module set name=? , des=? , status=? where id=?";

    CONST UPDATE      = "update eku_module set name=? , des=? , des_en=? , status=? , ctrflg = ? , menuflg = ? where id=?";

//     CONST UPDATE_S      = "update eku_module set name=? ,des=? , status=? where id=?";

    CONST INSERT_F      = "insert into eku_module (id , mode , name , des , des_en , sort , ctrflg , menuflg , status , createtime , createby) values (?,?,?,?,?,?,?,?,?,now(),?)";

    CONST INSERT_S      = "insert into eku_module (id , mode , name , parentid , des , des_en , sort , ctrflg , menuflg, status , createtime , createby) values (?,?,?,?,?,?,?,?,?,?,now(),?)";

    CONST GETBYID       = "select * from eku_module where id = ?";

    CONST GETSBYID       = "select a.* , b.name pname , b.des pdes, b.des_en pdes_en , b.id pid from (select * from eku_module where id=? ) a  inner join eku_module b on a.parentid=b.id";

    CONST UNIQUE_NAME_F = "select count(id) cnt from eku_module where parentid is null and mode=? and name=? ";

    CONST UNIQUE_NAME_S = "select count(id) cnt from eku_module where parentid=? and name=?";

    CONST GETNEXTID     = "select ifnull(max(id),0)+1 id from eku_module ";

    CONST GETNEXTSORT_F = "select ifnull(max(sort),0)+1 sort from eku_module where parentid is null and ctrflg='1' and mode=?";

    CONST GETNEXTSORT_S = "select ifnull(max(sort),0)+1 sort from eku_module where parentid=? and ctrflg='1'";

    CONST DELETE        = "delete from eku_module where id=?";

    CONST GETBYPID      = "select * from eku_module where parentid=?";

    CONST DELETEBYPID   = "delete from eku_module where parentid=?";

    CONST NODATA_F      = "select count(id) cnt from eku_module where parentid is null";

    CONST NODATA_S      = "select count(id) cnt from eku_module where parentid is not null";

    CONST QUERY_MODEL_BYPUBLIST = "SELECT
                                    m.id, m.`mode`, m.`name`, md.`name` as parentname ,m.des  FROM eku_module m
                                    INNER JOIN eku_script s on s.moduleid = m.id
                                    INNER JOIN eku_action a on a.scriptid = s.id
                                    INNER JOIN eku_role_action  ra on ra.actionid = a.id
                                    INNER JOIN eku_user u on u.roleid = ra.roleid
                                    INNER JOIN eku_module md on md.id = m.parentid
                                    WHERE a.`name` = 'publish' and u.id = ? and m.`mode` = 'admin' and m.`status` = 1 and ra.operauth = '1'";


    public function queryModelByPublish($uid)
    {
        $i = 1 ;
        $sql = self::QUERY_MODEL_BYPUBLIST;

        $this->_oMdb->fncPreparedStatement($sql)
                    ->subSetInteger(1, $uid);
        $this->_oMdb->fncExcuteQuery();
        $output = array();
        while ($row = $this->_oMdb->fncGetRecordSet()) {
            $output[] = $row;
        }
        return $output;
    }

    public function getList($input) {

        $i = 1 ;
        //         $id = $this->getNextId();

        $sql = self::GET_F_LIST;

        if (isset($input->parentid)) $sql = self::GET_S_LIST;

        $this->_oMdb->fncPreparedStatement($sql);
// debug_print_backtrace();
        if (isset($input->parentid)) {
            $this->_oMdb->subSetInteger($i++, $input->parentid);
        } else {
            $this->_oMdb->subSetString($i++ , $input->mode);
        }

        $this->_oMdb->fncExcuteQuery();

        $output = array();
        while ($row = $this->_oMdb->fncGetRecordSet()) {
            $output[] = $row;
        }
        return $output;
    }

    public function saveSort($input) {

        $i = 1;
        $iAll = $this->_oMdb->fncPreparedStatement(self::UPDATE_SORT)
                            ->subSetInteger($i++ , $input->sort)
                            ->subSetInteger($i++, $input->id)
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

    public function getSByID($input) {
        $i = 1;

        $this->_oMdb->fncPreparedStatement(self::GETSBYID)
                    ->subSetInteger($i++, $input->id)
                    ->fncExcuteQuery();

        if ($row = $this->_oMdb->fncGetRecordSet()) {
            return $row;
        }
    }

    public function insert($input) {
        $i = 1;
        $nextid   = $this->getNextID();
        $nextsort = $this->getNextSort($input);

        $sql = self::INSERT_F;

        if (isset($input->parentid)) $sql = self::INSERT_S;

        $this->_oMdb->fncPreparedStatement($sql)
                    ->subSetInteger($i++, $nextid)
                    ->subSetString($i++, $input->mode)
                    ->subSetString($i++, $input->name);

        if (isset($input->parentid))
        $this->_oMdb->subSetInteger($i++, $input->parentid);
// pr("koko");
        $this->_oMdb->subSetString($i++, $input->des)
        			->subSetString($i++, $input->des_en)
                    ->subSetInteger($i++, $nextsort)
                    ->subSetString($i++, $input->ctrflg)
                    ->subSetString($i++, $input->menuflg)
                    ->subSetString($i++, $input->status)
                    ->subSetInteger($i++, getUid())
                    ->fncExecuteUpdate();
        return !$this->_oMdb->isError();
    }

    /**
     * 取得下一个序号
     * @param object $input
     * @return Ambigous <>
     */
    private function getNextSort($input) {

        $sql = self::GETNEXTSORT_F;

        if (isset($input->parentid)) $sql = self::GETNEXTSORT_S;

        $this->_oMdb->fncPreparedStatement($sql);

        if (isset($input->parentid)) {
            $this->_oMdb->subSetInteger(1, $input->parentid);
        } else {
            $this->_oMdb->subSetString(1, $input->mode);
        }


        $this->_oMdb->fncExcuteQuery();
        $row = $this->_oMdb->fncGetRecordSet();
        return $row['sort'];
    }

    /**
     * 取得下一个id
     * @return Ambigous <>
     */
    private function getNextID() {
        $this->_oMdb->fncPreparedStatement(self::GETNEXTID)
                    ->fncExcuteQuery();
        $row = $this->_oMdb->fncGetRecordSet();
        return $row['id'];
    }

    public function getByPID($input) {
        $this->_oMdb->fncPreparedStatement(self::GETBYPID)
                    ->subSetInteger(1, $input->id)
                    ->fncExcuteQuery();
        $output = array();
        while ($row = $this->_oMdb->fncGetRecordSet()) {
            $output[] = $row;
        }
        return $output;
    }

    public function deleteByPID($input) {
        $this->_oMdb->fncPreparedStatement(self::DELETEBYPID)
                    ->subSetInteger(1, $input->id)
                    ->fncExecuteUpdate();
        return !$this->_oMdb->isError();
    }

    public function update($input) {
        $i = 1;

//         $sql = self::UPDATE_F;

//         if (isset($input->parentid)) $sql = self::UPDATE_S;

//         $this->_oMdb->fncPreparedStatement($sql)
        $this->_oMdb->fncPreparedStatement(self::UPDATE)
                    ->subSetString($i++, $input->name)

//         if (isset($input->parentid))
//             $this->_oMdb->subSetInteger($i++, $input->parentid);

//         $this->_oMdb->subSetString($i++, $input->des)
                    ->subSetString($i++, $input->des)
                    ->subSetString($i++, $input->des_en)
                    ->subSetString($i++, $input->status)
                    ->subSetString($i++, $input->ctrflg)
                    ->subSetString($i++, $input->menuflg)
                    ->subSetInteger($i++, $input->id)
                    ->fncExecuteUpdate();
        return !$this->_oMdb->isError();
    }

    public function delete($input) {
        $this->_oMdb->fncPreparedStatement(self::DELETE)
                    ->subSetInteger(1, $input->id)
                    ->fncExecuteUpdate();
        return !$this->_oMdb->isError();
    }

    /**
     * 判断name是否为唯一
     * @param object $input
     * @return multitype:
     */
    public function uniqueName($input) {
        $i = 1;

        $sql = self::UNIQUE_NAME_F;
        if (isset($input->parentid)) $sql = self::UNIQUE_NAME_S;

        $this->_oMdb->fncPreparedStatement($sql);
        if (isset($input->parentid)) {
            $this->_oMdb->subSetInteger($i++, $input->parentid);
        } else {
            $this->_oMdb->subSetString($i++, $input->mode);
        }

        $this->_oMdb->subSetString($i++, $input->name)
                    ->fncExcuteQuery();

        if ($row = $this->_oMdb->fncGetRecordSet())
            if ($row['cnt'] < 1 )  return true;
        return false;
    }

    public function noData($input) {

        $sql = self::NODATA_F;
        if (isset($input->parentid)) $sql = self::NODATA_S;

        $this->_oMdb->fncPreparedStatement($sql)
                    ->fncExcuteQuery();

        $row = $this->_oMdb->fncGetRecordSet();
        if ($row['cnt'] < 1 )  return true;
        return false;
    }
}