<?php
class clsWebsiteAnnounceDefaultController extends clsAppController
    implements IAction_default , IAction_delete , IAction_paging , IAction_sort {


    /**
     * 默认初始化页面方法
     */
    public function _default() {
// pr($_SESSION);
        $this->init();
        $model = new clsModModel($this->mdb , "mw_article");
        $input = new stdClass();
        $input->objecttype = "announce";
        $recTotal = $model->mw_article->getCount($input);
        $recperpage = $this->cookie->recperpage != false ? $this->cookie->recperpage : C('recperpage');

        if ($recTotal > 0) {
            $pager = new pager($recTotal , $recperpage , $currPage = 1);
//             $input  = new stdClass();
            $input->orderby = $this->input->orderby;
            $input->sort    = $this->input->sort;
            $input->start = $pager->getRecStart();
            $input->end   = $pager->getRecEnd();
            $result = $model->mw_article->getList($input);
// pr($result);
            $this->output->list = $result;
            $this->output->currpage = $currPage;
        }
//         pr($_SESSION);
    }

    public function _paging() {
//         echo "hello";
        $this->init();
        $input = new stdClass();
        $input->objecttype = "announce";

        $model = new clsModModel($this->mdb , "mw_article");
        $recTotal = $model->mw_article->getCount($input);
//         var_dump($this->cookie->lang);
        $recperpage = $this->cookie->recperpage != false ? $this->cookie->recperpage : C('recperpage');
        if ($recTotal > 0) {
            $pager  = new pager($recTotal , $recperpage , $this->input->currpage , $this->input->orderby , $this->input->sort);

            $input->orderby = $this->input->orderby;
            $input->sort    = $this->input->sort;
//             $this->loadSort($input);
            $input->start   = $pager->getRecStart();
            $input->end     = $pager->getRecEnd();
            $result = $model->mw_article->getList($input);

            $this->output->list = $result;
            $this->output->currpage = $this->input->currpage;
        }
    }


    public function _sort() {
        $this->init();

        $input = new stdClass();
        $input->objecttype = "announce";

        $model = new clsModModel($this->mdb , "mw_article");
        $recTotal = $model->mw_article->getCount($input);

        $recperpage = $this->cookie->recperpage != false ? $this->cookie->recperpage : C('recperpage');
        if ($recTotal > 0) {
            $pager  = new pager($recTotal , $recperpage , $this->input->currpage , $this->input->orderby , $this->input->sort);

            $input->orderby = $this->input->orderby;
            $input->sort    = $this->input->sort;
            $input->start = $pager->getRecStart();
            $input->end   = $pager->getRecEnd();

            $result = $model->mw_article->getList($input);
            $this->output->list = $result;
            $this->output->currpage = $this->input->currpage;
        }
//         $this->saveSort($input);
    }

    public function _delete() {

        $model = new clsModModel($this->mdb,'mw_article');
        if(!$model->mw_article->delete($this->input)) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->announce->faildelete;
            return;
        }
        $this->output->result  = 'success';
    }


    public function _stick() {

        if(!$this->stick()) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->announce->failstick;
            return;
        }
        $this->output->result  = 'success';
    }

    public function stick() {
        $model = new clsModModel($this->mdb,'mw_article');
        $input = new stdClass();
        $input->objecttype = MODULES;
        $input->status = '0';
        $input->id = $this->input->id;
        $ok = true;
        $this->mdb->subSetAutoCommit(false);//关闭自动提交
        $this->mdb->subStartTran();

        if(!$model->mw_article->clearStatus($input)) {
            $ok = false;
        }

        $input = new stdClass();
        $input->status = '1';
        $input->id = $this->input->id;
        if ($ok and !$model->mw_article->update($input)) {
            $ok = false;;
        }

        if($ok) {
            $this->mdb->subCommit();
        } else {
            $this->mdb->subRollBack();
        }

        return $ok;
    }

    /**
     * 页面初始化
     */
    private function init() {

        if (!isset($this->input->orderby)) {
            $this->input->orderby         = "id";
            $this->input->sort            = "desc";
            $this->output->orderby        = "id";
            $this->output->sort           = "desc";
            $this->output->activesorting  = "asc";
        } else {
            $this->input->orderby = in_array($this->input->orderby , array('id','title','createtime','createby','status'))?$this->input->orderby:"id";
            $this->input->sort    = in_array($this->input->sort , array('asc','desc'))?$this->input->sort:"asc";

            $this->output->orderby  = $this->input->orderby;
            $this->output->sort     = $this->input->sort;
            $this->output->activesorting  = $this->input->sort == "asc"?"desc":"asc";
        }
        $this->output->sorting        = "asc";
    }

//     private function saveSort($input) {
//         $this->session->subSetValue(__FILE__.'sort' , array('sort'=>$input->sort , 'orderby' => $input->orderby));
//     }

//     private function loadSort($input) {
//         $cond = $this->session->fncGetValue(__FILE__.'sort');
//         $input->orderby = $cond['orderby'];
//         $input->sort    = $cond['sort'];
//     }

}