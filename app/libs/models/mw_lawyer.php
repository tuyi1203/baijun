<?php
class Mw_lawyer extends clsModel{

    CONST GETLIST    = "select a.* , b.name  , c.url , d.name branchname  , f.title zhuanyename  , g.name zhiweiname from (select * from mw_lawyer where del = '0') a left join (select * from eku_role ) b on a.bumen = b.id left join ( select * from  mw_file where objecttype='lawyer') c on a.id = c.objectid left join mw_branches d on d.id = a.jigou left join mw_field f on f.id = a.zhuanye left join mw_position g on g.id = a.zhiwei";

    CONST GETCOUNT   = "select count(*) cnt from mw_lawyer where del='0'";

    public function getList($input) {
        $output = array();
        $where = '';
        if (isset($input->department) or isset($input->name))  {
            $where .= ' where ';

            if (isset($input->department)) {
                $cond[] = "(a.bumen=?)";
            }

            if (isset($input->name)) {
                $cond[] = "(a.fullname like ?)";
            }

            $where .= implode(' and ' , $cond);
        }

        if ($input->orderby == "id")
            $orderby = ' order by a.id';

        if ($input->orderby == "pinyin")
            $orderby = ' order by upper(a.first_name_alpha)';

        if ($input->orderby == "department")
            $orderby = ' order by a.bumen';

        if ($input->orderby == "zhiwei")
        	$orderby = ' order by a.zhiwei';

        if ($input->orderby == "zhuanye")
        	$orderby = ' order by a.zhuanye';

        if ($input->orderby == "jigou")
        	$orderby = ' order by a.jigou';


        $orderby .= " $input->sort";

        $i = 1;
        $this->_oMdb->fncPreparedStatement(self::GETLIST . $where. $orderby)
                    ->subSetLimit($input->start, $input->end);

        if (isset($input->department) or isset($input->name))  {

            if (isset($input->department)) {
                $this->_oMdb->subSetInteger($i++, $input->department);
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
        if (isset($input->department) or isset($input->name))  {

            if (isset($input->department)) {
                $where .= " and (bumen=?)";
            }

            if (isset($input->name)) {
                $where .= " and (fullname like ?)";
            }

//             $where .= implode(' and ' , $cond);
        }

        $i = 1;
        $this->_oMdb->fncPreparedStatement(self::GETCOUNT. $where);

        if (isset($input->department) or isset($input->name))  {

            if (isset($input->department)) {
                $this->_oMdb->subSetInteger($i++, $input->department);
            }

            if (isset($input->name)) {
                $this->_oMdb->subSetNoNeedEscapeString($i++, '%'.$this->_oMdb->fncEscapeWildCard($input->name).'%');
            }
        }
        $this->_oMdb->fncExcuteQuery();

        $row = $this->_oMdb->fncGetRecordSet();

        return $row['cnt'];
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