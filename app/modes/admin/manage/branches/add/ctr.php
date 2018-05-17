<?php
class clsManageBranchesAddController extends clsAppController implements IAction_default , IAction_insert{

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
        $this->init();
    }

    /**
     * 添加单页
     */
    public function _insert() {

        if ($this->form->isError()) {
            $this->output->result  = 'fail';
            $this->output->message = $this->form->getError();
            return;
        }

        $file = $this->getUpload('img');

        if (!$file) {
        	$this->output->result  = 'fail';
        	$this->output->message = $this->lang->file->requireimage;
        	return;
        }

        $input = new stdClass();
        $input->name        = $this->input->name;
        $input->desc        = $this->input->desc;
        $input->summary     = $this->input->summary;
        $input->keyword     = $this->input->keyword;
        $input->contact     = $this->input->contact;
        $input->img         = date('Ym/', $this->now) . $file[0]['uname'] . '.' . $file[0]['ext'];


        if (!$this->model->insert($input)) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->branches->failinsert;
            return;
        }

        $this->output->result  = 'success';
        $this->output->message = $this->lang->branches->successinsert;
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

    private function init() {
    	$this->output->editor         = array('id' => array('desc','contact'), 'tools' => 'full');
    }

}