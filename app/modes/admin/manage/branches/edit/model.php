<?php
class clsModModel extends clsAppModel{

	public function get($id)
	{
		return $this->dao->select()->from('mw_branches')->where('id')->eq($id)->fetch();
	}

	public function update($input)
	{
		$data = new stdClass();
		$data->name = $input->name;
		$data->desc = $input->desc;
		$data->keyword = $input->keyword;
		$data->summary = $input->summary;
		$data->contact = $input->contact;
		if (isset($input->img)) {
			$data->img = $input->img;
		}
		$this->dao->update('mw_branches')->data($data)->where('id')->eq($input->id)->exec();
		return !$this->dao->isFail();
	}
}