<?php
class clsWebsiteSmallslidesAddController extends clsAppController implements IAction_default , IAction_insert{

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

            if (!in_array($file['ext'] , C('imageExtensions'))) {
                $this->output->result = "fail";
                $this->output->message = $this->lang->file->notimage;
                return;
            }
        }



        $input = new stdClass();
        $input->title       = $this->input->title;
        $input->link        = $this->input->link;
        $input->label       = $this->input->label;
        $input->desc        = $this->input->desc;
        $input->createby    = $this->session->getUid();
        $input->createtime  = date("Y-m-d H:i:s");

        $ok = true;
        $this->mdb->subSetAutoCommit(false);//关闭自动提交
        $this->mdb->subStartTran();

        $model  = new clsModModel($this->mdb ,'mw_smallslides');
        if (!$model->mw_smallslides->insert($input)) {
            $ok = false;
        }

        $insertid = $model->mw_smallslides->lastInsertID();

        if($ok) {
            if(!$this->loadController('admin.system.file.default')
                    ->saveUpload(MODULES , $insertid , $files)) {
                $ok = false;
            }
        }

        if(!$this->loadController('admin.system.file.default')
                ->updateObjectID($this->input->uid, $insertid, 'smallslides')) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->smallslides->failinsert;
            return;
        }

        if($ok) {
            $this->mdb->subCommit();
            $this->output->result  = 'success';
            $this->output->message = $this->lang->smallslides->successinsert;
            $this->output->locate  = U('website/smallslides');
        } else {
            $this->mdb->subRollBack();
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->smallslides->failinsert;
        }

    }

    /**
     * 页面初始化
     */
    private function init() {
        $this->output->editor         = array('id' => array('desc'), 'tools' => 'full');
    }

}