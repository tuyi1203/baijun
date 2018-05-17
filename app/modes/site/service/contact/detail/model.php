<?php
class clsModModel extends clsAppModel{

	public function getBranches()
	{
		$result = $this->dao->select()->from('mw_branches')->orderby('sort')->fetchAll();
		return $result;
	}

	public function getBanner()
	{
		$row = $this->dao->select()->from('mw_file')->where('objecttype')->eq('service')->andWhere('objectid')->eq(1)
						->fetch();
		return $row->url;
	}

}