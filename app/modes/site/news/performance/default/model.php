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
		$this->dao->select("count(id) cnt")->from("mw_article")->where("objecttype")->eq($input->objecttype)
					->andWhere("public")->eq($input->public);
		if (isset($input->lawyer)) {
			$this->dao->andWhere("find_in_set('$input->lawyer',lawyer)");
		}
		$row = $this->dao->fetch();
		return $row->cnt;
	}

	public function getPerformancelist($input)
	{
		$list = array();
		$this->dao->select()->from("mw_article")->where("objecttype")->eq($input->objecttype)
							->andWhere("public")->eq($input->public);

		if (isset($input->lawyer)) {
			$this->dao->andWhere("find_in_set('$input->lawyer',lawyer)");
		}
		$rows = $this->dao->orderby("publishtime desc")->limit($input->start , $input->end)->fetchAll();

		//取得标签名称
		if (!empty($rows)) {
			foreach ($rows as $value) {
				$labelids[] = $value->labelid;
			}
			$labels = $this->dao->select()->from("mw_field_label")->where("id")
							->in($labelids)->orderby("id")->fetchAll();

			foreach ($labels as $value) {
				foreach ($rows as $key=> $v) {
					if ($value->id == $v->labelid) {
						$rows[$key]->labelname = $value->desc;
					}
				}
			}

			$list = $rows;
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
		$row = $this->dao->select()->from('mw_file')->where('objecttype')->eq('article')->andWhere('objectid')->eq(1)
						->fetch();
		return $row->url;
	}

}