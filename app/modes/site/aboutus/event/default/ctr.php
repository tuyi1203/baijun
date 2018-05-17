<?php
class clsAboutusEventDefaultController extends clsAppController
    implements IAction_default {


    /**
     * 默认初始化页面方法
     */
    public function _default() {

    	$events = $this->model->getEvents();
    	$this->output->events = $events;
    	$bannerurl = $this->model->getBanner();
    	$this->output->bannerurl = $bannerurl;
    }

}