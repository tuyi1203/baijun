<?php
/**
 * @name 		clsException
 * @describe 	抽象异常基类
 * @author 		tuyi
 * @since 		2011/12/01
 * @version		v1.0
 */
abstract class clsException extends Exception
{
    protected $__stErrMsg ; //錯誤消息

    /**
     * 顕示出错页面
     * @author		tuyi
     * @since 		2011/12/01
     */
    public function subShowErrPage($a_stLink=null)
    {
        $l_oSmarty = new clsSmarty(APATH_VIEWS . DS);
        $l_oSmarty->assign('ERRMSG' , '');
        //             $l_oSmarty->assign('LINK' , $a_stLink);
        //             $l_stHtml = str_replace("<!-- ERR_MSG -->" , "",file_get_contents(APP_VIEWS . DS . 'error.tpl' , true)) ;
        if(defined('DEBUG') && DEBUG == "1"){
            $l_oSmarty->assign("ERRMSG" , $this->__stErrMsg) ;
        }
        $l_oSmarty->display('error.tpl');
    }
}