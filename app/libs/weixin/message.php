<?php
class message {

    const HTTP_URL = 'https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token=%s';

    private static $accesstoken;

    private function __construct(){}

    public static function sendText($openid , $content)
    {
        //如果取得accesstoken失败
        if (!(self::$accesstoken = accessToken::get())) return false;
        $type = 'text';
        $data = array('touser'=>$openid ,
                        'msgtype' => $type ,
                        'text' => array('content'=>$content));
		return self::send($data);
    }

    public static function sendImage($openid , $imagefileid)
    {
    	//如果取得accesstoken失败
    	if (!(self::$accesstoken = accessToken::get())) return false;

		//取图片文件的media_id
		$file = self::getFile($imagefileid);

		$type = 'image';

		//如果没有media_id,则上传图片文件取得新的mediaid，并更新文件数据的media_id字段
		if (!$file->mediaid) {
			//上传图片文件
			$result = media::upload($type, $file->filepath);

			if (!isset($result['media_id'])) return false;

			//发送图片数据
			$data = array('touser'=>$openid ,
					'msgtype' => $type ,
					'image' => array('media_id'=>$result['media_id']));
			if(!self::send($data)) return false;

			//更新图片mediaid
			self::updateMediaID($imagefileid, $result['media_id']);
		}

		if ($file->mediaid){//如果有media_id则使用该media_id进行消息发送
			//发送图片数据
			$data = array(
					'touser'=>$openid ,
					'msgtype' => $type ,
					'image' => array('media_id'=>$file->mediaid)
			);

			//发送消息
			if(!self::send($data , $error)) {//如果是media_id失效的情况
				//TODO
				//上传文件重新获取media_id
				$result = media::upload($type, $file->filepath);
				if (!isset($result['media_id'])) return false;

				//重新发送消息
				if(!self::send($data)) return false;

				//更新文件mediaid
				self::updateMediaID($imagefileid, $result['media_id']);
			}
		}
		return true;
    }


    private static function send($data , &$error=null)
    {
    	$url = sprintf(self::HTTP_URL , self::$accesstoken);
    	$curl = curl_init(); //启动一个curl会话
    	curl_setopt($curl, CURLOPT_URL, $url); //要访问的地址
    	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); //对认证证书来源的检查
    	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 1); //从证书中检查SSL加密算法是否存在
    	curl_setopt($curl, CURLOPT_POST, 1); //发送一个常规的Post请求
    	curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data , JSON_UNESCAPED_UNICODE)); //Post提交的数据包
    	curl_setopt($curl, CURLOPT_TIMEOUT, 30); //设置超时限制防止死循环
    	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); //获取的信息以文件流的形式返回
    	$result = curl_exec($curl); //执行一个curl会话
    	if (($errmsg = curl_error($curl))) {
    		clsLogger::subWriteSysExec('发送CURL会话失败(发送信息失败)');
    		return false;
    	}
    	curl_close($curl); //关闭curl
    	$result = json_decode($result , true);
    	if (!empty($result['errcode'])) {
    		$error = $result;
    		clsLogger::subWriteSysExec('发送信息失败失败.错误代码：'.$result['errcode'].'错误消息：'.$result['errmsg']);
    		return false;
    	}
    	return true;
    }

    //取得mediaID
    private static function getFile($fileid)
    {
    	$dao = getDAO();
    	$row = $dao->select()->from('wc_file')
    				->where('id')->eq($fileid)
    				->fetch();
    	return $row;
    }

    //更新mediaID
    private static function updateMediaID($fileid , $mediaid)
    {
    	$dao = getDAO();
    	$data = new stdClass();
    	$data->mediaid = $mediaid;
    	$dao->update('wc_file')->data($data)
		    	->where('id')->eq($fileid)
		    	->exec();
    	return $dao->isFail();
    }
}
