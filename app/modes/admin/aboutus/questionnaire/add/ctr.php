<?php
class clsServiceQuestionnaireAddController extends clsAppController implements IAction_default , IAction_insert{

    /**
     * 默认初始化页面方法
     */
    public function _default() {

        $this->init();

    }

    /**
     * 添加单页
     */
    public function _insert() {

//     	pr($_POST);exit;

        if ($this->form->isError()) {
            $this->output->result  = 'fail';
            $this->output->message = $this->form->getError();
            return;
        }

        //问题判断
        $error = array();
        foreach ($this->input->question as $key=> $value) {
        	if ($value == "") {
				$error['question_'.$key] = $this->lang->questionnaire->questionnotitle;
        	}
        }

        //选项判断
        foreach ($this->input->option as $qid => $value) {
        	foreach ($value as $oid => $v) {
        		if ($v == "") {
        			$error['option_'.$qid.'_'.$oid] = $this->lang->questionnaire->optionnotitle;
        		}
        	}
        }

        if (!empty($error))  {
        	$this->output->result  = 'fail';
        	$this->output->message = $error;
        	return;
        }

        if (!$this->model->insert($this->input)) {
        	$this->output->result  = 'fail';
        	$this->output->message = $this->lang->questionnaire->failinsert;
        	return;
        }

        $this->output->result  = 'success';
        $this->output->message = $this->lang->questionnaire->successinsert;
        $this->output->locate  = U('service/questionnaire');

    }

    /**
     * 页面初始化
     */
    private function init() {
        $this->output->status_options = getActicleStatusOptions();
        $this->output->status_choose  = '1';
        $this->output->editor = array('id' => array('content'), 'tools' => 'noImage');
        $this->output->datepicker = array('option'=>'right');
    }

}