<?php
class clsManagePersonDefaultController extends clsAppController
    implements IAction_default , IAction_delete , IAction_paging , IAction_sort , IAction_list{


    /**
     * 默认初始化页面方法
     */
    public function _default() {
// pr($_SESSION);

        $this->init();
        $model = new clsModModel($this->mdb , "eku_user_info");
        $input = new stdClass();
        $input->thisrole = $this->session->fncGetValue('_RoleId');
        $recTotal = $model->eku_user_info->getCount($input);
        $recperpage = $this->cookie->recperpage != false ? $this->cookie->recperpage : C('recperpage');

        if ($recTotal > 0) {
            $pager = new pager($recTotal , $recperpage , $currPage = 1);
            $input->orderby = $this->input->orderby;
            $input->sort    = $this->input->sort;
            $input->start = $pager->getRecStart();
            $input->end   = $pager->getRecEnd();
            $result = $model->eku_user_info->getList($input);

            $this->output->list = $result;
            $this->output->currpage = $currPage;
        }
        $this->clearSearchCond();
    }

    public function _list() {
// clsLogger::subWriteSysError('roleid='.$_POST['data']['roleid']);

        $this->init();

        $model = new clsModModel($this->mdb , "eku_user_info");
        $input = new stdClass();
        $input->thisrole = $this->session->fncGetValue('_RoleId');

        if ($this->input->roleid !== "") {
            $input->roleid = $this->input->roleid;
        }

        if (!empty($this->input->name)) {
            $input->name = $this->input->name;
        }
        $this->saveSearchCond($input);

        $recTotal = $model->eku_user_info->getCount($input);
        $recperpage = $this->cookie->recperpage != false ? $this->cookie->recperpage : C('recperpage');

        if ($recTotal > 0) {
            $pager = new pager($recTotal , $recperpage , $currPage = 1);
            $input->orderby = $this->input->orderby;
            $input->sort    = $this->input->sort;
            $input->start = $pager->getRecStart();
            $input->end   = $pager->getRecEnd();
            $result = $model->eku_user_info->getList($input);

            $this->output->list = $result;
            $this->output->currpage = $currPage;
        }
        $this->resumeForm($this->input);
    }

    public function _paging() {
//         pr($_SESSION);
        $this->init();

        $input = new stdClass();
        $input->thisrole = $this->session->fncGetValue('_RoleId');
        $this->loadSearchCond($input);

        $model = new clsModModel($this->mdb , "eku_user_info");
        $recTotal = $model->eku_user_info->getCount($input);
//         var_dump($this->cookie->lang);
        $recperpage = $this->cookie->recperpage != false ? $this->cookie->recperpage : C('recperpage');
        if ($recTotal > 0) {
            $pager  = new pager($recTotal , $recperpage , $this->input->currpage, $this->input->orderby , $this->input->sort);

            $input->orderby = $this->input->orderby;
            $input->sort    = $this->input->sort;
            $input->start   = $pager->getRecStart();
            $input->end     = $pager->getRecEnd();
            $result = $model->eku_user_info->getList($input);

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
        $model = new clsModModel($this->mdb , "eku_user_info");
        $recTotal = $model->eku_user_info->getCount($input);

        $recperpage = $this->cookie->recperpage != false ? $this->cookie->recperpage : C('recperpage');
        if ($recTotal > 0) {
            $pager  = new pager($recTotal , $recperpage , $this->input->currpage, $this->input->orderby , $this->input->sort);

            $input->orderby = $this->input->orderby;
            $input->sort    = $this->input->sort;
            $input->start = $pager->getRecStart();
            $input->end   = $pager->getRecEnd();


            $result = $model->eku_user_info->getList($input);
            $this->output->list = $result;
            $this->output->currpage = $this->input->currpage;
        }
        $this->resumeForm($input);
    }

    public function _delete() {

        $model = new clsModModel($this->mdb,'eku_user,eku_user_info,mw_file');
        $ok = true;
        $this->mdb->subSetAutoCommit(false);//关闭自动提交
        $this->mdb->subStartTran();

        if (!$model->eku_user->delete($this->input)) {
        	$ok = false;
        }

        if( $ok and !$model->eku_user_info->delete($this->input)) {
        	$ok = false;
        }

        $input = new stdClass();
        $input->objectid   = $this->input->id;
        $input->objecttype = MODULES;

        if($ok and !$model->mw_file->deleteByObject($input)) {
        		$ok = false;
        }

       	if($ok) {
       		$this->mdb->subCommit();
       		$this->output->result  = 'success';
       	} else {
       		$this->mdb->subRollBack();
       		$this->output->result  = 'fail';
       		$this->output->message = $this->lang->person->faildelete;
       	}
    }


    /**
     * 页面初始化
     */
    private function init() {

        if (!isset($this->input->orderby)) {
            $this->input->orderby         = "id";
            $this->input->sort            = "asc";
            $this->output->orderby        = "id";
            $this->output->sort           = "asc";
            $this->output->activesorting  = "desc";
        } else {
            $this->input->orderby = in_array($this->input->orderby , array('id','name','roleid'))?$this->input->orderby:"id";
            $this->input->sort    = in_array($this->input->sort , array('asc','desc'))?$this->input->sort:"asc";

            $this->output->orderby  = $this->input->orderby;
            $this->output->sort     = $this->input->sort;
            $this->output->activesorting  = $this->input->sort == "asc"?"desc":"asc";
        }
        $this->output->sorting        = "asc";

        $this->output->role_options   = getRoleOptions();
        if (!empty($this->input->roleid)) {
            $this->output->role_choose = $this->input->roleid;
        } else {
            $this->output->role_choose    = "";
        }
    }

    private function saveSearchCond($input) {
//         pr($_POST);
        $cond = array();
        if (isset($input->name))   $cond['name'] = $input->name;
        if (isset($input->roleid)) $cond['roleid'] = $input->roleid;

        $this->session->subSetValue( __FILE__.'searchCond' , $cond );
    }

    private function clearSearchCond() {
        $this->session->subUnsetValue(__FILE__.'searchCond');
    }

    private function resumeForm($input) {
        if (isset($input->name))
            $this->output->name = $input->name;

        if (isset($input->roleid))
            $this->output->role_choose = $input->roleid;
    }

    private function loadSearchCond($input) {
        $cond = $this->session->fncGetValue(__FILE__.'searchCond');
// pr($cond);
        if (isset($cond['name']))       $input->name   = $cond['name'];
        if (isset($cond['roleid']))     $input->roleid = $cond['roleid'];

    }

}