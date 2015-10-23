<?php
function getSet()
{
	$ctr = getCtr();
	$week = array("1"=>'一' , "2"=>'二', '3'=>'三','4'=>'四' , '5'=>'五' , '6'=>'六' , '7'=>'日');
	$ctr->output->now = date("Y年m月d日");
	$ctr->output->week= '星期'.$week[date('N')];

	if(!class_exists('Mw_Set')) require APATH_LIBS_MODELS . DS .'mw_set.php';
	$input = new stdClass();
	$input->key         = 'siteinfo';
	$input->subkey      = range(1, 12);
	$model = new Mw_Set(getMDB(), 'mw_set');
	$siteinfo = $model->get($input);

	foreach ($siteinfo as $k => $v) {
		if ($v['subkey'] == "1") {
			$ctr->output->sitetitle = $v['value'];
		}
		if ($v['subkey'] == "2") {
			$ctr->output->tel1 = $v['value'];
		}
		if ($v['subkey'] == "3") {
			$ctr->output->nofilter->buttom = $v['value'];
		}
		if ($v['subkey'] == "6") {
			$ctr->output->qq1 = $v['value'];
		}
		if ($v['subkey'] == "7") {
			$ctr->output->qq2 = $v['value'];
		}
	}

	//取得微信二维码图片
	if(!class_exists('Mw_File')) require APATH_LIBS_MODELS . DS .'mw_file.php';
	$model = new Mw_File(getMDB(), 'mw_file');
	$input = new stdClass();
	$input->objecttype = 'qcode';
	$input->objectid   = 1 ;
	$qcode = $model->getList($input);
	foreach ($qcode as $key => $value) {
		$ctr->output->qcode = UPLOAD_URL . $value['url'];
	}
}


function rollingNews()
{
	$ctr = getCtr();
	$input = new stdClass();
	$input->orderby    = "createtime";
	$input->sort       = 'desc';
	$input->public     = '1';
	$input->rollflg    = '1';
	$input->start 	   = 1;
	$input->end        = 6;
	if(!class_exists('Mw_Article')) require APATH_LIBS_MODELS . DS .'mw_article.php';
	$model = new Mw_Article(getMDB(), 'mw_article');
	$result = $model->getRollList($input);
	$ctr->output->rollinglist = $result;
}

function getCategoryOptions($objecttype , $head=false) {
	if(!class_exists('Mw_Category')) require APATH_LIBS_MODELS . DS .'mw_category.php';

	$model = new Mw_Category(getMDB(), 'mw_category');
	$input = new stdClass();
	$input->objecttype = $objecttype;
	$lang = getLang();
	if ($head) $output[''] = $lang->all;
	$row = $model->getList($input);
	foreach ($row as $record) {
		$output[$record['id']] = $record['name'];
	}
	return $output;
}

function getSiteInfo($key , $subkey) {
    if (!class_exists('Mw_Set')) require APATH_LIBS_MODELS . DS . 'mw_set.php';
    $model = new Mw_Set(getMDB(), 'mw_set');
    $input = new stdClass();
	$input->key    = $key;
	$input->subkey = $subkey;
    $record = $model->get($input);
    return $record[0]['value'];
}

function getTeamList() {
//     if (!class_exists('Yjm_Person')) require APATH_LIBS_MODELS . DS . 'yjm_person.php';
//     $model = new Yjm_Person(getMDB(), 'yjm_person');
//     $input = new stdClass();
//     $input->objecttype = 'person';
//     $input->orderby = 'sort';
//     $input->sort = 'asc';
//     $input->start = 1;
//     $input->end   = 6;
//     $records = $model->getTopList($input);
//     $app = getAppIns();
//     foreach ($records as $key => $value) {
//         $records[$key]['url'] = $app->getWebRoot(). "/data/upload/" . $value['url'];
//     }
    if (!class_exists('Mw_Top')) require APATH_LIBS_MODELS . DS . 'mw_top.php';
    $input = new stdClass();
    $input->objecttype = 'topdesigner';
    $model = new Mw_Top(getMDB() , array('mw_top'));
    $app = getAppIns();
    $result = $model->getList($input);
    foreach ($result as $key => $value) {
        if (!empty($result[$key]['url'])) {
            $result[$key]['url'] = UPLOAD_URL . $value['url'];
        }
    }
    $ctr = getCtr();
    $ctr->output->teamlist = $result;
}

