<?php
abstract class clsAppModel{

    protected $_oMdb;

    protected $dao ;

    public function __construct(clsMDB $a_oMdb , $a_aTableName = null)
    {
        $this->_oMdb = $a_oMdb;

        $this->dao   = getDAO();

        if (!is_null($a_aTableName)) {

            if (is_string($a_aTableName)) $table = explode(',', str_replace(' ','',$a_aTableName));
            if (is_array($a_aTableName)) $table = $a_aTableName;

            foreach ($table as $tablename) {

                $modelname = clsText::fncUcfirst($tablename , "_") ;

                //其他语言对应
                if (strtolower(getClientLang()) == 'en') {
                	$modelname .= '_EN';
                } else if (strtolower(getClientLang()) == 'jp') {
                	$modelname .= '_JP';
                }

                if (!class_exists($modelname) && file_exists(APATH_LIBS_MODELS . DS . $tablename . '.php')) {

                    require APATH_LIBS_MODELS . DS . $tablename . '.php';
                }

                $this->$tablename = new $modelname($a_oMdb , $tablename);

            }

        }

    }

    public function getLastInsertID()
    {
    	return $this->dao->lastInsertID();
    }

    // 	public function __call($methodname , $args) {

    // 		return call_user_func(array($this->tablemodel , $methodname), array_shift($args));

    // 	}

}