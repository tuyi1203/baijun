<?php
class clsHumanityCasesEditController extends clsAppController implements IAction_default , IAction_update {

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

        if ($this->form->isError()) {
            $this->output->result  = 'fail';
            $this->output->message = $this->form->getError();
            return;
        }

        $input = new stdClass();
        $input->id          = $this->input->id;
        $input->label       = $this->input->label;
        $input->labelid     = $this->input->labelid;
        $input->title       = $this->input->title;
        $input->keyword     = $this->input->keyword;
        $input->summary     = $this->input->summary;
        $input->content     = $this->input->content;
        $input->updateby    = $this->session->getUid();
        $input->updatetime  = date("Y-m-d H:i:s");
        $input->publishtime = !isset($this->input->publishtime)?date("Y-m-d H:i:s") : $this->input->publishtime;
//         $input->publishtime = $this->input->publishtime == "0000-00-00 00:00:00" ? date("Y-m-d H:i:s") : $this->input->publishtime;
        $input->status      = $this->input->status;
        $input->public      = "0";
        $input->authorflg   = $this->input->authorflg;
        if ($this->input->authorflg == '0') {
        	$input->authorname = $this->input->authorname;
        	$input->authorid   = -1;
        } else {
        	$input->authorname = '';
        	$input->authorid   = $this->input->authorid;
        }
        if (isset($this->input->lawyer)) $input->lawyer      = implode(',', $this->input->lawyer);

        $model  = new clsModModel($this->mdb ,'mw_world');
        if (!$model->mw_world->update($input)) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->list->failupdate;
            return;
        }

        if(!$this->loadController('admin.system.file.default')
                 ->updateObjectID($this->input->uid, $this->input->id, 'cases')) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->cases->failupdate;
            return;
        }

        $this->output->result  = 'success';
        $this->output->message = $this->lang->cases->successupdate;
        $this->output->locate  = U('humanity/cases/default/default.html');

    }

    /**
     * 页面初始化
     */
    private function init() {
        $model = new clsModModel($this->mdb , 'mw_world');
//         $output = $model->mw_world->get($this->input);
		$output = $this->model->get($this->input->id);
        foreach ($output as $k => $v) {
            $this->output->$k = $v;
            if ($k == "status") $this->output->status_choose = $v;
            if ($k == "authorflg") $this->output->author_choose = $v;
        }

        if ($this->output->authorflg == '1') {
        	$this->output->lawyerauthorname = $this->model->getAuthorName($this->output->authorid);
//         	pr($this->output->authorname);
        }

//      取得律师信息
		if (!empty($this->output->lawyer)) $this->output->lawyers = $this->model->getLawyerList($this->output->lawyer);
        $this->output->status_options = getActicleStatusOptions();
        $this->output->author_options = getAuthorOptions();
        $this->output->editor         = array('id' => array('content'), 'tools' => 'full');
        $this->output->datepicker     = array("option"=>'right');

    }



}