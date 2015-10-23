<?php
class clsModModel extends clsAppModel{

    //     private $tablemodel = null;

	public function getLawyerList()
	{
		return $this->dao->select()->from('mw_lawyer')->orderby('id asc')->fetchAll();
	}

}