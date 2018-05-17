<?php
class clsCommonHumanitylabelSelectController extends clsAppController
            implements IAction_default{

    //初始化
    public function _default()
    {
		$result = obj2array($this->model->getLabelList());
		// foreach ($result as $key => $value) {
		// 	$fields[$value['id']]['id'] = $value['id'];
		// 	$fields[$value['id']]['title'] = $value['title'];
		// 	$fields[$value['id']]['labels'][$value['labelid']]['id'] = $value['labelid'];
		// 	$fields[$value['id']]['labels'][$value['labelid']]['desc'] = $value['desc'];
		// }
		$this->output->list = $result;
// 		pr($fields);
    }
}
