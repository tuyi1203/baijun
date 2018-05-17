<?php
class clsServiceHrgroupEditController extends clsAppController implements IAction_default , IAction_update{

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

//             pr($files);

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
        $input->label       = $this->input->label;
//         $input->desc        = $this->input->desc;
        $input->updateby    = $this->session->getUid();
        $input->updatetime  = date("Y-m-d H:i:s");
        $input->id          = $this->input->id;

        $ok = true;
        $this->mdb->subSetAutoCommit(false);//关闭自动提交
        $this->mdb->subStartTran();

        $model  = new clsModModel($this->mdb ,'mw_hr_group');

        if (!$model->mw_hr_group->update($input))  $ok = false;
// var_dump(empty($this->input->fileids[0]));
		if (empty($this->input->fileids[0]) and $ok) {
			if(!$this->loadController('admin.system.file.default')
					->saveUpload(MODULES , $this->input->id , $files)) {
				$ok = false;
			}
		} else if($ok and $_FILES) {
            if(!$this->loadController('admin.system.file.edit')
                    ->replaceFiles($this->input->fileids , $files))
                $ok = false;
        }

        if(!$this->loadController('admin.system.file.default')
                ->updateObjectID($this->input->uid, $this->input->id, 'hrgroup')) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->hrgroup->failupdate;
            return;
        }

        if($ok) {
            $this->mdb->subCommit();
            $this->output->result  = 'success';
            $this->output->message = $this->lang->hrgroup->successupdate;
            $this->output->locate  = U('service/hrgroup');
        } else {
            $this->mdb->subRollBack();
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->hrgroup->failupdate;
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

        $model = new clsModModel($this->mdb, 'mw_hr_group');
        $hrgroup = $model->mw_hr_group->getByID($input);
// pr($hrgroup);
        $hrgroup['url'] = UPLOAD_URL . $hrgroup['url'];

        foreach ($hrgroup as $k => $v) {
            $this->output->$k = $v;
        }
        //$this->output->editor         = array('id' => array('desc'), 'tools' => 'full');
    }

}