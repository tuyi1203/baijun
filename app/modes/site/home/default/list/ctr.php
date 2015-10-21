<?php
class clsHomeDefaultListController extends clsAppController implements IAction_default {

	private $table = array(

			"event" => array(
							"name" => "公司大事记",
							'url'  => "single/event/list/default.html"
							),
			"company" => array(
							"name" => "公司动态",
							'url'  => "news/company/detail/default"
							),
			"brotherhood" => array(
					"name" => "行业动态",
					'url'  => "news/brotherhood/detail/default"
			),
			"waterstop" => array(
					"name" => "停水公告",
					'url'  => "information/waterstop/detail/default"
			),
			"notice" => array(
					"name" => "公司公告",
					'url'  => "information/notice/detail/default"
			),
			"waterquality" => array(
					"name" => "水质公告",
					'url'  => "information/waterquality/detail/default"
			),
			"waterpressure" => array(
					"name" => "水压月报",
					'url'  => "information/waterpressure/detail/default"
			),
			"bomb" => array(
					"name" => "爆管公告",
					'url'  => "information/bomb/detail/default"
			),
			"party" => array(
					"name" => "党团风采",
					'url'  => "culture/party/detail/default"
			),
			"metropolitan" => array(
					"name" => "水司文化",
					'url'  => "culture/metropolitan/detail/default"
			),
			"drink" => array(
					"name" => "水务之星",
					'url'  => "culture/drink/detail/default"
			),
			"guide" => array(
					"name" => "政府信息公开指南",
					'url'  => "gov/guide/detail/default"
			),
			"report" => array(
					"name" => "政府信息公开年报",
					'url'  => "gov/report/detail/default"
			),

	);

    /**
     * 默认初始化页面方法
     */
    public function _default() {

    	if (!isset($this->input->keyword)) {
    		return;
    	}

        $this->init();
        $model = new clsModModel($this->mdb , "mw_article");
        $input = new stdClass();
        $input->keyword = $this->input->keyword;
        $recTotal = $model->getCount($input);
//         $recperpage = $this->cookie->recperpage != false ? $this->cookie->recperpage : C('recperpage');
        $recperpage = C('recperpage');
//         $recperpage = 1;

        if ($recTotal > 0) {
            $pager = new frontpager($recTotal , $recperpage , $currPage = 1);
            $input->orderby = 'objecttype';
            $input->sort    = 'desc';
            $input->start = $pager->getRecStart();
            $input->end   = $pager->getRecEnd();
            $result = $model->getList($input);

            foreach ($result as $key => $value) {
            	if (strpos($value['title'] , $input->keyword) !== false) {
            		$result[$key]['title'] = str_replace($input->keyword , '<i class="red">'.$input->keyword . '</i>' , $value['title']);
            	}
            	if (strpos($value['summary'] , $input->keyword) !== false) {
            		$result[$key]['summary'] = str_replace($input->keyword , '<i class="red">'.$input->keyword . '</i>' , $value['summary']);
            	}
            	$result[$key]['from'] = $this->table[$value['objecttype']]['name'];
            	if ($value['objecttype'] != 'event') {
            		$result[$key]['url']  = U($this->table[$value['objecttype']]['url'] . '/' .$value['id'] . '.html');
            	}

            }
            $this->output->nofilter->list = $result;
            $this->output->currpage = $currPage;
        }
		$this->output->keyword = $this->input->keyword;
		$this->saveCond($this->input->keyword);
    }

    public function _paging() {
        $this->init();
        $input = new stdClass();
        $input->keyword = $this->loadCond();
        $model = new clsModModel($this->mdb , "mw_article");
        $recTotal = $model->getCount($input);
        $recperpage = C('recperpage');
//         $recperpage = 1;
        if ($recTotal > 0) {
            $pager  = new frontpager($recTotal , $recperpage , $this->input->currpage);
            $input->orderby = 'objecttype';
            $input->sort    = 'desc';
            $input->start   = $pager->getRecStart();
            $input->end     = $pager->getRecEnd();
            $result = $model->getList($input);
            foreach ($result as $key => $value) {
            	if (strpos($value['title'] , $input->keyword) !== false) {
            		$result[$key]['title'] = str_replace($input->keyword , '<i class="red">'.$input->keyword . '</i>' , $value['title']);
            	}
            	if (strpos($value['summary'] , $input->keyword) !== false) {
            		$result[$key]['summary'] = str_replace($input->keyword , '<i class="red">'.$input->keyword . '</i>' , $value['summary']);
            	}
            	$result[$key]['from'] = $this->table[$value['objecttype']]['name'];
            	if ($value['objecttype'] != 'event') {
            		$result[$key]['url']  = U($this->table[$value['objecttype']]['url'] . '/' .$value['id'] . '.html');
            	}
            }
            $this->output->nofilter->list = $result;
            $this->output->currpage = $this->input->currpage;
        }
    }


    /**
     * 页面初始化
     */
    private function init() {

    }

    private function saveCond($keyword)
    {
		session(__FILE__ . 'keyword' , $keyword);
    }

    private function loadCond()
    {
    	return session(__FILE__ . 'keyword');
    }

}