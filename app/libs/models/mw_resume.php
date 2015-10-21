<?php
class Mw_Resume extends clsModel{

    CONST INSERT     = "insert into mw_resume (tel,createtime)values (?,?)";

    CONST GETLIST    = "select * from mw_resume ";

    CONST GETCOUNT   = "select count(*) cnt from mw_resume ";

    CONST GET        = "select * from mw_resume where id=?";

    CONST UPDATE     = "update mw_resume set ";

    CONST DELETE     = "delete from mw_resume where id =?";

    CONST PUBLISH    = "update mw_resume set public=? where id=?";

    CONST MARK       = "update mw_resume set `mark`= case `mark` when '1' then '0' else '1' end where id=?";

    public function insert($input) {

        $i = 1 ;

         $this->_oMdb->fncPreparedStatement(self::INSERT)
                    ->subSetString($i++ , $input->tel)
                    ->subSetString($i++ , $input->createtime)
                    ->fncExecuteUpdate();

       return !$this->_oMdb->isError();
    }

    public function getList($input) {
        $output = array();
		$i = 1;
        $orderby = ' order by '. $input->orderby . " $input->sort";
		$where = '';
		if (isset($input->public)) {
			$where = " where public = ? ";
		}

        $this->_oMdb->fncPreparedStatement(self::GETLIST . $where . $orderby)
                    ->subSetLimit($input->start, $input->end);

        if (isset($input->public)) {
        	$this->_oMdb->subSetString($i++, $input->public);
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
        	$where = " where public = ? ";
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

//     public function update($input) {

//         $i = 1;
//         $set = array();
//         $where = ' where id=?';
//         if (isset($input->name)) {
//             $set[] = 'name=?';
//         }
//         if (isset($input->cardno)) {
//             $set[] = 'cardno=?';
//         }
//         if (isset($input->tel)) {
//             $set[] = 'tel=?';
//         }
//         if (isset($input->email)) {
//             $set[] = 'email=?';
//         }
//         if (isset($input->addr)) {
//             $set[] = 'addr=?';
//         }
//         if (isset($input->content)) {
//             $set[] = 'content=?';
//         }
//         if (isset($input->replyid)) {
//             $set[] = 'replyid=?';
//         }
//         if (isset($input->replycontent)) {
//             $set[] = 'replycontent=?';
//         }
//         if (isset($input->public)) {
//             $set[] = 'public=?';
//         }
//         if (isset($input->replytime)) {
//             $set[] = 'replytime=?';
//         }

//         $this->_oMdb->fncPreparedStatement(self::UPDATE.implode(',', $set).$where);

//         if (isset($input->name)) {
//             $this->_oMdb->subSetString($i++, $input->name);
//         }
//         if (isset($input->cardno)) {
//             $this->_oMdb->subSetString($i++, $input->cardno);
//         }
//         if (isset($input->tel)) {
//             $this->_oMdb->subSetString($i++, $input->tel);
//         }
//         if (isset($input->email)) {
//             $this->_oMdb->subSetString($i++, $input->email);
//         }
//         if (isset($input->addr)) {
//             $this->_oMdb->subSetString($i++, $input->addr);
//         }
//         if (isset($input->content)) {
//             $this->_oMdb->subSetString($i++, $input->content);
//         }
//         if (isset($input->replyid)) {
//             $this->_oMdb->subSetInteger($i++, $input->replyid);
//         }
//         if (isset($input->replycontent)) {
//             $this->_oMdb->subSetString($i++, $input->replycontent);
//         }
//         if (isset($input->public)) {
//             $this->_oMdb->subSetString($i++, $input->public);
//         }
//         if (isset($input->replytime)) {
//             $this->_oMdb->subSetString($i++, $input->replytime);
//         }
//         $this->_oMdb->subSetInteger($i++, $input->id)
//                     ->fncExecuteUpdate();

//         return !$this->_oMdb->isError();
//     }

    public function delete($input) {
        $this->_oMdb->fncPreparedStatement(self::DELETE)
                    ->subSetInteger(1, $input->id)
                    ->fncExecuteUpdate();

        return !$this->_oMdb->isError();
    }

    public function publish($input) {
        $this->_oMdb->fncPreparedStatement(self::PUBLISH)
                    ->subSetString(1, '1')
                    ->subSetInteger(2, $input->id)
                    ->fncExecuteUpdate();

        return !$this->_oMdb->isError();
    }

    public function marking($input) {
        $this->_oMdb->fncPreparedStatement(self::MARK)
                    ->subSetInteger(1, $input->id)
                    ->fncExecuteUpdate();

        return !$this->_oMdb->isError();
    }

}