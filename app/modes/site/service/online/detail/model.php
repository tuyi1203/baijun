<?php
class clsModModel extends clsAppModel{

	public function insert($input)
	{
		$data = new stdClass();
		$data->objecttype = "message";
		$data->name = $input->name;
		$data->tel  = $input->tel;
		$data->content  = $input->message;
		$this->dao->insert('mw_message')->data($data)->exec();
		return $this->dao->lastInsertID();
	}

	public function getBanner()
	{
		$row = $this->dao->select()->from('mw_file')->where('objecttype')->eq('service')->andWhere('objectid')->eq(1)
						->fetch();
		return $row->url;
	}

}