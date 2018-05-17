<?php
class clsModModel extends clsAppModel{

	public function insert($input)
	{
		$this->dao->insert('mw_article')->data($input)->exec();
		return !$this->dao->isFail();
	}

}