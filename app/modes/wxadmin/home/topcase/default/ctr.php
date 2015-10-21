<?php
class clsHomeTopcaseDefaultController extends clsAppController
implements IAction_default , IAction_update , IAction_delete {

    /**
     * 默认初始化页面方法
     */
    public function _default() {
// pr($_SESSION['menu_list']);
     $this->init();
        $input = new stdClass();
        $input->objecttype = "topcase";
        $input->category = $this->input->category;
//         pr($input->category);exit;
        $model = new clsModModel($this->mdb , array('mw_top'));

        $recTotal = $model->mw_top->getCount($input);
        if ($recTotal > 0) {
            $result = $model->mw_top->getList($input);
            foreach ($result as $key => $value) {
                $result[$key]['url'] = $this->app->getWebRoot(). "/data/upload/" . $value['url'];
            }
            $this->output->list = $result;
        }
//         pr($this->output->list);

    }

    public function _update() {
        $model = new clsModModel($this->mdb , array('mw_top'));

        $ok = true;
        $this->mdb->subSetAutoCommit(false);//关闭自动提交
        $this->mdb->subStartTran();
        $input = new stdClass();
        // pr($this->input->sort);
        foreach ($this->input->sort as $id => $sort) {
            $input->sort = $sort;
            $input->id   = $id;
            if(!($model->mw_top->saveSort($input))) {
                $ok = false; break;
            }
        }

        if ($ok) {
            $this->mdb->subCommit();
            $this->output->result  = 'success';
            $this->output->message = $this->lang->topcase->successsort;
        }
        else {
            $this->mdb->subRollBack();
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->topcase->failsort;
        }
        $this->mdb->subSetAutoCommit(true);//打开自动提交
    }

//     public function _paging() {
//         $this->input->objecttype = "topcase";
//         $this->loadCond($this->input);
//         $this->init();
//         $model = new clsModModel($this->mdb , array('mw_top'));
//         $recTotal = $model->mw_top->getCount($this->input);
//         $recperpage = $this->cookie->recperpage != false ? $this->cookie->recperpage : config::$recperpage;
//         if ($recTotal > 0) {
//             $pager = new pager($recTotal , $recperpage , $this->input->currpage);
//             $input = new stdClass();
//             $input->objecttype = "topcase";
//             $input->category   = $this->input->category;
//             $input->start   = $pager->getRecStart();
//             $input->end     = $pager->getRecEnd();
//             $result = $model->mw_top->getList($input);
//             foreach ($result as $key => $value) {
//                 if (!empty($result[$key]['url'])) {
//                     $result[$key]['url'] = $this->app->getWebRoot(). "/data/upload/" . $value['url'];
//                 }
//             }

//             $this->output->list = $result;
//             $this->output->currpage = $this->input->currpage;
//         }
//     }

//     public function _list() {
//         $this->init();
//         $this->input->objecttype = "topcase";
//         $model = new clsModModel($this->mdb , array('mw_top'));
//         $recTotal = $model->mw_top->getCount($this->input);
//         $recperpage = $this->cookie->recperpage != false ? $this->cookie->recperpage : config::$recperpage;
//         if ($recTotal > 0) {
//             $pager = new pager($recTotal , $recperpage , $currPage = 1);
//             $input = new stdClass();
//             $input->objecttype = "topcase";
//             $input->category   = $this->input->category;
//             $input->start   = $pager->getRecStart();
//             $input->end     = $pager->getRecEnd();
//             $result = $model->mw_top->getList($input);
//             foreach ($result as $key => $value) {
//                 if (!empty($result[$key]['url'])) {
//                     $result[$key]['url'] = $this->app->getWebRoot(). "/data/upload/" . $value['url'];
//                 }
//             }

//             $this->output->list = $result;
//             $this->output->currpage = $currPage;
//             $this->saveCond($input);
//         }
//     }

    public function _delete() {

        $this->mdb->subSetAutoCommit(false);//关闭自动提交
        $this->mdb->subStartTran();

        $ok = true;
        $model = new clsModModel($this->mdb,'mw_top');

       if(!$model->mw_top->delete($this->input)) {
            $ok = false;
        }

        $input = new stdClass();
        $input->objectid   = $this->input->id;
        $input->objecttype = $this->app->getModuleS();
        $model = new clsModModel($this->mdb,'mw_topimage');

        if($ok) {
            if (!$model->mw_topimage->deleteByObject($input)) {
                $ok = false;
            }
        }

        if($ok) {
            $this->mdb->subCommit();
            $this->output->result  = 'success';
        } else {
            $this->mdb->subRollBack();
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->topcase->faildelete;
        }

        $this->mdb->subSetAutoCommit(true);//打开自动提交
    }

    private function init() {
        $categories = getCategoryOptions('topcasestyle');
        $this->output->categories = $categories;
        list($key,$value) = each($categories);
        if (isset($this->input->category)) {
            $this->output->activecategory = $categories[$this->input->category];
        } else {
            $this->output->activecategory = $value;
            $this->input->category = $key;
        }

//         pr(array_pop($categories));exit;
    }

//     private function saveCond($input) {
//         $this->session->subSetValue(__FILE__.'category' , $input->category);
//     }

//     private function loadCond($input) {
//         $input->category = $this->session->fncGetValue(__FILE__.'category');
//     }

}