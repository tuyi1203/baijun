<?php
class clsModModel extends clsAppModel{

// 	public function getNoticeFlg()
// 	{
// 		$rows = $this->dao->select('`value`')->from('mw_set')->where('`key`')->eq('config')->andWhere('`subkey`')->eq('notice')->fetchAll();
// 		return $rows[0]->value;
// 	}

// 	public function getNotice()
// 	{
// 		$rows = $this->dao->select('`value`')->from('mw_set')->where('`key`')->eq('config')->andWhere('`subkey`')->eq('noticecontent')->fetchAll();
// 		return $rows[0]->value;
// 	}

	public function getOfficeNews($time)
	{
		$start = ( $time - 1 )*3 + 1;
		$end = $start + 2 ;
		//$result = $this->dao->select()->from("mw_article")->where("objecttype='officenews'")->andWhere("public='1'")->orderby('rand()')->limit('3')->fetchAll();
		$result = $this->dao->select()->from("mw_article")->where("objecttype='officenews'")->andWhere("public='1'")
							->orderby('publishtime desc')->limit($start , $end)->fetchAll();
		return $result;
	}

	public function getYeji()
	{
		$result = $this->dao->select()->from("mw_article")->where("objecttype='performance'")->andWhere("public='1'")->orderby('createtime desc')->limit('3')->fetchAll();
		return $result;
	}

	public function getMore()
	{
		$result = $this->dao->select()->from("mw_file")->where("objecttype='more'")->andWhere("objectid='1'")->orderby('createtime desc')->fetch();
		return $result;
	}

