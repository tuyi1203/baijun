<?php
class clsNewsOfficenewsDefaultController extends clsAppController
    implements IAction_default {

    const recperpage = 15;//15条数据每页

    /**
     * 默认初始化页面方法
     */
    public function _default() 
    {
        $input = new stdClass();
        $input->objecttype = MODULES;
        $input->public     = "1";
        $recTotal = $this->model->getCount($input);
        if ($recTotal > 0) {
            $pager = new frontpager($recTotal , self::recperpage , $currPage = 1);
            $input->objecttype = MODULES;
            $input->start = $pager->getRecStart();
            $input->end = $pager->getRecEnd();
            $list = $this->model->getOfficenewsList($input);
        }
        $this->output->list = $list ;
        $this->output->currpage = $currPage;
        $bannerurl = $this->model->getBanner();
        $this->output->bannerurl = $bannerurl;
    }

    /**
     * 搜索方法
     */
    public function _list()
    {
        $input = new stdClass();
        $input->objecttype = MODULES;
        $input->public     = "1";
        if (isset($this->input->lawyer)) {
            $input->lawyer     = $this->input->lawyer;
        }
        $recTotal = $this->model->getCount($input);
        if ($recTotal > 0) {
            $pager = new frontpager($recTotal , self::recperpage , $currPage = 1);
            $pager->setParams(array('lawyer'=>$input->lawyer));
            $input->objecttype = MODULES;
            $input->start = $pager->getRecStart();
            $input->end = $pager->getRecEnd();
            $list = $this->model->getOfficenewsList($input);
        } else {
            return;
        }
        $this->output->list = $list ;
        $this->output->currpage = $currPage;
    }

    public function _paging()
    {
        $this->input->objecttype = MODULES;
        $this->input->public = "1";
        $recTotal = $this->model->getCount($this->input);
        if ($recTotal > 0) {
            $pager = new frontpager($recTotal , self::recperpage , $this->input->currpage);
            if (isset($this->input->lawyer)) {
                $pager->setParams(array('lawyer'=>$this->input->lawyer));
            }
            $this->input->objecttype = MODULES;
            $this->input->start = $pager->getRecStart();
            $this->input->end = $pager->getRecEnd();
            $list = $this->model->getOfficenewsList($this->input);
        }

        $this->output->list = $list ;   
        $this->output->currpage = $this->input->currpage;
    }

}