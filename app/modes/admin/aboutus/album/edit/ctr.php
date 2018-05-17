<?php
class clsAboutusAlbumEditController extends clsAppController implements IAction_default , IAction_update{

    /**
     * 默认初始化页面方法
     */
    public function _default() {
// pr($_SESSION);
		$this->init();
        $model  = new clsModModel($this->mdb , array('mw_album'));
        $record = $model->mw_album->getByID($this->input);

        $this->output->id                = $record['id'];
        $this->output->title             = $record['title'];
        $this->output->desc              = $record['desc'];
        $this->output->sort              = $record['sort'];
        $this->output->subkey_choose     = $record['subkey'];
//         $this->output->homepage_choose   = $record['homepage'];

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
//         $input->homepage    = $this->input->homepage;
        $input->updateby    = $this->session->getUid();
        $input->updatetime  = date("Y-m-d H:i:s");

        $model  = new clsModModel($this->mdb ,'mw_album');
        if (!$model->mw_album->update($input)) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->album->failupdate;
            return;
        }

        $this->output->result  = 'success';
        $this->output->message = $this->lang->album->successupdate;
        $this->output->locate  = U("aboutus/album/default/default/subkey/{$input->subkey}.html");

    }

    private function init() {
    	$input = new stdClass();
    	$input->key    = 'album';
    	$input->subkey = array('1','2');
    	$albumtype = getSetList($input);
    	$this->output->subkey_options = $albumtype;
    	$this->output->homepage_options = getYesOrNoOptions();
//     	$this->output->homepage_choose  =
    }

}