<?php
class clsKnowledgeTechnologyDetailController extends clsAppController
    implements IAction_default {


    /**
     * 默认初始化页面方法
     */
    public function _default() {

        $this->init();
    }

    /**
     * 页面初始化
     */
    private function init() {

    	$model = new clsModModel($this->mdb , 'mw_single');
    	$input = new stdClass();
    	$input->id = '12';
    	$output = $model->mw_single->get($input);

    	$this->output->id             = $output['id'];
    	$this->output->title          = $output['title'];
    	$this->output->keyword        = $output['keyword'];
    	$this->output->summary        = $output['summary'];

    	$this->output->nofilter->content        = $output['content'];

    }

}