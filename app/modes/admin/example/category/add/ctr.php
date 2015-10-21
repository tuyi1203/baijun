<?php
class clsExampleCategoryAddController extends clsAppController implements IAction_default , IAction_insert{

    /**
     * 默认初始化页面方法
     */
    public function _default() {

    }

    /**
     * 添加单页
     */
    public function _insert() {

        if ($this->form->isError()) {
            $this->output->result  = 'fail';
            $this->output->message = $this->form->getError();
            return;
        }

        $input = new stdClass();
        $input->name        = $this->input->name;
        $input->desc        = $this->input->desc;
        $input->objecttype  = 'example';
        $input->sort       = 10;
        $input->createby    = $this->session->getUid();
        $input->createtime  = date("Y-m-d H:i:s");

        $model  = new clsModModel($this->mdb ,'mw_category');
        if (!$model->mw_category->insert($input)) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->add->failinsert;
            return;
        }

        $this->output->result  = 'success';
        $this->output->message = $this->lang->category->successinsert;
        $this->output->locate  = 'example_category-default-default.html';

    }

}