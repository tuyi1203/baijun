<?php
class clsManageDepartmentEditController extends clsAppController implements IAction_default , IAction_update{

    /**
     * 默认初始化页面方法
     */
    public function _default() {

        $record = $this->model->get($this->input->id);
        $this->output->id            = $record->id;
        $this->output->name          = $record->name;
        $this->output->desc          = $record->desc;

    }

    /**
     * 更新
     */
    public function _update() {

        if ($this->form->isError()) {
            $this->output->result  = 'fail';
            $this->output->message = $this->form->getError();
            return;
        }

        $input = new stdClass();
        $input->id          = $this->input->id;
        $input->name        = $this->input->name;
        $input->desc        = $this->input->desc;

        if (!$this->model->update($input)) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->department->failupdate;
            return;
        }

        $this->output->result  = 'success';
        $this->output->message = $this->lang->department->successupdate;
        $this->output->locate  = U('manage/department');

    }

}