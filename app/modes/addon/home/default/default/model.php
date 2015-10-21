<?php
class clsModModel extends clsAppModel {

    public function addMessage($input)
    {
        $this->dao->begin();
        $this->dao->insert('wc_message')->data($input)->exec();

        if ($input->msgtype == '2') {//如果是图片，则取得图片

        }
        $this->dao->commit();
        return $this->dao->isFail();
    }

    //检查重复数据
    public function duplicate($input)
    {
        $row = $this->dao->select('count(*) cnt')->from('wc_log')
                    ->beginIF(isset($input->msgid))->where('msgid')->eq(isset($input->msgid)?$input->msgid:'')->fi()
                    ->beginIF(isset($input->ctime) && isset($input->openid))->where('ctime')->eq(isset($input->ctime)?$input->ctime:"")
                    ->andWhere('openid')->eq(isset($input->openid)?$input->openid:"")->fi()
                    ->fetch();
        return $row->cnt;

    }
}