<?php
class clsHumanityMagazineAddController extends clsAppController implements IAction_default , IAction_insert{

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
        $input->publishyear = $this->input->publishyear;
        // $input->subkey	    = $this->input->subkey;
//         $input->homepage    = $this->input->homepage;
//         pr($this->input->sort);
        if (isset($this->input->sort)) $input->sort = $this->input->sort;
        else $input->sort        = 10;
        $input->createby    = $this->session->getUid();
        $input->createtime  = date("Y-m-d H:i:s");

        $model  = new clsModModel($this->mdb ,'mw_writing');
        if (!$model->mw_writing->insert($input)) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->magazine->failinsert;
            return;
        }

        $this->output->result  = 'success';
        $this->output->message = $this->lang->magazine->successinsert;
        $this->output->locate  = U("humanity/magazine/default/default.html");

    }

    private function init() {
    	// $input = new stdClass();
    	// $input->key    = 'magazine';
    	// $input->subkey = array('1','2');
    	// $magazinetype = getSetList($input);
    	// $this->output->subkey_options = $magazinetype;
    	// $this->output->homepage_options = getYesOrNoOptions();
    	// $this->output->homepage_choose   = '0';
    }

}