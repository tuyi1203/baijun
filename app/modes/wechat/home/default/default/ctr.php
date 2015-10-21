<?php
class clsHomeDefaultDefaultController extends clsAppController
    implements IAction_default {


    /**
     * 默认初始化页面方法
     */
    public function _default() {
        $this->init();
//         $model = new clsModModel($this->mdb , "mw_article");
//         $input = new stdClass();
//         $input->objecttype = "announce";
//         $recTotal = $model->mw_article->getCount($input);
//         $recperpage = $this->cookie->recperpage != false ? $this->cookie->recperpage : config::$recperpage;

//         if ($recTotal > 0) {
//             $pager = new pager($recTotal , $recperpage , $currPage = 1);
// //             $input  = new stdClass();
//             $input->orderby = $this->input->orderby;
//             $input->sort    = $this->input->sort;
//             $input->start = $pager->getRecStart();
//             $input->end   = $pager->getRecEnd();
//             $result = $model->mw_article->getList($input);
// // pr($result);
//             $this->output->list = $result;
//             $this->output->currpage = $currPage;
//         }
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
        $recperpage = $this->cookie->recperpage != false ? $this->cookie->recperpage : config::$recperpage;
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


    /**
     * 页面初始化
     */
    private function init() {

//         if (!isset($this->input->orderby)) {
//             $this->input->orderby         = "id";
//             $this->input->sort            = "desc";
//             $this->output->orderby        = "id";
//             $this->output->sort           = "desc";
//             $this->output->activesorting  = "asc";
//         } else {
//             $this->input->orderby = in_array($this->input->orderby , array('id','title','createtime','createby','status'))?$this->input->orderby:"id";
//             $this->input->sort    = in_array($this->input->sort , array('asc','desc'))?$this->input->sort:"asc";

//             $this->output->orderby  = $this->input->orderby;
//             $this->output->sort     = $this->input->sort;
//             $this->output->activesorting  = $this->input->sort == "asc"?"desc":"asc";
//         }
//         $this->output->sorting        = "asc";

    	$this->redirect(U('weixin/custommenu/default/default.html'));
//         $this->input->orderby = 'createtime';
//         $this->input->sort    = 'desc';

//         $input = new stdClass();
//         $input->objecttype = 'announce';
//         $input->status = '1';
//         $model = new clsModModel($this->mdb, 'mw_article');
//         $announce = $model->mw_article->getByStatus($input);

//         $this->output->nofilter->sticktitle       = $announce['title'];
//         $this->output->nofilter->stickcontent     = $announce['content'];
//         $this->output->nofilter->stickfooter      = $announce['createname'] . $this->lang->announce->published. $announce['createtime'];
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