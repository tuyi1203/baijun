<?php
class Mw_Honor extends clsModel{

    CONST INSERT     = "insert into mw_honor (title,link,label,`desc`,createby,createtime)values (?,?,?,?,?,?)";

    //CONST GETLIST    = "select a.* , b.url , b.`primary` from mw_honor a left join (select url , objectid ,`primary` from mw_file b where objecttype=? and editor='0') b on a.id = b.objectid order by sort asc";

    CONST GETLIST    = "select * from mw_honor order by sort asc";

    CONST GETCOUNT   = "select count(*) cnt from mw_honor";

    CONST GET        = "select a.* , b.url , b.id fileid from mw_honor a left join (select id , url , objectid from mw_file b where objecttype=? and objectid=? and editor='0') b on a.id = b.objectid where a.id=? order by a.sort asc";

    CONST UPDATE     = "update mw_honor set title=? , link=? , label=?,`desc`=?,updateby=?,updatetime=? where id=?";

    CONST DELETE     = "delete from mw_honor where id = ?";

    CONST UPDATE_SORT  = "update mw_honor set sort=? where id = ?";

    public function insert($input) {

        $i = 1 ;

         $this->_oMdb->fncPreparedStatement(self::INSERT)
                    ->subSetString($i++ , $input->title);

         if (isset($input->link))  {
         	$this->_oMdb->subSetString($i++, $input->link);
         } else {
         	$this->_oMdb->subSetNull($i++);
         }

         if (isset($input->label)) {
         	$this->_oMdb->subSetString($i++, $input->label);
         } else {
         	$this->_oMdb->subSetNull($i++);
         }

         if (isset($input->desc)) {
         	$this->_oMdb->subSetString($i++, $input->desc);
         } else {
         	$this->_oMdb->subSetNull($i++);
         }
         $this->_oMdb->subSetInteger($i++ , $input->createby)
                     ->subSetString($i++ , $input->createtime)
                     ->fncExecuteUpdate();

       return !$this->_oMdb->isError();
    }

    public function getList($input) {
        $output = array();

        $this->_oMdb->fncPreparedStatement(self::GETLIST)
                    //->subSetString(1 , $input->objecttype)
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
                    ->subSetString($i++, $input->title);
        if (isset($input->link))  {
        	$this->_oMdb->subSetString($i++, $input->link);
        } else {
        	$this->_oMdb->subSetNull($i++);
        }

        if (isset($input->label)) {
        	$this->_oMdb->subSetString($i++, $input->label);
        } else {
        	$this->_oMdb->subSetNull($i++);
        }

        if (isset($input->desc)) {
        	$this->_oMdb->subSetString($i++, $input->desc);
        } else {
        	$this->_oMdb->subSetNull($i++);
        }
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