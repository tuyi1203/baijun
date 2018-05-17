<?php
class clsModModel extends clsAppModel{

	public function getDepartment()
	{
		$records = $this->dao->select()->from('eku_role')->where('id')->notin('(0,1)')->orderby('id')->fetchAll();
		$options[''] = '';
		foreach ($records as $key => $value) {
			$options[$value->id] = $value->name;
		}
		return $options;
	}

	public function del($id)
	{
		$this->dao->begin();
		//删除律师数据
// 		$this->dao->delete()->from('mw_lawyer')->where('id')->eq($id)->exec();
		$data = new stdClass();
		$data->del = '1';
		$this->dao->update('mw_lawyer')->data($data)->where('id')->eq($id)->exec();
		//删除照片数据
// 		$this->dao->delete()->from('mw_file')->where('objecttype')->eq('lawyer')->andWhere('objectid')->eq($id)->exec();
		$this->dao->commit();
		return !$this->dao->isFail();
	}

}