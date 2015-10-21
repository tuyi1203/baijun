<?php
class clsEventDiscountListController extends clsAppController
        implements IAction_default {

    /**
     * 默认初始化页面方法
     */
    public function _default() {
        $this->init();
        $model = new clsModModel($this->mdb , array('yjm_discount'));

        $recTotal = $model->yjm_discount->getCount($this->input);

        if ($recTotal > 0) {
            $input = new stdClass();
            $input->objecttype = "discount";
            $result = $model->yjm_discount->getList($input);
            foreach ($result as $key => $value) {
                $result[$key]['url'] = $this->app->getWebRoot(). "/data/upload/" . $value['url'];
            }
            $this->output->list = $result;
        }

    }

    private function init() {

    }

}