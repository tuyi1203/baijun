<?php
class mw_book extends clsModel{

    CONST INSERT     = "insert into mw_book (title,`desc`,`summary`,sort,content,createby,createtime,publishyear,author )values (?,?,?,?,?,?,?,?,?)";

    CONST GETLIST    = "select * from mw_book order by publishyear desc , sort desc ";

    CONST GETCOUNT   = "select count(*) cnt from mw_book";

    CONST GET        = "select * from mw_book where id=?";

    CONST UPDATE     = "update mw_book set title=? , `desc`=? , `summary`=? ,sort=?,content=?,updateby=? , updatetime=? , publishyear=?  , author=? where id=?";

    CONST DELETE     = "delete from mw_book where id =?";

    // CONST GETTOPLIST = "select a.* , b.url from ( select * from mw_book where homepage='1') a left join (select url , id from mw_topimage where objecttype=? ) b on a.id = b.objectid where a.subkey =? order by sort ";

    // CONST GETHOMEPAGELIST = "select * from mw_book where subkey =? and homepage = '1' order by sort ";

    public function insert($input) {

        $i = 1 ;

         $this->_oMdb->fncPreparedStatement(self::INSERT)
                    ->subSetString($i++ , $input->title)
                    ->subSetString($i++ , $input->desc)
                    ->subSetString($i++ , $input->summary)
                    ->subSetInteger($i++ , $input->sort)
                    ->subSetString($i++ , $input->content)
                    ->subSetInteger($i++ , $input->createby)
                    ->subSetString($i++ , $input->createtime)
                    ->subSetInteger($i++ , $input->publishyear)
                    ->subSetString($i++ , $input->author);
		// if (isset($input->homepage)) {
		// 	$this->_oMdb->subSetString($i++ , $input->homepage);
		// } else {
		// 	$this->_oMdb->subSetNull($i++);
		// }

        $this->_oMdb->fncExecuteUpdate();

       return !$this->_oMdb->isError();
    }

    public function getList($input) {
        $i = 1;
        $output = array();

        $this->_oMdb->fncPreparedStatement(self::GETLIST)
                    ->subSetLimit($input->start, $input->end)
                    // ->subSetString($i++, $input->subkey)
                    ->fncExcuteQuery();

        while ($row = $this->_oMdb->fncGetRecordSet()) {
            $output[] = $row;
        }

        return $output;
    }

    // public function getHomepageList($input) {
    // 	$i = 1;
    // 	$output = array();

    // 	$this->_oMdb->fncPreparedStatement(self::GETHOMEPAGELIST)
			 //    	->subSetLimit($input->start, $input->end)
			 //    	// ->subSetString($i++, $input->subkey)
			 //    	->fncExcuteQuery();

    // 	while ($row = $this->_oMdb->fncGetRecordSet()) {
    // 		$output[] = $row;
    // 	}

    // 	return $output;
    // }

    public function getImageList($input) {
    	$i = 1;
    	$output = array();

    	$this->_oMdb->fncPreparedStatement(self::GETIMAGELIST)
			    	->subSetLimit($input->start, $input->end)
			    	// ->subSetString($i++, $input->subkey)
			    	->subSetString($i++, $input->objecttype)
			    	->subSetString($i++, $input->objecttype)
			    	->fncExcuteQuery();

    	while ($row = $this->_oMdb->fncGetRecordSet()) {
    		$output[] = $row;
    	}

    	return $output;
    }

    // public function getTopList($input) {
    // 	$i = 1;
    // 	$output = array();

    // 	$this->_oMdb->fncPreparedStatement(self::GETTOPLIST)
			 //    	->subSetLimit($input->start, $input->end)
			 //    	->subSetString($i++, $input->objecttype)
			 //    	// ->subSetString($i++, $input->subkey)
			 //    	->fncExcuteQuery();

    // 	while ($row = $this->_oMdb->fncGetRecordSet()) {
    // 		$output[] = $row;
    // 	}

    // 	return $output;
    // }

    public function getCount($input) {

        $i = 1;
        $this->_oMdb->fncPreparedStatement(self::GETCOUNT)
        			// ->subSetString($i++ , $input->subkey)
                    ->fncExcuteQuery();

        $row = $this->_oMdb->fncGetRecordSet();

        return $row['cnt'];
    }

    public function getByID($input) {
        $i = 1;

        $this->_oMdb->fncPreparedStatement(self::GET)
                    ->subSetInteger($i++, $input->id)
                    ->fncExcuteQuery();

        $row = $this->_oMdb->fncGetRecordSet();

        return $row;

    }

    public function update($input) {

        $i = 1;
        $this->_oMdb->fncPreparedStatement(self::UPDATE)
                    ->subSetString($i++, $input->title)
                    ->subSetString($i++, $input->desc)
                    ->subSetString($i++, $input->summary)
                    ->subSetInteger($i++, $input->sort)
                    ->subSetString($i++, $input->content)
                    ->subSetString($i++, $input->updateby)
                    ->subSetString($i++, $input->updatetime)
                    ->subSetInteger($i++, $input->publishyear)
                    ->subSetString($i++, $input->author);
       // if (isset($input->homepage)) {
       //       	$this->_oMdb->subSetString($i++ , $input->homepage);
       // } else {
       //     	$this->_oMdb->subSetNull($i++);
       // }
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

}