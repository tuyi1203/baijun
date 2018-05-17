<?php

//TODO 修改 消除require_once 将此类分解为插件和模块两个类
require_once APATH_LIBS_MODELS . DS . 'eku_user.php';

/**
 * @name 		clsAuth
 * @describe 	権限派生類
 * @author 		tuyi
 * @since 		2011/12/07
 * @version		v1.0
 */
class auth extends clsAuth {

    const LOGIN_NULL_PASS = 1 ; //ユーザー名かパスワードがNULLの場合
    const LOGIN_FAILED_THREE_TIMES = 2 ;//連続三回以上ログイン失敗の場合
    const LOGIN_NOT_EXISTS_USER = 3 ;//ユーザーが存在しない場合
    const LOGIN_LOCKED_USER = 4 ;//ユーザーがロックされている場合
    const LOGIN_WRONG_PASS = 5;//パスワードが間違った場合
    const LOGIN_SUCCESS = 6;//ログインに成功した場合
    const LOGIN_WRONG_CAPTCHA = 7;//画像認証が失敗した場合
    const LOGIN_NULL_CAPTCHA = 8;//画像認証文字がNULLの場合

    private $__oUserModel ;

    /**
     * @name 		__construct
     * @describe 	権限派生類構造関数
     * @param		clsAppSession Session類実例
     * @author 		tuyi
     * @since 		2011/12/07
     */
    public function __construct(clsMDB $a_oMdb , clsAppSession $a_oSession){

        parent::__construct($a_oSession);
        $this->__oUserModel = new Eku_User($a_oMdb, 'eku_user');
    }

    /**
     * @name 		fncLogin
     * @describe 	登録関数
     * @param		String	$a_stUser	用戸名
     * @param		String 	$a_stPass	密碼
     * @param       String  $a_stCaptcha 验证码
     * @return		boolean 登録成功時返回TRUE,否則返回FALSE
     * @author 		tuyi
     * @since 		2011/12/07
     */
    public function fncLogin($a_stUser , $a_stPass , $a_stCaptcha = null)
    {
        if (empty($a_stUser) || empty($a_stPass)) {
            //ユーザー名かパスワードがNULLの場合
            $this->subSetLoginStatus(self::LOGIN_NULL_PASS);
        }

        else if (!is_null($a_stCaptcha) and empty($a_stCaptcha)) {
            //画像認証文字がNULLの場合
            $this->subSetLoginStatus(self::LOGIN_NULL_CAPTCHA);
        }

//         else if ($this->_oSession->fncGetValue('_FailTimes') != null && $this->_oSession->fncGetValue('_FailTimes') >= 3) {
//             //             echo "11";
//             //連続三回以上ログイン失敗の場合
//             $this->subSetLoginStatus(self::LOGIN_FAILED_THREE_TIMES);
//         }
        else {
            //             $l_oConn = clsConnect::fncFactory(clsDbInfo::getDSN());
            if (!is_null($a_stCaptcha)) {
//                 if (!class_exists('captcha')) require APATH_LIBS_CAPTCHA . DS . 'captcha.php';
//                 $img = new captcha();
//                 if (!$img->check_word($a_stCaptcha)) {
//                     $this->subSetLoginStatus(self::LOGIN_WRONG_CAPTCHA);
//                     return $this->fncHandleLogin($a_stUser);
//                 }
  	               if (!class_exists('verify')) require APATH_LIBS_VERIFY . DS . 'verify.php';
   	               $verify = new verify();
            	   if (!$verify->check($a_stCaptcha , 1)) {
            	       $this->subSetLoginStatus(self::LOGIN_WRONG_CAPTCHA);
            	       return $this->fncHandleLogin($a_stUser);
            	   }
            }

            if (!$this->__oUserModel ->fncNotExistsUserCheck($a_stUser)) {
                //ユーザーが存在しない場合
                $this->subSetLoginStatus(self::LOGIN_NOT_EXISTS_USER);
            }
//             else if ($this->__oUserModel->fncLockedUserCheck($a_stUser)) {
//                 //ユーザーがロックされている場合
//                 $this->subSetLoginStatus(self::LOGIN_LOCKED_USER);
//             }
            else if ($this->__oUserModel->fncLoginSuccessCheck($a_stUser, crypt($a_stPass, C('PASSSALT')))) {
                //ログインに成功した場合
                $this->subSetLoginStatus(self::LOGIN_SUCCESS);
            } else {
                $this->subSetLoginStatus(self::LOGIN_WRONG_PASS);
            }
        }

        return $this->fncHandleLogin($a_stUser);
    }

