<?php
class clsNewsCaseAddController extends clsAppController implements IAction_default , IAction_insert{

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
        $input->labelid     = $this->input->labelid;
//         $input->publishtime = $this->input->publishtime == "0000-00-00 00:00:00" ? date("Y-m-d H:i:s") : $this->input->publishtime;
        $input->publishtime = !isset($this->input->publishtime)?date("Y-m-d H:i:s") : $this->input->publishtime;
        $input->status      = $this->input->status;
        $input->objecttype  = "case";
        $input->lawyer      = implode(',', $this->input->lawyer);
        $input->public      = "0";

        if (!$this->model->insert($input)) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->case->failinsert;
            return;
        }

        //$insertid = $model->mw_article->lastInsertID();
        $insertid = $this->model->getLastInsertID();

        if(!$this->loadController('admin.system.file.default')
             ->updateObjectID($this->input->uid, $insertid, 'case')) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->case->failinsert;
            return;
        }

        $this->output->result  = 'success';
        $this->output->message = $this->lang->case->successinsert;
        $this->output->locate  = U('news/case/default/default.html');

    }

    /**
     * 页面初始化
     */
    private function init() {
        $this->output->status_options = getActicleStatusOptions();
        $this->output->status_choose  = '1';
        $this->output->editor = array('id' => array('content'), 'tools' => 'full');
        $this->output->datepicker = array("option"=>'right');
//         $this->output->publishtime = date("Y-m-d H:i:s");
    }

}