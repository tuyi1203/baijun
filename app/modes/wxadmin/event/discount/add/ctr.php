<?php
class clsEventDiscountAddController extends clsAppController implements IAction_default , IAction_insert{

    /**
     * 默认初始化页面方法
     */
    public function _default() {

        $this->init();
    }

    /**
     * 添加幻灯片
     */
    public function _insert() {

        if ($this->form->isError()) {
            $this->output->result  = 'fail';
            $this->output->message = $this->form->getError();
            return;
        }

        $files = $this->loadController('admin.system.file.default')
                     ->getUpload('files');

        if (empty($files)) {
            $this->output->result = 'fail';
            $this->output->message = $this->lang->file->requireimage;
            return;
        }

        foreach ($files as $file) {

            if (!empty($file['errmsg'])) {
                $this->output->result = "fail";
                $this->output->message = $file['errmsg'];
                return;
            }

            if (!in_array($file['ext'] , config::$imageExtensions)) {
                $this->output->result = "fail";
                $this->output->message = $this->lang->file->notimage;
                return;
            }
        }



        $input = new stdClass();
        $input->title       = $this->input->title;
        $input->desc        = $this->input->desc;
        $input->createby    = $this->session->getUid();
        $input->createtime  = date("Y-m-d H:i:s");

        $ok = true;
        $this->mdb->subSetAutoCommit(false);//关闭自动提交
        $this->mdb->subStartTran();

        $model  = new clsModModel($this->mdb ,'yjm_discount');
        if (!$model->yjm_discount->insert($input)) {
            $ok = false;
        }

        $insertid = $model->yjm_discount->lastInsertID();

        if($ok) {
            if(!$this->loadController('admin.system.file.default')
                    ->saveUpload($this->app->getModuleS() , $insertid , $files)) {
                $ok = false;
            }
        }

        if(!$this->loadController('admin.system.file.default')
                ->updateObjectID($this->input->uid, $insertid, 'discount')) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->discount->failinsert;
            return;
        }

        if($ok) {
            $this->mdb->subCommit();
            $this->output->result  = 'success';
            $this->output->message = $this->lang->discount->successinsert;
            $this->output->locate  = 'event_discount-default-default.html';
        } else {
            $this->mdb->subRollBack();
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->discount->failinsert;
        }

    }

    /**
     * 页面初始化
     */
    private function init() {
        $this->output->editor         = array('id' => array('desc'), 'tools' => 'simple');
    }

}