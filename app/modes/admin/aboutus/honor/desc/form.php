<?php
class clsModForm extends clsAppForm {

      public function validateSet() {

          $this->rules = array (
                            "content" => array(
                                    "required" => true ,
                             ) ,
                        );

          $this->messages = array (
                          "content" => array(
                                  "required"   => $this->lang->error->notempty ,
                          ) ,
                       );
    }
}