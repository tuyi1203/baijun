<?php
class Yjm_Set extends clsModel{

    CONST INSERT     = "insert into yjm_set (title,content,sort,homepage)values (?,?,?,?)";

    CONST GETLIST    = "select a.* , b.url , b.`primary` from yjm_set a left join (select url , objectid ,`primary` from mw_file b where objecttype=? and editor='0') b on a.id = b.objectid order by sort asc";

    CONST GETTOPLIST  = "select a.* , b.url  from (select * from yjm_set where homepage = '1') a left join (select url , objectid from mw_topimage b where objecttype=? ) b on a.id = b.objectid order by sort asc";

    CONST GETCOUNT   = "select count(*) cnt from yjm_set";

    CONST GET        = "select a.* , b.url , b.id fileid from yjm_set a left join (select id , url , objectid from mw_file b where objecttype=? and objectid=? and editor='0') b on a.id = b.objectid where a.id=? order by a.sort asc";

    CONST UPDATE     = " update yjm_set set ";
    CONST UPDATE_WHERE      = " where id=? ";

    CONST DELETE     = "delete from yjm_set where id = ?";

    CONST UPDATE_SORT  = "update yjm_set set sort=? where id = ?";

    public function insert($input) {

        $i = 1 ;

         $this->_oMdb->fncPreparedStatement(self::INSERT)
                    ->subSetString($i++ , $input->title)
                    ->subSetString($i++ , $input->content)
                    ->subSetInteger($i++ , $input->sort)
                    ->subSetString($i++ , $input->homepage)
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

    public function getTopList($input) {
    	$output = array();

    	$this->_oMdb->fncPreparedStatement(self::GETTOPLIST)
    				->subSetString(1 , $input->objecttype);

    	if (isset($input->start) and isset($input->end)) {
    		$this->_oMdb->subSetLimit($input->start, $input->end);
    	}

    	$this->_oMdb->fncExcuteQuery();

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
        $set = array();
        if (isset($input->title)) {
            $set[] = 'title=?';
        }
        if (isset($input->content)) {
            $set[] = 'content=?';
        }
        if (isset($input->homepage)) {
            $set[] = 'homepage=?';
        }
        if (isset($input->wxcontent)) {
            $set[] = 'wxcontent=?';
        }

        $this->_oMdb->fncPreparedStatement(self::UPDATE.implode(',', $set).self::UPDATE_WHERE);

        if (isset($input->title)) {
            $this->_oMdb->subSetString($i++, $input->title);
        }
        if (isset($input->content)) {
            $this->_oMdb->subSetString($i++, $input->content);
        }
        if (isset($input->homepage)) {
            $this->_oMdb->subSetString($i++, $input->homepage);
        }
        if (isset($input->wxcontent)) {
            $this->_oMdb->subSetString($i++, $input->wxcontent);
        }


        $this->_oMdb->subSetInteger($i++, $input->id)
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