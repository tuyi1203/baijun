<?php
class clsWxalbumWxalbumDefaultController extends clsAppController
    implements IAction_default , IAction_delete {


    /**
     * 默认初始化页面方法
     */
	public function _default() {
		// pr($_SESSION['menu_list']);
		$this->init();
// 		$this->input->key = 'wxalbum';
		$model = new clsModModel($this->mdb , array('mw_wxalbum'));
		$recTotal = $model->mw_wxalbum->getCount($this->input);
		$recperpage = $this->cookie->recperpage != false ? $this->cookie->recperpage : config::$recperpage;

		if ($recTotal > 0) {
			$pager = new pager($recTotal , $recperpage , $currPage = 1);
			$input = new stdClass();
			$input->subkey = $this->input->subkey;
			$input->start = $pager->getRecStart();
			$input->end   = $pager->getRecEnd();
			$result = $model->mw_wxalbum->getList($input);
			$this->output->currpage = $currPage;
			$this->output->list = $result;
			$this->saveCond($this->input);
		}
		//         pr($this->output->list);

	}

    public function _delete() {

        $model = new clsModModel($this->mdb,'mw_wxalbum,mw_file');
        if(!$model->mw_wxalbum->delete($this->input)) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->wxalbum->faildelete;
            return;
        }

        //删除图片文件
        $input = new stdClass();
        $input->objecttype = "wxalbum";
        $input->objectid   = $this->input->id;
        $model->mw_file->deleteByObject($input);

        $this->output->result  = 'success';
    }


    public function _paging() {
    	$this->loadCond($this->input);
    	$this->init();
    	$model = new clsModModel($this->mdb , array('mw_wxalbum'));
    	$recTotal = $model->mw_wxalbum->getCount($this->input);
    	$recperpage = $this->cookie->recperpage != false ? $this->cookie->recperpage : config::$recperpage;
    	if ($recTotal > 0) {
    		$pager = new pager($recTotal , $recperpage , $this->input->currpage);
    		$input = new stdClass();
    		$input->subkey   = $this->input->subkey;
    		$input->start   = $pager->getRecStart();
    		$input->end     = $pager->getRecEnd();
    		$result = $model->mw_wxalbum->getList($input);

    		$this->output->list = $result;
    		$this->output->currpage = $this->input->currpage;
    	}
    }

    /**
     * 页面初始化
     */
    private function init() {
    	$input = new stdClass();
    	$input->key    = 'wxalbum';
    	$input->subkey = array('1');
    	$wxalbumtype = getSetList($input);
    	$this->output->wxalbumtype = $wxalbumtype;
    	list($key,$value) = each($wxalbumtype);
    	if (isset($this->input->subkey)) {
    		$this->output->activewxalbumtype = $this->input->subkey;
    	} else {
    		$this->output->activewxalbumtype = $key;
    		$this->input->subkey = $key;
    	}
    }

    private function saveCond($input) {
    	$this->session->subSetValue(__FILE__.'subkey' , $input->subkey);
    }

    private function loadCond($input) {
    	$input->subkey = $this->session->fncGetValue(__FILE__.'subkey');
    }


}