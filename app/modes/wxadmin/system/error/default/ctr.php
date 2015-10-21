<?php
class clsSystemErrorDefaultController extends clsAppController
{

    public function _error() {
// pr($_SESSION);
        $runMethod = 'page'. $this->input->id;
// echo $runMethod;
        if (method_exists($this , $runMethod)) {
            $this->$runMethod();
        }
    }

    /**
     * 404页面
     */
    public function page404() {
// echo "hello";exit;
        if (config::$debug) debug_print_backtrace();
//         $this->output->link = 'home_default-default-default.html';
        $this->output->link = './';
        $this->smarty->setTpl($this->app->wwwroot . DS . '404.html');
        clsLogger::subWriteAccessErr('访问错误的页面（URL：'.$this->app->getPreUri().'）');
//         exit;
    }

    public function page403() {

    }

    public function page110() {
        if (config::$debug) debug_print_backtrace();
        $this->output->link = 'home_default-default-default.html';
        $this->smarty->setTpl($this->app->wwwroot . DS . '110.html');
        clsLogger::subWriteAccessErr('发生错误（URL：'.$this->app->getPreUri().'）');
    }

    /**
     * 禁止访问页设置
     *
     * @param  string $type
     * @param  string $showtime
     * @param  string $link
     * @param  string $linkname
     * @param  string $require
     * @access public
     * @return void
     */
    public function pageDeny($type , $showtime , $link, $linkname , $require=null ) {

        if($type == 'auth') {
            clsLogger::subWriteSysError("用户:".getUserName().",访问未授权的页面uri：" . $this->uri);
            $this->lang->forbidden->message = $this->lang->forbidden->auth;
        }

        if($type == 'require') {
            clsLogger::subWriteSysError("{$linkname}未设置,"."用户:".getUserName().",尝试访问页面uri：" . $this->uri . "受限");
            $this->lang->forbidden->message = sprintf($this->lang->forbidden->require , $require , $require);
        }

        $this->lang->forbidden->locate = sprintf($this->lang->forbidden->locate , $showtime , $linkname);
        $this->output->link = $link;
        $this->smarty->setTpl($this->app->wwwroot . DS . 'forbidden.html');
        $this->display();
        exit;

    }

}
