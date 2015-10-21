<?php
/********************钩子函数*************************************************/
/**
 * 检查登陆状态
 * 未登录时跳转到登陆页面
 * @param void
 * @return void
 */
function checkLogin()
{
    $loginurl  = U ("admin/system/login/default/log.html");
    // echo getMode();exit;
    $auth     = getAuthIns();
    $apptype  = APPTYPE;


    if (!$auth ->fncPassThrough()) {

        if (APPTYPE == ".json") {
            $ctr = getCtr();
            $ctr->send(array("result"=>"success" , "locate"=>$loginurl));
        }
        redirect($loginurl);

        return;
    }
}

/**
 * 判断用户是否有执行动作权限
 * @author tuyi
 * @date 2014.5.15
 */
function checkAuth()
{
    $loginurl  = U ("admin/system/login/default/log.html");
    $signinurl = U ("admin/system/login/default/login.html");
    $action_auth_list = session('action_auth_list');
    $app              = getAppIns();
    $mode             = MODE;
    $ctr              = getCtr();
    $uri              = MODULE . '/' . SCRIPT . '/' . ltrim(ACTION , '_');
    $lang             = getLang();

    if (!isset($action_auth_list[$mode])
            or !isset($action_auth_list[$mode][$uri])
            or $action_auth_list[$mode][$uri]['operauth'] != "1"
    ) {

        if (!isset($action_auth_list[$mode])) {
            clsLogger::subWriteSysError("访问URL{$uri}失败：动作权限表中不存在此模式：{$mode}");
        } else if(!isset($action_auth_list[$mode][$uri])) {
            clsLogger::subWriteSysError("访问URL{$uri}失败：动作权限表中不存在此URI:{$uri}");
        } else if($action_auth_list[$mode][$uri]['operauth'] != "1") {
            clsLogger::subWriteSysError("访问URL{$uri}失败：动作权限表中此角色的动作操作权限不为1");
        }

        //判断回到前页还是回到首页
        $preuri = getPreUri();
        // echo $preuri;
        if ($preuri and $preuri != $uri) {
            $sentence = $lang->prepage;
        } else {
            $sentence = $lang->home;
            $preuri = C('ENTRANCEURI');
        }


        if ($preuri == $signinurl )
            $preuri = $loginurl;
        // echo $preuri;exit;
        //             if (in_array($apptype, array('html','modal')) ) $ctr->loadController($mode.'.system.error.default')
        //                                         ->pageDeny('auth', 5 , $preuri, $sentence);

        //2014.9.16 修改为无权限时一律回到首页
        $preuri = U(C('ENTRANCEURI'));
        if (in_array(APPTYPE, array('.html','.modal')) ) $ctr->loadController('admin.system.error.default')
                        ->pageDeny('auth', 5 , $preuri, $sentence);
        if (APPTYPE == '.json') {
            $output = new stdClass();
            $output->result  = 'fail';
            $output->message = $lang->forbidden->auth;
            $ctr->send($output);
        }
    }
}

/**
 * 取得动作-权限一览表并保存到session
 * @author tuyi
 * @date 2014.5.15
 */
function saveActionAuthList() {
    //         $mode = getMode();
    //     if (!class_exists('Eku_Role_Action')) require APATH_LIBS_MODELS . DS . 'eku_role_action.php';
    $model = new Eku_Role_Action( getMDB(), 'eku_role_action');
    $l_aOutput = $model->fncGetList(array('roleid'=>getRid()));
    //         pr($l_aOutput);
    $l_aList = array();
    // pr($l_aOutput);
    foreach ($l_aOutput as $record) {

        $l_aList[$record['mode']][$record['url']]['pid'] = $record['pid'];
        $l_aList[$record['mode']][$record['url']]['cid'] = $record['cid'];
        $l_aList[$record['mode']][$record['url']]['sid'] = $record['sid'];
        $l_aList[$record['mode']][$record['url']]['aid'] = $record['aid'];
        $l_aList[$record['mode']][$record['url']]['pname'] = $record['pname'];
        $l_aList[$record['mode']][$record['url']]['cname'] = $record['cname'];
        $l_aList[$record['mode']][$record['url']]['sname'] = $record['sname'];
        $l_aList[$record['mode']][$record['url']]['aname'] = $record['aname'];
        $l_aList[$record['mode']][$record['url']]['roleid'] = $record['roleid'];
        $l_aList[$record['mode']][$record['url']]['operauth'] = $record['operauth'];

    }
    //设置menulist到session
    session('action_auth_list' , $l_aList);
    //         		pr($l_aList);exit;
}

/**
 * 菜单生成钩子函数
 * @author tuyi
 * @date 2014.5.9
 *
 */
