<?php
class clsKnowledgeQuestionAddController extends clsAppController implements IAction_default , IAction_insert{

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
        $input->category    = $this->input->category;
//         $input->summary     = $this->input->summary;
        $input->content     = $this->input->content;
        $input->createby    = $this->session->getUid();
        $input->createtime  = date("Y-m-d H:i:s");
//         $input->publishtime = $this->input->publishtime == "0000-00-00 00:00:00" ? date("Y-m-d H:i:s") : $this->input->publishtime;
//         $input->publishtime = !isset($this->input->publishtime)?date("Y-m-d H:i:s") : $this->input->publishtime;
        $input->status      = $this->input->status;
//         $input->objecttype  = "question";
        $input->public      = "0";

        $model  = new clsModModel($this->mdb ,'mw_question');
        if (!$model->mw_question->insert($input)) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->question->failinsert;
            return;
        }

        $insertid = $model->mw_question->lastInsertID();

        if(!$this->loadController('admin.system.file.default')
             ->updateObjectID($this->input->uid, $insertid, 'question')) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->question->failinsert;
            return;
        }

        $this->output->result  = 'success';
        $this->output->message = $this->lang->question->successinsert;
        $this->output->locate  = U('knowledge/question/default/back.html');

    }

    /**
     * 页面初始化
     */
    private function init() {
        $this->output->status_options = getActicleStatusOptions();
        $this->output->status_choose  = '1';
        $this->output->editor = array('id' => array('content'), 'tools' => 'simple');
        $this->output->category_options = getCategoryOptions('question');
//         $this->output->publishtime = date("Y-m-d H:i:s");
    }

}