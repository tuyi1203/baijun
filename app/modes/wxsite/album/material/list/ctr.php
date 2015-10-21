<?php
class clsAlbumMaterialListController extends clsAppController implements IAction_default {

    /**
     * 默认初始化页面方法
     */
    public function _default() {

        $this->init();
        $model = new clsModModel($this->mdb , "mw_wxalbum");
        $input = new stdClass();
        $input->objecttype = 'wxalbum';
        $input->subkey = '1';
        $recTotal = $model->mw_wxalbum->getCount($input);
        $recperpage = 6 ;

        if ($recTotal > 0) {
            $pager = new verticalpager($recTotal , $recperpage , $currPage = 1);
            $input->start = $pager->getRecStart();
            $input->end   = $pager->getRecEnd();
			$list = array();
			$albumlist = $model->mw_wxalbum->getList($input);
			foreach ($albumlist as $value) {
				$list[$value['id']]['albumtitle'] = $value['title'];
				$list[$value['id']]['group']      = 'group' . $value['id'];
				$model = new clsModModel($this->mdb , "mw_file");
				$input = new stdClass();
				$input->objecttype = 'wxalbum';
				$input->objectid = $value['id'];
				$imagelist = $model->mw_file->getList($input);
				foreach ($imagelist as $k => $v) {
					if ($v['primary'] == '1') {
						$list[$value['id']]['covertitle'] = $v['title'];
						$list[$value['id']]['coverurl'] = $this->app->getWebRoot(). "/data/upload/" .$v['url'];
					} else {
						$list[$value['id']]['images'][$v['id']]['imagetitle'] = $v['title'];
						$list[$value['id']]['images'][$v['id']]['imageurl']   = $this->app->getWebRoot(). "/data/upload/" .$v['url'];
					}
				}
			}

            $this->output->list = $list;
            $this->output->currpage = $currPage;
        }

    }

    public function _paging() {

    	$this->init();
		$model = new clsModModel($this->mdb , "mw_wxalbum");
        $input = new stdClass();
        $input->objecttype = 'wxalbum';
        $input->subkey = '1';
        $recTotal = $model->mw_wxalbum->getCount($input);
	    $recperpage = 6 ;

        if ($recTotal > 0) {
            $pager = new verticalpager($recTotal , $recperpage , $this->input->currpage);
            //             $input  = new stdClass();
            $input->start = $pager->getRecStart();
            $input->end   = $pager->getRecEnd();
//             $result = $model->mw_wxalbum->getImageList($input);
			$list = array();
			$albumlist = $model->mw_wxalbum->getList($input);
			foreach ($albumlist as $value) {
				$list[$value['id']]['albumtitle'] = $value['title'];
				$list[$value['id']]['group']      = 'group' . $value['id'];
				$model = new clsModModel($this->mdb , "mw_file");
				$input = new stdClass();
				$input->objecttype = 'wxalbum';
				$input->objectid = $value['id'];
				$imagelist = $model->mw_file->getList($input);
				foreach ($imagelist as $k => $v) {
					if ($v['primary'] == '1') {
						$list[$value['id']]['covertitle'] = $v['title'];
						$list[$value['id']]['coverurl'] = $this->app->getWebRoot(). "/data/upload/" .$v['url'];
					} else {
						$list[$value['id']]['images'][$v['id']]['imagetitle'] = $v['title'];
						$list[$value['id']]['images'][$v['id']]['imageurl']   = $this->app->getWebRoot(). "/data/upload/" .$v['url'];
					}
				}
			}

            $this->output->list = $list;
            $this->output->currpage = $this->input->currpage;
            $this->smarty->setTpl('pagelink.parts.html') ;
        }
    }

    /**
     * 页面初始化
     */
    private function init() {

    }
}