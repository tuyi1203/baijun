<?php
function getModeOptions() {
    return array('wxadmin'=>'wxadmin' , 'wxsite'=>'wxsite');
}

function getStatusOptions() {
    return array('0'=>'停用','1'=>'启用');
}

function getActicleStatusOptions() {
    return array('1'=>'正常','0'=>'草稿');
}

function getYesOrNoOptions() {
    return array('1'=>'是','0'=>'否');
}

function getWeekdayOptions() {
    return array('1'=>'周一','2'=>'周二','3'=>'周三','4'=>'周四','5'=>'周五','6'=>'周六','7'=>'周日',);
}

function getHourOptions() {
    return array('00'=>'00','01'=>'01','02'=>'02','03'=>'03','04'=>'04','05'=>'05','06'=>'06',
            '07'=>'07','08'=>'08','09'=>'09','10'=>'10','11'=>'11','12'=>'12','13'=>'13',
            '14'=>'14','15'=>'15','16'=>'16','17'=>'17','18'=>'18','19'=>'19','20'=>'20',
            '21'=>'21','22'=>'22','23'=>'23');
}

function getDepartmentOptions($head = false) {
    if (!class_exists('Mw_Set')) require APATH_LIBS_MODELS . DS . 'mw_set.php';
    $model = new Mw_Set(getMDB(), 'mw_set');
    $input = new stdClass();
    $input->key    = 'department';
    $input->subkey = array('1','2','3','4','5');
    $records = $model->get($input);
    if ($head) $output[''] = '';
    foreach ($records as $record) {
        $output[$record['subkey']] = $record['value'];
    }
    return $output;
}

function getMinuteOptions() {
    return array('00'=>'00','05'=>'05','10'=>'10','15'=>'15','20'=>'20','25'=>'25','30'=>'30',
            '35'=>'35','40'=>'40','45'=>'45','50'=>'50','55'=>'55');
}

function getModuleOptions($mode,$parentid=null) {

    if (!class_exists('Eku_Module')) require APATH_LIBS_MODELS . DS . 'eku_module.php';
    $model = new Eku_Module(getMDB(), 'eku_module');

    $input = new stdClass();
    $input->mode = $mode;
    $input->parentid = $parentid;
    $row = $model->getList($input);
    $output['0'] = "";
    foreach ($row as $record) {
        $output[$record['id']] = $record['des'];
    }
    return $output;
}

function getRoleOptions($head = true) {
    if (!class_exists('Eku_Role')) require APATH_LIBS_MODELS . DS . 'eku_role.php';
    $model = new Eku_Role(getMDB(), 'eku_role');
    $input = new stdClass();
    $input->roleid = getSessVal('_RoleId');
    $row = $model->getList($input);
    if ($head) $output[""] = "";
    foreach ($row as $record) {
        $output[$record['id']] = $record['name'];
    }
    return $output;
}

function getCategoryOptions($objecttype , $head=false) {
    if(!class_exists('Mw_Category')) require APATH_LIBS_MODELS . DS .'mw_category.php';

    $model = new Mw_Category(getMDB(), 'mw_category');
    $input = new stdClass();
    $input->objecttype = $objecttype;
    if ($head) $output[''] = '';
    $row = $model->getList($input);
    foreach ($row as $record) {
        $output[$record['id']] = $record['name'];
    }
    return $output;
}

function getSetList($input , $head = false) {
	if (!class_exists('Mw_Set')) require APATH_LIBS_MODELS . DS . 'mw_set.php';
	$output = array();
	$model = new Mw_Set(getMDB(), 'mw_set');
	$records = $model->get($input);
	if ($head) $output[''] = '';
	foreach ($records as $record) {
		$output[$record['subkey']] = $record['value'];
	}
	return $output;
}

/**
 * 取得水印文字
 * @return boolean
 */
function getWaterText() {
    if(!class_exists('Mw_Set')) require APATH_LIBS_MODELS . DS .'mw_set.php';
    $model = new Mw_Set(getMDB(), 'Mw_Set');
    $input = new stdClass();
    $input->key = 'config';
    $input->subkey = '1';
    $wateron = $model->get($input);
    if ($wateron[0]['value'] == '0') {
        return false;
    }

    $input->subkey = '3';
    $watertext = $model->get($input);
//     pr($watertext[0]['value']);
    return $watertext[0]['value'];
}

function getYjmSetOptions($head = false) {
    if(!class_exists('Yjm_Set')) require APATH_LIBS_MODELS . DS .'yjm_set.php';
    $model = new Yjm_Set(getMDB(), 'yjm_set');
    $input = new stdClass();
    $input->objecttype = "yjm_set";
    $records = $model->getList($input);
    if ($head) $output[''] = '';
	foreach ($records as $record) {
		$output[$record['id']] = $record['title'];
	}
	return $output;

}


function updateSystem() {
	//更新权限列表
	PI_Auth::saveActionAuthList();

	//更新菜单
	PI_Menu::saveAdminMenu();

	//TODO是否更新前台菜单

}

