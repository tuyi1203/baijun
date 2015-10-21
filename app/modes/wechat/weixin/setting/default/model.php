<?php
class clsModModel extends clsAppModel{

    public function getSettings()
    {
        $rows = $this->dao->select('`key`,subkey,value')
        ->from('wc_set')->where('`key`')
        ->eq('wechatsetting')->fetchAll();

        return $rows;
    }

    public function update(stdClass $input)
    {
        $this->dao->begin();
        foreach ($input as $key => $value) {
            if ($key == 'fileids') continue;
            $this->dao->update('wc_set')->set('value')->eq($value)
                  ->where('`key`')->eq('wechatsetting')
                  ->andWhere('subkey')->eq($key)
                  ->exec();
        }
        $this->dao->commit();
        return true;
    }

    //更新会员数据
    public function updateMember($datalist)
    {
        $this->dao->begin();
        $sql = 'replace into wc_member (`subscribe`,openid,nickname,sex , city , country , province , language ,
                headimgurl , subscribetime , unionid ) values ';


        $values = array(); $data = array();
        foreach ($datalist as $v) {
            $values[] = '(?,?,?,?,?,?,?,?,?,?,?)';
            $data[]  = $v['subscribe'];
            $data[]  = $v['openid'];
            $data[]  = $v['nickname'];
            $data[]  = $v['sex'];
            $data[]  = $v['city'];
            $data[]  = $v['country'];
            $data[]  = $v['province'];
            $data[]  = $v['language'];
            $data[]  = $v['headimgurl'];
            $data[]  = $v['subscribe_time'];
            $data[]  = !empty($v['unionid'])?$v['unionid']:null;
        }

        $this->dao->prepare($sql . implode(',', $values))->execute($data);
        $this->dao->commit();
        return !$this->dao->isFail();
    }

    public function getHeadimg($input)
    {
        $row = $this->dao->select()->from('wc_file')
                ->where('objecttype')->eq($input->objecttype)
                ->andWhere('objectid')->eq($input->objectid)
                ->fetch();
        return $row;
    }
}