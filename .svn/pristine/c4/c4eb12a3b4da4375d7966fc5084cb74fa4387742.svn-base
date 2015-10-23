<?php
class clsInformationTodaywaterAddController extends clsAppController implements IAction_default , IAction_insert{

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
    public function _insert() {

        if ($this->form->isError()) {
            $this->output->result  = 'fail';
            $this->output->message = $this->form->getError();
            return;
        }


        if (!$this->model->insert($this->input)) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->todaywater->failinsert;
            return;
        }

        $this->output->result  = 'success';
        $this->output->message = $this->lang->todaywater->successinsert;
        $this->output->locate  = U('information/todaywater/default/default.html');

    }

    /**
     * 页面初始化
     */
    private function init() {
        $this->output->day = date("Y-m-d");
        $this->output->datepicker = array('option'=>'simple');
    }

}