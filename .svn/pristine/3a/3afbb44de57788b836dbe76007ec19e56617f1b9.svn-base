<?php
defined('_EKU') or die;

class clsAppApplication extends clsApplication {

    public function onExecute()
    {
    	$rows = array();
        //将数据库中的设置结合到系统设置中
        if (MODE == "admin") {
            $rows = $this->dao->select('`key`,subkey,value')
                    ->from('mw_set')->where('`key`')
                    ->eq('config')->fetchAll();
        }
        if (MODE == 'wechat') {
            $rows = $this->dao->select('`key`,subkey,value')
                    ->from('wc_set')->where('`key`')
                    ->eq('wechatsetting')->fetchAll();
        }

        $config = array();
        foreach ($rows as $value) {
            $config[$value->subkey] = $value->value;
        }
        C($config);
    }
}