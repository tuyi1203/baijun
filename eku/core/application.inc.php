<?php
defined('_EKU') or die;

/**
 * @author tuyi
 *
 */
abstract class clsApplication {

    public $comroot = null;

    public $moduleroot = null;

    public $scriptroot = null;

    public $wwwroot = null;

    public $webroot = null;

    public $loadedcontrollers = array();

    /**
     * 路由器对象
     *
     * @var object
     * @access protected
     */
    protected $router = null;

    protected $apptype = null;

    protected $mode = null;

    protected $post = null;

    protected $get = null;

    protected $input = null;

    protected $cookie = null;

    protected $server = null;

    protected $ctrl = null;

    protected $mdb = null;

    protected $dao = null;

    protected $smarty = null;

    protected $form = null;

    protected $session = null;

    protected $jsondata = null;

    protected $lang = null;

    protected $clientlang = null;

    public $js = '';

    public $css = '';

    //     protected $pager = null;

    public function __construct(clsRouter $router) {

        $this->apptype    = APPTYPE;
        $this->mode       = MODE;
        $this->router     = $router;
        $this->comroot    = $router->comroot;
        $this->moduleroot = $router->moduleroot;
        $this->scriptroot = $router->scriptroot;
        $this->wwwroot    = $router->wwwroot;
//         $this->webroot    = 'http://' . C('domain') . C('path') . 'www';
        //$this->session    = new clsAppSession(config::$domain) ;
		$this->session    = new clsAppSession(C('path') , C('domain')) ;
        $this->post       = new clsSuper('post');
        $this->get        = new clsSuper('get');
        $this->server     = new clsSuper('server');
        $this->cookie     = new clsSuper('cookie');
        $this->lang       = new stdClass();

        //取得输入数据
        $this->input  = new stdClass();
        if($this->post->data) foreach ($this->post->data as $k => $v) $this->input->$k = $v;
        if($this->get->data)  foreach ($this->get->data as $k => $v)  $this->input->$k = $v;
        if(!empty($_COOKIE)) foreach ($_COOKIE as $k => $v) $this->cookie->$k = $v;
        if($this->getParams()) foreach($this->getParams() as $k => $v) $this->input->$k = $v;

        if(isset($this->cookie->lang)) $this->clientlang = $this->cookie->lang;
        else $this->clientlang = C('lang');

        //保存路由信息到session ↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
        if($this->session->fncGetValue('uri') != "") {
            $this->session->subSetValue('preuri' , $this->session->fncGetValue('uri'));
            $this->session->subSetValue('premodule' , $this->session->fncGetValue('module'));
            $this->session->subSetValue('premodule_f' , $this->session->fncGetValue('module_f'));
            $this->session->subSetValue('premodule_s' , $this->session->fncGetValue('module_s'));
            $this->session->subSetValue('prescript' , $this->session->fncGetValue('script'));
            $this->session->subSetValue('preaction' , $this->session->fncGetValue('action'));
        }

        $this->session->subSetValue('uri' , $this->router->uri);
        $this->session->subSetValue('module' , $this->router->module);
        $this->session->subSetValue('module_f' , $this->router->module_f);
        $this->session->subSetValue('module_s' , $this->router->module_s);
        $this->session->subSetValue('script' , $this->router->script);
        $this->session->subSetValue('action' , $this->router->action);
        //↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑

    }


    public function execute()
    {

        try {

            $this->init();//初始化

            $this->onExecute();

            if (!method_exists($this->ctrl , ACTION)) {

                clsLogger::subWriteSysError("文件：{$this->scriptroot}\ctr.php中，模块动作：" . ACTION . "不存在！");
                $this->ctrl->redirect(U(C('ERR404URI')));

            }

            $this->doAction(ACTION);

            $this->doAction('_display');

            $this->session->subCloseSession() ;

            clsConnect::subCloseConnect(getDSN());//关闭数据库连接

        } catch (clsDbException $e) {

            $this->redirect(U(C('ERR110URI')));

        } catch (clsSysException $e) {

            $this->redirect(U(C('ERR110URI')));

        } catch (PDOException $e) {

            clsLogger::subWriteDbError('未能在底层捕获的PDO异常：' . $e->getMessage());

        } catch(Exception $e) {
            clsLogger::subWriteSysError($e->getMessage());
        }

    }

    public function init()
    {
        //读取公共变量
        $this->config();

        //导入需要的模块
        $this->loadLibs();
        $this->loadCommon();
        $this->loadModuleCommon();
        $this->loadModule();
        $this->loadModuleJs();
        $this->loadModuleCss();
        //TODO  smarty变量不存在报错问题解决后开启
        $this->setErrorHandler();//处理系统级别错误(微信模式)

        //初始化
        if (C('PDO'))     $this->dao = new dao(clsDBH::factory(getDSN()));
        $this->form       = new clsModForm($this->input , $this->lang);
        $this->mdb        = new clsMDB(clsConnect::fncFactory(getDSN()));
        $this->smarty     = new clsAppSmarty($this->scriptroot . DS);
        $controller       = 'cls'.ucfirst($this->router->module_f) . ucfirst($this->router->module_s) . ucfirst($this->router->script).'Controller';
        $this->ctrl       = new $controller($this);

    }

