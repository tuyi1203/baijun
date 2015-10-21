<?php
defined('_EKU') or die();

function page404()
{
    //TODO 更好的解决方案
    $ctr = getCtr();
    $ctr->page404();
}

function getLang()
{
    $app = getAppIns();
    return $app->getLang();
}

/**
 * 取得客户端设置的语言
 */
function getClientLang()
{
	$app = getAppIns();
	return $app->getClientLang();
}

/**
 * 将对象转换为数组(stdClass类适用)
 * @param object $obj
 * @return ArrayObject
 */
function obj2array($obj)
{
    return json_decode(json_encode($obj) , true);
}

function getAppIns()
{
    return clsFactory::getApplication();
}

function getSessIns()
{
    $app = getAppIns();
    return $app->getSess();
}

function session($key , $val=null)
{
    $session = getSessIns();
    //批量导入
    if (is_array($key)) {
        foreach ($key as $k => $v) {
            $session->subSetValue($k , $v);
        }
        return;
    }
    //取值
    if (is_null($val))  return $session->fncGetValue($key);
    //设置单个值
    return $session->subSetValue($key , $val);
}

function getSmarty()
{
    $app = getAppIns();
    return $app->getSmarty();
}

function getCtr()
{

    $app = getAppIns();
    return $app->getCtr();
}

function redirect($url)
{
    $ctrl = getCtr();
    $ctrl->redirect($url);
}

function getPost()
{
    $app = getAppIns();
    return $app->getPost();
}

function getGet()
{
    $app = getAppIns();
    return $app->getGet();
}

function getMDB()
{
    $app = getAppIns();
    return $app->getMDB();
}

function getDBH() {
    return clsDBH::factory(getDSN());
}

function getDAO() {
    $app = getAppIns();
    return $app->getDAO();
}

function getCookie() {
    $app = getAppIns();
    return $app->getCookie();
}


function getInput() {
    $app = getAppIns();
    return $app->getInput();
}

/**
 * 判断是否SSL协议
 * @return boolean
 */
function is_ssl()
{
    if(isset($_SERVER['HTTPS']) && ('1' == $_SERVER['HTTPS'] || 'on' == strtolower($_SERVER['HTTPS']))){
        return true;
    }elseif(isset($_SERVER['SERVER_PORT']) && ('443' == $_SERVER['SERVER_PORT'] )) {
        return true;
    }
    return false;
}

/**
 * URL组装 支持不同URL模式
 * @param string $url URL表达式，格式：'[模式/父模块/子模块/脚本/操作#锚点@域名]?参数1=值1&参数2=值2...'
 * @param string|array $vars 传入的参数，支持数组和字符串
 * @param string|boolean $suffix 伪静态后缀，默认为true表示获取配置值
 * @param boolean $domain 是否显示域名
 * @return string
 */
