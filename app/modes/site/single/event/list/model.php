<?php
class clsModModel extends clsAppModel{

	CONST GETLIST    = "select a.* , b.url from ( select * from mw_article where objecttype=? and public='1') a left join (select * from mw_topimage where objecttype=?) b on a.id = b.objectid ";

	public function getList($input) {
		$output = array();
		$i = 1;

		$orderby = ' order by '. $input->orderby . " $input->sort , createtime desc ";

		$this->_oMdb->fncPreparedStatement(self::GETLIST . $orderby)
					->subSetLimit($input->start, $input->end)
					->subSetString($i++, $input->objecttype)
					->subSetString($i++, $input->objecttype)
					->fncExcuteQuery();

		while ($row = $this->_oMdb->fncGetRecordSet()) {
			$output[] = $row;
		}

		return $output;
	}
}