<?php
class clsServiceRepairListController extends clsAppController
    implements IAction_default , IAction_paging {


    /**
     * 默认初始化页面方法
     */
    public function _default() {
// pr($_SESSION);
        $this->init();
        $model = new clsModModel($this->mdb , "mw_message");
        $input = new stdClass();
        $input->objecttype = MODULES;
        $input->public   = '1';
        $recTotal = $model->mw_message->getCount($input);
        $recperpage = $this->cookie->recperpage != false ? $this->cookie->recperpage : C('recperpage');

        if ($recTotal > 0) {
            $pager = new frontpager($recTotal , $recperpage , $currPage = 1);
//             $input  = new stdClass();
            $input->orderby = 'createtime';
            $input->sort    = 'desc';
            $input->start = $pager->getRecStart();
            $input->end   = $pager->getRecEnd();
            $result = $model->mw_message->getList($input);
            $this->output->ta->list = $result;
            $this->output->currpage = $currPage;
        }
    }

    public function _paging() {
        $this->init();
        $input = new stdClass();
        $input->objecttype = MODULES;
        $input->public   = '1';
        $model = new clsModModel($this->mdb , "mw_message");
        $recTotal = $model->mw_message->getCount($input);
        $recperpage = $this->cookie->recperpage != false ? $this->cookie->recperpage : C('recperpage');
        if ($recTotal > 0) {
            $pager  = new frontpager($recTotal , $recperpage , $this->input->currpage);

            $input->orderby = 'createtime';
            $input->sort    = 'desc';
            $input->start   = $pager->getRecStart();
            $input->end     = $pager->getRecEnd();
            $result = $model->mw_message->getList($input);

            $this->output->ta->list = $result;
            $this->output->currpage = $this->input->currpage;
        }
    }

    public function init()
    {

    }

}