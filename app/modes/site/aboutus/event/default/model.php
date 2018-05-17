<?php
class clsModModel extends clsAppModel{

	public function getEvents()
	{
		$rows = $this->dao->select()->from("mw_article")->where("objecttype")->eq("event")->andWhere("public")->eq("1")
							->orderby("publishtime desc")->fetchAll();
		return $rows;
	}

	public function getBanner()
	{
		$row = $this->dao->select()->from('mw_file')->where('objecttype')->eq('aboutus')->andWhere('objectid')->eq(1)
						->fetch();
		return $row->url;
	}

}