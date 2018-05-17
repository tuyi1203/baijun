<?php
class clsModForm extends clsAppForm {

      public function validateSet() {

          $this->rules = array (
                            "title" => array(
                                    "required" => true ,
                                    "maxlength" => 50
                             ) ,
                            "desc" => array(
                                    "maxlength" => 50
                            ),
        			          		"sort" => array(
        			          				"required" => false ,
        			          				"int"        => true,
        			          				"intmin"     => 0 ,
        			          		),
                            "publishyear" => array(
                                "required" => true ,
                                "int"        => true,
                                "intmin"     => 0 ,
                                "intmax"     => 9999 ,
                            ),
                        );

          $this->messages = array (
                          "title" => array(
                                  "required"   => $this->lang->error->notempty ,
                                  "maxlength"  => $this->lang->error->maxlength
                          ) ,
                          "desc" => array(
                                  "maxlength"  => $this->lang->error->maxlength
                          ),
                				  "sort" => array(
      		          				"int"        => $this->lang->error->int[0],
      		          				"intmin"     => $this->lang->error->int[1],
                				//         		        "intmax"     => $this->lang->error->int[2],
          		            ) ,
                          "publishyear" => array(
                            "required"   => $this->lang->error->notempty ,
                            "int"        => $this->lang->error->int[0],
                            "intmin"     => $this->lang->error->int[1],
                            "intmax"     => $this->lang->error->int[2],
                          ) ,
                       );
    }
}