<?php
class clsModForm extends clsAppForm {

      public function validateSet() {

          $this->rules = array (
			          		"day" => array(
			          				"required" => true,
			          				"datetime" => true
			          		) ,
                            "place1" => array(
                                    "required" => true,
                                    "maxlength" => 100
                             ) ,
                            'arg11' => array(
                            		"required" => true,
                                    "maxlength" => 18
                             ),
			          		'arg12' => array(
			          				"required" => true,
			          				"maxlength" => 18
			          		),
			          		"place2" => array(
			          				"maxlength" => 100
			          		) ,
			          		'arg21' => array(
			          				"maxlength" => 18
			          		),
			          		'arg22' => array(
			          				"maxlength" => 18
			          		),
			          		"place3" => array(
			          				"maxlength" => 100
			          		) ,
			          		'arg31' => array(
			          				"maxlength" => 18
			          		),
			          		'arg32' => array(
			          				"maxlength" => 18
			          		),
                        );

          $this->messages = array (
			          		"day" => array(
			          				"required"   => $this->lang->error->notempty ,
			          				"datetime"  => $this->lang->error->date
			          		) ,
                          "place1" => array(
                                  "required"   => $this->lang->error->notempty ,
                                  "maxlength"  => $this->lang->error->maxlength
                          ) ,
			          		"arg11" => array(
			          				"required"   => $this->lang->error->notempty ,
			          				"maxlength"  => $this->lang->error->maxlength
			          		) ,
			          		"arg12" => array(
			          				"required"   => $this->lang->error->notempty ,
			          				"maxlength"  => $this->lang->error->maxlength
			          		) ,
			          		"place2" => array(
			          				"maxlength"  => $this->lang->error->maxlength
			          		) ,
			          		"arg21" => array(
			          				"maxlength"  => $this->lang->error->maxlength
			          		) ,
			          		"arg22" => array(
			          				"maxlength"  => $this->lang->error->maxlength
			          		) ,
			          		"place3" => array(
			          				"maxlength"  => $this->lang->error->maxlength
			          		) ,
			          		"arg31" => array(
			          				"maxlength"  => $this->lang->error->maxlength
			          		) ,
			          		"arg32" => array(
			          				"maxlength"  => $this->lang->error->maxlength
			          		) ,
                       );
    }
}