<?php

class clsMemberMarknameEditController extends clsAppController implements IAction_default , IAction_update{

    /**
     * 默认初始化页面方法
     */
    public function _default()
    {
        $input = new stdClass();
        $remarkname = $this->model->getRemarkname($this->input);
        $this->output->remarkname = $remarkname;
        $this->output->memid      = $this->input->memid;
    }

    public function _update()
    {
        if ($this->form->isError()) {
            $this->output->result  = 'fail';
            $errmsg = $this->form->getError();
            $this->output->message = strip_tags($errmsg['name']);
            return;
        }

        if (!$this->model->update($this->input)) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->markname->failupdate;
            return;
        }

        $this->output->result  = 'success';
        $this->output->message = $this->lang->markname->successupdate;
    }
}