<?php
class clsModModel extends clsAppModel{

	public function update($input)
	{
		$this->dao->begin();

		//参与调查人数+1
		$data = array();
		$sql = 'update mw_questionnaire set count=ifnull(count + 1,1) where id = ? ';
		$data[] = $input->id;

		$this->dao->prepare($sql)->execute($data);

		$sql = 'update mw_questionnaire_option set count = ifnull(count + 1,1) where id = ? ';
		foreach ($input->option as $key => $value) {
			$data = array();
			$data[] = $key;
			$this->dao->prepare($sql)->execute($data);
		}

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
}