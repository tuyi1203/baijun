<?php
class clsModModel extends clsAppModel{

	public function getNoticeFlg()
	{
		$rows = $this->dao->select('`value`')->from('mw_set')->where('`key`')->eq('config')->andWhere('`subkey`')->eq('notice')->fetchAll();
		return $rows[0]->value;
	}

	public function getNotice()
	{
		$rows = $this->dao->select('`value`')->from('mw_set')->where('`key`')->eq('config')->andWhere('`subkey`')->eq('noticecontent')->fetchAll();
		return $rows[0]->value;
	}

}