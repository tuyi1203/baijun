<?php
class clsModModel extends clsAppModel{

	public function getLabels()
	{
		$list = $this->dao->select('*')->from('mw_humanity_label')->where('fid is null')->orderby('sort')->fetchAll();
		foreach ($list as $key => $value) {
			$result[$value->id] = $value->title;
		}
		return $result;
	}

	public function insert($input)
	{
		$this->dao->insert('mw_humanity_label')->data($input)->exec();
		return !$this->dao->isFail();
	}

}