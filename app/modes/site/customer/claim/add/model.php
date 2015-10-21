<?php
class clsModModel extends clsAppModel{

	public function insert($input)
	{
		$data = new stdClass();
		$data->name 	= strip_tags($input->name);
		$data->cardno 	= $input->cardno;
		$data->tel	 	= $input->tel;
		$data->email 	= $input->email;
		$data->addr 	= $input->addr;
		$data->content 	= strip_tags($input->content);
		$data->objecttype = MODULES;
		$data->createtime = date("Y-m-d H:i:s");
		$this->dao->insert('mw_message')->data($data)->exec();
		return !$this->dao->isFail();
	}

}