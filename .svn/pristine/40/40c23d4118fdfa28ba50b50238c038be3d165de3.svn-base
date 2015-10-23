<?php
class clsInformationTodaywaterEditController extends clsAppController implements IAction_default , IAction_update{

    /**
     * 默认初始化页面方法
     */
    public function _default()
    {
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


        if (!$this->model->update($this->input)) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->todaywater->failupdate;
            return;
        }

        $this->output->result  = 'success';
        $this->output->message = $this->lang->todaywater->successupdate;
        $this->output->locate  = U('information/todaywater/default/default.html');

    }

    /**
     * 页面初始化
     */
    private function init() {
    	$record = $this->model->get($this->input);
    	foreach ($record as $key => $value) {
			$this->output->$key = $value;
    	}
    	$this->output->id = $this->input->id;
        $this->output->datepicker = array('option'=>'simple');
    }

}