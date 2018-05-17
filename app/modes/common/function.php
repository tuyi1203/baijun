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
    } else { //当通过登陆验证时，生成动作权限和菜单
        // prdie(2);
        saveActionAuthList();
        saveAdminMenu();
        session('_sysname', C('sysname'));//保存系统名称
    }
}

/**
 * 判断用户是否有执行动作权限
 * @author tuyi
 * @date 2014.5.15
 */
function checkAuth()
{
    // prdie($_SESSION);
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
        // $preuri = getPreUri();
        // // echo $preuri;
        // if ($preuri and $preuri != $uri) {
        //     $sentence = $lang->prepage;
        // } else {
        //     $sentence = $lang->home;
        //     $preuri = U(C('ENTRANCEURI'));
        // }


        // if ($preuri == $signinurl )
        //     $preuri = $loginurl;
        // echo $preuri;exit;
        //             if (in_array($apptype, array('html','modal')) ) $ctr->loadController($mode.'.system.error.default')
        //                                         ->pageDeny('auth', 5 , $preuri, $sentence);

        //2014.9.16 修改为无权限时一律回到首页
        //2017.12.8 修改为当从其他系统跳转过来时无权限，则回到登陆页
        if (get_domain(U(C('ENTRANCEURI'))) == $_SERVER['HTTP_HOST']) {
            $preuri = U(C('ENTRANCEURI'));
        } else {
            $preuri = $loginurl;
        }
        
        if (in_array(APPTYPE, array('.html','.modal')) ) $ctr->loadController('admin.system.error.default')
                        ->pageDeny('auth', 5 , $preuri, $lang->home);
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
function saveActionAuthList($run = false)
{
    //根据用户名取得用户角色等信息
    //当从本系统登陆或者从其他系统跳转到本系统时，取得相应的权限信息
    if ($run || (session('_sysname') == '') || (session('_sysname') != C('sysname'))) 
    {
        // prdie(4);
        $model = new Eku_User(getMDB(), 'eku_user');
        $l_aUserInfo = $model->fncGetUser(session('_Account'));
        if (count($l_aUserInfo) > 0 ) 
        {
            session('_UserId', $l_aUserInfo['id']);//保存用户ID
            session('_RoleId', $l_aUserInfo['roleid']);//保存用户角色ID
            session('_UserName', $l_aUserInfo['name']);//保存用户名字

            $model = new Eku_Role_Action( getMDB(), 'eku_role_action');
            $l_aOutput = $model->fncGetList(array('roleid'=>getRid()));
            $l_aList = array();
            foreach ($l_aOutput as $record) 
            {
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
        } else{
            session('action_auth_list' , []);
        }
    }
}

/**
 * 菜单生成钩子函数
 * @author tuyi
 * @date 2014.5.9
 *
 */
function saveAdminMenu($run = false)
{
    //当从本系统登陆或者从其他系统跳转到本系统时，取得相应的菜单信息
    if ($run || (session('_sysname') == '') || (session('_sysname') != C('sysname'))) {
         if (!class_exists('Eku_Role_Action')) require APATH_LIBS_MODELS . DS . 'eku_role_action.php';
        $l_oModel = new Eku_Role_Action(getMDB(), 'eku_role_action');

        //          $l_aOutput = $l_oModel->fncGetList(array('roleid'=>getRid()));
        // pr($l_aOutput);exit;
        $l_aOutput = $l_oModel->fncGetMenuList(array('roleid'=>getRid()));
        $l_aMenulist = array();

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
        $smarty = getSmarty();
        $smarty->assign("MENUOUTER",      fncGetMenuList('outer', $l_aMenulist , MODE));
        $smarty->assign("MENUINNER",      fncGetMenuList('inner', $l_aMenulist , MODE));
    }
    
}

/**
     * 生成一二级菜单List
     * @param string $a_stScope
     * @param array $list
     * @param string $mode
     * @return multitype:unknown
     * @author tuyi
     * @date 2014.5.19
     */
    function fncGetMenuList($a_stScope , $a_aList , $a_stMode)
    {
        if (empty($a_aList) or !array_key_exists($a_stMode , $a_aList)) return;

        $menulist = array();

        if ($a_stScope == "outer") {

            foreach ($a_aList[$a_stMode] as $sort => $menus) {

                foreach ($menus as $id => $f) {

                    $tmp['url'] = $f['url'];
                    //多语言对应
                    if (strtolower(getClientLang()) == "en") {
                        $tmp['des'] = $f['des_en'];
                    } else {
                        $tmp['des'] = $f['des'];
                    }

                    $tmp['name'] = $f['name'];
                    $menulist[] = $tmp;

                }

            }

        }

        if ($a_stScope == "inner") {

            foreach ($a_aList[$a_stMode] as $sort => $menus) {

                foreach ($menus as $id => $f) {
                    // echo getSessVal('module_f');
                    if (session('module_f') == $f['name']) {

                        foreach ($f['child'] as $cid => $c) {

                            $tmp['url'] = $c['url'];
                            //多语言对应
                            if (strtolower(getClientLang()) == "en") {
                                $tmp['des'] = $c['des_en'];
                            } else {
                                $tmp['des'] = $c['des'];
                            }
                            $tmp['name'] = $c['name'];
                            $menulist[] = $tmp;

                        }

                    }

                }

            }
        }
// pr($menulist);
        return $menulist;

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

