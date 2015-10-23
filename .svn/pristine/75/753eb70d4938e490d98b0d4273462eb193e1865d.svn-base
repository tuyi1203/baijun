<?php
class clsModuleFirstAddController extends clsAppController implements IAction_default {

    /**
     * 默认初始化页面方法
     */
    public function _default() {

        $this->init();

    }

    /**
     * 添加
     */
    public function _insert() {

        if ($this->form->isError()) {
            $this->output->result  = 'fail';
            $this->output->message = $this->form->getError();
            return;
        }

        $model  = new clsModModel($this->mdb , array('eku_module'));
        //检查是否有同名模块
        if (!$model->eku_module->uniqueName($this->input)) {
            $this->output->result  = 'fail';
            $this->output->message = array('name'=>sprintf($this->lang->error->unique
                    , $this->lang->first->name));
            return;
        }

        //新增一级模块
        if (!$model->eku_module->insert($this->input)) {
//             pr("1");
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->first->failinsert;
            return;
        }

        //系统更新
        updateSystem();

        $this->output->result  = 'success';
        $this->output->message = $this->lang->first->successinsert;
        $this->output->locate  = U('module/first?mode=' . $this->input->mode);

        /*
        if ($this->input->mode == "site") return;
        //创建目录(mode="admin"时)
        if (!$this->createModulef($this->input->name)) {
            $this->output->result  = 'success';
            $this->output->message = sprintf($this->lang->error->createdir ,
                    '"' . APATH_ADMIN_PATH . DS . 'module'. DS . $this->input->name . '"');
        }
        */

    }

    /**
     * 页面初始化
     */
    private function init() {
        $this->output->mode_options   = getModeOptions();
        $this->output->status_options = getStatusOptions();
        $this->output->ctrflg_options = getYesOrNoOptions();
        $this->output->menuflg_options = getYesOrNoOptions();
        $this->output->mode_choose    = 'admin';
        $this->output->status_choose  = '1';
    }

    private function createModulef($dir) {
        $base = APATH_ADMIN_PATH . DS . 'module';
        return createDir($base . DS . $dir);
    }
}