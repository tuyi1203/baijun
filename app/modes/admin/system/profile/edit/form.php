<?php
class clsModForm extends clsAppForm {

      public function validateSet() {

          $this->rules = array (
                            "password1" => array(
                                    "required" => true ,
                                    "minlength" => 6 ,
                                    "maxlength" => 10
                             ) ,
                            "password2" => array(
                                    "required" => true ,
                                    "equalTo" => "password1"
                            ),
                        );

          $this->messages = array (
                          "password1" => array(
                                  "required"   => $this->lang->error->notempty ,
                                  "minlength"  => $this->lang->error->minlength,
                                  "maxlength"  => $this->lang->error->maxlength
                          ) ,
                          "password2" => array(
                                  "required"  => $this->lang->error->notempty ,
                                  "equalTo"   => $this->lang->error->passwordsame ,
                          ),
                       );
    }
}