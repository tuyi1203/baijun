<?php
class clsModForm extends clsAppForm {

      public function validateSet() {

                    $this->rules = array (
                            "name" => array(
                                    "required" => true ,
                                    "maxlength" => 10
                             ) ,
                    		"tel" => array(
                    				"required" => true ,
                    				"tel" => true
                    		),
                    		"message" => array(
                    				"required" => true ,
                    		),
                        );

          $this->messages = array (
                          "name" => array(
                                  "required"   => $this->lang->error->notempty ,
                                  "maxlength"  => $this->lang->error->maxlength
                          ) ,
          				  "tel" => array(
          				  		"required"   => $this->lang->error->notempty ,
          				  		"tel"        => $this->lang->error->tel
                          ),
		          		"message" => array(
		          				"required"   => $this->lang->error->notempty ,
		          		),
                       );
    }
}