<?php
class clsHrResumeDefaultController extends clsAppController
    implements IAction_default , IAction_delete , IAction_paging , IAction_sort , IAction_publish{


    /**
     * 默认初始化页面方法
     */
    public function _default() {
// pr($_SESSION);
        $this->init();
        $model = new clsModModel($this->mdb , "mw_resume");
        $input = new stdClass();
        $input->objecttype = MODULES;
        $recTotal = $model->mw_resume->getCount($input);
        $recperpage = $this->cookie->recperpage != false ? $this->cookie->recperpage : C('recperpage');

        if ($recTotal > 0) {
            $pager = new pager($recTotal , $recperpage , $currPage = 1);
//             $input  = new stdClass();
            $input->orderby = $this->input->orderby;
            $input->sort    = $this->input->sort;
            $input->start = $pager->getRecStart();
            $input->end   = $pager->getRecEnd();
            $result = $model->mw_resume->getList($input);
// pr($result);
            $this->output->list = $result;
            $this->output->currpage = $currPage;
        }
//         pr($_SESSION);
    }

    public function _paging() {
//         echo "hello";
        $this->init();
        $input = new stdClass();
        $input->objecttype = MODULES;

        $model = new clsModModel($this->mdb , "mw_resume");
        $recTotal = $model->mw_resume->getCount($input);
//         var_dump($this->cookie->lang);
        $recperpage = $this->cookie->recperpage != false ? $this->cookie->recperpage : C('recperpage');
        if ($recTotal > 0) {
            $pager  = new pager($recTotal , $recperpage , $this->input->currpage, $this->input->orderby , $this->input->sort);

            $input->orderby = $this->input->orderby;
            $input->sort    = $this->input->sort;
            $input->start   = $pager->getRecStart();
            $input->end     = $pager->getRecEnd();
            $result = $model->mw_resume->getList($input);

            $this->output->list = $result;
            $this->output->currpage = $this->input->currpage;
        }
    }


    public function _sort() {
        $this->init();

        $input = new stdClass();
        $input->objecttype = MODULES;
        $model = new clsModModel($this->mdb , "mw_resume");
        $recTotal = $model->mw_resume->getCount($input);

        $recperpage = $this->cookie->recperpage != false ? $this->cookie->recperpage : C('recperpage');
        if ($recTotal > 0) {
            $pager  = new pager($recTotal , $recperpage , $this->input->currpage, $this->input->orderby , $this->input->sort);

            $input->orderby = $this->input->orderby;
            $input->sort    = $this->input->sort;
            $input->start = $pager->getRecStart();
            $input->end   = $pager->getRecEnd();


            $result = $model->mw_resume->getList($input);
            $this->output->list = $result;
            $this->output->currpage = $this->input->currpage;
        }
    }

    public function _delete() {

        $model = new clsModModel($this->mdb,'mw_resume');
        if(!$model->mw_resume->delete($this->input)) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->resume->faildelete;
            return;
        }
        $this->output->result  = 'success';
    }


    public function _publish() {

        if(!$this->publish()) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->resume->failpublish;
            return;
        }
        $this->output->result  = 'success';
    }

    public function _mark() {

        $model = new clsModModel($this->mdb,'mw_resume');
        if(!$model->mw_resume->marking($this->input)) {
           $this->output->result  = 'fail';
            $this->output->message = $this->lang->resume->failmarking;
            return;
        }
        $this->output->result  = 'success';
    }

    public function publish()
    {
        $model = new clsModModel($this->mdb,'mw_resume');
        if(!$model->mw_resume->publish($this->input)) {
            return false;
        }
        return true;
    }

    /**
     * 页面初始化
     */
    private function init() {

        if (!isset($this->input->orderby)) {
            $this->input->orderby         = "createtime";
            $this->input->sort            = "desc";
            $this->output->orderby        = "createtime";
            $this->output->sort           = "desc";
            $this->output->activesorting  = "asc";
        } else {
            $this->input->orderby = in_array($this->input->orderby , array('createtime','public' , 'mark'))?$this->input->orderby:"createtime";
            $this->input->sort    = in_array($this->input->sort , array('asc','desc'))?$this->input->sort:"desc";

            $this->output->orderby  = $this->input->orderby;
            $this->output->sort     = $this->input->sort;
            $this->output->activesorting  = $this->input->sort == "asc"?"desc":"asc";
        }
        $this->output->sorting        = "asc";
        if (isset($_SESSION['action_auth_list']['admin']['hr/resume/default/publish']) and
                $_SESSION['action_auth_list']['admin']['hr/resume/default/publish']['operauth'] == '1') {
            $this->output->publishauth = '1';
        }
        if (isset($_SESSION['action_auth_list']['admin']['hr/resume/default/mark']) and
                $_SESSION['action_auth_list']['admin']['hr/resume/default/mark']['operauth'] == '1') {
            $this->output->markauth = '1';
        }
// 		   $this->input->orderby   = "id";
// 		   $this->input->sort      = "desc";
    }

}