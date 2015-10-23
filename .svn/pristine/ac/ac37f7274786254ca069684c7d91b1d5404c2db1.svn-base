<?php
class clsDesignCaseDetailController extends clsAppController implements IAction_default{

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
    	$input = new stdClass();
    	$input->id         = $this->input->id;
    	$model = new clsModModel($this->mdb, 'yjm_case');
    	$case = $model->yjm_case->get($input);

    	$styles   = getCategoryOptions('style');
    	$rooms    = getCategoryOptions('room');
    	$surfaces = getCategoryOptions('surface');
    	$yjmsets  = getYjmSetOptions(false);
    	$case['stylename'] = $styles[$case['style']];
    	$case['roomname']  = $rooms[$case['room']];
    	$case['yjmsetname']= $yjmsets[$case['yjmset']];
    	$case['surface']   = $surfaces[$case['surface']];


    	//取得设计师名
    	$model = new clsModModel($this->mdb , "yjm_person");
    	$input = new stdClass();
    	$input->objecttype = 'person';
    	$input->objectid   = $case['designer'];
    	$input->id         = $case['designer'];
    	$person = $model->yjm_person->getById($input);
    	$case['designername'] = $person['name'];

    	//取得图片文件
    	$model = new clsModModel($this->mdb , "mw_file");
    	$input = new stdClass();
    	$input->objecttype = 'case';
    	$input->objectid   = $case['id'];
    	$imagelist = $model->mw_file->getList($input);

    	$albumcnter = 0;
    	foreach ($imagelist as $imagev) {
    		if ($imagev['primary'] == '1') {
    			$case['coverurl'] = $this->app->getWebRoot(). "/data/upload/" .$imagev['url'];
    		} else if ($albumcnter < 6) {
    			$case['album'][$imagev['id']]['url'] = $this->app->getWebRoot(). "/data/upload/" .$imagev['url'];
    			$albumcnter++;
    		}
    	}

    	foreach ($case as $k => $v) {
    		$this->output->$k = $v;
    		if ($k == 'content') $this->output->nofilter->content = $v;
    	}

    	//取得套餐数据
//     	$input = new stdClass();
//     	$input->objecttype = 'yjm_set';
//     	$this->output->setlist = getSetInfo($input , 0);

    	//取得同类风格数据
//     	$input = new stdClass();
//     	$input->objecttype = 'case';
//     	$input->start = 1;
//     	$input->end   = 2;
//     	$input->exceptid = $case['id'];
//     	$input->style = $case['style'];
//     	$model = new clsModModel($this->mdb , "yjm_case");
//     	$samestylelist = $model->yjm_case->getRandList($input);
//     	foreach ($samestylelist as $key => $value) {
//     	    $samestylelist[$key]['url'] = $this->app->getWebRoot(). "/data/upload/" .$value['url'];
//     	}
// 		$this->output->samestylelist = $samestylelist;


		//取得同类户型数据
// 		$input = new stdClass();
// 		$input->objecttype = 'case';
// 		$input->start = 1;
// 		$input->end   = 2;
// 		$input->exceptid = $case['id'];
// 		$input->room = $case['room'];
// 		$model = new clsModModel($this->mdb , "yjm_case");
// 		$sameroomlist = $model->yjm_case->getRandList($input);
// 		foreach ($sameroomlist as $key => $value) {
// 		    $sameroomlist[$key]['url'] = $this->app->getWebRoot(). "/data/upload/" .$value['url'];
// 		}
// 		$this->output->sameroomlist = $sameroomlist;

		//取得同设计师数据
// 		$input = new stdClass();
// 		$input->objecttype = 'case';
// 		$input->start = 1;
// 		$input->end   = 2;
// 		$input->exceptid = $case['id'];
// 		$input->designer = $case['designer'];
// 		$model = new clsModModel($this->mdb , "yjm_case");
// 		$samedesignerlist = $model->yjm_case->getRandList($input);
// 		foreach ($samedesignerlist as $key => $value) {
// 		    $samedesignerlist[$key]['url'] = $this->app->getWebRoot(). "/data/upload/" .$value['url'];
// 		}
// 		$this->output->samedesignerlist = $samedesignerlist;

    }

}