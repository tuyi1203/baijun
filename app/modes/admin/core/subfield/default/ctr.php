<?php
class clsCoreSubfieldDefaultController extends clsAppController
				implements IAction_default , IAction_update , IAction_delete{

    /**
     * 默认初始化页面方法
     */
    public function _default() {

        $this->init();
        $recTotal = $this->model->getCount($this->input);

        if ($recTotal > 0) {
            $this->output->list = $this->model->getList($this->input);
        }
    }

    public function _update() {

        $model = new clsModModel($this->mdb , array('mw_field'));

        $ok = true;
        $this->mdb->subSetAutoCommit(false);//关闭自动提交
        $this->mdb->subStartTran();
        $input = new stdClass();
// pr($this->input->sort);
        foreach ($this->input->sort as $id => $sort) {
            $input->sort = $sort;
            $input->id   = $id;
            if(!($model->mw_field->saveSort($input))) {
                $ok = false; break;
            }
        }

        if ($ok) {
            $this->mdb->subCommit();
            $this->output->result  = 'success';
            $this->output->message = $this->lang->subfield->successsort;
        }
        else {
            $this->mdb->subRollBack();
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->subfield->failsort;
        }
        $this->mdb->subSetAutoCommit(true);//打开自动提交

    }

    public function _delete() {

        $this->mdb->subSetAutoCommit(false);//关闭自动提交
        $this->mdb->subStartTran();

        $ok = true;
        $model = new clsModModel($this->mdb,'mw_field');

       if(!$model->mw_field->delete($this->input)) {
            $ok = false;
        }

        $input = new stdClass();
        $input->objectid   = $this->input->id;
        $input->objecttype = MODULES;
        $model = new clsModModel($this->mdb,'mw_file');

        if($ok) {
            if (!$model->mw_file->deleteByObject($input)) {
                $ok = false;
            }
        }

        if($ok) {
            $this->mdb->subCommit();
            $this->output->result  = 'success';
        } else {
            $this->mdb->subRollBack();
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->subfield->faildelete;
        }

        $this->mdb->subSetAutoCommit(true);//打开自动提交
    }

    private function init() {
        $pidoptions = $this->model->getFields();
        if (count($pidoptions) < 1) {
            $this->redirect(U('admin/core/field'));
        }
        $this->output->pid_options = $pidoptions;
        if (empty($this->input->pid)) {
            $this->input->pid = key($pidoptions);
        }
        $this->output->pid_choose = $this->input->pid;
    }

}