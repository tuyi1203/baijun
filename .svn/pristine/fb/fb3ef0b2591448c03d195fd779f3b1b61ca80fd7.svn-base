<?php
class clsModForm extends clsAppForm {

      public function validateSet() {

          $this->rules = array (
                            "moji" => array(
                                    "required" => true ,
                                    "maxlength" => 140
                            ),
                        );

          $this->messages = array (
                          "moji" => array(
                                  "required"   => $this->lang->error->notempty ,
                                  "maxlength"  => $this->lang->error->maxlength
                          )
                       );
    }
}