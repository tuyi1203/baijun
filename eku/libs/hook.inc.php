<?php
defined('_EKU') or die;


/**
 * 钩子类
 * @author  tuyi
 * @date    2014.5.7
 * @version v2.0
 */
class clsHook {

    public static $actionhooks = array();

    public static $filterhooks = array();

    public static $actions = array
    (
            "_default",
            "_list",
            "_insert",
            "_update",
            "_delete",
            "_upload",
            "_download",
            "_login",
            "loginOKRedirect",
            "_logout",
            "_paging",
            "_sort",
            "_publish",
            "_quickreply",
            "_settop",
            "_reply"
     );


    public static $filters = array(
            "_display",
    );


    /**
     * 动作钩子注册函数
     * @param string $a_stActionName 动作名称
     * @param string $a_stFunctionName 挂在钩子上的函数名称  可以是单独的函数名，也可以形如array(classname , funcname)
     * @param int $a_iPriorit 执行顺序    默认为10，注册相同顺序的钩子时，按照注册先后顺序执行
     * @param array $a_aArgs
     * @param string $a_stPeriod 前后位 (默认pre) 'pre'或者'after'
     * 注册后钩子队列形如:$actionhooks['_default']['pre']['10'][0]=	array(
     'class'    => 'MyClass',
     'function' => 'Myfunction',
     'params'   => array('beer', 'wine', 'snacks')
     );
     *
     *
     *
     *
     */
    public static function addAction ($a_stActionName , $a_stFunctionName , $a_aArgs  , $a_iPriorit = 10 , $a_stPeriod = 'pre') {

        if (!in_array($a_stActionName , self::$actions)) {

            clsLogger::subWriteSysError("注册动作钩子失败：不存在此动作" . $a_stActionName . __FILE__ . "[" .  __LINE__ . "]");
            return;

        }

        if (!is_array($a_stFunctionName)) {

            if (!function_exists($a_stFunctionName)) {
                //检查函数是否存在
                clsLogger::subWriteSysError("注册动作钩子失败：不存在此函数" . $a_stFunctionName . __FILE__ . "[" .  __LINE__ . "]");
                return;

            }

        }

        if (is_array($a_stFunctionName)) {
            //检查类和函数是否存在
            if (!file_exists(APATH_PLUGINS . DS . strtolower(str_replace('PI_', '', $a_stFunctionName[0])) . '.php')) {

                //检查函数是否存在
                clsLogger::subWriteSysError("注册动作钩子失败：不存在此文件" . strtolower(str_replace('PI_', '', $a_stFunctionName[0])) . '.php' . __FILE__ . "[" .  __LINE__ . "]");
                return;

            }
            // echo "load1";
            if (!class_exists($a_stFunctionName[0])) {

                require APATH_PLUGINS . DS . strtolower(str_replace('PI_', '', $a_stFunctionName[0])) . '.php';

            }

            if (!method_exists(new $a_stFunctionName[0], $a_stFunctionName[1])) {
                //检查函数是否存在
                clsLogger::subWriteSysError("注册动作钩子失败：类" . $a_stFunctionName[0] . '中不存在此方法'. $a_stFunctionName[1] . __FILE__ . "[" .  __LINE__ . "]");
                return;


            }

        }

        //注册
        $clsn = '';
        $fn = $a_stFunctionName;

        if (is_array($a_stFunctionName)) {

            $clsn = $a_stFunctionName[0];
            $fn = $a_stFunctionName[1];

        }

        self::$actionhooks[$a_stActionName][$a_stPeriod][$a_iPriorit][] = array(
                'class'    => $clsn,
                'function' => $fn,
                'params'   => $a_aArgs
        );

    }

    /**
     * 注销动作钩子函数
     * @param string $a_stActionName
     * @param mix $a_stFunctionName
     * @param string $a_stPeriod
     */
    public static function removeAction($a_stActionName , $a_stFunctionName , $a_stPeriod = 'pre') {

        if (isset(self::$actionhooks[$a_stActionName][$a_stPeriod])) {

            foreach (self::$actionhooks[$a_stActionName][$a_stPeriod] as $i => $fns) {

                foreach ($fns as $j => $fn)

                    if ($fn['class'] . $fn['functions'] == is_array($a_stFunctionName) ? $a_stFunctionName[0].$a_stFfunctionName[1]:$a_stFunctionName)
                    unset(self::$actionhooks[$a_stActionName][$a_stPeriod][$j]);
            }

        }

    }

    /**
     * 侦听并执行钩子函数
     * @param string $a_stAction 动作名
     * @param string $a_stPeriod 前后位
     */
    public static function listenHook($a_stAction , $a_stPeriod) {
// pr(self::$actionhooks[$a_stAction]);
        if (isset(self::$actionhooks[$a_stAction]) && isset(self::$actionhooks[$a_stAction][$a_stPeriod])) {
            // pr(self::$actionhooks[$a_stAction][$a_stPeriod]);
            foreach (self::$actionhooks[$a_stAction][$a_stPeriod] as $index => $fns) {
                // pr($fns);
                foreach ($fns as $i => $fn) {

                    if ($fn['class'] == "") {

                        if (!function_exists($fn['function'])) {
                            clsLogger::subWriteSysError("执行钩子失败：不存在此函数" . $fn['function'] . __FILE__ . "[" .  __LINE__ . "]");
                            continue;
                        }

                        call_user_func_array($fn['function'] , $fn['params']);

                    }

                    if($fn['class'] != "") {
                        // echo "_";
                        if (!class_exists($fn['class'])) {

                            if (!file_exists(APATH_PLUGINS . DS . strtolower(str_replace('PI_', '', $fn['class'])) . '.php')) {

                                clsLogger::subWriteSysError("执行钩子失败：不存在此文件" . strtolower(str_replace('PI_', '', $fn['class'])) . '.php' . __FILE__ . "[" .  __LINE__ . "]");
                                continue;

                            }
                            // echo "load2";
                            require APATH_PLUGINS . DS . strtolower(str_replace('PI_', '', $fn['class'])) . '.php';

                        }
                        call_user_func_array(array(new $fn['class'], $fn['function']), $fn['params']);

                    }

                }

            }

        }

    }


