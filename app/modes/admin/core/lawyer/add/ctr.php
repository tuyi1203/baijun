<?php
class clsCoreLawyerAddController extends clsAppController implements IAction_default , IAction_insert{

    /**
     * 默认初始化页面方法
     */
    public function _default() {
        $this->init();
    }

    /**
     * 添加律师
     */
    public function _insert() {
// pr($_POST);

    	//表单验证------------------------------------------------------------------
        if ($this->form->isError()) {
            $this->output->result  = 'fail';
            $this->output->message = $this->form->getError();
            return;
        }

        //图片上传检查
        $files = $this->loadController('admin.system.file.default')
        				->getUpload('files');

        if (empty($files)) {
        	$this->output->result = 'fail';
        	$this->output->message = $this->lang->file->requireimage;
        	return;
        }

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

        //插入数据----------------------------------------------------------------

        $input = new stdClass();
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
		$input->desc             = $this->input->desc;
		$input->rusheshijian     = $this->input->rusheshijian;
		$input->sort             = $this->input->sort==''?null:$this->input->sort;
		$input->yuanshi          = $this->input->yuanshi;
		$input->suozhuren        = $this->input->suozhuren;

		$ok = true;
		if ($this->model->insert($input)) {
			$insertid = $this->model->getLastInsertID();
			if(!$this->loadController('admin.system.file.default')
					->saveUpload(MODULES , $insertid , $files)) {
				$ok = false;
			}
		} else {
			$ok = false;
		}

        if($ok) {
            $this->output->result  = 'success';
            $this->output->message = $this->lang->lawyer->successinsert;
            $this->output->locate  = U('core/lawyer');
        } else {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->lawyer->failinsert;
        }
    }

    public function _getsubfieldlist()
    {
        $input = new stdClass();
        // $input->pid = $this->input->pid;
        $result = $this->model->getSubFieldList($this->input->pid);
        $this->output->result = true;
        $this->output->data = $result;

    }

    /**
     * 页面初始化
     */
    private function init() {

		$this->output->yuanshi_options    = ["1"=>"是", "0"=>"否"];
		$this->output->yuanshi_choose = '0';
		$this->output->suozhuren_options  = ["1"=>"是", "0"=>"否"];
		$this->output->suozhuren_choose = '0';
    	$this->output->branches_options   = $this->model->getBranchesList();
    	$this->output->field_options      = $this->model->getFieldList();
        $this->output->subfield_options   = $this->model->getSubFieldList(key($this->output->field_options));
    	$this->output->department_options = $this->model->getDepartmentList();
    	$this->output->position_options   = $this->model->getPositionList();
    	$this->output->worklanguage_options = $this->model->getWorklanguageList();
    	$this->output->datepicker = array("option"=>'right');
		$this->output->editor = array('id' => array('daibiaoyeji','daibiaokehu','xueshuchengguo','qita'), 'tools' => 'noImage');
    }

}