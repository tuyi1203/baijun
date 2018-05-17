<?php
class clsModModel extends clsAppModel{

	public function getLawyerList($ids)
	{
		return $this->dao->select()->from('mw_lawyer')->where("id in(".$ids.")")->orderby('id asc')->fetchAll();
	}

}