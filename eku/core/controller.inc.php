<?php

//require EPATH_LIBS_MODELS . DS . 'breadcrumb.php';
###############################################################################
# 名称　　　　　　： AppController
# 功能概要　　　　： 控制基类
# 初版作成日　　　： 2010/06/19
###############################################################################
abstract class clsController{

    protected $app = null;

    protected $router = null;

    protected $uri = null;

    protected $mode = null;

    //     protected $_aBreadcrumbList ;               //面包屑列表

    protected $session;                        //session对象

    protected $smarty;                        //smarty对象

    protected $mdb;                           //数据库对象

    protected $dao;                          //dao对象

    protected $lang;						//语言对象

    protected $post;						  //post值

    protected $get;							  //get值

    protected $apptype;						 //app类型

    protected $form;						//form对象

    protected $input ;						//输入数据

    public $output;						//输出数据

    protected $cookie;                      //cookie

    protected $server;                      //server全局变量

    ###########################################################################
    # 名称			：__construct
    # 功能概要		：构造函数
    # 参数			：无
    # 返回值			：无
    # 初版作成日		：2010/06/20
    ###########################################################################
    public function __construct()
    {
        //     	$this->router = $a_oApp->router;

        //         $this->_aBreadcrumbList = array();
        $this->app 		= getAppIns();
        $this->dao      = getDAO();
        $this->mode     = MODE;
        $this->session  = getSessIns();
        $this->smarty   = getSmarty();
        $this->mdb      = getMDB();
        $this->post     = getPost();
        $this->get      = getGet();
        $this->apptype  = APPTYPE;
        $this->form     = $this->app->getForm();
        $this->lang     = getLang();
        $this->uri      = $this->app->getUri();
        $this->cookie   = $this->app->getCookie();
        $this->server   = $this->app->getServer();

        if (class_exists('clsModModel'))
        $this->model            = new clsModModel($this->mdb);

        $this->input            = $this->app->getInput();
        $this->output           = new stdClass();
        $this->output->nofilter = new stdClass();//富文本编辑器对应
        $this->output->ta       = new stdClass();//textarea对应

        //设置显示的模板
        //         $this->subSetDisplayTpl();
        //取得面包屑列表
        //         $this->_aBreadcrumbList = $this->fncMakeBreadcrumbList();
        //设置	初始化初次访问本页标记用	变量
        //     $this->oSession->subSetVal('_ScriptName' , AppGlobalVar::fncGetScriptName()) ;
    }

    protected function doAction($a_stAction , $a_Args = array()) {

        $this->app->doAction($a_stAction , $a_Args = array());

    }

    /**
     * 画面跳转方法
     * @param url $url
     */
    public function redirect($url) {
        //     	echo $uri;exit;
        header("location:".$url);
        exit;

    }

    /**
     * 取得面包屑用数据列表
     */
    protected function fncMakeBreadcrumbList() {
        //         e(explode("." , basename($_SERVER['REQUEST_URI']))[0]);
        //         e($_SERVER['HTTP_REFERER']);

        if (array_key_exists('HTTP_REFERER' , $_SERVER) && basename($_SERVER['HTTP_REFERER']) == basename($_SERVER['REQUEST_URI'])) {

            return $this->session->fncGetValue('BreadCrumbList');

        }

        $l_aInputData['pageid'] = explode("." , basename($_SERVER['REQUEST_URI']))[0];

        if (!array_key_exists('HTTP_REFERER', $_SERVER)) {

            $l_aInputData['previouspageid'] = 'nodata';

        } else {

            $l_aInputData['previouspageid'] = explode("." , basename($_SERVER['HTTP_REFERER']))[0];

        }

        try {
            //             $l_oMdb = new clsMDB(clsConnect::fncFactory(config::getDSN()));

            $l_oModel = new clsBreadCrumbModel($this->mdb, 'eku_breadcrumb');

            $l_aBreadCrumbList = $l_oModel->fncGetList($l_aInputData);

            if (count($l_aBreadCrumbList) < 1) {

                //从重新取得面包屑一览
                $l_aInputData['previouspageid'] = 'nodata';

                $l_aBreadCrumbList = $l_oModel->fncGetList($l_aInputData);
                //                 return $this->session->fncGetValue('BreadCrumbList');
            }
            $this->session->subSetValue('BreadCrumbList', $l_aBreadCrumbList);
            //             e($l_aBreadCrumbList);
            return $l_aBreadCrumbList;

        } catch (clsDbException $e) {

            clsLogger::subWriteSysError("取得面包屑失败。（现在的页面ID={$l_aInputData['pageid']}，前一页面ID={$l_aInputData['previouspageid']}）");

            return array();

        }
    }


    /**
     * @param string $path
     * $path 形如：admin.module.first.default
     */
    public function loadController($path) {

        return $this->app->loadController($path);

    }


    /**
     * 显示页面
     */
    abstract public function _display();

    abstract public function send($data, $type = 'json');

//     abstract public function pageDeny($type , $showtime , $link, $linkname );

}
?>
