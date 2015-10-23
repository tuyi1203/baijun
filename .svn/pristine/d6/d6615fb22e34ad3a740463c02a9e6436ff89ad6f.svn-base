<?php
class clsModuleActionAddController extends clsAppController implements IAction_default , IAction_insert {

    /**
     * 默认初始化页面方法
     */
    public function _default() {

        $this->init();

    }

    /**
     * 更新
     */
    public function _insert() {

        if ($this->form->isError()) {
            $this->output->result  = 'fail';
            $this->output->message = $this->form->getError();
            return;
        }

        $model   = new clsModModel($this->mdb , array('eku_action'));

        //检查新名称是否重复
        if (!$model->eku_action->checkUnique($this->input)) {
            $this->output->result  = 'fail';
            $this->output->message = sprintf($this->lang->error->unique , $this->lang->action->name);
            return;
        }

        //更新数据库
        $input = new stdClass();
        $input->scriptid    = $this->input->scriptid;
        $input->name        = $this->input->name;
        $input->des         = $this->input->des;
        $input->createtime  = date("Y-m-d H:i:s");
        $input->createby    = $this->session->getUid();
        if (!$model->eku_action->insert($input)) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->action->failinsert;
            return;
        }

        //系统更新
        updateSystem();

        $this->output->result  = 'success';
        $this->output->message = $this->lang->action->successinsert;
        $listurl = $this->session->fncGetValue(dirname(dirname(dirname(__FILE__))). DS . 'script' . DS .'default' .  DS . 'ctr.php' . "_list.url");
        $this->output->locate  = U("module/script/default/list/mode/{$listurl['mode']}/pid/{$listurl['pid']}/sid/{$listurl['sid']}.html");
    }

    /**
     * 页面初始化
     */
    private function init() {
        $this->output->scriptid             = $this->input->scriptid;
    }

}