<?php
class clsAboutusHonorDescController extends clsAppController implements IAction_default , IAction_update{

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
        $this->input->key = "honor";
        $this->input->subkey = "1";
        if (!$this->model->update($this->input)) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->honor->faildescupdate;
            return;
        }

        $this->output->result  = 'success';
        $this->output->message = $this->lang->honor->successdescupdate;

    }

    /**
     * 页面初始化
     */
    private function init() {
        $data = new stdClass();
        $data->key = "honor";
        $data->subkey = "1";
        $result  = $this->model->getValue($data);
        //pr($result);
        $this->output->re = $result;
    }

}