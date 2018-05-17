<?php
class clsHumanityTalkAddController extends clsAppController implements IAction_default , IAction_insert{

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
        $input->label       = $this->input->label;
        $input->keyword     = $this->input->keyword;
        $input->summary     = $this->input->summary;
        $input->content     = $this->input->content;
        $input->createby    = $this->session->getUid();
        $input->createtime  = date("Y-m-d H:i:s");
        $input->labelid     = $this->input->labelid;
        $input->publishtime = !isset($this->input->publishtime)?date("Y-m-d H:i:s") : $this->input->publishtime;
        $input->status      = $this->input->status;
        $input->objecttype  = "talk";
        if (isset($this->input->lawyer)) $input->lawyer      = implode(',', $this->input->lawyer);
        $input->public      = "0";
        $input->authorflg   = $this->input->authorflg;
        if ($this->input->authorflg == '0') {
        	$input->authorname = $this->input->authorname;
        	$input->authorid   = -1;
        } else {
        	$input->authorname = '';
        	$input->authorid   = $this->input->authorid;
        }

        if (!$this->model->insert($input)) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->talk->failinsert;
            return;
        }

        //$insertid = $model->mw_article->lastInsertID();
        $insertid = $this->model->getLastInsertID();

        if(!$this->loadController('admin.system.file.default')
             ->updateObjectID($this->input->uid, $insertid, 'talk')) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->talk->failinsert;
            return;
        }

        $this->output->result  = 'success';
        $this->output->message = $this->lang->talk->successinsert;
        $this->output->locate  = U('humanity/talk/default/default.html');

    }

    /**
     * 页面初始化
     */
    private function init() {
        $this->output->status_options = getActicleStatusOptions();
        $this->output->status_choose  = '1';
        $this->output->editor = array('id' => array('content'), 'tools' => 'full');
        $this->output->datepicker = array("option"=>'right');
        $this->output->author_options = getAuthorOptions();
        $this->output->author_choose = '0';
//         $this->output->publishtime = date("Y-m-d H:i:s");
    }

}