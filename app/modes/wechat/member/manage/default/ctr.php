<?php

class clsMemberManageDefaultController extends clsAppController implements IAction_default , IAction_sort , IAction_paging{

    /**
     * 默认初始化页面方法
     */
    public function _default() {
        $this->init();
        $input = new stdClass();
        $recTotal = $this->model->getCount();
        $recperpage = $this->cookie->recperpage != false ? $this->cookie->recperpage : C('RECPERPAGE');

        if ($recTotal > 0) {
            $pager = new pager($recTotal , $recperpage , $currPage = 1);
//             $input  = new stdClass();
            $input->orderby = $this->input->orderby . ' ' .$this->input->sort;
            $input->start = $pager->getRecStart();
            $input->end   = $pager->getRecEnd();
            $result = $this->model->getList($input);
// pr($result);
            $this->output->list = obj2array($result);
            $this->output->currpage = $currPage;
        }
        $this->saveSearchCond($this->input);

    }

    public function _updategroup()
    {
		if (!$this->model->updategroup($this->input)) {
			$this->output->result  = 'fail';
			$this->output->message = $this->lang->manage->updategroupfail;
			return;
		}
		$this->output->result  = 'success';
    }

    public function _paging()
    {
        $input = new stdClass();
        $this->loadSearchCond($input);
        $this->resumeForm($input);
        $recTotal = $this->model->getCount();
        $recperpage = $this->cookie->recperpage != false ? $this->cookie->recperpage : C('RECPERPAGE');
        if ($recTotal > 0) {
            $pager  = new pager($recTotal , $recperpage , $this->input->currpage, $input->orderby , $input->sort);
            $input->orderby = $input->orderby . ' ' .$input->sort;
            $input->start   = $pager->getRecStart();
            $input->end     = $pager->getRecEnd();
            $result = $this->model->getList($input);
            $this->output->list = obj2array($result);
            $this->output->currpage = $this->input->currpage;
        }
    }


    public function _sort() {
        $this->init();
        $input = new stdClass();
        $recTotal = $this->model->getCount();
        $recperpage = $this->cookie->recperpage != false ? $this->cookie->recperpage : C('RECPERPAGE');
        if ($recTotal > 0) {
            $pager  = new pager($recTotal , $recperpage , $this->input->currpage, $this->input->orderby , $this->input->sort);
            $input->orderby = $this->input->orderby . ' ' .$this->input->sort;
            $input->start = $pager->getRecStart();
            $input->end   = $pager->getRecEnd();
            $result = $this->model->getList($input);
            $this->output->list = obj2array($result);
            $this->output->currpage = $this->input->currpage;
        }
        $this->saveSearchCond($this->input);
    }

    /**
     * 页面初始化
     */
    private function init() {

        if (!isset($this->input->orderby)) {
            $this->input->orderby         = "subscribetime";
            $this->input->sort            = "desc";
            $this->output->orderby        = "subscribetime";
            $this->output->sort           = "desc";
            $this->output->activesorting  = "asc";
        } else {
            $this->input->orderby = in_array($this->input->orderby , array('subscribe','sex','subscribetime','unsubscribetime'))?$this->input->orderby:"subscribetime";
            $this->input->sort    = in_array($this->input->sort , array('asc','desc'))?$this->input->sort:"asc";

            $this->output->orderby  = $this->input->orderby;
            $this->output->sort     = $this->input->sort;
            $this->output->activesorting  = $this->input->sort == "asc"?"desc":"asc";
        }
        $this->output->sorting  = "desc";
// 	    $this->input->orderby   = "subscribetime";
// 	    $this->input->sort      = "desc";
    }

    private function saveSearchCond($input)
    {
        $cond = array();
        if (isset($input->orderby))   $cond['orderby'] = $input->orderby;
        if (isset($input->sort))      $cond['sort']    = $input->sort;

        session( __FILE__.'searchCond' , $cond );
    }

    private function clearSearchCond()
    {
        session(__FILE__.'searchCond',null);
    }

    private function resumeForm($input)
    {
        $this->output->orderby  = $input->orderby;
        $this->output->sort     = $input->sort;
        $this->output->sorting  = "asc";
        $this->output->activesorting  = $input->sort == "asc"?"desc":"asc";

    }

    private function loadSearchCond(&$input)
    {
        $cond = session(__FILE__.'searchCond');
        if (isset($cond['orderby'])) $input->orderby = $cond['orderby'];
        if (isset($cond['sort']))    $input->sort    = $cond['sort'];

    }

}