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
                                    "tel"      => true
                             ),
                              "addr" => array(
                                      "required" => true,
                              ),
                              "content" => array(
                              		"required" => true,
                              ),
                             'replycontent' => array(
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
                                  "tel"        => $this->lang->error->tel,
                          ),
                          'addr' => array(
                                  "required"   => $this->lang->error->notempty ,
                          ),
                          "content" => array(
                                  "required"   => $this->lang->error->notempty ,
                          ),
                          'replycontent' => array(
                                  "required" => $this->lang->error->notempty ,
                          ),
                       );
    }
}