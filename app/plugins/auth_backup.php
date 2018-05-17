<?php

if (!class_exists('Eku_Role_Action')) {

    require APATH_LIBS_MODELS . DS . 'eku_role_action.php';

}
/**
 * 登陆验证插件
 * @author tuyi
 * @date 2014.5.7
 *
 */
class PI_Auth {

    protected $loginurl;//登陆画面

    protected $signinurl;//登陆操作URL

    public function __construct() {
        $this->loginurl = U ("admin/system/login/default/log.html");
//         $this->loginurl = U ("http://username:password@hostname/path?arg=value#anchor");
        $this->signinurl = U ("admin/system/login/default/login.html");
    }

    public function checkLogin() {
        echo getMode();exit;
        $auth     = getAuthIns();
        $apptype  = APPTYPE;

        if (!$auth ->fncPassThrough() && ( MODE == "admin" or MODE == "wxadmin")) {

            if ($apptype == "json") {
                $ctr = getCtr();
                $ctr->send(array("result"=>"success" , "locate"=>$this->loginurl));
            }
            redirect($this->loginurl);

            return;
        }

    }

    /**
     * 判断用户是否有执行动作权限
     * @author tuyi
     * @date 2014.5.15
     */
    public function checkAuth() {
    	$loginurl  = U ("admin/system/login/default/log.html");
    	$signinurl = U ("admin/system/login/default/login.html");

        $action_auth_list = session('action_auth_list');
        $app              = getAppIns();
        $mode             = MODE;
        $ctr              = getCtr();
        $uri              = $app->getModule() . '/' . $app->getScript() . '/' . ltrim($app->getAction() , '_');
        $apptype          = APPTYPE;
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
                $preuri = getEntranceUri();
            }



            if ($preuri == $signinurl )
            	$preuri = $loginurl;
// echo $preuri;exit;
//             if (in_array($apptype, array('html','modal')) ) $ctr->loadController($mode.'.system.error.default')
//                                         ->pageDeny('auth', 5 , $preuri, $sentence);

            //2014.9.16 修改为无权限时一律回到首页
            $preuri = getEntranceUri();

            if (in_array($apptype, array('html','modal')) ) $ctr->loadController('admin.system.error.default')
                                                                ->pageDeny('auth', 5 , $preuri, $sentence);
            if ($apptype == 'json') {
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
    public function saveActionAuthList() {
//         $mode = getMode();

        $model = new Eku_Role_Action( getMDB(), 'eku_role_action');
        $l_aOutput = $model->fncGetList(array('roleid'=>getRid()));
//         pr($l_aOutput);
        $l_aList = array();
// pr($l_aOutput);
        foreach ($l_aOutput as $record) {

            $l_aList[$record['MODE']][$record['URL']]['pid'] = $record['PID'];
            $l_aList[$record['MODE']][$record['URL']]['cid'] = $record['CID'];
            $l_aList[$record['MODE']][$record['URL']]['sid'] = $record['SID'];
            $l_aList[$record['MODE']][$record['URL']]['aid'] = $record['AID'];
            $l_aList[$record['MODE']][$record['URL']]['pname'] = $record['PNAME'];
            $l_aList[$record['MODE']][$record['URL']]['cname'] = $record['CNAME'];
            $l_aList[$record['MODE']][$record['URL']]['sname'] = $record['SNAME'];
            $l_aList[$record['MODE']][$record['URL']]['aname'] = $record['ANAME'];
            $l_aList[$record['MODE']][$record['URL']]['roleid'] = $record['ROLEID'];
            $l_aList[$record['MODE']][$record['URL']]['operauth'] = $record['OPERAUTH'];

        }
        //设置menulist到session
        session('action_auth_list' , $l_aList);
//         		pr($l_aList);exit;
    }

}