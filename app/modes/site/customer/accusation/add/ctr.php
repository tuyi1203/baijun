<?php
class clsCustomerAccusationAddController extends clsAppController implements IAction_default , IAction_insert{

    /**
     * 默认初始化页面方法
     */
    public function _default() {

        $this->init();

    }

    /**
     *
     */
    public function _insert() {

        //前台JS验证
        if ($this->form->isError()) {
            $this->output->result  = 'fail';
            $this->output->message = $this->form->getError();
            return;
        }

        if (!class_exists('verify')) require APATH_LIBS_VERIFY . DS . 'verify.php';
        $verify = new verify();
        if (!$verify->check($this->input->captcha , 1)) {
        	$this->output->result  = 'fail';
        	$this->output->message = array('captcha'=>$this->lang->error->captcha);
        	return;
        }

		if (!$this->model->insert($this->input)) {
			$this->output->result  = 'fail';
			$this->output->message = $this->lang->accusation->failinsert;
			return;
		}

        $this->output->result  = 'success';
        $this->output->message = $this->lang->accusation->successinsert;

    }

    /**
     * 页面初始化
     */
    private function init() {
    }

}