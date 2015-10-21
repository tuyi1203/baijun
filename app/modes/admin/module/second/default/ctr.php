<?php
class clsModuleSecondDefaultController extends clsAppController
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
                 ->pageDeny('require', 3 , U('module/first') , $this->lang->translate->modulemente, $this->lang->translate->firstlevelmodule);
        }
    }

    public function _update() {

        $model = new clsModModel($this->mdb , array('eku_module'));

        $ok = true;
        $this->mdb->subSetAutoCommit(false);//关闭自动提交
        $this->mdb->subStartTran();
        $input = new stdClass();
        //         pr($this->input->sort);
        foreach ($this->input->sort as $id => $sort) {
            $input->sort = $sort;
            $input->id   = $id;
            if(!($model->eku_module->saveSort($input))) {
                $ok = false; break;
            }
        }

        if ($ok) {
            $this->mdb->subCommit();
            $this->output->result  = 'success';
            $this->output->message = $this->lang->second->successsort;
        }
        else {
            $this->mdb->subRollBack();
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->second->failsort;
        }
        $this->mdb->subSetAutoCommit(true);//打开自动提交

        //系统更新
        updateSystem();

    }

    public function _list() {
        $this->init();
        $model = new clsModModel($this->mdb , array('eku_module'));
        $input = new stdClass();
        $input->parentid = $this->input->pid;
        $this->output->list = $model->eku_module->getList($input);
    }

    public function _delete() {

        $model = new clsModModel($this->mdb , array('eku_module','eku_script','eku_action','eku_role_action'));
        $ok = true;

        $this->mdb->subSetAutoCommit(false);//关闭自动提交
        $this->mdb->subStartTran();

        //删除二级模块
        if (!$model->eku_module->delete($this->input)) $ok = false;

        //删除脚本
        if ($ok) {

            $cids = array($this->input->id);
            //取得脚本模块ID表
            $records = $model->eku_script->getInMID($cids);
            //删除
            if (!empty($records) && !$model->eku_script->deleteInMID($cids)) $ok = false;

        }

        //删除动作
        if ($ok && !empty($records)) {
            $scripts = array();
            //取得动作ID表

            foreach ($records as $record) {
                $scripts[] = $record['id'];
            }
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
            $this->output->message = $this->lang->second->faildelete;
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

        $this->output->mode_options      = getModeOptions();
        $this->output->module_options    = getModuleOptions($this->input->mode);

    }

    public function _change() {

        $this->output->result  = 'success';
        $this->output->options = new stdClass();
        $this->output->options->pid = getModuleOptions($this->input->mode);

    }
}