<?php
class clsWeixinCustommenuEditController extends clsAppController implements IAction_default , IAction_update{

    /**
     * 默认初始化页面方法
     */
    public function _default() {
        $this->init();
    }

    public function _update() {

        if ($this->form->isError()) {
            $this->output->result  = 'fail';
            $this->output->message = $this->form->getError();
            return;
        }

        //url验证
        if ($this->input->replytype === "1") {
            if (empty($this->input->url)) {
                $this->output->result  = 'fail';
                $this->output->message = array('url'=>sprintf($this->lang->error->notempty ,$this->lang->custommenu->url ));
                return;
            }
            if (!validater::checkURL($this->input->url)) {
                $this->output->result  = 'fail';
                $this->output->message = array('url'=>sprintf($this->lang->error->url ,$this->lang->custommenu->url));
                return;
            }
        }

        //文字消息验证
        if ($this->input->replytype === "2") {
            if (empty($this->input->replytext)) {
                $this->output->result  = 'fail';
                $this->output->message = array('replytext'=>sprintf($this->lang->error->notempty ,$this->lang->custommenu->replytext ));
                return;
            }
        }

        if(!$this->model->update($this->input)) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->custommenu->failupdate;
            return;
        }

        $this->output->result  = 'success';
        $this->output->message = $this->lang->custommenu->successupdate;
        $this->output->locate  = U('weixin/custommenu');

    }

    /**
     * 页面初始化
     */
    private function init() {

        //取得该数据
        $record = $this->model->findById($this->input);
        foreach (get_object_vars($record) as $key => $value) {
        	$this->output->$key = $value;
        }

        //如果有关键字数据则取得该数据
        if ($row = $this->model->getKeyword($this->input)) {
			$this->output->replytext = $row->replytext;
        }

        if ($record->pid) {//如果是二级菜单
        	foreach (getReplyTypes() as $value) {
        		$replytype_options[$value->subkey] = $value->value;
        	}
        } else {//如果是一级，则判断该一级下是否有二级菜单
        	$replytype_options['-1'] = $this->lang->empty;
			if ($this->model->getCountOfChild($this->input) < 1) {
				$replytype_options['-1'] = $this->lang->empty;
				foreach (getReplyTypes() as $value) {
					$replytype_options[$value->subkey] = $value->value;
				}
			}
        }

        //初始化一级菜单列表
        $parentlist = $this->model->getParentList();
        $pid_options[''] = $this->lang->empty;
        foreach ($parentlist as $value) {
            $pid_options[$value->id] = $value->title;
        }

        //初始化排序列表
        $sort_options = array('0'=>'0','1'=>'1','2'=>'2','3'=>'3','4'=>'4');

        $this->output->replytype_options = $replytype_options;
        $this->output->replytype_choose  = empty($record->replytype)?'-1':$record->replytype;//URL类型
        $this->output->sort_options      = $sort_options;
        $this->output->pid_options       = $pid_options;
    }

}