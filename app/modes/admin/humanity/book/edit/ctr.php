<?php
class clsHumanityBookEditController extends clsAppController implements IAction_default , IAction_update{

    /**
     * 默认初始化页面方法
     */
    public function _default() {
// pr($_SESSION);
		$this->init();
    }

    /**
     * 更新
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
        $input->desc        = $this->input->desc;
        $input->sort    	= $this->input->sort;
        $input->summary     = $this->input->summary;
        $input->content     = $this->input->content;
        // $input->subkey	    = $this->input->subkey;
        $input->publishyear = $this->input->publishyear;
//         $input->homepage    = $this->input->homepage;
        $input->updateby    = $this->session->getUid();
        $input->updatetime  = date("Y-m-d H:i:s");
        if (isset($this->input->author)) $input->author      = implode(',', $this->input->author);

        $model  = new clsModModel($this->mdb ,'mw_book');
        if (!$model->mw_book->update($input)) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->book->failupdate;
            return;
        }

        if(!$this->loadController('admin.system.file.default')
                 ->updateObjectID($this->input->uid, $this->input->id, 'book')) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->book->failupdate;
            return;
        }

        $this->output->result  = 'success';
        $this->output->message = $this->lang->book->successupdate;
        $this->output->locate  = U("humanity/book/default/default.html");

    }

    private function init() {
        $model  = new clsModModel($this->mdb , array('mw_book'));
        $record = $model->mw_book->getByID($this->input);
        // $this->output->data = $record;
        $this->output->id                = $record['id'];
        $this->output->title             = $record['title'];
        $this->output->desc              = $record['desc'];
        $this->output->sort              = $record['sort'];
        $this->output->summary           = $record['summary'];
        $this->output->author            = $record['author'];
        $this->output->content           = $record['content'];
        $this->output->publishyear       = $record['publishyear'];
        if (!empty($this->output->author)) $this->output->lawyers = $this->model->getLawyerList($this->output->author);
        $this->output->editor         = array('id' => array('content'), 'tools' => 'full');

    }

}