<?php
class clsHumanityBookDefaultController extends clsAppController
    implements IAction_default , IAction_delete {


    /**
     * 默认初始化页面方法
     */
	public function _default() {
		// pr($_SESSION['menu_list']);
		$this->init();
// 		$this->input->key = 'album';
		$model = new clsModModel($this->mdb , array('mw_book'));
		$recTotal = $model->mw_book->getCount($this->input);
		$recperpage = $this->cookie->recperpage != false ? $this->cookie->recperpage : C('recperpage');

		if ($recTotal > 0) {
			$pager = new pager($recTotal , $recperpage , $currPage = 1);
			$input = new stdClass();
			$input->subkey = $this->input->subkey;
			$input->start = $pager->getRecStart();
			$input->end   = $pager->getRecEnd();
			$result = $model->mw_book->getList($input);
			$this->output->currpage = $currPage;
			$this->output->list = $result;
			$this->saveCond($this->input);
		}

	}

    public function _delete() {

        $model = new clsModModel($this->mdb,'mw_book,mw_file');
        if(!$model->mw_book->delete($this->input)) {
            $this->output->result  = 'fail';
            $this->output->message = $this->lang->album->faildelete;
            return;
        }

        //删除图片文件
        $input = new stdClass();
        $input->objecttype = "album";
        $input->objectid   = $this->input->id;
        $model->mw_file->deleteByObject($input);

        $this->output->result  = 'success';
    }


    public function _paging() {
    	$this->loadCond($this->input);
    	$this->init();
    	$model = new clsModModel($this->mdb , array('mw_book'));
    	$recTotal = $model->mw_book->getCount($this->input);
    	$recperpage = $this->cookie->recperpage != false ? $this->cookie->recperpage : C('recperpage');
    	if ($recTotal > 0) {
    		$pager = new pager($recTotal , $recperpage , $this->input->currpage);
    		$input = new stdClass();
    		$input->subkey   = $this->input->subkey;
    		$input->start   = $pager->getRecStart();
    		$input->end     = $pager->getRecEnd();
    		$result = $model->mw_book->getList($input);

    		$this->output->list = $result;
    		$this->output->currpage = $this->input->currpage;
    	}
    }

    /**
     * 页面初始化
     */
    private function init() {
    	$input = new stdClass();
    	$input->key    = 'album';
    	$input->subkey = array('1','2');
    	$albumtype = getSetList($input);
    	$this->output->albumtype = $albumtype;
    	list($key,$value) = each($albumtype);
    	if (isset($this->input->subkey)) {
    		$this->output->activealbumtype = $this->input->subkey;
    	} else {
    		$this->output->activealbumtype = $key;
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