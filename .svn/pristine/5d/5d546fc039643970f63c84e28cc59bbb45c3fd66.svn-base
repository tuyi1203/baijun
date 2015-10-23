<?php
class Mw_Todaywater extends clsModel{

    CONST INSERT     = "insert into mw_todaywater (title,keyword,summary,content,publishtime,createby,createtime,status,objecttype,public,sort)values (?,?,?,?,?,?,?,?,?,?,?)";

    CONST GETLIST    = "select a.* , b.name createname, c.name updatename from mw_todaywater a left join eku_user_info b on a.createby = b.uid left join eku_user_info c on a.updateby = c.uid ";

    CONST GETCOUNT   = "select count(*) cnt from mw_todaywater ";

    CONST GET        = "select a.* , b.name createname from mw_todaywater a left join eku_user_info b on a.createby = b.uid where a.id=?";

    CONST UPDATE     = "update mw_todaywater set ";

    CONST DELETE     = "delete from mw_todaywater where id =?";

    CONST PUBLISH    = "update mw_todaywater set public=if(public = '1' , '0' , '1') where id=?";

    CONST CLEARSTATUS = "update mw_todaywater set status= ? where objecttype = ?";

    CONST GETBYSTATUS = "select a.* , b.name createname from mw_todaywater a left join eku_user_info b on a.createby = b.uid where a.objecttype=? and a.status=?";

    CONST GETPREV     = "select * from mw_todaywater where id < ? and objecttype=? and public = ? order by createtime desc limit 0,1";

    CONST GETNEXT     = "select * from mw_todaywater where id > ? and objecttype=? and public = ? order by createtime asc limit 0,1";

    CONST VIEWPLUS    = "update mw_todaywater set views=views+1 where id=?";

    CONST SETTOP       = "update mw_todaywater set top= case when id = ? then '1' else '0' end where objecttype=?";

    CONST TOGGLETOP    = "update mw_todaywater set top= case when top = '1' then '0' else '1' end where id=?";

    CONST TOGGLEROLL   = "update mw_todaywater set rollflg= case when rollflg = '1' then '0' else '1' end where id=?";

    CONST GETWITHCOVER = "select a.* , b.url from (select * from mw_todaywater where public = '1' ) a left join ( select objectid , url from mw_file where objecttype=? and `primary`='1') b on a.id = b.objectid where a.objecttype=? ";

    CONST GETWITHTOPIMAGE = "select a.* , b.url from (select * from mw_todaywater where public = '1' ) a left join ( select objectid , url from mw_topimage where objecttype=? ) b on a.id = b.objectid where a.objecttype=? ";

    CONST GETROLLLIST    = "select a.* , b.name createname, c.name updatename from mw_todaywater a left join eku_user_info b on a.createby = b.uid left join eku_user_info c on a.updateby = c.uid where ";

    public function insert($input) {

        $i = 1 ;

         $this->_oMdb->fncPreparedStatement(self::INSERT)
                    ->subSetString($i++ , $input->title)
                    ->subSetString($i++ , $input->keyword)
                    ->subSetString($i++ , $input->summary)
                    ->subSetString($i++ , $input->content)
                    ->subSetString($i++ , $input->publishtime)
                    ->subSetInteger($i++ , $input->createby)
                    ->subSetString($i++ , $input->createtime)
                    ->subSetString($i++ , $input->status)
                    ->subSetString($i++ , $input->objecttype)
                    ->subSetString($i++ , $input->public);
         if (isset($input->sort)) {
             $this->_oMdb->subSetInteger($i++, $input->sort);
         } else {
             $this->_oMdb->subSetNull($i++);
         }
         $this->_oMdb->fncExecuteUpdate();

       return !$this->_oMdb->isError();
    }

    public function getList($input) {
        $output = array();
		$i = 1;
        $where = array();
        if (isset($input->public)) {
        	$where[] =  " a.`public` = ? ";
        }
        if (isset($input->today)) {
        	$where[] =  " a.today = ? ";
        }
        $orderby = ' order by '. $input->orderby . " $input->sort";

        if (!empty($where)) {
        	$where = ' where ' . implode(' and ' , $where);
        } else {
        	$where = '';
        }

        $this->_oMdb->fncPreparedStatement(self::GETLIST . $where . $orderby)
                    ->subSetLimit($input->start, $input->end);
        if (isset($input->public)) {
			$this->_oMdb->subSetString($i++, $input->public);
        }
        if (isset($input->today)) {
        	$this->_oMdb->subSetString($i++, $input->today);
        }

        $this->_oMdb->fncExcuteQuery();

        while ($row = $this->_oMdb->fncGetRecordSet()) {
            $output[] = $row;
        }

        return $output;
    }

