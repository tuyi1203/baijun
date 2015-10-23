<?php
class clsModForm extends clsAppForm {
    public function validateSet() {

        $this->rules = array (
        		"account" => array(
        				"required"   => true ,
//         				"alphalower" => true,
        				"minlength"  => 4 ,
        				"maxlength"  => 20
        		) ,
                "password" => array(
                        "required"  => true ,
                		"minlength" => 6 ,
                		"maxlength" => 10
                ) ,
        		"name" => array(
        				"required"  => true ,
        				"maxlength" => 10
        		) ,
        );

        $this->messages = array (
        		"account" => array(
        				"required"   => $this->lang->error->notempty,
//         				"alphalower" => $this->lang->error->alphalower,
        				"minlength"  => $this->lang->error->minlength,
        				"maxlength"  => $this->lang->error->maxlength
        		) ,
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