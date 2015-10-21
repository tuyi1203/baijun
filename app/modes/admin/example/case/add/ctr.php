<?php
class clsExampleCaseAddController extends clsAppController implements IAction_default , IAction_insert{

    /**
     * 默认初始化页面方法
     */
    public function _default() {

        $this->init();
    }

    /**
     * 添加案例作品
     */
    public function _insert() {
// pr($_POST);

        if ($this->form->isError()) {
            $this->output->result  = 'fail';
            $this->output->message = $this->form->getError();
            return;
        }

        $model  = new clsModModel($this->mdb ,'yjm_case');

        $input = new stdClass();
        $input->title       = $this->input->title;
        $input->keyword     = $this->input->keyword;
        $input->summary     = $this->input->summary;
        $input->style       = $this->input->style;
        $input->house   	= $this->input->house;
        $input->room       	= $this->input->room;
        $input->surface   	= $this->input->surface;
        $input->yjmset   	= $this->input->yjmset;
        $input->area     	= $this->input->area;
        $input->price     	= $this->input->price;
        $input->designer   	= $this->input->designer;
        $input->content     = $this->input->content;
        $input->sort        = empty($this->input->sort)?0:$this->input->sort;
        $input->homepage    = $this->input->homepage;
        $input->createby    = $this->session->getUid();
        $input->createtime  = date("Y-m-d H:i:s");

        $ok = true;
        if (!$model->yjm_case->insert($input)) {
            $ok = false;
        }

        $insertid = $model->yjm_case->lastInsertID();

        if($ok and !$this->loadController('admin.system.file.default')
                ->updateObjectID($this->input->uid, $insertid, 'case')) {
            $ok = false;
        }

        if($ok) {
            $this->mdb->subCommit();
            $this->output->result  = 'success';
            $this->output->message = $this->lang->case->successinsert;
            $this->output->locate  = 'example_case-default-list.html';
        } else {
            $this->mdb->subRollBack();
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->case->failinsert;
        }
    }

    /**
     * 页面初始化
     */
    private function init() {
        //取得装修风格一览
        $this->output->style_options  = getCategoryOptions('style');
        //取得居室类型一览
        $this->output->room_options   = getCategoryOptions('room');
        //取得建面类型一览
        $this->output->surface_options= getCategoryOptions('surface');

        $model = new clsModModel($this->mdb , 'yjm_person');
        //取得套餐一览
        $this->output->yjmset_options = getYjmSetOptions();

        //取得设计师一览
        $records = $model->yjm_person->fncFindAll();
        $personlist = array();
        foreach ($records as $key => $value) {
            $personlist[$value['id']] = $value['name'];
        }
        $this->output->designer_options = $personlist;

        $this->output->editor         = array('id' => array('content'), 'tools' => 'full');
        $this->output->homepage_options = getYesOrNoOptions();
        $this->output->homepage_choose  = '0';
    }

}