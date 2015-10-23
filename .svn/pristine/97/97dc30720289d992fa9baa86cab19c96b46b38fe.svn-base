<?php
// 获取和设置微信公众平台的OID(原始ID)
function oid($token = NULL) {
    if ($token !== NULL) {
        session ( 'token', $token );
    } elseif (! empty ( $_REQUEST ['token'] )) {
        session ( 'token', $_REQUEST ['token'] );
    }
    $token = session ( 'token' );

    if (empty ( $token )) {
        return - 1;
    }

    return $token;
}

// 公众号粉丝信息初始化
function initFollow() {
    $map ['token'] = oid ();
    if ($dao === false) {
        $public_name = M ( 'member_public' )->where ( $map )->getField ( 'public_name' );
        $this->assign ( 'page_title', $public_name ); // 用公众号名作为默认的页面标题
    }

    // 管理员不需要再初始化,但需要对插件的管理权限进行判断
    if (is_login ()) {
        $token_status = D ( 'Common/AddonStatus' )->getList ( true );
        if ($token_status [_ADDONS] == - 1) {
            $this->error ( '你没有权限管理和配置该插件' );
        }
        return true;
    }

    // 当前粉丝信息
    $map ['openid'] = get_openid ();
    $user = M ( 'follow' )->where ( $map )->find ();

    // 绑定配置
    $config = getAddonConfig ( 'UserCenter' );
    if ($config ['need_bind'] == 1 && ($user ['id'] > 0 && $user ['status'] < 2) && ! empty ( $map ['token'] ) && ! empty ( $map ['openid'] ) && $map ['token'] != - 1 && $map ['token'] != - 1) {

        $bind_url = addons_url ( 'UserCenter://UserCenter/edit', $map );
        if ($dao === false) {
            if ($config ['bind_start'] != 1 && strtolower ( $_REQUEST ['_addons'] ) != 'usercenter') {
                Cookie ( '__forward__', $_SERVER ['REQUEST_URI'] );
                redirect ( $bind_url );
            }
        } else {
            if ($config ['bind_start'] != 0) {
                $dao->replyText ( '请先<a href="' . $bind_url . '">绑定帐号</a>再使用' );
                exit ();
            }
        }
    }

    if (! $user) {
        $user ['status'] = 0; // 未关注、游客

        $user ['id'] = session ( 'mid' );
        if (! $user ['id']) {
            $youke_uid = M ( 'config' )->where ( 'name="FOLLOW_YOUKE_UID"' )->getField ( 'value' ) - 1;
            $user ['id'] = $youke_uid;
            M ( 'config' )->where ( 'name="FOLLOW_YOUKE_UID"' )->setField ( 'value', $youke_uid );
        }
    }
    $user ['uid'] = $user ['id'];

    // 当前登录者
    $GLOBALS ['mid'] = $this->mid = intval ( $user ['uid'] );
    $GLOBALS ['user'] = $user;

    // 当前访问对象的uid
    $GLOBALS ['uid'] = $this->uid = intval ( $_REQUEST ['uid'] == 0 ? $this->mid : $_REQUEST ['uid'] );

    $this->assign ( 'mid', $this->mid ); // 登录者
    $this->assign ( 'uid', $this->uid ); // 访问对象

    session ( 'mid', $this->mid );
    session ( 'is_follow_login', 1 ); // 记录这是粉丝的信息，以便与管理员的登录信息区分
}

function getData() {

}

