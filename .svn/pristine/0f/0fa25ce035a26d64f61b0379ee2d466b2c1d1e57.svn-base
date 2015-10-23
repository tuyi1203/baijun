<?php
class clsLowLocalDefaultController extends clsAppController
implements IAction_default , IAction_update , IAction_delete{

    /**
     * 默认初始化页面方法
     */
    public function _default() {
// pr($_SESSION['menu_list']);
        $this->init();
        $model = new clsModModel($this->mdb , array('mw_file'));

        $input = new stdClass();
        $input->objecttype = "local";
        $result = $model->mw_file->getListByObjectType($input);
        if (!$result) return;
        foreach ($result as $key => $value) {
            $result[$key]['url'] = UPLOAD_URL .  $value['url'];
        }
        $this->output->list = $result;

    }

    public function _update() {

        $model = new clsModModel($this->mdb , array('mw_file'));

        $ok = true;
        $this->mdb->subSetAutoCommit(false);//关闭自动提交
        $this->mdb->subStartTran();
        $input = new stdClass();
// pr($this->input->sort);
        foreach ($this->input->sort as $id => $sort) {
            $input->sort = $sort;
            $input->id   = $id;
            if(!($model->mw_file->saveSort($input))) {
                $ok = false; break;
            }
        }

        if ($ok) {
            $this->mdb->subCommit();
            $this->output->result  = 'success';
            $this->output->message = $this->lang->local->successsort;
        }
        else {
            $this->mdb->subRollBack();
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->local->failsort;
        }
        $this->mdb->subSetAutoCommit(true);//打开自动提交

    }

    public function _delete() {

        $input= new stdClass();
        $input->id = $this->input->id;
        //取得旧文件数据
        $model = new clsModModel($this->mdb, 'mw_file');
        $oldfile = $model->mw_file->getByID($input);

        $model = new clsModModel($this->mdb,'mw_file');
        if(!$model->mw_file->delete($this->input)) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->local->faildelete;
            return;
        }

        //删除旧文件
        $oldfilepath = $oldfile['filepath'];
        if (file_exists($oldfilepath)) unlink($oldfilepath);

        $this->output->result  = 'success';
    }

    private function init() {

    }

}