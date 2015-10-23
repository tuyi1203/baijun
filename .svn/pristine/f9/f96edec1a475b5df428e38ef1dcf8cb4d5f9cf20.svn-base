<?php
class Yjm_Person extends clsModel{

    CONST INSERT     = "insert into yjm_person (name,school,production,style,ideal,resume,team,level,sort,hot,homepage)values (?,?,?,?,?,?,?,?,?,?,?)";

    CONST GETLIST    = "select a.* , b.url , c.name levelname , d.name teamname from yjm_person a left join (select url , objectid ,`primary` from mw_file b where objecttype=?) b on a.id = b.objectid left join (select id , name from mw_category where objecttype = 'level') c on a.level = c.id left join (select id , name from mw_category where objecttype='team') d on a.team = d.id";

    CONST GETCOUNT   = "select count(*) cnt from yjm_person";

    CONST GET        = "select a.* , b.url , b.id fileid from yjm_person a left join (select id , url , objectid from mw_file b where objecttype=? and objectid=? and editor='0') b on a.id = b.objectid where a.id=? order by a.sort asc";

    CONST UPDATE     = "update yjm_person set name=? , school=? ,production=?,style=?,ideal=?,resume=? ,team=?,level=?,sort=?,hot=? , homepage=? where id=?";

    CONST DELETE     = "delete from yjm_person where id = ?";

    CONST UPDATE_SORT  = "update yjm_person set sort=? where id = ?";

    CONST GETTOPLIST   = "select a.* , b.url , c.name levelname , d.name teamname from yjm_person a left join (select url , objectid from mw_topimage b where objecttype=?) b on a.id = b.objectid left join (select id , name from mw_category where objecttype = 'level') c on a.level = c.id left join (select id , name from mw_category where objecttype='team') d on a.team = d.id where a.homepage='1'";

    public function insert($input) {

        $i = 1 ;

         $this->_oMdb->fncPreparedStatement(self::INSERT)
                     ->subSetString($i++ , $input->name)
                     ->subSetString($i++ , $input->school)
                     ->subSetString($i++ , $input->production)
                     ->subSetString($i++ , $input->style)
                     ->subSetString($i++ , $input->ideal)
                     ->subSetString($i++ , $input->resume)
                     ->subSetInteger($i++ , $input->team)
                     ->subSetInteger($i++ , $input->level)
                     ->subSetInteger($i++ , $input->sort)
                     ->subSetInteger($i++ , $input->hot)
                     ->subSetString($i++ , $input->homepage)
                     ->fncExecuteUpdate();

       return !$this->_oMdb->isError();
    }

    public function getList($input) {
    	$i = 1;
    	$where = "";

    	if (isset($input->team) or isset($input->level)) {
    		$where = ' where ';
    		if (isset($input->team)) {
    			$cond[] = ' team = ?';
    		}
    		if (isset($input->level)) {
    			$cond[] = ' level = ?';
    		}
    		$where .= implode(' and ', $cond);
    	}

        $output = array();

        $orderby = $input->orderby;
        $sort    = $input->sort;
        $this->_oMdb->fncPreparedStatement(self::GETLIST . $where ." order by {$orderby} {$sort}")
        			->subSetLimit($input->start, $input->end)
                    ->subSetString($i++ , $input->objecttype);

        if (isset($input->team) or isset($input->level)) {
        	if (isset($input->team)) {
        		$this->_oMdb->subSetInteger($i++, $input->team);
        	}
        	if (isset($input->level)) {
        		$this->_oMdb->subSetInteger($i++, $input->level);
        	}
        }

        $this->_oMdb->fncExcuteQuery();

        while ($row = $this->_oMdb->fncGetRecordSet()) {
            $output[] = $row;
        }

        return $output;
    }

    public function getTopList($input) {
        $output = array();
        $orderby = $input->orderby;
        $sort    = $input->sort;
        $this->_oMdb->fncPreparedStatement(self::GETTOPLIST . " order by {$orderby} {$sort}")
                    ->subSetLimit($input->start, $input->end)
                    ->subSetString(1 , $input->objecttype)
                    ->fncExcuteQuery();

        while ($row = $this->_oMdb->fncGetRecordSet()) {
            $output[] = $row;
        }

        return $output;
    }



    public function getCount($input) {

        $i = 1;
        $where = "";

        if (isset($input->team) or isset($input->level)) {
        	$where = ' where ';
        	if (isset($input->team)) {
        		$cond[] = ' team = ?';
        	}
        	if (isset($input->level)) {
        		$cond[] = ' level = ?';
        	}
        	$where .= implode(' and ', $cond);
        }

        $this->_oMdb->fncPreparedStatement(self::GETCOUNT . $where);

        if (isset($input->team) or isset($input->level)) {
        	if (isset($input->team)) {
        		$this->_oMdb->subSetInteger($i++, $input->team);
        	}
        	if (isset($input->level)) {
        		$this->_oMdb->subSetInteger($i++, $input->level);
        	}
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
                    ->subSetString($i++, $input->name)
                    ->subSetString($i++, $input->school)
                    ->subSetString($i++, $input->production)
                    ->subSetString($i++, $input->style)
                    ->subSetString($i++, $input->ideal)
                    ->subSetString($i++, $input->resume)
                    ->subSetInteger($i++, $input->team)
                    ->subSetInteger($i++, $input->level)
                    ->subSetInteger($i++, $input->sort)
                    ->subSetInteger($i++, $input->hot)
                    ->subSetString($i++, $input->homepage)
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