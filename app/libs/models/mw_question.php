<?php
class mw_question extends clsModel{

    CONST INSERT     = "insert into mw_question (title,content,category,createby,createtime,status,public,sort)values (?,?,?,?,?,?,?,?)";

    CONST GETLIST    = "select a.* , b.name categoryname from mw_question a left join mw_category b on a.category = b.id where a.category=? ";

    CONST GETCOUNT   = "select count(*) cnt from mw_question where category=?";

    CONST GET        = "select a.* , b.name createname from mw_question a left join eku_user_info b on a.createby = b.uid where a.id=?";

    CONST UPDATE     = "update mw_question set ";

    CONST DELETE     = "delete from mw_question where id =?";

    CONST PUBLISH    = "update mw_question set public=if(public='1','0','1') where id=?";

    CONST CLEARSTATUS = "update mw_question set status= ? where objecttype = ?";

    CONST GETBYSTATUS = "select a.* , b.name createname from mw_question a left join eku_user_info b on a.createby = b.uid where a.objecttype=? and a.status=?";

    CONST GETPREV     = "select * from mw_question where id < ? and objecttype=? and public = ? order by createtime desc limit 0,1";

    CONST GETNEXT     = "select * from mw_question where id > ? and objecttype=? and public = ? order by createtime asc limit 0,1";

    CONST VIEWPLUS    = "update mw_question set views=views+1 where id=?";

    CONST SETTOP       = "update mw_question set top= case when id = ? then '1' else '0' end where objecttype=?";

    CONST GETWITHCOVER = "select a.* , b.url from (select * from mw_question where public = '1' ) a left join ( select objectid , url from mw_file where objecttype=? and `primary`='1') b on a.id = b.objectid where a.objecttype=? ";

    CONST QUERY_COUNT_BYPUBLIC = "SELECT COUNT(id) as count FROM mw_question a WHERE  public = '0' AND  status = '1'";

    

    public function queryCountByPublish() 
    {
        $this->_oMdb->fncPreparedStatement(self::QUERY_COUNT_BYPUBLIC);
        $this->_oMdb->fncExcuteQuery();
        $row = $this->_oMdb->fncGetRecordSet();
        return $row['count'];
    }

    public function insert($input) {

        $i = 1 ;

         $this->_oMdb->fncPreparedStatement(self::INSERT)
                    ->subSetString($i++ , $input->title)
                    ->subSetString($i++ , $input->content)
                    ->subSetInteger($i++ , $input->category)
                    ->subSetInteger($i++ , $input->createby)
                    ->subSetString($i++ , $input->createtime)
                    ->subSetString($i++ , $input->status)
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
        $where = "";
        if (isset($input->public)) {
        	$where = " and a.`public` = ? ";
        }
        $orderby = ' order by '. $input->orderby . " $input->sort";

        $this->_oMdb->fncPreparedStatement(self::GETLIST . $where . $orderby)
                    ->subSetLimit($input->start, $input->end)
                    ->subSetString($i++, $input->category);
        if (isset($input->public)) {
			$this->_oMdb->subSetString($i++, $input->public);
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
    	$orderby = ' order by '. $input->orderby . " $input->sort";

    	$this->_oMdb->fncPreparedStatement(self::GETWITHCOVER . $orderby)
			    	->subSetLimit($input->start, $input->end)
			    	->subSetString($i++, $input->objecttype)
			    	->subSetString($i++, $input->objecttype);

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
    		$where = " and `public` = ? ";
    	}

        $this->_oMdb->fncPreparedStatement(self::GETCOUNT . $where)
                    ->subSetString($i++, $input->category);

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
        if (isset($input->category)) {
            $set[] = 'category=?';
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
        if (isset($input->category)) {
            $this->_oMdb->subSetString($i++, $input->category);
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
//                     ->subSetInteger(2, $input->id)
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

}