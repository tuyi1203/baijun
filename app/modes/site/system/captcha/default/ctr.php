<?php
class clsSystemCaptchaDefaultController extends clsAppController{

    /**
     * 默认初始化页面方法
     */

    public function _create() {

    	if (!class_exists('verify')) require APATH_LIBS_VERIFY . DS . 'verify.php';
    	$verify = new verify();
    	@ob_end_clean(); //清除之前出现的多余输入
//     	var_dump($verify->entry ( 1 ));
    	$verify->entry ( 1 );
    	exit;

    }

}