<?php
/**
 * 文件上传类
 * @name clsSingleUpload
 * @author tuyi
 * @since 2012.5.6
 * @version v1.0
 */
class clsUpload {

    CONST UPLOAD_FORBIDDEN        = "系统被设定为禁止上传文件，如要使用上传功能，请修改设置!";
    CONST UPLOAD_DIR_NOT_WRITABLE = "上传用临时文件夹无写入权限，请修改设置!";
    CONST UPLOAD_ERR_INI_SIZE     = "上传的文件大小超过了最大值!";
    CONST UPLOAD_ERR_FORM_SIZE    = "上传的文件的大小超过了表单设定的最大值!";
    CONST UPLOAD_ERR_PARTIAL      = "上传的文件只成功上传了其中一部分!";
    CONST UPLOAD_ERR_NO_FILE      = "文件没有被上传!";
    CONST UPLOAD_ERR_NO_TMP_DIR   = "没有可供存放的临时文件夹!";
    CONST UPLOAD_ERR_CANT_WRITE   = "将文件写入硬盘失败!";
    CONST UPLOAD_ERR_EXTENSION    = "上传的文件被PHP扩展程序中断!";
    CONST UPLOAD_ERR_EMPTYFILE    = "上传文件是空文件!";
    CONST UPLOAD_ERR_NOEXT        = "文件没有扩展名!";
    CONST MOVE_FILE_ERR           = "移动文件失败！";
    CONST UNDER_ATTACK            = "受到攻击！";


    private $__stErrMsg = null;        //错误信息
    private $__stFormFileName;         //表单中文件标签设定的名称(name)
    private $__stFileRealPath;         //上传文件的可使用的真实路径
    private $__file = array();
//     private $__imageExtensions = array('bmp','jpg','jpeg','tiff','png','gif');
    private $__imageExtensions;

