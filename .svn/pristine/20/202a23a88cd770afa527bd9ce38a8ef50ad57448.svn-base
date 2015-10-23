<?php
class clsManageActionlogDefaultController extends clsAppController
    implements IAction_default , IAction_paging , IAction_sort , IAction_list{


    /**
     * 默认初始化页面方法
     */
    public function _default() {
        $this->init();
        $model = new clsModModel($this->mdb , "mw_action_log");
        $input = new stdClass();
        $recTotal = $model->mw_action_log->getCount($input);
        $recperpage = $this->cookie->recperpage != false ? $this->cookie->recperpage : C('recperpage');

        if ($recTotal > 0) {
            $pager = new pager($recTotal , $recperpage , $currPage = 1);
            $input->orderby = $this->input->orderby;
            $input->sort    = $this->input->sort;
            $input->start = $pager->getRecStart();
            $input->end   = $pager->getRecEnd();
            $result = $model->mw_action_log->getList($input);
            $this->output->list = $result;
            $this->output->currpage = $currPage;
        }
        $this->clearSearchCond();
    }

    public function _list() {
        $this->init();
        $input = new stdClass();
        $model = new clsModModel($this->mdb , "mw_action_log");

        if (!empty($this->input->name)) {
            $input->name = $this->input->name;
        }

        if (!empty($this->input->timestart)) {
            $input->timestart = $this->input->timestart;
        }

        if (!empty($this->input->timeend)) {
            $input->timeend = $this->input->timeend;
        }

        $input->orderby = $this->input->orderby;
        $input->sort    = $this->input->sort;

        $this->saveSearchCond($input);

        $recTotal = $model->mw_action_log->getCount($input);
        $recperpage = $this->cookie->recperpage != false ? $this->cookie->recperpage : C('recperpage');

        if ($recTotal > 0) {
            $pager = new pager($recTotal , $recperpage , $currPage = 1);
            $input->start = $pager->getRecStart();
            $input->end   = $pager->getRecEnd();
            $result = $model->mw_action_log->getList($input);

            $this->output->list = $result;
            $this->output->currpage = $currPage;
        }
        $this->resumeForm($this->input);
    }

    public function _paging() {
//         echo "hello";
        $this->init();
// pr($_SESSION);
        $input = new stdClass();
        $this->loadSearchCond($input);
        $model = new clsModModel($this->mdb , "mw_action_log");
        $recTotal = $model->mw_action_log->getCount($input);
//         var_dump($this->cookie->lang);
        $recperpage = $this->cookie->recperpage != false ? $this->cookie->recperpage : C('recperpage');
        if ($recTotal > 0) {
            $pager  = new pager($recTotal , $recperpage , $this->input->currpage, $this->input->orderby , $this->input->sort);

            $input->orderby = $this->input->orderby;
            $input->sort    = $this->input->sort;
            $input->start   = $pager->getRecStart();
            $input->end     = $pager->getRecEnd();
            $result = $model->mw_action_log->getList($input);

            $this->output->list = $result;
            $this->output->currpage = $this->input->currpage;
        }
        $this->saveSearchCond($input);
        $this->resumeForm($input);
    }


    public function _sort() {
        $this->init();
// pr($_SESSION);
        $input = new stdClass();
        $this->loadSearchCond($input);
//         pr($input);
        $model = new clsModModel($this->mdb , "mw_action_log");
        $recTotal = $model->mw_action_log->getCount($input);

        $recperpage = $this->cookie->recperpage != false ? $this->cookie->recperpage : C('recperpage');
        if ($recTotal > 0) {
            $pager  = new pager($recTotal , $recperpage , $this->input->currpage, $this->input->orderby , $this->input->sort);

            $input->orderby = $this->input->orderby;
            $input->sort    = $this->input->sort;
            $input->start = $pager->getRecStart();
            $input->end   = $pager->getRecEnd();


            $result = $model->mw_action_log->getList($input);
            $this->output->list = $result;
            $this->output->currpage = $this->input->currpage;
        }
        $this->saveSearchCond($input);
        $this->resumeForm($input);
    }

    /**
     * 页面初始化
     */
    private function init() {

        if (!isset($this->input->orderby)) {
            $this->input->orderby         = "time";
            $this->input->sort            = "desc";
            $this->output->orderby        = "time";
            $this->output->sort           = "desc";
            $this->output->activesorting  = "asc";
        } else {
            $this->input->orderby = in_array($this->input->orderby , array('time','name'))?$this->input->orderby:"time";
            $this->input->sort    = in_array($this->input->sort , array('asc','desc'))?$this->input->sort:"desc";

            $this->output->orderby  = $this->input->orderby;
            $this->output->sort     = $this->input->sort;
            $this->output->activesorting  = $this->input->sort == "asc"?"desc":"asc";
        }
        $this->output->sorting        = "asc";

//         $this->output->department_options = getDepartmentOptions($head = true);
        $this->output->datepicker = array('option'=>'full');

    }

    private function clearSearchCond() {
        $this->session->subUnsetValue(__FILE__.'searchCond');
    }

    private function saveSearchCond($input) {
        //         pr($_POST);
        $cond = array();
        if (isset($input->name))       $cond['name']       = $input->name;
        if (isset($input->timestart))   $cond['timestart']   = $input->timestart;
        if (isset($input->timeend))     $cond['timeend']     = $input->timeend;
        if (isset($input->orderby))    $cond['orderby']       = $input->orderby;
        if (isset($input->sort))       $cond['sort']          = $input->sort;

        $this->session->subSetValue( __FILE__.'searchCond' , $cond );
    }

    private function loadSearchCond($input) {
        $cond = $this->session->fncGetValue(__FILE__.'searchCond');
        // pr($cond);
        if (isset($cond['name']))        $input->name        = $cond['name'];
        if (isset($cond['timestart']))   $input->timestart   = $cond['timestart'];
        if (isset($cond['timeend']))     $input->timeend     = $cond['timeend'];
        if (isset($cond['orderby']))     $input->orderby     = $cond['orderby'];
        if (isset($cond['sort']))        $input->sort        = $cond['sort'];

    }

    private function resumeForm($input) {
        if (isset($input->name))
            $this->output->name = $input->name;

        if (isset($input->timestart))
            $this->output->timestart = $input->timestart;

        if (isset($input->timeend))
            $this->output->timeend = $input->timeend;

    }

}