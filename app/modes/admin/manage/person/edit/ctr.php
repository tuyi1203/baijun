<?php
class clsManagePersonEditController extends clsAppController implements IAction_default , IAction_update{

    /**
     * 默认初始化页面方法
     */
    public function _default() {

        $this->init();
    }

    /**
     * 添加人员
     */
    public function _update() {
// pr($_POST);exit;

        if ($this->form->isError()) {
            $this->output->result  = 'fail';
            $this->output->message = $this->form->getError();
            return;
        }

        $model  = new clsModModel($this->mdb ,'eku_user , eku_user_info');

        $input = new stdClass();
        $input->id 			= $this->input->id;
//         $input->account     = $this->input->account;
        if (!empty($this->input->password)) {
        	$input->password    = crypt($this->input->password, C('passsalt'));
        }

        $input->lock_status = $this->input->lock;
        $input->name        = $this->input->name;
//         $input->roleid  	= $this->input->roleid;
        $input->updateby    = $this->session->getUid();
        $input->updatetime  = date("Y-m-d H:i:s");
        $input->uid			= $this->input->id;

//         $input->desc        = $this->input->desc;
//         $input->status      = $this->input->status;
//         $input->sort        = 10;

        $ok = true;
        $this->mdb->subSetAutoCommit(false);//关闭自动提交
        $this->mdb->subStartTran();

        if (!$model->eku_user->update($input)) {
            $ok = false;
        }

        if ($ok and !$model->eku_user_info->update($input)) {
        	$ok = false;
        }


        if($ok) {
            $this->mdb->subCommit();
            $this->output->result  = 'success';
            $this->output->message = $this->lang->person->successupdate;
            $this->output->locate  = U('manage/person/default/default.html');
        } else {
            $this->mdb->subRollBack();
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->person->failupdate;
        }
    }

    /**
     * 页面初始化
     */
    private function init() {
    	$input = new stdClass();
    	$input->id         = $this->input->id;
    	$input->objecttype = MODULES;
    	$input->objectid   = $this->input->id;
    	$model = new clsModModel($this->mdb, 'eku_user_info');
    	$person = $model->eku_user_info->getById($input);

//     	$person['url'] = $this->app->getWebRoot(). "/data/upload/" . $person['url'];
    	foreach ($person as $k => $v) {
    		$this->output->$k = $v;
    		if ($k == "roleid") $this->output->role_choose = $v;
//     		if ($k == "booking" and $v == "1") $this->output->action_choose[] = "booking";
//     		if ($k == "team" and $v == "1") $this->output->action_choose[] = "team";
    		if ($k == "lock_status") $this->output->lock_choose = $v;
    		if ($k == "department") $this->output->department_choose = $v;
    	}

    	$this->output->role_options   = getRoleOptions($head = false);
    	$this->output->department_options = getDepartmentOptions($head = false);
		$this->output->action_options = array('booking' => $this->lang->person->booking , 'team' => $this->lang->person->team);
        $this->output->lock_options = getYesOrNoOptions();
//         $this->output->dspflg_options = getYesOrNoOptions();//前台显示FLG
        $this->output->editor         = array('id' => array('content'), 'tools' => 'noImage');
    }

}