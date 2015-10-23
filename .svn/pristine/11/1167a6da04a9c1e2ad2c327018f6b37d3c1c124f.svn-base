<?php
class clsModForm extends clsAppForm {
    public function validateSet() {

        $this->rules = array (
                "password" => array(
                        "required"  => false ,
                		"minlength" => 6 ,
                		"maxlength" => 10
                ) ,
        		"name" => array(
        				"required"  => true ,
        				"maxlength" => 10
        		) ,
        );

        $this->messages = array (
        		"password" => array(
        				"required"   => $this->lang->error->notempty,
        				"minlength"  => $this->lang->error->minlength,
        				"maxlength"  => $this->lang->error->maxlength
        		) ,
                "name" => array(
                        "required"   => $this->lang->error->notempty,
                        "maxlength"  => $this->lang->error->maxlength
                ) ,
        );
    }
}