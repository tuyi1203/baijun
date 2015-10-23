<?php

class clsWeixinMessageChatController extends clsAppController implements IAction_default , IAction_paging{

    /**
     * 默认初始化页面方法
     */
    public function _default() {
        $this->init();
        $input = new stdClass();
        $input->openid = $this->input->openid;
        $this->saveSearchCond($input);
        $recTotal = $this->model->getCount($input);
        $recperpage = $this->cookie->recperpage != false ? $this->cookie->recperpage : C('RECPERPAGE');
        if ($recTotal > 0) {
            $pager = new verticalpager($recTotal , $recperpage , $currPage = 1);
//             $input  = new stdClass();
            $input->objecttype = 'wechatsetting';
            $input->objectid   = 1;
            $input->start = $pager->getRecStart();
            $input->end   = $pager->getRecEnd();
            $list = obj2array($this->model->getList($input));
            foreach ($list as $key => &$value) {
                if ($value['type'] == 'send') {
                    $value['headimgurl'] = P($value['headimgurl']);
                }
                if (isset($value['url'])) {
                	$value['url'] = P($value['url']);
                }
            }
            $this->output->list = $list;
            $this->output->currpage = $currPage;
        }
        $this->saveSearchCond($this->input);
    }

    public function _paging()
    {
        $input = new stdClass();
        $this->loadSearchCond($input);
        $recTotal = $this->model->getCount($input);
        $recperpage = $this->cookie->recperpage != false ? $this->cookie->recperpage : C('RECPERPAGE');
        if ($recTotal > 0) {
            $pager  = new verticalpager($recTotal , $recperpage , $this->input->currpage);
            $input->objecttype = 'wechatsetting';
            $input->objectid   = 1;
            $input->start   = $pager->getRecStart();
            $input->end     = $pager->getRecEnd();
            $result = $this->model->getList($input);
            $list = obj2array($this->model->getList($input));
            foreach ($list as $key => &$value) {
                if ($value['type'] == 'send') {
                    $value['headimgurl'] = P($value['headimgurl']);
                }
            }
            $this->output->list = $list;
            $this->output->currpage = $this->input->currpage;
        }
        $this->smarty->setTpl('pagelink.parts.html') ;
    }

    public function _reply()
    {
    	//发送文字消息
    	if ($this->input->type == 'moji') {
    		if ($this->form->isError()) {
    			$this->output->result  = 'fail';
    			$errmsg = $this->form->getError();
    			$this->output->message = strip_tags($errmsg['moji']);
    			return;
    		}

    		//回复消息
    		if (!message::sendText($this->input->openid, $this->input->moji)) {
    			$this->output->result  = 'fail';
    			$this->output->message = $this->lang->message->failreply;
    			return;
    		}

    		$this->input->replytype = '1';//文字回复
    		$this->input->content   = $this->input->moji;
    	}

    	if ($this->input->type == 'image') {
    		//回复消息
    		if (!message::sendImage($this->input->openid, $this->input->id)) {
    			$this->output->result  = 'fail';
    			$this->output->message = $this->lang->message->failreply;
    			return;
    		}

    		$this->input->replytype = '2';//图片回复
    		$this->input->objecttype = $this->input->type;
    		$this->input->objectid   = $this->input->id;
    	}

    	//获取mid
    	$this->input->mid  = $this->model->getMID($this->input);
    	//插入数据库
    	$this->model->insert($this->input);
    	$this->output->result  = 'success';
    	$this->output->message = $this->lang->message->successreply;


    }

    /**
     * 页面初始化
     */
    private function init()
    {
    	$this->output->type   = 'moji';
    	$this->output->openid = $this->input->openid;
        $this->output->editor = array('id' => array('moji','image', 'news'), 'tools' => array('chat','none','none'));
    }

    private function saveSearchCond($input)
    {
        $cond = array();
        if (isset($input->openid))    $cond['openid'] = $input->openid;

        session( __FILE__.'searchCond' , $cond );
    }

    private function clearSearchCond()
    {
        session(__FILE__.'searchCond',null);
    }

    private function resumeForm($input)
    {
        $this->output->orderby  = $input->orderby;
        $this->output->sort     = $input->sort;
        $this->output->sorting  = "asc";
        $this->output->activesorting  = $input->sort == "asc"?"desc":"asc";

    }

    private function loadSearchCond(&$input)
    {
        $cond = session(__FILE__.'searchCond');
        if (isset($cond['openid'])) $input->openid = $cond['openid'];

    }

}