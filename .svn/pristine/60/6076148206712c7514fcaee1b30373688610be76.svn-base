<?php
class clsWebsiteAnnounceAddController extends clsAppController implements IAction_default , IAction_insert{

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
        $input->keyword     = '';
        $input->summary     = '';
        $input->content     = $this->input->content;
        $input->createby    = $this->session->getUid();
        $input->createtime  = date("Y-m-d H:i:s");
        $input->publishtime = !isset($this->input->publishtime)?date("Y-m-d H:i:s") : $this->input->publishtime;
//         $input->publishtime = $this->input->publishtime == "0000-00-00 00:00:00" ? date("Y-m-d H:i:s") : $this->input->publishtime;
        $input->status      = '0';
        $input->objecttype  = "announce";
        $input->public      = "0";

        $model  = new clsModModel($this->mdb ,'mw_article');
        if (!$model->mw_article->insert($input)) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->announce->failinsert;
            return;
        }

        $insertid = $model->mw_article->lastInsertID();

        if(!$this->loadController('admin.system.file.default')
             ->updateObjectID($this->input->uid, $insertid, 'announce')) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->announce->failinsert;
            return;
        }

        $this->output->result  = 'success';
        $this->output->message = $this->lang->announce->successinsert;
        $this->output->locate  = U('website/announce/default/default.html');

    }

    /**
     * 页面初始化
     */
    private function init() {
//         $this->output->status_options = getActicleStatusOptions();
//         $this->output->status_choose  = '1';
        $this->output->editor = array('id' => array('content'), 'tools' => 'full');
//         $this->output->publishtime = date("Y-m-d H:i:s");
    }

}