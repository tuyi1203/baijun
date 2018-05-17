<?php
class clsHomeDefaultDefaultController extends clsAppController
    implements IAction_default {


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
		$this->_news();

		//取得最新业绩
		$yeji = $this->model->getYeji();
		$this->output->yeji = $yeji;

		//取得了解更多
		$more = $this->model->getMore();
		$this->output->more = $more;

		//取得首页幻灯片
		$slides = $this->model->getSlides();
		$this->output->slides = $slides;
// 		pr($slides);

        //取得一条百君法律评论数据
        $input = new stdClass();
        $input->labelid = "1";
        $this->output->pinglun = $this->model->getOnepinglun($input);
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