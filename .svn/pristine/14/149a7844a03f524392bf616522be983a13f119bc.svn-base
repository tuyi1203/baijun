<?php
class clsExampleSetListController extends clsAppController
implements IAction_default {

    /**
     * 默认初始化页面方法
     */
    public function _default() {
        $this->init();
        $model = new clsModModel($this->mdb , array('yjm_set'));

        $recTotal = $model->yjm_set->getCount($this->input);

        if ($recTotal > 0) {
            $input = new stdClass();
            $input->objecttype = "yjm_set";
            $result = $model->yjm_set->getList($input);
            foreach ($result as $key => $value) {
                $result[$key]['url'] = $this->app->getWebRoot(). "/data/upload/" . $value['url'];
            }
            $this->output->list = $result;
        }

        //取得全包套餐数据
        $model = new clsModModel($this->mdb , 'mw_single');
        $input = new stdClass();
        $input->id = 12;
        $output = $model->mw_single->get($input);
        $this->output->alltitle             = $output['title'];

    }

    private function init() {

    }

}