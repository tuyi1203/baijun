<?php
class clsModModel extends clsAppModel{

    //     private $tablemodel = null;
    public function getList($input)
    {
        return $this->dao->select()->from('wc_file')
        			->where('objecttype')->like('%' . $input->filetype . '%')
        			->orderby('createtime desc')
        			->limit($input->start , $input->end)
        			->fetchAll();
    }

    public function getObjectID($input)
    {
        $row = $this->dao->select('ifnull(max(objectid)+1 ,1) objectid')->from('wc_file')->where('objecttype')->eq($input->objecttype)->fetch();
        return $row->objectid;
    }

    public function getCount($input)
    {
    	$row = $this->dao->select('count(*) cnt')->from('wc_file')
			    	->where('objecttype')->like('%' . $input->filetype . '%')
			    	->fetch();
    	return $row->cnt;
    }


}