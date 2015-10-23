<?php
class clsManageBookinglogDefaultController extends clsAppController
    implements IAction_default , IAction_delete , IAction_paging , IAction_sort , IAction_list{


    /**
     * 默认初始化页面方法
     */
    public function _default() {
// pr($_SESSION);
        $this->init();
        $model = new clsModModel($this->mdb , "hsp_booking_log");
        $input = new stdClass();
        $recTotal = $model->hsp_booking_log->getCount($input);
        $recperpage = $this->cookie->recperpage != false ? $this->cookie->recperpage : config::$recperpage;

        if ($recTotal > 0) {
            $pager = new pager($recTotal , $recperpage , $currPage = 1);
//             $input  = new stdClass();
            $input->orderby = $this->input->orderby;
            $input->sort    = $this->input->sort;
            $input->start = $pager->getRecStart();
            $input->end   = $pager->getRecEnd();
            $result = $model->hsp_booking_log->getList($input);
// pr($result);
            $this->output->list = $result;
            $this->output->currpage = $currPage;
        }
        $this->clearSearchCond();
//         pr($_SESSION);
    }

    public function _list() {
        $this->init();
        $input = new stdClass();
        $model = new clsModModel($this->mdb , "hsp_booking_log");

        if (!empty($this->input->department)) {
            $input->department = $this->input->department;
        }

        if (!empty($this->input->name)) {
            $input->name = $this->input->name;
        }

        if (!empty($this->input->datefrom)) {
            $input->datefrom = $this->input->datefrom;
        }

        if (!empty($this->input->dateto)) {
            $input->dateto = $this->input->dateto;
        }

        if (!empty($this->input->patient)) {
            $input->patient = $this->input->patient;
        }

        if (!empty($this->input->idno)) {
            $input->idno = $this->input->idno;
        }

        if (!empty($this->input->telno)) {
            $input->telno = $this->input->telno;
        }

        if (!empty($this->input->addr)) {
            $input->addr = $this->input->addr;
        }

        $input->orderby = $this->input->orderby;
        $input->sort    = $this->input->sort;

        $this->saveSearchCond($input);

        $recTotal = $model->hsp_booking_log->getCount($input);
        $recperpage = $this->cookie->recperpage != false ? $this->cookie->recperpage : config::$recperpage;

        if ($recTotal > 0) {
            $pager = new pager($recTotal , $recperpage , $currPage = 1);
            $input->start = $pager->getRecStart();
            $input->end   = $pager->getRecEnd();
            $result = $model->hsp_booking_log->getList($input);

            $this->output->list = $result;
            $this->output->currpage = $currPage;
        }
        $this->resumeForm($this->input);
    }

    public function _paging() {
//         echo "hello";
        $this->init();
// pr($_SESSION);
        $input = new stdClass();
        $this->loadSearchCond($input);
        $model = new clsModModel($this->mdb , "hsp_booking_log");
        $recTotal = $model->hsp_booking_log->getCount($input);
//         var_dump($this->cookie->lang);
        $recperpage = $this->cookie->recperpage != false ? $this->cookie->recperpage : config::$recperpage;
        if ($recTotal > 0) {
            $pager  = new pager($recTotal , $recperpage , $this->input->currpage, $this->input->orderby , $this->input->sort);

            $input->orderby = $this->input->orderby;
            $input->sort    = $this->input->sort;
            $input->start   = $pager->getRecStart();
            $input->end     = $pager->getRecEnd();
            $result = $model->hsp_booking_log->getList($input);

            $this->output->list = $result;
            $this->output->currpage = $this->input->currpage;
        }
        $this->saveSearchCond($input);
        $this->resumeForm($input);
    }


    public function _sort() {
        $this->init();
// pr($_SESSION);
        $input = new stdClass();
        $this->loadSearchCond($input);
//         pr($input);
        $model = new clsModModel($this->mdb , "hsp_booking_log");
        $recTotal = $model->hsp_booking_log->getCount($input);

        $recperpage = $this->cookie->recperpage != false ? $this->cookie->recperpage : config::$recperpage;
        if ($recTotal > 0) {
            $pager  = new pager($recTotal , $recperpage , $this->input->currpage, $this->input->orderby , $this->input->sort);

            $input->orderby = $this->input->orderby;
            $input->sort    = $this->input->sort;
            $input->start = $pager->getRecStart();
            $input->end   = $pager->getRecEnd();


            $result = $model->hsp_booking_log->getList($input);
            $this->output->list = $result;
            $this->output->currpage = $this->input->currpage;
        }
        $this->saveSearchCond($input);
        $this->resumeForm($input);
    }

    public function _delete() {

        $model = new clsModModel($this->mdb,'hsp_booking_log');
        if(!$model->hsp_booking_log->delete($this->input)) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->news->faildelete;
            return;
        }
        $this->output->result  = 'success';
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

    private function clearSearchCond() {
        $this->session->subUnsetValue(__FILE__.'searchCond');
    }

    private function saveSearchCond($input) {
        //         pr($_POST);
        $cond = array();
        if (isset($input->name))       $cond['name']       = $input->name;
        if (isset($input->patient))    $cond['patient']    = $input->patient;
        if (isset($input->department)) $cond['department'] = $input->department;
        if (isset($input->datefrom))   $cond['datefrom']   = $input->datefrom;
        if (isset($input->dateto))     $cond['dateto']     = $input->dateto;
        if (isset($input->idno))       $cond['idno']       = $input->idno;
        if (isset($input->telno))      $cond['telno']      = $input->telno;
        if (isset($input->addr))       $cond['addr']       = $input->addr;

        if (isset($input->orderby))    $cond['orderby']       = $input->orderby;
        if (isset($input->sort))       $cond['sort']          = $input->sort;

        $this->session->subSetValue( __FILE__.'searchCond' , $cond );
    }

    private function loadSearchCond($input) {
        $cond = $this->session->fncGetValue(__FILE__.'searchCond');
        // pr($cond);
        if (isset($cond['name']))       $input->name       = $cond['name'];
        if (isset($cond['patient']))    $input->patient    = $cond['patient'];
        if (isset($cond['department'])) $input->department = $cond['department'];
        if (isset($cond['datefrom']))   $input->datefrom   = $cond['datefrom'];
        if (isset($cond['dateto']))     $input->dateto     = $cond['dateto'];
        if (isset($cond['idno']))       $input->idno       = $cond['idno'];
        if (isset($cond['telno']))      $input->telno      = $cond['telno'];
        if (isset($cond['addr']))       $input->addr       = $cond['addr'];

    }

    private function resumeForm($input) {
        if (isset($input->name))
            $this->output->name = $input->name;

        if (isset($input->department))
            $this->output->department_choose = $input->department;

        if (isset($input->patient))
            $this->output->patient = $input->patient;


        if (isset($input->datefrom))
            $this->output->datefrom = $input->datefrom;

        if (isset($input->dateto))
            $this->output->dateto = $input->dateto;

        if (isset($input->idno))
            $this->output->idno = $input->idno;

        if (isset($input->telno))
            $this->output->telno = $input->telno;

        if (isset($input->addr))
            $this->output->addr = $input->addr;
    }

}