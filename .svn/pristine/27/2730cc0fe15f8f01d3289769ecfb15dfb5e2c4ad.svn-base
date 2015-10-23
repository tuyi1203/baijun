<?php
class clsModuleScriptAddController extends clsAppController
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

        //检查是否有同名脚本
        $model  = new clsModModel($this->mdb , array('eku_script'));
        if (!$model->eku_script->checkUnique($this->input)) {
            $this->output->result  = 'fail';
            $this->output->message = sprintf($this->lang->error->unique , $this->lang->script->name);
            return;
        }

        //新增脚本
        $this->input->createtime = date('Y-m-d H:i:s');
        $this->input->createby = $this->session->getUid();
        if (!$model->eku_script->insert($this->input)) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->script->failinsert;
            return;
        }

        //系统更新
        updateSystem();

        $this->output->action  = 'insert';
        $this->output->result  = 'success';
        $this->output->message = $this->lang->script->successinsert;
        $this->output->locate  = U('module/script');

        if ($this->input->mode == "site") return;

        //取得一级模块名称
        $model  = new clsModModel($this->mdb , array('eku_module'));
        $input = new stdClass();
        $input->id = $this->input->pid;
        $re = $model->eku_module->getByID($input);
        $this->input->pname = $re['name'];

        //取得二级模块名称
        $input = new stdClass();
        $input->id = $this->input->sid;
        $re = $model->eku_module->getByID($input);
        $this->input->sname = $re['name'];
        //创建目录(mode="admin"时)
        if (!$this->createScript($this->input->name)) {
            $this->output->result  = 'success';
            $this->output->message = sprintf($this->lang->error->createdir ,
                    '"' . APATH_ADMIN_PATH . DS . 'module'. DS . $this->input->pname . DS . $this->input->sname . DS . $this->input->name . '"');
        }

    }

    /**
     * 页面初始化
     */
    private function init() {
        $this->input->mode            = "admin";
        $this->output->mode_choose    = "admin";
        $this->output->mode_options   = getModeOptions();
        $this->output->mode_choose    = 'admin';
        if (!empty($this->input->pid))
            $this->output->module_choose = $this->input->pid;

        if (!empty($this->input->sid))
            $this->output->second_choose = $this->input->sid;

        $this->output->module_options    = getModuleOptions($this->input->mode,$parentid = null,$header = false);
        if (!isset($this->input->pid)) {
            list($parentid , $label)         = each($this->output->module_options);
            $this->output->second_options    = getModuleOptions($this->input->mode,$parentid,$header = false);
        } else {
            $this->output->second_options    = getModuleOptions($this->input->mode , $this->input->pid , $header = false);
        }
    }

    private function createScript($dir) {
        $base = APATH_ADMIN_PATH . DS . 'module'. DS . $this->input->pname . DS . $this->input->sname;
        return createDir($base . DS . $dir);
    }

    public function _change() {

        $this->output->options = new stdClass();
        if ($this->input->act == "mode") {
            $pidOptions                 = getModuleOptions($this->input->mode,$parentid = null,$header = false);
            $this->output->options->pid = makeOptionsForAjaxRequest($pidOptions);
            list($parentid , $label)    = each($pidOptions);
            $this->output->options->sid = makeOptionsForAjaxRequest(getModuleOptions($this->input->mode,$parentid,$header = false));
//             pr($this->output->options->pid);
        }

        if ($this->input->act == "first") {
            $this->output->options->sid = makeOptionsForAjaxRequest(getModuleOptions($this->input->mode , $this->input->pid , $header = false));
        }

        $this->output->action = "change";
        $this->output->result  = 'success';
    }
}