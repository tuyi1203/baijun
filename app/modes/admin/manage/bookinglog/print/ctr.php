<?php
class clsManageBookinglogPrintController extends clsAppController
    implements IAction_default {


    /**
     * 默认初始化页面方法
     */
    public function _default() {
        $this->init();
// pr($_SESSION);
        $input = new stdClass();
        $input->orderby = $this->input->orderby;
        $input->sort = $this->input->sort;
        $this->loadSearchCond($input);
        $model = new clsModModel($this->mdb , "hsp_booking_log");

        $result = $model->hsp_booking_log->getList($input);
        $this->output->list = $result;
//         pr($_SESSION);
    }

    /**
     * 页面初始化
     */
    private function init() {

        if (!isset($this->input->orderby)) {
            $this->input->orderby         = "date";
            $this->input->sort            = "desc";
            $this->output->orderby        = "date";
            $this->output->sort           = "desc";
            $this->output->activesorting  = "asc";
        } else {
            $this->input->orderby = in_array($this->input->orderby , array('department','name','date'))?$this->input->orderby:"date";
            $this->input->sort    = in_array($this->input->sort , array('asc','desc'))?$this->input->sort:"desc";

            $this->output->orderby  = $this->input->orderby;
            $this->output->sort     = $this->input->sort;
            $this->output->activesorting  = $this->input->sort == "asc"?"desc":"asc";
        }
        $this->output->sorting        = "asc";

        $this->output->department_options = getDepartmentOptions($head = true);
        $this->output->datepicker = array('option'=>'simple');

    }

    private function loadSearchCond($input) {
        $cond = $this->session->fncGetValue(str_replace('print' , 'default', __FILE__.'searchCond'));
        // pr($cond);
        if (isset($cond['name']))       $input->name       = $cond['name'];
        if (isset($cond['patient']))    $input->patient    = $cond['patient'];
        if (isset($cond['department'])) $input->department = $cond['department'];
        if (isset($cond['datefrom']))   $input->datefrom   = $cond['datefrom'];
        if (isset($cond['dateto']))     $input->dateto     = $cond['dateto'];
        if (isset($cond['idno']))       $input->idno       = $cond['idno'];
        if (isset($cond['telno']))      $input->telno      = $cond['telno'];
        if (isset($cond['addr']))       $input->addr       = $cond['addr'];
        if (isset($cond['orderby']))    $input->orderby    = $cond['orderby'];
        if (isset($cond['sort']))       $input->sort       = $cond['sort'];

    }

}