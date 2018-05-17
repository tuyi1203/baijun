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

	public function getOnepinglun($input)
	{
		//取得百君法律评论的二级标签
		$slabel = $this->dao->select()->from("mw_humanity_label")->where('fid')->eq($input->labelid)->orderby('sort')->fetchAll();
		foreach ($slabel as $key => $value) {
			$label_list[] = $value->id;
		}
		$result = $this->dao->select()->from("mw_world")->where('labelid')->in(implode(",",$label_list))->andWhere('public')->eq('1')
							->orderby('catetop desc , top desc , updatetime desc , createtime desc')->limit(1)
							->fetch();
		return $result;
	}

}