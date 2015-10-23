<?php
class Yjm_Housesubmit extends clsModel{

    CONST INSERT     = "insert into yjm_housesubmit (name,tel,qq,addr,content,createtime)values (?,?,?,?,?,?)";

    CONST GETLIST    = "select * from yjm_housesubmit ";

    CONST GETCOUNT   = "select count(*) cnt from yjm_housesubmit";

    CONST GET        = "select * from yjm_housesubmit where id=?";

    CONST UPDATE     = "update yjm_housesubmit set ";

    CONST DELETE     = "delete from yjm_housesubmit where id =?";

    CONST PUBLISH    = "update yjm_housesubmit set public=? where id=?";

    public function insert($input) {

        $i = 1 ;

         $this->_oMdb->fncPreparedStatement(self::INSERT)
                    ->subSetString($i++ , $input->name)
                    ->subSetString($i++ , $input->tel)
                    ->subSetString($i++ , $input->qq)
                    ->subSetString($i++ , $input->addr)
                    ->subSetString($i++ , $input->content)
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

    public function update($input) {

        $i = 1;
        $set = array();
        $where = ' where id=?';
        if (isset($input->name)) {
            $set[] = 'name=?';
        }
        if (isset($input->tel)) {
            $set[] = 'tel=?';
        }
        if (isset($input->content)) {
            $set[] = 'content=?';
        }
        if (isset($input->content2)) {
            $set[] = 'content2=?';
        }
        if (isset($input->public)) {
            $set[] = 'public=?';
        }

        $this->_oMdb->fncPreparedStatement(self::UPDATE.implode(',', $set).$where);

        if (isset($input->name)) {
            $this->_oMdb->subSetString($i++, $input->name);
        }
        if (isset($input->tel)) {
            $this->_oMdb->subSetString($i++, $input->tel);
        }
        if (isset($input->content)) {
            $this->_oMdb->subSetString($i++, $input->content);
        }
        if (isset($input->content2)) {
            $this->_oMdb->subSetString($i++, $input->content2);
        }
        if (isset($input->public)) {
            $this->_oMdb->subSetString($i++, $input->public);
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
                    ->subSetString(1, '1')
                    ->subSetInteger(2, $input->id)
                    ->fncExecuteUpdate();

        return !$this->_oMdb->isError();
    }

}