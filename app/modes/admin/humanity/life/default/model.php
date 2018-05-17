<?php
class clsModModel extends clsAppModel{

	public function getCount($input)
	{
		$record = $this->dao->select('count(*) cnt')->from('mw_world');
		if (isset($input->labelid)){
        	$record = $record->where('labelid')->eq($input->labelid);
        }
		$record = $record->fetch();
		return $record->cnt;
	}

	public function getList($input)
    {
        $list = $this->dao->select("*")->from('mw_world');
        if (isset($input->labelid)){
        	$list = $list->where('labelid')->eq($input->labelid);
        }
        $list = $list->orderby('labeltop desc , catetop desc , top desc ,' . $input->orderby . ' ' . $input->sort)
                    ->limit($input->start , $input->end)
                    ->fetchAll();
        //取得作者
        $lawyerlist = $this->dao->select("id , fullname")->from('mw_lawyer')
        					->where('del <> 1')
        					->orderby('id')
        					->fetchAll();
        foreach ($lawyerlist as $key => $value) {
        	$arr_lawyerlist[$value->id] = $value->fullname;
        }

        foreach ($list as $key => $value) {
        	if ($value->lawyerflg == '1') {
        		//律师
        		if (array_key_exists($value->authorid, $arr_lawyerlist)) {
        			$value->author = $arr_lawyerlist[$value->authorid];
        		}
        	} else {
        		//非律师
        		$value->author = $value->authorname;
        	}
        }
        return $list;
    }

    //置顶OR取消置顶操作
    public function toggletop($input)
    {
    	$sql = "update mw_world set top= case when top = '1' then '0' else '1' end where id=?";
		$data = new stdClass();
		$data->top = '0';
		$this->dao->update('mw_world')->data($data)->where('labelid')->eq($input->labelid)->andwhere('id<>'.$input->id)->exec();
		$this->dao->prepare($sql)->execute(array($input->id));
		return !$this->dao->isFail();
    }

    public function delete($input)
	{
		$this->dao->delete()->from('mw_world')->where('id')->eq($input->id)->exec();
		return !$this->dao->isFail();
	}

     //置顶OR取消总置顶操作
    public function togglelabeltop($input)
    {
        $sql = "update mw_world set labeltop= case when labeltop = '1' then '0' else '1' end where id=?";
        $data = new stdClass();
        $data->labeltop = '0';
        $this->dao->update('mw_world')->data($data)->where('id<>'.$input->id)->exec();
        $this->dao->prepare($sql)->execute(array($input->id));
        return !$this->dao->isFail();
    }
    //置顶OR取消智识与人文首页置顶操作
    public function togglecatetop($input)
    {
        $sql = "update mw_world set catetop= case when catetop = '1' then '0' else '1' end where id=?";
        $data = new stdClass();
        $this->dao->prepare($sql)->execute(array($input->id));
        return !$this->dao->isFail();
    }

}