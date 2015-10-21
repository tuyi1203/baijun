<?php
class clsHrResumeConfirmController extends clsAppController
    implements IAction_default {


    /**
     * 默认初始化页面方法
     */
    public function _default() {
// pr($_SESSION);
        $this->init();
        $model = new clsModModel($this->mdb , "mw_resume");
        $input = new stdClass();
        $input->id = $this->input->id;
        $result = $model->mw_resume->get($input);

        foreach ($result as $k => $v) {
        	$this->output->$k = $v;
        	if (in_array($k,array('peixun','gongzuo','yeji','techang','jiating','yaoqiu'))) {
        	    $this->output->ta->$k = $v;
        	}
        }

    }


    /**
     * 页面初始化
     */
    private function init()
    {

    }

}
