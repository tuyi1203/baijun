<?php
class clsInteractiveHousesubmitDetailController extends clsAppController implements IAction_insert{

    /**
     * 默认初始化页面方法
     */
    public function _default() {

        $this->init();
    }

    public function _insert() {
    	$model = new clsModModel($this->mdb , "yjm_housesubmit");
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

//     	    if (!in_array($file['ext'] , config::$imageExtensions)) {
//     	        $this->output->result = "fail";
//     	        $this->output->message = $this->lang->file->notimage;
//     	        return;
//     	    }
    	}

    	$input = new stdClass();
        $input->name        = $this->input->name;
        $input->tel	        = $this->input->tel;
        $input->qq          = $this->input->qq;
        $input->addr        = $this->input->addr;
        $input->content     = $this->input->content;
        $input->createtime  = date("Y-m-d H:i:s");
        $input->public      = "0";

        $ok = true;
        $this->mdb->subSetAutoCommit(false);//关闭自动提交
        $this->mdb->subStartTran();

        $model  = new clsModModel($this->mdb ,'yjm_housesubmit');
        if (!$model->yjm_housesubmit->insert($input)) {
            $ok = false;
        }

        $insertid = $model->yjm_housesubmit->lastInsertID();

        if($ok) {
            if(!$this->loadController('admin.system.file.default')
                    ->saveUpload($this->app->getModuleS() , $insertid , $files)) {
                $ok = false;
            }
        }

        if($ok) {
            $this->mdb->subCommit();
            $this->output->result  = 'success';
            $this->output->message = $this->lang->housesubmit->successinsert;
            $this->output->locate  = 'interactive_housesubmit-detail-default.html';
        } else {
            $this->mdb->subRollBack();
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->housesubmit->failinsert;
        }
    }

    private function init() {
        if(isset($this->input->name)) $this->output->name = $this->input->name;
        if(isset($this->input->tel))  $this->output->tel  = $this->input->tel;
        if(isset($this->input->addr)) $this->output->addr = $this->input->addr;
        getTopNews();
        getTeamList();
        getClassiCase();
    }

}