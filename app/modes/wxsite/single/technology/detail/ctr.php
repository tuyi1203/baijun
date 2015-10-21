<?php
class clsSingleTechnologyDetailController extends clsAppController implements IAction_default {

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
        $input->id = 13;
        $output = $model->mw_single->get($input);

        $this->output->id                = $output['id'];
        $this->output->title             = $output['title'];
        $this->output->keyword           = $output['keyword'];
        $this->output->summary           = $output['summary'];
        $this->output->createtime        = $output['createtime'];
        $this->output->views             = $output['views'];
        $this->output->nofilter->content = $output['content'];

        //阅读次数加1
        $model->mw_single->viewplus($input);
//         $this->output->content2       = $output['content2'];
//         $this->output->editor         = array('id' => array('content','content2'), 'tools' => 'full');

    }

}