<?php
class Mw_Single_EN extends clsModel{

    CONST INSERT     = "insert into mw_single_en (title,keyword,summary,content,publishtime,createby,createtime,status )values (?,?,?,?,?,?,?,?)";

    CONST GETLIST    = "select * from mw_single_en";

    CONST GETCOUNT   = "select count(*) cnt from mw_single_en";

    CONST GET        = "select * from mw_single_en where id=?";

    CONST UPDATE     = "update mw_single_en set title=? , keyword=? , summary=? , content=? ,content2=?, publishtime=? , status=? , updateby=? , updatetime=? where id=?";

    CONST DELETE     = "delete from mw_single_en where id =?";

    CONST VIEWPLUS    = "update mw_single_en set views=views+1 where id=?";

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
                    ->fncExecuteUpdate();

       return !$this->_oMdb->isError();
    }

    public function getList($input) {
        $output = array();

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

    public function get($input) {

        $this->_oMdb->fncPreparedStatement(self::GET)
                    ->subSetInteger(1, $input->id)
                    ->fncExcuteQuery();

        $row = $this->_oMdb->fncGetRecordSet();

        return $row;

    }

    public function update($input) {

        $i = 1;

        $this->_oMdb->fncPreparedStatement(self::UPDATE)
                    ->subSetString($i++, $input->title)
                    ->subSetString($i++, $input->keyword)
                    ->subSetString($i++, $input->summary)
                    ->subSetString($i++, $input->content);
        if (isset($input->content2))
            $this->_oMdb->subSetString($i++, $input->content2);
        else
            $this->_oMdb->subSetNull($i++);

        if (isset($input->publishtime))
            $this->_oMdb->subSetString($i++, $input->publishtime);
        else
            $this->_oMdb->subSetNull($i++);

        if (isset($input->status))
            $this->_oMdb->subSetString($i++, $input->status);
        else
            $this->_oMdb->subSetNull($i++);

        $this->_oMdb->subSetString($i++, $input->updateby)
                    ->subSetString($i++, $input->updatetime)
                    ->subSetInteger($i++, $input->id)
                    ->fncExecuteUpdate();

        return !$this->_oMdb->isError();
    }

    public function delete($input) {
        $this->_oMdb->fncPreparedStatement(self::DELETE)
                    ->subSetInteger(1, $input->id)
                    ->fncExecuteUpdate();

        return !$this->_oMdb->isError();
    }

    public function viewPlus($input) {
    	$this->_oMdb->fncPreparedStatement(self::VIEWPLUS)
			    	->subSetInteger(1, $input->id)
			    	->fncExecuteUpdate();

    	return !$this->_oMdb->isError();
    }

}