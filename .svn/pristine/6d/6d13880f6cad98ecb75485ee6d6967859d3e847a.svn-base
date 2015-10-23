<?php
class clsInteractiveMessageAddController extends clsAppController implements IAction_insert{

    /**
     * 默认初始化页面方法
     */
    public function _default() {

        $this->init();
    }

    public function _insert() {
    	$model = new clsModModel($this->mdb , "yjm_message");
    	if ($this->form->isError()) {
    		$this->output->result  = 'fail';
    		$this->output->message = $this->form->getError();
    		return;
    	}

    	$input = new stdClass();
    	$input->name        = $this->input->name;
    	$input->tel         = $this->input->tel;
    	$input->content     = $this->input->content;
    	$input->createtime  = date("Y-m-d H:i:s");

    	if (!$model->yjm_message->insert($input)) {
    		$this->output->result  = 'fail';
    		$this->output->message = $this->lang->savefail;
    		return;
    	}

    	$this->output->result  = 'success';
    	$this->output->message = $this->lang->savesuccess;
//     	$this->output->locate  = 'article_mien-default-default.html';
    }

}