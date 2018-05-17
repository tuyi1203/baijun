<?php
class clsManageWorklanguageAddController extends clsAppController implements IAction_default , IAction_insert{

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
        $input->sort        = '99';

        if (!$this->model->insert($input)) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->worklanguage->failinsert;
            return;
        }

        $this->output->result  = 'success';
        $this->output->message = $this->lang->worklanguage->successinsert;
        $this->output->locate  = U('manage/worklanguage');

    }

    private function init() {
    }

}