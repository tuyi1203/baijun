<?php
class clsModuleSecondAddController extends clsAppController
implements IAction_default , IAction_insert , IAction_change{

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
                    , $this->lang->second->name));
            return;
        }

//         $this->input->parentid = $this->input->pid;
        //新增二级模块
        if (!$model->eku_module->insert($this->input)) {
//             pr("1");
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->second->failinsert;
            return;
        }

        //系统更新
        updateSystem();

        $this->output->action  = 'insert';
        $this->output->result  = 'success';
        $this->output->message = $this->lang->second->successinsert;
        $this->output->locate  = U('module/second');

        if ($this->input->mode == "site") return;

        //取得一级模块名称
        $input = new stdClass();
        $input->id = $this->input->parentid;
        $re = $model->eku_module->getByID($input);
        $this->input->pname = $re['name'];
        //创建目录(mode="admin"时)
        if (!$this->createModuleS($this->input->name)) {
            $this->output->result  = 'success';
            $this->output->message = sprintf($this->lang->error->createdir ,
                    '"' . APATH_ADMIN_PATH . DS . 'module'. DS . $this->input->pname . DS . $this->input->name . '"');
        }

    }

    /**
     * 页面初始化
     */
    private function init() {
        $this->input->mode            = "admin";
        $this->output->mode_choose    = "admin";
        $this->output->mode_options   = getModeOptions();
        $this->output->status_options = getStatusOptions();
        $this->output->ctrflg_options = getYesOrNoOptions();
        $this->output->menuflg_options = getYesOrNoOptions();
        $this->output->module_options = getModuleOptions($this->input->mode);
        $this->output->mode_choose    = 'admin';
        $this->output->status_choose  = '1';
    }

    private function createModuleS($dir) {
        $base = APATH_ADMIN_PATH . DS . 'module' . DS . $this->input->pname;
        return createDir($base . DS . $dir);
    }

    public function _change() {
        $this->output->action  = 'change';
        $this->output->result  = 'success';
        $this->output->options = new stdClass();
        $this->output->options->pid = getModuleOptions($this->input->mode);

    }
}