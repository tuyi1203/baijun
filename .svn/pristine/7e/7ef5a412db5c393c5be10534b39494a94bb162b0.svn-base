<?php
class clsSingleCentreDefaultController extends clsAppController
implements IAction_default , IAction_update , IAction_delete{

    /**
     * 默认初始化页面方法
     */
    public function _default() {
// pr($_SESSION['menu_list']);
        $this->init();
        $model = new clsModModel($this->mdb , array('hsp_centre'));

        $recTotal = $model->hsp_centre->getCount($this->input);

        if ($recTotal > 0) {
            $input = new stdClass();
            $input->objecttype = "centre";
            $result = $model->hsp_centre->getList($input);
            foreach ($result as $key => $value) {
                $result[$key]['url'] = $this->app->getWebRoot(). "/data/upload/" . $value['url'];
            }
            $this->output->list = $result;
        }

    }

    public function _update() {

        $model = new clsModModel($this->mdb , array('hsp_centre'));

        $ok = true;
        $this->mdb->subSetAutoCommit(false);//关闭自动提交
        $this->mdb->subStartTran();
        $input = new stdClass();
// pr($this->input->sort);
        foreach ($this->input->sort as $id => $sort) {
            $input->sort = $sort;
            $input->id   = $id;
            if(!($model->hsp_centre->saveSort($input))) {
                $ok = false; break;
            }
        }

        if ($ok) {
            $this->mdb->subCommit();
            $this->output->result  = 'success';
            $this->output->message = $this->lang->centre->successsort;
        }
        else {
            $this->mdb->subRollBack();
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->centre->failsort;
        }
        $this->mdb->subSetAutoCommit(true);//打开自动提交

    }

    public function _delete() {

        $this->mdb->subSetAutoCommit(false);//关闭自动提交
        $this->mdb->subStartTran();

        $ok = true;
        $model = new clsModModel($this->mdb,'hsp_centre,mw_file,mw_relation,mw_event_relation');

       if(!$model->hsp_centre->delete($this->input)) {
            $ok = false;
        }

        $input = new stdClass();
        $input->objectid   = $this->input->id;
        $input->objecttype = $this->app->getModuleS();
//         $model = new clsModModel($this->mdb,'mw_file');

        if($ok and !$model->mw_file->deleteByObject($input)) {
            $ok = false;
        }

        //删除对应的热门项目
//         $model = new clsModModel($this->mdb,'mw_relation');
        if($ok and !$model->mw_relation->delete($input)) {
            $ok = false;
        }

        //删除对应的活动
        if($ok and !$model->mw_event_relation->delete($input)) {
            $ok = false;
        }

        if($ok) {
            $this->mdb->subCommit();
            $this->output->result  = 'success';
        } else {
            $this->mdb->subRollBack();
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->centre->faildelete;
        }

        $this->mdb->subSetAutoCommit(true);//打开自动提交
    }

    private function init() {

    }

}