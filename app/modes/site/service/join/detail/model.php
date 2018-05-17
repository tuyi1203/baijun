<?php
class clsModModel extends clsAppModel{

	public function getJob($id)
	{
		$job = $this->dao->select("a.* , b.title groupname , b.label, b.id groupid , c.url , d.name placename")->from("mw_hr")
							->alias("a")->leftjoin("mw_hr_group")->alias("b")->on("a.group=b.id")
							->leftjoin("mw_file")->alias("c")->on("b.id=c.objectid")->andWhere("c.objecttype='hrgroup'")
							->leftjoin("mw_branches")->alias("d")->on("d.id = a.place")
							->where("a.id")->eq($id)
							->fetch();
		return $job;
	}
	
	public function getBanner()
	{
		$row = $this->dao->select()->from('mw_file')->where('objecttype')->eq('service')->andWhere('objectid')->eq(1)
						->fetch();
		return $row->url;
	}
}