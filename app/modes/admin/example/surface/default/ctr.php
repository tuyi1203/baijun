<?php
class clsExampleSurfaceDefaultController extends clsAppController
implements IAction_default , IAction_update , IAction_delete{

    /**
     * 默认初始化页面方法
     */
    public function _default() {
// pr($_SESSION['menu_list']);
        $this->init();
        $input = new stdClass();
        $input->objecttype      = "surface";
        $model = new clsModModel($this->mdb , array('mw_category'));

        $result = $model->mw_category->getList($input);
        $this->output->list = $result;

    }

    public function _update() {

        $model = new clsModModel($this->mdb , array('mw_category'));

        $ok = true;
        $this->mdb->subSetAutoCommit(false);//关闭自动提交
        $this->mdb->subStartTran();
        $input = new stdClass();
// pr($this->input->sort);
        foreach ($this->input->sort as $id => $sort) {
            $input->sort = $sort;
            $input->id   = $id;
            if(!($model->mw_category->saveSort($input))) {
                $ok = false; break;
            }
        }

        if ($ok) {
            $this->mdb->subCommit();
            $this->output->result  = 'success';
            $this->output->message = $this->lang->surface->successsort;
        }
        else {
            $this->mdb->subRollBack();
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->surface->failsort;
        }
        $this->mdb->subSetAutoCommit(true);//打开自动提交

    }



    public function _delete() {

        $model = new clsModModel($this->mdb,'mw_category');

       if(!$model->mw_category->delete($this->input)) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->mw_category->faildelete;
            return;
        }
        $this->output->result  = 'success';

    }

    private function init() {

    }

}