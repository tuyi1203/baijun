<?php
class clsAboutusAlbumDefaultController extends clsAppController
    implements IAction_default {

    const recperpage = 14;//14条数据每页

    /**
     * 默认初始化页面方法
     */
    public function _default() 
    {
        $input = new stdClass();
        $input->subkey = 1;
        $recTotal = $this->model->getCount($input);
        if ($recTotal > 0) {
            $pager = new frontpager($recTotal , self::recperpage , $currPage = 1);
            $input->objecttype = MODULES;
            $input->start = $pager->getRecStart();
            $input->end = $pager->getRecEnd();
            $list = $this->model->getAlbumList($input);
        }

        $this->output->list = $list ;   
        // pr($list);
        $this->output->currpage = $currPage;
        $bannerurl = $this->model->getBanner();
        $this->output->bannerurl = $bannerurl;
    }

    public function _paging()
    {
        $this->input->subkey = 1;
        $recTotal = $this->model->getCount($this->input);
        if ($recTotal > 0) {
            $pager = new frontpager($recTotal , self::recperpage , $this->input->currpage);
            $this->input->objecttype = MODULES;
            $this->input->start = $pager->getRecStart();
            $this->input->end = $pager->getRecEnd();
            $list = $this->model->getAlbumList($this->input);
        }

        $this->output->list = $list ;   
        // pr($list);
        $this->output->currpage = $this->input->currpage;
    }

}