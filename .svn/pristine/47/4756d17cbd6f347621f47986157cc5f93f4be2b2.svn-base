<?php
class clsManageHousesubmitConfirmController extends clsAppController
    implements IAction_default {


    /**
     * 默认初始化页面方法
     */
    public function _default() {
// pr($_SESSION);
        $this->init();
        $model = new clsModModel($this->mdb , "yjm_housesubmit");
        $input = new stdClass();
        $input->id = $this->input->id;
        $result = $model->yjm_housesubmit->get($input);

        foreach ($result as $k => $v) {
        	$this->output->$k = $v;
        	if ($k == "content") {
        	    $this->output->nofilter->content = nl2br($v);
        	}
        }
    }


    /**
     * 页面初始化
     */
    private function init() {

//         if (!isset($this->input->orderby)) {
//             $this->input->orderby         = "id";
//             $this->input->sort            = "asc";
//             $this->output->orderby        = "id";
//             $this->output->sort           = "asc";
//             $this->output->activesorting  = "desc";
//         } else {
//             $this->input->orderby = in_array($this->input->orderby , array('id','title','createtime','views','public','createby','status'))?$this->input->orderby:"id";
//             $this->input->sort    = in_array($this->input->sort , array('asc','desc'))?$this->input->sort:"asc";

//             $this->output->orderby  = $this->input->orderby;
//             $this->output->sort     = $this->input->sort;
//             $this->output->activesorting  = $this->input->sort == "asc"?"desc":"asc";
//         }
//         $this->output->sorting        = "asc";
    }

}
