<?php
// require_once(SMARTY_PATH . 'Smarty.class.php');
require EPATH_PLUGINS . DS . 'smarty' . DS . 'SmartyBC.class.php';
// require_once SMARTY_PATH . 'SmartyBC.class.php';

/**
 * @name 		clsSmarty
 * @describe 	Smarty拡張类
 * @author 		tuyi
 * @since 		2011/12/02
 * @version		v1.0
 * @modify      针对smarty3版本无法使用php标签问题进行修改
 */
// class clsSmarty extends Smarty
class clsSmarty extends SmartyBC
{

    public    $tplName;
    protected $app ;
    protected $clientlang;

    /**
     * @name 		__construct
     * @describe 	Smarty構造関数
     * @author 		tuyi
     * @since 		2011/12/02
     */
    public function __construct($a_stTempdir)
    {
        parent::__construct();

        $this->app = getAppIns();
        $this->clientlang = $this->app->getClientLang();

        $this->template_dir    = $a_stTempdir;
        $this->compile_dir     = APATH_VIEWS_C . DS;
        $this->use_sub_dirs    = true;
        $this->caching         = false;
        $this->error_reporting = 1;
        $this->debugging       = false;

        //2014.2.12 修改smarty的左右分隔符
        //         $this->left_delimiter = '<{';
        //         $this->right_delimiter = '}>';
        //2014.2.12

        //2014.5.19 修改smarty的左右分隔符
        $this->left_delimiter = '{{';
        $this->right_delimiter = '}}';
        //2014.5.19

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

        // アプリ用情報
        $this->assign('VERSION',$gExamAppVersion);

        // function registered
        $this->register_modifier("hs2br",array(&$this,"fncHs2br"));
        $this->register_modifier("hs2br_m",array(&$this,"fncHs2br_m"));
        $this->register_modifier("mb_truncate",array(&$this,"fncMbTruncate"));
        */
    }

    public function setTpl($a_stTplName) {
        if(is_dir($a_stTplName)) {
            $this->tplName = basename($a_stTplName);
            $this->template_dir = dirname($a_stTplName) . DS;
        } else
            $this->tplName = $a_stTplName;

    }
    ###########################################################################
    # 関数名         ：fncHs2br
    # 機能概要       ：html文字列をエスケープ及び改行コード直前に<br />を挿入（修正子関数）
    # 引数           ：なし
    # 戻り値         ：なし
    # 作成日         ：2005/10/14 作成者：芝原
    #2006/09/28 加藤 XHTML対応(改行を<br />に)
    ###########################################################################
    function fncHs2br($a_stStr)
    {
        return nl2br(htmlspecialchars($a_stStr));
    }

    ###########################################################################
    # 関数名         ：fncHs2br_m
    # 機能概要       ：html文字列をエスケープ及び改行コード直前に<br>を挿入（修正子関数）
    # 引数           ：なし
    # 戻り値         ：なし
    # 作成日         ：2005/10/14 作成者：芝原
    #2006/09/28 加藤 HTML対応(改行を<br>に、携帯専用)????????
    ###########################################################################
    function fncHs2br_m($a_stStr)
    {
        return str_replace("<br />","<br>",nl2br(htmlspecialchars($a_stStr)));
    }

    ###########################################################################
    # 関数名         ：fncMbTruncate
    # 機能概要       ：smarty truncate マルチバイト対応
    # 引数           ：なし
    # 戻り値         ：なし
    # 作成日         ：2006/06/16 作成者：
    ###########################################################################
    function fncMbTruncate($string, $length = 80, $etc = '...')
    {
        if ($length == 0) {
            return '';
        }
        if (strlen($string) > $length)
        {
            $length -= strlen($etc);
            return mb_strcut($string, 0, $length).$etc;
        }
        else
        {
            return $string;
        }
    }

    ##
    //     function subDispError($a_stMsg="",$a_aHiddenArr=array(),$a_stPrgNm="",$a_errorNm=4,$a_aHiddenNext=array(),&$a_Msgs=null)
    //     {
    //         $this->assign("Msg",$a_stMsg);
    //         $this->assign("HiddenArr",$a_aHiddenArr);
    //         $this->assign("PrgNm",$a_stPrgNm);
    //         $this->assign("Msgs",$a_Msgs);
    //         $this->assign("ErrorNm",$a_errorNm);
    //         $this->assign("HiddenNext",$a_aHiddenNext);
    //         $this->display("error_smarty.tpl");
    //     }

}
?>
