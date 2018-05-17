<?php
class clsWebsitecoreteamDefaultController extends clsAppController implements IAction_default , IAction_update{

    /**
     * 默认初始化页面方法
     */
    public function _default() {
// pr($_SESSION);exit;
        $this->init();
    }

    /**
     * 更新幻灯片
     */
    public function _update() {

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

                if (!in_array($file['ext'] , C('imageExtensions'))) {
                    $this->output->result = "fail";
                    $this->output->message = $this->lang->file->notimage;
                    return;
                }
            }
        }

        $ok = true;

        if($ok and $_FILES) {
            if (isset($this->input->fileids)) {
                //更新
                if(!$this->loadController('admin.system.file.edit')
                        ->replaceFiles($this->input->fileids , $files))
                    $ok = false;
            } else {
                //添加
                if(!$this->loadController('admin.system.file.default')
                        ->saveUpload('coreteam' , 1 , $files)) {
                    $ok = false;
                }
            }
        }

        if ($ok) {
            $this->output->result  = 'success';
            $this->output->message = $this->lang->coreteam->successupdate;
            $this->output->locate  = U('website/coreteam/default/default.html');
        }
        else {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->coreteam->failupdate;
        }
    }

    /**
     * 页面初始化
     */
    private function init() {
        $input = new stdClass();
        $input->objecttype = 'coreteam';
        $input->objectid   = 1 ;
        $model = new clsModModel($this->mdb, 'mw_file');
        $list = $model->mw_file->getList($input);
        foreach ($list as $key => $value) {
            $this->output->coreteam = UPLOAD_URL . $value['url'];
            $this->output->fileid = $value['id'];
        }
    }

}