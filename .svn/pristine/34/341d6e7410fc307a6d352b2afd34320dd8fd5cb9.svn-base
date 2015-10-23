<?php
class clsDownload {
    private static $CLASS_LOADED = 0;
    private function __construct() {
    }

    public static function subDownload($a_stOutputPath) {
        if (self::$CLASS_LOADED == 0) {
            require 'HTTP/Download.php';
            self::$CLASS_LOADED = 1;
        }
        $l_oHttpDownload = new HTTP_Download();
        $l_oHttpDownload->setFile($a_stOutputPath);
        $l_oHttpDownload->send();
    }
}