    /**
     * 导入需要的模块类文件
     */
    public function loadModule() {

        //导入模块文件
        $pathRule  = $this->scriptroot . DS . '*.php';
// echo $pathRule;
        $includeFiles = glob($pathRule);
        if($includeFiles) foreach($includeFiles as $file) require $file;

        //导入语言文件
        $filepath = $this->moduleroot . DS . 'lang' . DS . strtolower($this->clientlang) . '.php';
        if(file_exists($filepath)) require $filepath;

        //TODO 导入钩子文件
    }

    public function loadCommon()
    {
        $files = scandir(APATH_COMMON_PATH);
        foreach ($files as $file) {
            if ($file !== '.' && $file !== '..') {
                require APATH_COMMON_PATH . DS . $file;
            }
        }
    }

    /**
     * 导入共通文件
     */
    public function loadModuleCommon() {

    	require $this->comroot . DS . 'function.php';
        require $this->comroot . DS . 'common.php';
        require $this->comroot . DS . 'hooks.php';
        if (file_exists($this->comroot . DS . 'filesystem.php'))
            require $this->comroot . DS . 'filesystem.php';

        //导入语言文件
        require $this->comroot . DS . 'lang' . DS . strtolower($this->clientlang) . '.php';
    }

    public function loadLibs() {
        require APATH_LIBS . DS . 'filter' . DS . 'filter.php';
        require APATH_LIBS . DS . 'front'  . DS . 'front.php';
        require APATH_LIBS . DS . 'text.php';
		$this->loadPager();
        //读取微信库文件
        if (in_array(MODE , array('wechat' , 'addon'))) {
            $weixinfiles = scandir(APATH_LIBS . DS . 'weixin');
            foreach ($weixinfiles as $weixinfile) {
                if ('.' == $weixinfile  or '..' ==$weixinfile ) continue;
                require APATH_LIBS . DS . 'weixin' . DS . $weixinfile;
            }

        }

    }

    private function loadPager()
    {
    	require APATH_LIBS . DS . 'pager' . DS . 'pager.php';
    	require APATH_LIBS . DS . 'pager' . DS . 'frontpager.php';
    	require APATH_LIBS . DS . 'pager' . DS . 'verticalpager.php';
    	if (APPTYPE == '.modal') require APATH_LIBS . DS . 'pager' . DS . 'modalpager.php';

    }

    /**
     * 取得模块专用js文件代码
     */
    public function loadModuleJs() {
        if (file_exists($this->scriptroot . DS . 'js' . DS . 'index.js' ))
           $this->js = file_get_contents($this->scriptroot . DS . 'js' . DS . 'index.js');
    }

    /**
     * @param string $path
     * $path 形如：admin.module.first.default
     */
    public function loadController($path) {

        $module = explode('.' , $path);

        $conname = 'cls'.ucfirst($module[1]).ucfirst($module[2]).ucfirst($module[3]).'Controller';
// echo $conname;
        if (!array_key_exists($path , $this->loadedcontrollers)) {

            if (in_array($module[0] , explode('|' , MODES)) ) {
// echo "loaded";
                require MODES_BASE . DS . $module[0] . DS . $module[1] . DS . $module[2]
                                      . DS . $module[3] . DS . 'ctr.php';
                $this->loadedcontrollers[$path] = new $conname($this);

            }
        }

        return $this->loadedcontrollers[$path];
    }

    /**
     * 取得模块专用css代码
     */
    public function loadModuleCss() {
        if (file_exists($this->scriptroot . DS . 'css' . DS . 'index.css' ))
            $this->css = file_get_contents($this->scriptroot . DS . 'css' . DS . 'index.css');
    }

    public function config() {

        // 定义当前请求的系统常量
        define('NOW_TIME',      $_SERVER['REQUEST_TIME']);
        define('REQUEST_METHOD',$_SERVER['REQUEST_METHOD']);
        define('IS_GET',        REQUEST_METHOD =='GET' ? true : false);
        define('IS_POST',       REQUEST_METHOD =='POST' ? true : false);
        define('IS_PUT',        REQUEST_METHOD =='PUT' ? true : false);
        define('IS_DELETE',     REQUEST_METHOD =='DELETE' ? true : false);
        define('UPLOAD_URL',   (
                is_ssl()?'https://':'http://') . (defined('SITE_DOMAIN')?SITE_DOMAIN:$_SERVER['HTTP_HOST']) . '/' . (C('SITE_ROOT') != ""?C('SITE_ROOT').'/':"") . 'upload/'
        );

        C('COOKIELIFE' , time() + 2592000);
    }

    /**
     * 设置错误处理器.
     *
     * @access public
     * @return void
     */
    public function setErrorHandler()
    {
    	if (MODE == 'addon') {
        	set_error_handler(array($this, 'saveError'));
    	}
    }

