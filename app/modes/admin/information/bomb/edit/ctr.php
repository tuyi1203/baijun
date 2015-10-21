<?php
class clsInformationBombEditController extends clsAppController implements IAction_default , IAction_update {

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
        $input->title       = $this->input->title;
        $input->keyword     = $this->input->keyword;
        $input->summary     = $this->input->summary;
        $input->content     = $this->input->content;
        $input->updateby    = $this->session->getUid();
        $input->updatetime  = date("Y-m-d H:i:s");
        $input->publishtime = !isset($this->input->publishtime)?date("Y-m-d H:i:s") : $this->input->publishtime;
//         $input->publishtime = $this->input->publishtime == "0000-00-00 00:00:00" ? date("Y-m-d H:i:s") : $this->input->publishtime;
        $input->status      = $this->input->status;
        $input->public      = "0";

        $model  = new clsModModel($this->mdb ,'mw_article');
        if (!$model->mw_article->update($input)) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->list->failupdate;
            return;
        }

        if(!$this->loadController('admin.system.file.default')
                 ->updateObjectID($this->input->uid, $this->input->id, 'bomb')) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->bomb->failupdate;
            return;
        }

        $this->output->result  = 'success';
        $this->output->message = $this->lang->bomb->successupdate;
        $this->output->locate  = U('information/bomb/default/default.html');

    }

    /**
     * 页面初始化
     */
    private function init() {
        $model = new clsModModel($this->mdb , 'mw_article');
        $output = $model->mw_article->get($this->input);
        foreach ($output as $k => $v) {
            $this->output->$k = $v;
            if ($k == "status") $this->output->status_choose = $v;
        }
//         $this->output->id             = $output['id'];
//         $this->output->title          = $output['title'];
//         $this->output->keyword        = $output['keyword'];
//         $this->output->summary        = $output['summary'];
//         $this->output->content        = $output['content'];
//         $this->output->publishtime    = $output['publishtime'];
//         $this->output->status_choose  = $output['status'];
        $this->output->status_options = getActicleStatusOptions();
        $this->output->editor         = array('id' => array('content'), 'tools' => 'full');
    }



}