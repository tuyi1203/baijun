<?php
class clsServiceQuestionnaireListController extends clsAppController
    implements IAction_default , IAction_paging {


    /**
     * 默认初始化页面方法
     */
    public function _default() {
// pr($_SESSION);
        $this->init();
        $model = new clsModModel($this->mdb , "mw_questionnaire");
        $input = new stdClass();
        $input->now = date('Y-m-d H:i:s');
        $recTotal = $model->mw_questionnaire->getCount($input);
        $recperpage = $this->cookie->recperpage != false ? $this->cookie->recperpage : C('recperpage');

        if ($recTotal > 0) {
            $pager = new frontpager($recTotal , $recperpage , $currPage = 1);
            $input->orderby = $this->input->orderby;
            $input->sort    = $this->input->sort;
            $input->start = $pager->getRecStart();
            $input->end   = $pager->getRecEnd();
            $result = $model->mw_questionnaire->getList($input);
            $this->output->nofilter->list = $result;
            $this->output->currpage = $currPage;
        }
    }

    public function _paging() {
        $this->init();
        $input = new stdClass();
        $input->now = date('Y-m-d H:i:s');
        $model = new clsModModel($this->mdb , "mw_questionnaire");
        $recTotal = $model->mw_questionnaire->getCount($input);
//         var_dump($this->cookie->lang);
        $recperpage = $this->cookie->recperpage != false ? $this->cookie->recperpage : C('recperpage');
        if ($recTotal > 0) {
            $pager  = new frontpager($recTotal , $recperpage , $this->input->currpage);

            $input->orderby = $this->input->orderby;
            $input->sort    = $this->input->sort;
            $input->start   = $pager->getRecStart();
            $input->end     = $pager->getRecEnd();
            $result = $model->mw_questionnaire->getList($input);

            $this->output->nofilter->list = $result;
            $this->output->currpage = $this->input->currpage;
        }
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