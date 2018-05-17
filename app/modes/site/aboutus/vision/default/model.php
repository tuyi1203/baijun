<?php
class clsModModel extends clsAppModel{

	public function get($id)
	{
		$row = $this->dao->select()->from("mw_single")->where("id")->eq($id)
							->fetch();
		return $row;
	}

	public function getBanner()
	{
		$row = $this->dao->select()->from('mw_file')->where('objecttype')->eq('aboutus')->andWhere('objectid')->eq(1)
						->fetch();
		return $row->url;
	}

}