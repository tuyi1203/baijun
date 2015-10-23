<?php
class clsSingleAddController extends clsAppController implements IAction_default , IAction_insert{

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
        $input->title       = $this->input->title;
        $input->keyword     = $this->input->keyword;
        $input->summary     = $this->input->summary;
        $input->content     = $this->input->content;
        $input->createby    = $this->session->getUid();
        $input->createtime  = date("Y-m-d H:i:s");
        $input->publishtime = $this->input->publishtime == "0000-00-00 00:00:00" ? date("Y-m-d H:i:s") : $this->input->publishtime;
        $input->status      = $this->input->status;

        $model  = new clsModModel($this->mdb ,'mw_single');
        if (!$model->mw_single->insert($input)) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->add->failinsert;
            return;
        }

        $insertid = $model->mw_single->lastInsertID();

        if(!$this->loadController('admin.system.file.default')
             ->updateObjectID($this->input->uid, $insertid, 'single')) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->add->failinsert;
            return;
        }

        $this->output->result  = 'success';
        $this->output->message = $this->lang->add->successinsert;
        $this->output->locate  = 'single_list-default-default.html';

    }

    /**
     * 页面初始化
     */
    private function init() {
        $this->output->status_options = getActicleStatusOptions();
        $this->output->status_choose  = '1';
        $this->output->editor = array('id' => array('content'), 'tools' => 'full');
        $this->output->publishtime = date("Y-m-d H:i:s");
    }

}