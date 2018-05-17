<?php
class clsServiceHrAddController extends clsAppController implements IAction_default , IAction_insert{

    private static $arr_status = array(1=>'全职' , 2=>'兼职');

    /**
     * 默认初始化页面方法
     */
    public function _default() {

        $this->init();
    }

    /**
     * 添加幻灯片
     */
    public function _insert() {

        if ($this->form->isError()) {
            $this->output->result  = 'fail';
            $this->output->message = $this->form->getError();
            return;
        }

//         $files = $this->loadController('admin.system.file.default')
//                      ->getUpload('files');

//         if (empty($files)) {
//             $this->output->result = 'fail';
//             $this->output->message = $this->lang->file->requireimage;
//             return;
//         }

//         if (!empty($files)) {

// 	        foreach ($files as $file) {
// 	            if (!empty($file['errmsg'])) {
// 	                $this->output->result = "fail";
// 	                $this->output->message = $file['errmsg'];
// 	                return;
// 	            }

// 	            if (!in_array(strtolower($file['ext']) , C('imageExtensions'))) {
// 	                $this->output->result = "fail";
// 	                $this->output->message = $this->lang->file->notimage;
// 	                return;
// 	            }
// 	        }
//         }

        $input = new stdClass();
        $input->title       = $this->input->title;
        $input->group       = $this->input->group;
        $input->place       = $this->input->place;
        $input->status      = $this->input->status;//工作性质
        $input->education   = $this->input->education;//最低教育
        $input->experience  = $this->input->experience; //工作经验
        $input->num         = $this->input->num;
        $input->content1     = $this->input->content1;
        $input->content2     = $this->input->content2;
        $input->createby    = $this->session->getUid();
        $input->createtime  = date("Y-m-d H:i:s");

        $ok = true;
//         $this->mdb->subSetAutoCommit(false);//关闭自动提交
//         $this->mdb->subStartTran();

        $model  = new clsModModel($this->mdb ,'mw_hr');
        if (!$model->mw_hr->insert($input)) {
            $ok = false;
        }

//         $insertid = $model->mw_hr->lastInsertID();

//         if($ok) {
//             if(!$this->loadController('admin.system.file.default')
//                     ->saveUpload(MODULES , $insertid , $files)) {
//                 $ok = false;
//             }
// //             pr($ok);exit;
//         }

//         if(!$this->loadController('admin.system.file.default')
//                 ->updateObjectID($this->input->uid, $insertid, 'hr')) {
//             $this->output->result  = 'fail';
//             $this->output->message = $this->lang->hr->failinsert;
//             return;
//         }

        if($ok) {
//             $this->mdb->subCommit();
            $this->output->result  = 'success';
            $this->output->message = $this->lang->hr->successinsert;
            $this->output->locate  = U('service/hr');
        } else {
//             $this->mdb->subRollBack();
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->hr->failinsert;
        }

    }

    /**
     * 页面初始化
     */
    private function init() {
    	$this->output->group_options = $this->model->getGroup();
        $this->output->place_options = $this->model->getPlaces();
        $this->output->status_options = self::$arr_status;
//         $this->output->editor         = array('id' => array('desc'), 'tools' => 'full');
    }

}