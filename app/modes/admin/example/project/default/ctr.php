<?php
class clsExampleProjectDefaultController extends clsAppController
    implements IAction_default , IAction_delete , IAction_paging , IAction_sort , IAction_list{


    /**
     * 默认初始化页面方法
     */
    public function _default() {
// pr($_SESSION);

        $this->init();
        $model = new clsModModel($this->mdb , "yjm_project");
        $input = new stdClass();
        $recTotal = $model->yjm_project->getCount($input);
        $recperpage = $this->cookie->recperpage != false ? $this->cookie->recperpage : config::$recperpage;

        if ($recTotal > 0) {
            $pager = new pager($recTotal , $recperpage , $currPage = 1);
            $input->orderby = $this->input->orderby;
            $input->sort    = $this->input->sort;
            $input->start = $pager->getRecStart();
            $input->end   = $pager->getRecEnd();
            $result = $model->yjm_project->getList($input);

            $this->output->list = $result;
            $this->output->currpage = $currPage;
        }
        $this->clearSearchCond();
    }

    public function _list() {
// clsLogger::subWriteSysError('roleid='.$_POST['data']['roleid']);

        $this->init();

        $model = new clsModModel($this->mdb , "yjm_project");
        $input = new stdClass();

        if (!empty($this->input->style)) {
            $input->style = $this->input->style;
        }

        if (!empty($this->input->room)) {
            $input->room = $this->input->room;
        }

        if (!empty($this->input->surface)) {
            $input->surface = $this->input->surface;
        }

        if (!empty($this->input->yjmset)) {
            $input->yjmset = $this->input->yjmset;
        }

        $this->saveSearchCond($input);

        $recTotal = $model->yjm_project->getCount($input);
        $recperpage = $this->cookie->recperpage != false ? $this->cookie->recperpage : config::$recperpage;

        if ($recTotal > 0) {
            $pager = new pager($recTotal , $recperpage , $currPage = 1);
            $input->orderby = $this->input->orderby;
            $input->sort    = $this->input->sort;
            $input->start = $pager->getRecStart();
            $input->end   = $pager->getRecEnd();
            $result = $model->yjm_project->getList($input);

            $this->output->list = $result;
            $this->output->currpage = $currPage;
        }
        $this->resumeForm($this->input);
    }

    public function _paging() {
//         pr($_SESSION);
        $this->init();

        $input = new stdClass();
        $this->loadSearchCond($input);

        $model = new clsModModel($this->mdb , "yjm_project");
        $recTotal = $model->yjm_project->getCount($input);
//         var_dump($this->cookie->lang);
        $recperpage = $this->cookie->recperpage != false ? $this->cookie->recperpage : config::$recperpage;
        if ($recTotal > 0) {
            $pager  = new pager($recTotal , $recperpage , $this->input->currpage, $this->input->orderby , $this->input->sort);

            $input->orderby = $this->input->orderby;
            $input->sort    = $this->input->sort;
            $input->start   = $pager->getRecStart();
            $input->end     = $pager->getRecEnd();
            $result = $model->yjm_project->getList($input);

            $this->output->list = $result;
            $this->output->currpage = $this->input->currpage;
        }

        $this->resumeForm($input);
    }


    public function _sort() {
//         pr($_SESSION);
        $this->init();
        $input = new stdClass();
        $input->thisrole = $this->session->fncGetValue('_RoleId');
        $this->loadSearchCond($input);
        $model = new clsModModel($this->mdb , "yjm_project");
        $recTotal = $model->yjm_project->getCount($input);

        $recperpage = $this->cookie->recperpage != false ? $this->cookie->recperpage : config::$recperpage;
        if ($recTotal > 0) {
            $pager  = new pager($recTotal , $recperpage , $this->input->currpage, $this->input->orderby , $this->input->sort);

            $input->orderby = $this->input->orderby;
            $input->sort    = $this->input->sort;
            $input->start = $pager->getRecStart();
            $input->end   = $pager->getRecEnd();


            $result = $model->yjm_project->getList($input);
            $this->output->list = $result;
            $this->output->currpage = $this->input->currpage;
        }
        $this->resumeForm($input);
    }

    public function _delete() {

        $model = new clsModModel($this->mdb,'eku_user,yjm_project,mw_file');
        $ok = true;
        $this->mdb->subSetAutoCommit(false);//关闭自动提交
        $this->mdb->subStartTran();

//         if (!$model->eku_user->delete($this->input)) {
//         	$ok = false;
//         }

        if( $ok and !$model->yjm_project->delete($this->input)) {
        	$ok = false;
        }

        $input = new stdClass();
        $input->objectid   = $this->input->id;
        $input->objecttype = $this->app->getModuleS();

        if($ok and !$model->mw_file->deleteByObject($input)) {
        		$ok = false;
        }

       	if($ok) {
       		$this->mdb->subCommit();
       		$this->output->result  = 'success';
       	} else {
       		$this->mdb->subRollBack();
       		$this->output->result  = 'fail';
       		$this->output->message = $this->lang->project->faildelete;
       	}
    }


    /**
     * 页面初始化
     */
    private function init() {

        if (!isset($this->input->orderby)) {
            $this->input->orderby         = "sort";
            $this->input->sort            = "asc";
            $this->output->orderby        = "sort";
            $this->output->sort           = "asc";
            $this->output->activesorting  = "desc";
        } else {
            $this->input->orderby = in_array($this->input->orderby , array('sort','style','room','surface','views','homepage'))?$this->input->orderby:"sort";
            $this->input->sort    = in_array($this->input->sort , array('asc','desc'))?$this->input->sort:"asc";

            $this->output->orderby  = $this->input->orderby;
            $this->output->sort     = $this->input->sort;
            $this->output->activesorting  = $this->input->sort == "asc"?"desc":"asc";
        }
        $this->output->sorting        = "asc";

        $this->output->style_options   = getCategoryOptions('style',$head=true);
        $this->output->room_options    = getCategoryOptions('room' ,$head=true);
        $this->output->surface_options = getCategoryOptions('surface' ,$head=true);
        $this->output->yjmset_options  = getYjmSetOptions($head = true);

    }

    private function saveSearchCond($input) {
//         pr($_POST);
        $cond = array();
//         if (isset($input->name))   $cond['name'] = $input->name;
        if (isset($input->style))  $cond['style'] = $input->style;
        if (isset($input->room))   $cond['room'] = $input->room;
        if (isset($input->surface))$cond['surface'] = $input->surface;
        if (isset($input->yjmset)) $cond['yjmset'] = $input->yjmset;

        $this->session->subSetValue( __FILE__.'searchCond' , $cond );
    }

    private function clearSearchCond() {
        $this->session->subUnsetValue(__FILE__.'searchCond');
    }

    private function resumeForm($input) {
//         if (isset($input->name))
//             $this->output->name = $input->name;

        if (isset($input->style))
            $this->output->style_choose = $input->style;

        if (isset($input->room))
            $this->output->room_choose = $input->room;

        if (isset($input->surface))
            $this->output->surface_choose = $input->surface;

        if (isset($input->yjmset))
            $this->output->yjmset_choose = $input->yjmset;
    }

    private function loadSearchCond($input) {
        $cond = $this->session->fncGetValue(__FILE__.'searchCond');
// pr($cond);
//         if (isset($cond['name']))       $input->name     = $cond['name'];
        if (isset($cond['style']))      $input->style    = $cond['style'];
        if (isset($cond['room']))       $input->room     = $cond['room'];
        if (isset($cond['surface']))    $input->surface  = $cond['surface'];
        if (isset($cond['yjmset']))     $input->yjmset   = $cond['yjmset'];

    }

}