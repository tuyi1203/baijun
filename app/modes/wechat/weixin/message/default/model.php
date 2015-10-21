<?php
class clsModModel extends clsAppModel{

    public function getCount()
    {
        $row = $this->dao->select('count(*) cnt')
                ->from('wc_message')
                ->fetch();
        return $row->cnt;
    }

    public function getList($input)
    {
        $rows = $this->dao->select("a.* , b.nickname , b.remarkname , b.headimgurl")
                    ->from('wc_message')->alias('a')
                    ->leftJoin("(select * from wc_member)")->alias('b')->on('a.openid = b.openid')
                    ->orderby('createtime desc')
                    ->limit($input->start , $input->end)
                    ->fetchAll();
        return $rows;
    }

    public function insert($input)
    {
        $data = new stdClass();
        $data->mid = $input->mid;
        $data->replytype = $input->replytype;
        $data->createtime = time();
        if (isset($input->objectype)) $data->objecttype = $input->objecttype;
        if (isset($input->objectid)) $data->objectid = $input->objectid;
        if (isset($input->content)) $data->content = $input->content;
        $this->dao->insert('wc_message_reply')->data($data)->exec();
        return $this->dao->isFail();
    }
}