<?php
class clsModModel extends clsAppModel{

	public function insert($input)
	{
		//取得下一个ID号
		$nextid = $this->dao->select('max(id)+1 id')->from('eku_role')->fetch();
		$input->id = $nextid->id;
		$this->dao->insert('eku_role')->data($input)->exec();
		return !$this->dao->isFail();
	}

}