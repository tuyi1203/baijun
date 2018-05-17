<?php
class clsNewsPerformanceDetailController extends clsAppController
    implements IAction_default {


    /**
     * 默认初始化页面方法
     */
    public function _default() 
    {
        $input = new stdClass();
        $input->id = $this->input->id;
        $input->public     = "1";
        $detail = $this->model->getDetail($input);
        if (!empty($detail->lawyer)) {
            $lawyers = $this->model->getLawyers($detail->lawyer);
            $jigous  = $this->model->getJigou();
            $positions = $this->model->getPositions();
            $lawyerpic = $this->model->getLawyerpic($detail->lawyer);
            foreach ($lawyers as $key => $value) {
                $lawyers[$key]->jigouname = $jigous[$value->jigou];
                $lawyers[$key]->positionname = $positions[$value->zhiwei];
                $lawyers[$key]->url = $lawyerpic[$value->id];
                //取得专业
                $zhuanye[] = $value->zhuanye;
            }
            $labels    = $this->model->getLabels($zhuanye);
            $this->output->labels = $labels;
            $this->output->lawyers = $lawyers;
        }


        $input = new stdClass();
        $input->publishtime = $detail->publishtime;
        $input->objecttype = MODULES;
        $input->id = $this->input->id;
        $this->output->predata = $this->model->getPredata($input);
        $this->output->nextdata = $this->model->getNextdata($input);

        $this->output->detail = $detail;
        $this->output->nofilter->content = $detail->content;
        $this->output->sitetitle = $detail->title;
    }

}