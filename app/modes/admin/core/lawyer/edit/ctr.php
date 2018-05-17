<?php
class clsCoreLawyerEditController extends clsAppController implements IAction_default , IAction_update{

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

        if ($this->form->isError()) {
            $this->output->result  = 'fail';
            $this->output->message = $this->form->getError();
            return;
        }

        //有上传文件时
        if($_FILES) {
        	$files = $this->loadController('admin.system.file.default')
        			      ->getUpload('files');

        	foreach ($files as $file) {

        		if (!empty($file['errmsg'])) {
        			$this->output->result = "fail";
        			$this->output->message = $file['errmsg'];
        			return;
        		}

        		if (!in_array($file['ext'] , C('imageExtensions'))) {
        			$this->output->result = "fail";
        			$this->output->message = $this->lang->file->notimage;
        			return;
        		}
        	}
        }

        $input = new stdClass();
        $input->id 				 = $this->input->id;
        $input->first_name       = $this->input->firstname;
        $input->last_name        = $this->input->lastname;
        $input->fullname         = $this->input->firstname . $this->input->lastname;
        $input->first_name_alpha = $this->input->pinyinfirst;
        $input->last_name_alpha  = $this->input->pinyinlast;
        $input->gongzuoyuyan     = implode(',', $this->input->worklanguage);
        $input->touxian          = $this->input->touxian;
        $input->jigou            = $this->input->branches;
        $input->bumen            = $this->input->department;
        $input->zhiwei           = $this->input->position;
        $input->zhuanye          = $this->input->field;
        $input->erjizhuanye      = $this->input->subfield;
        $input->zhiyelingyu      = $this->input->zhiyelingyu;
        $input->tel              = $this->input->tel;
        $input->email            = $this->input->email;
        $input->daibiaoyeji      = $this->input->daibiaoyeji;
        $input->daibiaokehu      = $this->input->daibiaokehu;
        $input->xueshuchengguo   = $this->input->xueshuchengguo;
        $input->qita             = $this->input->qita;
        $input->zhuanyezige      = $this->input->zhuanyezige;
        $input->zhiyelinian      = $this->input->zhiyelinian;
        $input->rusheshijian     = $this->input->rusheshijian;
        $input->desc             = $this->input->desc;
        $input->sort             = $this->input->sort==''?null:$this->input->sort;
        $input->yuanshi          = $this->input->yuanshi;
        $input->suozhuren        = $this->input->suozhuren;
//pr($input->sort);
        $ok = true;
        if (!$this->model->update($input)) {
        	$ok = false;
        } else {
        	if($_FILES) {
        		if(!$this->loadController('admin.system.file.edit')
        			->replaceFiles($this->input->fileids , $files))
        				$ok = false;
        	}
        }


        if($ok) {
            $this->output->result  = 'success';
            $this->output->message = $this->lang->lawyer->successupdate;
            $this->output->locate  = U('core/lawyer');
        } else {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->lawyer->failupdate;
        }
    }

    /**
     * 页面初始化
     */
    private function init() {
    	//取得律师数据
		$lawyer = $this->model->get($this->input->id);
		foreach ($lawyer as $key => $value) {
			$this->output->$key = $value ;
			if ($key == 'url')   		$this->output->url = UPLOAD_URL . $value;
			if ($key == 'jigou') 		$this->output->branches_choose = $value;
			if ($key == 'zhuanye')      $this->output->field_choose = $value;
            if ($key == 'erjizhuanye')  $this->output->subfield_choose = $value;
			if ($key == 'zhiwei') 		$this->output->position_choose = $value;
			if ($key == 'gongzuoyuyan') $this->output->worklanguage_choose = explode(',', $value);
			if ($key == 'bumen') 		$this->output->department_choose = $value;
            if ($key == 'yuanshi')      $this->output->yuanshi_choose = $value;
            if ($key == 'suozhuren')    $this->output->suozhuren_choose = $value;
		}

        $this->output->yuanshi_options    = ["1"=>"是", "0"=>"否"];
        $this->output->suozhuren_options  = ["1"=>"是", "0"=>"否"];
    	$this->output->branches_options   = $this->model->getBranchesList();
    	$this->output->field_options      = $this->model->getFieldList();
        $this->output->subfield_options   = $this->model->getSubFieldList($this->output->field_choose);
    	$this->output->department_options = $this->model->getDepartmentList();
    	$this->output->position_options   = $this->model->getPositionList();
    	$this->output->worklanguage_options = $this->model->getWorklanguageList();
    	$this->output->datepicker = array("option"=>'right');
        $this->output->editor = array('id' => array('daibiaoyeji','daibiaokehu','xueshuchengguo','qita'), 'tools' => 'noImage');
    }

}