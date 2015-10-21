<?php

class clsWeixinCustommenuDefaultController extends clsAppController implements IAction_default , IAction_publish,IAction_delete{

    /**
     * 默认初始化页面方法
     */
    public function _default() {
        $this->init();
    }

    public function _delete() {

        if(!$this->model->delete($this->input)) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->custommenu->faildelete;
            return;
        }
        $this->output->result  = 'success';
    }


    public function _publish()
    {
        member::getList();exit;
        if(customMenu::create($this->buildJsonData($this->model->getAll()))) {
            $this->output->result  = 'success';
            $this->output->message = $this->lang->custommenu->successpublish;
            return;
        }
        $this->output->result  = 'fail';
        $this->output->message = $this->lang->custommenu->failpublish;

    }

    /**
     * 页面初始化
     */
    private function init()
    {
        $list = array();
        $menus = $this->model->getMenuList();
        foreach ($menus as $record) {
            $list[$record->pid]['ptitle']          = $record->ptitle;
            $list[$record->pid]['psort']           = $record->psort;
            $list[$record->pid]['preplytype']      = $record->preplytype;
            $list[$record->pid]['preplytypename']  = $record->preplytypename;
            if (!empty($record->id)) {
                $list[$record->pid]['sub'][$record->id]['title']          = $record->title;
                $list[$record->pid]['sub'][$record->id]['sort']           = $record->sort;
                $list[$record->pid]['sub'][$record->id]['replytype']      = $record->replytype;
                $list[$record->pid]['sub'][$record->id]['replytypename']  = $record->replytypename;
            }
        }
        $this->output->list = $list;
    }

    private function buildJsonData($records)
    {
        $list = array();
        $buttonArr = array();
        $pid = null;
        foreach ($records as $record) {
            if ($pid != $record->pid) {
                if (!empty($buttonArr)) {
                    $list['button'][] = $buttonArr;
                }
                $pid = $record->pid;
                $buttonArr = array();
            }
            if ("" == $record->id && "" !== $record->preplytype) {//只含一级菜单的数据
                if ($record->preplytype == '1')  {
                    $list['button'][] = array('type'=>'view' , 'name'=>$record->ptitle , 'url'=>$record->purl);
                } else {
                    $list['button'][] = array('type'=>'click' , 'name'=>$record->ptitle , 'key'=>'custommenu-' . $record->pid);
                }
            } else {
                if (empty($buttonArr)) {
                    $buttonArr = array('name'=>$record->ptitle , 'sub_button'=>array());
                }
                if ($record->replytype == '1')  {
                    $buttonArr['sub_button'][] = array('type'=>'view' , 'name'=>$record->title , 'url'=>$record->url);;
                } else {
                    $buttonArr['sub_button'][] = array('type'=>'click' , 'name'=>$record->title , 'key'=>'custommenu-' . $record->id);;
                }
            }

//                 $list['button'][] = $buttonArr;
//                 $buttonArr = array();
//                 if ("" !== $record->preplytype) {//如果没有二级菜单
//                     if ($record->preplytype == '1')  {
//                         $list['button'][] = array('type'=>'view' , 'name'=>$record->ptitle , 'url'=>$record->purl);
//                     } else {
//                         $list['button'][] = array('type'=>'click' , 'name'=>$record->ptitle , 'key'=>'custommenu-' . $record->pid);
//                     }
//                 } else {
//                     $buttonArr = array('name'=>$record->ptitle , 'sub_button'=>array());
//                 }
//             } else {//二级菜单
//                 if ($record->replytype == '1')  {
//                     $buttonArr['sub_button'][] = array('type'=>'view' , 'name'=>$record->title , 'url'=>$record->url);;
//                 } else {
//                     $buttonArr['sub_button'][] = array('type'=>'click' , 'name'=>$record->title , 'key'=>'custommenu-' . $record->id);;
//                 }
//             }
        }
        if (!empty($buttonArr)) {
            $list['button'][] = $buttonArr;
        }
        return $list;
    }

}