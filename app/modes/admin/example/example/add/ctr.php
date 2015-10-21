<?php
class clsExampleExampleAddController extends clsAppController implements IAction_default , IAction_insert{

    /**
     * 默认初始化页面方法
     */
    public function _default() {

        $this->init();
        $model = new clsModModel($this->mdb , array('mw_category'));
        //检查分类是否存在
        $input = new stdClass();
        $input->objecttype = "example";
        if ($model->mw_category->getCount($input) < 1) {
            $this->loadController('admin.system.error.default')
            ->pageDeny('require', 3 , 'example_example-default-default.html' , $this->lang->example->category, $this->lang->example->category);
        }

    }

    /**
     * 添加单页
     */
    public function _insert() {

        if ($this->form->isError()) {
            $this->output->result  = 'fail';
            $this->output->message = $this->form->getError();
            return;
        }


        $input = new stdClass();
        $input->title       = $this->input->title;
        $input->category    = $this->input->category;
        $input->keyword     = $this->input->keyword;
        $input->summary     = $this->input->summary;
        $input->content     = $this->input->content;
        $input->createby    = $this->session->getUid();
        $input->createtime  = date("Y-m-d H:i:s");

        $ok = true;
        $this->mdb->subSetAutoCommit(false);//关闭自动提交
        $this->mdb->subStartTran();

        $model  = new clsModModel($this->mdb ,'yjm_example');
        if (!$model->yjm_example->insert($input)) {
            $ok = false;
            return;
        }

        $insertid = $model->yjm_example->lastInsertID();

        if($ok) {
            if(!$this->loadController('admin.system.file.default')
                    ->updateObjectID($this->input->uid, $insertid, 'news')) {
                $ok = false;
                return;
            }
        }

        if($ok) {
            $model  = new clsModModel($this->mdb ,'mw_relation');
            $input->objecttype = $this->app->getModuleF();
            $input->objectid   = $insertid;
            $input->category   = $this->input->category;
            $model  = new clsModModel($this->mdb ,'mw_relation');
            if(!$model->mw_relation->insert($input)) {
                $ok = false;
            }
        }

        if($ok) {
            $this->mdb->subCommit();
            $this->output->result  = 'success';
            $this->output->message = $this->lang->example->successinsert;
            $this->output->locate  = 'example_example-default-default.html';
        } else {
            $this->mdb->subRollBack();
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->example->failinsert;
        }

    }

    /**
     * 页面初始化
     */
    private function init() {
        $this->output->category_options = getCategoryOptions($this->app->getModuleF());
        $this->output->editor         = array('id' => array('content'), 'tools' => 'full');
    }

}