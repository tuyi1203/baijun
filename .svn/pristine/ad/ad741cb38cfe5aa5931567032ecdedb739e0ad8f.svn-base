<?php
class clsModModel extends clsAppModel{

    public function getCount()
    {
        $row = $this->dao->select('count(*) cnt')
                ->from('wc_member')
                ->fetch();
        return $row->cnt;
    }

    public function getList($input)
    {
        $rows = $this->dao->select("a.* , b.value sexname , c.value subscribename , d.name groupname")
                    ->from('wc_member')->alias('a')
                    ->leftJoin("(select * from wc_set where `key`='sex')")->alias('b')->on('a.sex = b.subkey')
                    ->leftJoin("(select * from wc_set where `key`='subscribe')")->alias('c')->on('a.subscribe = c.subkey')
                    ->leftJoin("wc_member_group")->alias('d')->on('a.group = d.id')
                    ->orderby($input->orderby)
                    ->limit($input->start , $input->end)
                    ->fetchAll();
        return $rows;
    }

    public function updategroup($input)
    {
    	$data = new stdClass();
    	$data->group = $input->groupid;
    	$this->dao->update('wc_member')->data($data)
    			->where('id')->eq($input->memid)
    			->exec();
    	return !$this->dao->isFail();
    }
}