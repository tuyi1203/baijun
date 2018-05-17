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

	public function getBanner()
	{
		$row = $this->dao->select()->from('mw_file')->where('objecttype')->eq('aboutus')->andWhere('objectid')->eq(1)
						->fetch();
		return $row->url;
	}


}