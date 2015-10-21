<?php
//TODO 不再使用
/**
 * 取得文件上传进度
 */
class clsAppProgress {

    protected $_stFileElemName;
    protected $_oSession;

    public function __construct($a_stFileElemName , clsAppSession $a_oSession) {
        $this->_stFileElemName = $a_stFileElemName;
        $this->_oSession = $a_oSession;
    }

    public function fncGetAllStatus() {
        $key = ini_get("session.upload_progress.prefix") . ini_get('session.upload_progress.name');
        return $this->_oSession->fncGetValue($key);
    }
}