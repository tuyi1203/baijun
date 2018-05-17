<?php
class clsModModel extends clsAppModel{

	public function update($input)
	{
		$data = new stdClass();
        $data->title       = $input->title;
        $data->entitle     = $input->entitle;
        $data->updateby    = $input->updateby;
        $data->updatetime  = $input->updatetime;
		$this->dao->update('mw_humanity_label')->data($data)->where('id')->eq($input->id)->exec();
		return !$this->dao->isFail();
	}

	public function get($input)
	{
		$result = $this->dao->select()->from('mw_humanity_label')->where('id')->eq($input->id)->fetch();
		return $result;
	}

}