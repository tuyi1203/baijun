<?php
class clsModModel extends clsAppModel{

	public function getBranchesList()
	{
		$list =  $this->dao->select()->from('mw_branches')->orderby('id')->fetchAll();
		foreach ($list as $value) {
			$return[$value->id] = $value->name;
		}
		return $return;
	}

	public function getFieldList()
	{
		$list = $this->dao->select()->from('mw_field')->where('pid is null')->orderby('id')->fetchAll();
		foreach($list as $value){
			$return[$value->id] = $value->title;
		}
		return $return;
	}

	public function getSubFieldList($pid)
	{
		$list = $this->dao->select()->from('mw_field')->where('pid='.$pid)->orderby('id')->fetchAll();
		$return = array();
		foreach($list as $value){
			$return[$value->id] = $value->title;
		}
		return $return;
	}

	public function getDepartmentList()
	{
		$list = $this->dao->select()->from('eku_role')->where('id')->notin('(0,1)')->orderby('id')->fetchAll();
		foreach($list as $value){
			$return[$value->id] = $value->name;
		}
		return $return;
	}

	public function getPositionList()
	{
		$list = $this->dao->select()->from('mw_position')->orderby('sort')->fetchAll();
		foreach($list as $value){
			$return[$value->id] = $value->name;
		}
		return $return;
	}

	public function getWorklanguageList()
	{
		$list = $this->dao->select()->from('mw_worklanguage')->orderby('sort')->fetchAll();
		foreach($list as $value){
			$return[$value->id] = $value->name;
		}
		return $return;
	}

	public function insert($input)
	{
		$this->dao->insert('mw_lawyer')->data($input)->exec();
		return !$this->dao->isFail();
	}

}