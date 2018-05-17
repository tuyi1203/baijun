<?php
class clsModModel extends clsAppModel{

	public function get($id)
	{
		$row = $this->dao->select()->from("mw_single")->where("id")->eq($id)
							->fetch();
		return $row;
	}

	public function getDetail($input)
	{
		$row = $this->dao->select()->from("mw_article")->where("id")->eq($input->id)
									->fetch();
		return $row;
	}

	public function getJigou()
	{
		$rows = $this->dao->select()->from("mw_branches")->orderby("sort")->fetchAll();
		$list = array();
		foreach ($rows as $key => $value) {
			$list[$value->id] = $value->name;
		}
		return $list;
	}

	public function getPositions()
	{
		$rows = $this->dao->select()->from("mw_position")->orderby("sort")->fetchAll();
		$list = array();
		foreach ($rows as $key => $value) {
			$list[$value->id] = $value->name;
		}
		return $list;
	}

	public function getLawyerpic($lawyerids)
	{
		$rows = $this->dao->select()->from("mw_file")->where("objecttype='lawyer'")
									->andWhere("objectid in (" . $lawyerids . ")")->fetchAll();
		$list = array();
		foreach ($rows as $key => $value) {
			$list[$value->objectid] = $value->url;
		}
		return $list;
	}

	public function getLabels($zhuanye)
	{
		$rows = $this->dao->select()->from("mw_field_label")->where("fid in (" . implode(',',$zhuanye) . ")")
					->fetchAll();
		return $rows;
	}

	public function getPredata($input)
	{
		$row = $this->dao->select()->from("mw_article")->where("publishtime <='" . $input->publishtime . "'")
						->andWhere("objecttype")->eq($input->objecttype)
						->andWhere("public")->eq("1")
						->andWhere("id")->ne($input->id)->orderby("publishtime desc")
						->limit("0,1")->fetch();
		return $row;
	}

	public function getNextdata($input)
	{
		$row = $this->dao->select()->from("mw_article")->where("publishtime >='" . $input->publishtime . "'")
						->andWhere("public")->eq("1")
						->andWhere("objecttype")->eq($input->objecttype)
						->andWhere("id")->ne($input->id)->orderby("publishtime asc")
						->limit("0,1")->fetch();
		return $row;
	}

	public function getLawyers($lawyerids)
	{
		$rows = $this->dao->select()->from("mw_lawyer")->where("id in (" . $lawyerids . ")")->orderby("zhiwei desc")->fetchAll();
		return $rows;
	}

	public function getOfficenewsList($input)
	{
		$list = array();
		$rows = $this->dao->select()->from("mw_article")->where("objecttype")->eq($input->objecttype)
							->andWhere("public")->eq($input->public)->orderby("publishtime desc")
							->limit($input->start , $input->end)->fetchAll();
//		pr($rows);
		if (!empty($rows)) {
			foreach ($rows as $value) {
				$ids[] = $value->id;
			}
			$covers = $this->dao->select()->from("mw_topimage")->where("objecttype")->eq($input->objecttype)
							->andWhere("objectid")->in($ids)->orderby("id")->fetchAll();

			foreach ($covers as $value) {
				foreach ($rows as $key=> $v) {
					if ($value->objectid == $v->id) {
						$rows[$key]->url = $value->url;
					}
				}
			}

			$list = $rows;
		}
		return $list;
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


}