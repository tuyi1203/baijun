<?php
class clsSystemTopimageEditController extends clsAppController
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
        $model = new clsModModel($this->mdb , 'mw_topimage') ;
        $file = $model->mw_topimage->getByObject($this->input);
        if (count($file) > 0) {
            $this->output->title = $file['title'];
//             $this->output->url   = $this->app->getWebRoot(). "/data/upload/" . $file['url'];
            $this->output->url   = UPLOAD_URL . $file['url'];
            $this->output->id    = $file['id'];
        }
        $this->output->objecttype = $this->input->objecttype;
        $this->output->objectid   = $this->input->objectid;
        if (isset($this->input->filesize)) {
             $this->output->size  = $this->input->filesize;
        }
    }

    public function insert() {

        if (!$_FILES) {
            $this->output->result = 'fail';
            $this->output->message = $this->lang->file->requireimage;
            return;
        }
        if(!$this->checkSavePath()) {
            $this->output->result  = "fail";
            $this->output->message = $this->lang->file->errorunwritable;
            return;
        }

        $file = $this->getUpload('upFile');
// pr($files);exit;
        if (!empty($file['errmsg'])) {
            $this->output->result = "fail";
            $this->output->message = $file['errmsg'];
            return;
        }

        if (!in_array(strtolower($file['ext']) , C('imageExtensions'))) {
            $this->output->result = "fail";
            $this->output->message = $this->lang->file->notimage;
            return;
        }

        if($file) {
            //             pr($files);
            if (! $this->saveUpload($this->input->objecttype, $this->input->objectid , $file)) {
                $this->output->result  = "fail";
                $this->output->message = $this->lang->savefail;
            }
        }

        $this->output->result  = "success";
        $this->output->message = $this->lang->savesuccess;
    }



    public function _update() {

        if(empty($this->input->id)) {
            return $this->insert();
        }

        $input = new stdClass();

        $input->id          = $this->input->id;
        $input->title       = htmlspecialchars($this->input->title);

        if ($_FILES) {

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

            if (!in_array(strtolower($file['ext']) , C('imageextensions'))) {
                $this->output->result = "fail";
                $this->output->message = $this->lang->file->notimage;
                return;
            }

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
                $input->width           = $file['width'];
                $input->height          = $file['height'];
                $input->updateby        = $this->session->getUid();
                $input->updatetime      = date("Y-m-d H:i:s");
            }
        }

        $model = new clsModModel($this->mdb, 'mw_topimage');
        if(!$model->mw_topimage->update($input)) {
            $this->output->result  = "fail";
            $this->output->message = $this->lang->savefail;
            return;
        }

        $this->output->result  = "success";
        $this->output->message = $this->lang->savesuccess;
    }

    public function replaceFiles($fileids = array() , $files = array()) {

        $allOK = true;
        foreach ($files as $id => $file) {

            $input = new stdClass();
            $input->id = $fileids[$id];

            $model = new clsModModel($this->mdb, 'mw_topimage');

            $oldfile = $model->mw_topimage->getByID($input);

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

            if(!$model->mw_topimage->update($input)) {
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

        if(!($upload->fncCheckFileSize(C('UPLOADFILEMAXSIZE')))) {
            $file['errmsg'] = $this->lang->file->errorovermaxsize;
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
        $model = new clsModModel($this->mdb, 'mw_topimage');
        $model->mw_topimage->insert($input);

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
//         $this->webPath = $this->app->getWebRoot(). "/data/upload/";
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
