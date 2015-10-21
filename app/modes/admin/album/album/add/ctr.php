<?php
class clsAlbumAlbumAddController extends clsAppController implements IAction_default , IAction_insert{

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
        $input->homepage    = $this->input->homepage;
//         pr($this->input->sort);
        if (isset($this->input->sort)) $input->sort = $this->input->sort;
        else $input->sort        = 10;
        $input->createby    = $this->session->getUid();
        $input->createtime  = date("Y-m-d H:i:s");

        $model  = new clsModModel($this->mdb ,'mw_album');
        if (!$model->mw_album->insert($input)) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->album->failinsert;
            return;
        }

        $this->output->result  = 'success';
        $this->output->message = $this->lang->album->successinsert;
        $this->output->locate  = "album_album-default-default-subkey-{$input->subkey}.html";

    }

    private function init() {
    	$input = new stdClass();
    	$input->key    = 'album';
    	$input->subkey = array('1','2');
    	$albumtype = getSetList($input);
    	$this->output->subkey_options = $albumtype;
    	$this->output->homepage_options = getYesOrNoOptions();
    	$this->output->homepage_choose   = '0';
    }

}