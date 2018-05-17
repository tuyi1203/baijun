<?php
class clsModModel extends clsAppModel{

	public function getList()
	{
		return $this->dao->select()->from('mw_branches')->orderby('sort')->fetchAll();
	}

	public function delete($id)
	{
		$this->dao->delete()->from('mw_branches')->where('id')->eq($id)->exec();
		return !$this->dao->isFail();
	}

	public function sort($input)
	{
		$this->dao->begin();
		foreach ($input->sort as $id => $sort) {
			$data = new stdClass();
			$data->sort = $sort;
			$this->dao->update('mw_branches')->data($data)->where('id')->eq($id)->exec();
		}
		$this->dao->commit();
		return !$this->dao->isFail();
	}

}