<?php
class clsModModel extends clsAppModel{

	public function getByID($input)
	{
		return $this->dao->select('*')->from('mw_humanity_label')->where('id='.$input->id)->fetch();
	}


	public function getLabels()
	{
		$list = $this->dao->select('*')->from('mw_humanity_label')->where('fid is null')->orderby('sort')->fetchAll();
		foreach ($list as $key => $value) {
			$result[$value->id] = $value->title;
		}
		return $result;
	}

	public function update($input)
	{
		$data = new stdClass();
		$data->title       = $input->title;
		$data->entitle     = $input->entitle;
		// $data->fid         = $input->fid;
        // $data->label       = $input->label;
        // $data->desc        = $input->desc;
        $data->updateby    = $input->updateby;
        $data->updatetime  = $input->updatetime;
		$this->dao->update('mw_humanity_label')->data($data)->where('id')->eq($input->id)->exec();
		return !$this->dao->isFail();
	}
}