<?php
class clsInteractiveCellphoneAddController extends clsAppController implements IAction_default , IAction_insert{

    /**
     * 默认初始化页面方法
     */
    public function _default() {

        $this->init();

    }

    /**
     * 添加单页
     */
    public function _insert() {

        //前台JS验证
//         if ($this->form->isError()) {
//             $this->output->result  = 'fail';
//             $this->output->message = $this->form->getError();
//             return;
//         }


        $input = new stdClass();
        $input->tel	        = $this->input->tel;
        $input->createtime  = date("Y-m-d H:i:s");
        $input->public      = "0";

        $model  = new clsModModel($this->mdb ,'yjm_cellphone');
        if (!$model->yjm_cellphone->insert($input)) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->cellphone->failinsert;
            return;
        }


        $this->output->result  = 'success';
        $this->output->message = $this->lang->cellphone->successinsert;
//         $this->output->locate  = 'manage_cellphone-default-default.html';

    }

    /**
     * 页面初始化
     */
    private function init() {
//         $this->output->status_options = getActicleStatusOptions();
//         $this->output->status_choose  = '1';
//         $this->output->editor = array('id' => array('content'), 'tools' => 'full');
//         $this->output->publishtime = date("Y-m-d H:i:s");
    }

}