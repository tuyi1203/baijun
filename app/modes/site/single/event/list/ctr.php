<?php
class clsSingleEventListController extends clsAppController implements IAction_default {

    /**
     * 默认初始化页面方法
     */
    public function _default() {

        $this->init();
        $model = new clsModModel($this->mdb , "mw_article");
        $input = new stdClass();
        $input->objecttype = MODULES;
        $input->public  = '1';
        $recTotal = $model->mw_article->getCount($input);
//         $recperpage = $this->cookie->recperpage != false ? $this->cookie->recperpage : C('recperpage');
        $recperpage = C('recperpage');
//         $recperpage = 1;

        if ($recTotal > 0) {
            $pager = new frontpager($recTotal , $recperpage , $currPage = 1);
            //             $input  = new stdClass();
            $input->orderby = 'createtime';
            $input->sort    = 'desc';
            $input->start = $pager->getRecStart();
//             $input->end   = $pager->getRecEnd();
			$input->end = $recTotal;
//             $result = $model->mw_article->getList($input);
            $result = $this->formatResult($model->getList($input));
            $this->output->ta->list = $result;
        }
    }

    public function _paging() {
        //         echo "hello";
        $this->init();
        $input = new stdClass();
        $input->objecttype = "company";
        $input->public  = '1';
        $model = new clsModModel($this->mdb , "mw_article");
        $recTotal = $model->mw_article->getCount($input);
        //         var_dump($this->cookie->lang);
//         $recperpage = $this->cookie->recperpage != false ? $this->cookie->recperpage : C('recperpage');
        $recperpage = C('recperpage');
//         $recperpage = 1;
        if ($recTotal > 0) {
            $pager  = new frontpager($recTotal , $recperpage , $this->input->currpage);

            $input->orderby = 'createtime';
            $input->sort    = 'desc';
            $input->start   = $pager->getRecStart();
            $input->end     = $pager->getRecEnd();
            $result = $model->mw_article->getList($input);
            foreach ($result as $key => $value) {
                $result[$key]['createtime'] = substr($value['createtime'], 0 , 10);
            }
            $this->output->list = $result;
            $this->output->currpage = $this->input->currpage;
        }
    }


    /**
     * 页面初始化
     */
    private function init() {

    }

    private function formatResult($records) {
    	$result = array();
    	foreach ($records as $key => $value) {
    		$year = empty($value['updatetime']) ? substr($value['createtime'], 0 , 4):substr($value['updatetime'], 0 , 4);
    		$result[$year]['year']           		        = $year;
    		$result[$year]['data'][$value['id']]['id']   	= $value['id'];
    		$result[$year]['data'][$value['id']]['day']     = empty($value['updatetime']) ? substr($value['createtime'] , 8 , 2) : substr($value['updatetime'] , 8 , 2);
    		$result[$year]['data'][$value['id']]['month']   = empty($value['updatetime']) ? substr($value['createtime'] , 5 , 2) : substr($value['updatetime'] , 5 , 2);
//     		$result[$year]['data'][$value['id']]['date'] 	= empty($value['updatetime']) ? str_replace('-' , '.' , substr($value['createtime'], 5 , 5)) : str_replace('-' , '.' , substr($value['updatetime'], 5 , 5));
    		$result[$year]['data'][$value['id']]['title']	= $value['title'];
    		$result[$year]['data'][$value['id']]['summary']	= $value['summary'];
    		if (!empty($value['url'])) {
    			$result[$year]['data'][$value['id']]['url']		= UPLOAD_URL . $value['url'];;
    		}
    	}

    	return $result;
    }

}