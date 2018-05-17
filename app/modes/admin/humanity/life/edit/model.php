<?php
class clsModModel extends clsAppModel{

	public function get($id)
	{
		return $this->dao->select('a.* , b.title labelname')
					->from('mw_world')->alias('a')
					->leftJoin('mw_humanity_label')->alias('b')->on('a.labelid = b.id')
					->where('a.id')->eq($id)
					->fetch();
	}

	public function getLawyerList($ids)
	{
		return $this->dao->select()->from('mw_lawyer')->where("id in(".$ids.")")->orderby('id asc')->fetchAll();
	}

	public function getAuthorName($id)
	{
		$author =  $this->dao->select()->from('mw_lawyer')->where('id')->eq($id)->fetch();
		return $author->fullname;
	}

	public function update($input)
	{
		$data = new stdClass();
		$data->title       = $input->title;
		$data->keyword     = $input->keyword;
		$data->summary     = $input->summary;
		$data->content     = $input->content;
        $data->labelid     = $input->labelid;
        $data->updateby    = $input->updateby;
        $data->updatetime  = $input->updatetime;
        $data->publishtime = $input->publishtime;
        $data->status      = $input->status;
        $data->views       = $input->views;
        $data->lawyerflg   = $input->lawyerflg;
        $data->authorname  = $input->authorname;
        $data->authorid    = $input->authorid;
		$this->dao->update('mw_world')->data($data)->where('id')->eq($input->id)->exec();
		return !$this->dao->isFail();
	}



}