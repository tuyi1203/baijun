<?php
class clsManageBranchesEditController extends clsAppController implements IAction_default , IAction_update{

	public $savePath = null;
	public $webPath  = null;
	public $now      = 0;

	public function __construct() {
		parent::__construct();
		$this->now = time();
		$this->setSavePath(APATH_DATA_UPLOAD);
		$this->setWebPath();
	}

    /**
     * 默认初始化页面方法
     */
    public function _default() {

        $record = $this->model->get($this->input->id);
        $this->output->id            = $record->id;
        $this->output->name          = $record->name;
        $this->output->keyword       = $record->keyword;
        $this->output->summary       = $record->summary;
        $this->output->desc          = $record->desc;
        $this->output->contact       = $record->contact;
        $this->output->img           = $record->img;
        $this->output->editor        = array('id' => array('desc','contact'), 'tools' => 'full');

    }

    /**
     * 更新
     */
    public function _update() {

        if ($this->form->isError()) {
            $this->output->result  = 'fail';
            $this->output->message = $this->form->getError();
            return;
        }

        $input = new stdClass();
        $input->id          = $this->input->id;
        $input->name        = $this->input->name;
        $input->desc        = $this->input->desc;
        $input->keyword     = $this->input->keyword;
        $input->summary     = $this->input->summary;
        $input->contact     = $this->input->contact;

        $file = $this->getUpload('img');
        if ($file) {
        	$input->img     = date('Ym/', $this->now) . $file[0]['uname'] . '.' . $file[0]['ext'];
        }


        if (!$this->model->update($input)) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->branches->failupdate;
            return;
        }

        $this->output->result  = 'success';
        $this->output->message = $this->lang->branches->successupdate;
        $this->output->locate  = U('manage/branches');

    }

    /**
     * get uploaded files.
     *
     * @param string $htmlTagName
     * @access public
     * @return void
     */
    public function getUpload($htmlTagName = 'files')
    {
    	$files = array();
    	if(!isset($_FILES[$htmlTagName])) return $files;
    	/* The tag if an array. */
    	if(is_array($_FILES[$htmlTagName]['name']))
    	{
    		//             extract($_FILES[$htmlTagName]);
    		foreach($_FILES[$htmlTagName]['name'] as $id => $filename)
    		{
    			$upload = new clsUpload($htmlTagName, $this->savePath , $id);
    			if (!$upload->isError())
    			{
    				$file = $upload->getFile();
    				if (!empty($this->input->filetitles[$id]))
    					$file['title'] = htmlspecialchars($this->input->filetitles[$id]);
    			} else {
    				$file['errmsg'] = $upload->getError();
    			}

    			$files[] = $file;
    		}
    	}
    	else
    	{
    		$upload = new clsUpload($htmlTagName, $this->savePath);
    		if (!$upload->isError()) {
    			$file = $upload->getFile();
    			if (!empty($this->input->filetitles[0]))
    				$file['title'] = htmlspecialchars($this->input->filetitles[0]);
    		}else {
    			$file['errmsg'] = $upload->getError();
    		}
    		return array($file);
    	}
    	return $files;
    }

    /**
     * Set the save path.
     *
     * @access private
     * @return void
     */
    private function setSavePath($pathsetting)
    {
    	$savePath = $pathsetting . DS  . date('Ym', $this->now);
    	if(!file_exists($savePath)) @mkdir($savePath, 0777, true);
    	$this->savePath = $savePath;
    }

    /**
     * Set the web path.
     *
     * @access private
     * @return void
     */
    private function setWebPath()
    {
    	$this->webPath = UPLOAD_URL;
    }

}