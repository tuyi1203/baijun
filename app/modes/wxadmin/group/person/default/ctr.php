<?php
class clsGroupPersonDefaultController extends clsAppController
    implements IAction_default , IAction_paging , IAction_sort {


    /**
     * 默认初始化页面方法
     */
    public function _default() {
// pr($_SESSION);

        $this->init();
        $model = new clsModModel($this->mdb , "yjm_person");
        $input = new stdClass();
        $recTotal = $model->yjm_person->getCount($input);
        $recperpage = $this->cookie->recperpage != false ? $this->cookie->recperpage : config::$recperpage;

        if ($recTotal > 0) {
            $pager = new pager($recTotal , $recperpage , $currPage = 1);
            $input->orderby = $this->input->orderby;
            $input->sort    = $this->input->sort;
			$input->objecttype  = 'wxperson';
            $input->start = $pager->getRecStart();
            $input->end   = $pager->getRecEnd();
            $result = $model->yjm_person->getList($input);
            foreach ($result as $key => $value) {
                if (!empty($value['url']))
            	    $result[$key]['url'] = $this->app->getWebRoot(). "/data/upload/" . $value['url'];
            }
            $this->output->list = $result;
            $this->output->currpage = $currPage;
        }
//         $this->clearSearchCond();
    }

//     public function _list() {
// // clsLogger::subWriteSysError('roleid='.$_POST['data']['roleid']);

//         $this->init();

//         $model = new clsModModel($this->mdb , "yjm_person");
//         $input = new stdClass();
//         $input->thisrole = $this->session->fncGetValue('_RoleId');

//         if ($this->input->roleid !== "") {
//             $input->roleid = $this->input->roleid;
//         }

//         if (!empty($this->input->name)) {
//             $input->name = $this->input->name;
//         }
//         $this->saveSearchCond($input);

//         $recTotal = $model->yjm_person->getCount($input);
//         $recperpage = $this->cookie->recperpage != false ? $this->cookie->recperpage : config::$recperpage;

//         if ($recTotal > 0) {
//             $pager = new pager($recTotal , $recperpage , $currPage = 1);
//             $input->orderby = $this->input->orderby;
//             $input->sort    = $this->input->sort;
//             $input->start = $pager->getRecStart();
//             $input->end   = $pager->getRecEnd();
//             $result = $model->yjm_person->getList($input);

//             $this->output->list = $result;
//             $this->output->currpage = $currPage;
//         }
//         $this->resumeForm($this->input);
//     }

    public function _paging() {
    	$this->init();
    	$model = new clsModModel($this->mdb , "yjm_person");
    	$input = new stdClass();
    	$recTotal = $model->yjm_person->getCount($input);
    	$recperpage = $this->cookie->recperpage != false ? $this->cookie->recperpage : config::$recperpage;

    	if ($recTotal > 0) {
    		$pager = new pager($recTotal , $recperpage , $this->input->currpage , $this->input->orderby , $this->input->sort);
    		$input->orderby = $this->input->orderby;
    		$input->sort    = $this->input->sort;
    		$input->objecttype  = 'wxperson';
    		$input->start = $pager->getRecStart();
    		$input->end   = $pager->getRecEnd();
    		$result = $model->yjm_person->getList($input);
    		foreach ($result as $key => $value) {
    			$result[$key]['url'] = $this->app->getWebRoot(). "/data/upload/" . $value['url'];
    		}
    		$this->output->list = $result;
    		$this->output->currpage = $this->input->currpage;
    	}
    }

//     public function _paging() {
// //         pr($_SESSION);
//         $this->init();

//         $input = new stdClass();
//         $input->thisrole = $this->session->fncGetValue('_RoleId');
//         $this->loadSearchCond($input);

//         $model = new clsModModel($this->mdb , "yjm_person");
//         $recTotal = $model->yjm_person->getCount($input);
// //         var_dump($this->cookie->lang);
//         $recperpage = $this->cookie->recperpage != false ? $this->cookie->recperpage : config::$recperpage;
//         if ($recTotal > 0) {
//             $pager  = new pager($recTotal , $recperpage , $this->input->currpage, $this->input->orderby , $this->input->sort);

//             $input->orderby = $this->input->orderby;
//             $input->sort    = $this->input->sort;
//             $input->start   = $pager->getRecStart();
//             $input->end     = $pager->getRecEnd();
//             $result = $model->yjm_person->getList($input);

//             $this->output->list = $result;
//             $this->output->currpage = $this->input->currpage;
//         }

//         $this->resumeForm($input);
//     }


    public function _sort() {
    	$this->init();
    	$model = new clsModModel($this->mdb , "yjm_person");
    	$input = new stdClass();
    	$recTotal = $model->yjm_person->getCount($input);
    	$recperpage = $this->cookie->recperpage != false ? $this->cookie->recperpage : config::$recperpage;

    	if ($recTotal > 0) {
    		$pager = new pager($recTotal , $recperpage , $this->input->currpage , $this->input->orderby , $this->input->sort);
    		$input->orderby = $this->input->orderby;
    		$input->sort    = $this->input->sort;
    		$input->objecttype  = $this->app->getModuleS();
    		$input->start = $pager->getRecStart();
    		$input->end   = $pager->getRecEnd();
    		$result = $model->yjm_person->getList($input);
    		foreach ($result as $key => $value) {
    			$result[$key]['url'] = $this->app->getWebRoot(). "/data/upload/" . $value['url'];
    		}
    		$this->output->list = $result;
    		$this->output->currpage = $this->input->currpage;
    	}
//         $this->resumeForm($input);
    }

//     public function _delete() {

//         $model = new clsModModel($this->mdb,'yjm_person,mw_file');
//         $ok = true;
//         $this->mdb->subSetAutoCommit(false);//关闭自动提交
//         $this->mdb->subStartTran();

//         if( !$model->yjm_person->delete($this->input)) {
//         	$ok = false;
//         }

//         $input = new stdClass();
//         $input->objectid   = $this->input->id;
//         $input->objecttype = $this->app->getModuleS();

//         if($ok and !$model->mw_file->deleteByObject($input)) {
//         		$ok = false;
//         }

//        	if($ok) {
//        		$this->mdb->subCommit();
//        		$this->output->result  = 'success';
//        	} else {
//        		$this->mdb->subRollBack();
//        		$this->output->result  = 'fail';
//        		$this->output->message = $this->lang->person->faildelete;
//        	}
//     }


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
            $this->input->orderby = in_array($this->input->orderby , array('sort','hot','team','level'))?$this->input->orderby:"sort";
            $this->input->sort    = in_array($this->input->sort , array('asc','desc'))?$this->input->sort:"asc";

            $this->output->orderby  = $this->input->orderby;
            $this->output->sort     = $this->input->sort;
            $this->output->activesorting  = $this->input->sort == "asc"?"desc":"asc";
        }
        $this->output->sorting        = "asc";

    }

//     private function saveSearchCond($input) {
//         $cond = array();
//         if (isset($input->name))   $cond['name'] = $input->name;
//         if (isset($input->roleid)) $cond['roleid'] = $input->roleid;

//         $this->session->subSetValue( __FILE__.'searchCond' , $cond );
//     }

//     private function clearSearchCond() {
//         $this->session->subUnsetValue(__FILE__.'searchCond');
//     }

//     private function resumeForm($input) {
//         if (isset($input->name))
//             $this->output->name = $input->name;

//         if (isset($input->roleid))
//             $this->output->role_choose = $input->roleid;
//     }

//     private function loadSearchCond($input) {
//         $cond = $this->session->fncGetValue(__FILE__.'searchCond');
//         if (isset($cond['name']))       $input->name   = $cond['name'];
//         if (isset($cond['roleid']))     $input->roleid = $cond['roleid'];

//     }

}