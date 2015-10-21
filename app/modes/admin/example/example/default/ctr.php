<?php
class clsExampleExampleDefaultController extends clsAppController
    implements IAction_default , IAction_delete , IAction_paging , IAction_sort{


    /**
     * 默认初始化页面方法
     */
    public function _default() {
// pr($_SESSION);
        $this->init();
        $model = new clsModModel($this->mdb , "yjm_example");
        $recTotal = $model->yjm_example->getCount($this->input);
        $recperpage = $this->cookie->recperpage != false ? $this->cookie->recperpage : config::$recperpage;

        if ($recTotal > 0) {
            $pager = new pager($recTotal , $recperpage , $currPage = 1);

            $input  = new stdClass();
            $input->orderby       = $this->input->orderby;
            $input->sort          = $this->input->sort;
            $input->start         = $pager->getRecStart();
            $input->end           = $pager->getRecEnd();
            $input->objecttype    = $this->app->getModuleF();
            $result = $model->yjm_example->getList($input);

            $this->output->list = $result;
            $this->output->currpage = $currPage;
        }

    }

    public function _paging() {
//         echo "hello";
        $this->init();
        $model = new clsModModel($this->mdb , "yjm_example");
        $recTotal = $model->yjm_example->getCount($this->input);
//         var_dump($this->cookie->lang);
        $recperpage = $this->cookie->recperpage != false ? $this->cookie->recperpage : config::$recperpage;
        if ($recTotal > 0) {
            $pager  = new pager($recTotal , $recperpage , $this->input->currpage);
            $input  = new stdClass();
            $input->orderby = $this->input->orderby;
            $input->sort    = $this->input->sort;
            $input->start   = $pager->getRecStart();
            $input->end     = $pager->getRecEnd();
            $input->objecttype    = $this->app->getModuleF();
            $result = $model->yjm_example->getList($input);

            $this->output->list = $result;
            $this->output->currpage = $this->input->currpage;
        }
    }


    public function _sort() {
        $this->init();
        $model = new clsModModel($this->mdb , "yjm_example");
        $recTotal = $model->yjm_example->getCount($this->input);

        $recperpage = $this->cookie->recperpage != false ? $this->cookie->recperpage : config::$recperpage;
        if ($recTotal > 0) {
            $pager  = new pager($recTotal , $recperpage , $this->input->currpage);
            $input  = new stdClass();
            $input->orderby       = $this->input->orderby;
            $input->sort          = $this->input->sort;
            $input->start         = $pager->getRecStart();
            $input->end           = $pager->getRecEnd();
            $input->objecttype    = $this->app->getModuleF();

            $result = $model->yjm_example->getList($input);
            $this->output->list = $result;
            $this->output->currpage = $this->input->currpage;
        }
    }

    public function _delete() {

        $this->mdb->subSetAutoCommit(false);//关闭自动提交
        $this->mdb->subStartTran();

        $ok = true;
        $model = new clsModModel($this->mdb,'yjm_example');

        if(!$model->yjm_example->delete($this->input)) {
            $ok = false;
        }

        $input = new stdClass();
        $input->objectid   = $this->input->id;
        $input->objecttype = $this->app->getModuleF();
        $model = new clsModModel($this->mdb,'mw_relation');

        if($ok) {
            if (!$model->mw_relation->delete($input)) {
                $ok = false;
            }
        }

        if($ok) {
            $this->mdb->subCommit();
            $this->output->result  = 'success';
        } else {
            $this->mdb->subRollBack();
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->example->faildelete;
        }

        $this->mdb->subSetAutoCommit(true);//打开自动提交
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
            $this->input->orderby = in_array($this->input->orderby , array('id','title','category','createtime','views'))?$this->input->orderby:"id";
            $this->input->sort    = in_array($this->input->sort , array('asc','desc'))?$this->input->sort:"asc";

            $this->output->orderby  = $this->input->orderby;
            $this->output->sort     = $this->input->sort;
            $this->output->activesorting  = $this->input->sort == "asc"?"desc":"asc";
        }
        $this->output->sorting        = "asc";

    }

}