	public function getSlides()
	{
		$result = $this->dao->select('a.* , b.url')->from('mw_slides')->alias("a")->leftjoin("mw_file")->alias("b")->on("a.id=b.objectid")->andWhere("b.objecttype='slides'")->orderby('a.sort')->fetchAll();
		return $result;
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
		$list = $this->dao->select()->from('mw_writing')->orderby('publishyear desc , createtime desc')->limit(1,3)->fetchAll();
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

	public function getBanner() 
	{
		$result = $this->dao->select()->from("mw_file")->where('objecttype')->eq('humanity')->andWhere('objectid')->eq(1)->fetch();
		if (!empty($result))
		return $result->url;
	}

	public function getTop()
	{
		$result = $this->dao->select()->from('mw_world')->where('labeltop')->eq('1')->fetch();
		return $result->id;
	}

	public function getLabelTopData()
	{
		$topdata = $this->dao->select()->from("mw_world")->where('labeltop')->eq('1')->fetch();
		$label = $this->dao->select()->from('mw_humanity_label')->where('id')->eq($topdata->labelid)->fetch();
		$topdata->labelname = $label->title;
		return $topdata;
	}

	public function getList()
	{
		//取得图片地址
		$filelist = $this->dao->select()->from("mw_topimage")->where("objecttype")->eq("life")->fetchAll();
		foreach ($filelist as $filekey => $filevalue) {
			$fileidurl[$filevalue->objectid] = $filevalue->url;
		}

		$list  = $this->dao->select()->from("mw_humanity_label")->where('fid is null')->orderby('sort')->fetchAll();
		foreach ($list as $key => $value) {
			$result = $this->dao->select()->from("mw_humanity_label")->where('fid')->eq($value->id)->orderby('sort')->fetchAll();
			if (count($result) > 0) {
				$sids = $labelidname = array();
				foreach ($result as $rekey => $revalue) {
					$sids[] = $revalue->id;
					$labelidname[$revalue->id] = $revalue->title;
				}
				$sublist = $this->dao->select()->from("mw_world")->where('labelid')->in($sids)->andWhere('catetop')->eq('1')->orderby('updatetime desc')
								->limit(0,7)->fetchAll();
				foreach ($sublist as $subkey => $subvalue) {
					$subvalue->labelname = $labelidname[$subvalue->labelid];
					$subvalue->fid = $value->id;
					$subvalue->url = '';
					if (array_key_exists($subvalue->id, $fileidurl)) {
						$subvalue->url = $fileidurl[$subvalue->id];
					}
					// $objectids[] = $subvalue->id;
				}
			} else {
				$sublist = $this->dao->select()->from("mw_world")->where('labelid')->eq($value->id)->andWhere('catetop')->eq('1')
								->orderby('catetop desc , top desc , updatetime desc')->limit(0,7)->fetchAll();
				foreach ($sublist as $subkey => $subvalue) {
					$subvalue->url = '';
					if (array_key_exists($subvalue->id, $fileidurl)) {
						$subvalue->url = $fileidurl[$subvalue->id];
					}
				}
			}
			$value->top = $topdata = array_shift($sublist);
			$value->sublist = $sublist;
		}

		return $list;
	}

	public function getListByLabel($input)
	{
		$label = $this->dao->select()->from('mw_humanity_label')->where('id')->eq($input->id)->fetch();
		$count = $this->dao->select('count(*) cnt')->from('mw_world')->where('labelid')->eq($input->id)->fetch()->cnt;
		$urls = $this->dao->select('objectid , url')->from('mw_topimage')->where('objecttype')->eq('life')->fetchAll();
		foreach ($urls as $key => $value) {
			$urls_arr[$value->objectid] = $value->url;
		}
		$labels = $this->dao->select()->from('mw_humanity_label')->fetchAll();
		foreach ($labels as $key => $value) {
			$labels_arr[$value->id] = $value->title;
		}
		if ($count > 0) {
			$result = $this->dao->select()->from("mw_world")->where('labelid')->eq($input->id)->andWhere('public')->eq('1')
							->orderby('catetop desc , top desc , updatetime desc , createtime desc')->limit(1,4)
							->fetchAll();
			foreach ($result as $key => $value) {
				$value->labelname = $labels_arr[$value->labelid];
				if (array_key_exists($value->id, $urls_arr)) {
					$value->picurl = $urls_arr[$value->id];
				}
			}
			if ($label->fid != '') {//二级
				$flabel = $this->dao->select()->from('mw_humanity_label')->where('id')->eq($label->fid)->fetch();
				$list_arr['flabelid'] = $flabel->id;
				$list_arr['flabelname'] = $flabel->title;
			}
			$list_arr['labelid'] = $label->id;
			$list_arr['labelname'] = $label->title;
			$list_arr['list'] = $result;
		} else {
			$slabel = $this->dao->select()->from("mw_humanity_label")->where('fid')->eq($input->id)->orderby('sort')->fetchAll();
			$list_arr['labelid'] = $label->id;
			$list_arr['labelname'] = $label->title;
			if (count($slabel) > 0) {
				foreach ($slabel as $key => $value) {
					$list_arr['sub'][$value->id]['labelid'] = $value->id;
					$list_arr['sub'][$value->id]['labelname'] = $value->title;
					$result = $this->dao->select()->from("mw_world")->where('labelid')->eq($value->id)->andWhere('public')->eq('1')
												->orderby('catetop desc , top desc , updatetime desc , createtime desc')->limit(1,4)->fetchAll();
					foreach ($result as $subkey => $subvalue) {
						if (array_key_exists($subvalue->id , $urls_arr)) {
							$subvalue->picurl = $urls_arr[$subvalue->id];
						}
					}
					$list_arr['sub'][$value->id]['list'] = $result;
				}
			}
		}
		// pr($list_arr);
		return $list_arr;
	}

	public function getDetail($input)
	{
		$world = $this->dao->select()->from('mw_world')->where('id')->eq($input->id)->fetch();
		//取得头图
		$url = $this->dao->select('objectid , url')->from('mw_topimage')->where('objecttype')->eq('life')->andWhere('objectid')->eq($input->id)->fetch();
		if (!empty($url)) {
			$world->bannerurl = $url->url;
		}
		$world->publishtime = date("Y年m月d日" , strtotime($world->publishtime));
		$labelname = $this->dao->select()->from('mw_humanity_label')->where('id')->eq($world->labelid)->fetch();
		if (!empty($labelname->fid)) {
			$fatherlabelname = $this->dao->select()->from('mw_humanity_label')->where('id')->eq($labelname->fid)->fetch();
			$world->fatherlabelname = $fatherlabelname->title;
		} 
		$world->labelname = $labelname->title;
		//取得律师信息
		if ($world->lawyerflg == "1") {
			$lawyer = $this->dao->select()->from("mw_lawyer")->where('id')->eq($world->authorid)->fetch();
			$position = $this->dao->select()->from("mw_position")->where('id')->eq($lawyer->zhiwei)->fetch();
			$photo = $this->dao->select()->from("mw_file")->where('objecttype')->eq("lawyer")->andWhere('objectid')->eq($world->authorid)->fetch();
			$articles = $this->dao->select()->from('mw_world')->where('authorid')->eq($world->authorid)->andWhere('public')->eq('1')->orderby('publishtime desc')
								  ->limit(1,3)->fetchAll();
			$world->authorname = $lawyer->fullname;
			$world->authorposition = $position->name;
			$world->authorurl = $photo->url;
			$world->articles = $articles;
		}
		return $world;
	}

	public function getNext($input)
	{
		$recordcount = $this->dao->select('count(*) cnt')->from('mw_world')->where('labelid')->eq($input->labelid)->andWhere('public')->eq("1")->fetch()->cnt;
		$input->recordcount = $recordcount;
		$this->getLimit($recordcount , $input);
		if (isset($input->start)) {
			$result = $this->dao->select()->from("mw_world")->where('labelid')->eq($input->labelid)->andWhere('public')->eq('1')
							->orderby('catetop desc , top desc , updatetime desc , createtime desc')->limit($input->start,$input->end)
							->fetchAll();
			//取图片
			$urls = $this->dao->select('objectid , url')->from('mw_topimage')->where('objecttype')->eq('life')->fetchAll();
			foreach ($urls as $key => $value) {
				$urls_arr[$value->objectid] = $value->url;
			}
			//取栏目名称
			$labels = $this->dao->select()->from('mw_humanity_label')->fetchAll();
			foreach ($labels as $key => $value) {
				$labels_arr[$value->id] = $value->title;
			}
			foreach ($result as $key => $value) {
				$value->labelname = $labels_arr[$value->labelid];
				if (array_key_exists($value->id, $urls_arr)) {
					$value->picurl = $urls_arr[$value->id];
				}
				$value->publishtime = substr($value->publishtime, 0 , 10);
			}
		} else {
			$result = null;
		}
		// pr($input->start);pr($input->end);
		return $result;
	}

	private function getLimit($recordcount , $input)
	{
		$pagesize = 6;
		$seize = 4;
		$recordcount = $input->recordcount;
		// pr($recordcount);
		$input->nextpage = null;
		if ($recordcount <= $seize) {
			return ;
		}
		$yu = ($input->recordcount - $seize) % $pagesize ;
		if ($yu > 0) {
			$pagecount = ($input->recordcount - $seize) / $pagesize + 2;
		} else {
			$pagecount = ($input->recordcount - $seize) / $pagesize + 1;
		}
		$input->start = $seize + ($input->pageid -1) * $pagesize + 1;
		if ($input->start + $pagesize - 1 <= $recordcount) {
			$input->end = $input->start + $pagesize - 1 ;
		} else {
			$input->end = $recordcount + 1;
		}
		if ($pagecount > $input->pageid) {
			$input->nextpage = $input->pageid + 1;
		} 
	}
}