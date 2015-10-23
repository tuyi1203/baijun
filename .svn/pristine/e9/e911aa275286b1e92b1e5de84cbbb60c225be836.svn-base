<?php
class clsModModel extends clsAppModel{

	public function get($input)
	{
		$rows = $this->dao->select('a.title , a.content , a.starttime , a.endtime , a.count ,b.id qid , b.title qtitle , b.mutiflg , c.id oid , c.title otitle , c.count ocount')
				->from('(select id, title , content , starttime , endtime , count from mw_questionnaire where id = '.$input->id.') a')
				->leftJoin('mw_questionnaire_question b')->on('a.id = b.pid')
				->leftJoin('mw_questionnaire_option c')->on('b.id = c.qid')
				->orderby('a.id , b.id , c.id')
				->fetchAll();
		return $rows;
	}

}