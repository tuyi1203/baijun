<?php
class clsServiceQuestionnaireDefaultController extends clsAppController
    implements IAction_default , IAction_delete , IAction_paging , IAction_sort {


    /**
     * 默认初始化页面方法
     */
    public function _default() {
// pr($_SESSION);
        $this->init();
        $model = new clsModModel($this->mdb , "mw_questionnaire");
        $input = new stdClass();
        $recTotal = $model->mw_questionnaire->getCount($input);
        $recperpage = $this->cookie->recperpage != false ? $this->cookie->recperpage : C('recperpage');

        if ($recTotal > 0) {
            $pager = new pager($recTotal , $recperpage , $currPage = 1);
//             $input  = new stdClass();
            $input->orderby = $this->input->orderby;
            $input->sort    = $this->input->sort;
            $input->start = $pager->getRecStart();
            $input->end   = $pager->getRecEnd();
            $result = $model->mw_questionnaire->getList($input);
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
        $input->objecttype = "questionnaire";

        $model = new clsModModel($this->mdb , "mw_questionnaire");
        $recTotal = $model->mw_questionnaire->getCount($input);
//         var_dump($this->cookie->lang);
        $recperpage = $this->cookie->recperpage != false ? $this->cookie->recperpage : C('recperpage');
        if ($recTotal > 0) {
            $pager  = new pager($recTotal , $recperpage , $this->input->currpage, $this->input->orderby , $this->input->sort);

            $input->orderby = $this->input->orderby;
            $input->sort    = $this->input->sort;
            $input->start   = $pager->getRecStart();
            $input->end     = $pager->getRecEnd();
            $result = $model->mw_questionnaire->getList($input);

            $this->output->list = $result;
            $this->output->currpage = $this->input->currpage;
        }
    }


    public function _sort() {
        $this->init();

        $input = new stdClass();
        $input->objecttype = "questionnaire";

        $model = new clsModModel($this->mdb , "mw_questionnaire");
        $recTotal = $model->mw_questionnaire->getCount($input);

        $recperpage = $this->cookie->recperpage != false ? $this->cookie->recperpage : C('recperpage');
        if ($recTotal > 0) {
            $pager  = new pager($recTotal , $recperpage , $this->input->currpage, $this->input->orderby , $this->input->sort);

            $input->orderby = $this->input->orderby;
            $input->sort    = $this->input->sort;
            $input->start = $pager->getRecStart();
            $input->end   = $pager->getRecEnd();


            $result = $model->mw_questionnaire->getList($input);
            $this->output->list = $result;
            $this->output->currpage = $this->input->currpage;
        }
    }

    public function _delete() {

        $model = new clsModModel($this->mdb,'mw_questionnaire');
        if(!$this->model->delete($this->input)) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->questionnaire->faildelete;
            return;
        }
        $this->output->result  = 'success';
    }


    public function _publish() {

        if(!$this->publish()) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->questionnaire->failpublish;
            return;
        }
        $this->output->result  = 'success';
    }

    public function publish() {
        $model = new clsModModel($this->mdb,'mw_questionnaire');
        if(!$model->mw_questionnaire->publish($this->input)) {
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
            $this->input->orderby = in_array($this->input->orderby , array('id','title','starttime','endtime','count','status'))?$this->input->orderby:"id";
            $this->input->sort    = in_array($this->input->sort , array('asc','desc'))?$this->input->sort:"desc";

            $this->output->orderby  = $this->input->orderby;
            $this->output->sort     = $this->input->sort;
            $this->output->activesorting  = $this->input->sort == "asc"?"desc":"asc";
        }
        $this->output->sorting        = "asc";
//         if (isset($_SESSION['action_auth_list']['admin']['news/questionnaire/default/publish']) and
//                 $_SESSION['action_auth_list']['admin']['news/questionnaire/default/publish']['operauth'] == '1') {
//             $this->output->publishauth = '1';
//         }
    }

}