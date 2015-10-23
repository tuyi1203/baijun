<?php
class clsManagePriceDefaultController extends clsAppController
    implements IAction_default , IAction_delete , IAction_paging , IAction_update {


    /**
     * 默认初始化页面方法
     */
    public function _default() {
        $this->init();
        $model = new clsModModel($this->mdb , "yjm_pricelog");
        $input = new stdClass();
        $recTotal = $model->yjm_pricelog->getCount($input);
        $recperpage = $this->cookie->recperpage != false ? $this->cookie->recperpage : config::$recperpage;

        if ($recTotal > 0) {
            $pager = new pager($recTotal , $recperpage , $currPage = 1);
//             $input  = new stdClass();
            $input->start = $pager->getRecStart();
            $input->end   = $pager->getRecEnd();
            $result = $model->yjm_pricelog->getList($input);

            $this->output->list = $result;
            $this->output->currpage = $currPage;
        }
    }

    public function _paging() {
        $this->init();
        $input = new stdClass();
        $model = new clsModModel($this->mdb , "yjm_pricelog");
        $recTotal = $model->yjm_pricelog->getCount($input);
        $recperpage = $this->cookie->recperpage != false ? $this->cookie->recperpage : config::$recperpage;
        if ($recTotal > 0) {
            $pager  = new pager($recTotal , $recperpage , $this->input->currpage);

            $input->start   = $pager->getRecStart();
            $input->end     = $pager->getRecEnd();
            $result = $model->yjm_pricelog->getList($input);

            $this->output->list = $result;
            $this->output->currpage = $this->input->currpage;
        }
    }

    public function _delete() {

        $model = new clsModModel($this->mdb,'yjm_pricelog');
        if(!$model->yjm_pricelog->delete($this->input)) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->message->faildelete;
            return;
        }
        $this->output->result  = 'success';
    }

    public function _update() {

        if ($this->form->isError()) {
            $this->output->result  = 'fail';
            $error = $this->form->getError();
            $this->output->message = strip_tags($error['base']);
            return;
        }

        $input = new stdClass();
        $input->value  = $this->input->base;
        $input->key    = $this->app->getModuleS();
        $input->subkey = "1";

        $model = new clsModModel($this->mdb , 'mw_set');
        if(!$model->mw_set->update($input)) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->price->failupdate;
        }

        $this->output->result  = 'success';
        $this->output->message = $this->lang->price->successupdate;
        $this->output->locate  = 'manage_price-default-default.html';

    }


    /**
     * 页面初始化
     */
    private function init() {
        $input = new stdClass();
        $input->key         = 'price';
        $input->subkey      = array("1");
        $model = new clsModModel($this->mdb, 'mw_set');
        $result = $model->mw_set->get($input);
        $this->output->base = $result[0]['value'];
    }

}