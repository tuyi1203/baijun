<?php
class clsFileSystem {

    public static function fncDelDir($a_stDir)
    {

        if (!is_dir($a_stDir)) {

            clsLogger::subWriteSysError('文件夹不存在（'. $a_stDir .'）。' );
            return false;
        }
        //先删除目录下的文件：
        $dh = opendir($a_stDir);

        while ($file=readdir($dh)) {

            if($file!="." && $file!="..") {

                $fullpath=$a_stDir."/".$file;

                if(!is_dir($fullpath)) {

                    if(!unlink($fullpath)) {

                        clsLogger::subWriteSysError('删除文件（'. $fullpath .'）失败!' );
                        return false;
                    }

                } else {

                    self::fncDelDir($fullpath);

                }
            }
        }

        closedir($dh);
        //删除当前文件夹：
        if(rmdir($a_stDir)) {
            return true;
        } else {
            clsLogger::subWriteSysError('删除文件夹（'. $a_stDir .'）失败!' );
            return false;
        }
    }

    /**
     * 做成路径
     * @param string $a_stDir
     * @return boolean
     */
    public static function fncCreateDir($a_stDir)
    {

        if(!mkdir($a_stDir)) {

            clsLogger::subWriteSysError('路径生成失败（'. $a_stDir .'）!' );
            return false;
        }

        return true;

    }
}