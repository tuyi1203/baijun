<?php
class clsModModel extends clsAppModel{

	public function getFields()
	{
		$list = $this->dao->select('*')->from('mw_field')->where('pid is null')->orderby('sort')->fetchAll();
		foreach ($list as $key => $value) {
			$result[$value->id] = $value->title;
		}
		return $result;
	}

	public function insert($input)
	{
		$this->dao->insert('mw_field')->data($input)->exec();
		return !$this->dao->isFail();
	}

}