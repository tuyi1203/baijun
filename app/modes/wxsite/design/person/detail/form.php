<?php
class clsModForm extends clsAppForm {
    public function validateSet() {

        $this->rules = array (
        		"name" => array(
        				"required"  => true ,
        				"maxlength" => 10
        		) ,
        		"sort" => array(
        				"required" => false ,
        				"int"        => true,
        				"intmin"     => 0 ,
        		),
        		"hot" => array(
        				"required" => false ,
        				"int"        => true,
        				"intmin"     => 0 ,
        		)
        );

        $this->messages = array (
                "name" => array(
                        "required"   => $this->lang->error->notempty,
                        "maxlength"  => $this->lang->error->maxlength
                ) ,
        		"sort" => array(
        				"int"        => $this->lang->error->int[0],
        				"intmin"     => $this->lang->error->int[1],
        				//         		        "intmax"     => $this->lang->error->int[2],
        		) ,
        		"hot" => array(
        				"int"        => $this->lang->error->int[0],
        				"intmin"     => $this->lang->error->int[1],
        				//         		        "intmax"     => $this->lang->error->int[2],
        		) ,
        );
    }
}