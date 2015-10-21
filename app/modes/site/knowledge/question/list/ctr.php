<?php
class clsKnowledgeQuestionListController extends clsAppController
implements IAction_default , IAction_list {

    /**
     * 默认初始化页面方法
     */
    public function _default() {
        $this->init();
        $model = new clsModModel($this->mdb , array('mw_question'));
        $recTotal = $model->mw_question->getCount($this->input);

        if ($recTotal > 0) {
            $input = new stdClass();
            $input->orderby    = "createtime";
            $input->sort       = 'desc';
            $input->public     = '1';
            $input->category   = $this->input->category;
            $input->start      = 1;
//             $input->end   = $pager->getRecEnd();
            $input->end   = $recTotal;
            $result = $model->mw_question->getList($input);
            $this->output->nofilter->list = $result;
        }

    }

    public function _list() {
		$this->_default();
    }

    private function init() {
        $categories = getCategoryOptions('question');
        $this->output->categories = $categories;
        list($key,$value) = each($categories);
        if (isset($this->input->category)) {
            $this->output->activecategory = $categories[$this->input->category];
        } else {
            $this->output->activecategory = $value;
            $this->input->category = $key;
        }
    }
}