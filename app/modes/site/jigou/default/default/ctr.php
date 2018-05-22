<?php
class clsJigouDefaultDefaultController extends clsAppController
    implements IAction_default {


    /**
     * 默认初始化页面方法
     */
    public function _default() {

    	//echo "hello world";exit;
        $this->_init();

    }

    private function _init()
    {
        $branches = $this->model->getBranches();
        if (!isset($this->input->id))
        {
            $this->input->id = $branches[0]->id;
        }
        $data = $this->model->getDetail($this->input->id);
		$this->output->detail = $data;
		$this->output->branches = $branches;
		$lawyers = $this->model->getRelationLawyer($this->input->id);
		$this->output->lawyers = $lawyers;
		//pr($lawyers);
    }

}