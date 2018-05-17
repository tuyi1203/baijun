<?php
class clsServiceContactDetailController extends clsAppController
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
    	$branches = $this->model->getBranches();
    	$this->output->branches = $branches;
        $bannerurl = $this->model->getBanner();
        $this->output->bannerurl = $bannerurl;
    }

}