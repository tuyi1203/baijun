<?php
class clsExampleRoomEditController extends clsAppController implements IAction_default , IAction_update{

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

        $input = new stdClass();
        $input->id          = $this->input->id;
        $input->name        = $this->input->name;
        $input->desc        = $this->input->name;
        $input->updateby    = $this->session->getUid();
        $input->updatetime  = date("Y-m-d H:i:s");

        $model  = new clsModModel($this->mdb ,'mw_category');

        if (!$model->mw_category->update($input)) {
        	$this->output->result  = 'fail';
        	$this->output->message = $this->lang->room->failupdate;
        	return;
        }

        $this->output->result  = 'success';
        $this->output->message = $this->lang->room->successupdate;
        $this->output->locate  = 'example_room-default-default.html';

    }

    /**
     * 页面初始化
     */
    private function init() {
        $input = new stdClass();
        $input->id         = $this->input->id;

        $model = new clsModModel($this->mdb, 'mw_category');
        $room = $model->mw_category->getByID($input);

        foreach ($room as $k => $v) {
            $this->output->$k = $v;
        }

//         $this->output->editor         = array('id' => array('content','content3'), 'tools' => 'noImage');
    }

}