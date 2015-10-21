<?php
class clsKnowledgeCategoryDefaultController extends clsAppController
    implements IAction_default , IAction_delete , IAction_update{


    /**
     * 默认初始化页面方法
     */
    public function _default() {

//         $this->init();
        $model = new clsModModel($this->mdb , array('mw_category'));
        $input = new stdClass();
        $input->objecttype = "question";
        $this->output->list = $model->mw_category->getList($input);

    }

    public function _delete() {

        $model = new clsModModel($this->mdb,'mw_category');
        if(!$model->mw_category->delete($this->input)) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->category->faildelete;
            return;
        }
        $this->output->result  = 'success';
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
            $this->output->message = $this->lang->category->successsort;
        }
        else {
            $this->mdb->subRollBack();
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->category->failsort;
        }
        $this->mdb->subSetAutoCommit(true);//打开自动提交

    }

    /**
     * 页面初始化
     */
    private function init() {

    }

}