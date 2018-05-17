<?php
class clsModModel extends clsAppModel{

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
}