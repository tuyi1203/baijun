<?php
class clsModForm extends clsAppForm {

      public function validateSet() {

                    $this->rules = array (
                            "name" => array(
                                    "required" => true ,
                                    "maxlength" => 40
                             ) ,
                    		"cardno" => array(
                    				"maxlength" => 30
                    		),
                    		"tel" => array(
                    				"required" => true ,
                    				"tel"      => true
                    		),
                    		"email" => array(
                    				"email" => true
                    		),
                    		"addr" => array(
                    				"required" => true ,
                    				"maxlength" => 80
                    		),
                            "content" => array(
                                    "required" => true ,
                            		"maxlength" => 1000
                            ),
                    		"captcha" => array(
                    				"required" => true ,
                    		),
                        );

          $this->messages = array (
                          "name" => array(
                                  "required"   => $this->lang->error->notempty ,
                                  "maxlength"  => $this->lang->error->maxlength
                          ) ,
			          	 "cardno" => array(
			          			"maxlength"  => $this->lang->error->maxlength
			          	 ) ,
          				  "tel" => array(
          				  		"required"   => $this->lang->error->notempty ,
          				  		"tel"        => $this->lang->error->tel
                          ),
			          		"email" => array(
			          				"email"        => $this->lang->error->email
			          		),
			          		"addr" => array(
			          				"required"   => $this->lang->error->notempty ,
			          				"maxlength"  => $this->lang->error->maxlength
			          		),
                          "content" => array(
                                  "required"   => $this->lang->error->notempty ,
                          		  "maxlength"  => $this->lang->error->maxlength
                          ),
		          		  "captcha" => array(
		          				"required"   => $this->lang->error->notempty ,
		          		  ),

                       );
    }
}