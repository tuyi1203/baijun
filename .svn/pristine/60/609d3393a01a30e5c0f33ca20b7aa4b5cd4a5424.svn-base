<?php
class clsServiceQuestionnaireDetailController extends clsAppController implements IAction_default , IAction_insert {

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

//     	pr($this->input);exit;

//     	if ($this->form->isError()) {
//     		$this->output->result  = 'fail';
//     		$this->output->message = $this->form->getError();
//     		return;
//     	}
    	if (!$this->model->update($this->input)) {
    		$this->output->result  = 'fail';
    		$this->output->message = $this->lang->questionnaire->failinsert;
    		return;
    	}

    	$this->output->result  = 'success';
    	$this->output->message = $this->lang->questionnaire->successinsert;
//     	$this->output->locate  = U('service/questionnaire');
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
    		if ($k == "content") {
    			$this->output->nofilter->$k = $v;
    		}
    	}
//     	pr($output);
        $this->output->editor         = array('id' => array('content'), 'tools' => 'noImage');
        $this->output->datepicker 	  = array('option'=>'right');
    }

}