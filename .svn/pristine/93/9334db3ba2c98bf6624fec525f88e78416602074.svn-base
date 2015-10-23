<?php
class member {

    const LIST_URL = 'https://api.weixin.qq.com/cgi-bin/user/get?access_token=%s&next_openid=%s';

    const MEMBERINFO_URL = 'https://api.weixin.qq.com/cgi-bin/user/info?access_token=%s&openid=%s&lang=zh_CN';

    const PULL_MAX = 10000;//单次拉去最大数量

    private static $accesstoken;

    private function __construct(){}

    public static function getList() {

        //如果取得accesstoken失败
        if (!(self::$accesstoken = accessToken::get())) return false;

        self::getAll(self::$accesstoken , $memberlist , '');

        if ($memberlist) {
            $list = array();
            $mh = curl_multi_init();
            for ($i = 0 ; $i < count($memberlist); $i++) {
                $ch{$i} = curl_init();
                curl_setopt($ch{$i}, CURLOPT_SSL_VERIFYPEER, FALSE); // 对认证证书来源的检查--省略会报错
                curl_setopt($ch{$i}, CURLOPT_TIMEOUT, 1); // 设置超时限制防止死循环
                curl_setopt($ch{$i}, CURLOPT_HEADER, 0); // 显示返回的Header区域内容
                curl_setopt($ch{$i}, CURLOPT_RETURNTRANSFER, true);// 设置cURL 参数，要求结果保存到字符串中还是输出到屏幕上。
                curl_setopt($ch{$i}, CURLOPT_URL, vsprintf(self::MEMBERINFO_URL , array(self::$accesstoken , $memberlist[$i])));// 设置要访问的URL
                curl_multi_add_handle($mh, $ch{$i});
            }

            // 一括で通信実行、全て終わるのを待つ
            $running = null;
            do { curl_multi_exec($mh, $running);
            } while ( $running );

            for ($i = 0 ; $i < count($memberlist); $i++) {
                if (curl_errno($ch{$i})) {
                    clsLogger::subWriteSysError("HTTP请求失败." .curl_error($ch{$i}) . '(' .  __FILE__ . __LINE__ . ')');
                } else {
                    $result = json_decode(curl_multi_getcontent($ch{$i}) , true);
                    if (!empty($result['errcode'])) {
                        clsLogger::subWriteSysExec('拉取个人信息失败.错误代码：'.$result['errcode'].'错误消息：'.$result['errmsg']);
                    } else {
                        $list[$memberlist[$i]] = $result;
                    }
                }
                curl_multi_remove_handle($mh, $ch{$i});
                curl_close($ch{$i});
            }
        }

        if (!empty($list)) {
            return $list;
        }
        return false;
    }

    //递归拉取所有用户列表
    private static function getAll($accesstoken , &$memberlist , $nextopenid = null) {

        if (!is_null($nextopenid)) {

            $url = vsprintf(self::LIST_URL , array(self::$accesstoken , $nextopenid));
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url);// 设置要访问的URL
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE); // 对认证证书来源的检查--省略会报错
            curl_setopt($curl, CURLOPT_TIMEOUT, 30); // 设置超时限制防止死循环
            curl_setopt($curl, CURLOPT_HEADER, 0); // 显示返回的Header区域内容
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);// 设置cURL 参数，要求结果保存到字符串中还是输出到屏幕上。
            $result = curl_exec($curl);//运行cURL，请求access_token
            if (curl_errno($curl)) {
                clsLogger::subWriteSysError("HTTP请求失败." .curl_error($curl) . '(' .  __FILE__ . __LINE__ . ')');
            } else {
                $list = json_decode($result, true);
            }
            curl_close($curl);//关闭URL请求
            if (isset($list)) {
                if ($list['count'] >= self::PULL_MAX) {
                    self::getAll($accesstoken, $memberlist , $list['next_openid']);
                } else {
                    for ($i = 0; $i < $list['count']; $i++) {
                        $memberlist[] = $list['data']['openid'][$i];
                    }
                }
            }
        }
    }
}
