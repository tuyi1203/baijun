<?php
class clsDesignCaseListController extends clsAppController implements IAction_default , IAction_list{

    /**
     * 默认初始化页面方法
     */
    public function _default() {

        $this->init();
        $model = new clsModModel($this->mdb , "yjm_case");
        $input = new stdClass();
        $input->objecttype = 'case';
        $recTotal = $model->yjm_case->getCount($input);
        $recperpage = 6 ;

        if ($recTotal > 0) {
            $pager = new verticalpager($recTotal , $recperpage , $currPage = 1 );
            $input->orderby = $this->input->orderby;
            $input->sort    = $this->input->sort;
            $input->start = $pager->getRecStart();
            $input->end   = $pager->getRecEnd();
			$caselist = $model->yjm_case->getList($input);
			foreach ($caselist as $key =>$value) {
				//取得相册封面
				$model = new clsModModel($this->mdb , "mw_file");
				$input = new stdClass();
				$input->objecttype = 'case';
				$input->objectid   = $value['id'];
				$imagelist = $model->mw_file->getList($input);
				foreach ($imagelist as $k => $v) {
					foreach ($imagelist as $imagev) {
						if ($imagev['primary'] == '1')
							$caselist[$key]['url'] = $this->app->getWebRoot(). "/data/upload/" .$imagev['url'];
					}
				}
			}
            $this->output->list = $caselist;
            $this->output->currpage = $currPage;
            $this->saveCurrpage($currPage);

        }

        $this->clearSearchCond();
    }

    public function _list() {

    	$this->init();
    	$model = new clsModModel($this->mdb , "yjm_case");
    	$input = new stdClass();
    	$input->objecttype = 'case';
    	if (!empty($this->input->style)) {
    		$input->style = $this->input->style;
    	}
    	if (!empty($this->input->room)) {
    		$input->room = $this->input->room;
    	}
    	if (!empty($this->input->yjmset)) {
    		$input->yjmset = $this->input->yjmset;
    	}
    	if (!empty($this->input->surface)) {
    		$input->surface = $this->input->surface;
    	}

    	$this->saveSearchCond($input);
    	$this->resumeForm($input);

    	$recTotal = $model->yjm_case->getCount($input);
    	$recperpage = 6 ;

    	if ($recTotal > 0) {
    		$pager = new verticalpager($recTotal , $recperpage , $currPage = 1);
    		//             $input  = new stdClass();
    		$input->orderby = $this->input->orderby;
    		$input->sort    = $this->input->sort;
    		$input->start = $pager->getRecStart();
    		$input->end   = $pager->getRecEnd();
    		$caselist = $model->yjm_case->getList($input);
    		foreach ($caselist as $key =>$value) {
    			//取得相册封面
    			$model = new clsModModel($this->mdb , "mw_file");
    			$input = new stdClass();
    			$input->objecttype = 'case';
    			$input->objectid   = $value['id'];
    			$imagelist = $model->mw_file->getList($input);
    			foreach ($imagelist as $k => $v) {
    				foreach ($imagelist as $imagev) {
    					if ($imagev['primary'] == '1')
    						$caselist[$key]['url'] = $this->app->getWebRoot(). "/data/upload/" .$imagev['url'];
    				}
    			}
    		}

    		$this->output->list = $caselist;
    		$this->output->currpage = $currPage;
    		$this->saveCurrpage($currPage);
    	}

    }

    public function _paging() {

    	$this->init();
    	$model = new clsModModel($this->mdb , "yjm_case");
    	$input = new stdClass();
    	$input->objecttype = 'case';
    	$this->loadSearchCond($input);
    	$recTotal = $model->yjm_case->getCount($input);
    	$recperpage = 6 ;

    	$this->resumeForm($input);
        $this->saveCurrpage($this->input->currpage);
    	if ($recTotal > 0) {
    		$pager = new verticalpager($recTotal , $recperpage , $this->input->currpage);
    		//             $input  = new stdClass();
    		$input->orderby = $this->input->orderby;
    		$input->sort    = $this->input->sort;
    		$input->start = $pager->getRecStart();
    		$input->end   = $pager->getRecEnd();
    		$caselist = $model->yjm_case->getList($input);
    		foreach ($caselist as $key =>$value) {
    			//取得相册封面
    			$model = new clsModModel($this->mdb , "mw_file");
    			$input = new stdClass();
    			$input->objecttype = 'case';
    			$input->objectid   = $value['id'];
    			$imagelist = $model->mw_file->getList($input);
    			foreach ($imagelist as $k => $v) {
    				foreach ($imagelist as $imagev) {
    					if ($imagev['primary'] == '1')
    						$caselist[$key]['url'] = $this->app->getWebRoot(). "/data/upload/" .$imagev['url'];
    				}
    			}
    		}
    		$this->output->list = $caselist;
    		$this->output->currpage = $this->input->currpage;
    	}
    	$this->smarty->setTpl('pagelink.parts.html') ;
    }

