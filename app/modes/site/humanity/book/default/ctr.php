<?php
class clsHumanityBookDefaultController extends clsAppController
    implements IAction_default {

    const recperpage = 14;//14条数据每页

    public function __construct() {
        parent::__construct();
        //取得菜单
        $humanitylist = $this->model->getMenuList();
        $this->output->menulist = $humanitylist;
        $this->output->magazinelist = $this->model->getMagazineList();
    }

    /**
     * 默认初始化页面方法
     */
    public function _default() 
    {
        $this->output->list = $this->model->getList();
    }

    public function _detail()
    {
        $detail = $this->model->getDetail($this->input);
        $this->output->data = $detail;
        $this->output->nofilter->data = $detail;
        $this->smarty->setTpl('detail.html');
    }


}