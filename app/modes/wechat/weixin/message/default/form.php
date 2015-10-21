<?php
class clsModForm extends clsAppForm {

      public function validateSet() {

          $this->rules = array (
                            "content" => array(
                                    "required" => true ,
                                    "maxlength" => 140
                            ),
                        );

          $this->messages = array (
                          "content" => array(
                                  "required"   => $this->lang->error->notempty ,
                                  "maxlength"  => $this->lang->error->maxlength
                          )
                       );
    }
}