<?php
class clsDesignPersonDetailController extends clsAppController implements IAction_default{

    /**
     * 默认初始化页面方法
     */
    public function _default() {

        $this->init();
    }

    /**
     * 页面初始化
     */
    private function init() {
    	$input = new stdClass();
    	$input->id         = $this->input->id;
    	$input->objecttype = $this->app->getModuleS();
    	$input->objectid   = $this->input->id;
    	$model = new clsModModel($this->mdb, 'yjm_person');
    	$person = $model->yjm_person->getById($input);

    	$person['url'] = $this->app->getWebRoot(). "/data/upload/" . $person['url'];
    	$teams    = getCategoryOptions('team');
    	$levels   = getCategoryOptions('level');
    	$styles   = getCategoryOptions('style');
    	foreach ($person as $k => $v) {
    		$this->output->$k = $v;
    		if ($k == "level") $this->output->levelname    = $levels[$v];
    		if ($k == "team")  $this->output->teamname     = $teams[$v];
    		if ($k == "style") $this->output->ta->style    = $v;
    		if ($k == "ideal") $this->output->ta->ideal    = $v;
    	}

    	//取得擅长作品
    	$model = new clsModModel($this->mdb , "mw_relation");
    	$input->objecttype = 'goodat';
    	$input->objectid   = $this->input->id;
        $goodatlist = $model->mw_relation->getListByObject($input);
        $goodat = array();
        foreach ($goodatlist as $val) {
            if (array_key_exists($val['category'], $styles)){
                $goodat[] = $styles[$val['category']];
            }
        }
        $this->output->goodat = implode(' , ', $goodat);

    	//取得代表作品
    	$model = new clsModModel($this->mdb , "yjm_case");
    	$input = new stdClass();
    	$input->objecttype = 'case';
    	$input->designer   = $this->input->id;
    	$input->orderby    = 'sort';
    	$input->sort	   = 'asc';
    	$input->start      = 1;
    	$input->end        = 4;
    	$list = array();
    	$caselist = $model->yjm_case->getList($input);
//     	pr($caselist);
    	foreach ($caselist as $k => $v) {
    		$list[$v['id']]['id']    = $v['id'];
    		$list[$v['id']]['title'] = $v['title'];
//     		$list[$v['id']]['url']   = $this->app->getWebRoot(). "/data/upload/" .$v['url'];
    		$list[$v['id']]['style'] = $v['stylename'];
    		$list[$v['id']]['house'] = $v['house'];
    		$list[$v['id']]['price'] = $v['price'];
    		$list[$v['id']]['area']  = $v['area'];

    		$model = new clsModModel($this->mdb , "mw_file");
    		$input = new stdClass();
    		$input->objecttype = 'case';
    		$input->objectid   = $v['id'];
    		$imagelist = $model->mw_file->getList($input);
    		$list[$v['id']]['url'] = "";
    		foreach ($imagelist as $imagev) {
    			if ($imagev['primary'] == '1')
    			$list[$v['id']]['url'] = $this->app->getWebRoot(). "/data/upload/" .$imagev['url'];
    		}
    	}

    	$this->output->personcaselist = $list;
    	//getClassiCase();

    	//取得套餐数据
//     	$input = new stdClass();
//     	$input->objecttype = 'yjm_set';
//     	$this->output->setlist = getSetInfo($input , 0);

//     	//取得人气设计师
//     	$input = new stdClass();
//     	$input->orderby = 'hot';
//     	$input->sort    = 'desc';
//     	$input->objecttype = 'person';
//     	$input->start   = 1;
//     	$input->end     = 10;
//     	$model = new clsModModel($this->mdb , "yjm_person");
//     	$this->output->dlist = $model->yjm_person->getList($input);
    }

}