<?php
class clsDesignPersonListController extends clsAppController implements IAction_default {

    /**
     * 默认初始化页面方法
     */
    public function _default() {

        $this->init();
        $model = new clsModModel($this->mdb , "yjm_person");
        $input = new stdClass();
        $input->objecttype = 'wxperson';
        $recTotal = $model->getCount($input);
        $recperpage = 3 ;

        if ($recTotal > 0) {
            $pager = new verticalpager($recTotal , $recperpage , $currPage = 1);
            //             $input  = new stdClass();
            $input->orderby = $this->input->orderby;
            $input->sort    = $this->input->sort;
            $input->start = $pager->getRecStart();
            $input->end   = $pager->getRecEnd();
//             $result = $model->yjm_person->getImageList($input);
			$list = array();
			$personlist = $model->getList($input);
			foreach ($personlist as $value) {
				$list[$value['id']]['id'] 	 = $value['id'];
				$list[$value['id']]['name']  = $value['name'];
				$list[$value['id']]['level'] = $value['levelname'];
				$list[$value['id']]['style'] = $value['style'];
				$list[$value['id']]['ideal'] = $value['ideal'];
				$list[$value['id']]['url']   = $this->app->getWebRoot(). "/data/upload/" . $value['url'];
				//取得头像
// 				$input = new stdClass();
// 				$input->objecttype = 'wxperson';
// 				$input->objectid   = $value['id'];
// 				$model = new clsModModel($this->mdb , "mw_file");
// 				$image = $model->mw_file->getList($input);
// 				$list[$value['id']]['url'] = $this->app->getWebRoot(). "/data/upload/" .$image[0]['url'];



// 				$model = new clsModModel($this->mdb , "yjm_case");
// 				$input = new stdClass();
// 				$input->objecttype = 'case';
// 				$input->designer   = $value['id'];
// 				$input->orderby    = 'sort';
// 				$input->sort	   = 'asc';
// 				$input->start      = 1;
// 				$input->end        = 2;
// 				$caselist = $model->yjm_case->getList($input);
// 				foreach ($caselist as $k => $v) {
// 					$list[$value['id']]['cases'][$v['id']]['id']    = $v['id'];
// 					$list[$value['id']]['cases'][$v['id']]['title'] = $v['title'];
// 					$model = new clsModModel($this->mdb , "mw_file");
// 					$input = new stdClass();
// 					$input->objecttype = 'case';
// 					$input->objectid   = $v['id'];
// 					$imagelist = $model->mw_file->getList($input);
// 					$list[$value['id']]['cases'][$v['id']]['url'] = "";
// 					foreach ($imagelist as $imagev) {
// 						if ($imagev['primary'] == '1')
// 							$list[$value['id']]['cases'][$v['id']]['url'] = $this->app->getWebRoot(). "/data/upload/" .$imagev['url'];
// 					}
// // 					$list[$value['id']]['cases'][$v['id']]['url']   = $this->app->getWebRoot(). "/data/upload/" .$v['url'];
// 				}
			}

//             $this->output->count = $recTotal;
            $this->output->list = $list;
            $this->output->currpage = $currPage;
            $this->saveCurrpage($currPage);

        }

        $this->clearSearchCond();
    }

    public function _list() {
    	$this->init();
    	$model = new clsModModel($this->mdb , "yjm_person");
    	$input = new stdClass();
    	$input->objecttype = 'wxperson';
    	if (!empty($this->input->level)) {
    		$input->level = $this->input->level;
    	}
    	if (!empty($this->input->team)) {
    		$input->team = $this->input->team;
    	}
    	if (!empty($this->input->goodat)) {
    	    $input->goodat = $this->input->goodat;
    	}
    	$recTotal = $model->getCount($input);
    	$recperpage = 3 ;

    	$this->saveSearchCond($input);
    	$this->resumeForm($input);

    	if ($recTotal > 0) {
    		$pager = new verticalpager($recTotal , $recperpage , $currPage = 1);
    		$input->orderby = $this->input->orderby;
    		$input->sort    = $this->input->sort;
    		$input->start = $pager->getRecStart();
    		$input->end   = $pager->getRecEnd();
    		//             $result = $model->yjm_person->getImageList($input);
    		$list = array();
    		$personlist = $model->getList($input);
    		foreach ($personlist as $value) {
    			$list[$value['id']]['id'] 	 = $value['id'];
    			$list[$value['id']]['name']  = $value['name'];
    			$list[$value['id']]['level'] = $value['levelname'];
    			$list[$value['id']]['style'] = $value['style'];
    			$list[$value['id']]['ideal'] = $value['ideal'];
    			$list[$value['id']]['url']   = $this->app->getWebRoot(). "/data/upload/" . $value['url'];
//     			$model = new clsModModel($this->mdb , "yjm_case");
//     			$input = new stdClass();
//     			$input->objecttype = 'case';
//     			$input->designer   = $value['id'];
//     			$input->orderby    = 'sort';
//     			$input->sort	   = 'asc';
//     			$input->start      = 1;
//     			$input->end        = 2;
//     			$caselist = $model->yjm_case->getList($input);
//     			foreach ($caselist as $k => $v) {
// 					$list[$value['id']]['cases'][$v['id']]['id']    = $v['id'];
// 					$list[$value['id']]['cases'][$v['id']]['title'] = $v['title'];
// 					$model = new clsModModel($this->mdb , "mw_file");
// 					$input = new stdClass();
// 					$input->objecttype = 'case';
// 					$input->objectid   = $v['id'];
// 					$imagelist = $model->mw_file->getList($input);
// 					$list[$value['id']]['cases'][$v['id']]['url'] = "";
// 					foreach ($imagelist as $imagev) {
// 						if ($imagev['primary'] == '1')
// 							$list[$value['id']]['cases'][$v['id']]['url'] = $this->app->getWebRoot(). "/data/upload/" .$imagev['url'];
// 					}
// // 					$list[$value['id']]['cases'][$v['id']]['url']   = $this->app->getWebRoot(). "/data/upload/" .$v['url'];
// 				}
    		}
    		//             $this->output->count = $recTotal;
    		$this->output->list = $list;
    		$this->output->currpage = $currPage;
    		$this->saveCurrpage($currPage);
    	}

    }

