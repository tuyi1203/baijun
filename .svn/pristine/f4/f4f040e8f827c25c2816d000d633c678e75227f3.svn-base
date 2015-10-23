<?php
class clsModModel extends clsAppModel{


    public function getParentList()
    {
        $rows = $this->dao->select('*')->from('wc_custom_menu')
                    ->where('pid is null')
                    ->orderby('sort')
                    ->fetchAll();
        return $rows;
    }


    //取得一级菜单的个数
    public function getCountOfParent() {
        $cnt = $this->dao->select('count(*) cnt')
                ->from('wc_custom_menu')
                ->where('pid is null')
                ->fetch('cnt');
        return $cnt;
    }

    public function getCountOfChild($input) {
        $cnt = $this->dao->select('count(*) cnt')
                    ->from('wc_custom_menu')
                    ->where('pid')->eq($input->id)
                    ->fetch('cnt');
        return $cnt;
    }

    public function findById($input) {
        return $this->dao->findById($input->id)->from('wc_custom_menu')->fetch();
    }

    public function getKeyword($input)
    {
    	return $this->dao->select()->from('wc_keyword')
	    			->where('objecttype')->eq('custommenu')
	    			->andWhere('objectid')->eq($input->id)
	    			->fetch();
    }

    public function update($input) {

    	$old = $this->findById($input);

    	$this->dao->begin();

    	//如果将回复类型为无或链接，而修改前不是无或链接，则删除修改前的关键字
    	if (in_array($input->replytype , array('-1','1'))  &&
    			!in_array($old->replytype, array('-1','1'))) {
    		$this->dao->delete()->from('wc_keyword')
		    		->where('objecttype')->eq('custommenu')
		    		->andWhere('objectid')->eq($input->id)
		    		->exec();
    	}

    	$data = new stdClass();
    	$data->title     = $input->title;
    	$data->sort      = $input->sort;
    	$data->replytype = $input->replytype == "-1" ? "" : $input->replytype;
    	if ($input->replytype == '1') {
			$data->url = $input->url;
    	} else {
    		$data->url = '';
    	}

		$this->dao->update('wc_custom_menu')
				->data($data)
				->where('id')->eq($input->id)
				->exec();

		//如果回复类型不是无或链接，则替换原有关键字
		if ($input->replytype != '-1' and $input->replytype != '1') {
			$data = new stdClass();
			if ($input->replytype == '2') {
				$data->replytext = filter::strip_tags_for_wechat_text($input->replytext , '<a>');
			} else {
				$data->replytext = '';
			}
			$data->keyword = 'custommenu-' . $input->id;
			$data->objecttype  = 'custommenu';
			$data->objectid    = $input->id;
			$data->createtime  = date('Y-m-d H:i:s');
			$data->keywordtype = '0';
			$this->dao->replace('wc_keyword')->data($data)->exec();
		}

        $this->dao->commit();
        return !$this->dao->isFail();
    }
}