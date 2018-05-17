<?php
class clsHumanityLabelEditController extends clsAppController implements IAction_default , IAction_update{

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

        // //有上传文件时
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
        $input->entitle     = $this->input->entitle;
        // $input->link        = $this->input->link;
        // $input->label       = $this->input->label;
        // $input->desc        = $this->input->desc;
        $input->updateby    = $this->session->getUid();
        $input->updatetime  = date("Y-m-d H:i:s");
        $input->id          = $this->input->id;

//         $ok = true;
//         $this->mdb->subSetAutoCommit(false);//关闭自动提交
//         $this->mdb->subStartTran();

//         $model  = new clsModModel($this->mdb ,'mw_label');

//         if (!$model->mw_label->update($input))  $ok = false;
// //pr($this->input->fileids);
//         if($ok and $_FILES) {
//             if(!$this->loadController('admin.system.file.edit')
//                     ->replaceFiles($this->input->fileids , $files))
//                 $ok = false;
//         }

//         if(!$this->loadController('admin.system.file.default')
//                 ->updateObjectID($this->input->uid, $this->input->id, 'label')) {
//             $this->output->result  = 'fail';
//             $this->output->message = $this->lang->label->failupdate;
//             return;
//         }

//         if($ok) {
//             $this->mdb->subCommit();
//             $this->output->result  = 'success';
//             $this->output->message = $this->lang->label->successupdate;
//             $this->output->locate  = U('core/label');
//         } else {
//             $this->mdb->subRollBack();
//             $this->output->result  = 'fail';
//             $this->output->message = $this->lang->label->failupdate;
//         }

//         $this->mdb->subSetAutoCommit(true);//打开自动提交
        if (!$this->model->update($input)) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->todaywater->failupdate;
            return;
        }
        $this->output->result  = 'success';
        $this->output->message = $this->lang->label->successupdate;
        $this->output->locate  = U('humanity/label/default/default.html');
    }

    /**
     * 页面初始化
     */
    private function init() {
        $output = $this->model->get($this->input);
        $this->output->result = $output;
        // $this->output->editor         = array('id' => array('desc'), 'tools' => 'full');
    }

}