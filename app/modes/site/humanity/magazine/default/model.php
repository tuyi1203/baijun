<?php
class clsModModel extends clsAppModel{

	public function get($id)
	{
		$row = $this->dao->select()->from("mw_single")->where("id")->eq($id)
							->fetch();
		return $row;
	}

	public function getSetValue($input)
	{
		$row = $this->dao->select()->from("mw_set")->where("`key`")->eq($input->key)
									->andWhere('subkey')->eq($input->subkey)
									->fetch();
		return $row;	
	}

	public function getPics()
	{
		$rows = $this->dao->select("a.* , b.url , b.id fileid")->from("mw_honor")->alias("a")->leftjoin("mw_file")
					->alias("b")->on("b.objecttype")->eq("honor")->andWhere("a.id = b.objectid")
					->orderby("a.sort asc , b.id ")->fetchAll();
		return $rows;
	}

	public function getAlbums()
	{
		//$rows = $this->dao->select()->from("mw_album")->alias("a")->
	}

	public function getCount($input)
	{
		$row = $this->dao->select("count(id) cnt")->from("mw_album")->where("subkey")->eq($input->subkey)->fetch();
		return $row->cnt;
	}

	public function getAlbumList($input)
	{
		$list = array();
		$albums = $this->dao->select()->from("mw_album")->where("subkey")->eq($input->subkey)
						->orderby("sort")->limit($input->start , $input->end)->fetchAll();

		// pr($albums);
		if (!empty($albums)) {
			foreach ($albums as $value) {
				$aids[] = $value->id;
			}
			$pics = $this->dao->select()->from("mw_file")->where("objecttype")->eq($input->objecttype)
						->andWhere("objectid")->in($aids)->orderby("objectid , `primary` desc , id")->fetchAll();

			$list = $this->mergeArray($albums , $pics , 'pics' , array('id','objectid'));
			//pr($list);
		}
		return $list;

	}

	private function mergeArray($arrMain , $arrSub , $keyName , $mergeCondition)
	{
		// $array = array();
		$arrMain = obj2array($arrMain);
		$arrSub  = obj2array($arrSub);
		$a = $mergeCondition[0];
		$b = $mergeCondition[1];
		foreach ($arrMain as $k =>  $v) {
			foreach ($arrSub as $key => $value) {
				if ($v[$a] == $value[$b]) {
					$arrMain[$k][$keyName][] = $arrSub[$key];
				}
			}
		}
		return $arrMain;
	}

	public function getMenuList()
	{
		$plist = $this->dao->select('id , title , entitle , sort')->from('mw_humanity_label')->where('fid is null')->orderby('sort')->fetchAll();
		$slist = $this->dao->select('id , fid, title , entitle , sort')->from('mw_humanity_label')->where('fid is not null')->orderby('sort')->fetchAll();
		foreach ($slist as $key => $value) {
			$arr_slist[$value->fid][] = array('id'=>$value->id , 'title'=>$value->title , 'entitle'=>$value->entitle , 'sort'=>$value->sort);
		}
		$i = 1; $enddlflg = 0;
		foreach ($plist as $key => $value) {
			if ($i == 1 || $enddlflg == 1) { 
				$value->dlflg = '1';
				$enddlflg = 0;
			}
			if (array_key_exists($value->id, $arr_slist)) {
				$value->sublist = $arr_slist[$value->id];
				$value->enddlflg = "1";
				$enddlflg = 1;
			}
			if (count($plist) == $i) $value->enddlflg = "1";
			$i++;
		}
		return $plist;
	}

	public function getMagazineList()
	{
		$list = $this->dao->select()->from('mw_writing')->orderby('publishyear desc , sort desc')->limit(1,3)->fetchAll();
		$pics = $this->dao->select()->from('mw_file')->where('objecttype')->eq('magazine')->andWhere('`primary`')->eq('1')->fetchAll();
		foreach ($pics as $key => $value) {
			$arr_pics[$value->objectid] = $value->url;
		}
		foreach ($list as $key => $value) {
			if (array_key_exists($value->id, $arr_pics)) {
				$value->url = $arr_pics[$value->id];
			}
		}
		return $list;
	}

	public function getList()
	{
		$result = array();
		$magazineList = $this->dao->select()->from('mw_writing')->orderby('publishyear desc , sort desc')->fetchAll();
		$photoes = $this->dao->select()->from("mw_file")->where('objecttype')->eq('magazine')->orderby('`primary` desc')->fetchAll();
		foreach ($magazineList as $key => $value) {
			$result[$value->publishyear]['publishyear'] = $value->publishyear;
			$result[$value->publishyear]['magazines'][$key] = array('publishyear'=>$value->publishyear , 'id'=>$value->id , 'title'=>$value->title , 
						'groupid'=>$value->id,'desc'=>$value->desc);
			foreach ($photoes as $subkey => $subvalue) {
				if ($value->id == $subvalue->objectid) {
					$result[$value->publishyear]['magazines'][$key]['photoes'][] = array('primary'=>$subvalue->primary , 'title'=>$subvalue->title , 
						'groupid'=>$value->id,'url'=>$subvalue->url);
					if ($subvalue->primary == "1") {
						$result[$value->publishyear]['magazines'][$key]['pictitle'] = $subvalue->title;
						$result[$value->publishyear]['magazines'][$key]['picurl'] = $subvalue->url;
					}
				}
			}
		}
		return $result;
	}


}