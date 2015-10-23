<?php
class clsHrEmployDefaultController extends clsAppController implements IAction_default , IAction_update{

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

        $model  = new clsModModel($this->mdb ,'mw_single');
        if (!$model->mw_single->update($input)) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->employ->failupdate;
            return;
        }

        if(!$this->loadController('admin.system.file.default')
                 ->updateObjectID($this->input->uid, $this->input->id, 'news')) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->hr->failupdate;
            return;
        }

        $this->output->result  = 'success';
        $this->output->message = $this->lang->employ->successupdate;
        $this->output->locate  = U('hr/employ');
    }

    /**
     * 页面初始化
     */
    private function init() {
        $model = new clsModModel($this->mdb , 'mw_single');
        $input = new stdClass();
        $input->id = '19';
        $output = $model->mw_single->get($input);

        $this->output->id             = $output['id'];
        $this->output->title          = $output['title'];
        $this->output->keyword        = $output['keyword'];
        $this->output->summary        = $output['summary'];
        $this->output->content        = $output['content'];
        $this->output->editor         = array('id' => array('content'), 'tools' => 'full');
    }

}