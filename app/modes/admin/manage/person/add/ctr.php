<?php
class clsManagePersonAddController extends clsAppController implements IAction_default , IAction_insert{

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
// pr($_POST);

        if ($this->form->isError()) {
            $this->output->result  = 'fail';
            $this->output->message = $this->form->getError();
            return;
        }

        $model  = new clsModModel($this->mdb ,'eku_user , eku_user_info');

        //用户名唯一性检查
        if ($model->eku_user->fncNotExistsUserCheck($this->input->account)) {
        	$this->output->result  = 'fail';
        	$this->output->message = array('account' => sprintf($this->lang->error->unique , $this->lang->person->account));
        	return;
        }

        $input = new stdClass();
        $input->account     = $this->input->account;
        $input->password    = crypt($this->input->password, C('passsalt'));
        $input->name        = $this->input->name;
        $input->roleid  	= $this->input->role;
        $input->createby    = $this->session->getUid();
        $input->createtime  = date("Y-m-d H:i:s");

//         $input->desc        = $this->input->desc;
//         $input->status      = $this->input->status;
//         $input->sort        = 10;


        $ok = true;
        $this->mdb->subSetAutoCommit(false);//关闭自动提交
        $this->mdb->subStartTran();

        if (!$model->eku_user->insert($input)) {
            $ok = false;
        }

        $insertid = $model->eku_user->lastInsertID();
        $input->uid = $insertid;

        if ($ok and !$model->eku_user_info->insert($input)) {
        	$ok = false;
        }

//                 ->updateObjectID($this->input->uid, $insertid, 'team')) {
//             $ok = false;
//         }

        if($ok) {
            $this->mdb->subCommit();
            $this->output->result  = 'success';
            $this->output->message = $this->lang->person->successinsert;
            $this->output->locate  = U('manage/person');
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
    	$this->output->role_options   = getRoleOptions($head = false);
    	$this->output->role_choose 	  = "2";//网站管理员
// 		$this->output->action_options = array('booking' => $this->lang->person->booking , 'team' => $this->lang->person->team);
        $this->output->status_options = getYesOrNoOptions();
//         $this->output->dspflg_options = getYesOrNoOptions();//前台显示FLG
        $this->output->department_options = getDepartmentOptions($head = false);
//         $this->output->editor         = array('id' => array('content'), 'tools' => 'noImage');
    }

}