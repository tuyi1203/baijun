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

	public function getCount($input)
	{
		$record = $this->dao->select('count(*) cnt')->from('mw_field')->where('pid='.$input->pid)->fetch();
		return $record->cnt;
	}

	public function getList($input)
	{
		return $this->dao->select('*')->from('mw_field')->where('pid='.$input->pid)->orderby('sort')->fetchAll();
	}
}