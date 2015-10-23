<?php
class clsExampleCategoryEditController extends clsAppController implements IAction_default , IAction_update{

    /**
     * 默认初始化页面方法
     */
    public function _default() {
// pr($_SESSION);
        $model  = new clsModModel($this->mdb , array('mw_category'));
        $record = $model->mw_category->getByID($this->input);

        $this->output->id            = $record['id'];
        $this->output->name          = $record['name'];
        $this->output->desc          = $record['desc'];

    }

    /**
     * 更新
     */
    public function _update() {

        if ($this->form->isError()) {
            $this->output->result  = 'fail';
            $this->output->message = $this->form->getError();
            return;
        }

        $input = new stdClass();
        $input->id          = $this->input->id;
        $input->name        = $this->input->name;
        $input->desc        = $this->input->desc;
        $input->updateby    = $this->session->getUid();
        $input->updatetime  = date("Y-m-d H:i:s");

        $model  = new clsModModel($this->mdb ,'mw_category');
        if (!$model->mw_category->update($input)) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->category->failupdate;
            return;
        }

        $this->output->result  = 'success';
        $this->output->message = $this->lang->category->successupdate;
        $this->output->locate  = 'example_category-default-default.html';

    }

}