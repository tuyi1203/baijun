<?php
class clsModModel extends clsAppModel{


    public function getParentList()
    {
        $rows = $this->dao->select('*')->from('wc_custom_menu')
                    ->where('pid is null')
                    ->orderby('sort')
                    ->fetchAll();
        return $rows;
    }


    //取得一级菜单的个数
    public function getCountOfParent() {
        $cnt = $this->dao->select('count(*) cnt')
                ->from('wc_custom_menu')
                ->where('pid is null')
                ->fetch('cnt');
        return $cnt;
    }

    public function getCountOfChild($input) {
        $cnt = $this->dao->select('count(*) cnt')
                    ->from('wc_custom_menu')
                    ->where('pid')->eq($input->pid)
                    ->fetch('cnt');
        return $cnt;
    }

    public function insert($input) {

        $this->dao->begin();
        //一级菜单功能无效化
        $data = new stdClass();
        $data->url       = "";
        $data->replytype = "";
        $this->dao->update('wc_custom_menu')->data($data)->where('id')->eq($input->pid)->exec();

        //删除一级菜单关联的关键字
        $this->dao->delete()->from('wc_keyword')
                ->where('objecttype')->eq('custommenu')
                ->andWhere('objectid')->eq($input->pid)
                ->exec();

        //处理URL类菜单
        if ($input->replytype === "1") {
            $data = new stdClass();
            if (!empty($input->pid)) $data->pid = $input->pid;
            $data->url       = $input->url;
            $data->sort      = $input->sort;
            $data->title     = $input->title;
            $data->replytype = $input->replytype;
            $this->dao->insert('wc_custom_menu')->data($data)->exec();
        } else {//处理文字消息回复类菜单

            //更新自定义菜单表wc_custom_menu
            $data = new stdClass();
            if (!empty($input->pid)) $data->pid = $input->pid;
            $data->title     = $input->title;
            $data->replytype = $input->replytype;
            $data->sort      = $input->sort;
            $this->dao->insert('wc_custom_menu')->data($data)->exec();

            //更新关键字表wc_keyword
            $data = new stdClass();
            $data->keyword         = 'custommenu-' . $this->dao->lastInsertID();
            $data->objecttype      = 'custommenu';
            $data->objectid        = $this->dao->lastInsertID();
            $data->createtime      = date("Y-m-d H:i:s");
            $data->keywordtype     = '0';
            $data->replytext       = filter::strip_tags_for_wechat_text($input->replytext , '<a>');
            $this->dao->insert('wc_keyword')->data($data)->exec();
        }


        $this->dao->commit();
        return !$this->dao->isFail();
    }
}