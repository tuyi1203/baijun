<?php
class clsGroupPersonEditController extends clsAppController implements IAction_default , IAction_update{

    /**
     * 默认初始化页面方法
     */
    public function _default() {

        $this->init();
    }

    /**
     * 添加人员
     */
    public function _update() {
// pr($_POST);exit;
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

        $ok = true;
        $this->mdb->subSetAutoCommit(false);//关闭自动提交
        $this->mdb->subStartTran();

        $model  = new clsModModel($this->mdb ,'yjm_person');

//         if (!$model->yjm_person->update($input))  $ok = false;
//pr($this->input->fileids);
        if($ok and $_FILES) {
            if (isset($this->input->fileids)) {
                //更新
                if(!$this->loadController('admin.system.file.edit')
                        ->replaceFiles($this->input->fileids , $files))
                    $ok = false;
            } else {
                //添加
                if(!$this->loadController('admin.system.file.default')
                        ->saveUpload('wxperson' , $this->input->id , $files)) {
                    $ok = false;
                }
            }
        }

        if($ok) {
            $this->mdb->subCommit();
            $this->output->result  = 'success';
            $this->output->message = $this->lang->person->successupdate;
            $this->output->locate  = 'group_person-default-default.html';
        } else {
            $this->mdb->subRollBack();
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->person->failupdate;
        }

        $this->mdb->subSetAutoCommit(true);//打开自动提交
    }

    /**
     * 页面初始化
     */
    private function init() {
    	$input = new stdClass();
    	$input->id         = $this->input->id;
    	$input->objecttype = 'wxperson';
    	$input->objectid   = $this->input->id;
    	$model = new clsModModel($this->mdb, 'yjm_person,mw_relation');
    	$person = $model->yjm_person->getById($input);
        if (!empty($person['url']))
    	    $person['url'] = $this->app->getWebRoot(). "/data/upload/" . $person['url'];

    	foreach ($person as $k => $v) {
    		$this->output->$k = $v;
    		if ($k == "level") $this->output->level_choose = $v;
    		if ($k == "team")  $this->output->team_choose  = $v;
//     		if ($k == "homepage") $this->output->homepage_choose = $v;
    	}
    	$this->output->level_options = getCategoryOptions('level');
    	$this->output->team_options = getCategoryOptions('team');

    	//取得擅长风格数据
    	$this->output->goodat_options = getCategoryOptions('style');

    	$input = new stdClass();
    	$input->objectid         = $this->input->id;
    	$input->objecttype = 'goodat';
    	$selectedHotItemList = $model->mw_relation->getListByObject($input);
    	$selectedItems = array();
    	foreach ($selectedHotItemList as $value) {
    	    if (array_key_exists($value['category'], $this->output->goodat_options))
    	        $selectedItems[] = $value['category'];
    	}
    	$this->output->goodat_choose = $selectedItems;
//     	$this->output->homepage_options = getYesOrNoOptions();

    }

}