<?php
// if (!class_exists('Mw_Action_Log')) {

//     require APATH_LIBS_MODELS . DS . 'mw_action_log.php';

// }
/**
 * 菜单生成插件
 * @author tuyi
 * @date 2014.5.9
 *
 */
class PI_ActionLog {

    public static $actionDesc = array
    (
            "loginOKRedirect" => "登陆",
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
    );

    public function logging() {

        $input = new stdClass();
        $input->time     = date("Y-m-d H:i:s");
        $input->ip       = clsServer::fncGetRemoteIp();
        $input->account  = getSessVal('_Account');
        $input->uid      = getSessVal('_UserId');
        $input->username = getSessVal('_UserName');
        $input->action   = self::$actionDesc[getAction()];
        $input->module   = "";

        if (!class_exists('Eku_Module')) require APATH_LIBS_MODELS . DS . 'eku_module.php';
        $model = new Eku_Module(getMDB(), 'eku_module');
        $modulelist = $model->fncFindAll();
        foreach ($modulelist as $key => $value) {
            if ($value['name'] == getModuleS() and !empty($value['parentid'])) {
                $input->module = $value['des'];
            }
        }

        if (!class_exists('Mw_Action_Log')) require APATH_LIBS_MODELS . DS . 'mw_action_log.php';
        $model = new Mw_Action_Log(getMDB(), 'mw_action_log');
        $model->insert($input);

    }




}