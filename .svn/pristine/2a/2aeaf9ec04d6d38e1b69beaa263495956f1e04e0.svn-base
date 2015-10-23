<?php
class clsWebsiteConfigDefaultController extends clsAppController implements IAction_default , IAction_update{

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

        if (!$this->model->update($this->input)) {
        	$this->output->result  = 'fail';
        	$this->output->message = $this->lang->config->failupdate;
        	return;
        }

        $this->output->result  = 'success';
        $this->output->message = $this->lang->config->successupdate;
        $this->output->locate  = U('website/config');

        //一键优化
        if ($this->input->optimize) {
            $this->optimize();
        }
    }

    /**
     * 页面初始化
     */
    private function init() {
        $input = new stdClass();
        $input->key = 'config';
        $config = $this->model->get($input);
// pr($config);
        foreach ($config as $v) {
        	$this->output->{$v->subkey} = $v->value;
        }

        $this->output->optimize_options = getYesOrNoOptions();
        $this->output->optimize_choose  = '0';
        $this->output->editor         = array('id' => array('content'), 'tools' => 'simple');
    }

    private function optimize() {
        //删除上传的数据库中不存在的文件
        $model = new clsModModel($this->mdb, 'mw_file');
        $list = $model->mw_file->fncFindAll();
        $filelist = array();
        foreach ($list as $key => $value) {
            $filelist[] = $value['filepath'];
        }
        $this->rrmdir(APATH_DATA_UPLOAD , $filelist);
    }

    private function rrmdir($dir , $filelist) {
        if (is_dir($dir)) {
            $objects = scandir($dir);
            foreach ($objects as $object) {
                if ($object != '.' && $object != '..') {
                    if (filetype($dir . DS .$object) == "dir") {
                        $this->rrmdir($dir . DS .$object , $filelist);
                    } else {
                        if (!in_array($dir. DS .$object , $filelist))
                        unlink($dir. DS .$object);
                    }
                }
            }
            reset($objects);
        }
    }

}