<?php
class clsModForm extends clsAppForm {

      public function validateSet() {

          $this->rules = array (
                            "title" => array(
                                    "required" => true,
                                    "maxlength" => 100
                             ) ,
                             'content' => array(
                                    "required" => true
                             ),
          					'starttime' => array(
          							"required" => true,
          							"datetime" => true
          							),
			          		'endtime' => array(
			          				"required" => true,
			          				"datetime" => true
			          		),
                        );

          $this->messages = array (
                          "title" => array(
                                  "required"   => $this->lang->error->notempty ,
                                  "maxlength"  => $this->lang->error->maxlength
                          ) ,
                          'content' => array(
                                  "required" => $this->lang->error->notempty ,
                          ),
		          		'starttime' => array(
		          				"required"   => $this->lang->error->notempty ,
		          				"datetime" => $this->lang->error->date
		          		),
		          		'endtime' => array(
		          				"required"   => $this->lang->error->notempty ,
		          				"datetime" => $this->lang->error->date
		          		),
                       );
    }
}