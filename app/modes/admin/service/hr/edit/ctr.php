<?php
class clsServiceHrEditController extends clsAppController implements IAction_default , IAction_update{

    private static $arr_status = array(1=>'全职' , 2=>'兼职');

    /**
     * 默认初始化页面方法
     */
    public function _default() {

        $this->init();
    }

    /**
     * 更新幻灯片
     */
    public function _update() {

        if ($this->form->isError()) {
            $this->output->result  = 'fail';
            $this->output->message = $this->form->getError();
            return;
        }

        //有上传文件时
        if($_FILES) {
            $files = $this->loadController('admin.system.file.default')
                          ->getUpload('files');

            foreach ($files as $file) {

                if (!empty($file['errmsg'])) {
                    $this->output->result = "fail";
                    $this->output->message = $file['errmsg'];
                    return;
                }

                if (!in_array(strtolower($file['ext']) , C('imageExtensions'))) {
                    $this->output->result = "fail";
                    $this->output->message = $this->lang->file->notimage;
                    return;
                }
            }
        }

        $input = new stdClass();
        $input->title       = $this->input->title;
//         $input->link        = $this->input->link;
        $input->content1       = $this->input->content1;
        $input->place          = $this->input->place;
        $input->status         = $this->input->status;
        $input->experience     = $this->input->experience;
        $input->education      = $this->input->education;
        $input->num            = $this->input->num;
        $input->group          = $this->input->group;
//         $input->desc        = $this->input->desc;
        $input->content2       = $this->input->content2;
        $input->updateby    = $this->session->getUid();
        $input->updatetime  = date("Y-m-d H:i:s");
        $input->id          = $this->input->id;

        $ok = true;
//         $this->mdb->subSetAutoCommit(false);//关闭自动提交
//         $this->mdb->subStartTran();

        $model  = new clsModModel($this->mdb ,'mw_hr');

        if (!$model->mw_hr->update($input))  $ok = false;
//pr($this->input->fileids);
//         if($ok and $_FILES) {
//             if(!$this->loadController('admin.system.file.edit')
//                     ->replaceFiles($this->input->fileids , $files))
//                 $ok = false;
//         }

//         if(!$this->loadController('admin.system.file.default')
//                 ->updateObjectID($this->input->uid, $this->input->id, 'hr')) {
//             $this->output->result  = 'fail';
//             $this->output->message = $this->lang->hr->failupdate;
//             return;
//         }

        if($ok) {
//             $this->mdb->subCommit();
            $this->output->result  = 'success';
            $this->output->message = $this->lang->hr->successupdate;
            $this->output->locate  = U('service/hr');
        } else {
//             $this->mdb->subRollBack();
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->hr->failupdate;
        }

        $this->mdb->subSetAutoCommit(true);//打开自动提交
    }

    /**
     * 页面初始化
     */
    private function init() {
        $input = new stdClass();
        $input->id         = $this->input->id;

        $model = new clsModModel($this->mdb, 'mw_hr');
        $hr = $model->mw_hr->getByID($input);

        foreach ($hr as $k => $v) {
            $this->output->$k = $v;
            if ($k == 'group') $this->output->group_choose = $v;
            if ($k == 'place') $this->output->place_choose = $v;
            if ($k == 'status') $this->output->status_choose = $v;
        }

        $this->output->group_options = $this->model->getGroup();
        $this->output->place_options = $this->model->getPlaces();
        $this->output->status_options = self::$arr_status;
//         $this->output->editor         = array('id' => array('desc'), 'tools' => 'full');
    }

}