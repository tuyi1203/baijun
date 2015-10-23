<?php
class clsSystemProfileEditController extends clsAppController implements IAction_default , IAction_update{

    /**
     * 默认初始化页面方法
     */
    public function _default() {

        $this->init();

    }

    /**
     * 添加单页
     */
    public function _update() {

        if ($this->form->isError()) {
            $this->output->result  = 'fail';
            $this->output->message = $this->form->getError();
            return;
        }

        $input = new stdClass();
        $input->id       = $this->session->fncGetValue("_UserId");
        $input->password = crypt($this->input->password1, C('PASSSALT'));

        $model = new clsModModel($this->mdb , "eku_user");
        if (!$model->eku_user->fncUpdatePassword($input)) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->profile->failupdate;
            return;
        }

        $this->output->result  = 'success';
        $this->output->message = $this->lang->profile->successupdate;

    }

    /**
     * 页面初始化
     */
    private function init() {
        $this->output->account = $this->session->fncGetValue('_Account');
    }

}