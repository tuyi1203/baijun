<?php
class clsManagePositionDefaultController extends clsAppController
    implements IAction_default , IAction_delete , IAction_update{


    /**
     * 默认初始化页面方法
     */
    public function _default() {

        $input = new stdClass();
        $this->output->list = $this->model->getDepartmentList();
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
            $this->output->message = $this->lang->position->successsort;
        }
        else {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->position->failsort;
        }
    }

    /**
     * 页面初始化
     */
    private function init() {

    }

}