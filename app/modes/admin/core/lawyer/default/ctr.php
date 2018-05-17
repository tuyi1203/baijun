<?php
class clsCoreLawyerDefaultController extends clsAppController
    implements IAction_default , IAction_delete , IAction_paging , IAction_sort , IAction_list{


    /**
     * 默认初始化页面方法
     */
    public function _default() {

        $this->init();
        $model = new clsModModel($this->mdb , "mw_lawyer");
//         $model = new clsModModel($this->mdb , "mw_lawyer");
        $input = new stdClass();
//         $input->thisrole = $this->session->fncGetValue('_RoleId');
//         $recTotal = $model->mw_lawyer->getCount($input);
		$recTotal = $model->mw_lawyer->getCount($input);
// 		pr($recTotal);exit;
        $recperpage = $this->cookie->recperpage != false ? $this->cookie->recperpage : C('recperpage');

        if ($recTotal > 0) {
            $pager = new pager($recTotal , $recperpage , $currPage = 1);
            $input->orderby = $this->input->orderby;
            $input->sort    = $this->input->sort;
            $input->start = $pager->getRecStart();
            $input->end   = $pager->getRecEnd();
            $result = $model->mw_lawyer->getList($input);
            array_walk($result, function(&$value , $key){
            	$value['url'] = UPLOAD_URL . $value['url'];
            });
            $this->output->list = $result;
            $this->output->currpage = $currPage;
        }
        $this->clearSearchCond();
    }

    public function _list() {
// clsLogger::subWriteSysError('roleid='.$_POST['data']['roleid']);

        $this->init();

        $model = new clsModModel($this->mdb , "mw_lawyer");
        $input = new stdClass();

        if ($this->input->department !== "") {
            $input->department = $this->input->department;
        }

        if (!empty($this->input->name)) {
            $input->name = $this->input->name;
        }
        $this->saveSearchCond($input);

        $recTotal = $model->mw_lawyer->getCount($input);
        $recperpage = $this->cookie->recperpage != false ? $this->cookie->recperpage : C('recperpage');

        if ($recTotal > 0) {
            $pager = new pager($recTotal , $recperpage , $currPage = 1);
            $input->orderby = $this->input->orderby;
            $input->sort    = $this->input->sort;
            $input->start = $pager->getRecStart();
            $input->end   = $pager->getRecEnd();
            $result = $model->mw_lawyer->getList($input);
            array_walk($result, function(&$value , $key){
            	$value['url'] = UPLOAD_URL . $value['url'];
            });
            $this->output->list = $result;
            $this->output->currpage = $currPage;
        }
        $this->resumeForm($this->input);
    }

    public function _paging() {

        $this->init();

        $input = new stdClass();
        $this->loadSearchCond($input);

        $model = new clsModModel($this->mdb , "mw_lawyer");
        $recTotal = $model->mw_lawyer->getCount($input);
//         var_dump($this->cookie->lang);
        $recperpage = $this->cookie->recperpage != false ? $this->cookie->recperpage : C('recperpage');
        if ($recTotal > 0) {
            $pager  = new pager($recTotal , $recperpage , $this->input->currpage, $this->input->orderby , $this->input->sort);

            $input->orderby = $this->input->orderby;
            $input->sort    = $this->input->sort;
            $input->start   = $pager->getRecStart();
            $input->end     = $pager->getRecEnd();

            $result = $model->mw_lawyer->getList($input);
            array_walk($result, function(&$value , $key){
            	$value['url'] = UPLOAD_URL . $value['url'];
            });

            $this->output->list = $result;
            $this->output->currpage = $this->input->currpage;
        }

        $this->resumeForm($input);
    }


    public function _sort() {

        $this->init();
        $input = new stdClass();
        $this->loadSearchCond($input);
        $model = new clsModModel($this->mdb , "mw_lawyer");
        $recTotal = $model->mw_lawyer->getCount($input);

        $recperpage = $this->cookie->recperpage != false ? $this->cookie->recperpage : C('recperpage');
        if ($recTotal > 0) {
            $pager  = new pager($recTotal , $recperpage , $this->input->currpage, $this->input->orderby , $this->input->sort);

            $input->orderby = $this->input->orderby;
            $input->sort    = $this->input->sort;
            $input->start = $pager->getRecStart();
            $input->end   = $pager->getRecEnd();


            $result = $model->mw_lawyer->getList($input);
            array_walk($result, function(&$value , $key){
            	$value['url'] = UPLOAD_URL . $value['url'];
            });
            $this->output->list = $result;
            $this->output->currpage = $this->input->currpage;
        }
        $this->resumeForm($input);
    }

    public function _delete() {

    	if (!$this->model->del($this->input->id)) {
    		$this->output->result  = 'fail';
    		$this->output->message = $this->lang->lawyer->faildelete;
    	} else {
    		$this->output->result  = 'success';
    	}
    }


    /**
     * 页面初始化
     */
    private function init() {

        if (!isset($this->input->orderby)) {
            $this->input->orderby         = "id";
            $this->input->sort            = "asc";
            $this->output->orderby        = "id";
            $this->output->sort           = "asc";
            $this->output->activesorting  = "desc";
        } else {
            $this->input->orderby = in_array($this->input->orderby , array('id','pinyin','department','zhiwei','zhuanye','jigou'))?$this->input->orderby:"id";
            $this->input->sort    = in_array($this->input->sort , array('asc','desc'))?$this->input->sort:"asc";

            $this->output->orderby  = $this->input->orderby;
            $this->output->sort     = $this->input->sort;
            $this->output->activesorting  = $this->input->sort == "asc"?"desc":"asc";
        }
        $this->output->sorting        = "asc";

        $this->output->department_options   = $this->model->getDepartment();
//         pr(getRoleOptions());
        if (!empty($this->input->department)) {
            $this->output->department_choose = $this->input->department;
        } else {
            $this->output->department_choose    = "";
        }
    }

    private function saveSearchCond($input) {
//         pr($_POST);
        $cond = array();
        if (isset($input->name))   $cond['name'] = $input->name;
        if (isset($input->department)) $cond['department'] = $input->department;

        $this->session->subSetValue( __FILE__.'searchCond' , $cond );
    }

    private function clearSearchCond() {
        $this->session->subUnsetValue(__FILE__.'searchCond');
    }

    private function resumeForm($input) {
        if (isset($input->name))
            $this->output->name = $input->name;

        if (isset($input->department))
            $this->output->department_choose = $input->department;
    }

    private function loadSearchCond($input) {
        $cond = $this->session->fncGetValue(__FILE__.'searchCond');
// pr($cond);
        if (isset($cond['name']))       $input->name   = $cond['name'];
        if (isset($cond['department']))     $input->department = $cond['department'];

    }

}