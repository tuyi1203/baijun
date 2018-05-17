<?php
class clsModModel extends clsAppModel{

    //     private $tablemodel = null;

	public function getLawyerList($lawyername)
	{
		$lawyerList =  $this->dao->select()->from('mw_lawyer')->where('fullname')->like('%' . $lawyername . '%')->andWhere('del')->ne('1')->orderby('id asc')->fetchAll();
		$bumens = $this->dao->select()->from('eku_role')->where('id')->gt(1)->orderby('id')->fetchAll();
		$pics = $this->dao->select()->from('mw_file')->where('objecttype')->eq('lawyer')->fetchAll();
		foreach ($bumens as $key => $value) {
			$arr_bumens[$value->id] = $value->name;
		}
		foreach ($pics as $key => $value) {
			$arr_pics[$value->objectid] = $value->url;
		}
		foreach ($lawyerList as $key => $value) {
			if (array_key_exists($value->bumen, $arr_bumens)) {
				$value->bumenName = $arr_bumens[$value->bumen];
			}
			if (array_key_exists($value->id, $arr_pics)) {
				$value->url = $arr_pics[$value->id];
			}
		}
		return $lawyerList;
	}

}