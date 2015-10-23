<?php
/**
 * 文件自动读取类
 * @name clsClassLoader
 * @author tuyi
 * @version v1.0
 * @author tuyi
 * @since 2012.5.8
 */
class clsLoader{

    /**
     * 保存查询路径
     * @var array
     */
    private $__aDirs = array();
    private $__aExt = array();
    private $__stPrefix ;

    /**
     * 构造方法
     */
    public function __construct() {
        spl_autoload_register(array($this , 'subLoad'));
    }

    /**
     * 注册查询路径(绝对路径)
     * @param String $a_stDir
     */
    public function fncRegisterDir($a_stDir) {
        $this->__aDirs[] = $a_stDir;
        return $this;
    }

    /**
     * 设置文件的扩展名
     * @param String $a_stExt
     */
    public function fncSetExtension($a_stExt) {
        $this->__aExt[] = $a_stExt;
        return $this;
    }

    /**
     * 类名的前缀
     * @param String $a_stPrefix
     */
    public function fncSetPrefix($a_stPrefix) {
        $this->__stPrefix = $a_stPrefix;
        return $this;
    }

    /**
     * 文件自动读取方法
     * @param String $a_stClassName
     */
    public function subLoad($a_stClassName) {
        foreach ($this->__aDirs as $dir) {
            foreach ($this->__aExt as $ext) {
                $l_stFileName = $dir . DS . strtolower(str_replace($this->__stPrefix, "", $a_stClassName)) . $ext;
                if (is_readable($l_stFileName)) {
                    require $l_stFileName;
                    return;
                }
            }
        }
    }
    //     }

}
