<?php
class clsModModel extends clsAppModel{

	public function getDetail($id)
	{
		$result = $this->dao->select()->from('mw_branches')->where('id='.$id)->fetch();
		return $result;
	}

	public function getRelationLawyer($id)
	{
		$result = $this->dao->select("a.* , b.url , c.name zhiweiming")->from('mw_lawyer')->alias("a")
							->leftjoin("mw_file")->alias("b")->on("b.objecttype='lawyer'")->andWhere("a.id = b.objectid")
							->leftjoin("mw_position")->alias("c")->on("a.zhiwei = c.id")
							->where('a.jigou='.$id)->andWhere("a.del<>'1'")
							->orderby("a.first_name_alpha")->fetchAll();
		return $result;
	}

	public function getBranches()
	{
		$result = $this->dao->select()->from('mw_branches')->orderby('sort')->fetchAll();
		return $result;
	}

}