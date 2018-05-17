<?php
class clsModModel extends clsAppModel{

    //     private $tablemodel = null;

	//取得标签列表
	public function getLabelList()
	{
		$list =  $this->dao->select("id,fid,title, IF (fid IS NULL, 0, 1) sort1,sort")
						->from('mw_humanity_label')
						->where('id not in ( select DISTINCT fid from mw_humanity_label where fid is not null)')
						->orderby('	sort1,sort')
						->fetchAll();
		$fidlist = $this->dao->select("id , title")
						->from('mw_humanity_label')
						->where('fid is null')
						->fetchAll();
		if (!empty($fidlist)) {
			foreach ($fidlist as $key => $value) {
				$arr_fidlist[$value->id] = $value->title;
			}
		}
		foreach ($list as $key => $value) {
			if ($value->fid != '') {
				$value->ftitle = $arr_fidlist[$value->fid];
				$value->descr =  $value->ftitle . ' - [二级]'. $value->title;
			} else {
				$value->descr = '[一级]' . $value->title;
			}
		}
		return $list;
	}

}