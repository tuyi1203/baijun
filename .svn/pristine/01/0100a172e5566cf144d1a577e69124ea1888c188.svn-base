<?php
class clsArticleSignDefaultController extends clsAppController
    implements IAction_default , IAction_delete , IAction_paging , IAction_sort , IAction_publish{


    /**
     * 默认初始化页面方法
     */
    public function _default() {
// pr($_SESSION);
        $this->init();
        $model = new clsModModel($this->mdb , "mw_article");
        $input = new stdClass();
        $input->objecttype = "sign";
        $recTotal = $model->mw_article->getCount($input);
        $recperpage = $this->cookie->recperpage != false ? $this->cookie->recperpage : config::$recperpage;

        if ($recTotal > 0) {
            $pager = new pager($recTotal , $recperpage , $currPage = 1);
//             $input  = new stdClass();
            $input->orderby = $this->input->orderby;
            $input->sort    = $this->input->sort;
            $input->start = $pager->getRecStart();
            $input->end   = $pager->getRecEnd();
            $result = $model->mw_article->getList($input);

            $this->output->list = $result;
            $this->output->currpage = $currPage;
        }
    }

    public function _paging() {
//         echo "hello";
        $this->init();
        $input = new stdClass();
        $input->objecttype = "sign";

        $model = new clsModModel($this->mdb , "mw_article");
        $recTotal = $model->mw_article->getCount($input);
//         var_dump($this->cookie->lang);
        $recperpage = $this->cookie->recperpage != false ? $this->cookie->recperpage : config::$recperpage;
        if ($recTotal > 0) {
            $pager  = new pager($recTotal , $recperpage , $this->input->currpage);

            $input->orderby = $this->input->orderby;
            $input->sort    = $this->input->sort;
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
        $input->objecttype = "sign";

        $model = new clsModModel($this->mdb , "mw_article");
        $recTotal = $model->mw_article->getCount($input);

        $recperpage = $this->cookie->recperpage != false ? $this->cookie->recperpage : config::$recperpage;
        if ($recTotal > 0) {
            $pager  = new pager($recTotal , $recperpage , $this->input->currpage);

            $input->orderby = $this->input->orderby;
            $input->sort    = $this->input->sort;
            $input->start = $pager->getRecStart();
            $input->end   = $pager->getRecEnd();


            $result = $model->mw_article->getList($input);
            $this->output->list = $result;
            $this->output->currpage = $this->input->currpage;
        }
    }

    public function _delete() {

        $model = new clsModModel($this->mdb,'mw_article');
        if(!$model->mw_article->delete($this->input)) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->sign->faildelete;
            return;
        }
        $this->output->result  = 'success';
    }


    public function _publish() {

        if(!$this->publish()) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->sign->failpublish;
            return;
        }
        $this->output->result  = 'success';
    }

    public function publish() {
        $model = new clsModModel($this->mdb,'mw_article');
        if(!$model->mw_article->publish($this->input)) {
            return false;
        }
        return true;
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
            $this->input->orderby = in_array($this->input->orderby , array('id','title','createtime','views','public','createby','status'))?$this->input->orderby:"id";
            $this->input->sort    = in_array($this->input->sort , array('asc','desc'))?$this->input->sort:"asc";

            $this->output->orderby  = $this->input->orderby;
            $this->output->sort     = $this->input->sort;
            $this->output->activesorting  = $this->input->sort == "asc"?"desc":"asc";
        }
        $this->output->sorting        = "asc";
    }

}