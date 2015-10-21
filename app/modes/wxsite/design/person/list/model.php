<?php
class clsModModel extends clsAppModel{

    CONST GETLIST    = "select a.* , b.url , c.name levelname , d.name teamname from yjm_person a left join (select url , objectid ,`primary` from mw_file b where objecttype=?) b on a.id = b.objectid left join (select id , name from mw_category where objecttype = 'level') c on a.level = c.id left join (select id , name from mw_category where objecttype='team') d on a.team = d.id";
    CONST GOODAT =  " inner join (select * from mw_relation where objecttype = 'goodat' and category=?) e on e.objectid = a.id" ;

    CONST GETCOUNT   = "select count(*) cnt from yjm_person a";

    public function getList($input) {
        $i = 1;
        $where = "";
        $sql  = self::GETLIST;
        if (isset($input->goodat)) {
            $sql += self::GOODAT;
        }

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
        $this->_oMdb->fncPreparedStatement($sql . $where ." order by {$orderby} {$sort}")
                    ->subSetLimit($input->start, $input->end)
                    ->subSetString($i++ , $input->objecttype);

        if (isset($input->team)) {
            $this->_oMdb->subSetInteger($i++, $input->team);
        }

        if (isset($input->level)) {
            $this->_oMdb->subSetInteger($i++, $input->level);
        }

        if (isset($input->goodat)) {
            $this->_oMdb->subSetInteger($i++, $input->goodat);
        }

        $this->_oMdb->fncExcuteQuery();

        while ($row = $this->_oMdb->fncGetRecordSet()) {
            $output[] = $row;
        }

        return $output;
    }


    public function getCount($input) {

        $i = 1;
        $where = "";
        $sql  = self::GETCOUNT;
        if (isset($input->goodat)) {
            $sql += self::GOODAT;
        }

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

        $this->_oMdb->fncPreparedStatement($sql . $where);

        if (isset($input->team)) {
            $this->_oMdb->subSetInteger($i++, $input->team);
        }

        if (isset($input->level)) {
            $this->_oMdb->subSetInteger($i++, $input->level);
        }

        if (isset($input->goodat)) {
            $this->_oMdb->subSetInteger($i++, $input->goodat);
        }

        $this->_oMdb->fncExcuteQuery();

        $row = $this->_oMdb->fncGetRecordSet();

        return $row['cnt'];
    }

}