<?php
class clsExampleProjectEditController extends clsAppController implements IAction_default , IAction_update{

    /**
     * 默认初始化页面方法
     */
    public function _default() {

        $this->init();
    }

    /**
     * 添加人员
     */
    public function _update() {
// pr($_POST);exit;

        if ($this->form->isError()) {
            $this->output->result  = 'fail';
            $this->output->message = $this->form->getError();
            return;
        }

        $input = new stdClass();
        $input->title       = $this->input->title;
        $input->keyword     = $this->input->keyword;
        $input->summary     = $this->input->summary;
        $input->style       = $this->input->style;
        $input->house   	= $this->input->house;
        $input->room       	= $this->input->room;
        $input->surface   	= $this->input->surface;
        $input->yjmset   	= $this->input->yjmset;
        $input->area     	= $this->input->area;
        $input->price     	= $this->input->price;
        $input->content     = $this->input->content;
        $input->sort        = empty($this->input->sort)?0:$this->input->sort;
        $input->homepage    = $this->input->homepage;
        $input->updateby    = $this->session->getUid();
        $input->updatetime  = date("Y-m-d H:i:s");
        $input->id          = $this->input->id;

        $model  = new clsModModel($this->mdb ,'yjm_project');
        if (!$model->yjm_project->update($input)) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->project->failupdate;
            return;
        }

        if(!$this->loadController('admin.system.file.default')
                 ->updateObjectID($this->input->uid, $this->input->id, 'project')) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->project->failupdate;
            return;
        }

        $this->output->result  = 'success';
        $this->output->message = $this->lang->project->successupdate;
        $this->output->locate  = 'example_project-default-list.html';
    }

    /**
     * 页面初始化
     */
    private function init() {
    	$model = new clsModModel($this->mdb, 'yjm_project');
    	$person = $model->yjm_project->get($this->input);

    	foreach ($person as $k => $v) {
    		$this->output->$k = $v;
    		if ($k == "style") $this->output->style_choose = $v;
    		if ($k == "room" ) $this->output->room_choose = $v;
    		if ($k == "surface" ) $this->output->surface_choose = $v;
    		if ($k == "yjmset")   $this->output->yjmset_choose = $v;
    		if ($k == "designer") $this->output->designer_choose = $v;
    		if ($k == "homepage") $this->output->homepage_choose = $v;
    	}

        //取得装修风格一览
        $this->output->style_options  = getCategoryOptions('style');
        //取得居室类型一览
        $this->output->room_options   = getCategoryOptions('room');
        //取得建面类型一览
        $this->output->surface_options= getCategoryOptions('surface');

        //取得套餐一览
        $this->output->yjmset_options = getYjmSetOptions();

        $this->output->editor         = array('id' => array('content'), 'tools' => 'full');
        $this->output->homepage_options = getYesOrNoOptions();
    }

}