<?php
class clsModModel extends clsAppModel{

	public function get($input)
	{
		$rows = $this->dao->select()->from('mw_set')->where("`key`='".$input->key."'")->fetchAll();
		return $rows;
	}

	public function update($input)
	{
		$this->dao->begin();
		$data = new stdClass();
		$data->value  = $input->keywords;

		//更新关键字
		$this->dao->update('mw_set')->data($data)
				->where("`key`='config'")
				->andWhere("`subkey`='keywords'")
				->exec();

		//更新首页通知
		if (isset($input->homepagenotice)) {
			$data->value = $input->homepagenotice;
		} else {
			$data->value = "0";
		}

		$this->dao->update('mw_set')->data($data)
				->where("`key`='config'")
				->andWhere("`subkey`='notice'")
				->exec();

		$data->value = $input->content;
		$this->dao->update('mw_set')->data($data)
				->where("`key`='config'")
				->andWhere("`subkey`='noticecontent'")
				->exec();

		$this->dao->commit();
		return !$this->dao->isFail();
	}

}