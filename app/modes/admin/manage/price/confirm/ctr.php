<?php
class clsManagePriceConfirmController extends clsAppController
    implements IAction_default {


    /**
     * 默认初始化页面方法
     */
    public function _default() {
        $this->init();
        $model = new clsModModel($this->mdb , "yjm_pricelog");
        $input = new stdClass();
        $input->id = $this->input->id;
        $result = $model->yjm_pricelog->get($input);

        foreach ($result as $k => $v) {
        	$this->output->$k = $v;
        }
    }


    /**
     * 页面初始化
     */
    private function init() {

    }

}
