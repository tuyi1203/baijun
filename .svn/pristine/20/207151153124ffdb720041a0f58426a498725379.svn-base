<?php
class clsManageBookingAddController extends clsAppController implements IAction_default , IAction_insert{

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

        if ($this->form->isError()) {
            $this->output->result  = 'fail';
            $this->output->message = $this->form->getError();
            return;
        }

        $input = new stdClass();
        $input->name        = $this->input->name;
        $input->tel	        = $this->input->tel;
        $input->content     = $this->input->content;
        $input->content2    = $this->input->content2;
        $input->createtime  = date("Y-m-d H:i:s");
//         $input->publishtime = $this->input->publishtime == "0000-00-00 00:00:00" ? date("Y-m-d H:i:s") : $this->input->publishtime;
        $input->public      = "0";

        $model  = new clsModModel($this->mdb ,'yjm_booking');
        if (!$model->yjm_booking->insert($input)) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->booking->failinsert;
            return;
        }

//         $insertid = $model->yjm_booking->lastInsertID();

//         if(!$this->loadController('admin.system.file.default')
//              ->updateObjectID($this->input->uid, $insertid, 'booking')) {
//             $this->output->result  = 'fail';
//             $this->output->message = $this->lang->booking->failinsert;
//             return;
//         }

        $this->output->result  = 'success';
        $this->output->message = $this->lang->booking->successinsert;
        $this->output->locate  = 'manage_booking-default-default.html';

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