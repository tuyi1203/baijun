<?php

/**
 * @name 		clsAppController
 * @describe 	clsController派生類
 * @author 		tuyi
 * @since 		2014/11/27
 * @version		v2.0
 */
abstract class clsAppController extends clsController{

        ###########################################################################
        # 名称			：__construct
        # 功能概要		            ：构造函数
        # 参数			：无
        # 返回值			：无
        # 初版作成日		：2010/06/20
        ###########################################################################
        public function __construct(){

            parent::__construct();

            if (strtolower(MODE) == "site") 
            {
            	$this->createLeftBar();
            }

			$this->smarty->assign("modules"  ,      MODULES);
            $this->smarty->assign("WWW_PATH" ,      $this->app->wwwroot);
            $this->smarty->assign("SCRIPT_PATH" ,   $this->app->scriptroot);
            $this->smarty->assign("MODULENAME" ,    $this->session->fncGetValue('module'));
            $this->smarty->assign("MODULE_F" ,      $this->session->fncGetValue('module_f'));
            $this->smarty->assign("MODULE_S" ,      $this->session->fncGetValue('module_s'));
            $this->smarty->assign("MENUOUTER",      $this->fncGetMenuList('outer', $this->session->fncGetValue("menu_list") , $this->mode));
            $this->smarty->assign("MENUINNER",      $this->fncGetMenuList('inner', $this->session->fncGetValue("menu_list") , $this->mode));
            $this->smarty->assign("SCRIPT" ,        SCRIPT);
            //TODO 单点登录用代码，更新时将注释取消
            // if (session('_sysname') == C('sysname')) 
            // {
            //     $this->smarty->assign("MENUOUTER",      $this->fncGetMenuList('outer', $this->session->fncGetValue("menu_list") , $this->mode));
            //     $this->smarty->assign("MENUINNER",      $this->fncGetMenuList('inner', $this->session->fncGetValue("menu_list") , $this->mode));
            // }
            $this->smarty->assign("CLIENTLANG",     strtolower($this->app->getClientLang()));
            $this->smarty->assign("UPLOADURL" ,     UPLOAD_URL);
            //         $this->smarty->assign('URI' , $this->uri);
            $this->smarty->setTpl('index' . APPTYPE);

            if ($this->isMobile() && (strtolower(MODE) == "site"))
            {
                $this->smarty->setTpl('mobile.html');
            }
        }

        private function createLeftBar()
        {
        	//取得左侧菜单
			$dao = getDAO();
			$result = $dao->select("a.* , b.url")->from('mw_field')->alias('a')->leftjoin('mw_file')->alias('b')->on("b.objecttype='field'")->andWhere("a.id = b.objectid")->andWhere("b.editor='0'")->where('a.pid is null')->orderby('a.sort')->fetchAll();
			$this->output->leftbarlist = $result;
// 			$this->smarty->assign('leftbarlist' , $result);
// 			pr($result);

			//取得微信二维码图片
			$result = $dao->select()->from('mw_file')->where("objecttype='qcode'")->andWhere("objectid=1")->fetch();
			$this->output->qcode = $result;

			//取得底部信息
			$result = $dao->select()->from('mw_set')->where("`key`='siteinfo'")->andWhere("subkey='3'")->fetch();
			$this->output->footer = $result->value;

			//取得机构信息
			$result = $this->dao->select()->from('mw_branches')->orderby('sort')->fetchAll();
			$this->output->branches = $result;
        }

        /**
         * 输出页面
         */
        public function _display()
        {
            if (in_array(APPTYPE , array('.html','.modal'))) {
                clsHook::listenFilter(__FUNCTION__);
                $this->smarty->assign('ERRMSG' , $this->session->fncGetErrMsg());
                $this->smarty->assign('NOTICE' , $this->session->fncGetNotice());

//             pr((array)$this->output);
			$this->output = obj2array($this->output);
			//关键字过滤
            if (MODE == 'site') {
                $keywords = preg_split("/\n/" , getSiteInfo('config' , 'keywords'));
                if ($keywords) {
                    $this->output = filter::keywords($this->output , $keywords);
                }
            }
            foreach ((array)$this->output as $k => $v)  {
                if ($k == "nofilter") {//富文本编辑器对应
                    $this->smarty->assign("nofilter",$v);
                } elseif ($k == "ta") {//textarea对应
                    $this->smarty->assign('ta', filter::nl2br(filter::htmlspecialchars(obj2array($v))));
                } else {
                    $this->smarty->assign(strtolower($k),filter::htmlspecialchars($v));
                }
            }
            $this->smarty->assign('la' , obj2array(getLang()));
            $this->smarty->display($this->smarty->tplName);
        }
        if (APPTYPE == ".json") $this->send(obj2array($this->output));

//         if (in_array($this->apptype, array("jpeg","bmp","gif","png"))) {

//             exit;

//         }

    }

