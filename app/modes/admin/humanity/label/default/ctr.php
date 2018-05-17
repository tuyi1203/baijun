<?php
class clsHumanityLabelDefaultController extends clsAppController
				implements IAction_default , IAction_update , IAction_delete{

    /**
     * 默认初始化页面方法
     */
    public function _default() {
        $this->init();
        $recTotal = $this->model->getCount($this->input);

        if ($recTotal > 0) {
            $result = $this->model->getList();
            $this->output->list = $result;
        }

    }

    public function _update() {

        if ($this->model->saveSort($this->input)) {
            $this->output->result  = 'success';
            $this->output->message = $this->lang->label->successsort;
        }
        else {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->label->failsort;
        }
    }

    public function _delete() {

        if (!$this->model->delete($this->input)) {
            $this->output->result  = 'fail';
            return;
        }
        $this->output->result  = 'success';
    }

    private function init() {

    }

}