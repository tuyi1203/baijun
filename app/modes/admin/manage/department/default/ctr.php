<?php
class clsManageDepartmentDefaultController extends clsAppController
    implements IAction_default , IAction_delete {


    /**
     * 默认初始化页面方法
     */
    public function _default() {

        $input = new stdClass();
        $this->output->list = $this->model->getDepartmentList();
//         pr($this->output->list);

    }

    public function _delete() {

		if (!$this->model->delete($this->input->id)) {
			$this->output->result  = 'fail';
			return;
		}
        $this->output->result  = 'success';
    }

//     public function _update() {

//         $model = new clsModModel($this->mdb , array('mw_category'));

//         $ok = true;
//         $this->mdb->subSetAutoCommit(false);//关闭自动提交
//         $this->mdb->subStartTran();
//         $input = new stdClass();
// // pr($this->input->sort);
//         foreach ($this->input->sort as $id => $sort) {
//             $input->sort = $sort;
//             $input->id   = $id;
//             if(!($model->mw_category->saveSort($input))) {
//                 $ok = false; break;
//             }
//         }

//         if ($ok) {
//             $this->mdb->subCommit();
//             $this->output->result  = 'success';
//             $this->output->message = $this->lang->category->successsort;
//         }
//         else {
//             $this->mdb->subRollBack();
//             $this->output->result  = 'fail';
//             $this->output->message = $this->lang->category->failsort;
//         }
//         $this->mdb->subSetAutoCommit(true);//打开自动提交

//     }

    /**
     * 页面初始化
     */
    private function init() {

    }

}