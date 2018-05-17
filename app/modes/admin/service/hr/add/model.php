<?php
class clsModModel extends clsAppModel{

	public function getGroup()
	{
		$result = $this->dao->select()->from('mw_hr_group')->orderby('sort')->fetchAll();
		foreach ($result as $value) {
			$list[$value->id] = $value->title;
		}
		return $list;
	}

	public function getPlaces()
	{
		$result = $this->dao->select()->from('mw_branches')->orderby('id')->fetchAll();
		foreach ($result as $value) {
			$list[$value->id] = $value->name;
		}
		return $list;
	}


}