function getClassiCase() {
    if (!class_exists('Yjm_Case')) require APATH_LIBS_MODELS . DS . 'yjm_case.php';
    $model = new Yjm_Case(getMDB(), 'yjm_case');
    $input = new stdClass();
    $input->objecttype = 'case';
    $input->start = 1;
    $input->end   = 3;
    $records = $model->getRandList($input);
    $app = getAppIns();
    foreach ($records as $key => $value) {
        $records[$key]['url'] = UPLOAD_URL . $value['url'];
    }
    $ctr = getCtr();
    $ctr->output->caselist = $records;
}

//取得公司动态数据
function getTopNews() {
	$input = new stdClass();
	if (!class_exists('Mw_Article')) require APATH_LIBS_MODELS . DS . 'mw_article.php';
	$model = new Mw_Article(getMDB() , "mw_article");
	$input->orderby = 'createtime';
	$input->sort    = 'desc';
	$input->public  = '1';
	$input->start = 1;
	$input->end   = 7;
	$input->objecttype = "news";
	$result = $model->getList($input);

	foreach ($result as $key => $value) {
		$result[$key]['createtime'] = substr($value['createtime'], 5 , 5);
	}
	$ctr = getCtr();
	$ctr->output->newslist  = $result;
}

//取得套餐数据
function getSetInfo($input , $topflg = '1') {
	if (!class_exists('Yjm_Set')) require APATH_LIBS_MODELS . DS . 'yjm_set.php';
	$model = new Yjm_Set(getMDB() , "yjm_set");
	if ($topflg) {
		$result = $model->getTopList($input);
	} else {
		$result = $model->getList($input);
	}
	$app = getAppIns();
	foreach ($result as $key => $value) {
		$result[$key]['url'] = UPLOAD_URL . $value['url'];
	}
	return $result;
}

//取得相册数据
function getAlbumList($input) {
	if (!class_exists('Mw_Album')) require APATH_LIBS_MODELS . DS . 'mw_album.php';
	if (!class_exists('Mw_File'))  require APATH_LIBS_MODELS . DS . 'mw_file.php';
	if (!class_exists('Mw_Topimage'))  require APATH_LIBS_MODELS . DS . 'mw_topimage.php';
	$model = new Mw_Album(getMDB() , "mw_album");
	$app = getAppIns();
	$list = array();
	$albumlist = $model->getHomepageList($input);
	foreach ($albumlist as $value) {
		$list[$value['id']]['albumtitle'] = $value['title'];
		$list[$value['id']]['group']      = 'group' . $value['id'];
		$model = new Mw_Topimage(getMDB() , "mw_topimage");
		$input = new stdClass();
		$input->objecttype = 'album';
		$input->objectid = $value['id'];
		$imagelist = $model->getList($input);
		$list[$value['id']]['covertitle'] = isset($imagelist[0])?$imagelist[0]['title']:null;
		$list[$value['id']]['coverurl']   = isset($imagelist[0])?UPLOAD_URL .$imagelist[0]['url']:null;
		$model = new Mw_File(getMDB() , "mw_file");
		$imagelist = $model->getList($input);
		foreach ($imagelist as $k => $v) {
		    if ($v['primary'] == "1") continue;//去掉相册封面
			$list[$value['id']]['images'][$v['id']]['imagetitle'] = $v['title'];
			$list[$value['id']]['images'][$v['id']]['imageurl']   = UPLOAD_URL .$v['url'];
		}
	}
	return $list;
}

function getYjmSetOptions($head = false) {
	if(!class_exists('Yjm_Set')) require APATH_LIBS_MODELS . DS .'yjm_set.php';
	$model = new Yjm_Set(getMDB(), 'yjm_set');
	$input = new stdClass();
	$input->objecttype = "yjm_set";
	$records = $model->getList($input);
	$lang = getLang();
	if ($head) $output[''] = $lang->all;
	foreach ($records as $record) {
		$output[$record['id']] = $record['title'];
	}
	return $output;

}


/**
 * 取得水印文字
 * @return boolean
 */
function getWaterText() {
   return false;
}