<?php
/**
 * @name 		clsSession
 * @describe 	session類
 * @author 		tuyi
 * @since 		2011/12/06
 * @version		v1.0
 */
abstract class clsSession{

    protected $_iLifeTime ;
    protected $_stSessionId ;

    /**
     * @name 		__construct
     * @describe 	構造関数
     * @param	int $a_iLifeTime 	Session的有效时间(当此参数为0或空时，
     * 								有效时间持续到关闭浏览器时，不同浏览
     * 								器之间存在差异)
     * 			String $a_stPath	Session.Cookie的作用域(当使用网络主机时，
     * 								強烈建议指定此参数)
     * @author 		tuyi
     * @since 		2011/12/06
     */
    public function __construct($a_iLifeTime = null , $a_stPath = null  , $a_stDomain = null){
        if(!is_null($a_iLifeTime)){
            $this->_iLifeTime = $a_iLifeTime ;
        }
        if(!is_null($a_iLifeTime) && !is_null($a_stPath) && !is_null($a_stPath)){
            session_set_cookie_params($a_iLifeTime , $a_stPath , $a_stDomain) ;
        }
        //2014.2.11
        //采用uploadify插件，对文件进行异步上传操作时，由于该插件调用的flash控件，造成
        //上传时没有提交cookie所以服务器无法获取到session，所以无法通过登陆验证，而出现
        //302（重定向）错误,解决办法是将session_id的值传到服务器端。
        //------↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
        if (array_key_exists('sessionid', $_POST)) {
            session_id($_POST['sessionid']);
        }
        //------↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
        //2014.2.11
        session_start() ;
        if(array_key_exists('_LifeTime' , $_SESSION)){
            if($_SESSION['_LifeTime'] > time()){
                $this->_stSessionId = session_id() ;
                //2014.6.6 页面只进行异步操作时无法更新session有效时间问题对应
                //------↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
                $_SESSION['_LifeTime'] = time() + $this->_iLifeTime ;
                //------↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑

                //2014.9.16 对应cookie生命周期，无法由session_set_cookie_params函数更新
                //而造成cookie在登陆一小时后过期问题。
                //------↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
                setcookie(session_name() , $this->_stSessionId , $_SESSION['_LifeTime'] , $a_stPath , $a_stDomain);
                //------↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
            }else{
                $this->_stSessionId = null ;
            }
        }else{
            $this->_stSessionId = null ;
        }

        register_shutdown_function(array(&$this, 'subCloseSession'));
    }

    /**
     * 延長session的有效时间并关闭
     * @name   subCloseSession
     * @author tuyi
     * @since  2011/12/06
     */
    public function subCloseSession(){
        //2014.6.6
        //页面只进行异步操作时无法更新session有效时间问题对应
        //------↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓
//         if(array_key_exists('_LifeTime', $_SESSION)) {

//             $_SESSION['_LifeTime'] = time() + $this->_iLifeTime ;

//         }
        //------↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑
        session_write_close();
    }

    /**
     * 取得session的ID
     * @name   fncGetSessId
     * @author tuyi
     * @since  2011/12/06
     */
    public function fncGetSessId(){
        return $this->_stSessionId ;
    }

    /**
     * 将値設定到Session中
     * @name   subSetValue
     * @param  String $key Index名
     * @param  mixed $value 値
     * @author tuyi
     * @since  2011/12/06
     */
    function subSetValue($key , $value)
    {
        if (is_object($value)) {
            $_SESSION[$key] = serialize($value);
        }else{
            $_SESSION[$key] = $value ;
        }
    }


    /**
     * 取得保存在Session中的値
     * @name   fncGetValue
     * @param  String $key Index名
     * @author tuyi
     * @since  2011/12/06
     * @return 該Index的値
     */
    function fncGetValue($key)
    {

        if (!array_key_exists($key, $_SESSION)) {

            return null ;

        }

        if (is_object($key)) {
            return unserialize($_SESSION[$key]);
        }

        return $_SESSION[$key] ;
    }

    /**
     * 削除Session中的鍵値対
     * @name   subUnsetValue
     * @param  String $key Index名
     * @author tuyi
     * @since  2011/12/06
     */
    function subUnsetValue($key)
    {
        //         $this->subSetValue("keys",$this->fncGetValue('keys').'|'.$key);
        //         if ($key == "_LifeTime") {
        //             echo "hello";
        //         }
        unset($_SESSION[$key]);
    }

    /**
     * 発行新的SessionId
     * @name   subNewSessionId
     * @author tuyi
     * @since  2011/12/06
     */
    public function subNewSessionId(){
        if(!session_id()){
            session_start() ;
            $this->_stSessionId = session_id() ;
        }else{
            session_regenerate_id(true);
            $this->_stSessionId = session_id() ;
        }
    }

    /**
     * セッションの有効期限を設定する
     * 設定方法：現在の時間＋SESSION_LIFE_TIME
     */
    public function subSetLifeTime()
    {
        $_SESSION['_LifeTime'] = time() + C('LIFE_TIME');
    }

    /**
     * @name   		subSetErrMsg
     * @describe	保存錯誤消息
     * @param		String $a_aMsg 錯誤消息
     * @author 		tuyi
     * @since  		2011/12/07
     */

    abstract public function subSetErrMsg($a_aMsg);

    /**
     * @name   		fncGetErrMsg
     * @describe	取得錯誤消息
     * @return 		String 錯誤消息
     * @author 		tuyi
     * @since  		2011/12/07
     */
    abstract public function fncGetErrMsg();

    /**
     * @name   		subSetNotice
     * @describe	保存Notice
     * @param		String $a_stMsg Notice
     * @author 		tuyi
     * @since  		2011/12/07
     */
    abstract public function subSetNotice($a_aMsg);

    /**
     * @name   		fncGetNotice
     * @describe	取得Notice
     * @return 		String Notice
     * @author 		tuyi
     * @since  		2011/12/07
     */
    abstract public function fncGetNotice();
    /**
     * 析構构関数（関閉Session）
     * @name   __destruct
     * @author tuyi
     * @since  2011/12/06
     */
    public function __destruct(){
        if(session_id()){
            $this->subCloseSession() ;
        }
    }
}
?>