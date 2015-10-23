<?php
class clsModuleActionEditController extends clsAppController implements IAction_default , IAction_update {

    /**
     * 默认初始化页面方法
     */
    public function _default() {

        $this->init();

        $model  = new clsModModel($this->mdb , array('eku_action'));
        $record = $model->eku_action->getByID($this->input);
        $this->output->id            = $record['id'];
        $this->output->scriptid      = $record['scriptid'];
        $this->output->name          = $record['name'];
        $this->output->des           = $record['des'];
        //保存名称信息到session
        $this->session->subSetValue(__FILE__.'name' , $this->output->name);
    }

    /**
     * 更新
     */
    public function _update() {

        if ($this->form->isError()) {
            $this->output->result  = 'fail';
            $this->output->message = $this->form->getError();
            return;
        }

        $model   = new clsModModel($this->mdb , array('eku_action'));
        $newname = false;
        //检查新旧名称是否相同
        if ($this->session->fncGetValue(__FILE__.'name') != $this->input->name) {
            $newname = true;
        }

        //检查新名称是否重复
        if ($newname and !$model->eku_action->checkUnique($this->input)) {
            $this->output->result  = 'fail';
            $this->output->message = sprintf($this->lang->error->unique , $this->lang->action->name);
            return;
        }

        //更新数据库
        if (!$model->eku_action->update($this->input)) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->action->failupdate;
            return;
        }

        //系统更新
        updateSystem();

        $this->output->result  = 'success';
        $this->output->message = $this->lang->action->successupdate;
        $listurl = $this->session->fncGetValue(dirname(dirname(dirname(__FILE__))). DS . 'script' . DS .'default' .  DS . 'ctr.php' . "_list.url");
        $this->output->locate  = U("module/script/default/list/mode/{$listurl['mode']}/pid/{$listurl['pid']}/sid/{$listurl['sid']}.html");
//         $this->output->locate  = 'module_action-default-list-mode-'.
//                                     $this->input->mode. '-pid-' .
//                                     $this->input->pid . '-sid-' . $this->input->sid . '.html';

    }

    /**
     * 页面初始化
     */
    private function init() {
//         $this->output->mode_options   = array('admin'=>'admin' , 'site'=>'site')
//         $this->output->status_options = getStatusOptions();
        $this->output->id             = $this->input->id;
    }

}