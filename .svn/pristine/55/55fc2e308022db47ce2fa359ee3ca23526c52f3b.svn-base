<?php
class clsLowLocalAddController extends clsAppController
            implements IAction_default , IAction_insert{

    public $savePath = null;
    public $webPath  = null;
    public $now      = 0;

    public function __construct() {
        parent::__construct();
        $this->now = time();
        $this->setSavePath(APATH_DATA_UPLOAD);
        $this->setWebPath();
    }

    public function _default() {
        $model = new clsModModel($this->mdb , 'mw_file') ;
        $this->input->objecttype = MODULES;
//         $this->output->objectid   = $this->input->objectid;
    }

    public function _insert() {

        if ($this->form->isError()) {
            $this->output->result  = 'fail';
            $this->output->message = $this->form->getError();
            return;
        }

        if (!$_FILES) {
            $this->output->result = 'fail';
            $this->output->message = $this->lang->file->requirefile;
            return;
        }
        if(!$this->checkSavePath()) {
            $this->output->result  = "fail";
            $this->output->message = $this->lang->file->errorunwritable;
            return;
        }

        $this->input->objecttype = 'local';
        $this->input->objectid   = null;
        $file = $this->getUpload('upFile');

// pr($files);exit;
        if (!empty($file['errmsg'])) {
            $this->output->result = "fail";
            $this->output->message = $file['errmsg'];
            return;
        }

        if($file) {
            //             pr($files);
            if (! $this->saveUpload($this->input->objecttype, $this->input->objectid , $file)) {
                $this->output->result  = "fail";
                $this->output->message = $this->lang->savefail;
                return;
            }
        }

        $this->output->result  = "success";
        $this->output->message = $this->lang->savesuccess;
        $this->output->locate = U("low/local");
    }

    public function getUpload($htmlTagName = 'upFile') {

        if (!$_FILES) return false;

        $file = false;
        $upload = new clsUpload($htmlTagName, $this->savePath);
        if (!$upload->isError()) {
            $file = $upload->getFile();
        }
        return $file;
    }

    /**
     * Save the files uploaded.
     *
     * @param string $objectType
     * @param string $objectID
     * @access public
     * @return boolean
     */
    public function saveUpload($objectType = null, $objectID = null, $file)
    {
        //         $fileTitles = array();

        $imageSize = array('width' => 0, 'height' => 0);

        if (!empty($file['errmsg'])) {
            continue;
        }

        if(in_array(strtolower($file['ext']), C('imageExtensions')))
        {
            //                 $this->compressImage($this->savePath . $file['pathname']);
            $imageSize = $this->getImageSize($file['realpath']);
        }

        $input = new stdClass();
        $input->title           = !empty($this->input->title) ? $this->input->title :$file['title'];
        $input->filename        = $file['name'];
        $input->filemd5name     = $file['uname'];
        $input->filepath        = $file['realpath'];
        $input->url             = date('Ym/', $this->now) . $file['uname'] . '.' . $file['ext'];
        $input->ext             = $file['ext'];
        if (!is_null($objectType)) $input->objecttype      = $objectType;
        if (!is_null($objectID))   $input->objectid        = $objectID;
        $input->mimetype        = $file['type'];
        $input->size            = $file['size'];
        $input->width           = $imageSize['width'];
        $input->height          = $imageSize['height'];
        $input->createby        = $this->session->getUid();
        $input->createtime      = date("Y-m-d H:i:s");
        $input->public          = '1';
        $input->primary         = '0';
        $input->editor          = '0';
        $model = new clsModModel($this->mdb, 'mw_file');
        $model->mw_file->insert($input);

        return true;
    }

    /**
     * Check save path is writeable.
     *
     * @access public
     * @return void
     */
    private function checkSavePath()
    {
        return is_writable($this->savePath);
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
     * Get image width and height.
     *
     * @param  string    $imagePath
     * @access public
     * @return array
     */
    private function getImageSize($imagePath)
    {
        if(!file_exists($imagePath)) return array('width' => 0, 'height' => 0);

        list($width, $height) = getimagesize($imagePath);
        return array('width' => (int)$width, 'height' => (int)$height);
    }
}
