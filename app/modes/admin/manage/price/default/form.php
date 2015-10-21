<?php
class clsModForm extends clsAppForm {

      public function validateSet() {

          $this->rules = array (
                            "base" => array(
                                    "required" => true ,
                                    "int" => true
                             ) ,
                        );

          $this->messages = array (
                          "base" => array(
                                  "required"   => $this->lang->error->notempty ,
                                  "int"  => $this->lang->error->int[0]
                          ) ,
                       );
    }
}