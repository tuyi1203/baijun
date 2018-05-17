<?php
class clsServiceJoinDefaultController extends clsAppController
    implements IAction_default {


    /**
     * 默认初始化页面方法
     */
    public function _default() {

        $this->init();
    }

    /**
     * 页面初始化
     */
    private function init() {
		$result = $this->model->getJobs();

		foreach ($result as $key => $value) {
			$jobs[$value->groupid]['groupname'] = $value->groupname;
			$jobs[$value->groupid]['desc'] = $value->label;
			$jobs[$value->groupid]['url'] = $value->url;
			$jobs[$value->groupid]['id'] = $value->groupid;
			$jobs[$value->groupid]['jobs'][$value->id]['id']    = $value->id;
			$jobs[$value->groupid]['jobs'][$value->id]['title'] = $value->title;
			$jobs[$value->groupid]['jobs'][$value->id]['desc']  = $value->content1;
			$jobs[$value->groupid]['jobs'][$value->id]['place'] = $value->placename;
			$jobs[$value->groupid]['jobs'][$value->id]['num']   = $value->num;
			$jobs[$value->groupid]['jobs'][$value->id]['createtime']   = $value->createtime;
			if ($value->status == "1") {
				$jobs[$value->groupid]['jobs'][$value->id]['status']   = "全职";
			} else if ($value->status == "2") {
				$jobs[$value->groupid]['jobs'][$value->id]['status']   = "兼职";
			}
		}
// 		pr($jobs);
		$this->output->jobs = $jobs;
		$bannerurl = $this->model->getBanner();
        $this->output->bannerurl = $bannerurl;
    }

}