<?php
class clsSingleCentreEditController extends clsAppController implements IAction_default , IAction_update{

    /**
     * 默认初始化页面方法
     */
    public function _default() {

        $this->init();
    }

    /**
     * 添加幻灯片
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
        $input->title       = $this->input->title;
        $input->desc        = $this->input->desc;
        $input->updateby    = $this->session->getUid();
        $input->updatetime  = date("Y-m-d H:i:s");
        $input->id          = $this->input->id;

        $ok = true;
        $this->mdb->subSetAutoCommit(false);//关闭自动提交
        $this->mdb->subStartTran();

        $model  = new clsModModel($this->mdb ,'hsp_centre,mw_relation,mw_event_relation');
        if (!$model->hsp_centre->update($input)) {
            $ok = false;
        }

        if($ok and $_FILES) {
            if(!$this->loadController('admin.system.file.edit')
                    ->replaceFiles($this->input->fileids , $files))
                $ok = false;
        }

        //-------------------更新热门项目，先删除后添加-------------------
        //删除热门项目
        $input = new stdClass();
        $input->objecttype = $this->app->getModuleS();
        $input->objectid   = $this->input->id;
        if ($ok and !$model->mw_relation->delete($input)) $ok = false;

        //添加热门项目
        foreach ($this->input->hotitems as $hotitemid) {
            $input = new stdClass();
            $input->objecttype = $this->app->getModuleS();
            $input->objectid   = $this->input->id;
            $input->category   = $hotitemid;
            if($ok and !$model->mw_relation->insert($input)) $ok = false;
        }

        //-------------------更新活动，先删除后添加-------------------
        //删除活动
        $input = new stdClass();
        $input->objecttype = $this->app->getModuleS();
        $input->objectid   = $this->input->id;
        if ($ok and !$model->mw_event_relation->delete($input)) $ok = false;

        //添加活动
        foreach ($this->input->event as $eventid) {
            $input = new stdClass();
            $input->objecttype = $this->app->getModuleS();
            $input->objectid   = $this->input->id;
            $input->event      = $eventid;
            if ($ok and !$model->mw_event_relation->insert($input)) $ok = false;
        }


        if($ok) {
            $this->mdb->subCommit();
            $this->output->result  = 'success';
            $this->output->message = $this->lang->centre->successupdate;
            $this->output->locate  = 'single_centre-default-default.html';
        } else {
            $this->mdb->subRollBack();
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->centre->failupdate;
        }

    }

    /**
     * 页面初始化
     */
    private function init() {

        $input = new stdClass();
        $input->id         = $this->input->id;
        $input->objecttype = $this->app->getModuleS();
        $input->objectid   = $this->input->id;

        $model = new clsModModel($this->mdb, 'hsp_centre,mw_category,mw_relation,mw_event,mw_event_relation');
        $centre = $model->hsp_centre->getByID($input);

        $centre['url'] = $this->app->getWebRoot(). "/data/upload/" . $centre['url'];

        foreach ($centre as $k => $v) {
            $this->output->$k = $v;
        }

        $input = new stdClass();
        $input->objecttype = $this->app->getModuleS();


        //取得热门项目总一览
        $hotItemList = $model->mw_category->getList($input);
        foreach ($hotItemList as $value) {
            $itemOptions[$value['id']] = $value['name'];
        }


        //取得该数据关联的热门项目
        $input->objectid = $this->input->id;
        $selectedHotItemList = $model->mw_relation->getListByObject($input);
        $selectedItems = array();
        foreach ($selectedHotItemList as $value) {
            if (array_key_exists($value['category'], $itemOptions))
                $selectedItems[] = $value['category'];
        }
        $this->output->hotitem_options = $itemOptions;
        $this->output->hotitem_choose = $selectedItems;


        //取得活动总一览
        $input->eventobjecttype = $this->app->getModuleS();
        $input->fileobjecttype  = 'event';
        $input->status          = "1";//只取出活动中的数据
        $eventList = $model->mw_event->getList($input);
        foreach ($eventList as $value) {
            $eventOptions[$value['id']] = $value['title'];
        }

        //取得该数据关联的活动
        $selectedEventList = $model->mw_event_relation->getListByObject($input);
        $selectedItems = array();
        foreach ($selectedEventList as $value) {
            if (array_key_exists($value['event'], $eventOptions))
                $selectedItems[] = $value['event'];
        }

        $this->output->event_options = $eventOptions;
        $this->output->event_choose  = $selectedItems;

//         $this->output->editor         = array('id' => array('desc'), 'tools' => 'full');
    }

}