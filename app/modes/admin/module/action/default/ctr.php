<?php
class clsModuleActionDefaultController extends clsAppController
implements IAction_default , IAction_delete{

    /**
     * 默认初始化页面方法
     */
    public function _default() {

        $this->init();
    }

    public function _delete() {

        $model = new clsModModel($this->mdb , array('eku_action','eku_role_action'));
        $ok = true;

        $this->mdb->subSetAutoCommit(false);//关闭自动提交
        $this->mdb->subStartTran();

        //删除动作
        if (!$model->eku_action->delete($this->input)) $ok = false;

        //删除权限
        if ($ok) {
            $actions[] = $this->input->id;
            //删除
            if (!$model->eku_role_action->deleteInAID($actions)) $ok = false;
        }

        if ($ok) {
            $this->mdb->subCommit();
            $this->output->result  = 'success';
        }
        else {
            $this->mdb->subRollBack();
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->action->faildelete;
        }

        $this->mdb->subSetAutoCommit(true);//打开自动提交

        //系统更新
        updateSystem();
    }


    private function init() {

    }

}