function saveAdminMenu()
{
    // echo getMode();exit;
    // 		$l_oAuth = getAuthIns();

    //         if ($l_oAuth ->fncPassThrough()) {

    //         	$rid = getRid();

    // 			$l_oModel = new Eku_Role_Menu(getMDB(), 'eku_role_menu');
    if (!class_exists('Eku_Role_Action')) require APATH_LIBS_MODELS . DS . 'eku_role_action.php';
    $l_oModel = new Eku_Role_Action(getMDB(), 'eku_role_action');

    // 			$l_aOutput = $l_oModel->fncGetList(array('roleid'=>getRid()));
    // pr($l_aOutput);exit;
    $l_aOutput = $l_oModel->fncGetMenuList(array('roleid'=>getRid()));
    $l_aMenulist = array();
    // pr($l_aOutput);exit;
    // 			foreach ($l_aOutput as $record) {

    // 				$l_aMenulist[$record['PARENTID']]['url'] = $record['URL'];
    // 				$l_aMenulist[$record['PARENTID']]['des'] = $record['DES'];
    // 				$l_aMenulist[$record['PARENTID']]['name'] = $record['NAME'];

    // 				if ($record['CHILDID'] != null) {

    // 					$l_aMenulist[$record['PARENTID']]['child'][$record['CHILDID']]['des'] = $record['DES2'];
    // 					$l_aMenulist[$record['PARENTID']]['child'][$record['CHILDID']]['url'] = $record['URL2'];
    // 					$l_aMenulist[$record['PARENTID']]['child'][$record['CHILDID']]['name'] = $record['NAME2'];

    // 				}

    // 			}

    $moduleid = null;
    $url1 = null;

    foreach ($l_aOutput as $record) {

        if ($record['pid'] != $moduleid) {

            $url1 = $record['url'];
            $moduleid = $record['pid'];
        }

        //多语言对应


        $l_aMenulist[$record['mode']][$record['sort1']][$record['pid']]['url']    = U($record['mode']. '/' . $url1);
        $l_aMenulist[$record['mode']][$record['sort1']][$record['pid']]['des']    = $record['des1'];
        $l_aMenulist[$record['mode']][$record['sort1']][$record['pid']]['des_en'] = $record['des1_en'];
        $l_aMenulist[$record['mode']][$record['sort1']][$record['pid']]['name']   = $record['fname'];

        $l_aMenulist[$record['mode']][$record['sort1']][$record['pid']]['child'][$record['cid']]['des']    = $record['des2'];
        $l_aMenulist[$record['mode']][$record['sort1']][$record['pid']]['child'][$record['cid']]['des_en'] = $record['des2_en'];
        $l_aMenulist[$record['mode']][$record['sort1']][$record['pid']]['child'][$record['cid']]['url']    = U($record['mode']. '/' . $record['url']);
        $l_aMenulist[$record['mode']][$record['sort1']][$record['pid']]['child'][$record['cid']]['name']   = $record['sname'];

    }

    //设置menulist到session

    session('menu_list' , $l_aMenulist);
    // 			setSessVal('menu_outer', $this->fncGetMenuList('outer' , $l_aMenulist));
    // 			setSessVal('menu_inner', $this->fncGetMenuList('inner' , $l_aMenulist));
    // pr($this->fncGetMenuList('inner', $l_aMenulist));
}


function logging() {

    $actionDesc = array
    (
            "loginOKRedirect" => "登陆",
            "_login"          => "登陆",
            "_logout"         => "登出",
            "_default"        => '显示',
            "_list"           => '查询',
            "_update"         => '更新',
            "_insert"         => '新增数据',
            "_download"       => '下载',
            "_upload"         => '文件上传',
            "_delete"         => '删除数据',
            "_sort"           => '更改排序',
            "_paging"         => '换页查看',
            "_publish"        => '审核',
            "_reply"          => '回复'
    );

    $input = new stdClass();
    $input->time     = date("Y-m-d H:i:s");
    $input->ip       = clsServer::fncGetRemoteIp();
    $input->account  = session('_Account');
    $input->uid      = session('_UserId');
    $input->username = session('_UserName');
    $input->module   = "";
    $input->action   = $actionDesc[ACTION];

    if (!class_exists('Eku_Module')) require APATH_LIBS_MODELS . DS . 'eku_module.php';
    $model = new Eku_Module(getMDB(), 'eku_module');
    $modulelist = $model->fncFindAll();
    foreach ($modulelist as $key => $value) {
        if ($value['name'] == MODULES and !empty($value['parentid'])) {
            $input->module = $value['des'];
        }
    }

    if (!class_exists('Mw_Action_Log')) require APATH_LIBS_MODELS . DS . 'mw_action_log.php';
    $model = new Mw_Action_Log(getMDB(), 'mw_action_log');
    $model->insert($input);

}