    /**
     * 抛出一个用户级别的 error/warning/notice信息
     *
     * @param string    $message    错误信息
     * @param string    $file       发生错误的文件名
     * @param int       $line       发生错误的行数
     * @param bool      $exit       是否直接退出脚本
     * @access public
     * @return void
     */
    public function triggerError($message, $file, $line, $exit = false)
    {
        /* Set the error info. */
        $log = "ERROR: $message in $file on line $line";
        if(isset($_SERVER['SCRIPT_URI'])) $log .= ", request: $_SERVER[SCRIPT_URI]";
        $trace = debug_backtrace();
        extract($trace[0]);
        extract($trace[1]);
        $log .= ", last called by $file on line $line through function $function.\n";

        /* Trigger it. */
        trigger_error($log, $exit ? E_USER_ERROR : E_USER_WARNING);
    }

    /**
     * 处理错误.
     *
     * @param  int      错误级别
     * @param  string   错误消息
     * @param  string   错误文件
     * @param  int      错误行数
     * @access public
     * @return void
     */
    public function saveError($level, $message, $file, $line)
    {
        /* Skip the error: Redefining already defined constructor. */
//         if(strpos($message, 'Redefining') !== false) return true;

        /* Set the error info. */

        $errorLog  = "\n" . date('Y-m-d H:i:s') . " $message in <strong>$file</strong> on line <strong>$line</strong> ";
        $errorLog .= "when visiting <strong>" . $this->getURI() . "</strong>\n";
        $debug     = C('debug');

        /* If the ip is pulic, hidden the full path of scripts. */
//         if(MODE == 'shell' and !($this->server->server_addr == '127.0.0.1' or filter_var($this->server->server_addr, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE) === false))
//         {
//             $errorLog  = str_replace($this->getBasePath(), '', $errorLog);
//             $errorLog  = str_replace($this->wwwRoot, '', $errorLog);
//         }

        /* Save to log file. */
//         $errorFile = $this->getLogRoot() . 'php.' . date('Ymd') . '.log';
//         $fh = @fopen($errorFile, 'a');
//         if($fh) fwrite($fh, strip_tags($errorLog)) && fclose($fh);

        clsLogger::subWriteSysError($errorLog);
		die('');
        /* If the debug > 1, show warning, notice error. */
        if($level == E_NOTICE or $level == E_WARNING or $level == E_STRICT or $level == 8192) // 8192: E_DEPRECATED
        {
            if($debug)
            {
                $cmd  = "$line $file";
                $size = strlen($cmd);
//                 echo "<pre class='alert alert-danger'>$errorLog: ";
//                 echo "<input type='text' value='$cmd' size='$size' style='border:none; background:none;' onclick='this.select();' /></pre>";
                echo $errorLog;
            }
        }

        /* If error level is serious, die.  */
        if($level == E_ERROR or $level == E_PARSE or $level == E_CORE_ERROR or $level == E_COMPILE_ERROR or $level == E_USER_ERROR)
        {
            if(empty($debug)) die();
//             if(PHP_SAPI == 'cli') die($errorLog);

            $htmlError  = "<html><head><meta http-equiv='Content-Type' content='text/html; charset=utf-8' /></head>";
            $htmlError .= "<body>" . nl2br($errorLog) . "</body></html>";
            die($htmlError);
        }
    }

    /**
     * 取得从路由取得的参数
     * @param 游标 $key
     * @return boolean
     */
    public function getParams( $key = null) {

        if ($key == null) return $this->router->params;

        if (isset($this->router->params[$key])) return $this->router->params[$key];

        return null;
    }

    public function getInput() {
        return $this->input;
    }

    public function getCtr() {
        return $this->ctrl;
    }

    public function getCookie() {
        return $this->cookie;
    }

    public function getServer() {
        return $this->server;
    }

    public function getSmarty() {
        return $this->smarty;
    }

    public function getMDB() {
        return $this->mdb;
    }

    public function getDAO() {
        return $this->dao;
    }

    public function getSess() {
        return $this->session;
    }

    public function getLang() {
        return $this->lang;
    }

    public function getPost() {
        return $this->post;
    }

    public function getGet() {
        return $this->get;
    }

    public function getForm() {
        return $this->form;
    }

    public function getUri() {
        return $this->session->fncGetValue('uri');
    }

    public function getPreUri() {
        return $this->session->fncGetValue('preuri');
    }

    /**
     * 取得客户端语言类型
     */
    public function getClientLang() {
        return $this->clientlang;
    }

    /**
     * 取得前后台通用url路径
     */
//     public function getWebRoot() {
//         return $this->webroot;
//     }

    /**
     * 执行动作
    * @param  $a_stAction 动作名称
    * @return boolean
    */
    public function doAction($a_stAction , $a_Args = array()) {
// trace();
        clsHook::listenHook($a_stAction , 'pre');
        call_user_func(array($this->ctrl , $a_stAction) , $a_Args);
        clsHook::listenHook($a_stAction , 'after');

    }

    /**
     * 画面跳转方法
     * @param url $url
     */
    public function redirect($url) {
        prdie(1);
    	header("location:".$url);
    	exit;

    }


}