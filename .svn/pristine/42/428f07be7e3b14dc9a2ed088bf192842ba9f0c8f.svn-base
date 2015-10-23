<?php
class clsModModel extends clsAppModel{

    public function insert($input)
    {
    	$data = new stdClass();
    	$data->name = $input->title;
		$this->dao->insert('wc_member_group')->data($data)->exec();
		return !$this->dao->isFail();
    }

    public function update($input)
    {
    	$data = new stdClass();
    	$data->name = $input->title;
    	$data->id   = $input->id;
    	$this->dao->update('wc_member_group')->data($data)
	    		->where('id')->eq($input->id)
	    		->exec();
    	return !$this->dao->isFail();
    }

    public function unique($input)
    {
    	$row = $this->dao->select('count(*) cnt')
    				->from('wc_member_group')
    				->where('name')->eq($input->title)
    				->fetch();
    	if ($row->cnt > 0) return false;
    	return true;
    }

    public function getList($input)
    {
    	$rows = $this->dao->select('a.* , ifnull(b.cnt,0) cnt')->from('( select * , if(id='.$input->groupid.',1,0) sort from wc_member_group) a')
    				->leftjoin('(select `group` , count(id) cnt from wc_member group by `group`) b')->on('a.id = b.`group`')
    				->orderby('a.sort desc, a.id desc')
    				->fetchAll();
    	return $rows;
    }

    public function delete($groupid)
    {
    	$this->dao->begin();
    	$this->dao->delete()->from('wc_member_group')
            ->where('id')->eq($groupid)
            ->exec();

    	$data = new stdClass();
    	$data->group = 0;
    	$this->dao->update('wc_member')
    			->data($data)
    			->where('`group`')->eq($groupid)
    			->exec();
    	$this->dao->commit();
    	return !$this->dao->isFail();
    }
}