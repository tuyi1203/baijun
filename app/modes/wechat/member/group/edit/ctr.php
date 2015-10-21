<?php
class clsMemberGroupEditController extends clsAppController
            implements IAction_default , IAction_insert{

    public function _default()
    {
    	$list = $this->model->getList($this->input);
    	$this->output->list = obj2array($list);
    	$this->output->selectedgroupid = $this->input->groupid;
    }

    public function _update()
    {
    	if ($this->form->isError()) {
    		$this->output->result  = 'fail';
    		$errmsg = $this->form->getError();
    		$this->output->message = strip_tags($errmsg['title']);
    		return;
    	}

    	//同名分类检查
    	if (!$this->model->unique($this->input)) {
    		$this->output->result  = 'fail';
    		$this->output->message = $this->lang->group->error->notunique;
    		return;
    	}

    	if (!$this->model->update($this->input)) {
    		$this->output->result  = 'fail';
    		$this->output->message = $this->lang->group->failupdate;
    		return;
    	}

    	$this->output->result = "success";
    }

    public function _insert()
    {
    	if ($this->form->isError()) {
    		$this->output->result  = 'fail';
    		$errmsg = $this->form->getError();
    		$this->output->message = strip_tags($errmsg['title']);
    		return;
    	}

    	//同名分类检查
    	if (!$this->model->unique($this->input)) {
    		$this->output->result  = 'fail';
    		$this->output->message = $this->lang->group->error->notunique;
    		return;
    	}

    	if (!$this->model->insert($this->input)) {
    		$this->output->result  = 'fail';
    		$this->output->message = $this->lang->group->failinsert;
    		return;
    	}

    	$this->output->result  = 'success';
    	$this->output->message = $this->lang->group->successinsert;
    }

    public function _delete()
    {

        if (!$this->model->delete($this->input->id)) {
            $this->output->result  = "fail";
            $this->output->message = $this->lang->deletefail;
            return;
        }

        $this->output->result = "success";
    }

}