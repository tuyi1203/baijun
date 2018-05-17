<?php
class clsModModel extends clsAppModel{

	public function get($id)
	{
		return $this->dao->select()->from('mw_worklanguage')->where('id')->eq($id)->fetch();
	}

	public function update($input)
	{
		$data = new stdClass();
		$data->name = $input->name;
		$this->dao->update('mw_worklanguage')->data($data)->where('id')->eq($input->id)->exec();
		return !$this->dao->isFail();
	}
}