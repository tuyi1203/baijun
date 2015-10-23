<?php
class clsExampleSetAddController extends clsAppController implements IAction_default , IAction_insert{

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
        $input->content     = $this->input->content;
        $input->sort        = 10;
        $input->homepage    = $this->input->homepage;

        $ok = true;
        $this->mdb->subSetAutoCommit(false);//关闭自动提交
        $this->mdb->subStartTran();

        $model  = new clsModModel($this->mdb ,'yjm_set');
        if (!$model->yjm_set->insert($input)) {
            $ok = false;
        }

        $insertid = $model->yjm_set->lastInsertID();

        if($ok) {
            if(!$this->loadController('admin.system.file.default')
                    ->saveUpload('yjm_set' , $insertid , $files)) {
                $ok = false;
            }
        }

        if(!$this->loadController('admin.system.file.default')
                ->updateObjectID($this->input->uid, $insertid, 'yjm_set')) {
             $ok = false;
        }

        if($ok) {
            $this->mdb->subCommit();
            $this->output->result  = 'success';
            $this->output->message = $this->lang->set->successinsert;
            $this->output->locate  = 'example_set-default-default.html';
        } else {
            $this->mdb->subRollBack();
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->set->failinsert;
        }

    }

    /**
     * 页面初始化
     */
    private function init() {
        $this->output->homepage_options = getYesOrNoOptions();
        $this->output->homepage_choose  = '0';
        $this->output->editor         = array('id' => array('content'), 'tools' => 'full');
    }

}