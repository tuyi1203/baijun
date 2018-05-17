<?php
class clsAboutusVisionDefaultController extends clsAppController
    implements IAction_default {


    /**
     * 默认初始化页面方法
     */
    public function _default() {

    	$vision = $this->model->get("13");
    	$this->output->vision = $vision;
    	$bannerurl = $this->model->getBanner();
    	$this->output->bannerurl = $bannerurl;
    }

}