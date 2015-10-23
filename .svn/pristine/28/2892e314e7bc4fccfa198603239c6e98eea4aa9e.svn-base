<?php
class clsLowCountryListController extends clsAppController implements IAction_default {

    /**
     * 默认初始化页面方法
     */
    public function _default() {

    	$this->init();
    	$model = new clsModModel($this->mdb , array('mw_file'));

    	$input = new stdClass();
    	$input->objecttype = "country";
    	$result = $model->mw_file->getListByObjectType($input);
    	if (!$result) return;
    	foreach ($result as $key => $value) {
    		$result[$key]['url'] = UPLOAD_URL .  $value['url'];
    	}
    	$this->output->list = $result;
    }


    /**
     * 页面初始化
     */
    private function init() {

    }

}