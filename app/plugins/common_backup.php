<?php

/**
 * 通用插件
 * @author tuyi
 * @date 2014.8.8
 *
 */
class PI_Common {

    public function getFriendLink($objecttype='friendlink',$categoryid='18') {
        if (!class_exists('Mw_Friendlink')) require APATH_LIBS_MODELS . DS . 'mw_friendlink.php';
        $input = new stdClass();
        $input->objecttype = $objecttype;
        $input->category   = $categoryid;
        $model = new Mw_Friendlink(getMDB(), 'mw_friendlink');
        $recTotal = $model->getCount($input);
        $input->category   = $categoryid;
        $input->start      = 1;
        $input->end        = $recTotal;
        $result = $model->getList($input);
        $ctr = getCtr();
        $ctr->output->topfriendlinklist = $result;
    }


    //前台顶部菜单二级套餐列表生成钩子
    public function getYjmsetList() {
    	$list = getYjmSetOptions(false);
    	$ctr = getCtr();
    	$ctr->output->menusetlist = $list;
    }

}