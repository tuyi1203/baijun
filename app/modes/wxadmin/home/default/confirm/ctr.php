<?php
class clsHomeDefaultConfirmController extends clsAppController
    implements IAction_default {


    /**
     * 默认初始化页面方法
     */
    public function _default() {
// pr($_SESSION);
        $this->init();
        $model = new clsModModel($this->mdb , "mw_article");
        $input = new stdClass();
        $input->id = $this->input->id;
        $result = $model->mw_article->get($input);

        $this->output->title                      = $result['title'];
        $this->output->nofilter->content          = $result['content'];
        $this->output->nofilter->stickfooter      = $result['createname'] . $this->lang->announce->published. $result['createtime'];
    }


    /**
     * 页面初始化
     */
    private function init() {

    }

}