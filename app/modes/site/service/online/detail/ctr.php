<?php
class clsServiceOnlineDetailController extends clsAppController
    implements IAction_default {


    /**
     * 默认初始化页面方法
     */
    public function _default() {

        $this->init();
    }

    public function _add()
    {
    	//前台JS验证
    	if ($this->form->isError()) {
    		$this->output->result  = 'fail';
    		$this->output->message = $this->form->getError();
    		return;
    	}

    	if (!$this->model->insert($this->input)) {
    		$this->output->result  = 'fail';
    		$this->output->message = $this->lang->online->failinsert;
    		return;
    	}

    	$this->output->result  = 'success';
    	$this->output->message = $this->lang->online->successinsert;
    }

    /**
     * 页面初始化
     */
    private function init() 
    {
        $bannerurl = $this->model->getBanner();
        $this->output->bannerurl = $bannerurl;
    }

}