    public function _paging() {

    	$this->init();
    	$model = new clsModModel($this->mdb , "yjm_person");
    	$input = new stdClass();
    	$input->objecttype = 'wxperson';
    	$this->loadSearchCond($input);
    	$recTotal = $model->getCount($input);
    	$recperpage = 3 ;

    	$this->resumeForm($input);

    	if ($recTotal > 0) {
    		$pager = new verticalpager($recTotal , $recperpage ,$this->input->currpage);
    		$input->orderby = $this->input->orderby;
    		$input->sort    = $this->input->sort;
    		$input->start = $pager->getRecStart();
    		$input->end   = $pager->getRecEnd();
    		$list = array();
    		$personlist = $model->getList($input);
    		foreach ($personlist as $value) {
    			$list[$value['id']]['id'] 	 = $value['id'];
    			$list[$value['id']]['name']  = $value['name'];
    			$list[$value['id']]['level'] = $value['levelname'];
    			$list[$value['id']]['style'] = $value['style'];
    			$list[$value['id']]['ideal'] = $value['ideal'];
    			$list[$value['id']]['url']   = $this->app->getWebRoot(). "/data/upload/" . $value['url'];
//     			$model = new clsModModel($this->mdb , "yjm_case");
//     			$input = new stdClass();
//     			$input->objecttype = 'case';
//     			$input->designer   = $value['id'];
//     			$input->orderby    = 'sort';
//     			$input->sort	   = 'asc';
//     			$input->start      = 1;
//     			$input->end        = 2;
//     			$caselist = $model->yjm_case->getList($input);
//     			foreach ($caselist as $k => $v) {
// 					$list[$value['id']]['cases'][$v['id']]['id']    = $v['id'];
// 					$list[$value['id']]['cases'][$v['id']]['title'] = $v['title'];
// 					$model = new clsModModel($this->mdb , "mw_file");
// 					$input = new stdClass();
// 					$input->objecttype = 'case';
// 					$input->objectid   = $v['id'];
// 					$imagelist = $model->mw_file->getList($input);
// 					$list[$value['id']]['cases'][$v['id']]['url'] = "";
// 					foreach ($imagelist as $imagev) {
// 						if ($imagev['primary'] == '1')
// 							$list[$value['id']]['cases'][$v['id']]['url'] = $this->app->getWebRoot(). "/data/upload/" .$imagev['url'];
// 					}
// // 					$list[$value['id']]['cases'][$v['id']]['url']   = $this->app->getWebRoot(). "/data/upload/" .$v['url'];
// 				}
    		}
    		//             $this->output->count = $recTotal;
    		$this->output->list = $list;
    		$this->output->currpage = $this->input->currpage;
    		$this->saveCurrpage($currPage);
    		$this->smarty->setTpl('pagelink.parts.html') ;
    	}
    }

