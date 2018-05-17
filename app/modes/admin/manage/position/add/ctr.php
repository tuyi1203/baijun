<?php
class clsManagePositionAddController extends clsAppController implements IAction_default , IAction_insert{

    /**
     * 默认初始化页面方法
     */
    public function _default() {
        $this->init();
    }

    /**
     * 添加单页
     */
    public function _insert() {

        if ($this->form->isError()) {
            $this->output->result  = 'fail';
            $this->output->message = $this->form->getError();
            return;
        }

        $input = new stdClass();
        $input->name        = $this->input->name;
        $input->desc        = $this->input->desc;

        if (!$this->model->insert($input)) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->position->failinsert;
            return;
        }

        $this->output->result  = 'success';
        $this->output->message = $this->lang->position->successinsert;
        $this->output->locate  = U('manage/position');

    }

    private function init() {
    }

}