<?php
class clsHomeTopdesignerEditController extends clsAppController implements IAction_default , IAction_update{

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
            $file = $this->loadController('admin.system.topimage.edit')
                          ->getUpload('upFile');

            if (!empty($file['errmsg'])) {
                $this->output->result = "fail";
                $this->output->message = $file['errmsg'];
                return;
            }

            if (!in_array(strtolower($file['ext']) , config::$imageExtensions)) {
                $this->output->result = "fail";
                $this->output->message = $this->lang->file->notimage;
                return;
            }
        }

        $input = new stdClass();
        $input->title       = $this->input->title;
        $input->link        = $this->input->link;
        $input->label       = $this->input->label;
        $input->content     = $this->input->content;
        $input->desc        = $this->input->desc;
        $input->updateby    = $this->session->getUid();
        $input->updatetime  = date("Y-m-d H:i:s");
        $input->id          = $this->input->id;

        $ok = true;
        $this->mdb->subSetAutoCommit(false);//关闭自动提交
        $this->mdb->subStartTran();

        $model  = new clsModModel($this->mdb ,'mw_top');

        if (!$model->mw_top->update($input))  $ok = false;
//pr($this->input->fileids);
        if($ok and $_FILES) {
            if(!$this->loadController('admin.system.topimage.edit')
                    ->replaceFiles($this->input->fileids , array($file)))
                $ok = false;
        }

        if($ok) {
            $this->mdb->subCommit();
            $this->output->result  = 'success';
            $this->output->message = $this->lang->topdesigner->successupdate;
            $this->output->locate  = 'home_topdesigner-default-default.html';
        } else {
            $this->mdb->subRollBack();
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->topdesigner->failupdate;
        }

        $this->mdb->subSetAutoCommit(true);//打开自动提交
    }

    /**
     * 页面初始化
     */
    private function init() {
        $input = new stdClass();
        $input->id         = $this->input->id;
        $input->objecttype = $this->app->getModuleS();
        $input->objectid   = $this->input->id;

        $model = new clsModModel($this->mdb, 'mw_top');
        $slide = $model->mw_top->getByID($input);

        $slide['url'] = $this->app->getWebRoot(). "/data/upload/" . $slide['url'];

        foreach ($slide as $k => $v) {
            $this->output->$k = $v;
        }
//         $this->output->editor         = array('id' => array('desc'), 'tools' => 'full');
    }

}