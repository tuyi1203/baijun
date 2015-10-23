<?php
class clsHomeDefaultDefaultController extends clsAppController
    implements IAction_default {


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
    	//取得首页通知信息
    	if($this->model->getNoticeFlg()) {
    		$this->output->nofilter->dialog = $this->model->getNotice();
    	}


        //取得幻灯片数据
        $input = new stdClass();
        $model = new clsModModel($this->mdb , 'mw_slides');
        $input->objecttype = "slides";
        $result = $model->mw_slides->getList($input);
        foreach ($result as $key => $value) {
            $result[$key]['url'] = UPLOAD_URL . $value['url'];
        }
        $this->output->slideslist = $result;

        //取得左侧幻灯片
        $input = new stdClass();
        $model = new clsModModel($this->mdb , 'mw_smallslides');
        $input->objecttype = "smallslides";
        $result = $model->mw_smallslides->getList($input);
        foreach ($result as $key => $value) {
        	$result[$key]['url'] = UPLOAD_URL . $value['url'];
        }
        $this->output->smallslideslist = $result;

        //国家法律法规
        $input = new stdClass();
        $model = new clsModModel($this->mdb , array('mw_file'));
        $input->objecttype = "country";
        $input->start = 1;
        $input->end   = 3;
        $result = $model->mw_file->getListByObjectType($input);
        foreach ($result as $key => $value) {
        	$result[$key]['url'] = UPLOAD_URL .  $value['url'];
        }
        $this->output->countrylist = $result;

        //地方法律法规
        $input = new stdClass();
        $model = new clsModModel($this->mdb , array('mw_file'));
        $input->objecttype = "local";
        $input->start = 1;
        $input->end   = 3;
        $result = $model->mw_file->getListByObjectType($input);
        foreach ($result as $key => $value) {
        	$result[$key]['url'] = UPLOAD_URL .  $value['url'];
        }
        $this->output->locallist = $result;

        //常见问题
        $input = new stdClass();
        $categories = getCategoryOptions('question');
        list($key,$value) = each($categories);
        $this->output->questionname1 = $value;
        $input->orderby    = "createtime";
        $input->sort       = 'desc';
        $input->start 	   = 1;
        $input->end        = 10;
        $input->public     = '1';
        $input->category   = $key;
        $model = new clsModModel($this->mdb , array('mw_question'));
        $result = $model->mw_question->getList($input);
        $this->output->questionlist1 = $result;
        $this->output->category1 = $key;

        list($key,$value) = each($categories);
        $this->output->questionname2 = $value;
        $input->orderby    = "createtime";
        $input->sort       = 'desc';
        $input->start 	   = 1;
        $input->end        = 10;
        $input->public     = '1';
        $input->category = $key;
        $model = new clsModModel($this->mdb , array('mw_question'));
        $result = $model->mw_question->getList($input);
        $this->output->questionlist2 = $result;
        $this->output->category2     = $key;

        //党团风采
        $model = new clsModModel($this->mdb , "mw_article");
        $input = new stdClass();
        $input->objecttype = "party";
        $input->orderby    = "createtime";
        $input->sort       = 'desc';
        $input->public     = '1';
        $input->start 	   = 1;
        $input->end        = 10;
        $result = $model->mw_article->getList($input);
        $this->output->dangtuanlist = $result;
        //水司文化
        $model = new clsModModel($this->mdb , "mw_article");
        $input = new stdClass();
        $input->objecttype = "metropolitan";
        $input->orderby    = "createtime";
        $input->sort       = 'desc';
        $input->public     = '1';
        $input->start 	   = 1;
        $input->end        = 10;
        $result = $model->mw_article->getList($input);
        $this->output->shuisilist = $result;
        //水务之星
        $model = new clsModModel($this->mdb , "mw_article");
        $input = new stdClass();
        $input->objecttype = "drink";
        $input->orderby    = "createtime";
        $input->sort       = 'desc';
        $input->public     = '1';
        $input->start 	   = 1;
        $input->end        = 10;
        $result = $model->mw_article->getList($input);
        $this->output->drinklist = $result;

        //公司动态
        //1.置顶消息
        $model = new clsModModel($this->mdb , "mw_article");
        $input = new stdClass();
        $input->objecttype = "company";
        $input->orderby    = "createtime";
        $input->sort       = 'desc';
        $input->public     = '1';
        $input->top        = '1';
        $input->start 	   = 1;
        $input->end        = 10;
        $result = $model->mw_article->getWithTopImage($input);
        foreach ($result as $key =>$value) {
        	if (!empty($value['url']))
            $result[$key]['url'] = UPLOAD_URL . $value['url'];
        }
        $this->output->companytoplist = $result;

        //2.列表消息
        $input = new stdClass();
        $input->objecttype = "company";
        $input->orderby    = "createtime";
        $input->sort       = 'desc';
        $input->public     = '1';
        $input->start 	   = 1;
        $input->end        = 10;
        $input->top        = '0';
        $result = $model->mw_article->getList($input);
        foreach ($result as $key =>$value) {
        	if (strpos($value['content'] , '<img') === false) {
        		$result[$key]['imageflg'] = '0';
        	} else {
        		$result[$key]['imageflg'] = '1';
        	}
        }
        $this->output->companylist = $result;

        //行业动态
        //1.置顶消息
        $model = new clsModModel($this->mdb , "mw_article");
        $input = new stdClass();
        $input->objecttype = "brotherhood";
        $input->orderby    = "createtime";
        $input->sort       = 'desc';
        $input->public     = '1';
        $input->top        = '1';
        $input->start 	   = 1;
        $input->end        = 10;
        $result = $model->mw_article->getWithTopImage($input);
        foreach ($result as $key =>$value) {
        	if (!empty($value['url']))
        	$result[$key]['url'] = UPLOAD_URL . $value['url'];
        }
        $this->output->brotherhoodtoplist = $result;

        //2.列表消息
        $input = new stdClass();
        $input->objecttype = "brotherhood";
        $input->orderby    = "createtime";
        $input->sort       = 'desc';
        $input->public     = '1';
        $input->start 	   = 1;
        $input->end        = 10;
        $input->top        = '0';
        $result = $model->mw_article->getList($input);
        foreach ($result as $key =>$value) {
        	if (strpos($value['content'] , '<img') === false) {
        		$result[$key]['imageflg'] = '0';
        	} else {
        		$result[$key]['imageflg'] = '1';
        	}
        }
        $this->output->brotherhoodlist = $result;

        //公司公告
        $input = new stdClass();
        $input->objecttype = "notice";
        $input->orderby    = "createtime";
        $input->sort       = 'desc';
        $input->public     = '1';
        $input->start 	   = 1;
        $input->end        = 6;
        $result = $model->mw_article->getList($input);
        $this->output->noticelist = $result;

        //停水公告
        $input = new stdClass();
        $input->objecttype = "waterstop";
        $input->orderby    = "createtime";
        $input->sort       = 'desc';
        $input->public     = '1';
        $input->start 	   = 1;
        $input->end        = 6;
        $result = $model->mw_article->getList($input);
        $this->output->waterstoplist = $result;

        //取得今日水质数据
        $model = new clsModModel($this->mdb , 'mw_todaywater');
        $input = new stdClass();
        $input->orderby    = "today";
        $input->sort       = 'desc';
//         $input->today      = date("Y-m-d");
        $input->public     = '1';
        $input->start 	   = 1;
        $input->end        = 1;
        $result = $model->mw_todaywater->getList($input);
        if (!empty($result)) {
        	foreach ($result[0] as $key => $value) {
        		$this->output->$key = $value;
        	}
        }
    }

}