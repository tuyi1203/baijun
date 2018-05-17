<?php
class clsHumanityDefaultDefaultController extends clsAppController
    implements IAction_default {

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
    public function _default() {

    	//echo "hello world";exit;
        $this->_init();
        $this->output->ishome = "true";
    }

    private function _init()
    {
        //取得banner图片和banner置顶数据
        $picurl = $this->model->getBanner();
        $this->output->bannerurl = $picurl;
        $this->output->bannerid = $this->model->getTop();


        //取得板块置顶数据
        $labeltopdata = $this->model->getLabelTopData();
        $this->output->labeltopdata = $labeltopdata;

        //取得首页数据
        $list = $this->model->getList();
        $this->output->list = $list;
    }

    public function _list()
    {
        $this->input->recperpage = 4;
        $list = $this->model->getListByLabel($this->input);
        $this->output->list = $list;
        $this->smarty->setTpl('list.html');
    }

    public function _paging()
    {
        if (!isset($this->input->pageid)) {
            $this->input->page = 1;
        }
        $this->output->result = "success";
        $this->output->list = $this->model->getNext($this->input);
        $this->output->nextpage = $this->input->nextpage;
    }

    public function _detail()
    {
        $output = $this->model->getDetail($this->input);
        $this->output->data = $output;
        $this->output->nofilter->data = $output;
        $this->smarty->setTpl('detail.html');
    }

    public function _news($time=1)
    {
    	//随机取得三篇事务所新闻
        if (isset($_GET['time'])) {
            $time = $_GET['time'];
        }
//        echo $time;
    	$officenews = $this->model->getOfficeNews($time);
    	$this->output->officenews = $officenews;
    }
}