<?php
/**
 * @name 		clsAuth
 * @describe 	権限抽象基類
 * @author 		tuyi
 * @since 		2011/12/07
 * @version		v1.0
 */
abstract class clsAuth {

    protected $_oSession;
    private $_iLoginStatus;

    /**
     * @name 		__construct
     * @describe 	権限基類構造関数
     * @param		clsAppSession Session類実例
     * @author 		tuyi
     * @since 		2011/12/07
     */
    public function __construct(clsAppSession $a_oSession)
    {
        $this->_oSession = $a_oSession;
    }

    abstract public function fncPassThrough();

    /**
     * @name 		subSetLoginStatus
     * @describe 	設定登録状態
     * @param		$a_iStatus :int 登録状態
     * @author 		tuyi
     * @since 		2012/01/08
     */
    protected function subSetLoginStatus($a_iStatus)
    {
        $this->_iLoginStatus = $a_iStatus;
    }

    /**
     * @name 		fncGetLoginStatus
     * @describe 	取得登録状態
     * @author 		tuyi
     * @since 		2012/01/08
     */
    protected function fncGetLoginStatus()
    {
        return $this->_iLoginStatus;
    }

    /**
     * @name 		fncLogin
     * @describe 	登録関数
     * @param		String	$a_stUser	用戸名
     * @param		String 	$a_stPass	密碼
     * @return		boolean 登録成功時返回TRUE,否則返回FALSE
     * @author 		tuyi
     * @since 		2011/12/07
     */
    abstract public function fncLogin($a_stUser , $a_stPass);
}
