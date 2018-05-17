<?php
class Mw_Hr extends clsModel{

    CONST INSERT     = "insert into mw_hr (title,`group`,place,status,experience,education,num,content1,content2,createtime,createby)values (?,?,?,?,?,?,?,?,?,?,?)";

    CONST GETLIST    = "select a.* , b.title groupname from mw_hr a left join mw_hr_group b on a.group = b.id ";

    CONST GETCOUNT   = "select count(*) cnt from mw_hr";

    CONST GET        = "select * from mw_hr where id=? ";

    CONST UPDATE     = "update mw_hr set ";

    CONST DELETE     = "delete from mw_hr where id = ?";

    CONST UPDATE_SORT  = "update mw_hr set sort=? where id = ?";

    public function insert($input) {

        $i = 1 ;

         $this->_oMdb->fncPreparedStatement(self::INSERT)
                    ->subSetString($i++ , $input->title)
                    ->subSetInteger($i++ , $input->group)
                    ->subSetInteger($i++ , $input->place)
                    ->subSetString($i++ , $input->status)
                    ->subSetString($i++ , $input->experience)
                    ->subSetString($i++ , $input->education)
                    ->subSetString($i++ , $input->num)
                    ->subSetString($i++ , $input->content1)
                    ->subSetString($i++ , $input->content2)
                    ->subSetString($i++ , $input->createtime)
                    ->subSetInteger($i++ , $input->createby)
                    ->fncExecuteUpdate();

       return !$this->_oMdb->isError();
    }

    public function getList($input) {
        $output = array();

        if ($input->orderby == 'group') $input->orderby = 'a.`group`';
        $orderby = ' order by '. $input->orderby . " $input->sort";

        $this->_oMdb->fncPreparedStatement(self::GETLIST . $orderby)
        			->subSetLimit($input->start, $input->end)
                    ->fncExcuteQuery();

        while ($row = $this->_oMdb->fncGetRecordSet()) {
            $output[] = $row;
        }

        return $output;
    }

    public function getCount($input) {

//         $i = 1;
        $this->_oMdb->fncPreparedStatement(self::GETCOUNT)
                    ->fncExcuteQuery();

        $row = $this->_oMdb->fncGetRecordSet();

        return $row['cnt'];
    }

    public function getById($input) {

        $i = 1;
        $this->_oMdb->fncPreparedStatement(self::GET)
                    ->subSetInteger($i++, $input->id)
                    ->fncExcuteQuery();

        $row = $this->_oMdb->fncGetRecordSet();

        return $row;

    }

    public function update($input) {

        $i = 1;
        $set = array();
        $where = ' where id=?';
        if (isset($input->group)) {
        	$set[] = '`group`=?';
        }
        if (isset($input->title)) {
            $set[] = 'title=?';
        }
        if (isset($input->place)) {
            $set[] = 'place=?';
        }
        if (isset($input->status)) {
            $set[] = 'status=?';
        }
        if (isset($input->experience)) {
            $set[] = 'experience=?';
        }
        if (isset($input->education)) {
            $set[] = 'education=?';
        }
        if (isset($input->num)) {
            $set[] = '`num`=?';
        }
        if (isset($input->content1)) {
            $set[] = 'content1=?';
        }
        if (isset($input->content2)) {
            $set[] = 'content2=?';
        }
        if (isset($input->updateby)) {
            $set[] = 'updateby=?';
        }
        if (isset($input->updatetime)) {
            $set[] = 'updatetime=?';
        }

        $this->_oMdb->fncPreparedStatement(self::UPDATE.implode(',', $set).$where);

        if (isset($input->group)) {
        	$this->_oMdb->subSetInteger($i++, $input->group);
        }
        if (isset($input->title)) {
            $this->_oMdb->subSetString($i++, $input->title);
        }
        if (isset($input->place)) {
            $this->_oMdb->subSetInteger($i++, $input->place);
        }
        if (isset($input->status)) {
            $this->_oMdb->subSetString($i++, $input->status);
        }
        if (isset($input->experience)) {
            $this->_oMdb->subSetString($i++, $input->experience);
        }
        if (isset($input->education)) {
            $this->_oMdb->subSetString($i++, $input->education);
        }
        if (isset($input->num)) {
        	$this->_oMdb->subSetString($i++, $input->num);
        }
        if (isset($input->content1)) {
            $this->_oMdb->subSetString($i++, $input->content1);
        }
        if (isset($input->content2)) {
            $this->_oMdb->subSetString($i++, $input->content2);
        }
        if (isset($input->updateby)) {
            $this->_oMdb->subSetInteger($i++, $input->updateby);
        }
        if (isset($input->updatetime)) {
            $this->_oMdb->subSetString($i++, $input->updatetime);
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

    public function saveSort($input) {

        $i = 1;
        $iAll = $this->_oMdb->fncPreparedStatement(self::UPDATE_SORT)
                            ->subSetInteger($i++ , $input->sort)
                            ->subSetInteger($i++, $input->id)
                            ->fncExecuteUpdate();
        return !$this->_oMdb->isError();


    }

}