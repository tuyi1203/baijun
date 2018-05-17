<?php
class clsModModel extends clsAppModel{

    //     private $tablemodel = null;

	//取得标签列表
	public function getLabelList()
	{
		return $this->dao->select('a.id , a.title , b.id labelid , b.desc')->from('mw_field')->alias('a')
				->leftJoin('mw_field_label')->alias('b')->on('a.id = b.fid')
				->where("a.pid is null")
				->orderby('id desc , labelid desc')
				->fetchAll();
	}

}