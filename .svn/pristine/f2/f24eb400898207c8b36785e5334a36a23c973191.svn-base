<?php
class clsExampleCategoryDefaultController extends clsAppController
    implements IAction_default , IAction_delete {


    /**
     * 默认初始化页面方法
     */
    public function _default() {

//         $this->init();
        $model = new clsModModel($this->mdb , array('mw_category'));
        $input = new stdClass();
        $input->objecttype = "example";
        $this->output->list = $model->mw_category->getList($input);

    }

    public function _delete() {

        $model = new clsModModel($this->mdb,'mw_category');
        if(!$model->mw_category->delete($this->input)) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->list->faildelete;
            return;
        }
        $this->output->result  = 'success';
    }

    /**
     * 页面初始化
     */
    private function init() {

        if (!isset($this->input->orderby)) {
            $this->input->orderby         = "id";
            $this->input->sort            = "asc";
            $this->output->orderby        = "id";
            $this->output->sort           = "asc";
            $this->output->activesorting  = "desc";
        } else {
            $this->input->orderby = in_array($this->input->orderby , array('id','title','publishtime','views'))?$this->input->orderby:"id";
            $this->input->sort    = in_array($this->input->sort , array('asc','desc'))?$this->input->sort:"asc";

            $this->output->orderby  = $this->input->orderby;
            $this->output->sort     = $this->input->sort;
            $this->output->activesorting  = $this->input->sort == "asc"?"desc":"asc";
        }
        $this->output->sorting        = "asc";

    }

}