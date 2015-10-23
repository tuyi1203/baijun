<?php
class Mw_Category extends clsModel{

    CONST INSERT  = "insert into mw_category (name  ,`desc` , objecttype , `sort` , parent , link , funcflg , createby , createtime) values (?,?,?,?,?,?,?,?,?)";

    CONST UPDATE  = "update mw_category set name = ? , `desc`=?,parent=? ,updateby=? , updatetime =?  where id=?";

    CONST GETLIST = "select a.* , b.name createname from mw_category a left join eku_user_info b on a.createby = b.uid where a.objecttype=? order by a.sort asc , a.id";

    CONST DELETE  = "delete from mw_category where id=?";

    CONST GETBYID = "select * from mw_category where id=?";

    CONST COUNT = "select count(*) cnt from mw_category where objecttype=?";

    CONST SAVESORT = "update mw_category set sort=? where id=?";

    public function insert($input) {

        $i = 1 ;

         $this->_oMdb->fncPreparedStatement(self::INSERT)
                     ->subSetString($i++ , $input->name)
                     ->subSetString($i++ , $input->desc)
                     ->subSetString($i++, $input->objecttype)
                     ->subSetInteger($i++, $input->sort);


         if (isset($input->parent)) {
             $this->_oMdb->subSetInteger($i++, $input->parent);
         } else {
             $this->_oMdb->subSetNull($i++);
         }

         if (isset($input->link)) {
             $this->_oMdb->subSetString($i++, $input->link);
         } else {
             $this->_oMdb->subSetNull($i++);
         }

         if (isset($input->funcflg)) {
             $this->_oMdb->subSetString($i++, $input->funcflg);
         } else {
             $this->_oMdb->subSetNull($i++);
         }

         $this->_oMdb->subSetString($i++ , $input->createby)
                     ->subSetString($i++ , $input->createtime)
                     ->fncExecuteUpdate();

       return !$this->_oMdb->isError();
    }

    public function getList($input) {
        $i = 1;
        $output = array();

        $this->_oMdb->fncPreparedStatement(self::GETLIST)
                    ->subSetString($i++, $input->objecttype)
                    ->fncExcuteQuery();

        while ($row = $this->_oMdb->fncGetRecordSet()) {
            $output[] = $row;
        }

        return $output;
    }

    public function getByID($input) {
        $i = 1;

        $this->_oMdb->fncPreparedStatement(self::GETBYID)
                    ->subSetInteger($i++, $input->id)
                    ->fncExcuteQuery();

        $row = $this->_oMdb->fncGetRecordSet();

        return $row;
    }

    public function update($input) {

        $i = 1;

        $this->_oMdb->fncPreparedStatement(self::UPDATE)
                    ->subSetString($i++, $input->name)
                    ->subSetString($i++, $input->desc);

        if (isset($input->parent)) {
            $this->_oMdb->subSetInteger($i++, $input->parent);
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
        $i = 1 ;

        $this->_oMdb->fncPreparedStatement(self::DELETE)
                    ->subSetInteger($i++ , $input->id)
                    ->fncExecuteUpdate();
        return !$this->_oMdb->isError();
    }

    public function getCount($input) {

        $this->_oMdb->fncPreparedStatement(self::COUNT)
                    ->subSetString(1, $input->objecttype)
                    ->fncExcuteQuery();

        $row = $this->_oMdb->fncGetRecordSet();

        return $row['cnt'];

    }

    public function saveSort($input) {
    	$i = 1 ;

    	$this->_oMdb->fncPreparedStatement(self::SAVESORT)
    		 ->subSetInteger($i++, $input->sort)
	    	 ->subSetInteger($i++ , $input->id)
	    	 ->fncExecuteUpdate();
    	return !$this->_oMdb->isError();
    }


}
