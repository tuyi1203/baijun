<?php
class clsExampleExampleEditController extends clsAppController implements IAction_default , IAction_update{

    /**
     * 默认初始化页面方法
     */
    public function _default() {

        $this->init();

    }

    /**
     * 添加单页
     */
    public function _update() {

        if ($this->form->isError()) {
            $this->output->result  = 'fail';
            $this->output->message = $this->form->getError();
            return;
        }

        $input = new stdClass();
        $input->id          = $this->input->id;
        $input->title       = $this->input->title;
        $input->keyword     = $this->input->keyword;
        $input->summary     = $this->input->summary;
        $input->content     = $this->input->content;
        $input->updateby    = $this->session->getUid();
        $input->updatetime  = date("Y-m-d H:i:s");
//         $input->publishtime = $this->input->publishtime == "0000-00-00 00:00:00" ? date("Y-m-d H:i:s") : $this->input->publishtime;
//         $input->status      = $this->input->status;
        $ok = true;
        $this->mdb->subSetAutoCommit(false);//关闭自动提交
        $this->mdb->subStartTran();

        $model  = new clsModModel($this->mdb ,'yjm_example');
        if (!$model->yjm_example->update($input)) {
            $ok = false;
        }

        if($ok) {
            if(!$this->loadController('admin.system.file.default')
                    ->updateObjectID($this->input->uid, $this->input->id, 'example')) {
                $ok = false;
            }
        }

        if($ok) {
            $input = new stdClass();
            $input->objecttype = $this->app->getModuleF();
            $input->objectid   = $this->input->id;
            $input->category   = $this->input->category;
            $model  = new clsModModel($this->mdb ,'mw_relation');
            if(!$model->mw_relation->update($input)) {
                $ok = false;
            }
        }

        if($ok) {
            $this->mdb->subCommit();
            $this->output->result  = 'success';
            $this->output->message = $this->lang->example->successupdate;
            $this->output->locate  = 'example_example-default-default.html';
        } else {
            $this->mdb->subRollBack();
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->example->failupdate;
        }

        $this->mdb->subSetAutoCommit(true);//打开自动提交

    }

    /**
     * 页面初始化
     */
    private function init() {
        $model = new clsModModel($this->mdb , 'yjm_example');
        $input = new stdClass();
        $input->id = $this->input->id;
        $input->objecttype = $this->app->getModuleF();
        $output = $model->yjm_example->get($input);

        $this->output->id               = $output['id'];
        $this->output->title            = $output['title'];
        $this->output->keyword          = $output['keyword'];
        $this->output->summary          = $output['summary'];
        $this->output->content          = $output['content'];
        $this->output->category_choose  = $output['category'];
        $this->output->category_options = getCategoryOptions($this->app->getModuleF());
        $this->output->editor         = array('id' => array('content'), 'tools' => 'full');
    }

}