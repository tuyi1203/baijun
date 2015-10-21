<?php
class clsCustomerMessageConfirmController extends clsAppController
    implements IAction_default {


    /**
     * 默认初始化页面方法
     */
    public function _default() {
// pr($_SESSION);
        $this->init();
        $model = new clsModModel($this->mdb , "mw_message");
        $input = new stdClass();
        $input->id = $this->input->id;
        $result = $model->mw_message->get($input);

        foreach ($result as $k => $v) {
        	$this->output->$k = $v;
        	if ($k == "content" or $k == "replycontent") {
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
