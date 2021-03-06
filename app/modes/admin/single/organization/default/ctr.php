<?php
class clsSingleOrganizationDefaultController  extends clsAppController implements IAction_default , IAction_update{

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
//         $input->content2    = $this->input->content2;
        $input->updateby    = $this->session->getUid();
        $input->updatetime  = date("Y-m-d H:i:s");

        $model  = new clsModModel($this->mdb ,'mw_single');
        if (!$model->mw_single->update($input)) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->organization->failupdate;
            return;
        }

        if(!$this->loadController('admin.system.file.default')
                 ->updateObjectID($this->input->uid, $this->input->id, 'news')) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->organization->failupdate;
            return;
        }

        $this->output->result  = 'success';
        $this->output->message = $this->lang->organization->successupdate;
        $this->output->locate  = U('single/organization/default/default.html');

    }

    /**
     * 页面初始化
     */
    private function init() {
        $model = new clsModModel($this->mdb , 'mw_single');
        $input = new stdClass();
        $input->id = '4';
        $output = $model->mw_single->get($input);

        $this->output->id             = $output['id'];
        $this->output->title          = $output['title'];
        $this->output->keyword        = $output['keyword'];
        $this->output->summary        = $output['summary'];
        $this->output->content        = $output['content'];
//         $this->output->content2       = $output['content2'];
        $this->output->editor         = array('id' => array('content'), 'tools' => 'full');
    }

}