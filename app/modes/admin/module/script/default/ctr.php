<?php
class clsModuleScriptDefaultController extends clsAppController
implements IAction_default , IAction_update , IAction_list ,IAction_change , IAction_delete{

    /**
     * 默认初始化页面方法
     */
    public function _default() {

        $this->init();
        $model = new clsModModel($this->mdb , array('eku_module'));
        //检查一级模块数据是否存在
        if ($model->eku_module->noData($this->input)) {
            $this->loadController('admin.system.error.default')
                 ->pageDeny('require', 3 , U('module/first') , $this->lang->script->modulemente, $this->lang->script->firstlevelmodule);
            return;
        }

        //检查二级模块数据是否存在
        $this->input->parentid = '';
        if ($model->eku_module->noData($this->input)) {
            $this->loadController('admin.system.error.default')
            ->pageDeny('require', 3 , U('module/second') , $this->lang->script->secondmente, $this->lang->script->secondlevelmodule);
            return;
        }


    }

    public function _update() {

        $this->getChangeData($oldRoleList = $this->session->fncGetValue(__FILE__.'roleAction') , $newRoleList = $this->input->role , $insert , $delete);

        $model = new clsModModel($this->mdb , array('eku_role_action'));
        $ok = true;
        $this->mdb->subSetAutoCommit(false);//关闭自动提交
        $this->mdb->subStartTran();

        //         pr($this->input->sort);
        foreach ($insert as $value) {
            $input = new stdClass();
            $input->actionid   = $value['aid'];
            $input->roleid     = $value['roleid'];
            $input->operauth   = '1';
            if (!$model->eku_role_action->replace($input)) {
                $ok = false; break;
            }
        }

        foreach ($delete as $value) {
            $input = new stdClass();
            $input->actionid   = $value['aid'];
            $input->roleid     = $value['roleid'];
            $input->operauth   = '0';
            if (!$model->eku_role_action->update($input)) {
                $ok = false; break;
            }
        }

        if ($ok) {
            $this->mdb->subCommit();
            $this->output->result  = 'success';
            $this->output->message = $this->lang->script->successsort;
            $listurl = $this->session->fncGetValue(__FILE__."_list.url");
            $this->output->locate  = U("module/script/default/list/mode/{$listurl['mode']}/pid/{$listurl['pid']}/sid/{$listurl['sid']}.html");
        }
        else {
            $this->mdb->subRollBack();
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->script->failsort;
        }
        $this->mdb->subSetAutoCommit(true);//打开自动提交

        //系统更新
        updateSystem();

    }

    private function getChangeData($oldRoleList, $newRoleList , &$insert , &$delete) {

        $insert = array();
        $delete = array();

        //取得新增权限数据
        foreach ($newRoleList as $key => $value) {
            foreach ($value as $k => $v) {
                if (!array_key_exists($k, $oldRoleList[$key]) or $oldRoleList[$key][$k] == '0') {
                    $insert[] = array
                    (
                        'aid'     => $key ,
                        'roleid'  => $k
                    ) ;
                }
            }
        }

        //取得删除的权限数据
        foreach ($oldRoleList as $key => $value) {
            foreach ($value as $k => $v) {
                if ($oldRoleList[$key][$k] == '1' and !array_key_exists($k, $newRoleList[$key])) {
                   $delete[] = array
                    (
                        'aid'     => $key ,
                        'roleid'  => $k
                    ) ;
                }
            }
        }
    }

    public function _list() {
        $this->init();
        $model = new clsModModel($this->mdb , array('eku_script','eku_action'));
        $input = new stdClass();
//         $input->parentid = $this->input->pid;
        $input->secondid = $this->input->sid;

        //取得脚本动作权限列表
        $this->output->list = $this->formatList($model->eku_script->getScriptActionRoleList($input));
//         pr($this->formatList($model->eku_script->getScriptActionRoleList($input)));
        $this->output->rolelist = getRoleOptions(false);
// pr($this->output->list);
        //保存列表信息
        $this->session->subSetValue(__FILE__.'_list.url' , array
        (
            "mode" => $this->input->mode,
            "pid"  => $this->input->pid,
            "sid"  => $this->input->sid
        ));


    }

    private function formatList($list) {
        $result = array();
        $roleActionData = array();//session保存用数据
        foreach ($list as $key => $value) {
            $result[$value['sid']]['id']        = $value['sid'];
            $result[$value['sid']]['name']      = $value['sname'];
            $result[$value['sid']]['des']       = $value['sdes'];
            $result[$value['sid']]['createby']  = $value['username'];
            if (!empty($value['aid'])) {
                $result[$value['sid']]['action'][$value['aid']]['id']   = $value['aid'];
                $result[$value['sid']]['action'][$value['aid']]['name'] = $value['aname'];
                $result[$value['sid']]['action'][$value['aid']]['des']  = $value['ades'];
                $result[$value['sid']]['action'][$value['aid']]['role'][$value['roleid']]['id']        = $value['roleid'];
                $result[$value['sid']]['action'][$value['aid']]['role'][$value['roleid']]['operauth']  = $value['operauth'];
            }

            $roleActionData[$value['aid']][$value['roleid']] = $value['operauth'];
        }
        //保存权限信息
        $this->session->subSetValue(__FILE__. 'roleAction' , $roleActionData);
        return $result;
    }

    public function _delete() {

        $model = new clsModModel($this->mdb , array('eku_module','eku_script','eku_action','eku_role_action'));
        $ok = true;

        $this->mdb->subSetAutoCommit(false);//关闭自动提交
        $this->mdb->subStartTran();

        //删除脚本
        if (!$model->eku_script->delete($this->input)) $ok = false;

        //删除动作
        if ($ok) {
            $scripts[] = $this->input->id;
            $records = $model->eku_action->getInSID($scripts);
            //删除
            if (!empty($records) && !$model->eku_action->deleteInSID($scripts)) $ok = false;
        }

        //删除权限
        if ($ok && !empty($records)) {
            $actions = array();
            //取得动作ID表
            foreach ($records as $record) {
                $actions[] = $record['id'];
            }
            //删除
            if (!$model->eku_role_action->deleteInAID($actions)) $ok = false;
        }

        if ($ok) {
            $this->mdb->subCommit();
            $this->output->result  = 'success';
            //             $this->output->message = $this->lang->first->successdelete;
        }
        else {
            $this->mdb->subRollBack();
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->script->faildelete;
        }

        $this->mdb->subSetAutoCommit(true);//打开自动提交

        //系统更新
        updateSystem();
    }


//     public function _list() {

//         $this->setTokenAndSession();

//         $l_oModel = new clsAppModel($this->mdb , array('slideImages'));

//         $l_aOutput = $l_oModel->slideImages->getModuleImages(array('modulename' => $this->router->modulename ,
//                 'scriptname' => $this->router->scriptname));

//         $l_aFormdata = array();

//         foreach ($l_aOutput as $record) {

//             $l_aFormdata['slide'. $record['ID'] .'filename'] = $record['FILENAME'];

//             $l_aFormdata['slide'. $record['ID'] .'filemd5name'] = $record['FILEMD5NAME'];

//         }

//         $this->form->subSetForm($l_aFormdata);

//         $this->smarty->setTpl('index.html') ;

//     }

//     public function _fileupload() {

//         $this->doAjaxUploadFile();

//     }

//     public function _filedownload() {

//         $this->fileDownload();
//     }

//     public function _add() {

//         //取得上传图片文件数据
//         $postdata = $this->post->data;

//         $l_aInputData = array();

//         for ($i = 1; $i < config::$slide_images + 1; $i++) {

//             $l_aInputData[$i]['id'] = $i;

//             $l_aInputData[$i]['modulename'] = $this->router->modulename;

//             $l_aInputData[$i]['scriptname'] = $this->router->scriptname;

//             $l_aInputData[$i]['filename'] = $postdata['slide'.$i.'filename'];

//             $l_aInputData[$i]['filemd5name'] = $postdata['slide'.$i.'filemd5name'];

//             $l_aInputData[$i]['createtime'] = date("Y-m-d H:i:s");

//         }

//         $l_oModel = new clsAppModel($this->mdb , array('slideImages'));
//         //删除已经存在的同模块下的图片文件数据
//         //         print_r($postdata);print_r($l_aInputData);exit;
//         $l_oModel->slideImages->deleteModuleImages(array('modulename' => $this->router->modulename ,
//                 'scriptname' => $this->router->scriptname));

//         $l_iOK = 0;//插入成功记录计数器

//         $l_iErr = 0;//插入失败记录计数器

//         foreach ($l_aInputData as $index => $data) {
//             //逐行插入数据
//             if(!$l_oModel->slideImages->insert($data)) {

//                 $l_iErr += 1;

//             } else {

//                 $l_iOK += 1 ;

//             }

//         }

//         if ($l_iOK = count($l_aInputData)) {

//             $this->session->subAddNotice('GLOBAL' ,'数据更新全部成功。');

//         } else {

//             $this->session->subAddErrMsg('GLOBAL' ,'数据未完全成功。');

//         }

//         $this->_list();

//     }

    private function init() {

        if (!empty($this->input->mode)) {
            $this->output->mode_choose    = $this->input->mode;
        } else {
            $this->input->mode = "admin";
            $this->output->mode_choose    = "admin";
        }

        if (!empty($this->input->pid))
            $this->output->module_choose = $this->input->pid;

        if (!empty($this->input->sid))
            $this->output->second_choose = $this->input->sid;

        $this->output->mode_options      = getModeOptions();
        $this->output->module_options    = getModuleOptions($this->input->mode,$parentid = null,$header = false);
        if (!isset($this->input->pid)) {
            list($parentid , $label)         = each($this->output->module_options);
            $this->output->second_options    = getModuleOptions($this->input->mode,$parentid,$header = true);
        } else {
            $this->output->second_options    = getModuleOptions($this->input->mode , $this->input->pid , $header = true);
        }



    }

    public function _change() {

        $this->output->options = new stdClass();
        if ($this->input->act == "mode") {
            $pidOptions                 = getModuleOptions($this->input->mode,$parentid = null,$header = false);
            $this->output->options->pid = makeOptionsForAjaxRequest($pidOptions);
            list($parentid , $label)    = each($pidOptions);
            $this->output->options->sid = makeOptionsForAjaxRequest(getModuleOptions($this->input->mode,$parentid,$header = true));
//             pr($this->output->options->pid);
        }

        if ($this->input->act == "first") {
            $this->output->options->sid = makeOptionsForAjaxRequest(getModuleOptions($this->input->mode , $this->input->pid , $header = true));
        }

        $this->output->action = "change";
        $this->output->result  = 'success';
    }
}