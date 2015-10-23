<?php
/**
 * 创建目录
 * @param string $path
 * @param string $mode
 * @return boolean
 */
function createDir($path , $mode=null) {
    if (!@mkdir($path , $mode)) return false;//无权限
    return true;
}

/**
 * 重命名文件或者目录
 * @param string $oldname
 * @param string $newname
 * @return boolean
 */
function renameFile($oldname , $newname) {
    if (!@rename($oldname , $newname)) return false;//无权限
    return true;
}
