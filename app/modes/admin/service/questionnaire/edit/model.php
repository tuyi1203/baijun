<?php
class clsModModel extends clsAppModel{


	public function insert($input) {
		$this->dao->begin();

		$data = new stdClass();
		$data->title 	 = $input->title;
		$data->content	 = $input->content;
		$data->starttime = $input->starttime;
		$data->endtime   = $input->endtime;
		$data->createtime= date("Y-m-d H:i:s");
		$data->createby  = session('_UserId');
		$this->dao->insert('mw_questionnaire')->data($data)->exec();

		//取得问卷调查ID
		$qestionnaireId = $this->dao->lastInsertID();
		foreach ($input->question as $key => $value) {
			$data = new stdClass();
			$data->title 	= $value;
			$data->pid      = $qestionnaireId;
			if (isset($_POST['ismulti']) and isset($_POST['ismulti'][$key])) {
				$data->mutiflg  = '1';
			}
			$this->dao->insert('mw_questionnaire_question')->data($data)->exec();
			$questionId  = $this->dao->lastInsertID();
			foreach ($input->option[$key] as $key => $value) {
				$data = new stdClass();
				$data->title      = $value;
				$data->qid        = $questionId;
				$this->dao->insert('mw_questionnaire_option')->data($data)->exec();
			}
		}

		$this->dao->commit();
		return !$this->dao->isFail();
	}

	public function delete($input) {
		$this->dao->begin();
		//删除问卷
		$this->dao->delete()->from('mw_questionnaire')->where('id')->eq($input->id)->exec();

		//取得qid
		$rows = $this->dao->select('id')->from('mw_questionnaire_question')->where('pid')->eq($input->id)->fetchAll();
		foreach ($rows as $value) {
			$qid[] = $value->id;
		}

		//删除问题
		$this->dao->delete()->from('mw_questionnaire_question')->where('pid')->eq($input->id)->exec();

		//删除选项
		$this->dao->delete()->from('mw_questionnaire_option')->where('qid in ('. implode(',',$qid) .')')->exec();
		$this->dao->commit();
		return !$this->dao->isFail();
	}

	public function get($input)
	{
		$rows = $this->dao->select('a.title , a.content , a.starttime , a.endtime , b.id qid , b.title qtitle , b.mutiflg , c.id oid , c.title otitle')
				->from('(select id, title , content , starttime , endtime from mw_questionnaire where id = '.$input->id.') a')
				->leftJoin('mw_questionnaire_question b')->on('a.id = b.pid')
				->leftJoin('mw_questionnaire_option c')->on('b.id = c.qid')
				->orderby('a.id , b.id , c.id')
				->fetchAll();
		return $rows;
	}

	public function update($input)
	{
		$this->dao->begin();
		//先删除后插入
		//1.更新问卷
		$data = new stdClass();
		$data->title 	 = $input->title;
		$data->content	 = $input->content;
		$data->starttime = $input->starttime;
		$data->endtime   = $input->endtime;
		$data->updatetime= date("Y-m-d H:i:s");
		$data->updateby  = session('_UserId');
		$this->dao->update('mw_questionnaire')->data($data)->where('id')->eq($input->id)->exec();

		//2.删除问题
		//取得qid
		$rows = $this->dao->select('id')->from('mw_questionnaire_question')->where('pid')->eq($input->id)->fetchAll();
		foreach ($rows as $value) {
			$qid[] = $value->id;
		}

		$this->dao->delete()->from('mw_questionnaire_question')->where('pid')->eq($input->id)->exec();

		//3.删除选项
		$this->dao->delete()->from('mw_questionnaire_option')->where('qid in ('. implode(',',$qid) .')')->exec();

		//4.插入问题，插入选项
		$qestionnaireId = $input->id;
		foreach ($input->question as $key => $value) {
			$data = new stdClass();
			$data->title 	= $value;
			$data->pid      = $qestionnaireId;
			if (isset($_POST['ismulti']) and isset($_POST['ismulti'][$key])) {
				$data->mutiflg  = '1';
			}
			$this->dao->insert('mw_questionnaire_question')->data($data)->exec();
			$questionId  = $this->dao->lastInsertID();
			foreach ($input->option[$key] as $key => $value) {
				$data = new stdClass();
				$data->title      = $value;
				$data->qid        = $questionId;
				$this->dao->insert('mw_questionnaire_option')->data($data)->exec();
			}
		}

		$this->dao->commit();
		return !$this->dao->isFail();
	}
}