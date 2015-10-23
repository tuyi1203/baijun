<?php
class clsWxalbumWxalbumEditController extends clsAppController implements IAction_default , IAction_update{

    /**
     * 默认初始化页面方法
     */
    public function _default() {
// pr($_SESSION);
		$this->init();
        $model  = new clsModModel($this->mdb , array('mw_wxalbum'));
        $record = $model->mw_wxalbum->getByID($this->input);

        $this->output->id                = $record['id'];
        $this->output->title             = $record['title'];
        $this->output->desc              = $record['desc'];
        $this->output->sort              = $record['sort'];
        $this->output->subkey_choose     = $record['subkey'];

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
        $input->subkey	    = $this->input->subkey;
        $input->updateby    = $this->session->getUid();
        $input->updatetime  = date("Y-m-d H:i:s");

        $model  = new clsModModel($this->mdb ,'mw_wxalbum');
        if (!$model->mw_wxalbum->update($input)) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->wxalbum->failupdate;
            return;
        }

        $this->output->result  = 'success';
        $this->output->message = $this->lang->wxalbum->successupdate;
        $this->output->locate  = "./wxalbum_wxalbum-default-default-subkey-{$input->subkey}.html";

    }

    private function init() {
    	$input = new stdClass();
    	$input->key    = 'wxalbum';
    	$input->subkey = array('1');
    	$wxalbumtype = getSetList($input);
    	$this->output->subkey_options = $wxalbumtype;
//     	$this->output->homepage_choose  =
    }

}