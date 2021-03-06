<?php
class clsModuleFirstEditController extends clsAppController implements IAction_default , IAction_update{

    /**
     * 默认初始化页面方法
     */
    public function _default() {

        $this->init();

        $model  = new clsModModel($this->mdb , array('eku_module'));
        $record = $model->eku_module->getByID($this->input);

//         $this->output->mode_choose   = $record['mode'];
        $this->output->mode          = $record['mode'];
        $this->output->status_choose = $record['status'];
        $this->output->ctrflg_choose = $record['ctrflg'];
        $this->output->menuflg_choose= $record['menuflg'];
        $this->output->name          = $record['name'];
        $this->output->des           = $record['des'];
        $this->output->des_en        = $record['des_en'];

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

        $model   = new clsModModel($this->mdb , array('eku_module'));
        $newname = false;
        //检查新旧名称是否相同
        if ($this->session->fncGetValue(__FILE__.'name') != $this->input->name) {
            $newname = true;
        }

        //检查新名称是否已经存在,已经存在时报错
        if ($newname && !$model->eku_module->uniqueName($this->input)) {
            $this->output->result  = 'fail';
            $this->output->message = array('name'=>sprintf($this->lang->error->unique
                    , $this->lang->first->name));
            return;
        }

        //更新数据库
        if (!$model->eku_module->update($this->input)) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->first->failupdate;
            return;
        }

        //系统更新
        updateSystem();


        $this->output->result  = 'success';
        $this->output->message = $this->lang->first->successupdate;
        $this->output->locate  = U('module/first/default/default/mode/'.$this->input->mode.'.html');

        /*
        //更改目录名称
        if ($newname && !$this->renameModulef($this->session->fncGetValue(__FILE__.'name') , $this->input->name)) {
            //             pr("3");
            $this->output->result  = 'success';
            $this->output->message = sprintf($this->lang->error->renamedir ,
                    '"' . APATH_ADMIN_PATH . DS . 'module'. DS . $this->input->name . '"');
        }
        */

    }

    /**
     * 页面初始化
     */
    private function init() {
//         $this->output->mode_options   = array('admin'=>'admin' , 'site'=>'site');
        $this->output->status_options = getStatusOptions();
        $this->output->id             = $this->input->id;
        $this->output->ctrflg_options = getYesOrNoOptions();
        $this->output->menuflg_options = getYesOrNoOptions();
    }

    private function renameModulef($oldname , $newname) {
        $olddir = APATH_ADMIN_PATH . DS . 'module' . DS . $oldname;
        $newdir = APATH_ADMIN_PATH . DS . 'module' . DS . $newname;
        return renameFile($oldname,$newname);
    }
}