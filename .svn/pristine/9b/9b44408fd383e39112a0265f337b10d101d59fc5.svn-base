<?php
class clsWeixinCustommenuAddController extends clsAppController implements IAction_default , IAction_insert{

    /**
     * 默认初始化页面方法
     */
    public function _default() {
        $this->init();
    }

    /**
     * 添加单页
     */
    public function _insert() {

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

        //菜单最大个数检查
        if (empty($this->input->pid)) {//如果是一级
            if($this->model->getCountOfParent() >= 3) {
                $this->output->result  = 'fail';
                $this->output->message = $this->lang->custommenu->error->parentenough;
                return;
            }
        } else {
            if ($this->input->replytype < 1) {//二级菜单必须设置回复类型
                $this->output->result  = 'fail';
                $this->output->message = $this->lang->custommenu->error->requirereplytype;
            }
            if($this->model->getCountOfChild($this->input) >= 5) {
                $this->output->result  = 'fail';
                $this->output->message = $this->lang->custommenu->error->childenough;
                return;
            }
        }

        //

        if(!$this->model->insert($this->input)) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->custommenu->failinsert;
            return;
        }

        $this->output->result  = 'success';
        $this->output->message = $this->lang->custommenu->successinsert;
        $this->output->locate  = U('weixin/custommenu');

    }

    /**
     * 页面初始化
     */
    private function init() {
        //初始化一级菜单列表
        $parentlist = $this->model->getParentList();
        $pid_options[''] = $this->lang->empty;
        foreach ($parentlist as $value) {
            $pid_options[$value->id] = $value->title;
        }

        //初始化排序列表
        $sort_options = array('0'=>'0','1'=>'1','2'=>'2','3'=>'3','4'=>'4');

        //回复类型列表
        $replytype_options['-1'] = $this->lang->empty;
        foreach (getReplyTypes() as $value) {
            $replytype_options[$value->subkey] = $value->value;
        }

        $this->output->replytype_options = $replytype_options;
        $this->output->replytype_choose  = '-1';//URL类型
        $this->output->sort_options      = $sort_options;
        $this->output->pid_options       = $pid_options;
//         $this->output->editor = array('id' => array('content'), 'tools' => 'simple');
//         $this->output->publishtime = date("Y-m-d H:i:s");
    }

}