    /**
     * 过滤器注册函数
     * @param string $a_stActionName 动作名称
     * @param string $a_stFunctionName 挂在钩子上的函数名称  可以是单独的函数名，也可以形如array(classname , funcname)
     * @param array $a_aArgs
     * 注册后钩子队列形如:$actionhooks['display']['10'][0]=	array(
     'class'    => 'MyClass',
     'function' => 'Myfunction',
     'params'   => array('beer', 'wine', 'snacks')
     );
     *
     */
    public static function addFilter ($a_stActionName , $a_stFunctionName , $a_aArgs ) {

        if (!in_array($a_stActionName , self::$filters)) {

            clsLogger::subWriteSysError("注册过滤器失败：不存在此动作(" . $a_stActionName . ')' . __FILE__ . "[" .  __LINE__ . "]");
            return;

        }

        if (!is_array($a_stFunctionName)) {

            if (!function_exists($a_stFunctionName)) {
                //检查函数是否存在
                clsLogger::subWriteSysError("注册过滤器失败：不存在此函数(" . $a_stFunctionName . ')' . __FILE__ . "[" .  __LINE__ . "]");
                return;

            }

        }

        if (is_array($a_stFunctionName)) {
            //检查类和函数是否存在
            if (!file_exists(APATH_PLUGINS . DS . strtolower(str_replace('PI_', '', $a_stFunctionName[0])) . '.php')) {

                //检查函数是否存在
                clsLogger::subWriteSysError("注册过滤器失败：不存在此文件" . strtolower(str_replace('PI_', '', $a_stFunctionName[0])) . '.php' . __FILE__ . "[" .  __LINE__ . "]");
                return;

            }
            // echo "load1";
            if (!class_exists($a_stFunctionName[0])) {

                require APATH_PLUGINS . DS . strtolower(str_replace('PI_', '', $a_stFunctionName[0])) . '.php';

            }

            if (!method_exists(new $a_stFunctionName[0], $a_stFunctionName[1])) {
                //检查函数是否存在
                clsLogger::subWriteSysError("注册过滤器失败：类" . $a_stFunctionName[0] . '中不存在此方法'. $a_stFunctionName[1] . __FILE__ . "[" .  __LINE__ . "]");
                return;


            }

        }

        //注册
        $clsn = '';
        $fn = $a_stFunctionName;

        if (is_array($a_stFunctionName)) {

            $clsn = $a_stFunctionName[0];
            $fn = $a_stFunctionName[1];

        }

        self::$filterhooks[$a_stActionName][] = array(
                'class'    => $clsn,
                'function' => $fn,
                'params'   => $a_aArgs
        );

    }

    /**
     * 注销过滤器函数
     * @param string $a_stActionName
     * @param mix $a_stFunctionName
     * @param string $a_stPeriod
     */
    public static function removeFilter($a_stActionName , $a_stFunctionName ) {

        if (isset(self::$filters[$a_stActionName])) {

            foreach (self::$filters[$a_stActionName] as $i => $fns) {

                foreach ($fns as $j => $fn)

                    if ($fn['class'] . $fn['functions'] == is_array($a_stFunctionName) ? $a_stFunctionName[0].$a_stFfunctionName[1]:$a_stFunctionName)
                    unset(self::$filterhooks[$a_stActionName][$j]);
            }

        }

    }

    /**
     * 侦听并执行过滤器函数
     * @param string $a_stAction 动作名
     * @param string $callback  处理过滤操作的函数名
     */
    public static function listenFilter($a_stAction)
    {
        if (isset(self::$filterhooks[$a_stAction])) {

            foreach (self::$filterhooks[$a_stAction] as $index => $fn) {

                if ($fn['class'] == "") {

                    if (!function_exists($fn['function'])) {
                        clsLogger::subWriteSysError("执行钩子失败：不存在此函数" . $fn['function'] . __FILE__ . "[" .  __LINE__ . "]");
                        continue;
                    }

                    $fn['function']($fn['params']);

                }

                if($fn['class'] != "") {
                    // echo "_";
                    if (!class_exists($fn['class'])) {

                        if (!file_exists(APATH_PLUGINS . DS . strtolower(str_replace('PI_', '', $fn['class'])) . '.php')) {

                            clsLogger::subWriteSysError("执行钩子失败：不存在此文件" . strtolower(str_replace('PI_', '', $fn['class'])) . '.php' . __FILE__ . "[" .  __LINE__ . "]");
                            continue;

                        }
                        // echo "load2";
                        require APATH_PLUGINS . DS . strtolower(str_replace('PI_', '', $fn['class'])) . '.php';

                    }
//                     pr($fn['params']);
                    call_user_func_array(array(new $fn['class'], $fn['function']), array($fn['params']));

                }


            }

        }

    }

}