<?php
class Mw_Event extends clsModel{

    CONST INSERT     = "insert into mw_event (title,objecttype,keyword,`desc`,status , content , sort , createby,createtime)values (?,?,?,?,?,?,?,?,?)";

    CONST GETLIST    = "select a.* , b.url from (select * from mw_event where objecttype=? ?) a left join (select url , objectid ,`primary` from mw_file b where objecttype=?) b on a.id = b.objectid order by a.sort asc";

    CONST GETCOUNT   = "select count(*) cnt from mw_event where objecttype=?";

    CONST GET        = "select a.* , b.url , b.id fileid from mw_event a left join (select id , url , objectid from mw_file b where objecttype=? and objectid=? ) b on a.id = b.objectid where a.id=? ";

    CONST UPDATE     = "update mw_event set title=? , keyword=? ,`desc`=?,status=?,content=?,updateby=?,updatetime=? where id=?";

    CONST DELETE     = "delete from mw_event where id = ?";

    CONST UPDATE_SORT  = "update mw_event set sort=? where id = ?";

    public function insert($input) {

        $i = 1 ;

         $this->_oMdb->fncPreparedStatement(self::INSERT)
                    ->subSetString($i++ , $input->title)
                    ->subSetString($i++ , $input->objecttype)
                    ->subSetString($i++ , $input->keyword)
                    ->subSetString($i++ , $input->desc)
                    ->subSetString($i++ , $input->status);

         if (isset($input->content))
             $this->_oMdb->subSetString($i++, $input->content);
         else
             $this->_oMdb->subSetNull($i++);

         $this->_oMdb->subSetInteger($i++ , $input->createby)
                     ->subSetInteger($i++ , $input->sort)
                     ->subSetString($i++ , $input->createtime)
                     ->fncExecuteUpdate();

       return !$this->_oMdb->isError();
    }

    public function getList($input) {
        $i = 1;
        $output = array();

        $this->_oMdb->fncPreparedStatement(self::GETLIST)
                    ->subSetString($i++ , $input->eventobjecttype);

        if (isset($input->status))
            $this->_oMdb->subSetNQSQL($i++, " and status='" . $input->status . "'");
        else
            $this->_oMdb->subSetNQSQL($i++, "");

        $this->_oMdb->subSetString($i++ , $input->fileobjecttype)
                    ->fncExcuteQuery();

        while ($row = $this->_oMdb->fncGetRecordSet()) {
            $output[] = $row;
        }

        return $output;
    }

    public function getCount($input) {

//         $i = 1;
        $this->_oMdb->fncPreparedStatement(self::GETCOUNT)
                    ->subSetString(1 , $input->eventobjecttype)
                    ->fncExcuteQuery();

        $row = $this->_oMdb->fncGetRecordSet();

        return $row['cnt'];
    }

    public function getById($input) {

        $i = 1;
        $this->_oMdb->fncPreparedStatement(self::GET)
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
                    ->subSetString($i++, $input->keyword)
                    ->subSetString($i++, $input->desc)
                    ->subSetString($i++, $input->status);

        if (isset($input->content))
            $this->_oMdb->subSetString($i++, $input->content);
        else
            $this->_oMdb->subSetNull($i++);

        $this->_oMdb->subSetInteger($i++, $input->updateby)
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

    public function saveSort($input) {

        $i = 1;
        $iAll = $this->_oMdb->fncPreparedStatement(self::UPDATE_SORT)
                            ->subSetInteger($i++ , $input->sort)
                            ->subSetInteger($i++, $input->id)
                            ->fncExecuteUpdate();
        return !$this->_oMdb->isError();


    }

}