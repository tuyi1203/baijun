<?php
class clsSingleCentreAddController extends clsAppController implements IAction_default , IAction_insert{

    /**
     * 默认初始化页面方法
     */
    public function _default() {

        $this->init();
    }

    /**
     * 添加幻灯片
     */
    public function _insert() {
// pr($_POST);exit;
        if ($this->form->isError()) {
            $this->output->result  = 'fail';
            $this->output->message = $this->form->getError();
            return;
        }

        $files = $this->loadController('admin.system.file.default')
                     ->getUpload('files');

        if (empty($files)) {
            $this->output->result = 'fail';
            $this->output->message = $this->lang->file->requireimage;
            return;
        }

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



        $input = new stdClass();
        $input->title       = $this->input->title;
//         $input->hotitems    = $this->input->hotitems;
        $input->event       = $this->input->event;
        $input->desc        = $this->input->desc;
        $input->createby    = $this->session->getUid();
        $input->createtime  = date("Y-m-d H:i:s");

        $ok = true;
        $this->mdb->subSetAutoCommit(false);//关闭自动提交
        $this->mdb->subStartTran();

        $model  = new clsModModel($this->mdb ,'hsp_centre,mw_relation,mw_event_relation');
        if (!$model->hsp_centre->insert($input)) {
            $ok = false;
        }

        $insertid = $model->hsp_centre->lastInsertID();

        if($ok and !$this->loadController('admin.system.file.default')
                    ->saveUpload($this->app->getModuleS() , $insertid , $files)) {
            $ok = false;
        }

            //插入热门项目
            foreach ($this->input->hotitems as $hotitemid) {
                $input = new stdClass();
                $input->objecttype = $this->app->getModuleS();
                $input->objectid   = $insertid;
                $input->category   = $hotitemid;
                if($ok and !$model->mw_relation->insert($input)) $ok = false;
            }


        //插入活动
        foreach ($this->input->event as $eventid) {
            $input = new stdClass();
            $input->objecttype = $this->app->getModuleS();
            $input->objectid   = $insertid;
            $input->event      = $eventid;
            if ($ok and !$model->mw_event_relation->insert($input)) $ok = false;
        }


        if($ok) {
            $this->mdb->subCommit();
            $this->output->result  = 'success';
            $this->output->message = $this->lang->centre->successinsert;
            $this->output->locate  = 'single_centre-default-default.html';
        } else {
            $this->mdb->subRollBack();
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->centre->failinsert;
        }

    }

    /**
     * 页面初始化
     */
    private function init() {
        $input = new stdClass();
        $input->objecttype = $this->app->getModuleS();

        $model = new clsModModel($this->mdb, 'mw_category,mw_event');

        //取得热门项目一览
        $hotItemList = $model->mw_category->getList($input);
        foreach ($hotItemList as $value) {
            $itemOptions[$value['id']] = $value['name'];
        }

        $this->output->hotitem_options = $itemOptions;
        $this->output->hotitem_choose = array();

        //取得活动一览
        $input->eventobjecttype = $this->app->getModuleS();
        $input->fileobjecttype  = 'event';
        $input->status          = "1";//只取出活动中的数据
        $eventList = $model->mw_event->getList($input);
        foreach ($eventList as $value) {
            $eventOptions[$value['id']] = $value['title'];
        }
        $this->output->event_options = $eventOptions;
        $this->output->event_choose = array();

//         $this->output->editor         = array('id' => array('desc'), 'tools' => 'full');
    }

}