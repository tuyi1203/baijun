<?php
class clsLowCountryEditController extends clsAppController
            implements IAction_default , IAction_update{

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
        $file = $model->mw_file->getByID($this->input);
        if (count($file) > 0) {
            $this->output->title      = $file['title'];
            $this->output->url        = UPLOAD_URL . $file['url'];
            $this->output->id         = $file['id'];
            $this->output->objecttype = $file['objecttype'];
        }

//         $this->output->objectid   = $this->input->objectid;
    }

    public function _update() {//单个文件更新

        $input = new stdClass();

        $input->id          = $this->input->id;
        $input->title       = htmlspecialchars($this->input->title);

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

        $file = $this->getUpload('upFile');

        if (!empty($file['errmsg'])) {
            $this->output->result = "fail";
            $this->output->message = $file['errmsg'];
            return;
        }

        //如果是图片，计算尺寸
        $imageSize = array('width' => 0, 'height' => 0);
        if(in_array(strtolower($file['ext']), C('imageExtensions')))
        {
            //                 $this->compressImage($this->savePath . $file['pathname']);
            $imageSize = $this->getImageSize($file['realpath']);
        }

        //取得旧文件数据
        $model = new clsModModel($this->mdb, 'mw_file');
        $oldfile = $model->mw_file->getByID($input);

        if($file) {

            if (empty($this->input->title)) {
                $input->title       = $file['title'];
            }

            $input->filename        = $file['name'];
            $input->filemd5name     = $file['uname'];
            $input->filepath        = $file['realpath'];
            $input->url             = date('Ym/', $this->now) . $file['uname'] . '.' . $file['ext'];
            $input->ext             = $file['ext'];
            $input->mimetype        = $file['type'];
            $input->size            = $file['size'];
            $input->width           = $imageSize['width'];
            $input->height          = $imageSize['height'];
            $input->updateby        = $this->session->getUid();
            $input->updatetime      = date("Y-m-d H:i:s");
        }

        //更新为新文件
        if(!$model->mw_file->update($input)) {
            $this->output->result  = "fail";
            $this->output->message = $this->lang->savefail;
            return;
        }

        //删除旧文件
        $oldfilepath = $oldfile['filepath'];
        if (file_exists($oldfilepath)) unlink($oldfilepath);

        $this->output->result  = "success";
        $this->output->message = $this->lang->savesuccess;
        $this->output->locate  = U('low/country');
    }

    public function replaceFiles($fileids = array() , $files = array()) {

        $allOK = true;
        foreach ($files as $id => $file) {

            $input = new stdClass();
            $input->id = $fileids[$id];

            $model = new clsModModel($this->mdb, 'mw_file');

            $oldfile = $model->mw_file->getByID($input);

            //删除旧文件
            $oldfilepath = $oldfile['filepath'];
            if (file_exists($oldfilepath)) unlink($oldfilepath);

            //更新为新文件数据
            $input->title           = $file['title'];
            $input->filename        = $file['name'];
            $input->filemd5name     = $file['uname'];
            $input->filepath        = $file['realpath'];
            $input->url             = date('Ym/', $this->now) . $file['uname'] . '.' . $file['ext'];
            $input->ext             = $file['ext'];
            $input->mimetype        = $file['type'];
            $input->size            = $file['size'];
            $input->width           = $file['width'];
            $input->height          = $file['height'];
            $input->updateby        = $this->session->getUid();
            $input->updatetime      = date("Y-m-d H:i:s");

            if(!$model->mw_file->update($input)) {
                $allOK = false;
            }

        }

        return $allOK;
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
    public function saveUpload($objectType = '', $objectID = '', $file)
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
        $input->objecttype      = $objectType;
        $input->objectid        = $objectID;
        $input->mimetype        = $file['type'];
        $input->size            = $file['size'];
        $input->width           = $imageSize['width'];
        $input->height          = $imageSize['height'];
        $input->createby        = $this->session->getUid();
        $input->createtime      = date("Y-m-d H:i:s");
        //             $input->public          = '1';
        //             $input->primary         = '0';
        //             $input->editor          = '0';
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
