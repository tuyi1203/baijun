<?php
class clsHumanityLifeDefaultController extends clsAppController
    implements IAction_default , IAction_delete , IAction_paging , IAction_publish , IAction_sort , IAction_settop{

    /**
     * 默认初始化页面方法
     */
    public function _default() 
    {
        $this->init();
        $input = new stdClass();
        $recTotal = $this->model->getCount($this->input);
        $recperpage = $this->cookie->recperpage != false ? $this->cookie->recperpage : C('recperpage');
        if ($recTotal > 0)
        {
            $pager = new pager($recTotal , $recperpage , $currPage = 1);
            $input->orderby = $this->input->orderby;
            $input->sort    = $this->input->sort;
            $input->start = $pager->getRecStart();
            $input->end   = $pager->getRecEnd();
            $result = $this->model->getList($input);
            $this->output->list = $result;
            $this->output->currpage = $currPage;
        }
        $this->clearSearchCond();
    }

    public function _search()
    {
        if (!isset($this->input->labelid) || $this->input->labelid == '') {
            //当搜索条件为空时
            $this->_default();
            return;
        }
        $this->init();
        $input = new stdClass();
        $this->saveSearchCond($this->input);
        $this->loadSearchCond($input);
        $recTotal = $this->model->getCount($this->input);
        $recperpage = $this->cookie->recperpage != false ? $this->cookie->recperpage : C('recperpage');
        if ($recTotal > 0)
        {
            $pager = new pager($recTotal , $recperpage , $currPage = 1);
            $input->orderby = $this->input->orderby;
            $input->sort    = $this->input->sort;
            $input->start = $pager->getRecStart();
            $input->end   = $pager->getRecEnd();
            $result = $this->model->getList($input);
            $this->output->list = $result;
            $this->output->currpage = $currPage;
        }
        $this->resumeForm($this->input);

    }

    public function _paging()
    {
        $this->init();
        $input = new stdClass();
        $this->loadSearchCond($input);
        // $model = new clsModModel($this->mdb , "mw_world");
        $recTotal = $this->model->getCount($input);
        $recperpage = $this->cookie->recperpage != false ? $this->cookie->recperpage : C('recperpage');
        if ($recTotal > 0) {
            $pager  = new pager($recTotal , $recperpage , $this->input->currpage, $this->input->orderby , $this->input->sort);
            $input->orderby = $this->input->orderby;
            $input->sort    = $this->input->sort;
            $input->start   = $pager->getRecStart();
            $input->end     = $pager->getRecEnd();
            $result = $this->model->getList($input);
            $this->output->list = $result;
            $this->output->currpage = $this->input->currpage;
        }
        $this->resumeForm($input);
    }

    public function _sort() 
    {
        $this->init();
        $input = new stdClass();
        $this->loadSearchCond($input);
        $recTotal = $this->model->getCount($this->input);
        $recperpage = $this->cookie->recperpage != false ? $this->cookie->recperpage : C('recperpage');
        if ($recTotal > 0) {
            $pager  = new pager($recTotal , $recperpage , $this->input->currpage, $this->input->orderby , $this->input->sort);

            $input->orderby = $this->input->orderby;
            $input->sort    = $this->input->sort;
            $input->start = $pager->getRecStart();
            $input->end   = $pager->getRecEnd();
            $result = $this->model->getList($input);
            $this->output->list = $result;
            $this->output->currpage = $this->input->currpage;
        }
        $this->resumeForm($input);
    }


    public function _delete() {

        if(!$this->model->delete($this->input)) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->life->faildelete;
            return;
        }
        $this->output->result  = 'success';
    }

    public function _settop()
    {
        // $model = new clsModModel($this->mdb,'mw_world');

        if(!$this->model->toggletop($this->input)) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->life->failsettop;
            return;
        }
        $this->output->result  = 'success';
    }

    public function _setcatetop()
    {
        // $model = new clsModModel($this->mdb,'mw_world');

        if(!$this->model->togglecatetop($this->input)) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->life->failsetcatetop;
            return;
        }
        $this->output->result  = 'success';
    }

    public function _setlabeltop()
    {
        // $model = new clsModModel($this->mdb,'mw_world');

        if(!$this->model->togglelabeltop($this->input)) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->life->failsettop;
            return;
        }
        $this->output->result  = 'success';
    }


    public function _publish() {

        if(!$this->publish()) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->life->failpublish;
            return;
        }
        $this->output->result  = 'success';
    }

    public function publish() {
        $model = new clsModModel($this->mdb,'mw_world');
        if(!$model->mw_world->publish($this->input)) {
            return false;
        }
        return true;
    }

    /**
     * 页面初始化
     */
    private function init() 
    {
        if (!isset($this->input->orderby)) {
            $this->input->orderby         = "id";
            $this->input->sort            = "desc";
            $this->output->orderby        = "id";
            $this->output->sort           = "desc";
            $this->output->activesorting  = "asc";
        } else {
            $this->input->orderby = in_array($this->input->orderby , array('id','title','createtime','views','public','createby','status'))?$this->input->orderby:"id";
            $this->input->sort    = in_array($this->input->sort , array('asc','desc'))?$this->input->sort:"desc";

            $this->output->orderby  = $this->input->orderby;
            $this->output->sort     = $this->input->sort;
            $this->output->activesorting  = $this->input->sort == "asc"?"desc":"asc";
        }
        $this->output->sorting        = "asc";
        if (isset($_SESSION['action_auth_list']['admin']['humanity/life/default/publish']) and
                $_SESSION['action_auth_list']['admin']['humanity/life/default/publish']['operauth'] == '1') {
            $this->output->publishauth = '1';
        }
        if (isset($_SESSION['action_auth_list']['admin']['humanity/life/default/settop']) and
        		$_SESSION['action_auth_list']['admin']['humanity/life/default/settop']['operauth'] == '1') {
        	$this->output->settopauth = '1';
        }
    }

    private function saveSearchCond($input) 
    {
        $cond = array();
        if (isset($input->labelid))   $cond['labelid'] = $input->labelid;
        if (isset($input->labelname))   $cond['labelname'] = $input->labelname;
        $this->session->subSetValue( __FILE__.'searchCond' , $cond );
    }

    private function clearSearchCond() 
    {
        $this->session->subUnsetValue(__FILE__.'searchCond');
    }

    private function resumeForm($input) 
    {
        if (isset($input->labelid)) $this->output->labelid = $input->labelid;
        if (isset($input->labelname)) $this->output->labelname = $input->labelname;

    }

    private function loadSearchCond($input) 
    {
        $cond = $this->session->fncGetValue(__FILE__.'searchCond');
        if (isset($cond['labelid']))       $input->labelid   = $cond['labelid'];
        if (isset($cond['labelname']))     $input->labelname = $cond['labelname'];

    }

}