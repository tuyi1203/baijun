<?php
class Mw_Action_Log extends clsModel{

    CONST GET = "select * from mw_set where `key`=? and `subkey` in (?) ";

    CONST UPDATE  = "update mw_set set `value`=? where `key`=? and `subkey`= ?";

    CONST INSERT = "insert into mw_action_log (`time`,ip,account,uid,username,module,action) values (?,?,?,?,?,?,?)";

    CONST GETCOUNT = "select count(*) cnt from mw_action_log";

    CONST GETLIST = "select * from mw_action_log";

    public function insert($input) {
        $i = 1;
        $this->_oMdb->fncPreparedStatement(self::INSERT)
                    ->subSetString($i++, $input->time)
                    ->subSetString($i++, $input->ip)
                    ->subSetString($i++, $input->account)
                    ->subSetInteger($i++, $input->uid)
                    ->subSetString($i++, $input->username)
                    ->subSetString($i++, $input->module)
                    ->subSetString($i++, $input->action)
                    ->fncExecuteUpdate();

        return !$this->_oMdb->isError();
    }

    public function getCount($input) {
        $output = array();
        $where = '';
        if (isset($input->timestart) or isset($input->timeend)
                or isset($input->name) )  {
            $where .= ' where ';

            if (isset($input->timestart)) {
                $cond[] = "(`time`>=?)";
            }

            if (isset($input->timeend)) {
                $cond[] = "(`time`<= ?)";
            }

            if (isset($input->name)) {
                $cond[] = "(username like ?)";
            }

            $where .= implode(' and ' , $cond);
        }

        $i = 1;
        $this->_oMdb->fncPreparedStatement(self::GETCOUNT . $where);

        if (isset($input->timestart) or isset($input->timeend)
                or isset($input->name))  {

            if (isset($input->timestart)) {
                $this->_oMdb->subSetString($i++, $input->timestart);
            }

            if (isset($input->timeend)) {
                $this->_oMdb->subSetString($i++, $input->timeend);
            }

            if (isset($input->name)) {
                $this->_oMdb->subSetNoNeedEscapeString($i++, '%'.$this->_oMdb->fncEscapeWildCard($input->name).'%');
            }

        }

        $this->_oMdb->fncExcuteQuery();

        $row = $this->_oMdb->fncGetRecordSet();

        return $row['cnt'];
    }


    public function getList($input) {
        $output = array();
        $where = '';
        if (isset($input->timestart) or isset($input->timeend)
                or isset($input->name) )  {
            $where .= ' where ';

            if (isset($input->timestart)) {
                $cond[] = "(`time`>=?)";
            }

            if (isset($input->timeend)) {
                $cond[] = "(`time`<= ?)";
            }

            if (isset($input->name)) {
                $cond[] = "(username like ?)";
            }

            $where .= implode(' and ' , $cond);
        }

        if ($input->orderby == "time")
            $orderby = ' order by `time`';

        if ($input->orderby == "name")
            $orderby = ' order by username';

        $orderby .= " $input->sort";

        $i = 1;
        $this->_oMdb->fncPreparedStatement(self::GETLIST . $where. $orderby)
                    ->subSetLimit($input->start, $input->end);

        if (isset($input->timestart) or isset($input->timeend)
                or isset($input->name))  {

            if (isset($input->timestart)) {
                $this->_oMdb->subSetString($i++, $input->timestart);
            }

            if (isset($input->timeend)) {
                $this->_oMdb->subSetString($i++, $input->timeend);
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

}