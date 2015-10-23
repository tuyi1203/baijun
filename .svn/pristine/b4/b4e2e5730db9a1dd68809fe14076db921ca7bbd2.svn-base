<?php
class clsArticleJointListController extends clsAppController implements IAction_default {

    /**
     * 默认初始化页面方法
     */
    public function _default() {

        $this->init();
        $model = new clsModModel($this->mdb , "mw_friendlink");
        $input = new stdClass();
        $input->objecttype = 'friendlink';
        $input->category  = 19;
        $recTotal = $model->mw_friendlink->getCount($input);
//         $recperpage = $this->cookie->recperpage != false ? $this->cookie->recperpage : config::$recperpage;
//         $recperpage = config::$recperpage;
        $recperpage = 9 ;

        if ($recTotal > 0) {
            $pager = new frontpager($recTotal , $recperpage , $currPage = 1);
            //             $input  = new stdClass();
            $input->start = $pager->getRecStart();
            $input->end   = $pager->getRecEnd();
            $result = $model->mw_friendlink->getList($input);

	        foreach ($result as $key => $value) {
	            if (!empty($result[$key]['url'])) {
	                $result[$key]['url'] = $this->app->getWebRoot(). "/data/upload/" . $value['url'];
	            }
	        }
//             $this->output->count = $recTotal;
            $this->output->list = $result;
            $this->output->currpage = $currPage;
        }

    }

    public function _paging() {

    	$this->init();
		$model = new clsModModel($this->mdb , "mw_friendlink");
        $input = new stdClass();
        $input->objecttype = 'friendlink';
        $input->category  = 19;
        $recTotal = $model->mw_friendlink->getCount($input);
//         $recperpage = $this->cookie->recperpage != false ? $this->cookie->recperpage : config::$recperpage;
//         $recperpage = config::$recperpage;
        $recperpage = 9 ;
        if ($recTotal > 0) {
             $pager = new frontpager($recTotal , $recperpage , $this->input->currpage);
            //             $input  = new stdClass();
            $input->start = $pager->getRecStart();
            $input->end   = $pager->getRecEnd();
            $result = $model->mw_friendlink->getList($input);

	        foreach ($result as $key => $value) {
	            if (!empty($result[$key]['url'])) {
	                $result[$key]['url'] = $this->app->getWebRoot(). "/data/upload/" . $value['url'];
	            }
	        }
//             $this->output->count = $recTotal;
            $this->output->list = $result;
            $this->output->currpage = $this->input->currpage;
        }
    }


    /**
     * 页面初始化
     */
    private function init() {
//         $model = new clsModModel($this->mdb , 'mw_friendlink');
//         $output = $model->mw_friendlink->get($this->input);
//         foreach ($output as $k => $v) {
//             if ($k == "content") {
//                 $this->output->nofilter->$k = $v;
//             }
//             $this->output->$k = $v;
//         }

//         $input = new stdClass();
//         $input->id         = $this->input->id;
//         $input->objecttype = 'joint';
//         //取得上一篇数据
//         $prev = $model->mw_friendlink->getPrev($input);
//         if (!empty($prev)) {
//             $this->output->prevtitle  = $prev['title'];
//             $this->output->previd     = $prev['id'];
//         }

//         //取得下一篇数据
//         $next = $model->mw_friendlink->getNext($input);
//         if (!empty($next)) {
//             $this->output->nexttitle = $next['title'];
//             $this->output->nextid    = $next['id'];
//         }

        getTeamList();
        getClassiCase();
        getTopNews();

    }

}