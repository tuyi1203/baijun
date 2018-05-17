<?php
class clsManageWorklanguageDefaultController extends clsAppController
    implements IAction_default , IAction_delete {


    /**
     * 默认初始化页面方法
     */
    public function _default() {

        $input = new stdClass();
        $this->output->list = $this->model->getWorklanguageList();
//         pr($this->output->list);

    }

    public function _delete() {

		if (!$this->model->delete($this->input->id)) {
			$this->output->result  = 'fail';
			return;
		}
        $this->output->result  = 'success';
    }

    public function _update() {

        if ($this->model->saveSort($this->input)) {
            $this->output->result  = 'success';
            $this->output->message = $this->lang->worklanguage->successsort;
        }
        else {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->worklanguage->failsort;
        }
    }

    /**
     * 页面初始化
     */
    private function init() {

    }

}