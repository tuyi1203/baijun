<?php
class clsModModel extends clsAppModel{

	public function get($id)
	{
		return $this->dao->select('a.* , b.desc')
					->from('mw_world')->alias('a')
					->leftJoin('mw_field_label')->alias('b')->on('a.labelid = b.id')
					->where('a.id')->eq($id)
					->fetch();
	}

	public function getLawyerList($ids)
	{
		return $this->dao->select()->from('mw_lawyer')->where("id in(".$ids.")")->orderby('id asc')->fetchAll();
	}

	public function getAuthorName($id)
	{
		$author =  $this->dao->select()->from('mw_lawyer')->where('id')->eq($id)->fetch();
		return $author->fullname;
	}

}