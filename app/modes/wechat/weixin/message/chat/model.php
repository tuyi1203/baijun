<?php
class clsModModel extends clsAppModel{

    public function getCount($input)
    {
        $data = array();
        $data[] = $input->openid;
        $data[] = $input->openid;
        $row = $this->dao->prepare("select count(*) cnt from (
                    (select a.id,'' mid , a.openid,a.createtime , b.nickname name , b.headimgurl , 'receive' `type` from (select * from wc_message where openid = ?) a left join wc_member b on a.openid = b.openid)
                    union all
                    (select a.id , a.mid ,'' openid , a.createtime , (select value from wc_set where `key`='wechatsetting' and subkey='name') name ,'' headimgurl , 'send' `type` from wc_message_reply a where a.mid in (select id from wc_message where openid = ?) )
                    ) a order by a.createtime desc")
                    ->execute($data)
                    ->fetch();
        return $row->cnt;
    }

    public function getList($input)
    {
        $data = array();
        $data[] = $input->openid;
        $data[] = $input->objecttype;
        $data[] = $input->objectid;
        $data[] = $input->openid;
        $data[] = $input->start - 1;
        $data[] = $input->end - $input->start + 1;
        $rows   = $this->dao->prepare("select a.* , b.id , b.url from (
                    (select a.id,'' mid ,'' objecttype , '' objectid, a.content, a.openid,a.createtime , b.nickname name , b.headimgurl , 'receive' `type` from (select * from wc_message where openid = ?) a left join wc_member b on a.openid = b.openid)
                    union all
                    (select a.id , a.mid ,a.objecttype , a.objectid , a.content , '' openid , a.createtime , (select value from wc_set where `key`='wechatsetting' and subkey='name') name ,(select url from wc_file where objecttype=? and objectid=?) headimgurl , 'send' `type` from wc_message_reply a where a.mid in (select id from wc_message where openid = ?) )
                    ) a left join (select id , objecttype , url from wc_file) b on a.objecttype = b.objecttype and a.objectid = b.id order by a.createtime desc limit ? ,?")
                    ->execute($data)
                    ->fetchAll();
//         pr($rows);
        return $rows;
    }

    public function insert($input)
    {
        $data = new stdClass();
        $data->mid = $input->mid;
        $data->replytype = $input->replytype;
        $data->createtime = time();
        if (isset($input->objecttype)) $data->objecttype = $input->objecttype;
        if (isset($input->objectid)) $data->objectid = $input->objectid;
        if (isset($input->content)) $data->content = $input->content;
        $this->dao->insert('wc_message_reply')->data($data)->exec();
        return $this->dao->isFail();
    }

    public function getMID($input)
    {
    	$row = $this->dao->select('max(id) mid')->from('wc_message')
    				->where('openid')->eq($input->openid)
    				->fetch();
    	return $row->mid;
    }
}