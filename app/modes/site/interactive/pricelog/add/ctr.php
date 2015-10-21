<?php
class clsInteractivePricelogAddController extends clsAppController implements IAction_default , IAction_insert{

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
        $input->huxing      = $this->input->huxing;
        $input->mianji      = $this->input->mianji;
        $input->yongtu      = $this->input->yongtu;
        $input->zhonglei    = $this->input->zhonglei;
        $input->name        = $this->input->name;
        $input->tel         = $this->input->tel;
        $input->loupan      = $this->input->loupan;
        $input->loupan2     = $this->input->loupan2;
        $input->jiaofang    = $this->input->jiaofang;
        $input->taocan      = $this->input->taocan;
        $input->fengge      = $this->input->fengge;
        $input->createtime  = date("Y-m-d H:i:s");

        $model  = new clsModModel($this->mdb ,'yjm_pricelog');
        if (!$model->yjm_pricelog->insert($input)) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->pricelog->failinsert;
            return;
        }


        $this->output->result  = 'success';
        $this->output->message = $this->lang->pricelog->successinsert;
//         $this->output->locate  = 'manage_pricelog-default-default.html';

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