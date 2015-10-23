<?php
class clsArticleJoinListController extends clsAppController implements IAction_default {

    /**
     * 默认初始化页面方法
     */
    public function _default() {

        $this->init();
        $model = new clsModModel($this->mdb , "mw_article");
        $input = new stdClass();
        $input->objecttype = "join";
        $input->public  = '1';
        $recTotal = $model->mw_article->getCount($input);
//         $recperpage = $this->cookie->recperpage != false ? $this->cookie->recperpage : config::$recperpage;
//         $recperpage = config::$recperpage;

        if ($recTotal > 0) {
//             $pager = new frontpager($recTotal , $recperpage , $currPage = 1);
            //             $input  = new stdClass();
            $input->orderby = 'createtime';
            $input->sort    = 'desc';
//             $input->start = $pager->getRecStart();
            $input->start = 1;
//             $input->end   = $pager->getRecEnd();
			$input->end   = $recTotal;
            $result = $model->mw_article->getList($input);

//             foreach ($result as $key => $value) {
//                 $result[$key]['createtime'] = substr($value['createtime'], 0 , 10);
//             }
//             $this->output->count = $recTotal;
            $this->output->nofilter->list = $result;
//             $this->output->currpage = $currPage;
        }
    }


    /**
     * 页面初始化
     */
    private function init() {
//         $model = new clsModModel($this->mdb , 'mw_article');
//         $output = $model->mw_article->get($this->input);
//         foreach ($output as $k => $v) {
//             if ($k == "content") {
//                 $this->output->nofilter->$k = $v;
//             }
//             $this->output->$k = $v;
//         }

//         $input = new stdClass();
//         $input->id         = $this->input->id;
//         $input->objecttype = 'join';
//         //取得上一篇数据
//         $prev = $model->mw_article->getPrev($input);
//         if (!empty($prev)) {
//             $this->output->prevtitle  = $prev['title'];
//             $this->output->previd     = $prev['id'];
//         }

//         //取得下一篇数据
//         $next = $model->mw_article->getNext($input);
//         if (!empty($next)) {
//             $this->output->nexttitle = $next['title'];
//             $this->output->nextid    = $next['id'];
//         }

        getTeamList();
        getClassiCase();

    }

}