    /**
     * @name 		fncHandleLogin
     * @describe 	登録状態処理
     * @param		string $a_stUser 登録ID
     * @return		boolean 登録成功時返回TRUE,否則返回FALSE
     * @author 		tuyi
     * @since 		2012/01/08
     */
    private function fncHandleLogin($a_stUser)
    {
        if ($this->fncGetLoginStatus() == self::LOGIN_SUCCESS) {
            $this->_oSession->subNewSessionId($a_stUser);
            $this->_oSession->subSetValue('_Account', $a_stUser);//保存用户账户
            $this->_oSession->subSetLifeTime();

            //删除登陆错误统计次数
            $this->_oSession->subUnsetValue('_FailTimes');
            return true ;
        } else {
            if ($this->fncGetLoginStatus() == self::LOGIN_NULL_PASS) {
                $this->_oSession->subAddErrMsg( "GLOBAL",
                        "帳号或密碼不能為空");
                //                 $this->_oSession->subSetErrMsg(clsAppXml::fncGetErrorMsg('2005'));
            }
//             else if ($this->fncGetLoginStatus() == self::LOGIN_FAILED_THREE_TIMES) {
//                 $this->_oSession->subAddErrMsg( "GLOBAL",
//                         "三次登録失敗、帳号已被管理員鎖定、請聯系管理員！");
//                 //                 $this->_oSession->subSetErrMsg(clsAppXml::fncGetErrorMsg('2002'));
//             }
            else if ($this->fncGetLoginStatus() == self::LOGIN_NOT_EXISTS_USER) {
                $this->_oSession->subAddErrMsg( "GLOBAL", "帳号不存在");
                //                 $this->_oSession->subSetErrMsg(clsAppXml::fncGetErrorMsg('2003'));
            }
//             else if ($this->fncGetLoginStatus() == self::LOGIN_LOCKED_USER) {
//                 $this->_oSession->subAddErrMsg( "GLOBAL", "帳号已被管理員鎖定、請聯系管理員！");
                //                 $this->_oSession->subSetErrMsg(clsAppXml::fncGetErrorMsg('2004'));
//             }
            else if ($this->fncGetLoginStatus() == self::LOGIN_NULL_CAPTCHA) {
                $this->_oSession->subAddErrMsg( "GLOBAL", "验证码不能为空");
            }
            else if ($this->fncGetLoginStatus() == self::LOGIN_WRONG_CAPTCHA) {
                $this->_oSession->subAddErrMsg( "GLOBAL", "验证码错误");
            }
            else if ($this->fncGetLoginStatus() == self::LOGIN_WRONG_PASS) {
                $this->_oSession->subAddErrMsg( "GLOBAL", "用戸名或密碼錯誤");
                //                 $this->_oSession->subSetErrMsg(clsAppXml::fncGetErrorMsg('2001'));
//                 if ($this->_oSession->fncGetValue('_FailTimes') == 3) {
//                     $this->__oUserModel->subLockUser($a_stUser);
//                 }
            }
//             echo "hello";
            $this->_oSession->subUnsetValue('_LifeTime');//登録失敗の場合、セッションの生存時間を消す
            $this->subSetFailTimes();
            return false ;
        }
    }

    /**
     * @name 		fncPassThrough
     * @describe 	登録状態検査関数
     * @return		boolean 登録状態検査通過時返回TRUE,否則返回FALSE
     * @author 		tuyi
     * @since 		2011/12/07
     */
    public function fncPassThrough()
    {
        // prdie($this->_oSession->fncGetValue('_LifeTime'));
        if ($this->_oSession->fncGetValue('_LifeTime') === null) {
            $this->_oSession->subAddErrMsg("GLOBAL", "請先登録");
        } else if ($this->_oSession->fncGetValue('_LifeTime') === 0) {
            return true;
        } else if ($this->_oSession->fncGetValue('_LifeTime') < time()) {
            $this->_oSession->subUnsetValue('_LifeTime');
            $this->_oSession->subAddErrMsg("GLOBAL", "請重新登録");
        } else {
            return true;
        }
        return false ;
    }

    /**
     * @name 		subSetFailTimes
     * @describe 	失敗回数設定
     * @author 		tuyi
     * @since 		2011/12/07
     */
    public function subSetFailTimes()
    {
        if ($this->_oSession->fncGetValue('_FailTimes') == null || ($this->_oSession->fncGetValue('_FailStart@') + C('FAILURE_TIME')) < time() )  {
            $this->_oSession->subSetValue('_FailTimes', 1);
            $this->_oSession->subSetValue('_FailStart@', time());
        } else {
            $this->_oSession->subSetValue('_FailTimes', $this->_oSession->fncGetValue('_FailTimes') + 1);
        }
    }

    public function subLogout()
    {
        $this->_oSession->subUnsetValue('_LifeTime');
        $this->_oSession->subSessionClear();
        $this->_oSession->subAddNotice( "GLOBAL", "謝謝使用");
    }

    public function subDeny()
    {
        $this->_oSession->subAddErrMsg( "GLOBAL", "請先登録");
    }

    public function subTimeOut()
    {
        $this->_oSession->subAddErrMsg( "GLOBAL", "請重新登録");
    }
}


