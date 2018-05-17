<?php
class clsSystemFileDefaultController extends clsAppController
            implements IAction_default , IAction_delete , IAction_download , IAction_upload{

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
//pr($_SESSION);
        $model = new clsModModel($this->mdb , 'mw_file') ;
        $input = new stdClass();
        $input->objectid    = $this->input->objectid;
        $input->objecttype  = $this->input->objecttype;
        $list = $model->mw_file->getList($input);
//pr($list);
        foreach ($list as $key => $value) {
            if(in_array(strtolower($value['ext']) , C('IMAGEEXTENSIONS'))) $list[$key]['isimage'] = '1';
            $list[$key]['url'] = $this->webPath . $value['url'];
        }

        $this->output->writeable = $this->checkSavePath();
        $this->output->list      = $list;
        $this->output->objectid  = $this->input->objectid;
        $this->output->objecttype= $this->input->objecttype;
        if (isset($this->input->filesize)) {
            $this->output->filesize = $this->input->filesize;
        }
         if (isset($this->input->bannersize)) {
            $this->output->bannersize = $this->input->bannersize;
        }
    }

    public function _upload() {

        if(!$this->checkSavePath()) {
            $this->output->result  = "fail";
            $this->output->message = $this->lang->file->errorunwritable;
            return;
        }

        $files = $this->getUpload('files');

        if($files) {
//             pr($files);
            if (! $this->saveUpload($this->input->objecttype, $this->input->objectid , $files)) {
                $this->output->result  = "fail";
                $this->output->message = $this->lang->savefail;
            }
        }

        $this->output->result  = "success";
        $this->output->message = $this->lang->savesuccess;
    }

    /**
     * Download a file.
     *
     * @param  int    $fileID
     * @param  string $mouse
     * @access public
     * @return void
     */
    public function _download()
    {

        $model = new clsModModel($this->mdb , 'mw_file');
        $file = $model->mw_file->getById($this->input);


        /* Down the file. */
        if(file_exists($file['filepath']))
        {
            $fileName = $file['filename'] . '.' . $file['ext'];
            $fileData = file_get_contents($file['filepath']);
            $this->sendDownHeader($fileName, $file['ext'], $fileData, filesize($file['filepath']));
        }
        else
        {
            //TODO 找不到文件时的对应操作
//             $this->app->triggerError("The file you visit $fileID not found.", __FILE__, __LINE__, true);
        }
    }

    public function _delete() {

        if (!$this->deleteFile($this->input->id)) {
            $this->output->result  = "fail";
            $this->output->message = $this->lang->deletefail;
            return;
        }

        $this->output->result = "success";
    }

    public function deleteFile($id) {

        $input = new stdClass();
        $input->id = $id;
        $model = new clsModModel($this->mdb, 'mw_file');
        $file = $model->mw_file->getByID($input);

        if(file_exists($file['filepath'])) unlink($file['filepath']);

        if(!$model->mw_file->delete($input)) return false;
        return true;

    }

    public function _primary() {
        $model = new clsModModel($this->mdb , 'mw_file') ;


        $this->output->result  = 'success';
        $this->output->message = $this->lang->setsuccess;

        $input = new stdClass();
        $input->objecttype = $this->input->objecttype;
        $input->objectid   = $this->input->objectid;
        $input->primary    = '0';
        if(!$model->mw_file->setPrimary($input)) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->setfail;
            return;
        }

        $input = new stdClass();
        $input->id         = $this->input->id;
        $input->primary    = '1';

        if(!$model->mw_file->setPrimary($input)) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->setfail;
        }

    }

    public function _banner() {
        $model = new clsModModel($this->mdb , 'mw_file') ;
        $this->output->result  = 'success';
        $this->output->message = $this->lang->setsuccess;

        $input = new stdClass();
        $input->objecttype = $this->input->objecttype;
        $input->objectid   = $this->input->objectid;
        $input->banner    = '0';
        if(!$model->mw_file->setBanner($input)) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->setfail;
            return;
        }

        $input = new stdClass();
        $input->id         = $this->input->id;
        $input->banner    = '1';

        if(!$model->mw_file->setBanner($input)) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->setfail;
        }

    }

    /**
     * Send the download header to the client.
     *
     * @param  string    $fileName
     * @param  string    $extension
     * @access public
     * @return void
     */
    public function sendDownHeader($fileName, $fileType, $content, $fileSize = 0)
    {
        /* Set the downloading cookie, thus the export form page can use it to judge whether to close the window or not. */
        setcookie('downloading', 1);

        /* Append the extension name auto. */
        $extension = '.' . $fileType;
        if(strpos($fileName, $extension) === false) $fileName .= $extension;

        /* urlencode the filename for ie. */
        if(strpos($this->server->http_user_agent, 'MSIE') !== false) $fileName = urlencode($fileName);

        /* Judge the content type. */
        $mimes = array
        (
                "txt"         =>'text/plain',
                'jpg'         =>'image/jpeg',
                'gif'         =>'image/gif',
                'xls'         =>'application/vnd.ms-excel',
                'xlsx'        =>'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                'doc'         =>'application/msword',
                'docx'        =>'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                'pdf'         =>'application/pdf',
                'pptx'        =>'application/vnd.openxmlformats-officedocument.presentationml.presentation',
                "default"     =>'application/octet-stream'

        );
        $contentType = isset($mimes[strtolower($fileType)]) ? $mimes[strtolower($fileType)] : $mimes['default'];
        header("Content-type: $contentType");
        header("Content-Disposition: attachment; filename=\"$fileName\"");
        header("Content-length: {$fileSize}");
        header("Pragma: no-cache");
        header("Expires: 0");
        die($content);
    }

    /**
     * AJAX: the api to recive the file posted through ajax.
     * AJAX单个文件上传
     * @param  string $uid
     * @access public
     * @return array
     */
    public function _ajaxupload()
    {
        $filePostName = 'imgFile';
        $file = $this->getUpload($filePostName);
        $file = $file[0];//ajax模式上传时，单次只有一个上传文件，取得第一个
//         pr($file);
        if(!isset($file['errmsg'])) {

            $input = new stdClass();
            $input->title           = $file['title'];
            $input->desc            = empty($this->input->desc)?'':$this->input->desc;
            $input->filename        = $file['name'];
            $input->filemd5name     = $file['uname'];
            $input->filepath        = $file['realpath'];
            $input->url             = date('Ym/', $this->now) . $file['uname'] . '.' . $file['ext'];
            $input->ext             = $file['ext'];
            $input->mimetype        = $file['type'];
            $input->size            = $file['size'];
            $input->width           = $file['width'];
            $input->height          = $file['height'];
            $input->createby        = $this->session->getUid();
            $input->createtime      = date("Y-m-d H:i:s");
            $input->public          = '0';
            $input->primary         = '0';
            $input->editor          = '1';

            $model = new clsModModel($this->mdb, 'mw_file');
            $model->mw_file->insert($input);
            $_SESSION['album'][$this->input->uid][] = $model->mw_file->lastInsertID();

            $this->output->error = 0;
            $this->output->url = $this->webPath . $input->url;
//             die(json_encode(array('error' => 0, 'url' => $url)));
        }
    }

    /**
     * Paste image in kindeditor at firefox and chrome.
     * 处理粘贴到kindeditor中的图片（仅firefox和chrome适用）
     * @param  string uid
     * @access public
     * @return void
     */
    public function _ajaxpasteimage()
    {
        if(isset($this->input->editor)) {
            echo $this->pasteImage($this->input->editor, $this->input->uid);
        }
        exit;
    }

    /**
     * Paste image in kindeditor at firefox and chrome.
     *
     * @param  string    $data
     * @param  string    $uid
     * @access public
     * @return string
     */
    public function pasteImage($data, $uid)
    {
        $data = str_replace('\"', '"', $data);

        if(!$this->checkSavePath()) return false;

        ini_set('pcre.backtrack_limit', strlen($data));
        preg_match_all('/<img src="(data:image\/(\S+);base64,(\S+))" .+ \/>/U', $data, $out);
        foreach($out[3] as $key => $base64Image)
        {
            $imageData = base64_decode($base64Image);
            $imageSize = array('width' => 0, 'height' => 0);

            $input              = new stdClass();
            $input->ext         = $out[2][$key];
            $input->filename    = $this->getUniqueName($key);
            $input->fullname    = $this->setFullName($key, $input->ext);
            $input->filemd5name = $input->filename;
            $input->realpath    = $this->savePath . DS . $input->fullname;
            $input->filepath    = $input->realpath;
            $input->size        = strlen($imageData);
            $input->mimetype    = "";
            $input->createby    = $this->session->getUid();
            $input->createtime  = date("Y-m-d H:i:s");
            $input->title       = basename($input->fullname);
            $input->editor      = '1';
            $input->uname       = $input->filename;
            $input->url         = date('Ym/', $this->now) . $input->fullname;
            $input->public      = '0';
            $input->primary     = '0';
            file_put_contents($input->realpath , $imageData);

//             $this->compressImage($this->savePath . $file['pathname']);
            $imageSize      = $this->getImageSize($input->realpath);
            $input->width   = $imageSize['width'];
            $input->height  = $imageSize['height'];

            $model = new clsModModel($this->mdb, 'mw_file');
            $model->mw_file->insert($input);
            $_SESSION['album'][$this->input->uid][] = $model->mw_file->lastInsertID();

            $data = str_replace($out[1][$key], $this->webPath . $input->url, $data);
        }

        return $data;
    }


    /**
     * Update objectType and objectID for file.
     *
     * @param  string $uid
     * @param  int    $objectID
     * @param  string $bojectType
     * @access public
     * @return void
     */
    public function updateObjectID($uid, $objectID, $objectType)
    {
        $input = new stdclass();
        $input->objectid   = $objectID;
        $input->objecttype = $objectType;

        if(isset($_SESSION['album'][$uid]) && $_SESSION['album'][$uid])
        {
            $input->ids    = implode(',', $_SESSION['album'][$uid]);
            $model = new clsModModel($this->mdb, 'mw_file');
            return $model->mw_file->updateObject($input);
        }
        return true;
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
                    //检查文件大小是否超过设置
                    if($upload->fncCheckFileSize(C('UPLOADFILEMAXSIZE'))) {
                         $file = $upload->getFile();
                        if (!empty($this->input->filetitles[$id]))//标题
                            $file['title'] = htmlspecialchars($this->input->filetitles[$id]);
                        if (!empty($this->input->filedescs[$id]))//描述
                            $file['desc'] = htmlspecialchars($this->input->filedescs[$id]);
                    } else {
                        $file['errmsg'] = $this->lang->file->errorovermaxsize;
                    }
                   
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
                 if($upload->fncCheckFileSize(C('UPLOADFILEMAXSIZE'))) {
                    $file = $upload->getFile();
                    if (!empty($this->input->filetitles[0]))//标题
                        $file['title'] = htmlspecialchars($this->input->filetitles[0]);
                    if (!empty($this->input->filedescs[0]))//描述
                            $file['desc'] = htmlspecialchars($this->input->filedescs[0]);
                } else {
                    $file['errmsg'] = $this->lang->file->errorovermaxsize;
                }
            }else {
                    $file['errmsg'] = $upload->getError();
            }
            return array($file);
        }
        return $files;
    }


    /**
     * Save the files uploaded.
     *
     * @param string $objectType
     * @param string $objectID
     * @access public
     * @return boolean
     */
    public function saveUpload($objectType = '', $objectID = '', $files = array())
    {
//         $fileTitles = array();

        foreach($files as $id => $file)
        {
            $imageSize = array('width' => 0, 'height' => 0);

            if (!empty($file['errmsg'])) {
                continue;
            }

            if(in_array(strtolower($file['ext']), C('IMAGEEXTENSIONS')))
            {
//                 $this->compressImage($this->savePath . $file['pathname']);
                $imageSize = $this->getImageSize($file['realpath']);
            }

            $input = new stdClass();
            $input->title           = $file['title'];
            $input->desc            = empty($file['desc'])?'':$file['desc'];
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
            $input->public          = '1';
            $input->primary         = '0';
            $input->editor          = '0';
            $model = new clsModModel($this->mdb, 'mw_file');
            $model->mw_file->insert($input);
        }

        return true;
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
     * Set the file full name.
     * 生成随机文件名
     * @param string $fileID
     * @param string $extension
     * @access public
     * @return void
     */
    private function setFullName($fileID, $extension){

        return $this->getUniqueName($fileID) . '.' . $extension;
    }


    /**
     * 取得文件唯一名称
     * @param int $fileID
     * @return string
     */
    private function getUniqueName($fileID) {
        $sessionID  = session_id();
        $randString = substr($sessionID, mt_rand(0, strlen($sessionID) - 5), 3);
        /* rand file name more */
        return md5(mt_rand(0, 10000) . time() . $fileID  . $randString . mt_rand(0, 10000) );

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
