<?php
class clsModModel extends clsAppModel{


    public function getMenuList()
    {
        $rows =  $this->dao->select('a.id pid , a.title ptitle, a.sort psort , c.value preplytypename, d.value replytypename , a.replytype preplytype ,b.id , b.title , b.sort , b.replytype')
                    ->from('(select * from wc_custom_menu where pid is null)')->alias('a')
                    ->leftJoin('(select * from wc_custom_menu where pid is not null)')->alias('b')->on('a.id = b.pid')
                    ->leftJoin("(select * from wc_set where `key`='replytype')")->alias('c')->on('a.replytype = c.subkey')
                    ->leftJoin("(select * from wc_set where `key`='replytype')")->alias('d')->on('b.replytype = d.subkey')
                    ->orderby('a.sort,b.sort')
                    ->fetchAll();
        return $rows;
    }

    public function getAll()
    {
        $rows =  $this->dao->select('a.id pid , a.title ptitle, a.sort psort , a.url purl, c.value preplytypename, d.value replytypename , a.replytype preplytype ,b.id , b.title , b.sort , b.url url ,b.replytype')
                        ->from('(select * from wc_custom_menu where pid is null)')->alias('a')
                        ->leftJoin('(select * from wc_custom_menu where pid is not null)')->alias('b')->on('a.id = b.pid')
                        ->leftJoin("(select * from wc_set where `key`='replytype')")->alias('c')->on('a.replytype = c.subkey')
                        ->leftJoin("(select * from wc_set where `key`='replytype')")->alias('d')->on('b.replytype = d.subkey')
                        ->orderby('a.sort,b.sort')
                        ->fetchAll();
        return $rows;
    }

    public function delete($input)
    {

        $this->dao->begin();
        //删除自定义菜单数据
        $this->dao->delete()
            ->from('wc_custom_menu')
            ->where('id')->eq($input->id)
            ->exec();

        //删除关联的关键字数据
        $this->dao->delete()
            ->from('wc_keyword')
            ->where('objecttype')->eq('custommenu')
            ->andWhere('objectid')->eq($input->id)
            ->exec();

        //查看是否有二级菜单
        $rows = $this->dao->select('id')
                    ->from('wc_custom_menu')
                    ->where('pid')->eq($input->id)
                    ->fetchAll();
        if ($rows > 0) {

            foreach ($rows as $row) {
                //删除二级自定义菜单数据
                $this->dao->delete()
                    ->from('wc_custom_menu')
                    ->where('id')->eq($row->id)
                    ->exec();

                //删除关联的二级的关键字数据
                $this->dao->delete()
                    ->from('wc_keyword')
                    ->where('objecttype')->eq('custommenu')
                    ->andWhere('objectid')->eq($row->id)
                    ->exec();
            }
        }
        $this->dao->commit();

        return !$this->dao->isFail();
    }
}