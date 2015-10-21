<?php
/**
 * @name 		accessToken
 * @describe 	accessToken類
 * @author 		tuyi
 * @since 		2014/12/11
 * @version		v1.0
 */
class accessToken {

//     const TIMELIMIT = 7200;//accesstoken的生命时间为2小时（7200秒）

    const DELAY  = 600;//accesstoken的过期缓冲时间为10分钟（600秒）

    const HTTP_URL = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=%s&secret=%s";

    const TRY_TIMES = 3;

    private static $appid;

    private static $appsecret;

    private function __construct(){}

    /**
     * @name 		get
     * @describe 	取得accesstoken
     * @author 		tuyi
     * @param       $refresh   强制刷新
     * @since 		2014/12/11
     */
    public static function get($refresh = false)
    {
        if (!$refresh) {
            //如果session中存在accesstoken，且token的生存时间并未过期且未到晚期，则使用该token
            if (session('accesstoken') && (session('accesstoken_expiretime') - self::DELAY > time())) {
                return session('accesstoken');
            } else if(!session('accesstoken')){//如果session中不存在accesstoken,但数据库中accesstoken没有过期，则使用
                $accessToken = getToken();
                $expireTime  =  getTokenExpireTime();
                if (!empty($accessToken) and is_int($expireTime) and ( $expireTime - self::DELAY > time())) {
                    session(array('accesstoken'=>$accessToken , 'accesstoken_expiretime'=>$expireTime));
                    return $accessToken;
                }
            }
        }

        //从数据库获取APPID和APPSECRET
        $settings = getWechatSetting();
        foreach ($settings as $setting) {
            if ('appid' == strtolower($setting->subkey)) {
                self::$appid = $setting->value;
            }
            if ('appsecret' == strtolower($setting->subkey)) {
                self::$appsecret = $setting->value;
            }
        }

        //尝试重新获取accesstoken
        if (($accessToken = self::tryGetAccessToken(self::$appid , self::$appsecret , self::TRY_TIMES))) {
            $accessToken['expiretime'] = $accessToken['expires_in'] + time();
            //如果获取成功则更新数据库
            updateToken($accessToken);
            //同时更新session
            session(array('accesstoken'=>$accessToken['access_token'] , 'accesstoken_expiretime'=>$accessToken['expiretime']));
            return $accessToken['access_token'];
        }
        return;
    }

    /**
     * @name 		tryGetAccessToken
     * @describe 	递归获取从微信服务器获得accesstoken
     * @param       $appid
     * @param       $appsecret
     * @$times      $times 递归获取的次数
     */
    private static function tryGetAccessToken($appid , $appsecret , $times = 3)
    {
        if ($times > 0) {
            $url = vsprintf(self::HTTP_URL , array($appid , $appsecret));
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);// 设置要访问的URL
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE); // 对认证证书来源的检查--省略会报错
            curl_setopt($curl, CURLOPT_TIMEOUT, 30); // 设置超时限制防止死循环
            curl_setopt($curl, CURLOPT_HEADER, 0); // 显示返回的Header区域内容
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);// 设置cURL 参数，要求结果保存到字符串中还是输出到屏幕上。
            $result = curl_exec($curl);//运行cURL，请求access_token
            if (curl_errno($curl)) {
                clsLogger::subWriteSysError("HTTP请求失败." .curl_error($curl));
            } else {
                $token = json_decode($result, true);
            }
            curl_close($curl);//关闭URL请求
            if (isset($token) and isset($token['access_token'])) {
                return $token;
            } else {
                clsLogger::subWriteSysError("第".(self::TRY_TIMES - $times+1)."次获取accesstoken失败。错误码：".$token['errcode']."。错误消息：" .$token['message']);
                return self::tryGetAccessToken($appid, $appsecret , $times--);
            }
        }
        return;
    }


}