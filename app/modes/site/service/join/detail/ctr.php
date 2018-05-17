<?php
class clsServiceJoinDetailController extends clsAppController
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
		$result = $this->model->getJob($this->input->id);
		$this->output->job = $result;
        $bannerurl = $this->model->getBanner();
        $this->output->bannerurl = $bannerurl;
// 		pr($result);
    }

}