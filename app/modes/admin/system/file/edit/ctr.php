<?php
class clsSystemFileEditController extends clsAppController
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
        $this->output->title = $file['title'];
        $this->output->id    = $file['id'];
    }

    public function _update() {

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

        $model = new clsModModel($this->mdb, 'mw_file');
        if(!$model->mw_file->update($input)) {
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

    private function getUpload($htmlTagName = 'upFile') {

        $file = false;
        $upload = new clsUpload($htmlTagName, $this->savePath);
        if (!$upload->isError()) {
            $file = $upload->getFile();
        }
        return $file;
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
}
