<?php
if(!class_exists('auth')) {

    require APATH_SYS_PATH . DS . 'auth' . DS . 'auth.php';

}

class clsSystemLoginDefaultController extends clsAppController{

    /**
     * 默认初始化页面方法
     */
    public function _log() {
// pr("hello world");
        if ($this->setCaptcha()) $this->smarty->assign("captcha_enable" , "1");
    }

    public function _login() {

//         pr($this->input);
        $l_oAuth = new auth($this->mdb , $this->session);
        $login_ok = false;
//         var_dump($this->setCaptcha());
        if ($this->setCaptcha()) {
            if ($l_oAuth->fncLogin($this->input->user_name, $this->input->pass_word , empty($this->input->captcha_word)?"":$this->input->captcha_word ))
                $login_ok = true;
        } else {
            if ($l_oAuth->fncLogin($this->input->user_name, $this->input->pass_word))
                $login_ok = true;
        }

//         if($l_oAuth->fncLogin($this->input->user_name, $this->input->pass_word , $this->input->captcha_word)) {
//             if ($this->session->fncGetValue('premodule') != "" and $this->session->fncGetValue('premodule') != "system_login") {
                //当从非登陆页面跳转到登陆页时，返回前一页面
//                 $this->app->doAction('loginOKRedirect' , array($this->app->getPreUri()));
//             } else {
                //当正常从登陆页登陆时，跳转到登陆后页面
//                 $this->app->doAction('loginOKRedirect' , array($this->app->getEntranceUri()));
//             }

//         } else {

            //         	$this->smarty->setTpl('index.html') ;
            //echo "登陆失败!";
//         }

                //当正常从登陆页登陆时，跳转到登陆后页面
        if ($login_ok) {
            $this->app->doAction('loginOKRedirect' , U(C('ENTRANCEURI')));
            session('_sysname', C('sysname'));//保存系统名称
        } else if ($this->setCaptcha()) {
            $this->smarty->assign("captcha_enable" , "1");
        }

    }

    public function _logout() {

        $l_oAuth = new auth($this->mdb , $this->session);

        $l_oAuth->subLogout();

        if ($this->setCaptcha())
            $this->smarty->assign("captcha_enable" , "1");

    }

    public function loginOKRedirect($url) {
        // pr(0);
        saveActionAuthList(true);
        saveAdminMenu(true);
        session('_sysname', C('sysname'));//保存系统名称
        $this->redirect($url);
    }

    private function setCaptcha() {
        $captchaset = intval(getCaptchaSet());
//         pr(session('_FailTimes'));
        if (C('captcha_admin') & $captchaset)
            return true;
        else if ((C('CAPTCHA_LOGIN_FAIL') & $captchaset) &&
                (session('_FailTimes') != null && session('_FailTimes') >= C('LOGIN_FAILTIMES')))
            return true;

        return false;

    }
}