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
}