<?php
/**
 * @name 		clsAppSession
 * @describe 	session派生類
 * @author 		tuyi
 * @since 		2011/12/07
 * @version		v1.0
 */
class clsAppSession extends clsSession{

    /**
     * @name 		__construct
     * @describe 	構造関数
     * @param	int $a_iLifeTime 	Session的有效时间(当此参数为0或空时，
     * 								有效时间持续到关闭浏览器时，不同浏览
     * 								器之间存在差异)
     * 			String $a_stPath	Session.Cookie的作用域(当使用网络主机时，
     * 								強烈建议指定此参数)
     * @author 		tuyi
     * @since 		2011/12/07
     */
    public function __construct($a_stPath = null , $a_stDomain = null){

        if (C('life_time')) {

            $this->_iLifeTime = C('life_time');

        } else {

            $this->_iLifeTime = 0;

        }
        //         echo $this->_iLifeTime;
        parent::__construct($this->_iLifeTime , $a_stPath , $a_stDomain);
    }


    /**
     * 取得登陆用户ID
     */
    public function getUid()
    {
        return $this->fncGetValue('_UserId');
    }

    /**
     * 取得用户角色ID
     */
    public function getRid()
    {
        return $this->fncGetValue('_RoleId');
    }

    /**
     * 取得用户名
     * @return string <該Index的値, NULL, unknown, mixed>
     */
    public function getUserName()
    {
        return $this->fncGetValue('_UserName');
    }
    /**
     * @name   		subSetErrMsg
     * @describe	保存錯誤消息
     * @param		array $a_aMsg 錯誤消息
     * @author 		tuyi
     * @since  		2011/12/07
     */
    public function subSetErrMsg($a_aMsg)
    {
        $this->subSetValue('ErrMsg' , $a_aMsg);
    }

    /**
     * @name   		fncGetErrMsg
     * @describe		取得錯誤消息
     * @return 		array 錯誤消息
     * @author 		tuyi
     * @since  		2011/12/07
     */
    public function fncGetErrMsg()
    {
        $l_aMsg = $this->fncGetValue('ErrMsg') ;
        $this->subUnsetValue('ErrMsg');
        return $l_aMsg ;
    }

    /**
     * @name   		subSetNotice
     * @describe		保存Notice
     * @param		array $a_aMsg Notice
     * @author 		tuyi
     * @since  		2011/12/07
     */
    public function subSetNotice($a_aMsg)
    {
        $this->subSetValue('Notice' , $a_aMsg);
    }

    /**
     * @name   		fncGetNotice
     * @describe		取得Notice
     * @return 		array Notice
     * @author 		tuyi
     * @since  		2011/12/07
     */
    public function fncGetNotice()
    {
        $l_aNotice = $this->fncGetValue('Notice');
        $this->subUnsetValue('Notice');
        return $l_aNotice == null ? array() : $l_aNotice ;
    }

    /**
     * 向SESSION中添加提示消息
     * @param string $scope
     * @param string $message
     */
    public function subAddNotice($scope , $message) {

        $notice = $this->fncGetNotice();

        $notice[$scope] = $message ;

        $this->subSetNotice($notice);

    }

    /**
     * 向SESSION中添加错误信息(分项目显示错误信息对应)
     * @param string $scope
     * @param string $message
     */
    public function subAddErrMsg($scope ,$message) {

        $errmsg = $this->fncGetErrMsg();

        $errmsg[$scope] = $message ;

        $this->subSetErrMsg($errmsg);
    }

    /**
     * 析構构関数（関閉Session）
     * @name   __destruct
     * @author tuyi
     * @since  2011/12/07
     */
    public function __destruct(){
        parent::__destruct();
    }
}
?>