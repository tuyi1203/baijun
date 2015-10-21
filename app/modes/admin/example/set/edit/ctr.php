<?php
class clsExampleSetEditController extends clsAppController implements IAction_default , IAction_update{

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

                if (!in_array($file['ext'] , config::$imageExtensions)) {
                    $this->output->result = "fail";
                    $this->output->message = $this->lang->file->notimage;
                    return;
                }
            }
        }

        $input = new stdClass();
        $input->title       = $this->input->title;
        $input->content     = $this->input->content;
        $input->homepage    = $this->input->homepage;
        $input->id          = $this->input->id;

        $ok = true;
        $this->mdb->subSetAutoCommit(false);//关闭自动提交
        $this->mdb->subStartTran();

        $model  = new clsModModel($this->mdb ,'yjm_set');

        if (!$model->yjm_set->update($input))  $ok = false;
//pr($this->input->fileids);
        if($ok and $_FILES) {
            if(!$this->loadController('admin.system.file.edit')
                    ->replaceFiles($this->input->fileids , $files))
                $ok = false;
        }

        if($ok) {
            $this->mdb->subCommit();
            $this->output->result  = 'success';
            $this->output->message = $this->lang->set->successupdate;
            $this->output->locate  = 'example_set-default-default.html';
        } else {
            $this->mdb->subRollBack();
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->set->failupdate;
        }

        $this->mdb->subSetAutoCommit(true);//打开自动提交
    }

    /**
     * 页面初始化
     */
    private function init() {
        $input = new stdClass();
        $input->id         = $this->input->id;
        $input->objecttype = 'yjm_set';
        $input->objectid   = $this->input->id;

        $model = new clsModModel($this->mdb, 'yjm_set');
        $slide = $model->yjm_set->getByID($input);

        $slide['url'] = $this->app->getWebRoot(). "/data/upload/" . $slide['url'];

        foreach ($slide as $k => $v) {
            $this->output->$k = $v;
            if ($k == 'homepage')
                $this->output->homepage_choose = $v;
        }
        $this->output->homepage_options = getYesOrNoOptions();
        $this->output->editor         = array('id' => array('content'), 'tools' => 'full');
    }

}