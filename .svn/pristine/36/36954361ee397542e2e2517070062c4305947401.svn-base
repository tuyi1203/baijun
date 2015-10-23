<?php
class clsModModel extends clsAppModel{

    public function getRemarkname($input)
    {
        $row = $this->dao->findbyId($input->memid)
                ->from('wc_member')->fetch();
        return $row->remarkname;
    }

    public function update($input)
    {
        $data = new stdClass();
        $data->remarkname = $input->name;
        $this->dao->update('wc_member')->data($data)
                ->where('id')->eq($input->memid)
                ->exec();
        return !$this->dao->isFail();
    }
}