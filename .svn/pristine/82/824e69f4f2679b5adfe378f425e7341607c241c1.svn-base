<?php
class clsModModel extends clsAppModel{

	public function get($input)
	{
		$rows = $this->dao->select()->from('mw_todaywater')->where('id')->eq($input->id)->fetchAll();
		return obj2array($rows[0]);
	}

	public function update($input)
	{
		$this->dao->begin();
		$data = new stdClass();
		$data->today  = $input->day;
		$data->place1 = $input->place1;
		$data->arg11  = $input->arg11;
		$data->arg12  = $input->arg12;
		$data->place2 = $input->place2;
		$data->arg21 = $input->arg21;
		$data->arg22 = $input->arg22;
		$data->place3 = $input->place3;
		$data->arg31 = $input->arg31;
		$data->arg32 = $input->arg32;
		$data->updatetime= date("Y-m-d H:i:s");
		$data->updateby  = session('_UserId');
		$this->dao->update('mw_todaywater')->data($data)->where('id')->eq($input->id)->exec();
		$this->dao->commit();
		return !$this->dao->isFail();
	}

}