<?php
class clsGroupPersonAddController extends clsAppController implements IAction_default , IAction_insert{

    /**
     * 默认初始化页面方法
     */
    public function _default() {

        $this->init();
    }

    /**
     * 添加人员
     */
    public function _insert() {

        if ($this->form->isError()) {
            $this->output->result  = 'fail';
            $this->output->message = $this->form->getError();
            return;
        }

        $files = $this->loadController('admin.system.file.default')
                     ->getUpload('files');

        if (empty($files)) {
            $this->output->result = 'fail';
            $this->output->message = $this->lang->file->requireimage;
            return;
        }

        foreach ($files as $file) {

            if (!empty($file['errmsg'])) {
                $this->output->result = "fail";
                $this->output->message = $file['errmsg'];
                return;
            }

            if (!in_array($file['ext'] , config::$imageExtensions)) {
                $this->output->result = "fail";
                $this->output->message = $this->lang->file->notimage;
                return;
            }
        }



        $input = new stdClass();
        $input->name        = $this->input->name;
        $input->school      = $this->input->school;
        $input->production  = $this->input->production;
        $input->style       = $this->input->style;
        $input->ideal       = $this->input->ideal;
        $input->resume      = $this->input->resume;
        $input->level       = $this->input->level;
        $input->team        = $this->input->team;
        $input->hot         = $this->input->hot;
        $input->homepage    = $this->input->homepage;
        if (isset($this->input->sort)) $input->sort = $this->input->sort;
        else $input->sort        = 10;

        $ok = true;
        $this->mdb->subSetAutoCommit(false);//关闭自动提交
        $this->mdb->subStartTran();

        $model  = new clsModModel($this->mdb ,'yjm_person,mw_relation');
        if (!$model->yjm_person->insert($input)) {
            $ok = false;
        }

        $insertid = $model->yjm_person->lastInsertID();

        if($ok) {
            if(!$this->loadController('admin.system.file.default')
                    ->saveUpload($this->app->getModuleS() , $insertid , $files)) {
                $ok = false;
            }
        }

        //插入擅长风格
        if (isset($this->input->goodat)) {
            foreach ($this->input->goodat as $goodat) {
                $input = new stdClass();
                $input->objecttype = 'goodat';
                $input->objectid   = $insertid;
                $input->category   = $goodat;
                if($ok and !$model->mw_relation->insert($input)) $ok = false;
            }
        }

        if($ok) {
            $this->mdb->subCommit();
            $this->output->result  = 'success';
            $this->output->message = $this->lang->person->successinsert;
            $this->output->locate  = 'group_person-default-default.html';
        } else {
            $this->mdb->subRollBack();
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->person->failinsert;
        }

    }

    /**
     * 页面初始化
     */
    private function init() {
    	$this->output->level_options = getCategoryOptions('level');
    	$this->output->team_options = getCategoryOptions('team');
    	$this->output->goodat_options = getCategoryOptions('style');
    	$this->output->homepage_options = getYesOrNoOptions();
    	$this->output->homepage_choose  = '0';
    }

}