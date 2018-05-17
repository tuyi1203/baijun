<?php
class clsManageBranchesDefaultController extends clsAppController
    implements IAction_default , IAction_delete , IAction_update {


    /**
     * 默认初始化页面方法
     */
    public function _default() {

        $input = new stdClass();
        $this->output->list = $this->model->getList();
//         pr($this->output->list);

    }

    public function _delete()
    {

		if (!$this->model->delete($this->input->id)) {
			$this->output->result  = 'fail';
			return;
		}
        $this->output->result  = 'success';
    }

    public function _update()
    {
		if (!$this->model->sort($this->input)) {
			$this->output->result  = 'fail';
			return;
		}
		$this->output->result = 'success';
		$this->output->message = $this->lang->branches->successsort;
    }


    /**
     * 页面初始化
     */
    private function init() {

    }

}