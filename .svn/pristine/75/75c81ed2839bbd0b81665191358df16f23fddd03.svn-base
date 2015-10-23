<?php
class Eku_User_Info extends clsModel{

    CONST INSERT     = "insert into eku_user_info";

    CONST GETLIST    = "select a.id , a.roleid , a.lock_status , b.* , c.name rolename from (select * from eku_user where roleid >= ? and delflg = '0') a left join (select * from eku_user_info where delflg = '0') b on a.id = b.uid left join eku_role c on a.roleid = c.id ";

    CONST GETCOUNT   = "select count(*) cnt from (select * from eku_user where roleid >= ? and delflg = '0') a left join (select * from eku_user_info where delflg = '0') b on a.id = b.uid";

    CONST ONEROLELIST    = "select a.id , a.roleid , a.lock_status , b.* , c.name rolename , d.url from (select * from eku_user where roleid = ? and delflg = '0') a left join (select * from eku_user_info where delflg = '0') b on a.id = b.uid left join eku_role c on a.roleid = c.id left join (select url , objectid from mw_file where objecttype = ?) d on b.uid = d.objectid";

    CONST ONEROLECOUNT   = "select count(*) cnt from (select * from eku_user where roleid = ? and delflg = '0') a left join (select * from eku_user_info where delflg = '0') b on a.id = b.uid";

    CONST GET        = "select a.id,a.accout,a.roleid,a.lock_status, b.* , c.url , c.id fileid from eku_user a left join eku_user_info b on a.id = b.uid left join (select objectid , url , id from mw_file where objecttype=? and objectid=? and editor='0') c on c.objectid = a.id where a.id=?";

    CONST UPDATE     = "update eku_user_info set ";
    CONST UPDATE_WHERE = " where uid = ?";

    CONST DELETE     = "update eku_user_info set delflg = '1' where uid = ?";

    CONST UPDATE_SORT  = "update eku_user_info set sort=? where uid = ?";

    public function insert($input) {

		$colstart = " ( ";
		$colsend   = " ) ";

		$cols = array();
		$cols[]  =  'uid';
		if (isset($input->name)) {
			$cols[] = 'name';
		}
		if (isset($input->title)) {
			$cols[] = 'title';
		}
		if (isset($input->type)) {
			$cols[] = 'type';
		}
		if (isset($input->desc)) {
			$cols[] = "`desc`";
		}
		if (isset($input->content)) {
			$cols[] = "content";
		}
		if (isset($input->content2)) {
			$cols[] = "content2";
		}
		if (isset($input->content3)) {
			$cols[] = "content3";
		}
		if (isset($input->status)) {
			$cols[] = "status";
		}
		if (isset($input->dspflg)) {
			$cols[] = "dspflg";
		}
		if (isset($input->booking)) {
			$cols[] = "booking";
		}
		if (isset($input->team)) {
			$cols[] = "team";
		}
		if (isset($input->department)) {
		    $set[] = 'department = ?';
		}
		if (isset($input->sort)) {
			$cols[] = "sort";
		}
		if (isset($input->createby)) {
			$cols[] = "createby";
		}
		if (isset($input->createtime)) {
			$cols[] = "createtime";
		}

		$colsql = $colstart . implode(',', $cols) . $colsend;

		$valuestart = " values ( ";
		$valuesend  = " ) ";
		$values = array();
		for ($i = 0; $i < count($cols); $i++) {
			$values[] = "?";
		}
		$valuesql = $valuestart . implode(',',$values) . $valuesend;

		$i = 1 ;

        $this->_oMdb->fncPreparedStatement(self::INSERT . $colsql . $valuesql);
// clsLogger::subWriteSysError(self::INSERT . $colsql . $valuesql);
		foreach ($cols as $value) {
			if ($value == "uid") {
				$this->_oMdb->subSetInteger($i++ , $input->uid);
			}
			if ($value == "name") {
				$this->_oMdb->subSetString($i++ , $input->name);
			}
			if ($value == "title") {
				$this->_oMdb->subSetString($i++ , $input->title);
			}
			if ($value == "type") {
				$this->_oMdb->subSetString($i++ , $input->type);
			}
			if ($value == "desc") {
				$this->_oMdb->subSetString($i++ , $input->desc);
			}
			if ($value == "content") {
				$this->_oMdb->subSetString($i++ , $input->content);
			}
			if ($value == "content2") {
				$this->_oMdb->subSetString($i++ , $input->content2);
			}
			if ($value == "content3") {
				$this->_oMdb->subSetString($i++ , $input->content3);
			}
			if ($value == "status") {
				$this->_oMdb->subSetString($i++ , $input->status);
			}
			if ($value == "dspflg") {
				$this->_oMdb->subSetString($i++ , $input->dspflg);
			}
			if ($value == "booking") {
				$this->_oMdb->subSetString($i++ , $input->booking);
			}
			if ($value == "team") {
				$this->_oMdb->subSetString($i++ , $input->team);
			}
			if ($value =="department") {
			    $this->_oMdb->subSetString($i++ , $input->department);
			}
			if ($value == "sort") {
				$this->_oMdb->subSetString($i++ , $input->sort);
			}
			if ($value == "createby") {
				$this->_oMdb->subSetInteger($i++ , $input->createby);
			}
			if ($value == "createtime") {
				$this->_oMdb->subSetString($i++ , $input->createtime);
			}
		}
		$this->_oMdb->fncExecuteUpdate();

       return !$this->_oMdb->isError();
    }

