<?php
class clsWxalbumWxalbumAddController extends clsAppController implements IAction_default , IAction_insert{

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
        $input->desc        = $this->input->desc;
        $input->subkey	    = $this->input->subkey;
//         pr($this->input->sort);
        if (isset($this->input->sort)) $input->sort = $this->input->sort;
        else $input->sort        = 10;
        $input->createby    = $this->session->getUid();
        $input->createtime  = date("Y-m-d H:i:s");

        $model  = new clsModModel($this->mdb ,'mw_wxalbum');
        if (!$model->mw_wxalbum->insert($input)) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->wxalbum->failinsert;
            return;
        }

        $this->output->result  = 'success';
        $this->output->message = $this->lang->wxalbum->successinsert;
        $this->output->locate  = "wxalbum_wxalbum-default-default-subkey-{$input->subkey}.html";

    }

    private function init() {
    	$input = new stdClass();
    	$input->key    = 'wxalbum';
    	$input->subkey = array('1');
    	$wxalbumtype = getSetList($input);
    	$this->output->subkey_options = $wxalbumtype;
    }

}