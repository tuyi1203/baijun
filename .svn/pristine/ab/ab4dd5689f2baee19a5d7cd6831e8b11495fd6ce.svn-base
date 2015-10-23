<?php
class clsWeixinSettingDefaultController extends clsAppController implements IAction_default , IAction_update{

    /**
     * 默认初始化页面方法
     */
    public function _default()
    {
        $this->init();
    }

    /**
     * 添加单页
     */
    public function _update() {
//         pr($this->input);
        if ($this->form->isError()) {
            $this->output->result  = 'fail';
            $this->output->message = $this->form->getError();
            return;
        }

        if (!$this->model->update($this->input)) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->setting->failupdate;
            return;
        }

        //有上传文件时
        if($_FILES) {
            $files = $this->loadController('wechat.system.file.default')
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

        //更新会员信息
        if ($list = member::getList()) {
            if (!$this->model->updateMember($list)) {
                $this->output->result  = 'fail';
                $this->output->message = $this->lang->setting->failpullmember;
                return;
            }
        }

        $ok = true;
        if($_FILES) {
            if (!isset($this->input->fileids)) {
                if(!$this->loadController('wechat.system.file.default')
                        ->saveUpload('wechatsetting' , 1 , $files)) {
                    $ok = false;
                }
            } else {
                if(!$this->loadController('wechat.system.file.edit')
                        ->replaceFiles($this->input->fileids , $files))
                    $ok = false;
            }
        }

        if(!$ok) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->setting->failuploadimage;
            return;
        }

        $this->output->result  = 'success';
        $this->output->message = $this->lang->setting->successupdate;
        $this->output->locate  = U('weixin/setting');

    }

    /**
     * 页面初始化
     */
    private function init()
    {
        $settings = $this->model->getSettings();

        foreach ($settings as $row) {
           $this->output->{$row->subkey} = $row->value;
        }

        //拉取头像信息
        $input = new stdClass();
        $input->objectid = 1;
        $input->objecttype = 'wechatsetting';
        $headimg = $this->model->getHeadimg($input);
//         pr($headimg);
        $this->output->imageurl = P($headimg->url);
        $this->output->fileid   = $headimg->id;
        $this->output->url      = U('addon/home/default');
        $this->output->token    = 'mingwon';

    }

}