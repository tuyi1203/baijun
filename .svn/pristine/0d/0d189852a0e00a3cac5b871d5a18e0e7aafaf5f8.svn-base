<?php
class clsArticlenewsDetailController extends clsAppController implements IAction_default {

    /**
     * 默认初始化页面方法
     */
    public function _default() {

        $this->init();

    }


    /**
     * 页面初始化
     */
    private function init() {
        $model = new clsModModel($this->mdb , 'mw_article');
        $output = $model->mw_article->get($this->input);
        foreach ($output as $k => $v) {
            if ($k == "content") {
                $this->output->nofilter->$k = $v;
            }
            $this->output->$k = $v;
        }

        $input = new stdClass();
        $input->id         = $this->input->id;
        $input->objecttype = 'news';
        $input->public = '1';
        //取得上一篇数据
        $prev = $model->mw_article->getPrev($input);
        if (!empty($prev)) {
            $this->output->prevtitle  = $prev['title'];
            $this->output->previd     = $prev['id'];
        }

        //取得下一篇数据
        $next = $model->mw_article->getNext($input);
        if (!empty($next)) {
            $this->output->nexttitle = $next['title'];
            $this->output->nextid    = $next['id'];
        }

        //阅读次数加1
        $model->mw_article->viewplus($input);

        getTeamList();
        getClassiCase();

    }

}