    /**
     * 构造函数
     * 检查文件是否正常上传
     * @param String $a_stFormFileName 表单中文件标签设定的名称(name)
     * @param string $a_stSaveDirectory 保存文件的路径
     * @param int $a_iIndex 复数个文件上传时使用
     */
    public function __construct($a_stFormFileName , $a_stSaveDirectory , $a_iIndex=null) {
        $this->__stFormFileName = $a_stFormFileName;
        $this->__stFileRealPath = $a_stSaveDirectory;
        if (!is_writable($this->__stFileRealPath)) {
            return $this->__stErrMsg = self::UPLOAD_DIR_NOT_WRITABLE;
        }
        $this->__imageExtensions = C('imageExtensions');
// pr(C());
        if (is_null($a_iIndex)) {
            $this->__file['error']    = $_FILES[$a_stFormFileName]['error'];
            $this->__file['tmp_name'] = $_FILES[$a_stFormFileName]['tmp_name'];
            $this->__file['fullname'] = $_FILES[$a_stFormFileName]['name'];
            $this->__file['name']     = $this->fncGetFileName($_FILES[$a_stFormFileName]['name']);
            $this->__file['type']     = $_FILES[$a_stFormFileName]['type'];
            $this->__file['size']     = $_FILES[$a_stFormFileName]['size'];
            $this->__file['title']    = $_FILES[$a_stFormFileName]['name'];
        } else {
            $this->__file['error']    = $_FILES[$a_stFormFileName]['error'][$a_iIndex];
            $this->__file['tmp_name'] = $_FILES[$a_stFormFileName]['tmp_name'][$a_iIndex];
            $this->__file['fullname'] = $_FILES[$a_stFormFileName]['name'][$a_iIndex];
            $this->__file['name']     = $this->fncGetFileName($_FILES[$a_stFormFileName]['name'][$a_iIndex]);
            $this->__file['type']     = $_FILES[$a_stFormFileName]['type'][$a_iIndex];
            $this->__file['size']     = $_FILES[$a_stFormFileName]['size'][$a_iIndex];
            $this->__file['title']    = $_FILES[$a_stFormFileName]['name'][$a_iIndex];
        }

        $this->__file['ext']  = $this->fncGetExt();

        //检查是否被允许上传文件
        if (!ini_get('file_uploads')) {
//             throw new clsSysException(__FILE__, __FUNCTION__ , '系统被设定为禁止上传文件，如要使用上传功能，请修改设置!');
            return $this->__stErrMsg = self::UPLOAD_FORBIDDEN;
        }
        //检查放置上传文件的文件夹是否为可写入状态
        if(!is_writable(ini_get('upload_tmp_dir'))) {
//             throw new clsSysException(__FILE__, __FUNCTION__ , '没有写入权限（放置上传文件的文件夹），请修改设置!');
			//网络虚拟主机对应2014.11.6
            //return $this->__stErrMsg = self::UPLOAD_DIR_NOT_WRITABLE;
        }

        //检查该文件是否为正确的上传文件
        if ($this->__file['error']  != UPLOAD_ERR_OK ) {
            if ($this->__file['error'] == UPLOAD_ERR_INI_SIZE) {
                //上传的文件大小超过了php.ini的upload_max_file的最大值。
                return $this->__stErrMsg = self::UPLOAD_ERR_INI_SIZE;
            }
            if ($this->__file['error'] == UPLOAD_ERR_FORM_SIZE) {
                //上传的文件的大小超过了HTML表单设定的最大值
                return $this->__stErrMsg = self::UPLOAD_ERR_FORM_SIZE;
            }
            if ($this->__file['error'] == UPLOAD_ERR_PARTIAL) {
                //上传的文件只成功上传了其中一部分
                return $this->__stErrMsg = self::UPLOAD_ERR_PARTIAL;
            }
            if ($this->__file['error'] == UPLOAD_ERR_NO_FILE) {
                //文件没有被上传
                return $this->__stErrMsg = self::UPLOAD_ERR_NO_FILE;
            }
            if ($this->__file['error'] == UPLOAD_ERR_NO_TMP_DIR) {
                //没有可供存放临时文件的临时文件夹
                return $this->__stErrMsg = self::UPLOAD_ERR_NO_TMP_DIR;
            }
            if ($this->__file['error'] == UPLOAD_ERR_CANT_WRITE) {
                //将文件写入硬盘失败
                return $this->__stErrMsg = self::UPLOAD_ERR_CANT_WRITE;
            }
            if ($this->__file['error'] == UPLOAD_ERR_EXTENSION) {
                //上传的文件被PHP扩展程序中断
                return $this->__stErrMsg = self::UPLOAD_ERR_EXTENSION;
            }
        }

        if ($this->__file['size'] == "0") {
            return $this->__stErrMsg = self::UPLOAD_ERR_EMPTYFILE;
        }
// pr($this->__file);
        if (!$this->__file['ext']) {
            return $this->__stErrMsg = self::UPLOAD_ERR_NOEXT;
        }

        //当文件正确上传时，移动临时文件到正式保存文件夹
        if(!is_uploaded_file($this->__file['tmp_name'])) {
//                 throw new clsSysException(__FILE__, __FUNCTION__, '受到攻击！');
            return $this->__stErrMsg = self::UNDER_ATTACK;
        }
        if (!move_uploaded_file($this->__file['tmp_name'],
                $a_stSaveDirectory . DS . clsLang::EncodeToPCcode($this->__file['name']). '.' . $this->__file['ext'])) {
            //             if (!move_uploaded_file($_FILES[$a_stFormFileName]['tmp_name'],
            //             		$a_stSaveDirectory . DS . $_FILES[$a_stFormFileName]['name'])) {
            return $this->__stErrMsg = self::MOVE_FILE_ERR;
            //             	echo print_r($_SERVER);
            //             	echo $a_stSaveDirectory . DS . fncLangEncode($_FILES[$a_stFormFileName]['name']);
        } else {
                //TODO OR NOT 中文对应
//                 $this->__file['realpath'] = $a_stSaveDirectory . DS . $this->__file['name'];
            $this->subFileRenameUnique();

            if(in_array(strtolower($this->__file['ext']), $this->__imageExtensions)) {
//                     $this->compressImage($this->__file['realpath']); TODO 文件压缩处理
                $imageSize = $this->getImageSize($this->__file['realpath']);
                $this->__file['width'] = $imageSize['width'];
                $this->__file['height']= $imageSize['height'];
            }
        }
    }

