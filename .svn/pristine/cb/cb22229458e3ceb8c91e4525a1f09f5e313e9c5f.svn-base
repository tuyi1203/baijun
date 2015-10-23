<?php
/**
 * @name 		clsActionForm
 * @describe 	ActionForm抽象基類
 * @author 		tuyi
 * @since 		2011/12/02
 * @version		v1.0
 */
abstract class clsActionForm {
    /**
     * @name 		__construct
     * @describe 	ActionForm基類構造関数
     * @author 		tuyi
     * @since 		2011/12/02
     * @version		v1.0
     */
//     private $data = array();
//     abstract $form;

    protected    $input;
    protected    $rules;
    protected    $messages;
    protected    $lang;
    protected    $errors;
    protected    $app;
    protected	 $ignores = array();

    public       $isChecked = false;
    public       $isError = false;


    public function __construct($input , $lang)
    {
        $this->lang  = $lang;
        $this->input = $input;
        $this->app   = getAppIns();
    }

    protected function validate() {

        foreach ($this->rules as $field => $rule) {
        	if (in_array($field, $this->ignores)) continue;

            foreach ($rule as $rulename => $ruleval) {
                if (!$this->ignore($rule , isset($this->input->$field)?$this->input->$field:null) && !($this->checkField($field , isset($this->input->$field)?$this->input->$field:null , $rulename , $ruleval))) {
                    break;
                }
            }
        }

    }

    /**
     *
     */
    protected function checkField($fieldname , $data , $rule , $var) {

        $module_s = MODULES; //二级模块名称

        switch ($rule) {
            case 'required':
                if (!validater::checkNotEmpty($data)) {
                    $this->isError = true;
                    $this->errors[$fieldname] = sprintf($this->messages[$fieldname][$rule] ,
                            $this->lang->$module_s->$fieldname);
                    return false;
                }
                break;
            case 'alphalower':
                if (!validater::checkAlpha($data , 'lower')) {
                    $this->isError = true;
                    $this->errors[$fieldname] = sprintf($this->messages[$fieldname][$rule] ,
                            $this->lang->$module_s->$fieldname);
                    return false;
                }
                break;
            case 'maxlength':
                if (!validater::checkLength($data , $var)) {
                    $this->isError = true;
                    $this->errors[$fieldname] = sprintf($this->messages[$fieldname][$rule] ,
                            $this->lang->$module_s->$fieldname , $this->rules[$fieldname][$rule]);
                    return false;
                }
                break;
            case 'minlength':
                if (!validater::checkLength($data , null , $var)) {
                    $this->isError = true;
                    $this->errors[$fieldname] = sprintf($this->messages[$fieldname][$rule] ,
                            $this->lang->$module_s->$fieldname , $this->rules[$fieldname][$rule]);
                    return false;
                }
                break;
            case 'datetime':
                if (!validater::checkDate($data)) {
                    $this->isError = true;
                    $this->errors[$fieldname] = sprintf($this->messages[$fieldname][$rule] ,
                            $this->lang->$module_s->$fieldname);
                    return false;
                }
                break;

            case 'equalTo':

                $equaldata = $this->rules[$fieldname][$rule];

                if (strcmp($data , $this->input->$equaldata) !== 0) {
                    $this->isError = true;
                    $this->errors[$fieldname] = sprintf($this->messages[$fieldname][$rule] ,
                            $this->lang->$module_s->$fieldname);
//                     pr($this->errors);
                    return false;
                }
                break;
            case 'url':
                if ($this->rules[$fieldname][$rule] and !validater::checkURL($data)) {
                    $this->isError = true;
                    $this->errors[$fieldname] = sprintf($this->messages[$fieldname][$rule] ,
                            $this->lang->$module_s->$fieldname);
                    //                     pr($this->errors);
                    return false;
                }
                break;
            case 'int':
                if ($this->rules[$fieldname][$rule]) {
                    $args[] = $data;
                    if (isset($this->rules[$fieldname]['intmin'])) {

                        $args[] = $this->rules[$fieldname]['intmin'];

                        if (isset($this->rules[$fieldname]['intmax'])) {
                            $args[] = $this->rules[$fieldname]['intmax'];
                        }
                    }
// pr($arg);
                if(!call_user_func(array('validater','checkInt'),$args)) {
// pr("e");
                        $this->isError = true;
                        if (isset($this->rules[$fieldname]['intmin']) and isset($this->rules[$fieldname]['intmax'])) {
                            $this->errors[$fieldname] = sprintf($this->messages[$fieldname]['intmax'] ,
                                    $this->lang->$module_s->$fieldname , $this->rules[$fieldname]['intmin'] ,
                                        $this->rules[$fieldname]['intmax']);
                        } else if (isset($this->rules[$fieldname]['intmin'])) {
                            $this->errors[$fieldname] = sprintf($this->messages[$fieldname]['intmin'] ,
                                    $this->lang->$module_s->$fieldname , $this->rules[$fieldname]['intmin']);
                        } else {
                            $this->errors[$fieldname] = sprintf($this->messages[$fieldname][$rule] ,
                                    $this->lang->$module_s->$fieldname);
                        }
                        return false;
                    }
                }
                break;
            case "tel" :
                if (!validater::checkChineseTel($data)) {
                    $this->isError = true;
                    $this->errors[$fieldname] = sprintf($this->messages[$fieldname][$rule] ,
                            $this->lang->$module_s->$fieldname);
                    return false;
                }
                break;
            case "email":
            	if (!validater::checkEmail($data)) {
            		$this->isError = true;
            		$this->errors[$fieldname] = sprintf($this->messages[$fieldname][$rule] ,
            				$this->lang->$module_s->$fieldname);
            		return false;
            	}
            	break;
            case "idcard":
            	if (!validater::checkIDCard($data)) {
            		$this->isError = true;
            		$this->errors[$fieldname] = sprintf($this->messages[$fieldname][$rule] ,
            				$this->lang->$module_s->$fieldname);
            		return false;
            	}
            	break;
        }
        return true;

    }

    public function isError() {
        if (!$this->isChecked && method_exists($this, 'validateSet')) {
            $this->validateSet();
            $this->validate();
            $this->isChecked = true;
        }
        return $this->isError;
    }


    public function getError() {
        return $this->errors;
    }


    /**
     * 判断是否跳过检查(当输入为空且验证规则中不含“required”或者“required==false”时,
     * 跳过检查)
     * @param Array $rule
     * @param string $input
     * @return boolean
     */
    private function ignore($rule , $input) {
        if (empty($input) && (!array_key_exists('required', $rule) || !$rule['required']))
            return true;

        return false;

    }

    public function setIgnores($field) {
		if (is_array($field)) {
			$this->ignores = $field;
		} else {
			$this->ignores = explode(',' , str_replace(' ', '', $field));
		}

    }

}
