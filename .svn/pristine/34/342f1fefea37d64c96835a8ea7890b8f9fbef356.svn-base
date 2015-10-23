<?php
class clsModuleScriptEditController extends clsAppController implements IAction_default , IAction_update {

    /**
     * 默认初始化页面方法
     */
    public function _default() {

        $this->init();

        $model  = new clsModModel($this->mdb , array('eku_script'));
        $record = $model->eku_script->getByID($this->input);
        $this->output->mode          = $record['mode'];
        $this->output->pid           = $record['pid'];
        $this->output->pname         = $record['pname'];
        $this->output->pdes          = $record['pes'];
        $this->output->sid           = $record['sid'];
        $this->output->sname         = $record['sname'];
        $this->output->sdes          = $record['ses'];
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

        $model   = new clsModModel($this->mdb , array('eku_script'));
        $newname = false;
        //检查新旧名称是否相同
        if ($this->session->fncGetValue(__FILE__.'name') != $this->input->name) {
            $newname = true;
        }


        //更新数据库
        if (!$model->eku_script->update($this->input)) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->script->failupdate;
            return;
        }

        //系统更新
        updateSystem();

        $this->output->result  = 'success';
        $this->output->message = $this->lang->script->successupdate;
        $this->output->locate  = U('module/script/default/list/mode/'.
                                    $this->input->mode. '/pid/' .
                                    $this->input->pid . '/sid/' . $this->input->sid . '.html');

        //更改目录名称
        if ($newname && !$this->renameScript($this->session->fncGetValue(__FILE__.'name') , $this->input->name)) {
//             $this->output->result  = 'success';
            $this->output->message = sprintf($this->lang->error->renamedir ,
                    '"' . APATH_ADMIN_PATH . DS . 'module'. DS . $this->input->pname . DS . $this->input->sname . DS . $this->input->name .'"');
        }

    }

    /**
     * 页面初始化
     */
    private function init() {
        $this->output->id      = $this->input->id;
        $listurl               = $this->session->fncGetValue(dirname(dirname(__FILE__)). DS .'default' .  DS . 'ctr.php' . "_list.url");
        $this->output->mode    = $listurl['mode'];
        $this->output->pid     = $listurl['pid'];
        $this->output->sid     = $listurl['sid'];
    }

    private function renameScript($oldname , $newname) {
        $olddir = APATH_ADMIN_PATH . DS . 'module' . DS . $this->input->pname . DS . $this->input->sname . DS . $oldname;
        $newdir = APATH_ADMIN_PATH . DS . 'module' . DS . $this->input->pname . DS . $this->input->sname . DS . $newname;
        return renameFile($oldname,$newname);
    }
}