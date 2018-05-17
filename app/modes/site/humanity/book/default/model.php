<?php
class clsModModel extends clsAppModel{

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
		$bookList = $this->dao->select()->from('mw_book')->orderby('publishyear desc , sort desc')->fetchAll();
		$photoes = $this->dao->select()->from("mw_file")->where('objecttype')->eq('book')->andWhere('`primary`')->eq('1')->orderby('id')->fetchAll();
		foreach ($bookList as $key => $value) {
			$result[$value->publishyear]['publishyear'] = $value->publishyear;
			$result[$value->publishyear]['books'][$key] = array('publishyear'=>$value->publishyear , 'id'=>$value->id , 'title'=>$value->title , 
						'desc'=>$value->desc);
			foreach ($photoes as $subkey => $subvalue) {
				if ($value->id == $subvalue->objectid) {
					$result[$value->publishyear]['books'][$key]['pictitle'] = $subvalue->title;
					$result[$value->publishyear]['books'][$key]['picurl'] = $subvalue->url;
				}
			}
		}
		return $result;
	}

	public function getDetail($input)
	{
		$book = $this->dao->select()->from('mw_book')->where('id')->eq($input->id)->fetch();
		$bookBanner = $this->dao->select()->from('mw_file')->where('objecttype')->eq('book')->andWhere('objectid')->eq($input->id)
							->andWhere('banner')->eq('1')->fetch()->url;
		$bookAuthors = $this->dao->select()->from('mw_lawyer')->where('id')->in(explode(',', $book->author))->fetchAll();
		$book->author = array();
		foreach ($bookAuthors as $key => $value) {
			$book->author[$value->id] = array('id'=>$value->id , 'name'=>$value->fullname);
		}
		$book->banner = $bookBanner;
		return $book;
	}


}