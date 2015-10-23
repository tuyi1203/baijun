<?php
class clsHrResumeAddController extends clsAppController implements IAction_default , IAction_insert{

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

		if (!$this->model->insert($this->input)) {
			$this->output->result  = 'fail';
			$this->output->message = $this->lang->resume->failinsert;
			return;
		}

        $this->output->result  = 'success';
        $this->output->message = $this->lang->resume->successinsert;

    }

    /**
     * 页面初始化
     */
    private function init()
    {
    	$this->output->xingbie_options = array("男"=>"男","女"=>"女");
    	$this->output->zhengzhi_options = array("群众"=>"群众","团员"=>"团员","预备党员"=>"预备党员","党员"=>"党员");
    }

}