<?php
class clsModModel extends clsAppModel{

	public function getDepartmentList()
	{
		return $this->dao->select()->from('eku_role')->where('id')->notin('(0,1)')->orderby('id')->fetchAll();
	}

	public function delete($id)
	{
		$this->dao->begin();
		$this->dao->delete()->from('eku_role')->where('id')->eq($id)->exec();

		//删除权限信息
		$this->dao->delete()->from('eku_role_action')->where('roleid')->eq($id)->exec();
		$this->dao->commit();
		return !$this->dao->isFail();
	}

}