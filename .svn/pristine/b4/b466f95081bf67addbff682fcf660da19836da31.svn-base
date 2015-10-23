<?php
class clsModModel extends clsAppModel{

	public function insert($input)
	{
		$data = new stdClass();
		$data->name 		= strip_tags($input->name);
		$data->xingbie 		= $input->xingbie;
		$data->shengri 		= $input->shengri;
		$data->shenfenzheng = $input->shenfenzheng;
		$data->zhengzhi 	= $input->zhengzhi;
		$data->jiguan 		= strip_tags($input->jiguan);
		$data->hunyin 		= strip_tags($input->hunyin);
		$data->jiankang		= strip_tags($input->jiankang);
		$data->shengao 		= strip_tags($input->shengao);
		$data->tizhong 		= strip_tags($input->tizhong);
		$data->xueli 		= strip_tags($input->xueli);
		$data->zhuanye 		= strip_tags($input->zhuanye);
		$data->yuanxiao		= strip_tags($input->yuanxiao);
		$data->hukou 		= strip_tags($input->hukou);
		$data->jisuanji		= strip_tags($input->jisuanji);
		$data->guoyu 		= strip_tags($input->guoyu);
		$data->gongzuo 		= strip_tags($input->gongzuo);
		$data->peixun 		= strip_tags($input->peixun);
		$data->yeji 		= strip_tags($input->yeji);
		$data->techang 		= strip_tags($input->techang);
		$data->jiating 		= strip_tags($input->jiating);
		$data->bumen 		= strip_tags($input->bumen);
		$data->zhiwei 		= strip_tags($input->zhiwei);
		$data->yaoqiu 		= strip_tags($input->yaoqiu);
		$data->dianhua 		= $input->dianhua;
		$data->youxiang		= $input->youxiang;
		$data->qq 	    	= strip_tags($input->qq);
		$data->dizhi 		= strip_tags($input->dizhi);
		$data->jiashi 		= strip_tags($input->jiashi);
		$data->waiyu 		= strip_tags($input->waiyu);
		$data->createtime 	= date("Y-m-d H:i:s");
		$data->minzu 		= strip_tags($input->minzu);

		$this->dao->insert('mw_resume')->data($data)->exec();
		return !$this->dao->isFail();
	}

}