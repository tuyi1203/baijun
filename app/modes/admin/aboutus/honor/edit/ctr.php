<?php
class clsAboutusHonorEditController extends clsAppController implements IAction_default , IAction_update{

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

        //---2016.4.4 去掉图片
        //有上传文件时
        // if($_FILES) {
        //     $files = $this->loadController('admin.system.file.default')
        //                   ->getUpload('files');

        //     foreach ($files as $file) {

        //         if (!empty($file['errmsg'])) {
        //             $this->output->result = "fail";
        //             $this->output->message = $file['errmsg'];
        //             return;
        //         }

        //         if (!in_array($file['ext'] , C('imageExtensions'))) {
        //             $this->output->result = "fail";
        //             $this->output->message = $this->lang->file->notimage;
        //             return;
        //         }
        //     }
        // }

        $input = new stdClass();
        $input->title       = $this->input->title;
//         $input->link        = $this->input->link;
//         $input->label       = $this->input->label;
//         $input->desc        = $this->input->desc;
        $input->updateby    = $this->session->getUid();
        $input->updatetime  = date("Y-m-d H:i:s");
        $input->id          = $this->input->id;

        $ok = true;
        $this->mdb->subSetAutoCommit(false);//关闭自动提交
        $this->mdb->subStartTran();

        $model  = new clsModModel($this->mdb ,'mw_honor');

        if (!$model->mw_honor->update($input))  $ok = false;
//pr($this->input->fileids);
        //---2016.4.4 去掉图片
        // if($ok and $_FILES) {
        //     if(!$this->loadController('admin.system.file.edit')
        //             ->replaceFiles($this->input->fileids , $files))
        //         $ok = false;
        // }

        // if(!$this->loadController('admin.system.file.default')
        //         ->updateObjectID($this->input->uid, $this->input->id, 'honor')) {
        //     $this->output->result  = 'fail';
        //     $this->output->message = $this->lang->honor->failupdate;
        //     return;
        // }

        if($ok) {
            $this->mdb->subCommit();
            $this->output->result  = 'success';
            $this->output->message = $this->lang->honor->successupdate;
            $this->output->locate  = U('aboutus/honor');
        } else {
            $this->mdb->subRollBack();
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->honor->failupdate;
        }

        $this->mdb->subSetAutoCommit(true);//打开自动提交
    }

    /**
     * 页面初始化
     */
    private function init() {
        $input = new stdClass();
        $input->id         = $this->input->id;
        $input->objecttype = MODULES;
        $input->objectid   = $this->input->id;

        $model = new clsModModel($this->mdb, 'mw_honor');
        $slide = $model->mw_honor->getByID($input);

        $slide['url'] = UPLOAD_URL . $slide['url'];

        foreach ($slide as $k => $v) {
            $this->output->$k = $v;
        }
        $this->output->editor         = array('id' => array('desc'), 'tools' => 'full');
    }

}