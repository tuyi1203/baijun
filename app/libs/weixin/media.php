<?php
/*
    图片（image）: 1M，支持JPG格式
    语音（voice）：2M，播放长度不超过60s，支持AMR\MP3格式
    视频（video）：10MB，支持MP4格式
    缩略图（thumb）：64KB，支持JPG格式
 */

class media {

	const HTTP_UPLOAD = 'http://file.api.weixin.qq.com/cgi-bin/media/upload?access_token=%s&type=%s';

	private static $accesstoken;


	//上传多媒体文件
	public static function upload($type , $filepath)
	{
		//如果取得accesstoken失败
		if (!(self::$accesstoken = accessToken::get())) return false;

		$filedata = array("media" => "@".$filepath);
		$url  = sprintf(self::HTTP_UPLOAD , self::$accesstoken , $type);
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
		curl_setopt($curl, CURLOPT_POST, 1);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $filedata);
		curl_setopt($curl, CURLOPT_TIMEOUT, 30); //设置超时限制防止死循环
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);//获取的信息以文件流的形式返回
		$result = curl_exec($curl); //执行一个curl会话
		if (($errmsg = curl_error($curl))) {
			clsLogger::subWriteSysExec('发布文本信息失败(发送CURL会话失败)');
			return false;
		}
		curl_close($curl); //关闭curl
		$result = json_decode($result , true);
		if (!empty($result['errcode'])) {
			clsLogger::subWriteSysExec('发布文本信息失败失败.错误代码：'.$result['errcode'].'错误消息：'.$result['errmsg']);
			return false;
		}

		return $result;
	}

	//下载多媒体文件
	public static function download()
	{

	}

}