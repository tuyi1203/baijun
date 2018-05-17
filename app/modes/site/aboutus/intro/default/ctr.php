<?php
class clsAboutusIntroDefaultController extends clsAppController
    implements IAction_default {


    /**
     * 默认初始化页面方法
     */
    public function _default() {

    	$intro = $this->model->getIntro("3");
    	$bannerurl = $this->model->getBanner();
    	$this->output->intro = $intro;
    	$this->output->bannerurl = $bannerurl;
    }

}