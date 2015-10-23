<?php
class clsHomeTopdesignerAddController extends clsAppController implements IAction_default , IAction_insert{

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

        $file = $this->loadController('admin.system.topimage.edit')
                     ->getUpload('upFile');

        if (empty($file)) {
            $this->output->result = 'fail';
            $this->output->message = $this->lang->file->requireimage;
            return;
        }

        // pr($files);exit;
        if (!empty($file['errmsg'])) {
            $this->output->result = "fail";
            $this->output->message = $file['errmsg'];
            return;
        }

        if (!in_array(strtolower($file['ext']) , config::$imageExtensions)) {
            $this->output->result = "fail";
            $this->output->message = $this->lang->file->notimage;
            return;
        }


        $input = new stdClass();
        $input->title       = $this->input->title;
        $input->link        = $this->input->link;
        $input->label       = $this->input->label;
        $input->content     = $this->input->content;
        $input->desc        = $this->input->desc;
        $input->objecttype  = $this->app->getModuleS();
        $input->createby    = $this->session->getUid();
        $input->createtime  = date("Y-m-d H:i:s");

        $ok = true;
        $this->mdb->subSetAutoCommit(false);//关闭自动提交
        $this->mdb->subStartTran();

        $model  = new clsModModel($this->mdb ,'mw_top');
        if (!$model->mw_top->insert($input)) {
            $ok = false;
        }

        $insertid = $model->mw_top->lastInsertID();

        if($ok) {
            if(!$this->loadController('admin.system.topimage.edit')
                    ->saveUpload($this->app->getModuleS() , $insertid , $file)) {
                $ok = false;
            }
        }

        if($ok) {
            $this->mdb->subCommit();
            $this->output->result  = 'success';
            $this->output->message = $this->lang->topdesigner->successinsert;
            $this->output->locate  = 'home_topdesigner-default-default.html';
        } else {
            $this->mdb->subRollBack();
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->topdesigner->failinsert;
        }

    }

    /**
     * 页面初始化
     */
    private function init() {
//         $this->output->editor         = array('id' => array('desc'), 'tools' => 'full');
    }

}