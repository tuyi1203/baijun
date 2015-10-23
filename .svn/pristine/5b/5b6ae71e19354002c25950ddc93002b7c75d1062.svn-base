<?php
class customMenu {

    private static $host = 'mp.weixin.qq.com';//主机
    private static $origin = 'https://mp.weixin.qq.com';
    private static $referer;//引用地址
    private static $userAgent = 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:23.0) Gecko/20100101 Firefox/23.0';
    private static $accesstoken;
    private static $createmenuUrl = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=%s";
    private static $getHeader = 0;//是否显示Header信息

    private function __construct(){}

    public static function create($input)
    {
        //如果取得accesstoken失败
        if (!(self::$accesstoken = accessToken::get())) return false;

        self::$createmenuUrl = sprintf(self::$createmenuUrl , self::$accesstoken);
        $menuData = json_encode($input , JSON_UNESCAPED_UNICODE);

        $header = array(
                'Accept:*/*',
                'Accept-Charset:GBK,utf-8;q=0.7,*;q=0.3',
                'Accept-Encoding:gzip,deflate,sdch',
                'Accept-Language:zh-CN,zh;q=0.8',
                'Connection:keep-alive',
                'Host:'.self::$host,
                'Origin:'.self::$origin,
                // 				'Referer:'.self::$referer,
                'X-Requested-With:XMLHttpRequest'
        );
        $curl = curl_init(); //启动一个curl会话
        curl_setopt($curl, CURLOPT_URL, self::$createmenuUrl); //要访问的地址
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header); //设置HTTP头字段的数组
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); //对认证证书来源的检查
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 1); //从证书中检查SSL加密算法是否存在
        curl_setopt($curl, CURLOPT_USERAGENT, self::$userAgent); //模拟用户使用的浏览器
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1); //使用自动跳转
        curl_setopt($curl, CURLOPT_AUTOREFERER, 1); //自动设置Referer
        curl_setopt($curl, CURLOPT_POST, 1); //发送一个常规的Post请求
        curl_setopt($curl, CURLOPT_POSTFIELDS, $menuData); //Post提交的数据包
        // 		curl_setopt($curl, CURLOPT_COOKIE, self::$cookie); //读取储存的Cookie信息
        curl_setopt($curl, CURLOPT_TIMEOUT, 30); //设置超时限制防止死循环
        curl_setopt($curl, CURLOPT_HEADER, self::$getHeader); //显示返回的Header区域内容
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); //获取的信息以文件流的形式返回
        $result = curl_exec($curl); //执行一个curl会话
        if (($errmsg = curl_error($curl))) {
            clsLogger::subWriteSysExec('发布自定义菜单时，发送CURL回话失败.');
            return false;
        }
        curl_close($curl); //关闭curl
        $result = json_decode($result , true);
        if (!empty($result['errcode'])) {
            clsLogger::subWriteSysExec('发布自定义菜单失败.错误代码：'.$result['errcode'].'错误消息：'.$result['errmsg']);
            return false;
        }
        return true;
    }

}