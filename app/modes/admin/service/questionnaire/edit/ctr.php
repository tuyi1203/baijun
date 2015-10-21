<?php
class clsServiceQuestionnaireEditController extends clsAppController implements IAction_default , IAction_update {

    /**
     * 默认初始化页面方法
     */
    public function _default() {

        $this->init();

    }

    /**
     * 添加单页
     */
    public function _update() {

//     	    	pr($_POST);exit;

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

    	if (!$this->model->update($this->input)) {
    		$this->output->result  = 'fail';
    		$this->output->message = $this->lang->questionnaire->failupdate;
    		return;
    	}

    	$this->output->result  = 'success';
    	$this->output->message = $this->lang->questionnaire->successupdate;
    	$this->output->locate  = U('service/questionnaire');
    }

    /**
     * 页面初始化
     */
    private function init()
    {
    	$result = $this->model->get($this->input);
    	foreach ($result as $key => $v) {
			$output['id']  			        	   = $this->input->id;
			$output['title']					   = $v->title;
			$output['content']					   = $v->content;
			$output['starttime']				   = $v->starttime;
			$output['endtime']					   = $v->endtime;

			$output['question'][$v->qid]['id']	   = $v->qid;
			$output['question'][$v->qid]['title']  = $v->qtitle;
			$output['question'][$v->qid]['mutiflg']= $v->mutiflg;

			$output['question'][$v->qid]['option'][$v->oid]['id']    = $v->oid;
			$output['question'][$v->qid]['option'][$v->oid]['title'] = $v->otitle;

    	}
    	foreach ($output as $k => $v) {
    		$this->output->$k  = $v;
    	}
//     	pr($output);
        $this->output->editor         = array('id' => array('content'), 'tools' => 'noImage');
        $this->output->datepicker 	  = array('option'=>'right');
    }

}