    public function oneRoleList($input) {
        $output = array();
        $where = '';
        $orderby = " order by sort";

        if (isset($input->team) or isset($input->booking))  {
            $where .= ' where ';

            if (isset($input->team)) {
                $cond[] = "(b.team = ?)";
            }

            if (isset($input->booking)) {
                $cond[] = "(b.booking = ?)";
            }

            $where .= implode(' and ' , $cond);
        }

        $i = 1;
        $this->_oMdb->fncPreparedStatement(self::ONEROLELIST . $where. $orderby)
                    ->subSetInteger($i++, $input->roleid)
                    ->subSetString($i++ , $input->objecttype);

        if (isset($input->team) or isset($input->booking))  {

            if (isset($input->team)) {
                $this->_oMdb->subSetString($i++, $input->team);
            }

            if (isset($input->booking)) {
                $this->_oMdb->subSetString($i++, $input->booking);
            }
        }

        $this->_oMdb->fncExcuteQuery();

        while ($row = $this->_oMdb->fncGetRecordSet()) {
            $output[] = $row;
        }

        return $output;
    }

    public function oneRoleCount($input) {
        $where = '';

        if (isset($input->team) or isset($input->booking))  {
            $where .= ' where ';

            if (isset($input->team)) {
                $cond[] = "(b.team = ?)";
            }

            if (isset($input->booking)) {
                $cond[] = "(b.booking = ?)";
            }

            $where .= implode(' and ' , $cond);
        }

        $i = 1;
        $this->_oMdb->fncPreparedStatement(self::ONEROLECOUNT . $where)
                    ->subSetInteger($i++, $input->roleid);

        if (isset($input->team) or isset($input->booking))  {

            if (isset($input->team)) {
                $this->_oMdb->subSetString($i++, $input->team);
            }

            if (isset($input->booking)) {
                $this->_oMdb->subSetString($i++, $input->booking);
            }
        }
        $this->_oMdb->fncExcuteQuery();

        $row = $this->_oMdb->fncGetRecordSet();

        return $row['cnt'];
    }

    public function getList($input) {
        $output = array();
        $where = '';
        if (isset($input->roleid) or isset($input->name))  {
            $where .= ' where ';

            if (isset($input->roleid)) {
                $cond[] = "(a.roleid=?)";
            }

            if (isset($input->name)) {
                $cond[] = "(b.name like ?)";
            }

            $where .= implode(' and ' , $cond);
        }

        if ($input->orderby == "id")
            $orderby = ' order by a.id';

        if ($input->orderby == "name")
            $orderby = ' order by b.name';

        if ($input->orderby == "roleid")
            $orderby = ' order by a.roleid';

        $orderby .= " $input->sort";

        $i = 1;
        $this->_oMdb->fncPreparedStatement(self::GETLIST . $where. $orderby)
                    ->subSetLimit($input->start, $input->end)
                    ->subSetInteger($i++, $input->thisrole);

        if (isset($input->roleid) or isset($input->name))  {

            if (isset($input->roleid)) {
                $this->_oMdb->subSetInteger($i++, $input->roleid);
            }

            if (isset($input->name)) {
                $this->_oMdb->subSetNoNeedEscapeString($i++, '%'.$this->_oMdb->fncEscapeWildCard($input->name).'%');
            }
        }

        $this->_oMdb->fncExcuteQuery();

        while ($row = $this->_oMdb->fncGetRecordSet()) {
            $output[] = $row;
        }

        return $output;
    }

