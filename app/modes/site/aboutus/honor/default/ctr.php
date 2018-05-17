<?php
class clsAboutusHonorDefaultController extends clsAppController
    implements IAction_default {


    /**
     * 默认初始化页面方法
     */
    public function _default() {
    	$input = new stdClass();
    	$input->key = 'honor';
    	$input->subkey = '1';
    	$result = $this->model->getSetValue($input);
    	$this->output->content = $result->value;
    	$result = $this->model->getPics();$pics;
    	foreach ($result as $key => $value) {
    		$pics[$value->id][] = $value->url;
    	}
    	$this->output->pics    = $pics;
    	//pr($pics);
        $bannerurl = $this->model->getBanner();
        $this->output->bannerurl = $bannerurl;
    }

}