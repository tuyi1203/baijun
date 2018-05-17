<?php
class clsModModel extends clsAppModel{

	public function getWorklanguageList()
	{
		return $this->dao->select()->from('mw_worklanguage')->orderby('sort')->fetchAll();
	}

	public function delete($id)
	{
		$this->dao->delete()->from('mw_worklanguage')->where('id')->eq($id)->exec();
		return !$this->dao->isFail();
	}

	public function saveSort($input)
	{
		$this->dao->begin();
		foreach ($input->sort as $id => $sort) {
			$data = new stdClass();
			$data->sort = $sort;
			$this->dao->update('mw_worklanguage')->data($data)->where('id')->eq($id)->exec();
		}
		$this->dao->commit();
		return !$this->dao->isFail();
	}

}