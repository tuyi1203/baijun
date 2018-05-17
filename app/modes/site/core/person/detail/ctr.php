<?php
class clsCorePersonDetailController extends clsAppController
    implements IAction_default {


    /**
     * 默认初始化页面方法
     */
    public function _default() 
    {
        $detail =  $this->model->getLawyer($this->input);
        $jigous  = $this->model->getJigou();
        $positions = $this->model->getPositions();
        $lawyerpic = $this->model->getLawyerpic($detail->id);
        $languages = $this->model->getWorklanguageList();
        $detail->jigouname = $jigous[$detail->jigou];
        $detail->positionname = $positions[$detail->zhiwei];
        $detail->url = $lawyerpic[$detail->id];
        $field    = $this->model->getField($detail->zhuanye);
        $detail->zhuanyename = $field->title;
        $detail->zhuanyezige = explode('|',$detail->zhuanyezige);
        $detail->gongzuoyuyan = explode(',',$detail->gongzuoyuyan);
        foreach ($detail->gongzuoyuyan as $value) {
            $gongzuoyuyan[] = $languages[$value];
        }
        $detail->gongzuoyuyan = $gongzuoyuyan;
        //相关新闻
        $news = $this->getOfficenewsList($detail->id);
        //代表业绩
        $performance = $this->getPerformance($detail->id);
//        pr($news);
        //部门
        $bumen  = $this->model->getDepartmentList();
        $detail->bumenname = $bumen[$detail->bumen];
        //取得专业
//            $zhuanye[] = $value->zhuanye;
        $this->output->detail = $detail;
        $this->output->news   = $news;
        $this->output->performance = $performance;
        $bannerurl = $this->model->getBanner();
        $this->output->bannerurl = $bannerurl;
//        pr($detail);
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

    private function getLawyers($fieldid)
    {
        $input = new stdClass();
        $input->id = $fieldid;
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

    private function getOfficenewsList($lawyerid)
    {
        $input = new stdClass();
        $input->public = '1';
        $input->objecttype = 'officenews';
        $input->start = 1;
        $input->end = 4;
        $input->lawyerid = $lawyerid;
        $news = $this->model->getOfficenewsList($input);
        return $news;
    }

    private function getPerformance($lawyerid)
    {
        $input = new stdClass();
        $input->public = '1';
        $input->objecttype = 'performance';
        $input->start = 1;
        $input->end = 4;
        $input->lawyerid = $lawyerid;
        $performance = $this->model->getPerformancelist($input);
        return $performance;
    }


}