<?php
// 记录从微信服务器接收到的数据日志
function addWechatLog($data, $data_post = '') {
    $log = new stdClass();
    if (isset($data['MsgId'])) $log->msgid = $data['MsgId'];
    $log->ctime = $data['CreateTime'];
    $log->openid = $data['FromUserName'];
    $log->createtime = date ( 'Y-m-d H:i:s', $log->ctime );
    $log->data = is_array ( $data ) ? serialize ( $data ) : $data;
    $log->data_post = $data_post;
    $dao = getDAO();
    $dao->insert('wc_log')->data($log)->exec();
}