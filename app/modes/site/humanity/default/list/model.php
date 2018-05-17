<?php
class clsModModel extends clsAppModel{

	CONST GETLIST    = "select * from mw_article where public = '1' and (title like ? or content like ?) and objecttype in ('event','company','brotherhood','waterstop','notice','waterquality','waterpressure','bomb','party','metropolitan','drink','guide','report')";

	CONST GETCOUNT   = "select count(*) cnt from mw_article where public = '1' and (title like ? or content like ?) and objecttype in ('event','company','brotherhood','waterstop','notice','waterquality','waterpressure','bomb','party','metropolitan','drink','guide','report')";

	public function getList($input)
	{
		$output = array();
		$i = 1;

		$orderby = ' order by '. $input->orderby . " $input->sort , createtime desc ";

		$this->_oMdb->fncPreparedStatement(self::GETLIST . $orderby)
					->subSetNoNeedEscapeString($i++, '%'.$this->_oMdb->fncEscapeWildCard($input->keyword).'%')
					->subSetNoNeedEscapeString($i++, '%'.$this->_oMdb->fncEscapeWildCard($input->keyword).'%')
					->subSetLimit($input->start, $input->end)
					->fncExcuteQuery();

		while ($row = $this->_oMdb->fncGetRecordSet()) {
			$output[] = $row;
		}

		return $output;
	}

	public function getCount($input)
	{
		$i = 1;
		$this->_oMdb->fncPreparedStatement(self::GETCOUNT)
					->subSetNoNeedEscapeString($i++, '%'.$this->_oMdb->fncEscapeWildCard($input->keyword).'%')
					->subSetNoNeedEscapeString($i++, '%'.$this->_oMdb->fncEscapeWildCard($input->keyword).'%')
					->fncExcuteQuery();

		$row = $this->_oMdb->fncGetRecordSet();

		return $row['cnt'];
	}

}