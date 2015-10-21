<?php
class clsSingleEventDefaultController extends clsAppController implements IAction_default , IAction_delete{

    /**
     * 默认初始化页面方法
     */
    public function _default() {
// pr($_SESSION['menu_list']);
        $this->init();
        $model = new clsModModel($this->mdb , array('mw_event'));
        $input = new stdClass();
        $input->eventobjecttype = "centre";
        $input->fileobjecttype  = "event";
        $recTotal = $model->mw_event->getCount($input);

        if ($recTotal > 0) {

            $result = $model->mw_event->getList($input);
            foreach ($result as $key => $value) {
                $result[$key]['url'] = $this->app->getWebRoot(). "/data/upload/" . $value['url'];
            }
            $this->output->list = $result;
        }

    }

    public function _delete() {

        $this->mdb->subSetAutoCommit(false);//关闭自动提交
        $this->mdb->subStartTran();

        $ok = true;
        $model = new clsModModel($this->mdb,'mw_event');

       if(!$model->mw_event->delete($this->input)) {
            $ok = false;
        }

        $input = new stdClass();
        $input->objectid   = $this->input->id;
        $input->objecttype = $this->app->getModuleS();
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
            $this->output->message = $this->lang->event->faildelete;
        }

        $this->mdb->subSetAutoCommit(true);//打开自动提交
    }

    private function init() {

    }

}