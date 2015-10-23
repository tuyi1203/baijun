<?php
class clsModForm extends clsAppForm {

      public function validateSet() {
          $this->rules = array (
                         "name" => array(
                                    "required" => true ,
                                    "maxlength" => 20
                             ) ,
                        );

          $this->messages = array (
                          "name" => array(
                                  "required"   => $this->lang->error->notempty ,
                                  "maxlength"  => $this->lang->error->maxlength
                          ) ,
                       );
    }
}