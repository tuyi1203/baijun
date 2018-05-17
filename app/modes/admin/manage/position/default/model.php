<?php
class clsModModel extends clsAppModel{

	public function getDepartmentList()
	{
		return $this->dao->select()->from('mw_position')->orderby('sort')->fetchAll();
	}

	public function delete($id)
	{
		$this->dao->delete()->from('mw_position')->where('id')->eq($id)->exec();
		return !$this->dao->isFail();
	}

	public function saveSort($input)
	{
		$this->dao->begin();
		foreach ($input->sort as $id => $sort) {
			$data = new stdClass();
			$data->sort = $sort;
			$this->dao->update('mw_position')->data($data)->where('id')->eq($id)->exec();
		}
		$this->dao->commit();
		return !$this->dao->isFail();
	}

}