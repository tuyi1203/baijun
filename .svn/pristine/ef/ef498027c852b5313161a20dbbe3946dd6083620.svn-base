<?php

/**
 * @name 		clsAppSmarty
 * @describe 	Smarty拡張类
 * @author 		tuyi
 * @since 		2011/12/02
 * @version		v1.0
 */
class clsAppSmarty extends clsSmarty
{
    /**
     * @name 		__construct
     * @describe 	Smarty構造関数
     * @author 		tuyi
     * @since 		2011/12/02
     */
    public function __construct($a_stTempdir)
    {
        parent::__construct($a_stTempdir);



        $this->assign('TITLE', C('sitename'));
        $this->assign('TODAY' , "今天：". date("Y") . "年" . date("n") ."月". date("j") ."日");


        //2014.5.23 注册模板用函数
//         $this->register_function('inc' , array($this , 'include_module_file'));
        $this->register_function('ex' , array($this , 'export'));
        $this->register_function('cl' , array($this , 'createLangMenu'));
//         $this->register_function('t'  , array($this , 'T'));
//         $this->register_function('u'  , array($this , 'U'));
//         $this->register_prefilter("remove_dw_comments");
//         $this->register_outputfilter('filter');
        /*
        // ヘッダ用定数
        $this->assign('TITLE',c_SYSTITLE);
        $this->assign("SYS_TITLE",c_SYSTITLE);
        $this->assign("MAINURLPATH",c_MAINURLPATH);
        $this->assign("SYSPATH",c_SYSPATH);
        if(!is_null($a_oSession))
        {
        // 利用者 ///////////////////////////////////////////////////////////////////////
        $l_aTempNa = array();
        $l_aTempNa = split("／" , $a_oSession->fncGetVal('LoginUserName'));
        if( strlen($l_aTempNa[count($l_aTempNa)-1]) >= 50 )
        {
        $a_LoginUserName = substr( $l_aTempNa[count($l_aTempNa)-1] , 0 , 48 );
        $a_LoginUserName = $a_LoginUserName . "…";
        }
        else
        {
        $a_LoginUserName = $l_aTempNa[count($l_aTempNa)-1];
        }
        $this->assign("LOGIN_USER_NAME",$a_LoginUserName);


        // 組織 ////////////////////////////////////////////////////////////////////////////
        $l_aTempSo = array();
        $l_aTempSo = split("／" , $a_oSession->fncGetVal('LoginUserSoNm'));

        if( strlen($l_aTempSo[count($l_aTempSo)-1]) >= 50 )
        {
        $a_LoginUserSosikiName = substr( $l_aTempSo[count($l_aTempSo)-1] , 0 , 48 );
        $a_LoginUserSosikiName = $a_LoginUserSosikiName . "…";
        }
        else
        {
        $a_LoginUserSosikiName = $l_aTempSo[count($l_aTempSo)-1];
        }
        $this->assign("LOGIN_USER_SOSHIKI",$a_LoginUserSosikiName);

        $this->assign("SYS_RIYOU_KENGEN",$a_oSession->fncGetVal('SysRiyouKengen'));
        }

        //         アプリ用情報
        $this->assign('VERSION',$gExamAppVersion);

        // function registered
        $this->register_modifier("hs2br",array(&$this,"fncHs2br"));
        $this->register_modifier("hs2br_m",array(&$this,"fncHs2br_m"));
        $this->register_modifier("mb_truncate",array(&$this,"fncMbTruncate"));
        */
    }

//     public function include_module_file($args) {
//         $app = getAppIns();
//         $scriptroot = $app->scriptroot;

//         if ($args['file'] == 'js' && file_exists($scriptroot . DS . 'js' . DS . 'index.js'))
//                 include $scriptroot . DS . 'js' . DS . 'index.js';

//         if ($args['file'] == 'css' && file_exists($scriptroot . DS . 'css' . DS . 'index.css'))
//             include $scriptroot . DS . 'css' . DS . 'index.css';

//     }


    /**
     * 取得模板用文件地址
     */
    public function T($url){
        echo '/' . (C('SITE_ROOT')!= "" ? C('SITE_ROOT').'/':"") . C('SITE_PUBLIC') . '/' . MODE . '/' . $args['p'];
    }

    public function U($args) {
        echo U($args['p']);
    }

    public function export($args) {

        if ($args['fn'] == 'exportJs') js::execute($this->app->js);
        if ($args['fn'] == 'exportCss') css::execute($this->app->css);
        if ($args['fn'] == 'exportJsSet') {

            $lang     = $this->app->getLang();
            $module_s = MODULES;
            if (!empty($lang->$module_s->js)) {
                js::set('lang', $lang->$module_s->js);
            } else {
                js::set('lang', $lang->js);
            }

        }

        if (isset($args['fn'])) {
            $arg = array();
            foreach ($args as $key => $value) {
                if (preg_match('/^arg[0-9]+$/', $key) != false) $arg[] = $value;
            }

            if (isset($args['class'])) {
                echo call_user_func_array(array($args['class'] , $args['fn']), $arg);
            } else {
                echo call_user_func_array($args['fn'], $arg);
            }

        }

//         if (method_exists('js', $args['fn']))

//             echo call_user_func_array(array('js' , $args['fn']), $args);

    }

    /**
     * 生成语言下拉菜单
     */
    public function createLangMenu() {
    	$langs = C('LANGS');
        $html[] = "<a href='###' class='dropdown-toggle' data-toggle='dropdown'>
                    <i class='icon-globe icon-large'></i> &nbsp;". $langs[$this->clientlang] .
                    "<span class='caret'></span></a> <ul class='dropdown-menu'>";


        unset($langs[$this->clientlang]);
        foreach($langs as $langKey => $currentLang) {
            $html[] =  "<li><a rel='nofollow' href='javascript:selectLang(\"{$langKey}\")'>{$currentLang}</a></li>";
        }

        $html[] = "</ul>";
        echo implode('', $html);
    }

}
?>
