<?php
class clsManageBookingEditController extends clsAppController implements IAction_default , IAction_update , IAction_publish{

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

        $input = new stdClass();
        $input->id          = $this->input->id;
        $input->name        = $this->input->name;
        $input->tel         = $this->input->tel;
        $input->content     = $this->input->content;
        $input->content2    = $this->input->content2;
        $input->public      = "0";

        $model  = new clsModModel($this->mdb ,'yjm_booking');
        if (!$model->yjm_booking->update($input)) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->booking->failupdate;
            return;
        }

//         if(!$this->loadController('admin.system.file.default')
//                  ->updateObjectID($this->input->uid, $this->input->id, 'booking')) {
//             $this->output->result  = 'fail';
//             $this->output->message = $this->lang->booking->failupdate;
//             return;
//         }

        $this->output->result  = 'success';
        $this->output->message = $this->lang->booking->successupdate;
        $this->output->locate  = 'manage_booking-default-default.html';

    }

    public function _publish() {

    }

    /**
     * 页面初始化
     */
    private function init() {
        $model = new clsModModel($this->mdb , 'yjm_booking');
        $output = $model->yjm_booking->get($this->input);
        foreach ($output as $k => $v) {
            $this->output->$k = $v;
//             if ($k == "status") $this->output->status_choose = $v;
        }
//         $this->output->id             = $output['id'];
//         $this->output->title          = $output['title'];
//         $this->output->keyword        = $output['keyword'];
//         $this->output->summary        = $output['summary'];
//         $this->output->content        = $output['content'];
//         $this->output->publishtime    = $output['publishtime'];
//         $this->output->status_choose  = $output['status'];
//         $this->output->status_options = getActicleStatusOptions();
//         $this->output->editor         = array('id' => array('content'), 'tools' => 'full');
    }



}