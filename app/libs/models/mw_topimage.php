<?php
class mw_topimage extends clsModel{

    CONST INSERT = "insert into mw_topimage (title , filename , filemd5name , filepath , url , ext , mimetype , size , width , height , createby , createtime , objecttype , objectid) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

    CONST UPDATEOBJECT = "update mw_topimage set objectid = ? , objecttype=? where id in(?)";

    CONST GETLIST = "select a.* , b.name from mw_topimage a left join eku_user_info b on a.createby = b.uid where a.objecttype=? and a.objectid = ? order by a.id asc";

    CONST SETPRIMARY = "update mw_topimage set `primary`=?";

    CONST DELETE = "delete from mw_topimage where id in (?)";

    CONST DELETEBYOBJECT = 'delete from mw_topimage where objecttype=? and objectid=?';

    CONST GETBYOBJECT = 'select * from mw_topimage where objecttype=? and objectid=?';

    CONST GETBYID = "select * from mw_topimage where id=?";

    CONST UPDATETITLE = "update mw_topimage set title=? where id=?";

    CONST UPDATEFILE = "update mw_topimage set title=? , filename = ? ,filemd5name = ?,filepath =?,url =?,ext =?,mimetype =?,size =?,width =?,height =?,updateby =?,updatetime =? where id=?";

    public function insert($input) {

        $i = 1 ;

         $this->_oMdb->fncPreparedStatement(self::INSERT)
                     ->subSetString($i++ , $input->title)
                     ->subSetString($i++ , $input->filename)
                     ->subSetString($i++ , $input->filemd5name)
                     ->subSetString($i++ , $input->filepath)
                     ->subSetString($i++ , $input->url)
                     ->subSetString($i++ , $input->ext)
                     ->subSetString($i++ , $input->mimetype)
                     ->subSetInteger($i++ , $input->size)
                     ->subSetInteger($i++ , $input->width)
                     ->subSetInteger($i++ , $input->height)
                     ->subSetString($i++ , $input->createby)
                     ->subSetString($i++ , $input->createtime);

         if (isset($input->objecttype)) {
             $this->_oMdb->subSetString($i++, $input->objecttype);
             $this->_oMdb->subSetInteger($i++, $input->objectid);
         } else {
             $this->_oMdb->subSetNull($i++);
             $this->_oMdb->subSetNull($i++);
         }

         $this->_oMdb->fncExecuteUpdate();

       return !$this->_oMdb->isError();
    }

    public function updateObject($input) {
        $i = 1 ;

        $this->_oMdb->fncPreparedStatement(self::UPDATEOBJECT)
                    ->subSetInteger($i++ , $input->objectid)
                    ->subSetString($i++ , $input->objecttype)
                    ->subSetNQSQL($i++ , $input->ids)
                    ->fncExecuteUpdate();
        return !$this->_oMdb->isError();
    }

    public function getList($input) {
        $i = 1;
        $output = array();

        $this->_oMdb->fncPreparedStatement(self::GETLIST)
                    ->subSetString($i++, $input->objecttype)
                    ->subSetInteger($i++, $input->objectid)
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

    public function deleteByObject($input) {
        $i = 1 ;

        $this->_oMdb->fncPreparedStatement(self::DELETEBYOBJECT)
                    ->subSetString($i++ , $input->objecttype)
                    ->subSetInteger($i++, $input->objectid)
                    ->fncExecuteUpdate();

        return !$this->_oMdb->isError();
    }

    public function update($input) {
        $i = 1;
        if (isset($input->filename)) {
            $sql = self::UPDATEFILE;
        } else {
            $sql = self::UPDATETITLE;
        }

        $this->_oMdb->fncPreparedStatement($sql);

        $this->_oMdb->subSetString($i++, $input->title);

        if (isset($input->filename)) {
            $this->_oMdb->subSetString($i++, $input->filename)
                        ->subSetString($i++, $input->filemd5name)
                        ->subSetString($i++, $input->filepath)
                        ->subSetString($i++, $input->url)
                        ->subSetString($i++, $input->ext)
                        ->subSetString($i++, $input->mimetype)
                        ->subSetInteger($i++, $input->size)
                        ->subSetInteger($i++, $input->width)
                        ->subSetInteger($i++, $input->height)
                        ->subSetInteger($i++, $input->updateby)
                        ->subSetString($i++, $input->updatetime);
        }
        $this->_oMdb->subSetInteger($i++, $input->id)
                    ->fncExecuteUpdate();

        return !$this->_oMdb->isError();
    }

    public function setPrimary($input) {

        if (isset($input->id)) {
            $where = ' where id = ?';
        }

        if (isset($input->objecttype)) {
            $where = ' where objecttype=? and objectid = ?';
        }

        $this->_oMdb->fncPreparedStatement(self::SETPRIMARY . $where);

        $i = 1;
        if (isset($input->id)) {
            $this->_oMdb->subSetString($i++, $input->primary);
            $this->_oMdb->subSetInteger($i++, $input->id);
        }

        if (isset($input->objecttype)) {
            $this->_oMdb->subSetString($i++,  $input->primary);
            $this->_oMdb->subSetString($i++,  $input->objecttype);
            $this->_oMdb->subSetInteger($i++, $input->objectid);
        }

        $this->_oMdb->fncExecuteUpdate();
        return !$this->_oMdb->isError();
    }

    public function delete($input) {
        $i = 1 ;

        $this->_oMdb->fncPreparedStatement(self::DELETE);

        if (!is_array($input->id)) $this->_oMdb->subSetInteger(1, $input->id);
        else $this->_oMdb->subSetNQSQL(1, implode(',', array_filter($input->id,'intval')));

        $this->_oMdb->fncExecuteUpdate();
        return !$this->_oMdb->isError();
    }

    public function getByObject($input) {
        $i = 1;

        $this->_oMdb->fncPreparedStatement(self::GETBYOBJECT)
                    ->subSetString($i++, $input->objecttype)
                    ->subSetString($i++, $input->objectid)
                    ->fncExcuteQuery();


        $row = $this->_oMdb->fncGetRecordSet();

        return empty($row)?array():$row;
    }


}
