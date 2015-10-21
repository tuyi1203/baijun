<?php
class clsServiceQuestionnaireConfirmController extends clsAppController implements IAction_default {

    /**
     * 默认初始化页面方法
     */
    public function _default() {

        $this->init();

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
			$output['count']					   = $v->count;

			$output['question'][$v->qid]['id']	   = $v->qid;
			$output['question'][$v->qid]['title']  = $v->qtitle;
			$output['question'][$v->qid]['mutiflg']= $v->mutiflg;

			$output['question'][$v->qid]['option'][$v->oid]['id']    = $v->oid;
			$output['question'][$v->qid]['option'][$v->oid]['title'] = $v->otitle;
			$output['question'][$v->qid]['option'][$v->oid]['count'] = $v->ocount;

    	}
    	foreach ($output as $k => $v) {
    		$this->output->$k  = $v;
    	}
    }

}