    public function getRollList($input) {
    	$output = array();
    	$i = 1;
    	$where = array();
    	if (isset($input->public)) {
    		$where[] = " a.`public` = ? ";
    	}
    	if (isset($input->rollflg)) {
    		$where[] = " a.`rollflg` = ? ";
    	}
    	$orderby = ' order by '. $input->orderby . " $input->sort";

    	$this->_oMdb->fncPreparedStatement(self::GETROLLLIST . implode(' and ' , $where) . $orderby)
			    	->subSetLimit($input->start, $input->end);
    	if (isset($input->public)) {
    		$this->_oMdb->subSetString($i++, $input->public);
    	}
    	if (isset($input->rollflg)) {
    		$this->_oMdb->subSetString($i++, $input->rollflg);
    	}

    	$this->_oMdb->fncExcuteQuery();

    	while ($row = $this->_oMdb->fncGetRecordSet()) {
    		$output[] = $row;
    	}

    	return $output;
    }

    public function getWithCover($input) {
    	$output = array();
    	$i = 1;
    	$and = "";
    	if (isset($input->top)) {
    	    $and = ' and a.top = ?';
    	}
    	$orderby = ' order by '. $input->orderby . " $input->sort";

    	$this->_oMdb->fncPreparedStatement(self::GETWITHCOVER  . $and . $orderby)
			    	->subSetLimit($input->start, $input->end)
			    	->subSetString($i++, $input->objecttype)
			    	->subSetString($i++, $input->objecttype);

    	if (isset($input->top)) {
    	    $this->_oMdb->subSetString($i++, $input->top);
    	}

    	$this->_oMdb->fncExcuteQuery();

    	while ($row = $this->_oMdb->fncGetRecordSet()) {
    		$output[] = $row;
    	}

    	return $output;
    }

    public function getWithTopImage($input) {
        $output = array();
        $i = 1;
        $and = "";
        if (isset($input->top)) {
            $and = ' and a.top = ?';
        }
        $orderby = ' order by '. $input->orderby . " $input->sort";

        $this->_oMdb->fncPreparedStatement(self::GETWITHTOPIMAGE  . $and . $orderby)
        ->subSetLimit($input->start, $input->end)
        ->subSetString($i++, $input->objecttype)
        ->subSetString($i++, $input->objecttype);

        if (isset($input->top)) {
            $this->_oMdb->subSetString($i++, $input->top);
        }

        $this->_oMdb->fncExcuteQuery();

        while ($row = $this->_oMdb->fncGetRecordSet()) {
            $output[] = $row;
        }

        return $output;
    }

    public function getCount($input) {

        $i = 1;
    	$where = '';
    	if (isset($input->public)) {
    		$where = " where `public` = ? ";
    	}

        $this->_oMdb->fncPreparedStatement(self::GETCOUNT . $where);

        if (isset($input->public)) {
        	$this->_oMdb->subSetString($i++, $input->public);
        }

        $this->_oMdb->fncExcuteQuery();

        $row = $this->_oMdb->fncGetRecordSet();

        return $row['cnt'];
    }

    public function get($input) {

        $this->_oMdb->fncPreparedStatement(self::GET)
                    ->subSetInteger(1, $input->id)
                    ->fncExcuteQuery();

        $row = $this->_oMdb->fncGetRecordSet();

        return $row;
    }

    public function getPrev($input) {

        $this->_oMdb->fncPreparedStatement(self::GETPREV)
                    ->subSetInteger(1, $input->id)
                    ->subSetString(2, $input->objecttype)
                    ->subSetString(3, $input->public)
                    ->fncExcuteQuery();

        $row = $this->_oMdb->fncGetRecordSet();

        return $row;
    }

    public function getNext($input) {

        $this->_oMdb->fncPreparedStatement(self::GETNEXT)
                    ->subSetInteger(1, $input->id)
                    ->subSetString(2, $input->objecttype)
                    ->subSetString(3, $input->public)
                    ->fncExcuteQuery();

        $row = $this->_oMdb->fncGetRecordSet();

        return $row;
    }

