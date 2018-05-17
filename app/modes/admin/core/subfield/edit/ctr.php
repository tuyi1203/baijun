<?php
class clsCoreSubfieldEditController extends clsAppController implements IAction_default , IAction_update{

    /**
     * 默认初始化页面方法
     */
    public function _default() {

        $this->init();
    }

    /**
     * 更新幻灯片
     */
    public function _update() {

        if ($this->form->isError()) {
            $this->output->result  = 'fail';
            $this->output->message = $this->form->getError();
            return;
        }

        $input = new stdClass();
        $input->title       = $this->input->title;
        $input->entitle     = $this->input->entitle;
        $input->label       = $this->input->label;
        $input->desc        = $this->input->desc;
        $input->updateby    = $this->session->getUid();
        $input->updatetime  = date("Y-m-d H:i:s");
        $input->id          = $this->input->id;

        if ($this->model->update($input))  {
            if(!$this->loadController('admin.system.file.default')
                ->updateObjectID($this->input->uid, $this->input->id, 'subfield')) {
                $this->output->result  = 'fail';
                $this->output->message = $this->lang->subfield->failupdate;
                return;
            }
        }

        $this->output->result  = 'success';
        $this->output->message = $this->lang->subfield->successupdate;
        $this->output->locate  = U('core/subfield');
        // if($ok) {
        //     $this->mdb->subCommit();
        //     $this->output->result  = 'success';
        //     $this->output->message = $this->lang->field->successupdate;
        //     $this->output->locate  = U('core/field');
        // } else {
        //     $this->mdb->subRollBack();
        //     $this->output->result  = 'fail';
        //     $this->output->message = $this->lang->field->failupdate;
        // }

        // $this->mdb->subSetAutoCommit(true);//打开自动提交
    }

    /**
     * 页面初始化
     */
    private function init() {
        $input = new stdClass();
        $input->id         = $this->input->id;
        $field = $this->model->getByID($input);

        // $model = new clsModModel($this->mdb, 'mw_field');
        // $field = $model->mw_field->getByID($input);
// pr($field);
        foreach ($field as $k => $v) {
            $this->output->$k = $v;
            if ($k == 'pid') $this->output->pid_choose = $v;
        }
        $pidoptions = $this->model->getFields();
        $this->output->pid_options = $pidoptions;
        $this->output->editor         = array('id' => array('desc'), 'tools' => 'full');
    }

}