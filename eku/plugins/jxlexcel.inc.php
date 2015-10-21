<?php
require_once "http://localhost:8080/JavaBridge/java/Java.inc";
/**
 * @name 		clsJXLExcel
 * @describe 	JXLExcel类(通过php/javabridge调用)
 * @author 		tuyi
 * @since 		2011/07/14
 * @version		v1.0
 */
class clsJXLExcel
{
    public function __construct() {

    }

    public function subDownloadExcel($a_stOutputPath) {
        require_once 'HTTP/Download.php';
        $l_oHttpDownload = new HTTP_Download();


        $l_oHttpDownload->setFile($a_stOutputPath);
        //         $l_oHttpDownload->setFile("D:/mobantest.xls");
        $l_oHttpDownload->send();
    }

}
?>
