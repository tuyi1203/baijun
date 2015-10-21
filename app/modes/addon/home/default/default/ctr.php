<?php
class clsHomeDefaultDefaultController extends clsAddonController implements IAction_default{

    public function _default () {

        // 删除微信传递的token干扰
//         unset ( $_REQUEST ['token'] );

        // 获取数据
        $data = $this->data;
//         pr($data);
        if (! empty ( $data ['ToUserName'] )) {
            oid ( $data ['ToUserName'] );
        }
        if (! empty ( $data ['FromUserName'] )) {
            session ( 'openid', $data ['FromUserName'] );
        }

        $this->oid = $data ['FromUserName'];

//         $this->initFollow ( $weixin );粉丝信息初始化
//         addWechatLog ( $data, $GLOBALS ['HTTP_RAW_POST_DATA'] );

        if ($this->duplicate($data)) die("");//排重操作
        // 记录日志
        addWechatLog ( $data );

        //记录用户发送的消息
        if ('event' != strtolower($data['MsgType'])) {
            $this->addMessage($data);
        }

        //回复数据
        $this->reply ( $data , '_replyData');

        // 结束程序。
        exit ();
    }

    private function reply($data)
    {
        $key   = isset($data ['Content'])?$data['Content']:'';
        $msgtype = strtolower ( $data ['MsgType'] );
        $keywordArr = array ();

        /**
         * 通过微信事件来定位处理的插件
         * event可能的值：
         * subscribe : 关注公众号
         * unsubscribe : 取消关注公众号
         * scan : 扫描带参数二维码事件
         * click : 自定义菜单事件
         */
        if ($msgtype == 'event') {
            $event = strtolower ( $data ['Event'] );
//             foreach ( $addon_list as $vo ) {
//                 require_once ONETHINK_ADDON_PATH . $vo ['name'] . '/Model/WeixinAddonModel.class.php';
//                 $model = D ( 'Addons://' . $vo ['name'] . '/WeixinAddon' );
//                 method_exists ( $model, $event ) && $model->$event ( $data );

//             }
            $ctrller = $this->loadController('addon.autoreplay.default.default');
            method_exists ( $ctrller, '_'.$event ) && $ctrller->{'_'.$event} ( $data );
            if ($event == 'click' && ! empty ( $data ['EventKey'] )) {
                $key = $data ['Content'] = $data ['EventKey'];
            } else {
                return true;
            }
        }
    }


    //记录用户发送的消息
    private function addMessage($data)
    {
        $type = array(
            "text"  => '1',
            "image" => '2',
            "voice" => '3',
            "video" => '4',
            "location" => '5',
            "link"     => '6'
        );
        $input = new stdClass();
        $input->createtime = $data['CreateTime'];
        $input->openid     = $data['FromUserName'];
        $input->msgid      = $data['MsgId'];
        $input->msgtype    = $type[$data['MsgType']];
        if ($data['MsgType'] == 'text') {
            $input->content = $data['Content'];
        }
        if ($data['MsgType'] == 'image') {
            $input->picurl  = $data['PicUrl'];
            $input->mediaid = $data['MediaId'];
        }
        if ($data['MsgType'] == 'voice') {
            $input->mediaid = $data['MediaId'];
            $input->format  = $data['Format'];
        }
        if ($data['MsgType'] == 'video') {
            $input->mediaid      = $data['MediaId'];
            $input->ThumbMediaId = $data['ThumbMediaId'];
        }
        if ($data['MsgType'] == 'location') {
            $input->location_x = $dta['Location_X'];
            $input->location_y = $dta['Location_Y'];
            $input->scale = $dta['Scale'];
            $input->label = $dta['Label'];
        }
        if ($data['MsgType'] == 'link') {
            $input->title       = $data['Title'];
            $input->description = $data['Description'];
            $input->url         = $data['Url'];
        }
        $this->model->addMessage($input);
    }

    //检查重复数据
    private function duplicate($data)
    {
        $input = new stdClass();
        if ($data['MsgType'] == 'event') {
            $input->ctime  = $data['CreateTime'];
            $input->openid = $data['FromUserName'];
        } else {
            $input->msgid = $data['MsgId'];
        }
        if($this->model->duplicate($input)) return true;
        return false;
    }
}