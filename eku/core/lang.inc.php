<?php
class clsLang {

    /**
     * 将utf8转换为用户电脑系统编码
     * @param String $a_stString
     * @return string
     */
    public static function EncodeToPCcode($a_stString) {
        //2014.2.20
        //使用uploadify上传时，不存在$_SERVER['HTTP_ACCEPT_LANGUAGE']
        //现象对应
        //----------------↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
        if (!array_key_exists('HTTP_ACCEPT_LANGUAGE', $_SERVER)) {
            return mb_convert_encoding($a_stString , 'GB2312' , 'UTF-8' );
        }
        //----------------↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
        $l_stUserLang = explode(',' , $_SERVER['HTTP_ACCEPT_LANGUAGE'])[0];
        //     print_R($_SERVER['HTTP_ACCEPT_LANGUAGE']);exit;
        if (strtoupper($l_stUserLang) == 'ZH-CN') {
            return mb_convert_encoding($a_stString , 'GB2312' , 'UTF-8' );
        }
        if (strtoupper($l_stUserLang) == 'JA') {
            //         echo "jp";
            return mb_convert_encoding($a_stString , 'SJIS' , 'UTF-8');
        }
    }

    /**
     * 将用户电脑系统编码转换为utf8
     * @param String $a_stString
     * @return string
     */
    public static function encodeToUTF8($a_stString) {
        $l_stUserLang = explode(',' , $_SERVER['HTTP_ACCEPT_LANGUAGE'])[0];
        if ($l_stUserLang == 'zh-cn') {
            return mb_convert_encoding($a_stString, 'UTF-8' , 'GB2312' );
        }
        if ($l_stUserLang == 'ja') {
            return mb_convert_encoding($a_stString,  'UTF-8' , 'SJIS');
        }
    }
}