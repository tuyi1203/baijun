<?php
class clsModModel extends clsAppModel{


	public function getLabels()
	{
		$list = $this->dao->select('*')->from('mw_humanity_label')->where('fid is null')->orderby('sort')->fetchAll();
		foreach ($list as $key => $value) {
			$result[$value->id] = $value->title;
		}
		return $result;
	}

	public function getCount($input)
	{
		$record = $this->dao->select('count(*) cnt')->from('mw_humanity_label')->where('fid='.$input->pid)->fetch();
		return $record->cnt;
	}

	public function getList($input)
	{
		return $this->dao->select('*')->from('mw_humanity_label')->where('fid='.$input->pid)->orderby('sort')->fetchAll();
	}

	public function saveSort($input)
	{
		$this->dao->begin();
		foreach ($input->sort as $id => $sort) {
			$data = new stdClass();
			$data->sort = $sort;
			$this->dao->update('mw_humanity_label')->data($data)->where('id')->eq($id)->exec();
		}
		$this->dao->commit();
		return !$this->dao->isFail();
	}

	public function delete($input) 
	{
		//删除栏目
		$this->dao->delete()->from('mw_humanity_label')->where('id')->eq($input->id)->exec();
		return !$this->dao->isFail();
	}


}