<?php
class clsModModel extends clsAppModel{

    //     private $tablemodel = null;

	public function getLawyerList($lawyername)
	{
		return $this->dao->select()->from('mw_lawyer')->where('fullname')->like('%' . $lawyername . '%')->orderby('id asc')->fetchAll();
	}

}