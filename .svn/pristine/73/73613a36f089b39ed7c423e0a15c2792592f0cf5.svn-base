<?php
class clsModForm extends clsAppForm {

      public function validateSet() {

          $this->rules = array (
                            "name" => array(
                                    "required" => true,
                                    "maxlength" => 10
                             ) ,
			          		"tel" => array(
			          				"required" => true,
			          				"maxlength" => 11,
			          		) ,
			          		"qq" => array(
			          				"required" => false,
			          		        "maxlength" => 50,
			          		) ,
                            'addr' => array(
                                    "required" => true,
                             ),
                            'content' => array(
                                    "required" => true,
                            ),
                        );

          $this->messages = array (
                          "name" => array(
                                  "required"   => $this->lang->error->notempty ,
                                  "maxlength"  => $this->lang->error->maxlength
                          ) ,
                          'tel' => array(
                          		  "required"   => $this->lang->error->notempty ,
                                  "maxlength" => $this->lang->error->maxlength
                          ),
                          "qq" => array(
                                  "required"   => $this->lang->error->notempty ,
                                  "maxlength"  => $this->lang->error->maxlength
                          ) ,
			          	  'addr' => array(
			          				"required" => $this->lang->error->notempty ,
			          		),
                          'content' => array(
                                  "required" => $this->lang->error->notempty ,
                          ),
                       );
    }
}