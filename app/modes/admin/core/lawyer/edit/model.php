<?php
class clsModModel extends clsAppModel{

	public function get($id)
	{
		return $this->dao->select('a.*,b.id fileid , b.url')->from('mw_lawyer')->alias('a')
					->leftJoin('mw_file')->alias('b')->on('a.id=b.objectid')->andWhere('b.objecttype')->eq('lawyer')
					->where('a.id')->eq($id)
					->fetch();
	}

	public function getBranchesList()
	{
		$list =  $this->dao->select()->from('mw_branches')->orderby('id')->fetchAll();
		foreach ($list as $value) {
			$return[$value->id] = $value->name;
		}
		return $return;
	}

	public function getFieldList()
	{
		$list = $this->dao->select()->from('mw_field')->where('pid is null')->orderby('id')->fetchAll();
		foreach($list as $value){
			$return[$value->id] = $value->title;
		}
		return $return;
	}

	public function getSubFieldList($pid)
	{
		$list = $this->dao->select()->from('mw_field')->where('pid='.$pid)->orderby('id')->fetchAll();
		$return = array();
		foreach($list as $value){
			$return[$value->id] = $value->title;
		}
		return $return;
	}

	public function getDepartmentList()
	{
		$list = $this->dao->select()->from('eku_role')->where('id')->notin('(0,1)')->orderby('id')->fetchAll();
		foreach($list as $value){
			$return[$value->id] = $value->name;
		}
		return $return;
	}

	public function getPositionList()
	{
		$list = $this->dao->select()->from('mw_position')->orderby('sort')->fetchAll();
		foreach($list as $value){
			$return[$value->id] = $value->name;
		}
		return $return;
	}

	public function getWorklanguageList()
	{
		$list = $this->dao->select()->from('mw_worklanguage')->orderby('sort')->fetchAll();
		foreach($list as $value){
			$return[$value->id] = $value->name;
		}
		return $return;
	}

	public function update($input)
	{
		$data = new stdClass();
        $data->first_name       =  $input->first_name      ;
        $data->last_name        =  $input->last_name       ;
        $data->fullname         =  $input->fullname        ;
        $data->first_name_alpha =  $input->first_name_alpha;
        $data->last_name_alpha  =  $input->last_name_alpha ;
        $data->gongzuoyuyan     =  $input->gongzuoyuyan    ;
        $data->touxian          =  $input->touxian         ;
        $data->jigou            =  $input->jigou           ;
        $data->bumen            =  $input->bumen           ;
        $data->zhiwei           =  $input->zhiwei          ;
        $data->zhuanye          =  $input->zhuanye         ;
        $data->erjizhuanye      =  $input->erjizhuanye     ;
        $data->zhiyelingyu      =  $input->zhiyelingyu     ;
        $data->tel              =  $input->tel             ;
        $data->email            =  $input->email           ;
        $data->daibiaoyeji      =  $input->daibiaoyeji     ;
        $data->daibiaokehu      =  $input->daibiaokehu     ;
        $data->xueshuchengguo   =  $input->xueshuchengguo  ;
        $data->qita             =  $input->qita            ;
        $data->zhuanyezige      =  $input->zhuanyezige     ;
        $data->zhiyelinian      =  $input->zhiyelinian     ;
        $data->rusheshijian     =  $input->rusheshijian    ;
		$data->desc             =  $input->desc            ;
		$data->sort             =  $input->sort             ;
		$data->yuanshi          =  $input->yuanshi;
		$data->suozhuren        =  $input->suozhuren;

        $this->dao->update('mw_lawyer')->data($data)->where('id')->eq($input->id)->exec();
        return !$this->dao->isFail();
	}

}