    public function _back() {

        $this->init();
        $model = new clsModModel($this->mdb , "yjm_person");
        $input = new stdClass();
        $input->objecttype = 'wxperson';
        $this->loadSearchCond($input);
        $recTotal = $model->getCount($input);
        $recperpage = 3 ;

        $this->resumeForm($input);

        if ($recTotal > 0) {
            $pager = new verticalpager($recTotal , $recperpage ,$this->loadCurrpage());
            $input->orderby = $this->input->orderby;
            $input->sort    = $this->input->sort;
            $input->start = 1 ;
            $input->end   = $pager->getRecEnd();
            $list = array();
            $personlist = $model->getList($input);
            foreach ($personlist as $value) {
                $list[$value['id']]['id'] 	 = $value['id'];
                $list[$value['id']]['name']  = $value['name'];
                $list[$value['id']]['level'] = $value['levelname'];
                $list[$value['id']]['style'] = $value['style'];
                $list[$value['id']]['ideal'] = $value['ideal'];
                $list[$value['id']]['url']   = $this->app->getWebRoot(). "/data/upload/" . $value['url'];
                //     			$model = new clsModModel($this->mdb , "yjm_case");
                //     			$input = new stdClass();
                //     			$input->objecttype = 'case';
                //     			$input->designer   = $value['id'];
                //     			$input->orderby    = 'sort';
                //     			$input->sort	   = 'asc';
                //     			$input->start      = 1;
                //     			$input->end        = 2;
                //     			$caselist = $model->yjm_case->getList($input);
                //     			foreach ($caselist as $k => $v) {
                // 					$list[$value['id']]['cases'][$v['id']]['id']    = $v['id'];
                // 					$list[$value['id']]['cases'][$v['id']]['title'] = $v['title'];
                // 					$model = new clsModModel($this->mdb , "mw_file");
                // 					$input = new stdClass();
                // 					$input->objecttype = 'case';
                // 					$input->objectid   = $v['id'];
                // 					$imagelist = $model->mw_file->getList($input);
                // 					$list[$value['id']]['cases'][$v['id']]['url'] = "";
                // 					foreach ($imagelist as $imagev) {
                // 						if ($imagev['primary'] == '1')
                    // 							$list[$value['id']]['cases'][$v['id']]['url'] = $this->app->getWebRoot(). "/data/upload/" .$imagev['url'];
                // 					}
                // // 					$list[$value['id']]['cases'][$v['id']]['url']   = $this->app->getWebRoot(). "/data/upload/" .$v['url'];
                // 				}
            }
            //             $this->output->count = $recTotal;
            $this->output->list = $list;
            $this->output->currpage = $this->loadCurrpage();
        }
    }


    /**
     * 页面初始化
     */
    private function init() {
    	$this->input->orderby = 'sort';
    	$this->input->sort    = 'asc';
    	$this->output->level_options   = getCategoryOptions('level',$head=true);
    	if (isset($this->input->level)) {
    	    $this->output->level_choose     = $this->input->level;
    	    $this->output->level_choose_val = $this->output->level_options[$this->input->level];
    	} else {
    	    $this->output->level_choose = '';
    	}


    	$this->output->team_options    = getCategoryOptions('team' ,$head=true);
    	if (isset($this->input->team)) {
    	    $this->output->team_choose     = $this->input->team;
    	    $this->output->team_choose_val = $this->output->team_options[$this->input->team];
    	} else {
    	    $this->output->team_choose     = '';
    	}

    	$this->output->goodat_options = getCategoryOptions('goodat' ,$head=true);
    	if (isset($this->input->goodat)) {
    	    $this->output->goodat_choose     = $this->input->goodat;
    	    $this->output->goodat_choose_val = $this->output->goodat_options[$this->input->goodat];
    	} else {
    	    $this->output->goodat_choose = '';
    	}

    }

    private function saveSearchCond($input) {
    	//         pr($_POST);
    	$cond = array();
    	if (isset($input->level))  $cond['level']  = $input->level;
    	if (isset($input->team))   $cond['team']   = $input->team;
    	if (isset($input->goodat)) $cond['goodat'] = $input->goodat;

    	$this->session->subSetValue( __FILE__.'searchCond' , $cond );
    }

    private function clearSearchCond() {
    	$this->session->subUnsetValue(__FILE__.'searchCond');
    }

    private function resumeForm($input) {
    	if (isset($input->level)) {
    	    $this->output->level_choose = $input->level;
    	    $this->output->level_choose_val = $this->output->level_options[$input->level];
    	}


    	if (isset($input->team)) {
    	    $this->output->team_choose = $input->team;
    	    $this->output->team_choose_val = $this->output->team_options[$input->team];
    	}

    	if (isset($input->goodat)) {
    	    $this->output->goodat_choose = $input->goodat;
    	    $this->output->goodat_choose_val = $this->output->goodat_options[$input->goodat];
    	}
    }

    private function loadSearchCond($input) {
    	$cond = $this->session->fncGetValue(__FILE__.'searchCond');
    	if (isset($cond['level']))      $input->level    = $cond['level'];
    	if (isset($cond['team']))       $input->team     = $cond['team'];
    	if (isset($cond['goodat']))     $input->goodat   = $cond['goodat'];

    }

    private function saveCurrpage($page) {
        $this->session->subSetValue( __FILE__.'currpage' , $page);
    }

    private function loadCurrpage() {
        return $this->session->fncGetValue(__FILE__.'currpage');
    }

}