    public function _back() {

        $this->init();
        $this->input->currpage = $this->loadCurrpage();
        $model = new clsModModel($this->mdb , "yjm_case");
        $input = new stdClass();
        $input->objecttype = 'case';
        $this->loadSearchCond($input);
        $recTotal = $model->yjm_case->getCount($input);
        $recperpage = 6 ;
        $this->resumeForm($input);

        if ($recTotal > 0) {
            $pager = new verticalpager($recTotal , $recperpage , $this->input->currpage);
            //             $input  = new stdClass();
            $input->orderby = $this->input->orderby;
            $input->sort    = $this->input->sort;
//             $input->start = $pager->getRecStart();
            $input->start = 1;
            $input->end   = $pager->getRecEnd();
            $caselist = $model->yjm_case->getList($input);
            foreach ($caselist as $key =>$value) {
                //取得相册封面
                $model = new clsModModel($this->mdb , "mw_file");
                $input = new stdClass();
                $input->objecttype = 'case';
                $input->objectid   = $value['id'];
                $imagelist = $model->mw_file->getList($input);
                foreach ($imagelist as $k => $v) {
                    foreach ($imagelist as $imagev) {
                        if ($imagev['primary'] == '1')
                            $caselist[$key]['url'] = $this->app->getWebRoot(). "/data/upload/" .$imagev['url'];
                    }
                }
            }
            $this->output->list = $caselist;
            $this->output->currpage = $this->input->currpage;
        }
    }


    /**
     * 页面初始化
     */
    private function init() {
    	$this->input->orderby = 'sort';
    	$this->input->sort    = 'asc';
    	//套餐
    	$this->output->yjmset_options    = getYjmSetOptions(true);
    	if(isset($this->input->yjmset)) {
            $this->output->yjmset_choose     = $this->input->yjmset;
            $this->output->yjmset_choose_val = $this->output->yjmset_options[$this->input->yjmset];
    	} else {
    	    $this->output->yjmset_choose     = '';
    	}
    	//风格
    	$this->output->style_options   = getCategoryOptions('style' ,$head=true);
    	if(isset($this->input->style)) {
    	    $this->output->style_choose      = $this->input->style;
    	    $this->output->style_choose_val  = $this->output->style_options[$this->input->style];
    	} else {
    	    $this->output->yjmset_choose     = '';
    	}

    	//居室
    	$this->output->room_options    = getCategoryOptions('room' ,$head=true);
    	if (isset($this->input->room)) {
            $this->output->room_choose     = $this->input->room;
            $this->output->room_choose_val = $this->output->room_options[$this->input->room];
    	} else {
    	    $this->output->room_choose     = '';
    	}

    	//面积
    	$this->output->surface_options = getCategoryOptions('surface' ,$head=true);
    	if (isset($this->input->surface)) {
    	    $this->output->surface_choose     = $this->input->surface;
    	    $this->output->surface_choose_val = $this->output->surface_options[$this->input->surface];
    	} else {
    	    $this->output->surface_choose  = '';
    	}
    }

    private function saveSearchCond($input) {
    	$cond = array();
    	if (isset($input->style))    $cond['style']   = $input->style;
    	if (isset($input->room))     $cond['room']    = $input->room;
    	if (isset($input->yjmset))   $cond['yjmset']  = $input->yjmset;
    	if (isset($input->surface))  $cond['surface'] = $input->surface;

    	$this->session->subSetValue( __FILE__.'searchCond' , $cond );
    }

    private function clearSearchCond() {
    	$this->session->subUnsetValue(__FILE__.'searchCond');
    }

    private function resumeForm($input) {
    	if (isset($input->style)) {
    	    $this->output->style_choose = $input->style;
    	    $this->output->style_choose_val = $this->output->style_options[$input->style];
    	}


    	if (isset($input->room)) {
    	    $this->output->room_choose     = $input->room;
    	    $this->output->room_choose_val = $this->output->room_options[$input->room];
    	}


    	if (isset($input->yjmset)) {
    	    $this->output->yjmset_choose     = $input->yjmset;
    	    $this->output->yjmset_choose_val = $this->output->yjmset_options[$input->yjmset];
    	}

    	if (isset($input->surface)) {
    	    $this->output->surface_choose     = $input->surface;
    	    $this->output->surface_choose_val = $this->output->surface_options[$input->surface];
    	}


    }

    private function loadSearchCond($input) {
    	$cond = $this->session->fncGetValue(__FILE__.'searchCond');
    	// pr($cond);
    	if (isset($cond['style']))      $input->style    = $cond['style'];
    	if (isset($cond['room']))       $input->room     = $cond['room'];
    	if (isset($cond['yjmset']))     $input->yjmset   = $cond['yjmset'];
    	if (isset($cond['surface']))    $input->surface  = $cond['surface'];

    }

    private function saveCurrpage($page) {
        $this->session->subSetValue( __FILE__.'currpage' , $page);
    }

    private function loadCurrpage() {
        return $this->session->fncGetValue(__FILE__.'currpage');
    }

}