    /**
     * 在ajax请求时，返回数据
     *
     * @param  mixed $data
     * @param  string $type
     * @access public
     * @return void
     */
    public function send($data, $type ='.json') {
        if($type == '.json') echo json_encode($data);
        die;
//         die(helper::removeUTF8Bom(ob_get_clean()));
    }


    /**
     * 文件上传用token设置和sessionid设置
     * @param 無
     */
    public function setTokenAndSession()
    {

        $timestamp = time();

        $token = md5(C('md5salt') . $timestamp);

        $this->smarty->assign('TIMESTAMP' , $timestamp);

        $this->smarty->assign('TOKEN' , $token);

        $this->smarty->assign('SESSIONID',session_id());

    }
    // public function __destruct(){
    //     parent::__destruct();
    // }

    /**
     * 生成一二级菜单List
     * @param string $a_stScope
     * @param array $list
     * @param string $mode
     * @return multitype:unknown
     * @author tuyi
     * @date 2014.5.19
     */
    private function fncGetMenuList($a_stScope , $a_aList , $a_stMode)
    {
    	if (empty($a_aList) or !array_key_exists($a_stMode , $a_aList)) return;

        $menulist = array();

        if ($a_stScope == "outer") {

            foreach ($a_aList[$a_stMode] as $sort => $menus) {

                foreach ($menus as $id => $f) {

                    $tmp['url'] = $f['url'];
                    //多语言对应
                    if (strtolower(getClientLang()) == "en") {
                    	$tmp['des'] = $f['des_en'];
                    } else {
                    	$tmp['des'] = $f['des'];
                    }

                    $tmp['name'] = $f['name'];
                    $menulist[] = $tmp;

                }

            }

        }

        if ($a_stScope == "inner") {

            foreach ($a_aList[$a_stMode] as $sort => $menus) {

                foreach ($menus as $id => $f) {
                    // echo getSessVal('module_f');
                    if ($this->session->fncGetValue('module_f') == $f['name']) {

                        foreach ($f['child'] as $cid => $c) {

                            $tmp['url'] = $c['url'];
                            //多语言对应
                            if (strtolower(getClientLang()) == "en") {
                            	$tmp['des'] = $c['des_en'];
                            } else {
                            	$tmp['des'] = $c['des'];
                            }
                            $tmp['name'] = $c['name'];
                            $menulist[] = $tmp;

                        }

                    }

                }

            }
        }
// pr($menulist);
        return $menulist;

    }

     //判断是否为移动端
    function isMobile()
    { 
          // 如果有HTTP_X_WAP_PROFILE则一定是移动设备
          if (isset($_SERVER['HTTP_X_WAP_PROFILE'])) {
            return true;
          } 
          // 如果via信息含有wap则一定是移动设备,部分服务商会屏蔽该信息
          if (isset($_SERVER['HTTP_VIA'])) { 
            // 找不到为flase,否则为true
            return stristr($_SERVER['HTTP_VIA'], "wap") ? true : false;
          } 
          // 脑残法，判断手机发送的客户端标志,兼容性有待提高。其中'MicroMessenger'是电脑微信
          if (isset($_SERVER['HTTP_USER_AGENT'])) {
            $clientkeywords = array('nokia','sony','ericsson','mot','samsung','htc','sgh','lg','sharp','sie-','philips','panasonic','alcatel','lenovo','iphone','ipod','blackberry','meizu','android','netfront','symbian','ucweb','windowsce','palm','operamini','operamobi','openwave','nexusone','cldc','midp','wap','mobile','MicroMessenger'); 
            // 从HTTP_USER_AGENT中查找手机浏览器的关键字
            if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT']))) {
              return true;
            } 
          } 
          // 协议法，因为有可能不准确，放到最后判断
          if (isset ($_SERVER['HTTP_ACCEPT'])) { 
            // 如果只支持wml并且不支持html那一定是移动设备
            // 如果支持wml和html但是wml在html之前则是移动设备
            if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html')))) {
              return true;
            } 
          } 
          return false;
    }
}
?>