function U($url='',$vars='',$suffix=true , $domain=true)
{
    // 解析URL
    $info   =  parse_url($url);

    //如果没有则使用当前动作
    $url    =  !empty($info['path'])?$info['path']:MODE . '/' . MODULE . '/'  . SCRIPT . '/' .ACTION;

    if(isset($info['fragment'])) { // 解析锚点
        $anchor =   $info['fragment'];
        if(false !== strpos($anchor,'?')) { // 解析参数
            list($anchor,$info['query']) = explode('?',$anchor,2);
        }
        if(false !== strpos($anchor,'@')) { // 解析域名
            list($anchor,$host)    =   explode('@',$anchor, 2);
        }
    }elseif(false !== strpos($url,'@')) { // 解析域名
        list($url,$host)    =   explode('@',$info['path'], 2);
    }


    //取得分隔符
    $depr = C('URL_PATHINFO_DEPR');

    // 解析子域名
    if(isset($host)) {
        $domain = $host . (strpos($host,'.')?'':strstr($_SERVER['HTTP_HOST'],'.'));
    }elseif($domain===true){

        $domain = C('SITE_DOMAIN')!=""?C('SITE_DOMAIN'):$_SERVER['HTTP_HOST']  ;
//         defined('SITE_DOMAIN') and $domain = SITE_DOMAIN;
        if(C('APP_SUB_DOMAIN_DEPLOY') ) { // 开启子域名部署
            $domain = $domain=='localhost'?'localhost':'www'.strstr($_SERVER['HTTP_HOST'],'.');
            // '子域名'=>array('模块[/控制器]');
            foreach (C('APP_SUB_DOMAIN_RULES') as $key => $rule) {
                $rule   =   is_array($rule)?$rule[0]:$rule;
                if(false === strpos($key,'*') && 0 === strpos($url,$rule)) {
                    $domain = $key . strstr($domain,'.'); // 生成对应子域名
                    $url    =  substr_replace($url,'',0,strlen($rule)+1);//去掉‘/’
                    break;
                }
            }
        }
    }


    // 解析参数
    if(is_string($vars)) { // aaa=1&bbb=2 转换成数组
        parse_str($vars,$vars);
    }elseif(!is_array($vars)){
        $vars = array();
    }
    if(isset($info['query'])) { // 解析地址里面参数 合并到vars
        parse_str($info['query'],$params);
        $vars = array_merge($params,$vars);
    }
    $info['params'] = $vars;


    //处理后缀
    if ($suffix) {
        if ($suffix !== true) {
            $info['suffix'] = $suffix;
        } else {
            if (false !== strstr($url , '.')) {
                $info['suffix'] = strstr($url , '.');
            } else {
                $info['suffix'] = C('URL_DEFAULT_SUFFIX');
            }
        }
        if (false !== strstr($url , '.')) {
        	$url = strstr($url  , '.' , true);
        }
    } else {
        $info['suffix'] = '';
    }

    //省略模式的形式
    if (!preg_match('/^('.MODES.'+)/', $url)){
        //省略模式时
        $url = MODE . $depr .  $url ;
    }

    //省略脚本和动作的形式
    if (($parts = count(explode($depr, $url))) < 5) {
        if ($parts < 4) $url .= $depr . C('DEFAULT_SCRIPT');
        $url .= $depr . C('DEFAULT_ACTION');
    }

    // 添加参数
    if(!empty($info['params'])) {
        foreach ($info['params'] as $var => $val){
            if('' !== trim($val))   $url .= $depr . $var . $depr . urlencode($val);
        }
    }
// pr($info);
    if($domain) {
        $url   =  (is_ssl()?'https://':'http://') . $domain . $depr . (C('SITE_ROOT') != ""?C('SITE_ROOT').$depr:""). C('SITE_ENTRANCE_FILE') . $depr . $url . $info['suffix'];
    }

    if(isset($anchor)){
        $url  .= '#'.$anchor;
    }

//     trace();
    return $url;
}

/**
 * 获取和设置配置参数 支持批量定义和获取
 * @param string|array $name 配置变量
 * @param mixed $value 配置值
 * @return mixed
 */
function C($name=null, $value=null,$default=null)
{
    static $_config = array();
    // 无参数时获取所有
    if (empty($name)) {
        return $_config;
    }
    // 优先执行设置获取或赋值
    if (is_string($name)) {
        //批量获取
        if (strpos($name, ',')) {
            $name = strtoupper($name);
            if (is_null($value)) {
                $return = array();
                foreach (explode(',', $name) as $k) {
                    $k = trim($k);
                    if (isset($_config[$k])) $return[$k] = $_config[$k];
                }
                return $return;
            }
        }
        if (!strpos($name, '.')) {
            $name = strtoupper($name);
            if (is_null($value))
                return isset($_config[$name]) ? $_config[$name] : $default;
            $_config[$name] = $value;
            return null;
        }
        // 二维数组设置和获取支持
        $name = explode('.', $name);
        $name[0]   =  strtoupper($name[0]);
        if (is_null($value))
            return isset($_config[$name[0]][$name[1]]) ? $_config[$name[0]][$name[1]] : $default;
        $_config[$name[0]][$name[1]] = $value;
        return null;
    }
    // 批量设置
    if (is_array($name)){
        $_config = array_merge($_config, array_change_key_case($name,CASE_UPPER));
        return null;
    }
    return null; // 避免非法参数
}

/**
 * 取得连接数据库用DSN
 * @param mixed $value 配置值
 * @return mixed
 */
function getDSN()
{
    return C('DRIVER,DBSYNTAX,USERNAME,PASSWORD,PROTOCOL,HOST,PORT,SOCKET,DATABASE,CHARSET,NEW_LINK,PERSISTANT');
}

