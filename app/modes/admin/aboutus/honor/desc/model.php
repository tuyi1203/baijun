<?php
class clsModModel extends clsAppModel{

	public function getValue($input)
	{
		$result = $this->dao->select()->from('mw_set')->where("`key`='".$input->key."'")->andWhere("subkey='".$input->subkey."'")->fetch();
		return $result;
	}

	public function update($input)
	{
		$data = new stdClass();
    	$data->value = $input->content;
    	$this->dao->update('mw_set')->data($data)
	    		->where('`key`')->eq($input->key)
	    		->andWhere('subkey')->eq($input->subkey)
	    		->exec();
    	return !$this->dao->isFail();
	}
}