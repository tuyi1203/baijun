<?php
class clsKnowledgeQuestionDefaultController extends clsAppController
implements IAction_default , IAction_list , IAction_delete , IAction_paging , IAction_publish {

    /**
     * 默认初始化页面方法
     */
    public function _default() {
// pr($_SESSION['menu_list']);
        $this->init();
//         $this->input->objecttype = "question";
        $model = new clsModModel($this->mdb , array('mw_question'));
        $recTotal = $model->mw_question->getCount($this->input);
        $recperpage = $this->cookie->recperpage != false ? $this->cookie->recperpage : C('recperpage');

        if ($recTotal > 0) {
            $pager = new pager($recTotal , $recperpage , $currPage = 1);
            $input = new stdClass();
            $input->orderby    = "createtime";
            $input->sort       = 'desc';
            $input->category   = $this->input->category;
            $input->start = $pager->getRecStart();
            $input->end   = $pager->getRecEnd();
            $result = $model->mw_question->getList($input);
            $this->output->currpage = $currPage;
            $this->output->list = $result;
            $input->currpage = $currPage ;
            $this->saveCond($this->input);
        }
//         pr($this->output->list);

    }

    public function _paging() {
//         $this->input->objecttype = "question";
        $input = new stdClass();
        $this->loadCond($input);
        $this->init();
        $model = new clsModModel($this->mdb , array('mw_question'));
        $recTotal = $model->mw_question->getCount($input);
        $recperpage = $this->cookie->recperpage != false ? $this->cookie->recperpage : C('recperpage');
        if ($recTotal > 0) {
            $pager = new pager($recTotal , $recperpage , $this->input->currpage);
            $input->orderby    = "createtime";
            $input->sort       = 'desc';
            $input->category   = $input->category;
            $input->start   = $pager->getRecStart();
            $input->end     = $pager->getRecEnd();
            $result = $model->mw_question->getList($input);

            $this->output->list = $result;
            $this->output->currpage = $this->input->currpage;
            $input->currpage = $this->input->currpage ;
            $this->saveCond($input);
        }
    }

    public function _list() {
        $this->init();
//         $this->input->objecttype = "question";
        $model = new clsModModel($this->mdb , array('mw_question'));
        $recTotal = $model->mw_question->getCount($this->input);
        $recperpage = $this->cookie->recperpage != false ? $this->cookie->recperpage : C('recperpage');
        if ($recTotal > 0) {
            $pager = new pager($recTotal , $recperpage , $currPage = 1);
            $input = new stdClass();
//             $input->objecttype = "question";
            $input->orderby    = "createtime";
            $input->sort       = 'desc';
            $input->category   = $this->input->category;
            $input->start   = $pager->getRecStart();
            $input->end     = $pager->getRecEnd();
            $result = $model->mw_question->getList($input);
            $this->output->list = $result;
            $this->output->currpage = $currPage;
            $input->currpage = $currPage ;
            $this->saveCond($input);
        }
    }

    public function _back()
    {
        $this->loadCond($this->input);
        $this->init();
        $model = new clsModModel($this->mdb , array('mw_question'));
        $recTotal = $model->mw_question->getCount($this->input);
        $recperpage = $this->cookie->recperpage != false ? $this->cookie->recperpage : C('recperpage');
        if ($recTotal > 0) {
            $pager = new pager($recTotal , $recperpage , $this->input->currpage);
            $input = new stdClass();
            $input->orderby    = "createtime";
            $input->sort       = 'desc';
            $input->category   = $this->input->category;
            $input->start   = $pager->getRecStart();
            $input->end     = $pager->getRecEnd();
            $result = $model->mw_question->getList($input);

            $this->output->list = $result;
            $this->output->currpage = $this->input->currpage;
        }
    }

    public function _delete() {

        $this->mdb->subSetAutoCommit(false);//关闭自动提交
        $this->mdb->subStartTran();

        $ok = true;
        $model = new clsModModel($this->mdb,'mw_question');

       if(!$model->mw_question->delete($this->input)) {
            $ok = false;
        }

        $input = new stdClass();
        $input->objectid   = $this->input->id;
        $input->objecttype = MODULES;
        $model = new clsModModel($this->mdb,'mw_file');

        if($ok) {
            if (!$model->mw_file->deleteByObject($input)) {
                $ok = false;
            }
        }

        if($ok) {
            $this->mdb->subCommit();
            $this->output->result  = 'success';
        } else {
            $this->mdb->subRollBack();
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->question->faildelete;
        }

        $this->mdb->subSetAutoCommit(true);//打开自动提交
    }

    public function _publish() {

        if(!$this->publish()) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->question->failpublish;
            return;
        }
        $this->output->result  = 'success';
    }

    public function publish() {
        $model = new clsModModel($this->mdb,'mw_question');
        if(!$model->mw_question->publish($this->input)) {
            return false;
        }
        return true;
    }

    private function init() {
        $categories = getCategoryOptions('question');
        $this->output->categories = $categories;
        list($key,$value) = each($categories);
        if (isset($this->input->category)) {
            $this->output->activecategory = $categories[$this->input->category];
        } else {
            $this->output->activecategory = $value;
            $this->input->category = $key;
        }
        if (isset($_SESSION['action_auth_list']['admin']['knowledge/question/default/publish']) and
                $_SESSION['action_auth_list']['admin']['knowledge/question/default/publish']['operauth'] == '1') {
            $this->output->publishauth = '1';
        }
        //         pr(array_pop($categories));exit;
    }

    private function saveCond($input)
    {
        session(__FILE__.'category' , $input->category);
        if (isset($input->currpage)) {
            session(__FILE__.'currpage' , $input->currpage);
        }
    }

    private function loadCond($input)
    {
        $input->category = session(__FILE__.'category');
        if (session(__FILE__.'currpage')) {
            $input->currpage = session(__FILE__.'currpage');
        }
    }

}