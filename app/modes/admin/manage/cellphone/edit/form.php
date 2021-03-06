<?php
class clsModForm extends clsAppForm {

      public function validateSet() {

          $this->rules = array (
                            "name" => array(
                                    "required" => true,
                                    "maxlength" => 10
                             ) ,
                            'tel' => array(
                            		"required" => true,
                                    "maxlength" => 20
                             ),
                              "content" => array(
                              		"required" => true,
                              ),
                             'content2' => array(
                                    "required" => true
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
                          "content" => array(
                                  "required"   => $this->lang->error->notempty ,
                          ),
                          'content2' => array(
                                  "required" => $this->lang->error->notempty ,
                          ),
                       );
    }
}