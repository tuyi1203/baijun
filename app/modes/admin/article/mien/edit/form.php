<?php
class clsModForm extends clsAppForm {

      public function validateSet() {

          $this->rules = array (
                            "title" => array(
                                    "required" => true ,
                                    "maxlength" => 40
                             ) ,
                            "content" => array(
                                    "required" => true ,
                            ),
                            "publishtime" => array(
                                    "datetime" => true
                            ),
                            'keyword' => array(
                                    "maxlength" => 40
                             ),
                              "sort" => array(
                                      "required" => false ,
                                      "int"        => true,
                                      "intmin"     => 0 ,
                              ),
                        );

          $this->messages = array (
                          "title" => array(
                                  "required"   => $this->lang->error->notempty ,
                                  "maxlength"  => $this->lang->error->maxlength
                          ) ,
                          "content" => array(
                                  "required"   => $this->lang->error->notempty ,
                          ),
                          "publishtime" => array(
                                  "datetime" => $this->lang->error->date
                          ),
                          'keyword' => array(
                                  "maxlength" => $this->lang->error->maxlength
                          ),
                          "sort" => array(
                                  "int"        => $this->lang->error->int[0],
                                  "intmin"     => $this->lang->error->int[1],
                                  //         		        "intmax"     => $this->lang->error->int[2],
                          ) ,
                       );
    }
}