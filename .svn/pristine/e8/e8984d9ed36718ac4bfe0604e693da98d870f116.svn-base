<?php
/**
 * @name 		clsFactory
 * @describe 	clsFactory抽象基類
 * @author 		tuyi
 * @since 		2014/3/18
 * @version		v1.0
 */
abstract class clsFactory {

    //     public static $router = null;

    public static $app = null ;

    public function __construct() {

    }

    public static function getApplication($mode = "site") {
        //     	debug_print_backtrace();
        if (self::$app == null) {

            $router = new clsRouter($mode);

            self::$app =  $router->createApplication();

        }

        return self::$app;
    }
}