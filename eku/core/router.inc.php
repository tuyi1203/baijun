<?php
defined('_EKU') or die;
/**
 * @name 		clsRouter
 * @describe 	路由类
 * @author 		tuyi
 * @since 		2014/11/25
 * @version		v2.0
 */
class clsRouter {

    public $mode = null;

    public $uri = null;

    public $uriOK = true;

    public $apptype = null;

    public $module = null;

    public $module_f = null;//一级模块

    public $module_s = null;//二级模块

    public $script = null;

    public $action = null;

    public $params = null;

    public $moduleroot = null;

    public $scriptroot = null;

    public $wwwroot = null;

    public $comroot = null;

    public $app = null ;

    public function __construct($mode) {

        $this->mode = $mode;

        $this->dispatcher($mode);

    }

    public function createApplication() {

        if ($this->app == null) {

            require APATH_CORE . DS . 'application.php' ;
            $this->app = new clsAppApplication($this);

        }
        return $this->app;
    }

    /**
     * @param string $mode 入口的类型
     */
    public function dispatcher($mode) {
//         pr($_SERVER);exit;
        if (isset($_SERVER['PATH_INFO'])) {
//             $this->uri = strtolower($_SERVER['PATH_INFO']);
        	$this->uri = $_SERVER['PATH_INFO'];
            if (preg_match("/^\/($mode)\//", $this->uri , $matches)) {//消除顶部的mode字符串
                $this->uri = preg_replace("/^\/$mode\//", '', $this->uri , 1);
            }
        }
        //         $query = substr($uri , strrpos($uri , '/') + 1);
        if ($this->uri == "") {
            $this->uri = C('ENTRANCEURI');
        }
//         pr($this->uri);exit;

        // echo $query;
        if (!preg_match('/^([a-z]+)\/([a-z]+)\/([a-z]+)\/([a-z]+)(\/[a-z|A-Z|0-9|\-|\/|_]+)?\.([a-z]+)$/' , $this->uri)
                or !in_array(strtolower(strstr($this->uri, '.')) , C('URL_HTML_SUFFIX'))
                or explode(C('URL_PATHINFO_DEPR') , substr($this->uri, 0 , strrpos($this->uri, '.'))) < 3) {
            clsLogger::subWriteAccessErr("错误的URI格式：" . $this->uri);
            $this->uriOK = false;
        }
// pr($mode);
        if ($this->uriOK) {

            $queryArr = explode('/' , substr($this->uri, 0 , strrpos($this->uri, '.')));

            if ($mode == "site") {
                $ctrfile = APATH_SITE_PATH;
            }
            if ($mode == "admin") {
                $ctrfile = APATH_ADMIN_PATH;
            }
            if ($mode == "wxadmin") {
                $ctrfile = APATH_WXADMIN_PATH;
            }
            if ($mode == "wxsite") {
                $ctrfile = APATH_WXSITE_PATH;
            }
            if ($mode == "addon") {
                $ctrfile = APATH_ADDON_PATH;
            }
            if ($mode == "wechat") {
                $ctrfile = APATH_WECHAT_PATH;
            }

            $ctrfile .= DS . array_shift($queryArr) . DS . array_shift($queryArr) . DS . array_shift($queryArr) . DS . 'ctr.php';

            if (!file_exists($ctrfile)) {
                clsLogger::subWriteSysError("模块控制文件：" . $ctrfile . '不存在！');
                $this->uriOK = false;
            }
        }

        if ($this->uriOK) array_shift($queryArr);

        if ($this->uriOK and (count($queryArr) > 1 and count($queryArr) % 2 == 1)) {

            clsLogger::subWriteAccessErr("参数不是以键值对的形式出现：" . $this->uri);
            $this->uriOK = false;
        }

        $this->uriOK || $this->uri = C('ERR404URI');

        $this->apptype = strtolower(strstr($this->uri, '.')) ;

        $queryArr = explode('/' , substr($this->uri, 0 , strrpos($this->uri, '.')));

        //一级模块
        $this->module_f  = array_shift($queryArr);
        //二级模块
        $this->module_s  = array_shift($queryArr);

        $this->module    = $this->module_f . '/' . $this->module_s;
        //脚本
        $this->script = array_shift($queryArr);
        //动作
        $this->action = '_' . array_shift($queryArr);

        //各常用路径设置
        $this->comroot       = MODES_BASE    . DS . strtolower($mode) . DS . 'com';
        $this->moduleroot    = MODES_BASE    . DS . strtolower($mode) . DS . str_replace('/' , DS , $this->module);
        $this->scriptroot    = MODES_BASE    . DS . strtolower($mode) . DS . str_replace('/' , DS , $this->module) . DS . $this->script;
        $this->wwwroot       = VIEWS_BASE  . DS . strtolower($mode) ;

        define('MODE'   , $this->mode);
        define('MODULE' , $this->module);
        define('MODULEF', $this->module_f);
        define('MODULES', $this->module_s);
        define('SCRIPT' , $this->script);
        define('ACTION' , $this->action);
        define('APPTYPE', $this->apptype);

        //取得传递的参数
        if (count($queryArr) > 0) {

            if (count($queryArr) == 1) {

                $this->params = array('id' => intval($queryArr[0])) ;

            } else {

                for ($i = 0; $i < count($queryArr); $i++) {

                    if ($i % 2 == 0) {

                        $this->params[$queryArr[$i]] = null;

                    }

                    if ($i % 2 == 1 ) {

                        $this->params[$queryArr[$i-1]] = $queryArr[$i];

                    }

                }
            }
        }
//         pr($this->uri);
    }

    public function getUri() {
        return $this->uri;

    }

}