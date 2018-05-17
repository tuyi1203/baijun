<?php
class clsAboutusHonorDefaultController extends clsAppController
implements IAction_default , IAction_update , IAction_delete{

    /**
     * 默认初始化页面方法
     */
    public function _default() {
// pr($_SESSION['menu_list']);
        $this->init();
        $model = new clsModModel($this->mdb , array('mw_honor'));

        $recTotal = $model->mw_honor->getCount($this->input);

        if ($recTotal > 0) {
            $input = new stdClass();
            $input->objecttype = "honor";
            $result = $model->mw_honor->getList($input);
            // foreach ($result as $key => $value) {
            //     $result[$key]['url'] = UPLOAD_URL . $value['url'];
            // }
            $this->output->list = $result;
        }

    }

    public function _update() {

        $model = new clsModModel($this->mdb , array('mw_honor'));

        $ok = true;
        $this->mdb->subSetAutoCommit(false);//关闭自动提交
        $this->mdb->subStartTran();
        $input = new stdClass();
// pr($this->input->sort);
        foreach ($this->input->sort as $id => $sort) {
            $input->sort = $sort;
            $input->id   = $id;
            if(!($model->mw_honor->saveSort($input))) {
                $ok = false; break;
            }
        }

        if ($ok) {
            $this->mdb->subCommit();
            $this->output->result  = 'success';
            $this->output->message = $this->lang->honor->successsort;
        }
        else {
            $this->mdb->subRollBack();
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->honor->failsort;
        }
        $this->mdb->subSetAutoCommit(true);//打开自动提交

    }

    public function _delete() {

        $this->mdb->subSetAutoCommit(false);//关闭自动提交
        $this->mdb->subStartTran();

        $ok = true;
        $model = new clsModModel($this->mdb,'mw_honor');

       if(!$model->mw_honor->delete($this->input)) {
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
            $this->output->message = $this->lang->honor->faildelete;
        }

        $this->mdb->subSetAutoCommit(true);//打开自动提交
    }

    private function init() {

    }

}