    public function getFile() {
        return $this->__file;
    }

    /**
     * 取得上传文件的MIMETYPE
     * @return String
     */
    public function fncGetFileMimeType () {
        return $this->__file['type'];
    }
    /**
     * 上传文件的大小取得
     * @return int
     */
    public function fncGetFileSize() {
        return $$this->__file['size'];
    }
    /**
     * 取得上传文件的可使用的真实路径
     * @return string
     */
    public function fncGetFileRealPath() {
        return $this->__stFileRealPath;
    }

    public function fncGetFileName($filename) {
        if (!strrpos($filename, '.')) return $filename;
        return substr($filename , 0 , strrpos($filename, '.'));
    }

    public function isError() {
        return !empty($this->__stErrMsg);
    }

    /**
     * 取得错误信息
     * @return String
     */
    public function getError() {
        return $this->__stErrMsg;
    }

    /**
     * 检查文件大小是否小于设定的最大值
     * @param int $a_iMaxLimitedSize 设定的最大文件大小（MB）
     * @return boolean
     */
    public function fncCheckFileSize($a_iMaxLimitedSize) {
        if (fncGetFileSize()/1024 > $a_iMaxLimitedSize) {
            return false;
        }
        return true;
    }

    /**
     * 检查文件扩展名是否是需要的扩展名
     * @param array $a_aFileExt
     * @return boolean
     */
    public function fncCheckExt($a_aFileExt = array()) {
        if (!empty($a_aFileExt)) {
            if (!in_array( $this->fncGetExt(), $a_aFileExt)) {
                return false;
            }
        }
        return true;
    }

    /**
     * 取得文件扩展名
     * @param array $a_aFileExt
     * @return boolean
     */
    public function fncGetExt() {
        if (!strpos($this->__file['fullname'], '.')) return;
        return substr($this->__file['fullname'] , strrpos($this->__file['fullname'] , '.') + 1 );

    }

    /**
     * 为上传的文件更名（唯一名称）
     */
    public function subFileRenameUnique() {

        $oldpath = $this->__stFileRealPath . DS . $this->__file['fullname'];

        //系统语言对应
        $oldpath = mb_convert_encoding($oldpath, C('systemlanguage') , "UTF-8");

        //2014.8.1添加水印操作↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
        if (in_array(strtolower($this->__file['ext']), $this->__imageExtensions) and $watertext = getWaterText()) {
            if(!class_exists('water')) require APATH_LIBS_WATER . DS .'water.php';
            $water = new water(dirname($oldpath));
        	$tmpfilename = "a.png"; //文字水印图片临时路径
        	if (!$water->generateTransparentPic($oldpath , $watertext, $tmpfilename, 200, 40)
        	           ->waterInfo(mb_convert_encoding($this->__file['fullname'], C('systemlanguage') , "UTF-8"), $tmpfilename, 7, "", 100)) {
        	    clsLogger::subWriteSysError('水印图片添加失败：水印图片比原图大');
        	}
        	if (file_exists(dirname($oldpath) . DS . $tmpfilename))
        	@unlink(dirname($oldpath) . DS . $tmpfilename);
        }

        //2014.8.1添加水印操作↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑

        $md5name  = md5(md5_file($oldpath) . time()) ;
        $newpath  = dirname($oldpath). DS . $md5name . '.' . $this->__file['ext'];
        //$l_stFileNameHead = md5_file($oldpath);

        $this->__file['realpath'] = $newpath;
        $this->__file['uname']    = $md5name;

        if (!rename($oldpath, $newpath)) {
            //throw new clsSysException(__FILE__ , __FUNCTION__ , '为上传的文件'. $oldpath . '更名时失败。');
            $this->__stErrMsg = '为上传的文件'. $oldpath . '更名时失败。';
        }
//         $this->__stFileRealPath = $l_stNewName ;
    }

    /**
     * Get image width and height.
     *
     * @param  string    $imagePath
     * @access public
     * @return array
     */
    public function getImageSize($imagePath)
    {
        if(!file_exists($imagePath)) return array('width' => 0, 'height' => 0);

        list($width, $height) = getimagesize($imagePath);
        return array('width' => (int)$width, 'height' => (int)$height);
    }


}