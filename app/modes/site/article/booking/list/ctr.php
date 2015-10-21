<?php
class clsArticleBookingListController extends clsAppController implements IAction_default {

    /**
     * 默认初始化页面方法
     */
    public function _default() {

        $this->init();
        $model = new clsModModel($this->mdb , "yjm_booking");
        $input = new stdClass();
        $input->public  = '1';
        $recTotal = $model->yjm_booking->getCount($input);
//         $recperpage = $this->cookie->recperpage != false ? $this->cookie->recperpage : config::$recperpage;
//         $recperpage = config::$recperpage;
        $recperpage = 5 ;

        if ($recTotal > 0) {
            $pager = new frontpager($recTotal , $recperpage , $currPage = 1);
            //             $input  = new stdClass();
            $input->orderby = 'createtime';
            $input->sort    = 'desc';
            $input->start = $pager->getRecStart();
            $input->end   = $pager->getRecEnd();
            $result = $model->yjm_booking->getList($input);

            foreach ($result as $key => $value) {
//                 $result[$key]['createtime'] = substr($value['createtime'], 0 , 10);
                $result[$key]['name'] = htmlspecialchars($value['name']);
                $result[$key]['content'] = htmlspecialchars($value['content']);
                $result[$key]['content2'] = htmlspecialchars($value['content2']);
            }
//             $this->output->count = $recTotal;
            $this->output->nofilter->list = $result;
            $this->output->currpage = $currPage;
        }

    }

    public function _paging() {
        //         echo "hello";
        $this->init();
        $input = new stdClass();
        $input->objecttype = "booking";
        $input->public  = '1';
        $model = new clsModModel($this->mdb , "yjm_booking");
        $recTotal = $model->yjm_booking->getCount($input);
        //         var_dump($this->cookie->lang);
//         $recperpage = $this->cookie->recperpage != false ? $this->cookie->recperpage : config::$recperpage;
//         $recperpage = config::$recperpage;
        $recperpage = 5 ;
//         $recperpage = 1;
        if ($recTotal > 0) {
            $pager  = new frontpager($recTotal , $recperpage , $this->input->currpage);

            $input->orderby = 'createtime';
            $input->sort    = 'desc';
            $input->start   = $pager->getRecStart();
            $input->end     = $pager->getRecEnd();
            $result = $model->yjm_booking->getList($input);
            foreach ($result as $key => $value) {
               $result[$key]['name'] = htmlspecialchars($value['name']);
               $result[$key]['content'] = htmlspecialchars($value['content']);
               $result[$key]['content2'] = htmlspecialchars($value['content2']);
            }
            $this->output->nofilter->list = $result;
            $this->output->currpage = $this->input->currpage;
        }
    }


    /**
     * 页面初始化
     */
    private function init() {
//         $model = new clsModModel($this->mdb , 'yjm_booking');
//         $output = $model->yjm_booking->get($this->input);
//         foreach ($output as $k => $v) {
//             if ($k == "content") {
//                 $this->output->nofilter->$k = $v;
//             }
//             $this->output->$k = $v;
//         }

//         $input = new stdClass();
//         $input->id         = $this->input->id;
//         $input->objecttype = 'booking';
//         //取得上一篇数据
//         $prev = $model->yjm_booking->getPrev($input);
//         if (!empty($prev)) {
//             $this->output->prevtitle  = $prev['title'];
//             $this->output->previd     = $prev['id'];
//         }

//         //取得下一篇数据
//         $next = $model->yjm_booking->getNext($input);
//         if (!empty($next)) {
//             $this->output->nexttitle = $next['title'];
//             $this->output->nextid    = $next['id'];
//         }

        getTeamList();
        getClassiCase();

    }

}