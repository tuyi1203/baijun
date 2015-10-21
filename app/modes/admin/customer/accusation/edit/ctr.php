<?php
class clsCustomerAccusationEditController extends clsAppController implements IAction_default , IAction_update , IAction_publish{

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
        $input->cardno      = $this->input->cardno;
        $input->addr        = $this->input->addr;
        $input->tel         = $this->input->tel;
        $input->email       = $this->input->email;
        $input->content     = $this->input->content;
        $input->replycontent= $this->input->replycontent;
        $input->replyid     = session('_UserId');
        $input->replytime   = date("Y-m-d H:i:s");
        $input->public      = "0";


        $model  = new clsModModel($this->mdb ,'mw_message');
        if (!$model->mw_message->update($input)) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->accusation->failupdate;
            return;
        }

//         if(!$this->loadController('admin.system.file.default')
//                  ->updateObjectID($this->input->uid, $this->input->id, 'accusation')) {
//             $this->output->result  = 'fail';
//             $this->output->message = $this->lang->accusation->failupdate;
//             return;
//         }

        $this->output->result  = 'success';
        $this->output->message = $this->lang->accusation->successupdate;
        $this->output->locate  = U('customer/accusation');

    }

    public function _publish() {

    }

    /**
     * 页面初始化
     */
    private function init() {
        $model = new clsModModel($this->mdb , 'mw_message');
        $output = $model->mw_message->get($this->input);
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