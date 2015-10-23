<?php
class Mw_Top extends clsModel{

    CONST INSERT     = "insert into mw_top (title,link,label,`desc`,category,content,objecttype,createby,createtime)values (?,?,?,?,?,?,?,?,?)";

    CONST GETLIST    = "select a.* , b.url , c.name stylename from mw_top a left join (select url , objectid from mw_topimage b where objecttype=?) b on a.id = b.objectid left join (select id , name , sort from mw_category where objecttype='topcasestyle') c on a.category = c.id where a.objecttype=? ";

    CONST GETCOUNT   = "select count(*) cnt from mw_top where objecttype=?";

    CONST GET        = "select a.* , b.url , b.id fileid from mw_top a left join (select id , url , objectid from mw_topimage b where objecttype=? and objectid=? ) b on a.id = b.objectid where a.id=? order by a.sort asc";

    CONST UPDATE     = "update mw_top set title=? , link=? , label=?,`desc`=?,category=?,content=?,updateby=?,updatetime=? where id=?";

    CONST DELETE     = "delete from mw_top where id = ?";

    CONST UPDATE_SORT  = "update mw_top set sort=? where id = ?";

    public function insert($input) {

        $i = 1 ;

         $this->_oMdb->fncPreparedStatement(self::INSERT)
                    ->subSetString($i++ , $input->title)
                    ->subSetString($i++ , $input->link)
                    ->subSetString($i++ , $input->label)
                    ->subSetString($i++ , $input->desc);
         if(isset($input->category)) {
             $this->_oMdb->subSetInteger($i++, $input->category);
         } else {
             $this->_oMdb->subSetNull($i++);
         }
         if(isset($input->content)) {
             $this->_oMdb->subSetString($i++, $input->content);
         } else {
             $this->_oMdb->subSetNull($i++);
         }
        $this->_oMdb->subSetString($i++ , $input->objecttype)
                    ->subSetInteger($i++ , $input->createby)
                    ->subSetString($i++ , $input->createtime)
                    ->fncExecuteUpdate();

       return !$this->_oMdb->isError();
    }

    public function getList($input) {
        $i = 1;
        $output = array();
        $and = "";
        $orderby = ' order by c.sort asc , a.sort asc';
        if(isset($input->category)) {
            $and = ' and a.category = ?';
        }
        $this->_oMdb->fncPreparedStatement(self::GETLIST . $and . $orderby)
                    ->subSetString($i++ , $input->objecttype)
                    ->subSetString($i++ , $input->objecttype);
        if(isset($input->category)) {
            $this->_oMdb->subSetString($i++ , $input->category);
        }
        $this->_oMdb->fncExcuteQuery();

        while ($row = $this->_oMdb->fncGetRecordSet()) {
            $output[] = $row;
        }

        return $output;
    }

    public function getCount($input) {

        $i = 1;

        $and = "";
        if(isset($input->category)) {
            $and = ' and category = ?';
        }
//         pr();exit;
        $this->_oMdb->fncPreparedStatement(self::GETCOUNT . $and)
                    ->subSetString($i++ , $input->objecttype);
        if(isset($input->category)) {
            $this->_oMdb->subSetString($i++ , $input->category);
        }

        $this->_oMdb->fncExcuteQuery();

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
                    ->subSetString($i++, $input->desc);
        if(isset($input->category)) {
            $this->_oMdb->subSetInteger($i++, $input->category);
        } else {
            $this->_oMdb->subSetNull($i++);
        }
        if(isset($input->content)) {
            $this->_oMdb->subSetString($i++, $input->content);
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