    public function getByStatus($input) {
        $this->_oMdb->fncPreparedStatement(self::GETBYSTATUS)
                    ->subSetString(1, $input->objecttype)
                    ->subSetString(2, $input->status)
                    ->fncExcuteQuery();

        $row = $this->_oMdb->fncGetRecordSet();
        return $row;
    }

    public function update($input) {

        $i = 1;
        $set = array();
        $where = ' where id=?';
        if (isset($input->title)) {
            $set[] = 'title=?';
        }
        if (isset($input->keyword)) {
            $set[] = 'keyword=?';
        }
        if (isset($input->summary)) {
            $set[] = 'summary=?';
        }
        if (isset($input->content)) {
            $set[] = 'content=?';
        }
        if (isset($input->content2)) {
            $set[] = 'content2=?';
        }
        if (isset($input->publishtime)) {
            $set[] = 'publishtime=?';
        }
        if (isset($input->status)) {
            $set[] = 'status=?';
        }
        if (isset($input->updateby)) {
            $set[] = 'updateby=?';
        }
        if (isset($input->updatetime)) {
            $set[] = 'updatetime=?';
        }
        if (isset($input->public)) {
            $set[] = 'public=?';
        }
        if (isset($input->sort)) {
            $set[] = 'sort=?';
        }

        $this->_oMdb->fncPreparedStatement(self::UPDATE.implode(',', $set).$where);

        if (isset($input->title)) {
            $this->_oMdb->subSetString($i++, $input->title);
        }
        if (isset($input->keyword)) {
            $this->_oMdb->subSetString($i++, $input->keyword);
        }
        if (isset($input->summary)) {
            $this->_oMdb->subSetString($i++, $input->summary);
        }
        if (isset($input->content)) {
            $this->_oMdb->subSetString($i++, $input->content);
        }
        if (isset($input->content2)) {
            $this->_oMdb->subSetString($i++, $input->content2);
        }
        if (isset($input->publishtime)) {
            $this->_oMdb->subSetString($i++, $input->publishtime);
        }
        if (isset($input->status)) {
            $this->_oMdb->subSetString($i++, $input->status);
        }
        if (isset($input->updateby)) {
            $this->_oMdb->subSetString($i++, $input->updateby);
        }
        if (isset($input->updatetime)) {
            $this->_oMdb->subSetString($i++, $input->updatetime);
        }
        if (isset($input->public)) {
            $this->_oMdb->subSetString($i++, $input->public);
        }
        if (isset($input->sort)) {
            $this->_oMdb->subSetInteger($i++, $input->sort);
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

    public function publish($input) {
        $this->_oMdb->fncPreparedStatement(self::PUBLISH)
//                     ->subSetString(1, '1')
                    ->subSetInteger(1, $input->id)
                    ->fncExecuteUpdate();

        return !$this->_oMdb->isError();
    }

    public function clearStatus($input) {
        $this->_oMdb->fncPreparedStatement(self::CLEARSTATUS)
                    ->subSetString(1, $input->status)
                    ->subSetInteger(2, $input->objecttype)
                    ->fncExecuteUpdate();

        return !$this->_oMdb->isError();
    }

    public function viewPlus($input) {
    	$this->_oMdb->fncPreparedStatement(self::VIEWPLUS)
			    	->subSetInteger(1, $input->id)
			    	->fncExecuteUpdate();

    	return !$this->_oMdb->isError();
    }

    public function settop($input) {
        $this->_oMdb->fncPreparedStatement(self::SETTOP)
                    ->subSetInteger(1, $input->id)
                    ->subSetString(2, $input->objecttype)
                    ->fncExecuteUpdate();

        return !$this->_oMdb->isError();
    }

    public function toggletop($input) {
    	$this->_oMdb->fncPreparedStatement(self::TOGGLETOP)
			    	->subSetInteger(1, $input->id)
			    	->fncExecuteUpdate();

    	return !$this->_oMdb->isError();
    }

    public function toggleRoll($input) {
    	$this->_oMdb->fncPreparedStatement(self::TOGGLEROLL)
			    	->subSetInteger(1, $input->id)
			    	->fncExecuteUpdate();

    	return !$this->_oMdb->isError();
    }

}