/**
 * 调试用输出到前台函数
 * @param mixed $value 配置值
 * @return mixed
 */
function pr($a)
{
    if (C('debug')) {
        echo "<pre>";
        print_r($a);
        echo "</pre>";
    }
}

/**
 * 调试用输出trace到前台函数
 * @param mixed $value 配置值
 * @return mixed
 */
function trace($return = false)
{
    if (C('debug')) {
    	if ($return) {
    		ob_start();
    		debug_print_backtrace();
    		$trace = ob_get_contents();
    		ob_end_clean();
    		return $trace;
    	} else {
    		echo "<pre>";
    		debug_print_backtrace();
    		echo "</pre>";
    	}
    }
}


// $content = <<<EOT
// <script type="text/javascript" language="javascript" src="{:T('js/jquery-1.8.3.min.js')}"></script>
// <script type="text/javascript" language="javascript" src="{:T('js/common.js')}"></script>
// <script type="text/javascript" language="javascript" src="{:T('js/jquery-1.8.3.min.js')}"></script>
// <script type="text/javascript" language="javascript" src="js/slider.js"></script>
// EOT;

// T($content);exit;

/**
 * 字符批量转义函数
 * @param string $str 需转义字符串
 * @return 转义后字符串
 */
function transfer($str) {
    $search  = array('{', '}');
    $replace = array('\\{', '\\}');
    return str_replace($search, $replace, $str);
}

function remove_dw_comments($tpl_source, &$smarty)
{
    return preg_replace("/<!--#.*-->/U","",$tpl_source);
    //去除原tpl文件中的注释，使其在编译后的文件中不显示
}


/**
 * 模板过滤器驱动
 * @param mixed $args 需要使用的过滤器名
 * @return 模板字符串
 */
function outputFilterDriver($filtername) {
	$smarty = getSmarty();
	$smarty->register_outputfilter($filtername);
}

/**
 * 模板函数过滤器
 * 变量输出使用的函数可以支持内置的PHP函数或者用户自定义函数，甚至是静态方法。
 * @param mixed $value 配置值
 * @return 模板字符串
 *
 */
function functionFilter($tpl_source, &$smarty)
{
    /**********************************单个函数执行替换方案*****************************/
//     $pattern = '/('.transfer('{:'). '([^\(]+)\([\'|\"](.+?)[\'|\"]\)' .transfer('}').').*?/i';
//     if (preg_match_all($pattern , $tpl_source , $funs)) {//取出所有函数
//         for ($i = 0; $i < count($funs[1]); $i++ ) {
//             if (!in_array($funs[1][$i] , $searchArr)) {
//                 $searchArr[$i]  = $funs[1][$i];
//                 $replaceArr[$i] = $funs[2][$i]($funs[3][$i]);
//             }
//         }

//         $tpl_source = str_replace($searchArr, $replaceArr, $tpl_source);
//     }

    /**********************************支持复PHP代码执行替换方案*****************************/
    $pattern = '/('.transfer('{:'). '([^\(]+\((.+?)\))' .transfer('}').').*?/i';
	if (preg_match_all($pattern , $tpl_source , $funs)) {//取出所有函数
		for ($i = 0; $i < count($funs[1]); $i++ ) {
			$searchArr[$i]  = $funs[1][$i];
			$replaceArr[$i] = eval('return ' . $funs[2][$i] . ';');
		}

		$tpl_source = str_replace($searchArr, $replaceArr, $tpl_source);
	}

	return $tpl_source;
}

/**
 * 模板用静态文件URL转换函数
 * @param string $url 转换前字符串 规则如:[css|js|images]/XX.[js|css|jpeg]
 * @return 转换后字符串
 */
function T($url)
{
	return '/' . (C('SITE_ROOT')!= "" ? C('SITE_ROOT').'/':"") . C('SITE_PUBLIC') . '/' . MODE . '/' . $url;
}

/**
 * 上传文件URL转换函数
 * @param string $url 转换前字符串 规则如:[201412/e1bb571b7c41d85938098ac2debb0f90.png]
 * @return 转换后字符串
 */
function P($url)
{
    return '/' . (C('SITE_ROOT')!= "" ? C('SITE_ROOT').'/':"") . C('SITE_UPLOAD') . '/' . $url;
}
