<?php
class clsManageMessageDefaultController extends clsAppController
    implements IAction_default , IAction_delete , IAction_paging {


    /**
     * 默认初始化页面方法
     */
    public function _default() {
// pr($_SESSION);
        $this->init();
        $model = new clsModModel($this->mdb , "yjm_message");
        $input = new stdClass();
        $recTotal = $model->yjm_message->getCount($input);
        $recperpage = $this->cookie->recperpage != false ? $this->cookie->recperpage : config::$recperpage;

        if ($recTotal > 0) {
            $pager = new pager($recTotal , $recperpage , $currPage = 1);
//             $input  = new stdClass();
            $input->start = $pager->getRecStart();
            $input->end   = $pager->getRecEnd();
            $result = $model->yjm_message->getList($input);

            $this->output->list = $result;
            $this->output->currpage = $currPage;
        }
    }

    public function _paging() {
//         echo "hello";
        $this->init();
        $input = new stdClass();

        $model = new clsModModel($this->mdb , "yjm_message");
        $recTotal = $model->yjm_message->getCount($input);
//         var_dump($this->cookie->lang);
        $recperpage = $this->cookie->recperpage != false ? $this->cookie->recperpage : config::$recperpage;
        if ($recTotal > 0) {
            $pager  = new pager($recTotal , $recperpage , $this->input->currpage);

            $input->start   = $pager->getRecStart();
            $input->end     = $pager->getRecEnd();
            $result = $model->yjm_message->getList($input);

            $this->output->list = $result;
            $this->output->currpage = $this->input->currpage;
        }
    }

    public function _delete() {

        $model = new clsModModel($this->mdb,'yjm_message');
        if(!$model->yjm_message->delete($this->input)) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->message->faildelete;
            return;
        }
        $this->output->result  = 'success';
    }


    /**
     * 页面初始化
     */
    private function init() {

    }

}