<?php
class clsExampleSetDetailController  extends clsAppController implements IAction_default{

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
        $input->objecttype = 'yjm_set';
        $input->objectid   = $this->input->id;

        $model = new clsModModel($this->mdb, 'yjm_set');
        $slide = $model->yjm_set->getByID($input);

//         $slide['url'] = $this->app->getWebRoot(). "/data/upload/" . $slide['url'];

        foreach ($slide as $k => $v) {
            if ($k == "wxcontent") {
                $this->output->nofilter->$k = $v;
            }
            $this->output->$k = $v;
        }
//         $this->output->homepage_options = getYesOrNoOptions();
        $this->output->editor         = array('id' => array('wxcontent'), 'tools' => 'simple');
    }

}