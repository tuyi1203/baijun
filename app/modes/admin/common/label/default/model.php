<?php
class clsModModel extends clsAppModel{

    //     private $tablemodel = null;

	//取得标签列表
	public function getLabelList($fieldid)
	{
		return $this->dao->select()->from('mw_field_label')->where('fid')->eq($fieldid)->orderby('id desc')->fetchAll();
	}

	//添加标签
	public function addLabel($input)
	{
		$data = new stdClass();
		$data->fid = $input->fieldid;
		$data->desc = $input->labelname;
		$this->dao->insert('mw_field_label')->data($data)->exec();
	}

	//删除标签
	public function deleteLabel($id)
	{
		$this->dao->delete()->from('mw_field_label')->where('id')->eq($id)->exec();
		return !$this->dao->isFail();
	}


}