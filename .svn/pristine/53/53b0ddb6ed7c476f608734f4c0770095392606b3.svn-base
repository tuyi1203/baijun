<?php
if (!class_exists('Eku_Role_Action')) {

    require APATH_LIBS_MODELS . DS . 'eku_role_action.php';

}
/**
 * 菜单生成插件
 * @author tuyi
 * @date 2014.5.9
 *
 */
class PI_Menu {

    public function saveAdminMenu() {
        // echo getMode();exit;
        // 		$l_oAuth = getAuthIns();

        //         if ($l_oAuth ->fncPassThrough()) {

        //         	$rid = getRid();

        // 			$l_oModel = new Eku_Role_Menu(getMDB(), 'eku_role_menu');
        $l_oModel = new Eku_Role_Action(getMDB(), 'eku_role_action');

        // 			$l_aOutput = $l_oModel->fncGetList(array('roleid'=>getRid()));
        // pr($l_aOutput);exit;
        $l_aOutput = $l_oModel->fncGetMenuList(array('roleid'=>getRid()));
        $l_aMenulist = array();
// pr($l_aOutput);exit;
        // 			foreach ($l_aOutput as $record) {

        // 				$l_aMenulist[$record['PARENTID']]['url'] = $record['URL'];
        // 				$l_aMenulist[$record['PARENTID']]['des'] = $record['DES'];
        // 				$l_aMenulist[$record['PARENTID']]['name'] = $record['NAME'];

        // 				if ($record['CHILDID'] != null) {

        // 					$l_aMenulist[$record['PARENTID']]['child'][$record['CHILDID']]['des'] = $record['DES2'];
        // 					$l_aMenulist[$record['PARENTID']]['child'][$record['CHILDID']]['url'] = $record['URL2'];
        // 					$l_aMenulist[$record['PARENTID']]['child'][$record['CHILDID']]['name'] = $record['NAME2'];

        // 				}

        // 			}

        $moduleid = null;
        $url1 = null;

        foreach ($l_aOutput as $record) {

            if ($record['PID'] != $moduleid) {

                $url1 = $record['URL'];
                $moduleid = $record['PID'];
            }

            $l_aMenulist[$record['MODE']][$record['SORT1']][$record['PID']]['url'] = $url1 . '.html';
            $l_aMenulist[$record['MODE']][$record['SORT1']][$record['PID']]['des'] = $record['DES1'];
            $l_aMenulist[$record['MODE']][$record['SORT1']][$record['PID']]['name'] = $record['FNAME'];

            $l_aMenulist[$record['MODE']][$record['SORT1']][$record['PID']]['child'][$record['CID']]['des'] = $record['DES2'];
            $l_aMenulist[$record['MODE']][$record['SORT1']][$record['PID']]['child'][$record['CID']]['url'] = $record['URL'].'.html';
            $l_aMenulist[$record['MODE']][$record['SORT1']][$record['PID']]['child'][$record['CID']]['name'] = $record['SNAME'];

        }

        //设置menulist到session
        session('menu_list' , $l_aMenulist);
//         pr($l_aMenulist);exit;
        // 			setSessVal('menu_outer', $this->fncGetMenuList('outer' , $l_aMenulist));
        // 			setSessVal('menu_inner', $this->fncGetMenuList('inner' , $l_aMenulist));
        // pr($this->fncGetMenuList('inner', $l_aMenulist));
    }

}