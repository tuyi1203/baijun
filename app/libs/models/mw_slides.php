<?php
class Mw_Slides extends clsModel{

    CONST INSERT     = "insert into mw_slides (title,link,label,`desc`,summary,createby,createtime)values (?,?,?,?,?,?,?)";

    CONST GETLIST    = "select a.* , b.url , b.`primary` from mw_slides a left join (select url , objectid ,`primary` from mw_file b where objecttype=? and editor='0') b on a.id = b.objectid order by sort asc";

    CONST GETCOUNT   = "select count(*) cnt from mw_slides";

    CONST GET        = "select a.* , b.url , b.id fileid from mw_slides a left join (select id , url , objectid from mw_file b where objecttype=? and objectid=? and editor='0') b on a.id = b.objectid where a.id=? order by a.sort asc";

    CONST UPDATE     = "update mw_slides set title=? , link=? , label=?,`desc`=?,summary=?,updateby=?,updatetime=? where id=?";

    CONST DELETE     = "delete from mw_slides where id = ?";

    CONST UPDATE_SORT  = "update mw_slides set sort=? where id = ?";

    public function insert($input) {

        $i = 1 ;

         $this->_oMdb->fncPreparedStatement(self::INSERT)
                    ->subSetString($i++ , $input->title)
                    ->subSetString($i++ , $input->link)
                    ->subSetString($i++ , $input->label)
                    ->subSetString($i++ , $input->desc)
                    ->subSetString($i++ , $input->summary)
                    ->subSetInteger($i++ , $input->createby)
                    ->subSetString($i++ , $input->createtime)
                    ->fncExecuteUpdate();

       return !$this->_oMdb->isError();
    }

    public function getList($input) {
        $output = array();

        $this->_oMdb->fncPreparedStatement(self::GETLIST)
                    ->subSetString(1 , $input->objecttype)
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
                    ->subSetString($i++, $input->link)
                    ->subSetString($i++, $input->label)
                    ->subSetString($i++, $input->desc)
                    ->subSetString($i++, $input->summary)
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

    public function saveSort($input) {

        $i = 1;
        $iAll = $this->_oMdb->fncPreparedStatement(self::UPDATE_SORT)
                            ->subSetInteger($i++ , $input->sort)
                            ->subSetInteger($i++, $input->id)
                            ->fncExecuteUpdate();
        return !$this->_oMdb->isError();


    }

}