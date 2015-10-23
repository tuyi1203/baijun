<?php
class clsWebsiteInfoDefaultController extends clsAppController implements IAction_default , IAction_update{

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

                if (!in_array($file['ext'] , C('imageExtensions'))) {
                    $this->output->result = "fail";
                    $this->output->message = $this->lang->file->notimage;
                    return;
                }
            }
        }

        $model  = new clsModModel($this->mdb ,'mw_set');
        $ok = true;
        $this->mdb->subSetAutoCommit(false);//关闭自动提交
        $this->mdb->subStartTran();

		$input = new stdClass();
        $input->value  = $this->input->sitetitle;
        $input->key    = 'siteinfo';
        $input->subkey = "1";
        if($ok and !$model->mw_set->update($input)) {
            $ok = false;
        }

        $input->value  = $this->input->tel1;
        $input->key    = 'siteinfo';
        $input->subkey = "2";
        if($ok and !$model->mw_set->update($input)) {
        	$ok = false;
        }

        $input->value  = $this->input->buttom;
        $input->key    = 'siteinfo';
        $input->subkey = "3";
        if($ok and !$model->mw_set->update($input)) {
            $ok = false;
        }

        $input->value  = $this->input->qq1;
        $input->key    = 'siteinfo';
        $input->subkey = "6";
        if($ok and !$model->mw_set->update($input)) {
            $ok = false;
        }

        $input->value  = $this->input->qq2;
        $input->key    = 'siteinfo';
        $input->subkey = "7";
        if($ok and !$model->mw_set->update($input)) {
            $ok = false;
        }

        if($ok and $_FILES) {
            if (isset($this->input->fileids)) {
                //更新
                if(!$this->loadController('admin.system.file.edit')
                        ->replaceFiles($this->input->fileids , $files))
                    $ok = false;
            } else {
                //添加
                if(!$this->loadController('admin.system.file.default')
                        ->saveUpload('qcode' , 1 , $files)) {
                    $ok = false;
                }
            }
        }

        if ($ok) {
            $this->mdb->subCommit();
            $this->output->result  = 'success';
            $this->output->message = $this->lang->info->successupdate;
            $this->output->locate  = U('website/info/default/default.html');
        }
        else {
            $this->mdb->subRollBack();
           $this->output->result  = 'fail';
            $this->output->message = $this->lang->info->failupdate;
        }
        $this->mdb->subSetAutoCommit(true);//打开自动提交

    }

    /**
     * 页面初始化
     */
    private function init() {
        $input = new stdClass();
        $input->key         = 'siteinfo';
        $input->subkey      = range(1, 12);

        $model = new clsModModel($this->mdb, 'mw_set,mw_file');
        $siteinfo = $model->mw_set->get($input);

        foreach ($siteinfo as $k => $v) {
            if ($v['subkey'] == "1") {
                $this->output->sitetitle = $v['value'];
            }
            if ($v['subkey'] == "2") {
                $this->output->tel1 = $v['value'];
            }
            if ($v['subkey'] == "3") {
                $this->output->buttom = $v['value'];
            }
            if ($v['subkey'] == "6") {
                $this->output->qq1 = $v['value'];
            }
            if ($v['subkey'] == "7") {
                $this->output->qq2 = $v['value'];
            }
            $this->output->$k = $v;
        }

        //取得微信二维码图片
        $input = new stdClass();
        $input->objecttype = 'qcode';
        $input->objectid   = 1 ;
        $qcode = $model->mw_file->getList($input);
        foreach ($qcode as $key => $value) {
            $this->output->qcode = UPLOAD_URL . $value['url'];
            $this->output->fileid = $value['id'];
        }
        $this->output->editor = array('id' => array('buttom'), 'tools' => array('noImage'));
    }

}