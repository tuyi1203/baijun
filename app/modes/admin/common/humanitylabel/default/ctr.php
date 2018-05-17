<?php
class clsCommonHumanitylabelSelectController extends clsAppController
            implements IAction_default , IAction_list{

    //初始化
    public function _default()
    {
		$this->output->list = $this->model->getLabelList($this->input->fieldid);
		$this->output->fieldid = $this->input->fieldid;
    }

    //插入标签
	public function _insert()
	{
		$this->model->addLabel($this->input);
		$this->output->result  = "success";
		return;
	}

    public function _list()
    {
//     	$this->output->list = $this->model->getlabelList($this->input->name);
//     	$this->output->labelname = $this->input->name;
    }

    public function _delete() {

        if (!$this->model->deleteLabel($this->input->id)) {
            $this->output->result  = "fail";
            $this->output->message = $this->lang->deletefail;
            return;
        }
        $this->output->result = "success";
    }

}
