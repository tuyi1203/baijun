<?php
class clsModModel extends clsAppModel{

	public function get($id)
	{
		return $this->dao->select()->from('mw_position')->where('id')->eq($id)->fetch();
	}

	public function update($input)
	{
		$data = new stdClass();
		$data->name = $input->name;
		$data->desc = $input->desc;
		$this->dao->update('mw_position')->data($data)->where('id')->eq($input->id)->exec();
		return !$this->dao->isFail();
	}
}