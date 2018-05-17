<?php
class clsModModel extends clsAppModel{

	public function getCount()
	{
		$record = $this->dao->select('count(*) cnt')->from('mw_humanity_label')->fetch();
		return $record->cnt;
	}

	public function getList()
	{
		return $this->dao->select('*')->from('mw_humanity_label')->where('fid is null')->orderby('sort')->fetchAll();
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
		$this->dao->begin();
		//删除一级栏目
		$this->dao->delete()->from('mw_humanity_label')->where('id')->eq($input->id)->exec();

		//删除二级栏目
		$this->dao->delete()->from('mw_humanity_label')->where('fid')->eq($input->id)->exec();

		//TODO 删除二级栏目对应的文章
		
		$this->dao->commit();
		return !$this->dao->isFail();
	}



}