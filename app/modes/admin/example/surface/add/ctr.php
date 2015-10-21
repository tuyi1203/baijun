<?php
class clsExampleSurfaceAddController extends clsAppController implements IAction_default , IAction_insert{

    /**
     * 默认初始化页面方法
     */
    public function _default() {

        $this->init();
    }

    /**
     * 添加幻灯片
     */
    public function _insert() {

        if ($this->form->isError()) {
            $this->output->result  = 'fail';
            $this->output->message = $this->form->getError();
            return;
        }

        $input = new stdClass();
        $input->name        = $this->input->name;
        $input->objecttype  = $this->app->getModuleS();
        $input->desc		= $this->input->name;
        $input->sort        = 10;
        $input->createby    = $this->session->getUid();
        $input->createtime  = date("Y-m-d H:i:s");

        $model  = new clsModModel($this->mdb ,'mw_category');
        if (!$model->mw_category->insert($input)) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->surface->failinsert;
            return;
        }

        $this->output->result  = 'success';
        $this->output->message = $this->lang->surface->successinsert;
        $this->output->locate  = 'example_surface-default-default.html';

    }

    /**
     * 页面初始化
     */
    private function init() {
//         $this->output->editor         = array('id' => array('content'), 'tools' => 'noImage');
//         $this->output->status_options = getYesOrNoOptions();
    }

}