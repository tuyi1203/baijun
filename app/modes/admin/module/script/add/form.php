<?php
class clsModForm extends clsAppForm {

      public function validateSet() {

          $this->rules = array (
                            "name" => array(
                                    "required" => true ,
                                    "alphalower" => true,
                                    "maxlength" => 20
                             ) ,
                            "des" => array(
                                    "required" => true ,
                                    "maxlength" => 50
                            ),
                            "pid" => array(
                                    "required" => true ,
                            ),
                              "sid" => array(
                                      "required" => true ,
                              )
                        );

          $this->messages = array (
                          "name" => array(
                                  "required"   => $this->lang->error->notempty ,
                                  "alphalower" => $this->lang->error->alphalower ,
                                  "maxlength"  => $this->lang->error->maxlength
                          ) ,
                          "des" => array(
                                  "required"   => $this->lang->error->notempty ,
                                  "maxlength"  => $this->lang->error->maxlength
                          ),
                          "pid" => array(
                                  "required"   => $this->lang->error->notempty
                          ),
                          "sid" => array(
                                  "required"   => $this->lang->error->notempty
                          )
                       );
    }
}