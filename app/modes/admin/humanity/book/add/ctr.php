<?php
class clsHumanityBookAddController extends clsAppController implements IAction_default , IAction_insert{

    /**
     * 默认初始化页面方法
     */
    public function _default() 
    {
		$this->init();
    }

    /**
     * 更新
     */
    public function _insert() 
    {

        if ($this->form->isError()) {
            $this->output->result  = 'fail';
            $this->output->message = $this->form->getError();
            return;
        }

        $input = new stdClass();
        $input->id          = $this->input->id;
        $input->title       = $this->input->title;
        $input->desc        = $this->input->desc;
        $input->sort    	= $this->input->sort;
        $input->summary     = $this->input->summary;
        $input->content     = $this->input->content;
        $input->publishyear = $this->input->publishyear;
        $input->createby    = $this->session->getUid();
        $input->createtime  = date("Y-m-d H:i:s");
        if (isset($this->input->author)) $input->author      = implode(',', $this->input->author);

        $model  = new clsModModel($this->mdb ,'mw_book');
        if (!$model->mw_book->insert($input)) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->book->failinsert;
            return;
        }

        $insertid = $this->model->getLastInsertID();
        if(!$this->loadController('admin.system.file.default')
                 ->updateObjectID($this->input->uid, $insertid, 'book')) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->book->failinsert;
            return;
        }

        $this->output->result  = 'success';
        $this->output->message = $this->lang->book->successinsert;
        $this->output->locate  = U("humanity/book/default/default.html");

    }

    private function init() {
        $this->output->editor         = array('id' => array('content'), 'tools' => 'full');

    }

}