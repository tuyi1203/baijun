<?php
class clsCoreSubfieldAddController extends clsAppController implements IAction_default , IAction_insert{

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

        // $files = $this->loadController('admin.system.file.default')
        //              ->getUpload('files');

        // if (empty($files)) {
        //     $this->output->result = 'fail';
        //     $this->output->message = $this->lang->file->requireimage;
        //     return;
        // }

        // foreach ($files as $file) {

        //     if (!empty($file['errmsg'])) {
        //         $this->output->result = "fail";
        //         $this->output->message = $file['errmsg'];
        //         return;
        //     }

        //     if (!in_array($file['ext'] , C('imageExtensions'))) {
        //         $this->output->result = "fail";
        //         $this->output->message = $this->lang->file->notimage;
        //         return;
        //     }
        // }


        $input = new stdClass();
        $input->title       = $this->input->title;
        $input->entitle     = $this->input->entitle;
        $input->pid         = $this->input->pid;
        // $input->link        = $this->input->link;
        $input->label       = $this->input->label;
        $input->desc        = $this->input->desc;
        $input->createby    = $this->session->getUid();
        $input->createtime  = date("Y-m-d H:i:s");

        // $ok = true;
        // $this->mdb->subSetAutoCommit(false);//关闭自动提交
        // $this->mdb->subStartTran();

        // $model  = new clsModModel($this->mdb ,'mw_field');
        // if (!$model->mw_field->insert($input)) {
        //     $ok = false;
        // }

        if ($this->model->insert($input)) {

            $insertid = $this->dao->lastInsertID();

            if(!$this->loadController('admin.system.file.default')
                ->updateObjectID($this->input->uid, $insertid, 'subfield')) {
                $this->output->result  = 'fail';
                $this->output->message = $this->lang->subfield->failinsert;
                return;
            }
        }

        $this->output->result  = 'success';
        $this->output->message = $this->lang->subfield->successinsert;
        $this->output->locate  = U('core/subfield');

        // $insertid = $model->mw_field->lastInsertID();

        // if($ok) {
        //     $this->mdb->subCommit();
        //     $this->output->result  = 'success';
        //     $this->output->message = $this->lang->field->successinsert;
        //     $this->output->locate  = U('core/field');
        // } else {
        //     $this->mdb->subRollBack();
        //     $this->output->result  = 'fail';
        //     $this->output->message = $this->lang->field->failinsert;
        // }

    }

    /**
     * 页面初始化
     */
    private function init() {
        $pidoptions = $this->model->getFields();
        $this->output->pid_options = $pidoptions;
        $this->output->editor         = array('id' => array('desc'), 'tools' => 'full');
    }

}