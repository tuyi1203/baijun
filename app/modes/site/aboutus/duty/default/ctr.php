<?php
class clsAboutusDutyDefaultController extends clsAppController
    implements IAction_default {


    /**
     * 默认初始化页面方法
     */
    public function _default() {

    	$duty = $this->model->get("14");
    	$this->output->duty = $duty;
    	$bannerurl = $this->model->getBanner();
    	$this->output->bannerurl = $bannerurl;
    }

}