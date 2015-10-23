<?php

/**
 * @name 		clsAppController
 * @describe 	clsController派生類
 * @author 		tuyi
 * @since 		2014/12/8
 * @version		v2.0
 */
abstract class clsAddonController extends clsAppController{

        protected $data ;//从微信服务器接收的数据

        protected $oid ; //公众平台原始ID

        ###########################################################################
        # 名称			：__construct
        # 功能概要		            ：构造函数
        # 参数			：无
        # 返回值			：无
        # 初版作成日		：2014/12/8
        ###########################################################################
        public function __construct(){

            parent::__construct();

            if (isset($_REQUEST ['doNotInit'])) return true;

            $content = file_get_contents ( 'php://input' );
// $content = <<<EOT
// <xml>
// <ToUserName><![CDATA[toUser]]></ToUserName>
// <FromUserName><![CDATA[FromUser]]></FromUserName>
// <CreateTime>123456789</CreateTime>
// <MsgType><![CDATA[event]]></MsgType>
// <Event><![CDATA[subscribe]]></Event>
// </xml>
// EOT;
//             ! empty ( $content ) || die ( '这是微信请求的接口地址，直接在浏览器里无效' );
            $data = new \SimpleXMLElement ( $content );
//             $data or die ( '参数获取失败' );
            foreach ( $data as $key => $value ) {
                $this->data [$key] = strval ( $value );
            }

        }

        /* 回复文本消息 */
        public function replyText($content) {
            $msg ['Content'] = $content;
            $this->replyData ( $msg, 'text' );
        }

        /* 发送回复消息到微信平台 */
        private function replyData($msg, $msgType) {
            $msg ['ToUserName'] = $this->data ['FromUserName'];
            $msg ['FromUserName'] = $this->data ['ToUserName'];
            $msg ['CreateTime'] = NOW_TIME;
            $msg ['MsgType'] = $msgType;

            $xml = new \SimpleXMLElement ( '<xml></xml>' );
            $this->data2xml ( $xml, $msg );
            $str = $xml->asXML ();

            // 记录日志
            addWechatLog ( $str, '_replyData' );

            echo ( $str );
        }

        /* 组装xml数据 */
        public function data2xml($xml, $data, $item = 'item') {
            foreach ( $data as $key => $value ) {
                is_numeric ( $key ) && ($key = $item);
                if (is_array ( $value ) || is_object ( $value )) {
                    $child = $xml->addChild ( $key );
                    $this->data2xml ( $child, $value, $item );
                } else {
                    if (is_numeric ( $value )) {
                        $child = $xml->addChild ( $key, $value );
                    } else {
                        $child = $xml->addChild ( $key );
                        $node = dom_import_simplexml ( $child );
                        $node->appendChild ( $node->ownerDocument->createCDATASection ( $value ) );
                    }
                }
            }
        }
}
?>