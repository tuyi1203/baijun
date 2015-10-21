<?php
class Mw_Friendlink extends clsModel{

    CONST INSERT     = "insert into mw_friendlink (title,link,createby,createtime)values (?,?,?,?)";

    CONST GETLIST    = "select a.* , b.url from mw_friendlink a left join (select url , objectid from mw_file b where objecttype=?) b on a.id = b.objectid left join ( select * from mw_relation where objecttype= ?) c on a.id = c.objectid";

    CONST GETCOUNT   = "select count(*) cnt from mw_friendlink a left join mw_relation b on a.id = b.objectid where b.objecttype=? and b.category =?";

    CONST GET        = "select a.* , b.url , b.id fileid , c.category from mw_friendlink a left join (select id , url , objectid from mw_file b where objecttype=? and objectid=? ) b on a.id = b.objectid left join (select * from mw_relation where objecttype=? and objectid=?) c on a.id = c.objectid where a.id=? ";

    CONST UPDATE     = "update mw_friendlink set title=? , link=? ,updateby=?,updatetime=? where id=?";

    CONST DELETE     = "delete from mw_friendlink where id = ?";

    CONST UPDATE_SORT  = "update mw_friendlink set sort=? where id = ?";

    public function insert($input) {

        $i = 1 ;

         $this->_oMdb->fncPreparedStatement(self::INSERT)
                    ->subSetString($i++ , $input->title)
                    ->subSetString($i++ , $input->link)
                    ->subSetInteger($i++ , $input->createby)
                    ->subSetString($i++ , $input->createtime)
                    ->fncExecuteUpdate();

       return !$this->_oMdb->isError();
    }

    public function getList($input) {
        $output = array();
        $i = 1;
        $where = "";
        $orderby = ' order by a.id asc';
        if (isset($input->category)) {
            $where = " where c.category = ?";
        }

        $this->_oMdb->fncPreparedStatement(self::GETLIST.$where.$orderby)
                    ->subSetLimit($input->start, $input->end)
                    ->subSetString($i++ , $input->objecttype)
                    ->subSetString($i++ , $input->objecttype);

        if (isset($input->category)) {
            $this->_oMdb->subSetInteger($i++,$input->category);
        }

        $this->_oMdb->fncExcuteQuery();

        while ($row = $this->_oMdb->fncGetRecordSet()) {
            $output[] = $row;
        }

        return $output;
    }

    public function getCount($input) {

        $i = 1;
        $this->_oMdb->fncPreparedStatement(self::GETCOUNT)
                    ->subSetString($i++ , $input->objecttype)
                    ->subSetInteger($i++, $input->category)
                    ->fncExcuteQuery();

        $row = $this->_oMdb->fncGetRecordSet();

        return $row['cnt'];
    }

    public function getById($input) {

        $i = 1;
        $this->_oMdb->fncPreparedStatement(self::GET)
                    ->subSetString($i++, $input->objecttype)
                    ->subSetInteger($i++, $input->objectid)
                    ->subSetString($i++, $input->objecttype)
                    ->subSetInteger($i++, $input->objectid)
                    ->subSetInteger($i++, $input->id)
                    ->fncExcuteQuery();

        $row = $this->_oMdb->fncGetRecordSet();

        return $row;

    }

    public function update($input) {

        $i = 1;

        $this->_oMdb->fncPreparedStatement(self::UPDATE)
                    ->subSetString($i++, $input->title)
                    ->subSetString($i++, $input->link)
                    ->subSetInteger($i++, $input->updateby)
                    ->subSetString($i++, $input->updatetime)
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


}