    public function getCount($input) {
// echo "hello";exit;
        $where = '';
        if (isset($input->roleid) or isset($input->name))  {
            $where .= ' where ';

            if (isset($input->roleid)) {
                $cond[] = "(a.roleid=?)";
            }

            if (isset($input->name)) {
                $cond[] = "(b.name like ?)";
            }

            $where .= implode(' and ' , $cond);
        }

        $i = 1;
        $this->_oMdb->fncPreparedStatement(self::GETCOUNT. $where)
                    ->subSetInteger($i++, $input->thisrole);

        if (isset($input->roleid) or isset($input->name))  {

            if (isset($input->roleid)) {
                $this->_oMdb->subSetInteger($i++, $input->roleid);
            }

            if (isset($input->name)) {
                $this->_oMdb->subSetNoNeedEscapeString($i++, '%'.$this->_oMdb->fncEscapeWildCard($input->name).'%');
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

    	$set = array();

    	if (isset($input->name)) {
    		$set[] = 'name = ?';
    	}

    	if (isset($input->title)) {
    		$set[] = 'title = ?';
    	}

    	if (isset($input->type)) {
    		$set[] = 'type = ?';
    	}

    	if (isset($input->desc)) {
    		$set[] = '`desc` = ?';
    	}

    	if (isset($input->content)) {
    		$set[] = 'content = ?';
    	}

    	if (isset($input->content2)) {
    		$set[] = 'content2 = ?';
    	}

    	if (isset($input->content3)) {
    		$set[] = 'content3 = ?';
    	}

    	if (isset($input->status)) {
    		$set[] = 'status = ?';
    	}

    	if (isset($input->dspflg)) {
    		$set[] = 'dspflg = ?';
    	}

    	if (isset($input->booking)) {
    		$set[] = 'booking = ?';
    	}

    	if (isset($input->team)) {
    		$set[] = 'team = ?';
    	}

    	if (isset($input->department)) {
    	    $set[] = 'department = ?';
    	}

    	if (isset($input->sort)) {
    		$set[] = 'sort = ?';
    	}

    	if (isset($input->updateby)) {
    		$set[] = 'updateby = ?';
    	}

    	if (isset($input->updatetime)) {
    		$set[] = 'updatetime = ?';
    	}

        $i = 1;

        $this->_oMdb->fncPreparedStatement(self::UPDATE . implode(',', $set) . self::UPDATE_WHERE);

        if (isset($input->name)) {
        	$this->_oMdb->subSetString($i++ , $input->name );
        }

        if (isset($input->title)) {
        	$this->_oMdb->subSetString($i++ , $input->title );
        }

        if (isset($input->type)) {
        	$this->_oMdb->subSetString($i++ , $input->type );
        }

        if (isset($input->desc)) {
        	$this->_oMdb->subSetString($i++ , $input->desc );
        }

        if (isset($input->content)) {
        	$this->_oMdb->subSetString($i++ , $input->content );
        }

        if (isset($input->content2)) {
        	$this->_oMdb->subSetString($i++ , $input->content2 );
        }

        if (isset($input->content3)) {
        	$this->_oMdb->subSetString($i++ , $input->content3 );
        }

        if (isset($input->status)) {
        	$this->_oMdb->subSetString($i++ , $input->status );
        }

        if (isset($input->dspflg)) {
        	$this->_oMdb->subSetString($i++ , $input->dspflg );
        }

        if (isset($input->booking)) {
        	$this->_oMdb->subSetString($i++ , $input->booking );
        }

        if (isset($input->team)) {
        	$this->_oMdb->subSetString($i++ , $input->team );
        }

        if (isset($input->department)) {
            $this->_oMdb->subSetString($i++ , $input->department );
        }

        if (isset($input->sort)) {
        	$this->_oMdb->subSetString($i++ , $input->sort );
        }

        if (isset($input->updateby)) {
        	$this->_oMdb->subSetInteger($i++ , $input->updateby );
        }

        if (isset($input->updatetime)) {
        	$this->_oMdb->subSetString($i++ , $input->updatetime );
        }
        $this->_oMdb->subSetInteger($i++, $input->uid)
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