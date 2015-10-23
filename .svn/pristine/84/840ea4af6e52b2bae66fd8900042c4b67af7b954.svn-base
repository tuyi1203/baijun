<?php
class clsEventDiscountDetailController extends clsAppController implements IAction_default {

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
        $input = new stdClass();
        $input->id         = $this->input->id;
        $input->objecttype = $this->app->getModuleS();
        $input->objectid   = $this->input->id;

        $model = new clsModModel($this->mdb, 'yjm_discount');
        $discount = $model->yjm_discount->getByID($input);

        $discount['url'] = $this->app->getWebRoot(). "/data/upload/" . $discount['url'];

        foreach ($discount as $k => $v) {
            $this->output->$k = $v;
            if ($k == "desc") {
                $this->output->nofilter->$k = $v;
            }
        }
//         $this->output->editor         = array('id' => array('desc'), 'tools' => 'simple');
    }

}