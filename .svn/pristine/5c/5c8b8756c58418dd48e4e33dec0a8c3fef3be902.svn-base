<?php
class clsModModel extends clsAppModel{


	public function insert($input)
	{
		$this->dao->begin();
		$data = new stdClass();
		$data->today  = $input->day;
		$data->place1 = $input->place1;
		$data->arg11  = $input->arg11;
		$data->arg12  = $input->arg12;
		if (isset($input->place2)) {
			$data->place2 = $input->place2;
		}
		if (isset($input->arg21)) {
			$data->arg21 = $input->arg21;
		}
		if (isset($input->arg22)) {
			$data->arg22 = $input->arg22;
		}
		if (isset($input->place3)) {
			$data->place3 = $input->place3;
		}
		if (isset($input->arg31)) {
			$data->arg31 = $input->arg31;
		}
		if (isset($input->arg32)) {
			$data->arg32 = $input->arg32;
		}
		$data->createtime = date("Y-m-d H:i:s");
		$data->createby   = session('_UserId');

		$this->dao->insert('mw_todaywater')->data($data)->exec();
		$this->dao->commit();
		return !$this->dao->isFail();
	}
}