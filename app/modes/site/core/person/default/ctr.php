<?php
class clsCorePersonDefaultController extends clsAppController
    implements IAction_default {

    const recperpage = 15;//15条数据每页

    public function __construct()
    {
        parent::__construct();
        if (isset($this->input->searchunset))
        {
            $sess = unserialize($this->session->fncGetValue(__FILE__));
            if (isset($sess[$this->input->searchunset]))
            {
                unset($sess[$this->input->searchunset]);
            }
            $this->session->subSetValue(__FILE__ , $sess);
        }
    }


    /**
     * 默认初始化页面方法
     */
    public function _default()
    {

        //搜索所有律师
        $this->init();
        $this->session->subUnsetValue(__FILE__);
        $input = new stdClass();
        $input->del = '0';
        $recTotal = $this->model->getCount($input);
        if ($recTotal > 0) 
        {
            if ($this->isMobile())
            {
                $pager = new verticalpager($recTotal , self::recperpage , $currPage = 1);
            }
            else
            {
                $pager = new frontpager($recTotal , self::recperpage , $currPage = 1);
            }
            // $pager = new frontpager($recTotal , self::recperpage , $currPage = 1);
            $input->start = $pager->getRecStart();
            $input->end   = $pager->getRecEnd();
            $input->order = "-sort desc , zhiwei , first_name_alpha asc";
            $input->sort  = "";
            $list = $this->getLawyers($input);
            $this->session->subSetValue(__FILE__ , $input);
        }
        $this->output->all = $recTotal;
        $this->output->lawyers = $list ;
        $this->output->currpage = $currPage;
        $this->output->searchtype = "按姓氏拼音首字母搜索";
        if ($this->isMobile())
        {
            $this->saveCurrpage($currPage);
            $this->output->searchcond = null;
        }


//        $input = new stdClass();
//        $input->id = $this->input->id;
//        $detail = $this->model->getDetail($input);
//        if (!is_null($detail->pid)) {
//            $input->id = $detail->pid;
//            $parentdetail = $this->model->getDetail($input);
//        }
//        $subfield = $this->model->getSubfield($this->input);
//        $lawyers = $this->getLawyers($this->input->id);
//        $news = $this->getOfficenewsList();
//        $performance = $this->getPerformance();
//        if (!empty($detail->lawyer)) {
//            $lawyers = $this->model->getLawyers($detail->lawyer);
//            $jigous  = $this->model->getJigou();
//            $positions = $this->model->getPositions();
//            $lawyerpic = $this->model->getLawyerpic($detail->lawyer);
//            foreach ($lawyers as $key => $value) {
//                $lawyers[$key]->jigouname = $jigous[$value->jigou];
//                $lawyers[$key]->positionname = $positions[$value->zhiwei];
//                $lawyers[$key]->url = $lawyerpic[$value->id];
//                //取得专业
//                $zhuanye[] = $value->zhuanye;
//            }
//            $labels    = $this->model->getLabels($zhuanye);
//            $this->output->labels = $labels;
//            $this->output->lawyers = $lawyers;
//        }
//
//
//        $input = new stdClass();
//        $input->publishtime = $detail->publishtime;
//        $input->objecttype = MODULES;
//        $input->id = $this->input->id;
//        $this->output->predata = $this->model->getPredata($input);
//        $this->output->nextdata = $this->model->getNextdata($input);
//
//        $this->output->detail = $detail;
//        if (isset($parentdetail)) $this->output->parentdetail = $parentdetail;
//        $this->output->subfield = $subfield;
//        $this->output->lawyers = $lawyers;
//        $this->output->news = $news;
//        $this->output->performance = $performance;
//        pr($performance);
//        $this->output->nofilter->content = $detail->content;
    }

    public function _searchByDic()
    {
        //按地区搜索
        $this->session->subUnsetValue(__FILE__);
        $this->init();
        $input = new stdClass();
        $input->del = '0';
        $input->jigou = $this->input->dic;
        $recTotal = $this->model->getCount($input);
        if ($recTotal > 0) {
            $pager = new frontpager($recTotal , self::recperpage , $currPage = 1);
            $input->start = $pager->getRecStart();
            $input->end   = $pager->getRecEnd();
            $input->order = "yuanshi desc , suozhuren desc , zhiwei , first_name_alpha asc";
            $input->sort  = "";
            $list = $this->getLawyers($input);
            $this->output->lawyers = $list ;
            $this->output->currpage = $currPage;
            $this->session->subSetValue(__FILE__ , $input);
        }
        $this->output->searchtype = "按办公机构搜索,";
//        $this->output->sess = $input;
        $this->output->dic = $this->input->dic;
        $this->output->all = $recTotal;
    }

    public function _search()
    {
        $this->init();
        $input = new stdClass();
        //搜索所有律师
        if ($this->isMobile() && isset($this->input->searchunset))
        {
            $input = unserialize($this->session->fncGetValue(__FILE__));
            if (empty($input))
            {
                return $this->_default();
            }
        }
        else
        {
            $this->session->subUnsetValue(__FILE__);
            $input->del = '0';
            if (isset($this->input->alpha)) 
            {
                $input->first_name_alpha = strtolower($this->input->alpha);
                $this->output->searchcond[] = ['type' => sprintf("按姓氏拼音首字母%s搜索",$this->input->alpha),'unset' => 'first_name_alpha'];
                $this->output->searchtype = "按姓氏拼音首字母搜索";
                $this->output->alpha = $this->input->alpha;
            }
            if (!empty($this->input->jigou)) {
                $input->jigou = $this->input->jigou;
                $this->output->searchtype = "按指定条件搜索";
            }
    //        if (!empty($this->input->name)) {
    //            $input->name = $this->input->name;
    //        }
            if (!empty($this->input->keyword)) {
                $input->keyword = $this->input->keyword;
                $this->output->searchtype = "按指定条件搜索";
            }
            if (!empty($this->input->zhiwei)) {
                $input->zhiwei = $this->input->zhiwei;
                $this->output->searchtype = "按指定条件搜索";
            }
            if (!empty($this->input->zhuanye)) {
                $input->zhuanye = $this->input->zhuanye;
                $this->output->searchtype = "按指定条件搜索";
            }
        }

        $recTotal = $this->model->getCount($input);
        $currPage = 1;
        if ($recTotal > 0) 
        {
            // $pager = new frontpager($recTotal , self::recperpage , $currPage = 1);
            if ($this->isMobile())
            {
                $pager = new verticalpager($recTotal , self::recperpage , $currPage = 1);
            }
            else
            {
                $pager = new frontpager($recTotal , self::recperpage , $currPage = 1);
            }
            $input->start = $pager->getRecStart();
            $input->end   = $pager->getRecEnd();
            $input->order = "-sort desc , zhiwei , first_name_alpha asc";
            $input->sort  = "";
            $list = $this->getLawyers($input);
            $this->output->lawyers = $list ;
            $this->output->currpage = $currPage;
            $this->session->subSetValue(__FILE__ , $input);
        }
        $this->output->sess = $input;
        $this->output->all = $recTotal;
       
        if ($this->isMobile())
        {
            $this->saveCurrpage($currPage);
            
        }
    }

    public function _paging()
    {
        $this->init();
        $sess = unserialize($this->session->fncGetValue(__FILE__));
        $recTotal = $this->model->getCount($sess);
        if ($recTotal > 0) {
            if ($this->isMobile())
            {
                $pager = new verticalpager($recTotal , self::recperpage , $this->input->currpage);
            }
            else
            {
                $pager = new frontpager($recTotal , self::recperpage , $this->input->currpage);
            }
            // $pager = new frontpager($recTotal , self::recperpage , $this->input->currpage);
            $sess->start = $pager->getRecStart();
            $sess->end   = $pager->getRecEnd();
//            $input->order = "-sort desc , zhiwei , first_name_alpha asc";
//            $input->order = $sess->order;
//            $input->sort  = $sess->sort;

            $list = $this->getLawyers($sess);
            $this->output->lawyers = $list ;
            $this->output->currpage = $this->input->currpage;
        }
        $this->output->sess = $sess;
        $this->output->all = $recTotal;
        if ($this->isMobile())
        {
            $this->smarty->setTpl('pagelink.parts.html') ;
            $this->saveCurrpage($this->input->currpage);
        }
        //$this->session->subSetValue(__FILE__ , $input);
    }

    private function getLawyers($input)
    {
        $lawyers = $this->model->getLawyers($input);
        if (!empty($lawyers)) {
            foreach ($lawyers as $value) {
                $lidlist[] = $value->id;
            }
            $lawyerpic = $this->model->getLawyerpic(implode(',',$lidlist));
            $positions = $this->model->getPositions();
            foreach ($lawyers as $key => $value) {
                $lawyers[$key]->positionname = $positions[$value->zhiwei];
                $lawyers[$key]->url = $lawyerpic[$value->id];
                //取得专业
                //$zhuanye[] = $value->zhuanye;
            }
        }
        return $lawyers;
    }

    private function init()
    {
        $range = range('A','Z');
        foreach ($range as $key => $value) {
            $alphas[$value]['value'] = $value;
        }
        unset($alphas['U'],$alphas['V']);
        $jigous  = $this->model->getJigou();
        $dics    = $this->model->getDic();
        $zhiweis = $this->model->getPositions();
        $zhuanyes = $this->model->getField();
        $this->output->alphas = $alphas;
        $this->output->dics = $dics;
        $this->output->jigou_options = $jigous;
        $this->output->zhiwei_options = $zhiweis;
        $this->output->zhuanye_options = $zhuanyes;
        $bannerurl = $this->model->getBanner();
        $this->output->bannerurl = $bannerurl;
    }

    private function saveCurrpage($page)
    {
        $this->session->subSetValue( __FILE__.'currpage' , $page);
    }

    private function loadCurrpage()
    {
        return $this->session->fncGetValue(__FILE__.'currpage');
    }


}